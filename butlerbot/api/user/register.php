<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include '../../common.php';
	$database_connection = connect_to_database();

    $POST = json_decode(trim(file_get_contents("php://input")), true);
    $email_address = $POST['email_address'];
    $phone_number = $POST['phone_number'];
    $password = password_hash($POST['password'], PASSWORD_DEFAULT);
    $first_name = addslashes($POST['first_name']);
    $last_name = addslashes($POST['last_name']);
    $wifi_alert_interval_hours = ($POST['wifi_alert_interval_hours'] <> "" ? $POST['wifi_alert_interval_hours'] : "5");

    $response = array();

    if (mysqli_num_rows(mysqli_query($database_connection, "SELECT email_address FROM users WHERE email_address = '$email_address'"))) {
        $response['success'] = false;
        $response['error_code'] = $ERROR_CODES['EMAIL_TAKEN'];
    } else if (mysqli_num_rows(mysqli_query($database_connection, "SELECT phone_number FROM users WHERE phone_number = '$phone_number'"))) {
        $response['success'] = false;
        $response['error_code'] = $ERROR_CODES['PHONE_TAKEN'];
	} else if (mysqli_query($database_connection, "INSERT INTO users(email_address, phone_number, password, first_name, last_name, wifi_alert_interval_hours) VALUES('$email_address', '$phone_number', '$password', '$first_name', '$last_name', '$wifi_alert_interval_hours')")) {
		$response['success'] = true;
        $id = mysqli_insert_id($database_connection);
        $response['user'] = mysqli_fetch_assoc(mysqli_query($database_connection, "SELECT * FROM users WHERE id='$id' LIMIT 1"));
	} else {
		$response['success'] = false;
        $response['error_code'] = $ERROR_CODES['DATABASE_PROBLEM'];
	}

	echo json_encode($response);
?>
