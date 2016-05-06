<?php
include 'functions.php';
$c = connect_to_database();

$type=$_POST['type'];
$vin=addslashes($_POST['vin']);
$name=addslashes($_POST['name']);
$email=addslashes($_POST['email']);
$phone=addslashes($_POST['phone']);
$message=addslashes($_POST['message']);
$contact_method=($_POST['contact_method'] <> "" ? $_POST['contact_method'] : "phone");

$responseData = array();
 
$status = "OK";
$msg="";

if ($name=="") {
	$msg=$msg."You must enter a name.\n";
	$status= "NOTOK";
}	

if ( strlen($name) > 40){
	$msg=$msg."Name must be less than 40 characters in length.\n";
	$status= "NOTOK";
}

if ($email <> "") {
	if(check_email($email)==false){
		$msg=$msg."The email address is not a valid address.\n";
		$status= "NOTOK";
	}
	if ( strlen($email) > 40){
		$msg=$msg."Email must be less than 40 characters in length.\n";
		$status= "NOTOK";
	}
}						

if ($phone <> "") {
	if (strlen($phone) != 10){
		$msg=$msg."Phone number must be 10 digits in length.\n";
		$status= "NOTOK";
	}
}

if ($message <> "") {
	if ( strlen($message) > 500){
		$msg=$msg."Message must be less than 500 characters in length.\n";
		$status= "NOTOK";
	}
}

if($status<>"OK"){
	$responseData['response'] = $msg;
}else{
	//if(mysqli_query($c, "insert into inquiries(vin,name,email,phone,message,contact_method) values('$vin','$name','$email','$phone','$message','$contact_method')")){
		
		//Schedule email for new user
		$subject = "Thank you for contacting Mercedes-Benz of Columbus!";
		$body = 'Hi '.$name.', <b>Welcome to Mercedes-Benz of Columbus</b><br />Someone will be in contact shortly!';

		require '/phpmailer/class.phpmailer.php';
		require '/phpmailer/class.smtp.php';
		$mail = new PHPMailer();
		$mail->IsSMTP();                // Sets up a SMTP connection
		$mail->IsHTML(true);            // Intepret HTML
		$mail->SMTPDebug  = 1;          // This will print debugging info
		$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
		$mail->SMTPSecure = "tls";      // Connect using a TLS connection
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->Encoding = '7bit';       // SMS uses 7-bit encoding
		$mail->FromName = 'Mercedes-Benz of Columbus';
		$mail->Username   = "wavelinkdevelopment@gmail.com"; // Login
		$mail->Password   = "WaveLink2014"; // Password
		$mail->Subject = $subject;     // Subject (which isn't required)
		$mail->Body = $body; // Body of our message
		$mail->AddAddress( $email );
		$mail->AddBCC( "kgraddick@wavelinkllc.com" ); 
		$mail->AddBCC( "aadams@wavelinkllc.com" ); 
		$mail->send();      // Send!
		 
		// Schedule emails for Mercedes-Benz of Columbus admin
		$subject = "NEW INQUIRY: ".$name." (".$email.") has a \"".$type."\" inquiry!";
		$body = "Type: ".$type."<br />Name: ".$name."<br />Email: ".$email."<br />Phone: ".$phone."<br />Preferred Contact Method: ".$contact_method."<br />Message: ".$message."<br />VIN: ".$vin;
		
		$mail->ClearAllRecipients(); // clear all
		$mail->Subject = $subject;     // Subject (which isn't required)
		$mail->Body = $body; // Body of our message
		//$mail->AddAddress( "mercedes-benz@gmail.com" );
		//$mail->AddAddress( "nadiemartin@mercedesbenzcsg.com" );
		//$mail->AddAddress( "johnkuntz@mercedesbenzcsg.com" );
		$mail->AddAddress( "info@mercedesbenzcsg.com" );
		$mail->AddBCC( "kgraddick@wavelinkllc.com" ); 
		//$mail->AddBCC( "aadams@wavelinkllc.com" ); 
		$mail->send();      // Send!
		
		$responseData['response'] = 'SUCCESS';		
	//}else{ 
	//	$responseData['response'] = "Database Error: Problem inserting new user into the database. Contact Mercedes-Benz of Columbus administrator.";
	//}
}

echo json_encode($responseData);
?>