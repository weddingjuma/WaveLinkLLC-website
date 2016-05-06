<?php
	include '/utility/database.php';
	include '/utility/functions.php';

	// username and password sent from form 
	$email=$_POST['email'];
	$password=$_POST['password'];
	$session_email=$email; 
	$session_password=$password; 
	  
	// To protect MySQL injection (more detail about MySQL injection)
	$email = stripslashes($email);
	$password = stripslashes($password);
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);
	  
	$session = $_COOKIE['email'].$_SERVER["REMOTE_ADDR"];
	if((mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE session='$session'")))&&($email=="")){
		$email = mysql_result(mysql_query("SELECT email FROM `users` WHERE session='$session'"),0);
		$password = mysql_result(mysql_query("SELECT password FROM `users` WHERE session='$session'"),0);
		session_start();
		$_SESSION["email"] = $email;
		$_SESSION["password"] = $password; 
		header("Location: http://".$_SERVER['SERVER_NAME']."/admin/settings/");
	}else{
		$sql="SELECT * FROM users WHERE email='$email' and password='$password'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count==1){
			session_start();
			$_SESSION["email"] = $session_email;
			$_SESSION["password"] = $session_password; 
			setcookie("email", $session_email, time()+3600*24*1, "/"); //expire in 24 hours or 1 day
			if(mysql_query("UPDATE `users` SET session='$session' WHERE email='$email' and password='$password'")){ }else{ }
			header("Location: http://".$_SERVER['SERVER_NAME']."/admin/settings/");
		}else{
			header("Location: http://".$_SERVER['SERVER_NAME']."/admin/?error=yes&email=".$session_email."&password=".$session_password."");
		}
	}
?>
