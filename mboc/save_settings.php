<?php
include 'functions.php';
$c = connect_to_database();

$userId = $_POST['userId'];
$vin=addslashes($_POST['vin']);
$name=addslashes($_POST['name']);
$email=addslashes($_POST['email']);
$phone=addslashes($_POST['phone']);

$responseData = array();
 
$status = "OK";
$msg="";		

if(check_email($email)==false){
	$msg=$msg."The email address is not a valid address.\n";
	$status= "NOTOK";
}else{
	if(mysqli_num_rows(mysqli_query($c, "SELECT email FROM users WHERE userId <> '$userId' AND email = '$email'"))){
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
	if(mysqli_query($c, "UPDATE `users` SET `vin` = '$vin', `name` = '$name', `email` = '$email', `phone` = '$phone'".($photo <> "" ? ", `photo` = '".$photo."'": "")." WHERE id = '$userId'")){
		$responseData['response'] = 'SUCCESS';		
	}else{ 
		$responseData['response'] = "Database Error: Problem updating user in the database. Contact Mercedes-Benz of Columbus administrator.";
	}
}

echo json_encode($responseData);
?>