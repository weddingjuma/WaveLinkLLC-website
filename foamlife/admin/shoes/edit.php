<?php
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/functions.php';
	$database_connection = connect_to_database();
	$id = $_GET['id'];
	$data = mysqli_query($database_connection, "SELECT * FROM shoes WHERE id = '$id'");
	if (!$data) {
		echo 'Could not find shoe by the id specified.'; exit;
	}
	$shoe = mysqli_fetch_assoc($data);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Add/Edit Shoe</title>

	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
	<link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/foamlife/admin/css/jquery.datetimepicker.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		<header>
		  <a href="../shoes/" class="btn btn-link">&larr; Go back to shoes</a>
		  <h3>
		  	<?php
				if($id == "") {
					echo "Add New Shoe";
				} else {
					echo "Edit Shoe";
				}
			?>
		  </h3>
		</header>
		<form class="form-grouped" action="submit.php" method="post" enctype="multipart/form-data" data-validate>
		  <?php if($id <> "") { echo '<input type="hidden" name="id" value="'.$shoe["id"].'" />'; } ?>
		  <fieldset>
			<legend>Details</legend>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Name</label>
				<input class="form-control" type="text" name="name" <?php echo 'value="'.$shoe["name"].'"'; ?> required>
			  </div>
            </div>
            <div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Color</label>
				<input class="form-control" type="text" name="color" <?php echo 'value="'.$shoe["color"].'"'; ?> required>
			  </div>
            </div>
            <div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Description</label>
				<textarea class="form-control" name="description" id="description" rows="5" required><?php echo $shoe["description"]; ?></textarea>
			  </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12 col-xs-12">
				<label>Date</label>
				<input id="datepicker" name="date" type="text" <?php echo 'value="'.$shoe["date"].'"'; ?> required>
			  </div>
			</div>
		  </fieldset>
          <fieldset>
			<legend>Categories</legend>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Category 1</label>
				<input class="form-control" type="text" name="category1" <?php echo 'value="'.$shoe["category_1"].'"'; ?>>
			  </div>
            </div>
            <div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Category 2</label>
				<input class="form-control" type="text" name="category2" <?php echo 'value="'.$shoe["category_2"].'"'; ?>>
			  </div>
            </div>
            <div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Category 3</label>
				<input class="form-control" type="text" name="category3" <?php echo 'value="'.$shoe["category_3"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
          <fieldset>
			<legend>Images</legend>
			<div class="row form-group">
			  <div class="col-md-3 col-xs-3">
				<label>Image 1</label>
				<img style="width:100%;" src="<?php if ($shoe["image_url_1"] <> "") { echo 'http://'.$_SERVER['SERVER_NAME'].'/foamlife'.$shoe["image_url_1"]; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="image_url_1" <?php echo 'value="'.$shoe["image_url_1"].'"'; ?>>
			  </div>
			  <div class="col-md-3 col-xs-3">
				<label>Image 2</label>
				<img style="width:100%;" src="<?php if ($shoe["image_url_2"] <> "") { echo 'http://'.$_SERVER['SERVER_NAME'].'/foamlife'.$shoe["image_url_2"]; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="image_url_2" <?php echo 'value="'.$shoe["image_url_2"].'"'; ?>>
			  </div>
			  <div class="col-md-3 col-xs-3">
				<label>Image 3</label>
				<img style="width:100%;" src="<?php if ($shoe["image_url_3"] <> "") { echo 'http://'.$_SERVER['SERVER_NAME'].'/foamlife'.$shoe["image_url_3"]; } ?>" />
				<input class="form-control" type="file" name="file[]">
				<input class="form-control" type="hidden" name="image_url_3" <?php echo 'value="'.$shoe["image_url_3"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Buy URLs</legend>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>eBay URL</label>
				<input class="form-control" type="text" name="ebayUrl" <?php echo 'value="'.$shoe["ebay_url"].'"'; ?>>
			  </div>
            </div>
            <div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Footlocker URL</label>
				<input class="form-control" type="text" name="footlockerUrl" <?php echo 'value="'.$shoe["footlocker_url"].'"'; ?>>
			  </div>
			</div>
		  </fieldset>
		  <fieldset>
			<legend>Control</legend>
			<div class="row form-group">
			  <div class="col-md-2 col-xs-2">
				<label>Enabled?</label><br />
			    <div class="switch">
				 <input name="enabled" type="checkbox" <?php if($shoe["enabled"] == true) { echo 'checked'; } ?>>
			    </div>
			  </div>
			</div>
		  </fieldset>
		  <div class="form-actions">
			<a href="../shoes/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</form>
		<br /><br />
    </div>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt.js"></script>
	<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/foamlife/admin/js/jquery.datetimepicker.js"></script>
	<script>
		jQuery('#datepicker').datetimepicker({
			timepicker:false,
			format:'m-d-Y'
		});
	</script>
</body>
</html>
