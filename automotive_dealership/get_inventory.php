<?php
	include 'functions.php';
	$c = connect_to_database();
	$where = array();
	if($_POST['type'] <> "") { array_push($where, "type = '".$_POST['type']."'"); }
	if($_POST['make'] <> "") { array_push($where, "make = '".$_POST['make']."'"); }
	if($_POST['model'] <> "") { array_push($where, "model = '".$_POST['model']."'"); }
	if($_POST['order'] <> "") { array_push($where, "order = '".$_POST['order']."'"); }
	if($_POST['search'] <> "") { array_push($where, "year LIKE '".$_POST['search']."' OR 
													 make LIKE '".$_POST['search']."' OR 
													 model LIKE '".$_POST['search']."' OR 
													 vin LIKE '".$_POST['search']."' OR
													 body LIKE '".$_POST['search']."' OR 
													 color LIKE '".$_POST['search']."'"); }
	$next = ($_POST['next'] == "" ? 0 : $_POST['next']);

	$responseData = array();
	
	$result = mysqli_query($c,
		"SELECT inventory.vin AS vin, urls, CONCAT_WS(' ', year, make, model) AS name, price, type, color, body 
		FROM `inventory` AS inventory
		LEFT JOIN `images` AS images ON inventory.vin = images.vin   
		".(count($where) > 0 ? "WHERE" : "")." 
		".implode(" AND ", $where)."
		LIMIT 200 OFFSET ".$next
	)or die(mysqli_error($c));
	
	while($row = mysqli_fetch_array( $result, MYSQL_ASSOC )) { $next++;
		$row['next'] = $next;
		array_push($responseData, $row); 
	}

	echo json_encode($responseData);
?>