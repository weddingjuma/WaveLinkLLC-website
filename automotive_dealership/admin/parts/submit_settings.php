<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	
	$header_image_url = $_POST['header_image_url']; if($header_image_url == "") { $header_image_url = "none"; }
	$header_text_color = addslashes($_POST['header_text_color']);
	
	$valid = ($header_text_color == "" ? false : true);
	
	$filenames = array($header_image_url);
	$target_dir = "../../images/application/";
	$i = 0;
	$file_array = reArrayFiles($_FILES['file']);
	foreach($file_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
		$filename = $i . date("YmdHis") . "setting." . $extension;
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
	
	if($valid && mysqli_query($c,
		"UPDATE settings
    	SET value = CASE code
    		WHEN 'header_image_url' THEN '$filenames[0]'
    		WHEN 'header_text_color' THEN '$header_text_color'
		END
		WHERE code IN 
		(
			'header_image_url',
			'header_text_color'
		)
		AND page = 'parts'"
	)){
		header("Location: index.php");
	}else{ 
		echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
	}
?>