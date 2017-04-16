<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include '../../common.php';
	$database_connection = connect_to_database();

    $POST = json_decode(trim(file_get_contents("php://input")), true);
    $id = $POST['id'];
    $user_id = $POST['user_id'];

    $response = array();

    if (mysqli_query($database_connection, "DELETE FROM locations WHERE id='$id' AND user_id='$user_id'")) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error_code'] = $ERROR_CODES['DATABASE_PROBLEM'];
    }

	echo json_encode($response);
?>
