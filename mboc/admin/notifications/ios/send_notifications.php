<?php
// Report all PHP errors
error_reporting(-1);
date_default_timezone_set('America/New_York');
include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/authentication.php';
include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/configuration.php';
include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mboc/ApnsPHP/Autoload.php';
$c = connect_to_database();
$setting = get_settings($c, "SELECT * FROM settings WHERE page = 'home'");
$text = $_POST['text']; if(strlen($text) > 160) { $text = substr($text, 0, 160).'...'; }

// ENVIRONMENT_PRODUCTION or ENVIRONMENT_SANDBOX
$push = new ApnsPHP_Push(
		ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
		$_SERVER['DOCUMENT_ROOT'].'/mboc/server_certificates_bundle_production.pem'
);
$push->connect();

$result = mysqli_query($c, "SELECT * FROM `devices` WHERE type = 'ios'") or die(mysqli_error($c));	
$i = 0;
while($device = mysqli_fetch_array($result, MYSQL_ASSOC)) { $i++;
	try {
	
		$deviceId = $device['id'];
		$userId = $device['userId'];
		$token = $device['token'];
		$badge = $device['badge'] + 1;
		
		echo "<br /><br />DeviceId: ".$deviceId." | UserId: ".$userId." | Token: ".$token." | Badge: ".$badge."<br />";
		
		mysqli_query($c, "UPDATE `devices` SET badge='$badge' WHERE id='$deviceId'") or die(mysqli_error($c));
		
		// Instantiate a new Message with a single recipient
		$message = new ApnsPHP_Message($token);
				
		// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
		// over a ApnsPHP_Message object retrieved with the getErrors() message.
		$message->setCustomIdentifier("Message-Badge-".$deviceId);
		
		$message->setBadge($badge);
		
		// Set the message text
		$message->setText($text);
		
		// Play the default sound
		$message->setSound();
		
		// Set a custom property
		//$message->setCustomProperty('type', $notification['type']);
		
		// Set custom properties
		//$message->setCustomProperty('postId', $postId);
		//$message->setCustomProperty('senderId', $notification['senderId']);
		//$message->setCustomProperty('commentId', $notification['commentId']);
		
		// Set the expiry value to 30 seconds
		$message->setExpiry(30);
		
		// Add the message to the message queue
		$push->add($message);
		
	} catch (Exception $e) {
		echo '<br />Caught exception: ',  $e->getMessage(), "\n";
	}
}

// Send all messages in the message queue
$push->send();

// Disconnect from the Apple Push Notification Service
$push->disconnect();

// Examine the error message container
$aErrorQueue = $push->getErrors();
if (!empty($aErrorQueue)) {
	echo "<pre>";
    print_r($aErrorQueue); // or var_dump($data);
    echo "</pre>";
}

?>