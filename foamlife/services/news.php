<?php
	include 'functions.php';
	$database_connection = connect_to_database();
    $offset = ($_POST['offset'] <> "" ? $_POST['offset'] : "0");
    $limit = ($_POST['limit'] <> "" ? $_POST['limit'] : PHP_INT_MAX);

	$data = mysqli_query($database_connection, "SELECT * FROM `news` ORDER BY timestamp DESC LIMIT $limit OFFSET $offset")
        or die(mysqli_error($database_connection));

    $response = array();
	while ($record = mysqli_fetch_array($data, MYSQL_ASSOC)) {
		array_push($response, $record);
	}

	echo json_encode($response);
?>
