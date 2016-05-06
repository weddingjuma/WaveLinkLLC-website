<?php
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/mboc/admin/utility/functions.php';
	$c = connect_to_database();
	$search = $_POST['search'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Accounts</title>
	
	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>
		
		<h3>Accounts</h3>
	
		<form class="form-inline row" method="post">
			<div class="col-xs-8 col-md-11">
				<?php 
					if($search == "") {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search accounts\" class=\"form-control\">";
					} else {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search accounts\" class=\"form-control\" value=\"".$search."\">";
					}
				?>
			</div>
			<div class="col-xs-4 col-md-1">
				<button type="submit" class="btn btn-default">Search</button>
			</div>
		</form>
		
		<a href="edit.php" class="btn btn-default"><b>+</b> Add new account</a>
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Account Id</th>
					<th>Photo</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>VIN</th>
					<th>Facebook Id</th>
					<th>Twitter Id</th>
					<th>Digits Id</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `users`";
					if($search <> "") {
						$search = "%".$search."%";
						$query = $query." WHERE 
							id LIKE '$search' OR 
							name LIKE '$search' OR 
							email LIKE '$search' OR 
							phone LIKE '$search' OR 
							vin LIKE '$search'";
					}
					$result = mysqli_query($c, $query); if(!$result) { echo "<br />".mysqli_error($c)."<br />"; }
					while($u = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
						echo 
						"<tr>
							<td>".$u["id"]."</td>
							<td><img width=\"50px\" src=\"http://".$_SERVER['SERVER_NAME']."/mboc".$u["photo"]."\" /></td>
							<td>".$u["name"]."</td>
							<td>".$u["email"]."</td>
							<td>".$u["phone"]."</td>
							<td>".$u["vin"]."</td>
							<td>".$u["facebookId"]."</td>
							<td>".$u["twitterId"]."</td>
							<td>".$u["digitsId"]."</td>
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