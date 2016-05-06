<?php
include '../utility/database.php';
include '../utility/functions.php';

$user_id=$_POST['user_id'];
if($user_id==""){ $user_id = "none"; }
$code=$_POST['code'];
if($code==""){ $code = "none"; }
$email=$_POST['email'];
if($email==""){ $email = "n/a"; }
$phone=$_POST['phone'];
if($phone==""){ $phone = "n/a"; }
$signature=$_POST['signature'];
if($signature==""){ $signature= "none"; }
 
$status = "OK";
$msg="";
$response = array();

if(($email=="n/a")&&($phone=="n/a")){
	$msg=$msg."You must enter either an email or phone number. Please retry.";
	$status= "NOTOK";
}	

$time = date("Y-m-d h:i:s");
$filename = "signatures/signature-".$user_id."-".date("YmdHis").".svg";
$dbfilename = "http://www.wavelinkllc.com/sign/".$filename;
$newfile = fopen($filename, "w") or die("Unable to open file!");
fwrite($newfile, $signature);
fclose($newfile);

if($status<>"OK"){
	$response['status'] = "FAILURE";
	$response['html'] = '<img src="../images/error.png" style="height:40px;" />&nbsp;&nbsp;'.$msg;
	$response['text'] = $msg;
	echo json_encode($response);
}else{
	if(mysql_num_rows(mysql_query("SELECT id FROM `users` WHERE id='$user_id' AND (email='$email' OR phone='$phone')"))){
		if(mysql_query("UPDATE contracts SET signature_url='$dbfilename', date_signed='$time' WHERE code='$code'")){
			$id = mysql_insert_id;
			$time = date("YmdHis");
			$description = @mysql_result(mysql_query("SELECT description FROM contracts WHERE id = '$id'"), 0);
			
			$subject = "New signature from: ".$email." - ".$phone;
			$body = "Description: ".$description."<br />Email: ".$email."<br />Phone: ".$phone."<br />Signature: ".$dbfilename;
			$admins = array(); 
			$admins[0] = "('aadams@wavelinkllc.com', '$subject', '$body', '$time', 'contract_signed', '$id')";
			$admins[1] = "('kgraddick@wavelinkllc.com', '$subject', '$body', '$time', 'contract_signed', '$id')";
			$admins[2] = "('dclark@wavelinkllc.com', '$subject', '$body', '$time', 'contract_signed', '$id')";
			if(mysql_query("insert into emails (`to`, subject, text, time, type, reference_id) VALUES ".implode(',', $admins))) { } else { }
			
			//Send email to user			
			$to = @mysql_result(mysql_query("SELECT email FROM users WHERE id = '$user_id'"),0);
			$subject = "Thank you for signing your Wave Link, LLC contract!";
			$body = "Thanks!<br />We will contact you ASAP and we look forward to working with you!<br />Please reply to this email immediately if you did not personally sign this contract.<br />Signature: ".$dbfilename;
			if(mysql_query("insert into emails (`to`, subject, text, time, type, reference_id) VALUES ('$to', '$subject', '$body', '$time', 'contract_signed', '$id')")) { } else { }
			
			$response['status'] = "SUCCESS";
			echo json_encode($response);
					
		}else{ 
			$response['status'] = "FAILURE";
			$msg = "Database problem.\nContact wavelinkllc.com administrator.";
			$response['html'] = '<img src="../images/error.png" style="height:40px;" />&nbsp;&nbsp;'.$msg;
			$response['text'] = $msg;
			echo json_encode($response);
		}
	}else{ 
		$response['status'] = "FAILURE";
		$msg = "Your phone number or email did not match what we have on file for the contract.\nFeel free to contact us to make sure that we have the correct email/phone for you.";
		$response['html'] = '<img src="../images/error.png" style="height:40px;" />&nbsp;&nbsp;'.$msg;
		$response['text'] = $msg;
		echo json_encode($response);
	}
}

?>