<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings WHERE page = 'dealership'");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Dealership Page</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		
		<h3>Dealership Page Settings</h3>
		
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
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>Name</label>
				<input class="form-control" type="text" name="name" <?php echo 'value="'.$setting['name'].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-12 col-xs-12">
				<label>About</label>
				<textarea class="form-control" name="about" id="about" rows="5" required><?php echo $setting['about']; ?></textarea>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Address 1</label>
				<input class="form-control" type="text" name="address1" <?php echo 'value="'.$setting['address1'].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Address 2</label>
				<input class="form-control" type="text" name="address2" <?php echo 'value="'.$setting['address2'].'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-4 col-xs-4">
				<label>City</label>
				<input class="form-control" type="text" name="city" <?php echo 'value="'.$setting['city'].'"'; ?> required>
			  </div>
			  <div class="col-md-4 col-xs-4">
				<label>State</label>
				<input class="form-control" type="text" name="state" <?php echo 'value="'.$setting['state'].'"'; ?> required>
			  </div>
			  <div class="col-md-4 col-xs-4">
				<label>Zip</label>
				<input class="form-control" type="text" name="zip" <?php echo 'value="'.$setting['zip'].'"'; ?> required>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Latitude</label>
				<input class="form-control" type="text" name="latitude" <?php echo 'value="'.$setting['latitude'].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Longitude</label>
				<input class="form-control" type="text" name="longitude" <?php echo 'value="'.$setting['longitude'].'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Facebook URL</label>
				<input class="form-control" type="text" name="facebook_url" <?php echo 'value="'.$setting['facebook_url'].'"'; ?> required>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Twitter URL</label>
				<input class="form-control" type="text" name="twitter_url" <?php echo 'value="'.$setting['twitter_url'].'"'; ?> required>
			  </div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		  </fieldset>
		</form>
		
		<br />
		
		<h3>Dealership Page Departments</h3>
		
		<br />
		
		<!--<a href="edit_department.php" class="btn btn-default"><b>+</b> Add new department</a>
		
		<br />
		<br />-->
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Department Id</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Weekday Hours</th>
					<th>Saturday Hours</th>
					<th>Sunday Hours</th>
					<th>Order Index</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$result = mysqli_query($c, "SELECT * FROM `departments` WHERE name <> 'Inquire' ORDER BY order_index ASC"); if(!$result) { echo "<br />".mysqli_error($c)."<br />"; }
					while($u = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
						echo 
						"<tr>
							<td>".$u["id"]."</td>
							<td>".$u["name"]."</td>
							<td>
								".$u["email"]."<br />
								".$u["phone"]."
							</td>
							<td>
								Open: ".$u["weekday_open_hour"]."<br />
								Close: ".$u["weekday_close_hour"]."
							</td>
							<td>
								Open: ".$u["saturday_open_hour"]."<br />
								Close: ".$u["saturday_close_hour"]."
							</td>
							<td>
								Open: ".$u["sunday_open_hour"]."<br />
								Close: ".$u["sunday_close_hour"]."
							</td>
							<td>".$u["order_index"]."</td>
							<td>
								<a href=\"edit_department.php?id=".$u["id"]."\" class=\"btn btn-default btn-sm\" style=\"display:inline;\">Edit</a>
							</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
		
		<br />	
		<br />
		
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>  
	<script src="https://sdk.ttcdn.co/tt.js"></script>  
</body>
</html>