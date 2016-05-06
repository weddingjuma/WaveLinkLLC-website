<?php

	// General settings
	$business_name="Cynthia Washington Photography";

	// Your database settings
	$db_host="localhost"; // Host name 
	$db_username="cwashing_app"; // Mysql username 
	$db_password="CWashington2016"; // Mysql password 
	$db_name="cwashing_main"; // Database name 
	
	// Cart settings
	$admin_email="";
	$Cart = new Cart();
	$Cart -> paypal_email = "flavabeauty@gmail.com";
	$Cart -> paypal_color = "000000";
	$Cart -> no_shipping = "0";
	$Cart -> return_url = "http://".$_SERVER['SERVER_NAME'];
	$Cart -> cancel_url = "http://".$_SERVER['SERVER_NAME'];
?>