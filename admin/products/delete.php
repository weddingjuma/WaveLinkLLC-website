<?php
	include '../authentication.php';
	include '../utility/database.php';
	include '../utility/functions.php';
	$id = $_GET['id'];
	
	if(mysql_query("delete from products where id = '$id'")){
		header("Location: index.php");
	}else{ 
		header("Location: error.php");
		//echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
	}
?>