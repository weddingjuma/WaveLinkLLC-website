<?php
	include 'functions.php';
	$c = connect_to_database();
	$email = ($_POST['email'] <> "" ? $_POST['email'] : "none");
	$phone = ($_POST['phone'] <> "" ? $_POST['phone'] : "none");

	$responseData = array();
	
	$result = mysqli_query($c,"SELECT vin FROM `sales` WHERE email LIKE '%$email%' OR home_phone LIKE '%$phone%' OR work_phone LIKE '%$phone%' LIMIT 1")
	or die(mysqli_error($c));
	
	while($row = mysqli_fetch_array( $result, MYSQL_ASSOC )) {
		array_push($responseData, $row); 
	}

	echo json_encode($responseData);
?>