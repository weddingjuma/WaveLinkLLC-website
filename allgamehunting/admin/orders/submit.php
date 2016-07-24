<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_POST['id'];
	$first_name = str_replace(',', '', addslashes($_POST['first_name']));
	$last_name = str_replace(',', '', addslashes($_POST['last_name']));
	$email_address = $_POST['email_address'];
	$phone_number = $_POST['phone_number'];
    $mailing_address_1 = str_replace(',', '', addslashes($_POST['mailing_address_1']));
    $mailing_address_2 = str_replace(',', '', addslashes($_POST['mailing_address_2']));
    $city = str_replace(',', '', addslashes($_POST['city']));
    $state = str_replace(',', '', addslashes($_POST['state']));
    $zip_code = $_POST['zip_code'];
	$notes = str_replace(',', '', addslashes($_POST['notes']));
    $total = $_POST['total'];
    $invoice = str_replace(',', '', addslashes($_POST['invoice']));
	$date_completed = isset($_POST['date_completed']) && $_POST['date_completed'] ? "'".date('Y-m-d H:i:s')."'" : 'NULL';

	if($id == "") {
		if (mysqli_query($c, "INSERT INTO orders
                              (first_name, last_name, email_address, phone_number, mailing_address_1, mailing_address_2, city, state, zip_code, invoice, notes, total, date_completed)
                              VALUES ('$first_name', '$last_name', '$email_address', '$phone_number', '$mailing_address_1', '$mailing_address_2', '$city', '$state', '$zip_code', '$invoice', '$notes', '$total', $date_completed)")) {
			header("Location: index.php");
		}else{
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.';
		}
	} else {
		if (mysqli_query($c, "UPDATE orders SET first_name = '$first_name', last_name = '$last_name', email_address = '$email_address', phone_number = '$phone_number', mailing_address_1 = '$mailing_address_1', mailing_address_2 = '$mailing_address_2',
                                                city = '$city', state = '$state', zip_code = '$zip_code', invoice = '$invoice', notes = '$notes', total = '$total', date_completed = $date_completed WHERE id = '$id'")) {
			header("Location: index.php");
		}else{
			echo '<img src="http://'.$_SERVER['SERVER_NAME'].'/images/error.png" style="height:20px;" />&nbsp;&nbsp;Database problem.<br>Contact wavelinkllc.com administrator.'.mysqli_error($c);
		}
	}
?>
