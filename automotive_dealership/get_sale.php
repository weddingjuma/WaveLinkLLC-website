<?php
	include 'functions.php';
	$c = connect_to_database();
	$vin = ($_POST['vin'] <> "" ? $_POST['vin'] : "none");

	$responseData = array();
	
	$result = mysqli_query($c,
		"SELECT sales.id AS id, 
				sales.vin AS vin, 
				stock_number,
				CONCAT_WS(' ', year, make, model) AS name,
				urls, 
				type,
				body,
				color,
				trim,
				fuel,
				mpg,
				cylinders,
				truck,
				4wd,
				turbo,
				transmission,
				odometer,
				deal_date,
				price
		FROM `sales` AS sales
		LEFT JOIN `images` AS images ON sales.vin = images.vin   
		WHERE sales.vin = '".$vin."' LIMIT 1"
	)or die(mysqli_error($c));
	
	while($row = mysqli_fetch_array( $result, MYSQL_ASSOC )) {
		array_push($responseData, $row); 
	}

	echo json_encode($responseData);
?>