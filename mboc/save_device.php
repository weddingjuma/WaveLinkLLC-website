<?php
include 'functions.php';
$c = connect_to_database();

$iOSdeviceToken=$_POST['iOSdeviceToken'];
$androidDeviceToken=$_POST['androidDeviceToken']; 

$responseData = array();

$responseData['status'] = 'success';
update_devices($c, 0, $iOSdeviceToken, $androidDeviceToken);

echo json_encode($responseData);
?>
