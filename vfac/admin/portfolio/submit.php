<?php
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_POST['id'];
	$title = addslashes($_POST['title']);
	$description = addslashes($_POST['description']);
	$category1 = $_POST['category1'];
	$category2 = $_POST['category2'];
	$category3 = $_POST['category3'];
	$image1 = $_POST['image1']; if($image1 == "") { $image1 = "none"; }
	$image2 = $_POST['image2']; if($image2 == "") { $image2 = "none"; }
	$image3 = $_POST['image3']; if($image3 == "") { $image3 = "none"; }
	$image4 = $_POST['image4']; if($image4 == "") { $image4 = "none"; }
	$image5 = $_POST['image5']; if($image5 == "") { $image5 = "none"; }
	$image6 = $_POST['image6']; if($image6 == "") { $image6 = "none"; }
	$image7 = $_POST['image7']; if($image7 == "") { $image7 = "none"; }
	$image8 = $_POST['image8']; if($image8 == "") { $image8 = "none"; }
	
	$filenames = array($image1,$image2,$image3,$image4,$image5,$image6,$image7,$image8);
	$target_dir = "../../images/application/";
	$i = 0;
	$file_array = reArrayFiles($_FILES['file']);
	foreach($file_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
		$target_file = $target_dir . $i . date("YmdHis") . "product." . $extension;
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
				$filenames[$i] = "/vfac/images/application/" . $i . date("YmdHis") . "product." . $extension;
				//echo "File uploaded.<br />"; 
			} else { }
		}
		
		$i++;
	}
	
	if($id == "") {
		if(mysqli_query($c, "insert into portfolio(title, description, category1, category2, category3, image1, image2, image3, image4, image5, image6, image7, image8) 
						values('$title', '$description', '$category1', '$category2', '$category3', '$filenames[0]', '$filenames[1]', '$filenames[2]', '$filenames[3]', '$filenames[4]', '$filenames[5]', '$filenames[6]', '$filenames[7]')")){
			header("Location: index.php");
		}else{ 
			//header("Location: error.php");
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	} else {
		if(mysqli_query($c, "update portfolio set title = '$title', description = '$description', category1 = '$category1', category2 = '$category2', category3 = '$category3', image1 = '$filenames[0]', image2 = '$filenames[1]', image3 = '$filenames[2]', image4 = '$filenames[3]', image5 = '$filenames[4]', image6 = '$filenames[5]', image7 = '$filenames[6]', image8 = '$filenames[7]' where id = '$id'")){
			header("Location: index.php");
		}else{ 
			//header("Location: error.php");
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	}
?>