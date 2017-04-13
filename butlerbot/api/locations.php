<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include 'common.php';
	$database_connection = connect_to_database();

    $user_id = $_GET['user_id'];
    $offset = ($_GET['offset'] <> "" ? $_GET['offset'] : "0");
    $limit = ($_GET['limit'] <> "" ? $_GET['limit'] : PHP_INT_MAX);

	$data = mysqli_query($database_connection, "SELECT * FROM `locations` WHERE user_id = $user_id LIMIT $limit OFFSET $offset")
        or die(mysqli_error($database_connection));

    $response = array();
    $response['success'] = true;
    $response['locations'] = array();

	while ($record = mysqli_fetch_array($data, MYSQL_ASSOC)) {
		array_push($response['locations'], $record);
	}

	echo json_encode($response);
?>
