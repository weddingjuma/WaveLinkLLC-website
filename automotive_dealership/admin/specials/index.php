<?php
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings WHERE page = 'specials'");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Specials Page</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		
		<h3>Specials Page Settings</h3>
		
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
		
		<br />
		
		<h3>Specials</h3>
		
		<br />
		
		<a href="edit_special.php" class="btn btn-default"><b>+</b> Add new special</a>
		
		<br />
		<br />
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Special Id</th>
					<th>Photo</th>
					<th>Title</th>
					<th>Description</th>
					<th>Segue</th>
					<th>URL</th>
					<th>Order Index</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$result = mysqli_query($c, "SELECT * FROM `specials` ORDER BY order_index ASC"); if(!$result) { echo "<br />".mysqli_error($c)."<br />"; }
					while($u = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
						echo 
						"<tr>
							<td>".$u["id"]."</td>
							<td><img width=\"100px\" src=\"http://".$_SERVER['SERVER_NAME']."/automotive_dealership".$u["photo"]."\" /></td>
							<td>".$u["title"]."</td>
							<td>".$u["description"]."</td>
							<td>".$u["segue"]."</td>
							<td>".$u["url"]."</td>
							<td>".$u["order_index"]."</td>
							<td>
								<a href=\"edit_special.php?id=".$u["id"]."\" class=\"btn btn-default btn-sm\" style=\"display:inline;\">Edit</a>&nbsp;<a href=\"delete_special.php?id=".$u["id"]."\" class=\"btn btn-danger btn-sm\" style=\"display:inline;\" onclick=\"return confirm('Are you sure you want to delete this?');\">Delete</a>
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