<?php
	include $_SERVER['DOCUMENT_ROOT'].'/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/functions.php';
	$c = connect_to_database();
	$id = $_GET['id'];
	$result = mysqli_query($c, "SELECT * FROM properties WHERE id = '$id'");
	if (!$result) {
		echo 'Could not find property by the id specified.'; exit;
	}
	$u = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Add/Edit Property</title>

	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>

		<header>
		  <a href="../properties/" class="btn btn-link">&larr; Go back to products</a>
		  <h3>
		  	<?php
				if($id == "") {
					echo "Add New Property";
				} else {
					echo "Edit Property";
				}
			?>
		  </h3>
		</header>

		<form class="form-grouped" action="submit.php" method="post" enctype="multipart/form-data" data-validate>
		  <?php if($id <> "") { echo '<input type="hidden" name="id" value="'.$u["id"].'" />'; } ?>
		  <fieldset>
			<legend>Address</legend>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-12">
				<label>Address 1</label>
				<input class="form-control" type="text" name="address_1" <?php echo 'value="'.$u["address_1"].'"'; ?> required>
			  </div>
              <div class="col-md-6 col-xs-12">
				<label>Address 2</label>
				<input class="form-control" type="text" name="address_2" <?php echo 'value="'.$u["address_2"].'"'; ?>>
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
				<label>Zip</label>
				<input class="form-control" type="text" name="zip" <?php echo 'value="'.$u["zip"].'"'; ?> required>
			  </div>
			</div>
          </fieldset>
          <fieldset>
			<legend>Details</legend>
            <div class="row form-group">
              <div class="col-md-4 col-xs-4">
				<label>Price</label>
				<input class="form-control" type="text" name="price" <?php echo 'value="'.$u["price"].'"'; ?> required>
			  </div>
            </div>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Description</label>
				<textarea class="form-control" name="description" id="description" rows="5"><?php echo $u["description"]; ?></textarea>
			  </div>
			</div>
            <div class="row form-group">
			  <div class="col-md-3 col-xs-3">
				<label>Number Of Bedrooms</label>
				<input class="form-control" type="text" name="number_of_bedrooms" <?php echo 'value="'.$u["number_of_bedrooms"].'"'; ?> required>
			  </div>
              <div class="col-md-3 col-xs-3">
				<label>Number Of Bathrooms</label>
				<input class="form-control" type="text" name="number_of_bathrooms" <?php echo 'value="'.$u["number_of_bathrooms"].'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Images</legend>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-3">
				<label>Image 1</label>
				<img style="width:100%;" src="<?php if($u["image_url_1"] <> "" && $u["image_url_1"] <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].$u["image_url_1"]; } ?>" />
				<input class="form-control" type="file" name="image_url[]">
				<input class="form-control" type="hidden" name="image_url_1" <?php echo 'value="'.$u["image_url_1"].'"'; ?>>
			  </div>
			  <div class="col-md-3 col-xs-3">
				<label>Image 2</label>
				<img style="width:100%;" src="<?php if($u["image_url_2"] <> "" && $u["image_url_2"] <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].$u["image_url_2"]; } ?>" />
				<input class="form-control" type="file" name="image_url[]">
				<input class="form-control" type="hidden" name="image_url_2" <?php echo 'value="'.$u["image_url_2"].'"'; ?>>
			  </div>
			  <div class="col-md-3 col-xs-3">
				<label>Image 3</label>
				<img style="width:100%;" src="<?php if($u["image_url_3"] <> "" && $u["image_url_3"] <> "none") { echo 'http://'.$_SERVER['SERVER_NAME'].$u["image_url_3"]; } ?>" />
				<input class="form-control" type="file" name="image_url[]">
				<input class="form-control" type="hidden" name="image_url_3" <?php echo 'value="'.$u["image_url_3"].'"'; ?>>
			  </div>
			</div>
          </fieldset>
		  <div class="form-actions">
			<a href="../properties/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</form>

		<br /><br />

	<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt.js"></script>
</body>
</html>
