<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	$result = mysqli_query($c, "SELECT * FROM menu_items WHERE id = '$id'");
	if (!$result) {
		echo 'Could not find menu item by the id specified.'; exit;
	}
	$u = mysqli_fetch_assoc($result);
	$page = "home";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Add/Edit Menu Item</title>
	
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
					echo "Add New Menu Item";
				} else {
					echo "Edit Menu Item";
				}
			?>
		  </h3>
		</header>	
	
		<form class="form-grouped" action="submit_menu_item.php" method="post" enctype="multipart/form-data" data-validate>
		  <?php if($id <> "") { echo '<input type="hidden" name="id" value="'.$u["id"].'" />'; } ?>	
		  <input type="hidden" name="page" value="<?php echo $page; ?>" />		
		  <fieldset>
			<legend>Display</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Name</label>
				<input class="form-control" type="text" name="name" <?php echo 'value="'.$u["name"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Icon</label>
				<input class="form-control" type="text" name="icon" <?php echo 'value="'.$u["icon"].'"'; ?> required>
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
			  <div class="col-md-6 col-xs-6">
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
			  <div class="col-md-3 col-xs-3">
				<label>Badge Number</label>
				<input class="form-control" type="text" name="badge" <?php echo 'value="'.$u["badge"].'"'; ?>>
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