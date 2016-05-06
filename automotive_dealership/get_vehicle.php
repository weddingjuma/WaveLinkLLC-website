<?php
	include 'functions.php';
	$c = connect_to_database();
	$vin = ($_POST['vin'] <> "" ? $_POST['vin'] : "none");

	$responseData = array();
	
	$result = mysqli_query($c,
		"SELECT inventory.id AS id, 
				inventory.vin AS vin, 
				stock_number,
				CONCAT_WS(' ', year, make, model) AS name,
				urls, 
				type,
				year,
				make,
				model,
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
				date_in_inventory,
				price
		FROM `inventory` AS inventory
		LEFT JOIN `images` AS images ON inventory.vin = images.vin   
		WHERE inventory.vin = '".$vin."'
		UNION
		SELECT services.id AS id, 
				services.vin AS vin, 
				stock_number,
				CONCAT_WS(' ', year, make, model) AS name,
				urls, 
				type,
				year,
				make,
				model,
				'',
				color,
				'',
				fuel,
				'',
				'',
				'',
				'',
				'',
				'',
				odometer,
				'',
				''
		FROM `services` AS services
		LEFT JOIN `images` AS images ON services.vin = images.vin   
		WHERE services.vin = '".$vin."'
		UNION
		SELECT sales.id AS id, 
				sales.vin AS vin, 
				stock_number,
				CONCAT_WS(' ', year, make, model) AS name,
				urls, 
				type,
				year,
				make,
				model,
				'',
				color,
				'',
				fuel,
				'',
				cylinders,
				'',
				'',
				'',
				'',
				odometer,
				'',
				''
		FROM `sales` AS sales
		LEFT JOIN `images` AS images ON sales.vin = images.vin   
		WHERE sales.vin = '".$vin."'
		LIMIT 1"
	)or die(mysqli_error($c));
	
	while($row = mysqli_fetch_array( $result, MYSQL_ASSOC )) {
		array_push($responseData, $row); 
	}

	echo json_encode($responseData);
?>