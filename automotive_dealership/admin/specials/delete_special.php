<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	
	if(mysqli_query($c, "delete from specials where id = '$id'")){
		header("Location: index.php");
	}else{ 
		header("Location: error.php");
	}
?>