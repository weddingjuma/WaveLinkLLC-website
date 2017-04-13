<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include 'common.php';
	$database_connection = connect_to_database();

    $POST = json_decode(trim(file_get_contents("php://input")), true);
    $user_id = $POST['user_id'];
    $name = addslashes($POST['name']);
    $type = $POST['type'];
    $longitude = $POST['longitude'];
    $latitude = $POST['latitude'];
    $enabled = $POST['enabled'];

    $response = array();

    if (mysqli_query($database_connection, "INSERT INTO locations(user_id, name, type, longitude, latitude, enabled) VALUES('$user_id', '$name', '$type', '$longitude', '$latitude', '$enabled')")) {
		$response['success'] = true;
        $id = mysqli_insert_id($database_connection);
        $response['location'] = mysqli_fetch_assoc(mysqli_query($database_connection, "SELECT * FROM locations WHERE id='$id' LIMIT 1"));
	} else {
		$response['success'] = false;
        $response['error_code'] = $ERROR_CODES['DATABASE_PROBLEM'];
	}

	echo json_encode($response);
?>
