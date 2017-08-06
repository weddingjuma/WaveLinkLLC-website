<?php
	include $_SERVER['DOCUMENT_ROOT'].'/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_POST['id'];
	$description = addslashes($_POST['description']);
	$address_1 = addslashes($_POST['address_1']);
    $address_2 = addslashes($_POST['address_2']);
    $city = addslashes($_POST['city']);
    $state = addslashes($_POST['state']);
    $zip = addslashes($_POST['zip']);
	$price = $_POST['price'];
    $number_of_bedrooms = $_POST['number_of_bedrooms'];
    $number_of_bathrooms = $_POST['number_of_bathrooms'];
	$image_url_1 = $_POST['image_url_1']; if($image_url_1 == "") { $image_url_1 = "none"; }
	$image_url_2 = $_POST['image_url_2']; if($image_url_2 == "") { $image_url_2 = "none"; }
	$image_url_3 = $_POST['image_url_3']; if($image_url_3 == "") { $image_url_3 = "none"; }

	$filenames = array($image_url_1, $image_url_2, $image_url_3);

    $image_array = reArrayFiles($_FILES['image_url']);
    $i = 0;
	foreach($image_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
        $filename = $i . date("YmdHis") . "image." . $extension;
        $target_file = "../../images/application/" . $filename;
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $filenames[$i] = "/images/application/" . $filename;
        }
		$i++;
	}

	if($id == "") {
		if(mysqli_query($c, "insert into properties(description, address_1, address_2, city, state, zip, price, number_of_bedrooms, number_of_bathrooms, image_url_1, image_url_2, image_url_3)
						values('$description', '$address_1', '$address_2', '$city', '$state', '$zip', '$price', '$number_of_bedrooms', '$number_of_bathrooms', '$filenames[0]', '$filenames[1]', '$filenames[2]')")){
			header("Location: index.php");
		}else{
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator. '.mysqli_error($c);
		}
	} else {
		if(mysqli_query($c, "update properties set description = '$description', address_1 = '$address_1', address_2 = '$address_2', city = '$city', state = '$state', zip = '$zip', price = '$price', number_of_bedrooms = '$number_of_bedrooms', number_of_bathrooms = '$number_of_bathrooms', image_url_1 = '$filenames[0]', image_url_2 = '$filenames[1]', image_url_3 = '$filenames[2]' where id = '$id'")){
			header("Location: index.php");
		}else{
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator. '.mysqli_error($c);
		}
	}
?>
