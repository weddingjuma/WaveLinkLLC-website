<?php
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	
	if(mysqli_query($c, "delete from users where id = '$id'")){
		header("Location: index.php");
	}else{ 
		header("Location: error.php");
		//echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
	}
?>