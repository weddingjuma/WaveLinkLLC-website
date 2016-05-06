<?php
$host="localhost"; // Host name 
$username="application"; // Mysql username 
$password="wavelink2014"; // Mysql password 
$db_name="wavelink"; // Database name 

// Connect to server and select databse.
$link = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
mysql_set_charset("utf8mb4", $link);
?>