<?php
	include 'functions.php';
	$c = connect_to_database();
	$page = $_POST['page'];

	$response = array();
	
	$settings = array();
	$settings_result = mysqli_query($c, "SELECT * FROM `settings` WHERE page = '".$page."'")or die(mysqli_error($c));
	while($setting = mysqli_fetch_array( $settings_result, MYSQL_ASSOC )) {
		$settings[$setting['code']] = $setting['value']; 
	}
	$response['settings'] = $settings;
	
	$menu_items = array();
	$menu_items_result = mysqli_query($c, "SELECT * FROM `menu_items` WHERE page = '".$page."' ORDER BY order_index ASC")or die(mysqli_error($c));
	while($menu_item = mysqli_fetch_array( $menu_items_result, MYSQL_ASSOC )) {
		array_push($menu_items, $menu_item); 
	}
	$response['menu_items'] = $menu_items;
	
	if($page == "dealership") {
		$departments = array();
		$departments_result = mysqli_query($c, "SELECT * FROM `departments` ORDER BY order_index ASC")or die(mysqli_error($c));
		while($department = mysqli_fetch_array( $departments_result, MYSQL_ASSOC )) {
			array_push($departments, $department); 
		}
		$response['departments'] = $departments;
	}
	
	if($page == "specials") {
		$specials = array();
		$specials_result = mysqli_query($c, "SELECT * FROM `specials` ORDER BY order_index ASC")or die(mysqli_error($c));
		while($special = mysqli_fetch_array( $specials_result, MYSQL_ASSOC )) {
			array_push($specials, $special); 
		}
		$response['specials'] = $specials;
	}

	echo json_encode($response);
?>