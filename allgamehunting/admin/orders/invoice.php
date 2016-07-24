<?php
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/admin/utility/functions.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");

	$id = $_GET['id'];
	$order_result = mysqli_query($c, "SELECT * FROM orders WHERE id = '$id'");
	if (!$order_result) { echo 'Could not find order by the id specified.'; exit; }
	$order = mysqli_fetch_assoc($activation_result);

	$due_date = $_POST['due_date'];
	$past_due = isset($_POST['past_due']) && $_POST['past_due'] ? "yes" : "no";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Invoice</title>

	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body style="-moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; ">
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>

		<a href="../orders/" class="btn btn-link">&larr; Go back to orders</a>
		<header>
		  <h3>Invoice</h3>
		</header>

		<form class="form-grouped" action="invoice.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" data-validate>
		  <fieldset>
			<div class="row form-group">
			  <div class="col-md-5 col-xs-5">
				<label>Due Date</label>
				<input class="form-control" type="text" name="due_date" <?php echo 'value="'.$due_date.'"'; ?> required>
			  </div>
			  <div class="col-md-7 col-xs-7">
				<label>Is this a late payment?</label><br />
			    <div class="switch">
				 <input name="past_due" type="checkbox" <?php if($past_due == "yes") { echo 'checked'; } ?>>
			    </div>
			  </div>
			</div>
		  </fieldset>
		  <div class="form-actions">
			<a href="../products/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Update Invoice</button>
		  </div>
		</form>

		<h3>Copy everything in the box below and paste into an email</h3><br />

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="initial-scale=1.0"> <!-- So that mobile webkit will display zoomed in -->
		<meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
		<style type="text/css">
		.ReadMsgBody { width: 100%; background-color: #ebebeb;}
		.ExternalClass {width: 100%; background-color: #ebebeb;}
		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
		body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
		body {margin:0; padding:0;}
		table {border-spacing:0;}
		table td {border-collapse:collapse;}
		.yshortcuts a {border-bottom: none !important;}
		@media screen and (max-width: 600px) {
		  table[class="container"] {
			  width: 95% !important;
		  }
		}
		@media screen and (max-width: 480px) {
		  td[class="container-padding"] {
			  padding-left: 12px !important;
			  padding-right: 12px !important;
		  }
		}
		  @media only screen and (max-width : 600px) {
			  td[class="force-col"] {
				  display: block;
				  padding-right: 0 !important;
			  }
			  table[class="col-2"] {
				  float: none !important;
				  width: 100% !important;
				  margin-bottom: 12px;
				  padding-bottom: 12px;
				  border-bottom: 1px solid #eee;
			  }
			  table[id="last-col-2"] {
				  border-bottom: none !important;
				  margin-bottom: 0;
			  }
			  img[class="col-2-img"] {
				  float: right;
				  margin-left: 6px;
				  max-width: 130px;
			  }
		  }
		  </style>

		<div style="border:5px solid #515151; -moz-user-select: text; -khtml-user-select: text; -webkit-user-select: text; -o-user-select: text;">
			<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ebebeb">
			<tbody><tr><td align="center" valign="top" bgcolor="#ebebeb" style="background-color: #ebebeb;">
			<br><br>
			<table border="0" width="600" cellpadding="0" cellspacing="0" class="container" bgcolor="#ffffff"><tbody><tr><td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 14px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;-moz-box-shadow: 3px 3px 3px 3px #ccc;
			-webkit-box-shadow: 3px 3px 3px 3px #ccc;
			box-shadow: 3px 3px 3px 3px #ccc;&nbsp;border-radius:10px;"><br>

			<img src="<?php echo $setting['invoice_logo']; ?>" width="50%">
			<br>

			<table width="100%" order="0" cellpadding="0" cellspacing="0" class="columns-container"><tbody><tr><td class="force-col" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 13px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;" valign="top">

			<b>Invoice:</b><br><br>

			<table style="width:100%; font-size:12px;">
			<tbody>
			<tr>
			<td style="font-size:10px; color:white; background-color:#777777; padding:5px;">
			<b>DESCRIPTION</b>
			</td>
			<td style="font-size:10px; color:white; background-color:#777777; padding:5px;">
			<b>SUB-TOTAL</b>
			</td>
			</tr>
			<tr>
			<td style="color:#515151; border:1px solid #dfdfdf; padding:5px;">
			<?php echo $activation['description']." - ".$activation['plan_name']; ?>
			</td>
			<td style="color:#515151; border:1px solid #dfdfdf; padding:5px; text-align:right;">
			$<?php echo $activation['plan_price']; ?>
			</td>
			</tr>
			<tr>
			<td style="color:#515151; border:1px solid #dfdfdf; padding:5px;">
			Convenience fee
			</td>
			<td style="color:#515151; border:1px solid #dfdfdf; padding:5px; text-align:right;">
			$2.00
			</td>
			</tr>
			<tr>
			<td style="color:#515151; border:1px solid #dfdfdf; padding:5px; text-align:right;">
			<b>Grand Total:</b>
			</td>
			<td style="color:#515151; border:1px solid #dfdfdf; padding:5px; text-align:right;">
			<b>$<?php echo number_format($activation['plan_price'] + 2.00, 2); ?></b>
			</td>
			</tr>
			</tbody></table>

			<br>

			<table style="width:100%; font-size:12px; background-color:#f5f5f5;">
			<tbody>
			<tr>
			<td style="padding:10px;">
			Due date:<br><b><?php echo ($due_date == "" ? date("F jS, Y") : $due_date); if($past_due == "yes") { echo ' <span style="color:red;">(Past Due!)</span>'; } ?></b>
			</td>
			<td style="padding:10px; text-align:right;">
			<form name="_xclick" target="paypal" action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="item_number_1" value="<?php echo $activation['id']; ?>">
				<input type="hidden" name="item_name_1" value="<?php echo $activation['plan_name']; ?>">
				<input type="hidden" name="amount_1" value="<?php echo $activation['plan_price']; ?>">
				<input type="hidden" name="quantity_1" value="1">
				<input type="hidden" name="item_number_2" value="0">
				<input type="hidden" name="item_name_2" value="Convenience Fee">
				<input type="hidden" name="amount_2" value="2.00">
				<input type="hidden" name="quantity_2" value="1">
				<input type="hidden" name="upload" value="1" />
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="no_shipping" value="0">
				<input type="hidden" name="business" value="amar_anderson@yahoo.com">
				<input type="hidden" name="cpp_cart_border_color" value="E74C3C">
				<input type="image" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/images/paypal_pay_now.gif" alt="Pay">
			</form>
			</td>
			</tr>
			</tbody></table>

			<br>

			<b><?php echo $setting['invoice_contact_name']; ?></b><br>
			<?php echo $setting['invoice_contact_title']." - ".$site_name; ?><br>
			Cell:&nbsp;<b><?php echo $setting['invoice_contact_phone']; ?></b><br>
			Email:&nbsp;<b><?php echo $setting['invoice_contact_email']; ?></b>

			<br><br>
			<div style=" font-weight: bold; font-size: 18px; line-height: 24px; color: #D03C0F; border-top: 1px solid #ddd;"></div>
			<br><br>



			</td></tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			</td></tr>
			</tbody></table>

			<br>
			<br>
		</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt.js"></script>
</body>
</html>
