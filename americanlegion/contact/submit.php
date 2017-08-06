<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/utility/phpmailer/class.phpmailer.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
    $message = str_replace(',', '', addslashes($_POST['message']));
	$first_name = str_replace(',', '', addslashes($_POST['first_name']));
    $last_name = str_replace(',', '', addslashes($_POST['last_name']));
	$email_address = $_POST['email_address'];
	$phone_number = $_POST['phone_number'];
	$needs = $_POST['needs'];
    $pre_approved = $_POST['pre_approved'];
    $property_type = $_POST['property_type'];
    $subject = "New inquiry for ".$site_name;
    $body = "Message: ".$message."<br />
             First Name: ".$first_name."<br />
             Last Name: ".$last_name."<br />
             Email Address: ".$email_address."<br />
             Phone Number: ".$phone_number."<br />
             Needs: ".$needs."<br />
             Pre-Approved: ".$pre_approved."<br />
             Property Type: ".$property_type;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
    $headers .= 'From: "'.$site_name.' <'.$setting['email'].'>'."\r\n";
    mail($setting['email'], $subject, $body, $headers);
    mail("kgraddick@wavelinkllc.com", $subject, $body, $headers);
    mail("aadams@wavelinkllc.com", $subject, $body, $headers);
    mail("dclark@wavelinkllc.com", $subject, $body, $headers);
    if (!mysqli_num_rows(mysqli_query($c, "SELECT email FROM users WHERE email = '$email_address'"))) {
        if (mysqli_query($c, "INSERT INTO users (first_name, last_name, email, phone, description) VALUES ('$first_name', '$last_name', '$email_address', '$phone_number', '$body')")) { } else { }
    } else {
        if (mysqli_query($c, "UPDATE users SET first_name = '$first_name', last_name = '$last_name', phone = '$phone_number', description = '$body' WHERE email = '$email_address'")) { } else { }
    }
    header("Location: success.php");
?>
