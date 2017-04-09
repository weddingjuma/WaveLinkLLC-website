<?php
	include 'functions.php';
	$database_connection = connect_to_database();

    $email_or_phone = $_POST['email_or_phone'];
    $password = $_POST['password'];

    $response = array();

    $data = mysqli_query($database_connection, "SELECT * FROM users WHERE (email_address='$email_or_phone' OR phone_number='$email_or_phone') AND password='$password' LIMIT 1");
    $count = mysqli_num_rows($data);

    if($count == 1){
        $response['success'] = true;
        $response['user'] = mysqli_fetch_assoc($data);
    } else {
        $response['success'] = false;
        $response['error_code'] = $ERROR_CODES['INVALID_CREDENTIALS'];
    }

	echo json_encode($response);
?>
