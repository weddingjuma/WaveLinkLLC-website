<?php
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_POST['id'];
	$name = addslashes($_POST['name']);
	$email = addslashes($_POST['email']);
	$phone = addslashes($_POST['phone']);
	$vin = addslashes($_POST['vin']);
	$facebookId = $_POST['facebookId'];
	$twitterId = $_POST['twitterId'];
	$digitsId = $_POST['digitsId'];
	$photo = $_POST['photo'];
	
	$filenames = array($photo);
	$target_dir = "../../images/application/";
	$i = 0;
	$file_array = reArrayFiles($_FILES['file']);
	foreach($file_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
		$filename = $i . date("YmdHis") . "photo." . $extension;
		$target_file = $target_dir . $filename;

		if (move_uploaded_file($file["tmp_name"], $target_file)) { 
			$filenames[$i] = "/images/application/" . $filename;
			//echo "File uploaded.<br />"; 
		} else { }
		
		$i++;
	}
	
	if($id == "") {
		if(mysqli_query($c, "insert into users(name, email, phone, vin, facebookId, twitterId, digitsId, photo) values('$name', '$email', '$phone', '$vin', '$facebookId', '$digitsId', '$filenames[0]')")){
			header("Location: index.php");
		}else{ 
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	} else {
		if(mysqli_query($c, "update users set name = '$name', email = '$email', phone = '$phone', vin = '$vin', facebookId = '$facebookId', twitterId = '$twitterId', digitsId = '$digitsId', photo = '$filenames[0]' where id = '$id'")){
			header("Location: index.php");
		}else{ 
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	}
?>