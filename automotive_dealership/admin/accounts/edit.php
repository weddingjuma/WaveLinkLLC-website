<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	$result = mysqli_query($c, "SELECT * FROM users WHERE id = '$id'");
	if (!$result) {
		echo 'Could not find account by the id specified.'; exit;
	}
	$u = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Add/Edit Account</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
	
		<header>
		  <a href="../accounts/" class="btn btn-link">&larr; Go back to accounts</a>
		  <h3>
		  	<?php
				if($id == "") {
					echo "Add New Account";
				} else {
					echo "Edit Account";
				}
			?>
		  </h3>
		</header>	
	
		<form class="form-grouped" action="submit.php" method="post" enctype="multipart/form-data" data-validate>
		  <?php if($id <> "") { echo '<input type="hidden" name="id" value="'.$u["id"].'" />'; } ?>			
		  <fieldset>
			<legend>Details</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Name</label>
				<input class="form-control" type="text" name="name" <?php echo 'value="'.$u["name"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>VIN</label>
				<input class="form-control" type="text" name="vin" <?php echo 'value="'.$u["vin"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Email</label>
				<input class="form-control" type="text" name="email" <?php echo 'value="'.$u["email"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Phone</label>
				<input class="form-control" type="text" name="phone" <?php echo 'value="'.$u["phone"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Photo</legend>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-3">
				<img style="width:100%;" src="<?php if($u["photo"] <> "" && $u["photo"] <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].'/mboc'.$u["photo"]; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="photo" <?php echo 'value="'.$u["photo"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Credentials</legend>
			<div class="row form-group">
			  <div class="col-md-4 col-xs-4">
				<label>Facebook Id</label>
				<input class="form-control" type="text" name="facebookId" <?php echo 'value="'.$u["facebookId"].'"'; ?>>
			  </div>
			  <div class="col-md-4 col-xs-4">
				<label>Twitter Id</label>
				<input class="form-control" type="text" name="twitterId" <?php echo 'value="'.$u["twitterId"].'"'; ?>>
			  </div>
			  <div class="col-md-4 col-xs-4">
				<label>Digits Id</label>
				<input class="form-control" type="text" name="digitsId" <?php echo 'value="'.$u["digitsId"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <div class="form-actions">
			<a href="../accounts/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</form>
		
		<br /><br />
		
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">	
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>  
	<script src="https://sdk.ttcdn.co/tt.js"></script>  
</body>
</html>