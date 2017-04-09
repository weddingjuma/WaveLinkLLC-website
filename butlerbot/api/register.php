<?php
	include 'functions.php';
	$database_connection = connect_to_database();

    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $first_name = addslashes($_POST['first_name']);
    $last_name = addslashes($_POST['last_name']);
    $wifi_alert_interval_hours = ($_POST['wifi_alert_interval_hours'] <> "" ? $_POST['wifi_alert_interval_hours'] : "1");

    $response = array();

    if (mysqli_num_rows(mysqli_query($database_connection, "SELECT email_address FROM users WHERE email_address = '$email_address'"))) {
        $response['success'] = false;
        $response['error_code'] = $ERROR_CODES['EMAIL_TAKEN'];
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
