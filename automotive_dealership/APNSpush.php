<?php
include '/utility/database.php';

// Adjust to your timezone
date_default_timezone_set('America/New_York');

// Report all PHP errors
//error_reporting(-1);

// Using Autoload all classes are loaded on-demand
require_once 'ApnsPHP/Autoload.php';

// Instantiate a new ApnsPHP_Push object
$push = new ApnsPHP_Push(
		ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
		'server_certificates_bundle_production.pem'
);

// $push->setProviderCertificatePassphrase('test');
// $push->setRootCertificationAuthority('entrust_root_certification_authority.pem');

// Connect to the Apple Push Notification Service
$push->connect();

$lookBackDate = date("YmdHis", mktime(date('H') - 5, date('i'), date('s'), date('m'), date('d'), date('Y'), -1));
$result = mysql_query("
	SELECT * FROM `notifications` 
	INNER JOIN (SELECT id as userdataId, username, name, iOSbadgeNumber FROM `users`) AS userdata ON userdata.userdataId = notifications.userId
	RIGHT JOIN (SELECT userId as tokendataId, token AS iOSdeviceToken FROM `iosdevicetokens` WHERE token<>'none') AS tokendata ON tokendata.tokendataId = notifications.userId  
	WHERE isSentForIOS=0 AND (time > $lookBackDate) ORDER BY time ASC LIMIT 1000")
	or die(mysql_error());

$sentNotifications = array();	
	
$i = 0;
while(($notification = mysql_fetch_array( $result, MYSQL_ASSOC ))&&($i <= 1000)) { $i++;
	try {
		echo "<br /><br />".$notification['text']."<br />";
		
		$notificationId = $notification['id'];
		$userId = $notification['userdataId'];
		$postId = $notification['postId'];
		$text = $notification['text'];
		if(strlen($text) > 160) { $text = substr($text, 0, 160).'...'; }
		$iOSbadgeNumber = intval(@mysql_result(mysql_query("SELECT iOSbadgeNumber FROM `users` WHERE id='$userId'"), 0));
		if(!in_array($notificationId, $sentNotifications)){
			array_push($sentNotifications, $notificationId);
			$iOSbadgeNumber = $iOSbadgeNumber+1;
			mysql_query("UPDATE `notifications` SET isSentForIOS=1 WHERE id='$notificationId'")
			or die(mysql_error());
			mysql_query("UPDATE `users` SET iOSbadgeNumber='$iOSbadgeNumber' WHERE id='$userId'")
			or die(mysql_error());
		}
		
		// Instantiate a new Message with a single recipient
		$message = new ApnsPHP_Message($notification['iOSdeviceToken']);
				
		// Set a custom identifier. To get back this identifier use the getCustomIdentifier() method
		// over a ApnsPHP_Message object retrieved with the getErrors() message.
		$message->setCustomIdentifier("Message-Badge-".$notificationId);
		
		$message->setBadge($iOSbadgeNumber);
		
		// Set a simple welcome text
		$message->setText($text);
		
		// Play the default sound
		$message->setSound();
		
		// Set a custom property
		$message->setCustomProperty('type', $notification['type']);
		
		// Set custom properties
		$message->setCustomProperty('postId', $postId);
		$message->setCustomProperty('senderId', $notification['senderId']);
		$message->setCustomProperty('commentId', $notification['commentId']);
		
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