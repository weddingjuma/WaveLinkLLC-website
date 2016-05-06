<?php
	include '../authentication.php';
	include '../utility/database.php';
	include '../utility/functions.php';
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$contract_url = addslashes($_POST['contract_url']);
	$description = addslashes($_POST['description']);
	$datetime = date("YmdHis");
	$code = $user_id.$datetime;
	
	if($id == "") {
		if(mysql_query("insert into contracts(user_id, code, description, contract_url) values('$user_id', '$code', '$description', '$contract_url')")){
			header("Location: index.php");
		}else{ 
			//header("Location: error.php");
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	} else {
		if(mysql_query("update contracts set user_id = '$user_id', description = '$description', contract_url = '$contract_url' where id = '$id'")){
			header("Location: index.php");
		}else{ 
			//header("Location: error.php");
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	}
?>