<?php
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/functions.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/mboc/ApnsPHP/Autoload.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings WHERE page = 'notifications'");
	$text = $_POST['text']; if(strlen($text) > 160) { $text = substr($text, 0, 160).'...'; }
    $userId = $_POST['userId'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Notifications</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		
		<h3>Notifications</h3>
		
		<form class="form-grouped" action="index.php" method="post" enctype="multipart/form-data" data-validate>		
		  <fieldset>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Send an iOS push notification (160 chars. max):</label>
				<textarea class="form-control" name="text" id="text" rows="5" required></textarea>
			  </div>
			</div>
              <div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Only send to one account ID? (Optional):</label>
				<input class="form-control" type="text" name="userId" />
			  </div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Send</button>
			</div>
		  </fieldset>
		</form>
		<?php
			if($text <> "") {
				// ENVIRONMENT_PRODUCTION or ENVIRONMENT_SANDBOX
				$push = new ApnsPHP_Push(
						ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
						$_SERVER['DOCUMENT_ROOT'].'/mboc/server_certificates_bundle_production.pem'
				);
				$push->connect();
				
                $query = "SELECT * FROM `devices` WHERE type = 'ios'".($userId <> "" ? " AND userId = ".$userId : "");
				$result = mysqli_query($c, $query) or die(mysqli_error($c));
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
			}
		?>
	</div>
		
	<br />	
	<br />
		
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>  
	<script src="https://sdk.ttcdn.co/tt.js"></script>  
</body>
</html>
