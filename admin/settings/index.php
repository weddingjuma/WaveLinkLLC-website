<?php
	include '../authentication.php';
	include '../utility/database.php';
	include '../utility/functions.php';
	
	$settings = mysql_query("SELECT * FROM settings");
	if (!$settings) { echo 'Could not load settings data.'; exit; }
	$invoice_logo;
	$invoice_contact_name;
	$invoice_contact_title;
	$invoice_contact_phone;
	$invoice_contact_email;
	$receipt_logo;
	$receipt_contact_name;
	$receipt_contact_title;
	$receipt_contact_phone;
	$receipt_contact_email;
	$facebook_link;
	$twitter_link;
	$linkedin_link;
	$googleplus_link;
	$instagram_link;
	$contactus_phone;
	$contactus_email;
	include '../utility/settings.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wave Link, LLC - Settings</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
	
		<header>
		  <h3>Settings</h3>
		</header>	
	
		<form class="form-grouped" action="submit.php" method="post" enctype="multipart/form-data" data-validate>		
		  <fieldset>
			<legend>Contact Us</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Phone</label>
				<input class="form-control" type="phone" name="contactus_phone" <?php echo 'value="'.$contactus_phone.'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Email</label>
				<input class="form-control" type="email" name="contactus_email" <?php echo 'value="'.$contactus_email.'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Invoice</legend>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-8">
				<label>Logo</label>
				<img style="width:100%;" src="<?php if($invoice_logo <> "" && $invoice_logo <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].$invoice_logo; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="invoice_logo" <?php echo 'value="'.$invoice_logo.'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Name</label>
				<input class="form-control" type="text" name="invoice_contact_name" <?php echo 'value="'.$invoice_contact_name.'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Title</label>
				<input class="form-control" type="text" name="invoice_contact_title" <?php echo 'value="'.$invoice_contact_title.'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Phone</label>
				<input class="form-control" type="phone" name="invoice_contact_phone" <?php echo 'value="'.$invoice_contact_phone.'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Email</label>
				<input class="form-control" type="email" name="invoice_contact_email" <?php echo 'value="'.$invoice_contact_email.'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Receipt</legend>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-8">
				<label>Logo</label>
				<img style="width:100%;" src="<?php if($receipt_logo <> "" && $receipt_logo <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].$receipt_logo; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="receipt_logo" <?php echo 'value="'.$receipt_logo.'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Name</label>
				<input class="form-control" type="text" name="receipt_contact_name" <?php echo 'value="'.$receipt_contact_name.'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Title</label>
				<input class="form-control" type="text" name="receipt_contact_title" <?php echo 'value="'.$receipt_contact_title.'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Phone</label>
				<input class="form-control" type="phone" name="receipt_contact_phone" <?php echo 'value="'.$receipt_contact_phone.'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Email</label>
				<input class="form-control" type="email" name="receipt_contact_email" <?php echo 'value="'.$receipt_contact_email.'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Social</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Facebook link</label>
				<input class="form-control" type="text" name="facebook_link" <?php echo 'value="'.$facebook_link.'"'; ?>>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Twitter link</label>
				<input class="form-control" type="text" name="twitter_link" <?php echo 'value="'.$twitter_link.'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>LinkedIn link</label>
				<input class="form-control" type="text" name="linkedin_link" <?php echo 'value="'.$linkedin_link.'"'; ?>>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Google+ link</label>
				<input class="form-control" type="text" name="googleplus_link" <?php echo 'value="'.$googleplus_link.'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Instagram link</label>
				<input class="form-control" type="text" name="instagram_link" <?php echo 'value="'.$instagram_link.'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <div class="form-actions">
			<a href="../products/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</form>
		
		<br /><br />
		
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>  
	<script src="https://sdk.ttcdn.co/tt.js"></script>  
</body>
</html>