<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/utility/phpmailer/class.phpmailer.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$notification_email = "Thevfac@Gmail.com";

	$first_name=addslashes($_POST['first_name']);
	$last_name=addslashes($_POST['last_name']);
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$text=addslashes($_POST['text']);

	if ($first_name <> "") {
		$subject = "New inquiry for ".$site_name;
		$body = "First Name: ".$first_name."<br />
				 Last Name: ".$last_name."<br />
				 Email: ".$email."<br />
				 Phone: ".$phone."<br />
				 Description: ".$text;
        send_emails($email, $setting['email'], $subject, $body, $site_name);

		if (mysqli_num_rows(mysqli_query($c, "SELECT email FROM users WHERE email = '$email' AND email <> 'none'")) || mysqli_num_rows(mysqli_query($c, "SELECT phone FROM users WHERE phone = '$phone' AND phone <> 'none'"))) {
			echo '<img src="http://www.wavelinkllc.com/images/success.png" style="height:20px;" />&nbsp;&nbsp;Your inquiry has been recorded. We will be in contact soon. Thank you!';
		} else {
			if(mysqli_query($c, "insert into users(first_name, last_name, email, phone, description) values('$first_name', '$last_name', '$email', '$phone', '$text')")){
				echo '<img src="http://www.wavelinkllc.com/images/success.png" style="height:20px;" />&nbsp;&nbsp;Your inquiry has been recorded. We will be in contact soon. Thank you!';
			} else {
				echo '<img src="http://www.wavelinkllc.com/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact '.$site_name.' administrator at '.$setting['email'];
			}
		}
	} else {
		echo '<img src="http://www.wavelinkllc.com/images/error.png" style="height:20px;" />&nbsp;&nbsp;A required field is missing. Please try again!';
	}

    function send_emails($visitor_email, $system_email, $subject, $body, $site_name) {
        //Send emails to Ready Ready Moving and Wave Link admin
        $mail = new PHPMailer();
        $mail->IsSMTP();                // Sets up a SMTP connection
        $mail->SMTPDebug  = 0;          // This will print debugging info
        $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
        $mail->SMTPSecure = "tls";      // Connect using a TLS connection
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->FromName = 'Veterans and Family Assistance Center';
        $mail->Username   = "vfacnotifications@gmail.com"; // Login
        $mail->Password   = "vfac2016"; // Password

        $mail->Subject = "Your inquiry has been received by ".$site_name.". Thank you!";     // Subject (which isn't required)
        $mail->Body = "Thank you for your inquiry!<br />We will be in contact soon!"; // Body of our message
        $mail->IsHTML(true);
        $mail->AddAddress( $visitor_email );
        $mail->send();      // Send!

        $mail->Subject = $subject;     // Subject (which isn't required)
        $mail->Body = $body; // Body of our message
        $mail->ClearAllRecipients();
        $mail->AddAddress( $system_email );
        $mail->AddBCC( "aadams@wavelinkllc.com" );
        $mail->AddBCC( "kgraddick@wavelinkllc.com" );
        $mail->send();      // Send!
    }
?>
