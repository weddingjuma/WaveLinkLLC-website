<?php
	include 'cart.php';
	include 'configuration.php';
	include 'database.php';
	$Cart -> database_connection = connect_to_database();

	$product_id = $_POST["product_id"];

	session_start();
	if(isset($_SESSION['cart_items'])) {
	    $cart_items = json_decode($_SESSION['cart_items'], true);
		foreach($cart_items as $key => $cart_item)
	    {
	    	if($cart_item["id"] == $product_id) {
		    	unset($cart_items[$key]);
				$cart_items = array_values($cart_items);
	    	}
	    }
	    $_SESSION['cart_items'] = json_encode($cart_items);
	}

	echo $Cart -> cart_inner();
?>
