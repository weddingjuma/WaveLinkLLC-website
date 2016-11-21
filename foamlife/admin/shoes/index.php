<?php
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/functions.php';
	$datebase_connection = connect_to_database();
	$search = $_POST['search'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Shoes</title>

	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>

		<h3>Shoes</h3>

		<form class="form-inline row" method="post">
			<div class="col-xs-8 col-md-11">
				<?php
					if($search == "") {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search shoes\" class=\"form-control\">";
					} else {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search shoes\" class=\"form-control\" value=\"".$search."\">";
					}
				?>
			</div>
			<div class="col-xs-4 col-md-1">
				<button type="submit" class="btn btn-default">Search</button>
			</div>
		</form>

		<a href="edit.php" class="btn btn-default"><b>+</b> Add new shoe</a>
		<a href="../categories/" class="btn btn-default"><b>+</b> Add/Edit Categories</a>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Shoe Id</th>
					<th>Image</th>
					<th>Name/Color</th>
					<th>Date</th>
					<th>Category(s)</th>
					<th>Enabled?</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `shoes`";
					if($search <> "") {
						$search = "%".$search."%";
						$query = $query." WHERE
							name LIKE '$search' OR
                            color LIKE '$search' OR
							description LIKE '$search' OR
							category_1 LIKE '$search' OR
							category_2 LIKE '$search' OR
							category_3 LIKE '$search'";
					}
					$query = $query.' ORDER BY date ASC';
					$data = mysqli_query($datebase_connection, $query) or die(mysql_error());
					while ($shoe = mysqli_fetch_array($data, MYSQL_ASSOC)) {
						echo
						"<tr>
							<td>".$shoe['id']."</td>
							<td><img width=\"100px\" src=\"http://".$_SERVER['SERVER_NAME']."/foamlife".$shoe['image_url_1']."\" /></td>
							<td>
								".$shoe['name']."<br />
								".$shoe['color']."
							</td>
							<td>".$shoe["date"]."</td>
							<td>
								".($shoe["category_1"] <> null ? $shoe["category_1"]."<br />" : '')."
								".($shoe["category_2"] <> null ? $shoe["category_2"]."<br />" : '')."
								".($shoe["category_3"] <> null ? $shoe["category_3"] : '')."
							</td>
                            <td class=\"status\">"; if ($shoe["enabled"] == true) { echo "<span class=\"on\">"; } else { echo "<span class=\"off\">"; } echo "</span></td>
							<td>
								<a href=\"edit.php?id=".$shoe["id"]."\" class=\"btn btn-default btn-sm\" style=\"display:inline;\">Edit</a>&nbsp;<a href=\"delete.php?id=".$shoe["id"]."\" class=\"btn btn-danger btn-sm\" style=\"display:inline;\" onclick=\"return confirm('Are you sure you want to delete this?');\">Delete</a>
							</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
		<br /><br />
    </div>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt.js"></script>
</body>
</html>
