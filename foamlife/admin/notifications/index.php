<?php
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/functions.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings WHERE page = 'notifications'");
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

		<form id="notifications_form" class="form-grouped" data-validate>
		  <fieldset>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Send an iOS push notification (160 chars. max):</label>
				<textarea class="form-control" name="text" id="text" rows="5" required></textarea>
			  </div>
			</div>
            <div id="response"></div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary" onclick="send(); return false;">Send</button>
			</div>
		  </fieldset>
		</form>
	</div>

	<br />
	<br />

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt.js"></script>
    <script type="application/javascript">
        function send() {
            $.post("send.php", $("#notifications_form").serialize())
                .done(function(data) {
                    $("#response").html(data);
                })
                .fail(function() {
                    alert("There was an network error. Please try again.");
                });
		}
    </script>
</body>
</html>
