<?php
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	$result = mysqli_query($c, "SELECT * FROM orders WHERE id = '$id'");
	if (!$result) {
		echo 'Could not find order by the id specified.'; exit;
	}
	$u = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Add/Edit Order</title>

	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>

		<header>
		  <a href="../orders/" class="btn btn-link">&larr; Go back to orders</a>
		  <h3>
		  	<?php
				if($id == "") {
					echo "Add New Order";
				} else {
					echo "Edit Order";
				}
			?>
		  </h3>
		</header>

		<form class="form-grouped" action="submit.php" method="post" enctype="multipart/form-data" data-validate>
		  <?php if($id <> "") { echo '<input type="hidden" name="id" value="'.$u["id"].'" />'; } ?>
		  <fieldset>
			<legend>Customer</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>First Name</label>
				<input class="form-control" type="text" name="first_name" <?php echo 'value="'.$u["first_name"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Last Name</label>
				<input class="form-control" type="text" name="last_name" <?php echo 'value="'.$u["last_name"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Email Address</label>
				<input class="form-control" type="text" name="email_address" <?php echo 'value="'.$u["email_address"].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Phone Number</label>
				<input class="form-control" type="text" name="phone_number" <?php echo 'value="'.$u["phone_number"].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Mailing Address</label>
				<input class="form-control" type="text" name="mailing_address_1" <?php echo 'value="'.$u["mailing_address_1"].'"'; ?> required>
			  </div>
              <div class="col-md-6 col-xs-6">
				<label>Mailing Address (Cont.)</label>
				<input class="form-control" type="text" name="mailing_address_2" <?php echo 'value="'.$u["mailing_address_2"].'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-4 col-xs-4">
				<label>City</label>
				<input class="form-control" type="text" name="city" <?php echo 'value="'.$u["city"].'"'; ?> required>
			  </div>
			  <div class="col-md-4 col-xs-4">
				<label>State</label>
				<input class="form-control" type="text" name="state" <?php echo 'value="'.$u["state"].'"'; ?> required>
			  </div>
			  <div class="col-md-4 col-xs-4">
				<label>ZIP Code</label>
				<input class="form-control" type="text" name="zip_code" <?php echo 'value="'.$u["zip_code"].'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
          <fieldset>
			<legend>Details</legend>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Invoice</label>
				<textarea class="form-control" name="invoice" id="invoice" rows="5" required><?php echo $u["invoice"]; ?></textarea>
			  </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 col-xs-12">
				<label>Notes</label>
				<textarea class="form-control" name="notes" id="notes" rows="5"><?php echo $u["notes"]; ?></textarea>
			  </div>
            </div>
            <div class="row form-group">
              <div class="col-md-3 col-xs-3">
				<label>Total</label>
				<input class="form-control" name="total" id="total" <?php echo 'value="'.$u["total"].'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Dates</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Requested Date</label>
				<?php echo $u["date_added"]; ?>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Completed Date</label>
				<?php if($u["date_completed"] != NULL) { echo $u["date_completed"]; } else { echo 'n/a'; } ?>
			  </div>
			 </div>
			 <div class="row form-group">
			  <div class="col-md-2 col-xs-2">
				<label>Completed?</label><br />
			    <div class="switch">
				 <input name="date_completed" type="checkbox" <?php if($u["date_completed"] != NULL) { echo 'checked'; } ?>>
			    </div>
			  </div>
			</div>
		  </fieldset>
		  <div class="form-actions">
			<a href="../orders/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</form>

		<br /><br />

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt.js"></script>
</body>
</html>
