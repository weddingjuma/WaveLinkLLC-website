<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/phpmailer/class.phpmailer.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");

	$first_name = str_replace(',', '', addslashes($_POST['first_name']));
	$last_name = str_replace(',', '', addslashes($_POST['last_name']));
	$email_address = $_POST['email_address'];
	$phone_number = $_POST['phone_number'];
	$notes = str_replace(',', '', addslashes($_POST['notes']));
    $is_subscribed = isset($_POST['is_subscribed']) && $_POST['is_subscribed'];

    $subject = "New inquiry for ".$site_name;
    $body = "First Name: ".$first_name."<br />
             Last Name: ".$last_name."<br />
             Email Address: ".$email_address."<br />
             Phone Number: ".$phone_number."<br />
             Notes: ".$notes."<br />
             Email List Opt-In: ".($is_subscribed == 1 ? "Yes" : "No");
    //send_email($setting['email'], $subject, $body);
    send_email('kelvingraddick+allgamehunting@gmail.com', $subject, $body);

    if ($is_subscribed == 1) {
        if (!mysqli_num_rows(mysqli_query($c, "SELECT email FROM users WHERE email = '$email_address'"))) {
            if (mysqli_query($c, "INSERT INTO users (first_name, last_name, email, phone, description) VALUES ('$first_name', '$last_name', '$email_address', '$phone_number', '$notes')")) { } else { }
        } else {
            if (mysqli_query($c, "UPDATE users SET first_name = '$first_name', last_name = '$last_name', phone = '$phone_number', description = '$notes' WHERE email = '$email_address'")) { } else { }
        }

        $subject = "New email subscription for ".$site_name;
        $body = "First Name: ".$first_name."<br />
                 Last Name: ".$last_name."<br />
                 Email Address: ".$email_address."<br />
                 Phone Number: ".$phone_number."<br />
                 Notes: ".$notes;
        //send_email($setting['email'], $subject, $body);
        send_email('kelvingraddick+allgamehunting@gmail.com', $subject, $body);
    }

    header("Location: success.php");

    function send_email($email_address, $subject, $body) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->FromName = 'All Game Hunting';
        $mail->Username = "aghnotifications@gmail.com";
        $mail->Password = "AllGameHunting2016";

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AddAddress($email_address);
        //$mail->AddBCC("aadams@wavelinkllc.com");
        //$mail->AddBCC("kgraddick@wavelinkllc.com");
        //$mail->AddBCC("dclark@wavelinkllc.com");
        $mail->send();
    }
?>
