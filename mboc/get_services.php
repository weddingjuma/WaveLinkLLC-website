<?php
	include 'functions.php';
	$c = connect_to_database();
	$vin = ($_POST['vin'] <> "" ? $_POST['vin'] : "none");
	$email = ($_POST['email'] <> "" ? $_POST['email'] : "none");

	$responseData = array();
	
	$result = mysqli_query($c,
		"SELECT services.id AS id,
				order_number, 
				stock_number,
				services.vin AS vin, 
				CONCAT_WS(' ', year, make, model) AS name,
				urls, 
				type,
				year,
				make,
				model,
				color,
				fuel,
				odometer,
				service_date,
				open_date,
				close_date,
				total_cost,
				customer_paid,
				warranty_paid,
				service_writer_name,
				description_1,
				description_2,
				description_3,
				description_4,
				description_5,
				description_6,
				description_7,
				description_8,
				description_9,
				description_10,
				first_name,
				middle_name,
				last_name,
				email,
				home_phone,
				work_phone,
				address1,
				address2,
				city,
				state,
				zipcode,
				birth_date
		FROM `services` AS services
		LEFT JOIN `images` AS images ON services.vin = images.vin   
		WHERE services.vin = '".$vin."' OR email = '".$email."' ORDER BY open_date DESC"
	)or die(mysqli_error($c));
	
	while($row = mysqli_fetch_array( $result, MYSQL_ASSOC )) {
		array_push($responseData, $row); 
	}

	echo json_encode($responseData);
?>