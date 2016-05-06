<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings WHERE page = 'history'");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - History Page</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		
		<h3>History Page Settings</h3>
		
		<form class="form-grouped" action="submit_settings.php" method="post" enctype="multipart/form-data" data-validate>		
		  <fieldset>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-12">
				<label>Header Image</label>
				<img style="width:100%;" src="<?php if($setting["header_image_url"] <> "" && $setting["header_image_url"] <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].'/automotive_dealership'.$setting["header_image_url"]; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="header_image_url" <?php echo 'value="'.$setting["header_image_url"].'"'; ?>>
				<br />
				<label>Header Text Color</label>
				<input class="form-control" type="text" name="header_text_color" <?php echo 'value="'.$setting['header_text_color'].'"'; ?> required>
				<span class="help-block">*Hex value</span>
			  </div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		  </fieldset>
		</form>
	</div>
		
	<br />	
	<br />
		
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>  
	<script src="https://sdk.ttcdn.co/tt.js"></script>  
</body>
</html>