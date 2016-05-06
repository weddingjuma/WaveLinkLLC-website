<?php
	include '../../utility/database.php';
	include '../../utility/functions.php';
	$body = file_get_contents('php://input');
	$json = json_decode($body, true);
	$id = $json['action']['id'];
	$type = $json['action']['type'];
	if(!is_null_or_empty_string($id)) {
		if(mysql_query("insert into trello_callbacks(id, type, body) values('$id', '$type', '$body')")){
			echo "SUCCESS";
		}else{ 
			echo 'CALLBACK FAILED';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trello</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<style>
		body {
			font-family: arial;
			font-size: 12px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Generate an application key (GET):</h3>
				https://trello.com/1/appKey/generate
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-12">
				<h3>Generate an application key (GET):</h3>
				https://trello.com/1/appKey/generate
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-12">
				<h3>Sample URL for hitting the authorize page and getting a User Token (GET):</h3>
				https://trello.com/1/connect?key=7ac9e2379f95248b723ea7d141676ecd&name=Wave+Link&response_type=token&expiration=never
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-12">
				<h3>Sample URL for setting up a webhook (POST):</h3>
				https://trello.com/1/tokens/f14ca9f8f140cf433d046f761cc623e1378f1e0cf0f135a0103906eae123a2f4/webhooks/?key=7ac9e2379f95248b723ea7d141676ecd<br />
				description : "Personal webhook"<br />
				callbackURL : "http://www.wavelinkllc.com/trello/webhook/"<br />
				idModel : 536d48237934c1e97f5ee3b8
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-12">
				<b>Sample response:</b><br />
				{<br />
				&nbsp;"id": "548c7626cc0060e07a3f7dc5",<br />
				&nbsp;"description": "Personal webhook",<br />
				&nbsp;"idModel": "536d48237934c1e97f5ee3b8",<br />
				&nbsp;"callbackURL": "http://www.wavelinkllc.com/trello/webhook/",<br />
				&nbsp;"active": true<br />
				}
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Sample URL for deleting webhooks (DELETE):</h3>
				https://trello.com/1/webhooks/[WEBHOOK_ID]?key=[APPLICATION_KEY]&token=[USER_TOKEN]
			</div>
		</div>
		<br />
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>