<?php
include 'functions.php';
$c = connect_to_database();

// credentials sent from form 
$userId=($_POST['userId'] <> "" ? $_POST['userId'] : "none");
$facebookId=($_POST['facebookId'] <> "" ? $_POST['facebookId'] : "none");
$twitterId=($_POST['twitterId'] <> "" ? $_POST['twitterId'] : "none");
$digitsId=($_POST['digitsId'] <> "" ? $_POST['digitsId'] : "none");
$iOSdeviceToken=$_POST['iOSdeviceToken'];
$androidDeviceToken=$_POST['androidDeviceToken']; 

$responseData = array();
$responseData['authenticated'] = 'false';

// query to check if the credentials are found in the database
$result=mysqli_query($c, "SELECT * FROM users WHERE id='$userId' OR facebookId='$facebookId' OR twitterId='$twitterId' OR digitsId='$digitsId' LIMIT 1");
$count=mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

// return TRUE if the user exists, FALSE otherwise
if($count==1){
	$responseData['authenticated'] = 'true';
	$responseData['userId'] = $row['id'];
	$responseData['name'] = $row['name'];
	$responseData['email'] = $row['email'];
	$responseData['phone'] = $row['phone'];
	$responseData['photo'] = $row['photo'];
	$responseData['vin'] = $row['vin'];
	$responseData['facebookId'] = $row['facebookId'];
	$responseData['twitterId'] = $row['twitterId'];
	$responseData['digitsId'] = $row['digitsId'];
	update_devices($c, $row['id'], $iOSdeviceToken, $androidDeviceToken);
}

echo json_encode($responseData);
?>