<?php
	include 'functions.php';
	$c = connect_to_database();
	$where = array();
	if($_POST['year'] <> "") { array_push($where, "year = '".$_POST['year']."'"); }
	if($_POST['type'] <> "") { array_push($where, "type = '".$_POST['type']."'"); }
	$next = ($_POST['next'] == "" ? 0 : $_POST['next']);

	$responseData = array();
	
	$result = mysqli_query($c,
		"SELECT inventory.vin AS vin, type, make, model, CONCAT_WS(' ', make, model) AS name, urls, COUNT(*) AS count, MIN(price) AS price
		FROM `inventory` AS inventory
		LEFT JOIN `images` AS images ON inventory.vin = images.vin   
		".(count($where) > 0 ? "WHERE" : "")." 
		".implode(" AND ", $where)."
		GROUP BY name
		ORDER BY name
		LIMIT 200 OFFSET ".$next
	)or die(mysqli_error($c));
	
	while($row = mysqli_fetch_array( $result, MYSQL_ASSOC )) { $next++;
		$row['next'] = $next;
		array_push($responseData, $row); 
	}

	echo json_encode($responseData);
?>