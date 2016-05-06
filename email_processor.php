<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'phpmailer/class.phpmailer.php';
include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
$c = connect_to_database();

$mail = new PHPMailer();
$mail->IsSMTP();                // Sets up a SMTP connection
$mail->SMTPDebug = 2;          // This will print debugging info
$mail->Debugoutput = 'html';
$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
$mail->SMTPSecure = "tls";      // Connect using a TLS connection
$mail->Host = "smtp.office365.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->AddReplyTo('notifications@wavelinkllc.com', 'Wave Link, LLC');
$mail->FromName = 'Wave Link, LLC';
$mail->setFrom('notifications@wavelinkllc.com', 'Wave Link, LLC');
$mail->Username   = "notifications@wavelinkllc.com"; // Login
$mail->Password   = "URTruth2016"; // Password

$look_back_date = date("YmdHis", mktime(date('H') - 5, date('i'), date('s'), date('m'), date('d'), date('Y'), -1));
$result = mysqli_query($c, "
	SELECT * FROM `emails` 
	WHERE is_sent = 0 AND (time > $look_back_date) ORDER BY time ASC LIMIT 50")
	or die(mysql_error());

while($email = mysqli_fetch_array( $result, MYSQL_ASSOC )) {
	try {
		echo "<br /><br />To: ".$email['to']."<br />Subject: ".$email['subject']."<br />Text: ".$email['text']."<br />";
		$id = $email['id'];
		mysqli_query($c, "UPDATE `emails` SET is_sent = 1 WHERE id = '$id'") or die(mysql_error());
		send_email($mail, $email['to'], $email['subject'], $email['text']);
	} catch (Exception $e) {
		//TODO: add db error logging
		echo '<br />Caught exception: ',  $e->getMessage(), "\n";
	}
}

function send_email($mail, $to, $subject, $text) {
	$mail->Subject = $subject;     // Subject (which isn't required)
	$body = '
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<link href=\'http://fonts.googleapis.com/css?family=Lato:300,400,700\' rel=\'stylesheet\' type=\'text/css\'>
			<style type="text/css">   
				body {margin:0; padding:0; font-family: \'Lato\', sans-serif; }
				table {border-spacing:0;}
				table td {border-collapse:collapse;}
			</style>
		</head>
		<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ebebeb">
			<tr>
				<td align="center" valign="top" bgcolor="#ebebeb" style="background-color: #ebebeb;">
					<br />
					<br />
					<table style="width:700px;">
						<td style="width:50px;">
						</td>
						<td style="width:600px;">
							<table border="0" width="600" cellpadding="0" cellspacing="0" class="container">
								<tr>
									<td>
										<div style="width:600px; text-align:left; background-color:white; border:1px solid #dfdfdf; border-bottom:none;
										-moz-box-shadow: 3px 3px 3px 3px #ccc; -webkit-box-shadow: 3px 3px 3px 3px #ccc; box-shadow: 3px 3px 3px 3px #ccc;
										-webkit-border-top-left-radius: 4px; -webkit-border-top-right-radius: 4px;
										-moz-border-radius-topleft: 4px; -moz-border-radius-topright: 4px;
										border-top-left-radius: 4px; border-top-right-radius: 4px;">
											<img src="http://www.wavelinkllc.com/images/WaveLink_Logo.png" width="110" style="padding:5px;">
										</div>
									</td>
								<tr>
									<td style="background-color: #ffffff; padding: 25px; font-size: 14px; line-height: 20px; color: #333; border:1px solid #dfdfdf;
									-moz-box-shadow: 3px 3px 3px 3px #ccc; -webkit-box-shadow: 3px 3px 3px 3px #ccc; box-shadow: 3px 3px 3px 3px #ccc;
									-webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px;
									-moz-border-radius-bottomright: 4px; -moz-border-radius-bottomleft: 4px;
									border-bottom-right-radius: 4px; border-bottom-left-radius: 4px;">
										<table>
											<tr>
												<td style="color:#515151; font-weight:100; vertical-align:top;">
													'.$text.'
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<br />
							<table style="width:600px; text-align:left; font-size:11px; color:#6b6b6b;">
								<tr>
									<td>
										You are receiving Wave Link, LLC admin panel emails because this address is subscribed.
										If you need assistance or have questions, please contact Wave Link, LLC Customer Service.<br />
										© 2014
									</td>
								</tr>
							</table>
							<div style="height:1000px;"></div>
						</td>
						<td style="width:50px;">
						</td>
					</table>
				</td>
			</tr>
		</table>
	';
	$mail->Body = $body; // Body of our message
	$mail->ClearAllRecipients();
	$mail->AddAddress( $to );
	$mail->send();      // Send!
}

?>