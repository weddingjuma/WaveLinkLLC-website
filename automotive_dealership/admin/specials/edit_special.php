<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	$result = mysqli_query($c, "SELECT * FROM specials WHERE id = '$id'");
	if (!$result) {
		echo 'Could not find special by the id specified.'; exit;
	}
	$u = mysqli_fetch_assoc($result);
	$page = "specials";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Add/Edit Special</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
	
		<header>
		  <a href="../<?php echo $page; ?>/" class="btn btn-link">&larr; Back to <?php echo $page; ?> page</a>
		  <h3>
		  	<?php
				if($id == "") {
					echo "Add New Special";
				} else {
					echo "Edit Special";
				}
			?>
		  </h3>
		</header>	
	
		<form class="form-grouped" action="submit_special.php" method="post" enctype="multipart/form-data" data-validate>
		  <?php if($id <> "") { echo '<input type="hidden" name="id" value="'.$u["id"].'" />'; } ?>	
		  <input type="hidden" name="page" value="<?php echo $page; ?>" />		
		  <fieldset>
			<legend>Photo</legend>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-3">
				<img style="width:100%;" src="<?php if($u["photo"] <> "" && $u["photo"] <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].'/automotive_dealership'.$u["photo"]; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="photo" <?php echo 'value="'.$u["photo"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Display</legend>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Title</label>
				<input class="form-control" type="text" name="title" <?php echo 'value="'.$u["title"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Description</label>
				<textarea class="form-control" name="description" id="description" rows="5" required><?php echo $u['description']; ?></textarea>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Navigation</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Segue</label>
				<input class="form-control" type="text" name="segue" <?php echo 'value="'.$u["segue"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>URL</label>
				<input class="form-control" type="text" name="url" <?php echo 'value="'.$u["url"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Details</legend>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-3">
				<label>Order Index</label>
				<input class="form-control" type="text" name="order_index" <?php echo 'value="'.$u["order_index"].'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
		  <div class="form-actions">
			<a href="../<?php echo $page; ?>/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</form>
		
		<br /><br />
		
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>  
	<script src="https://sdk.ttcdn.co/tt.js"></script>
</body>
</html>