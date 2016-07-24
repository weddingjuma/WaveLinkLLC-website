<?php
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/functions.php';
	$c = connect_to_database();
	$search = $_POST['search'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Orders</title>

	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body>
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>

		<h3>Orders</h3>

		<form class="form-inline row" method="post">
			<div class="col-xs-8 col-md-11">
				<?php
					if($search == "") {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search orders\" class=\"form-control\">";
					} else {
						echo "<input name=\"search\" type=\"search\" placeholder=\"Search orders\" class=\"form-control\" value=\"".$search."\">";
					}
				?>
			</div>
			<div class="col-xs-4 col-md-1">
				<button type="submit" class="btn btn-default">Search</button>
			</div>
		</form>

		<!--<a href="edit.php" class="btn btn-default"><b>+</b> Add new order</a>-->

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Order Id</th>
					<th>Customer</th>
					<th>Invoice</th>
					<th>Notes</th>
                    <th>Total</th>
					<th>Requested Date</th>
					<th>Completed?</th>
					<th>Completed Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM `orders`";
					if($search <> "") {
						$search = "%".$search."%";
						$query = $query." WHERE
							id LIKE '$search' OR
							first_name LIKE '$search' OR
							last_name LIKE '$search' OR
							email_address LIKE '$search' OR
							phone_number LIKE '$search'";
					}
					$result = mysqli_query($c, $query) or die(mysql_error());
					while($u = mysqli_fetch_array( $result, MYSQL_ASSOC )) {
						echo
						"<tr>
							<td>".$u["id"]."</td>
							<td>
								".$u["first_name"]." ".$u["last_name"]."<br />
								".$u["email_address"]." &middot; ".$u["phone_number"]."<br />
								".$u["mailing_address_1"]." ".$u["mailing_address_2"]."
								".$u["city"].", ".$u["state"]." ".$u["zip_code"]."
							</td>
							<td>".$u["invoice"]."</td>
							<td>".$u["notes"]."</td>
                            <td>".$u["total"]."</td>
							<td>".$u["date_added"]."</td>
							<td class=\"status\">"; if($u["date_completed"] != NULL) { echo "<span class=\"on\">"; } else { echo "<span class=\"off\">"; } echo "</span></td>
							<td>".($u["date_completed"] != NULL ? $u["date_completed"] : "n/a")."</td>
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
