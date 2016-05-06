<?php
include 'functions.php';
$c = connect_to_database();

$vin=addslashes($_POST['vin']);
$name=addslashes($_POST['name']);
$email=addslashes($_POST['email']);
$phone=addslashes($_POST['phone']);
$facebookId=$_POST['facebookId'];
$twitterId=$_POST['twitterId'];
$digitsId=$_POST['digitsId'];
$iOSdeviceToken=$_POST['iOSdeviceToken'];
$androidDeviceToken=$_POST['androidDeviceToken']; 

$responseData = array();
 
$status = "OK";
$msg="";		

if(check_email($email)==false){
	$msg=$msg."The email address is not a valid address.\n";
	$status= "NOTOK";
}else{
	if(mysqli_num_rows(mysqli_query($c, "SELECT email FROM users WHERE email = '$email'"))){
		$msg=$msg."There is already an account by this email. Please try another one.\n";
		$status= "NOTOK";
	}	
}						

if ($name=="") {
$msg=$msg."You must enter a name.\n";
$status= "NOTOK";}	

if ( strlen($name) > 40){
$msg=$msg."Name must be less than 40 characters in length.\n";
$status= "NOTOK";}

if ($phone <> "") {
	if (strlen($phone) != 10){
		$msg=$msg."Phone number must be 10 digits in length.\n";
		$status= "NOTOK";
	}
}

if($facebookId <> "" && mysqli_num_rows(mysqli_query($c, "SELECT facebookId FROM users WHERE facebookId = '$facebookId'"))){
	$msg=$msg."There is already an account connected to this Facebook account.\n";
	$status= "NOTOK";
}

if($twitterId <> "" && mysqli_num_rows(mysqli_query($c, "SELECT twitterId FROM users WHERE twitterId = '$twitterId'"))){
	$msg=$msg."There is already an account connected to this Twitter account.\n";
	$status= "NOTOK";
}

if($digitsId <> "" && mysqli_num_rows(mysqli_query($c, "SELECT digitsId FROM users WHERE digitsId = '$digitsId'"))){
	$msg=$msg."There is already an account connected to this phone number.\n";
	$status= "NOTOK";
}		

$photo = "";
if($_FILES["file"]["name"] && $status == "OK"){
	$target_dir = "images/application/";
	$extension = getExtension(stripslashes($_FILES['file']['name']));
	$extension = strtolower($extension);
	$filename = date("YmdHis") . "user." . $extension;
	$target_file = $target_dir . $filename;
	if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) { 
		$photo = "/images/application/" . $filename;
	} else { }
}

if($status<>"OK"){
	$responseData['response'] = $msg;
}else{
	if(mysqli_query($c, "insert into users(vin,name,email,phone,photo,facebookId,twitterId,digitsId) values('$vin','$name','$email','$phone','$photo','$facebookId','$twitterId','$digitsId')")){
		$time = date("YmdHis");
		$userId = mysqli_insert_id($c);
		
		//Schedule email for new user
		$subject = "Thank you for joining the Mercedes-Benz of Columbus app!";
		$body = 'Hi '.$name.', <b>Welcome to Mercedes-Benz of Columbus</b>';

		require '/phpmailer/class.phpmailer.php';
		require '/phpmailer/class.smtp.php';
		$mail = new PHPMailer();
		$mail->IsSMTP();                // Sets up a SMTP connection
		$mail->SMTPDebug  = 0;          // This will print debugging info
		$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
		$mail->SMTPSecure = "tls";      // Connect using a TLS connection
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->Encoding = '7bit';       // SMS uses 7-bit encoding
		$mail->FromName = 'Mercedes-Benz of Columbus';
		$mail->Username   = "wavelinkdevelopment@gmail.com"; // Login
		$mail->Password   = "wavelink2014"; // Password
		$mail->Subject = $subject;     // Subject (which isn't required)
		$mail->Body = $body; // Body of our message
		$mail->AddAddress( $email );
		$mail->AddAddress( "kelvingraddick@gmail.com" );
		$mail->send();      // Send!
		 
		// Schedule emails for Mercedes-Benz of Columbus admin
		$subject = "NEW USER: ".$name." (".$email.") joined the Mercedes-Benz of Columbus app!";
		$body = "Name: ".$name."<br />Email: ".$email."<br />Phone: ".$phone."";
		
		$mail->ClearAllRecipients(); // clear all
		$mail->Subject = $subject;     // Subject (which isn't required)
		$mail->Body = $body; // Body of our message
		//$mail->AddAddress( "mercedes-benz@gmail.com" );
		$mail->AddAddress( "kelvingraddick@gmail.com" );
		$mail->send();      // Send!
		
		$responseData['response'] = 'SUCCESS';
		$responseData['userId'] = $userId."";
		
		update_devices($userId."", $iOSdeviceToken, $androidDeviceToken);
				
	}else{ 
		$responseData['response'] = "Database Error: Problem inserting new user into the database. Contact Mercedes-Benz of Columbus administrator.";
	}
}

echo json_encode($responseData);
?>