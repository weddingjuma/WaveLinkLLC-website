<?php
include '/utility/database.php';
include '/utility/functions.php';

$firstname=$_POST['firstname'];
if($firstname==""){ $firstname = "none"; }
$lastname=$_POST['$lastname'];
if($lastname==""){ $lastname = "none"; }
$email=$_POST['email'];
if($email==""){ $email = "none"; }
$phone=$_POST['phone'];
if($phone==""){ $phone = "none"; }
$description=$_POST['description'];
if($description==""){ $description= "none"; }
$url=$_POST['$url'];
if($url==""){ $url = "none"; }
 
$status = "OK";
$msg="";

if(($email=="none")&&($phone=="none")){
	$msg=$msg."You must enter either an email or phone number. Please retry.&nbsp;";
	$status= "NOTOK";
}	

if($email<>"none"){
	if(check_email($email)==false){
		$msg=$msg."The email address is not valid. Please try another.&nbsp;";
		$status= "NOTOK";
	}
}	

if($status<>"OK"){
	echo '<img src="http://www.wavelinkllc.com/images/error.png" style="height:40px;" />&nbsp;&nbsp;'.$msg;
}else{
	if(mysql_num_rows(mysql_query("SELECT email FROM users WHERE email = '$email' AND email <> 'none'")) ||
	   mysql_num_rows(mysql_query("SELECT phone FROM users WHERE phone = '$phone' AND phone <> 'none'"))) {
		$id = mysql_insert_id;
		$time = date("YmdHis");
		
		$subject = "Repeat inquiry from wavelinkllc.com";
		$body = "First Name: ".$firstname."<br />Last Name: ".$lastname."<br />Email: ".$email."<br />Phone: ".$phone;
		$admins = array(); 
		$admins[0] = "('aadams@wavelinkllc.com', '$subject', '$body', '$time', 'new_user', '$id')";
		$admins[1] = "('kgraddick@wavelinkllc.com', '$subject', '$body', '$time', 'new_user', '$id')";
		$admins[2] = "('dclark@wavelinkllc.com', '$subject', '$body', '$time', 'new_user', '$id')";
		if(mysql_query("insert into emails (`to`, subject, text, time, type, reference_id) VALUES ".implode(',', $admins))) { } else { }
		
		echo '<img src="http://www.wavelinkllc.com/images/success.png" style="height:40px;" />&nbsp;&nbsp;We will contact you shortly as this email and/or phone number has <u>already been added to our email list</u>. <i>Thank you!</i>';
	}else{
		if(mysql_query("insert into users(first_name, last_name, email, phone, description, url) values('$firstname', '$lastname', '$email', '$phone', '$description', '$url')")){
			$id = mysql_insert_id;
			$time = date("YmdHis");
			
			$subject = "New inquiry from wavelinkllc.com";
			$body = "First Name: ".$firstname."<br />Last Name: ".$lastname."<br />Email: ".$email."<br />Phone: ".$phone;
			$admins = array(); 
			$admins[0] = "('aadams@wavelinkllc.com', '$subject', '$body', '$time', 'new_user', '$id')";
			$admins[1] = "('kgraddick@wavelinkllc.com', '$subject', '$body', '$time', 'new_user', '$id')";
			$admins[2] = "('dclark@wavelinkllc.com', '$subject', '$body', '$time', 'new_user', '$id')";
			if(mysql_query("insert into emails (`to`, subject, text, time, type, reference_id) VALUES ".implode(',', $admins))) { } else { }
			
			//Send email to user			
			$to = $email;
			$subject = "You have been added to the contact list for Wave Link!";
			$body = "Thanks!<br />We will contact you ASAP and also keep you up-to-date on Wave Link news and deals.<br />P.S. If you wish to be removed please email notifications@wavelinkllc.com";
			if(mysql_query("insert into emails (`to`, subject, text, time, type, reference_id) VALUES ('$to', '$subject', '$body', '$time', 'new_user', '$id')")) { } else { }
	
			echo '<img src="http://www.wavelinkllc.com/images/success.png" style="height:20px;" />&nbsp;&nbsp;We will contact you ASAP and we\'ve sent you a welcome email. <i>Thank you!</i>';				
		}else{ 
			echo '<img src="http://www.wavelinkllc.com/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	}
}

?>