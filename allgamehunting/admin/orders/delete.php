<?php
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];

	if(mysqli_query($c, "delete from orders where id = '$id'")){
		header("Location: index.php");
	}else{
		header("Location: error.php");
	}
?>
