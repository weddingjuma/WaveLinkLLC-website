<?php

	// General settings
	$business_name="All Game Hunting";

	// Your database settings
	$db_host="localhost"; // Host name
	$db_username="application"; // Mysql username
	$db_password="wavelink2014"; // Mysql password
	$db_name="allgamehunting"; // Database name

	// Cart settings
	$admin_email="";
	$Cart = new Cart();
	$Cart -> paypal_email = "allgamehunting@gmail.com";
	$Cart -> paypal_color = "000000";
	$Cart -> no_shipping = "0";
	$Cart -> return_url = "http://".$_SERVER['SERVER_NAME'];
	$Cart -> cancel_url = "http://".$_SERVER['SERVER_NAME'];
?>