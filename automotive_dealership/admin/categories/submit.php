<?php
	include $_SERVER['DOCUMENT_ROOT'].'/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_POST['id'];
	$name = addslashes($_POST['name']);
	$value = preg_replace("/[^a-zA-Z0-9 ]/", "", $_POST['value']);
	$type = addslashes($_POST['type']);
	$featured = isset($_POST['featured']) && $_POST['featured'] ? "yes" : "no";
	$description = addslashes($_POST['description']);
	$url = addslashes($_POST['url']);
	$image = $_POST['image']; if($image == "") { $image = "none"; }
	
	$filenames = array($image);
	$target_dir = "../../images/application/";
	$i = 0;
	$file_array = reArrayFiles($_FILES['file']);
	foreach($file_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
		$filename = $i . date("YmdHis") . "category." . $extension;
		$target_file = $target_dir . $filename;
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
				$filenames[$i] = "/images/application/" . $filename;
				//echo "File uploaded.<br />"; 
			} else { }
		}
		
		$i++;
	}
	
	if($id == "") {
		if(mysqli_query($c, "insert into categories(name, value, type, featured, description, url, image) 
						values('$name', '$value', '$type', '$featured', '$description', '$url', '$filenames[0]')")){
			header("Location: index.php");
		}else{ 
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	} else {
		if(mysqli_query($c, "update categories set name = '$name', value = '$value', type = '$type', featured = '$featured', description = '$description', url = '$url', image = '$filenames[0]' where id = '$id'")){
			header("Location: index.php");
		}else{ 
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	}
?>