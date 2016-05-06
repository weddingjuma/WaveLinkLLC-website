<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	$result = mysqli_query($c, "SELECT * FROM departments WHERE id = '$id'");
	if (!$result) {
		echo 'Could not find department by the id specified.'; exit;
	}
	$u = mysqli_fetch_assoc($result);
	$page = "dealership";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Add/Edit Department</title>
	
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
					echo "Add New Department";
				} else {
					echo "Edit Department";
				}
			?>
		  </h3>
		</header>	
	
		<form class="form-grouped" action="submit_department.php" method="post" enctype="multipart/form-data" data-validate>
		  <?php if($id <> "") { echo '<input type="hidden" name="id" value="'.$u["id"].'" />'; } ?>	
		  <input type="hidden" name="page" value="<?php echo $page; ?>" />		
		  <fieldset>
			<legend>Display</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Name</label>
				<input class="form-control" type="text" name="name" <?php echo 'value="'.$u["name"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Email</label>
				<input class="form-control" type="text" name="email" <?php echo 'value="'.$u["email"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Phone</label>
				<input class="form-control" type="text" name="phone" <?php echo 'value="'.$u["phone"].'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Hours</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Weekday Open Hour</label>
				<input class="form-control" type="text" name="weekday_open_hour" <?php echo 'value="'.$u["weekday_open_hour"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Weekday Close Hour</label>
				<input class="form-control" type="text" name="weekday_close_hour" <?php echo 'value="'.$u["weekday_close_hour"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Saturday Open Hour</label>
				<input class="form-control" type="text" name="saturday_open_hour" <?php echo 'value="'.$u["saturday_open_hour"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Saturday Close Hour</label>
				<input class="form-control" type="text" name="saturday_close_hour" <?php echo 'value="'.$u["saturday_close_hour"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Sunday Open Hour</label>
				<input class="form-control" type="text" name="sunday_open_hour" <?php echo 'value="'.$u["sunday_open_hour"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Sunday Close Hour</label>
				<input class="form-control" type="text" name="sunday_close_hour" <?php echo 'value="'.$u["sunday_close_hour"].'"'; ?> required>
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