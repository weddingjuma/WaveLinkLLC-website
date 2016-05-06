<?php
	include $_SERVER['DOCUMENT_ROOT'].'/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_POST['id'];
	$name = addslashes($_POST['name']);
	$phone = addslashes($_POST['phone']);
	$address1 = addslashes($_POST['address1']);
	$address2 = addslashes($_POST['address2']);
	$city = addslashes($_POST['city']);
	$state = addslashes($_POST['state']);
	$zip = addslashes($_POST['zip']);
	$weekday_hours = addslashes($_POST['weekday_hours']);
	$saturday_hours = addslashes($_POST['saturday_hours']);
	$sunday_hours = addslashes($_POST['sunday_hours']);
	$photo = $_POST['photo']; if($photo == "") { $photo = "none"; }
	
	$filenames = array($photo);
	$target_dir = "../../images/application/";
	$i = 0;
	$file_array = reArrayFiles($_FILES['file']);
	foreach($file_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
		$target_file = $target_dir . $i . date("YmdHis") . "store." . $extension;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		$check = getimagesize($file["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".<br />";
			$uploadOk = 1;
		} else {
			//echo "File is not an image.<br />";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			//echo "There was a problem with the file.";
		} else {
			if (move_uploaded_file($file["tmp_name"], $target_file)) { 
				$filenames[$i] = "/images/application/" . $i . date("YmdHis") . "store." . $extension;
				//echo "File uploaded.<br />"; 
			} else { }
		}
		
		$i++;
	}
	
	if($id == "") {
		if(mysqli_query($c, "insert into stores(name, photo, phone, address1, address2, city, state, zip, weekday_hours, saturday_hours, sunday_hours) 
						values('$name', '$filename[0]', '$phone', '$address1', '$address2', '$city', '$state', '$zip', '$weekday_hours', '$saturday_hours', '$sunday_hours')")){
			header("Location: index.php");
		}else{ 
			//header("Location: error.php");
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	} else {
		if(mysqli_query($c, "update stores set name = '$name', photo = '$filename[0]', phone = '$phone', address1 = '$address1', address2 = '$address2', city = '$city', state = '$state', zip = '$zip', weekday_hours = '$weekday_hours', saturday_hours = '$saturday_hours', sunday_hours = '$sunday_hours' where id = '$id'")){
			header("Location: index.php");
		}else{ 
			//header("Location: error.php");
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	}
?>