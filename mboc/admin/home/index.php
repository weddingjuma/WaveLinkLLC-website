<?php
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/functions.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings WHERE page = 'home'");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Home Page</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		
		<h3>Home Page Settings</h3>
		
		<form class="form-grouped" action="submit_settings.php" method="post" enctype="multipart/form-data" data-validate>		
		  <fieldset>
			<div class="row form-group">
			  <div class="col-md-4 col-xs-4">
				<label>Phone Number</label>
				<input class="form-control" type="text" name="phone_number" <?php echo 'value="'.$setting['phone_number'].'"'; ?> required>
			  </div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		  </fieldset>
		</form>
		
		<br />
		
		<h3>Home Page Menu Items</h3>
		
		<br />
		
		<a href="edit_menu_item.php" class="btn btn-default"><b>+</b> Add new menu item</a>
		
		<br />
		<br />
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Menu Item Id</th>
					<th>Name</th>
					<th>Icon</th>
					<th>Badge</th>
					<th>Segue</th>
					<th>URL</th>
					<th>Order Index</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$result = mysqli_query($c, "SELECT * FROM `menu_items` WHERE page = 'home' ORDER BY order_index ASC"); if(!$result) { echo "<br />".mysqli_error($c)."<br />"; }
					while($u = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
						echo 
						"<tr>
							<td>".$u["id"]."</td>
							<td>".$u["name"]."</td>
							<td>".$u["icon"]."</td>
							<td>".$u["badge"]."</td>
							<td>".$u["segue"]."</td>
							<td>".$u["url"]."</td>
							<td>".$u["order_index"]."</td>
							<td>
								<a href=\"edit_menu_item.php?id=".$u["id"]."\" class=\"btn btn-default btn-sm\" style=\"display:inline;\">Edit</a>&nbsp;<a href=\"delete_menu_item.php?id=".$u["id"]."\" class=\"btn btn-danger btn-sm\" style=\"display:inline;\" onclick=\"return confirm('Are you sure you want to delete this?');\">Delete</a>
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