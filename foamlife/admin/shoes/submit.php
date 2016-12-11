<?php
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/functions.php';
	$database_connection = connect_to_database();
	$id = $_POST['id'];
	$name = addslashes($_POST['name']);
    $color = addslashes($_POST['color']);
	$description = addslashes($_POST['description']);
	$date = date('Y-m-d H:i:s', strtotime($_POST['date']));
	$category_1 = addslashes($_POST['category_1']);
	$category_2 = addslashes($_POST['category_2']);
	$category_3 = addslashes($_POST['category_3']);
	$image_url_1 = $_POST['image_url_1']; if ($image_url_1 == "") { $image_url_1 = null; }
	$image_url_2 = $_POST['image_url_2']; if ($image_url_2 == "") { $image_url_2 = null; }
	$image_url_3 = $_POST['image_url_3']; if ($image_url_3 == "") { $image_url_3 = null; }
    $ebay_url = addslashes($_POST['ebay_url']);
	$footlocker_url = addslashes($_POST['footlocker_url']);
    $enabled = isset($_POST['enabled']) && $_POST['enabled'] ? true : false;

	$image_filenames = array($image_url_1, $image_url_2, $image_url_3);
	$target_image_directory = "../../images/application/";
	$i = 0;
	$file_array = reArrayFiles($_FILES['file']);
	foreach ($file_array as $file) {
        $extension = getExtension(stripslashes($file['name']));
        $extension = strtolower($extension);
		$image_filename = $i.date('YmdHis').'shoe.'.$extension;
		$target_file = $target_image_directory.$image_filename;
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $image_filenames[$i] = '/images/application/'.$image_filename;
        } else { }
		$i++;
	}

	if ($id == "") {
		if (mysqli_query($database_connection, "insert into shoes(name, color, description, date, category_1, category_2, category_3, image_url_1, image_url_2, image_url_3, ebay_url, footlocker_url, enabled)
						                        values('$name', '$color', '$description', '$date', '$category_1', '$category_2', '$category_3', '$image_filenames[0]', '$image_filenames[1]', '$image_filenames[2]', '$ebay_url', '$footlocker_url', '$enabled')")){
			header("Location: index.php");
		} else {
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator. '.mysqli_error($database_connection);
		}
	} else {
		if (mysqli_query($database_connection, "update shoes set name = '$name', color = '$color', description = '$description', date = '$date', category_1 = '$category_1', category_2 = '$category_2', category_3 = '$category_3', image_url_1 = '$image_filenames[0]', image_url_2 = '$image_filenames[1]', image_url_3 = '$image_filenames[2]', ebay_url = '$ebay_url', footlocker_url = '$footlocker_url', enabled = '$enabled' where id = '$id'")){
			header("Location: index.php");
		} else {
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator. '.mysqli_error($database_connection);
		}
	}
?>
