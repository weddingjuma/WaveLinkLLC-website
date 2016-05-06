<?php
include 'functions.php';
$c = connect_to_database();

$iOSdeviceToken = $_POST['iOSdeviceToken'];
$androidDeviceToken = $_POST['androidDeviceToken'];

$responseData = array();
$responseData['response'] = "success";

remove_devices($c, $iOSdeviceToken, $androidDeviceToken);

echo json_encode($responseData);
?>