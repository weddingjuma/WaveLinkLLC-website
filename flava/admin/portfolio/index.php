<?php
	include $_SERVER['DOCUMENT_ROOT'].'/flava/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/admin/utility/functions.php';
	$c = connect_to_database();
	$search = $_POST['search'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Gallery</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		
		<h3>Gallery</h3>
	
		<form class="form-inline row" method="post">
			<div class="col-xs-8 col-md-11">
				<?php 
					if($search == "") {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search gallery\" class=\"form-control\">";
					} else {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search gallery\" class=\"form-control\" value=\"".$search."\">";
					}
				?>
			</div>
			<div class="col-xs-4 col-md-1">
				<button type="submit" class="btn btn-default">Search</button>
			</div>
		</form>
		
		<a href="edit.php" class="btn btn-default"><b>+</b> Add new gallery item</a>
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Images</th>
					<th>Name</th>
					<th>About</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `portfolio`";
					if($search <> "") {
						$search = "%".$search."%";
						$query = $query." WHERE 
							title LIKE '$search' OR 
							description LIKE '$search' OR 
							category1 LIKE '$search' OR 
							category2 LIKE '$search' OR 
							category3 LIKE '$search'";
					}
					$result = mysqli_query($c, $query) or die(mysql_error());
					while($u = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
						echo 
						"<tr>
							<td><a href=\"http://".$_SERVER['SERVER_NAME']."/portfolio/?id=".$u["id"]."\" target=\"_blank\">".$u["id"]."</a></td>
							<td><img width=\"100px\" src=\"http://".$_SERVER['SERVER_NAME']."/".$u["image1"]."\" /></td>
							<td>".$u["title"]."</td>
							<td>".$u["description"]."</td>
							<td>
								<a href=\"edit.php?id=".$u["id"]."\" class=\"btn btn-default btn-sm\" style=\"display:inline;\">Edit</a>&nbsp;<a href=\"delete.php?id=".$u["id"]."\" class=\"btn btn-danger btn-sm\" style=\"display:inline;\" onclick=\"return confirm('Are you sure you want to delete this?');\">Delete</a>
							</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
		
		<br /><br />
		
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>  
	<script src="https://sdk.ttcdn.co/tt.js"></script>  
</body>
</html>