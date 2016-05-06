<?php

	// General settings
	$business_name="Plush Hair & Beauty Salon";

	// Your database settings
	$db_host="localhost"; // Host name 
	$db_username="application"; // Mysql username 
	$db_password="wavelink2014"; // Mysql password 
	$db_name="flava"; // Database name 
	
	// Cart settings
	$admin_email="";
	$Cart = new Cart();
	$Cart -> paypal_email = "flavabeauty@gmail.com";
	$Cart -> paypal_color = "000000";
	$Cart -> no_shipping = "0";
	$Cart -> return_url = "http://".$_SERVER['SERVER_NAME'];
	$Cart -> cancel_url = "http://".$_SERVER['SERVER_NAME'];
?>