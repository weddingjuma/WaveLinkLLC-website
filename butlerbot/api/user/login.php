<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include '../../common.php';
	$database_connection = connect_to_database();

    $POST = json_decode(trim(file_get_contents("php://input")), true);
    $email_or_phone = $POST['email_or_phone'];
    $password = $POST['password'];

    $response = array();

    $data = mysqli_query($database_connection, "SELECT * FROM users WHERE email_address='$email_or_phone' OR phone_number='$email_or_phone' LIMIT 1");
    $count = mysqli_num_rows($data);
    $user = mysqli_fetch_assoc($data);

    if($count == 1 && password_verify($password, $user['password'])){
        $response['success'] = true;
        $response['user'] = $user;
    } else {
        $response['success'] = false;
        $response['error_code'] = $ERROR_CODES['INVALID_CREDENTIALS'];
    }

	echo json_encode($response);
?>
