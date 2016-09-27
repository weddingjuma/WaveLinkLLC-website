<?php
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];

	if(mysqli_query($c, "delete from categories where id = '$id'")){
		header("Location: index.php");
	}else{
		header("Location: error.php");
	}
?>
