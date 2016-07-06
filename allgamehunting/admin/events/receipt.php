<?php
	include $_SERVER['DOCUMENT_ROOT'].'/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/admin/utility/functions.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings WHERE code LIKE 'receipt%' OR code LIKE '%link'");

	$id = $_GET['id'];
	$products = mysqli_query($c, "SELECT * FROM products WHERE id = '$id'");
	if (!$products) { echo 'Could not find product by the id specified.'; exit; }
	$p = mysqli_fetch_assoc($products);

	$payment_date = $_POST['payment_date'];
	$payment_method = $_POST['payment_method'];
	$amount_paid = $_POST['amount_paid'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name ?> - Receipt</title>

	<link rel="stylesheet" href="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.css">
</head>
<body style="-moz-user-select: none; -khtml-user-select: none; -webkit-user-select: none; -o-user-select: none; ">
	<div class="app-container" style="max-width:100%;">
		<?php include '../navigation.php'; ?>

		<a href="../products/" class="btn btn-link">&larr; Go back to products</a>
		<header>
		  <h3>Receipt</h3>
		</header>

		<form class="form-grouped" action="receipt.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" data-validate>
		  <fieldset>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Payment Date</label>
				<input class="form-control" type="text" name="payment_date" <?php echo 'value="'.$payment_date.'"'; ?>>
			  </div>
			  <div class="col-md-6 col-xs-6">
				<label>Amount Paid</label><br />
			    <input class="form-control" type="text" name="amount_paid" <?php echo 'value="'.$amount_paid.'"'; ?>>
			  </div>
			</div>
			<div class="row form-group">
			  <div class="col-md-6 col-xs-6">
				<label>Payment Method</label><br />
				<select name="payment_method">
					<option value="Debit Card" <?php if($payment_method == "Debit Card") { echo 'selected'; } ?>>Debit Card</option>
					<option value="Credit Card" <?php if($payment_method == "Credit Card") { echo 'selected'; } ?>>Credit Card</option>
					<option value="PayPal" <?php if($payment_method == "PayPal") { echo 'selected'; } ?>>PayPal</option>
					<option value="Check" <?php if($payment_method == "Check") { echo 'selected'; } ?>>Check</option>
					<option value="Cash" <?php if($payment_method == "Cash") { echo 'selected'; } ?>>Cash</option>
				</select>
			  </div>
			</div>
		  </fieldset>
		  <div class="form-actions">
			<a href="../products/" class="btn btn-danger">Cancel</a>
			<button type="submit" class="btn btn-primary">Update Receipt</button>
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
				<tbody>
					<tr>
						<td align="center" valign="top" bgcolor="#ebebeb" style="background-color: #ebebeb;">
							<br><br>
							<table border="0" width="600" cellpadding="0" cellspacing="0" class="container" bgcolor="#ffffff">
								<tbody>
									<tr>
										<td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 14px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;-moz-box-shadow: 3px 3px 3px 3px #ccc;
											-webkit-box-shadow: 3px 3px 3px 3px #ccc;
											box-shadow: 3px 3px 3px 3px #ccc;&nbsp;border-radius:10px;">
											<br>
											<img src="<?php echo $setting['receipt_logo']; ?>" width="50%">
											<br>
											<table border="0" cellpadding="0" cellspacing="0" class="columns-container">
												<tbody>
													<tr>
														<td class="force-col" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 13px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;" valign="top">

															<b>Receipt:</b><i> Thank you for your payment!</i><br><br>

															<table style="width:100%; font-size:12px;">
																<tbody>
																	<tr>
																		<td style="font-size:10px; color:white; background-color:#777777; padding:5px;">
																			<b>DESCRIPTION OF WORK</b>
																		</td>
																		<td style="font-size:10px; color:white; background-color:#777777; padding:5px;">
																			<b>SUB-TOTAL</b>
																		</td>
																	</tr>
																	<tr>
																		<td style="color:#515151; border:1px solid #dfdfdf; padding:5px;">
																			<?php echo $p['description']; ?>
																		</td>
																		<td style="color:#515151; border:1px solid #dfdfdf; padding:5px;">
																			$<?php echo ($p['on_sale'] == "no" ? $p['price'] : $p['sale_price']) ?>
																		</td>
																	</tr>
																	<tr>
																		<td style="color:#515151; border:1px solid #dfdfdf; padding:5px; text-align:right;">
																			<b>Grand Total:</b>
																		</td>
																		<td style="color:#515151; border:1px solid #dfdfdf; padding:5px;">
																			<b>$<?php echo ($p['on_sale'] == "no" ? $p['price'] : $p['sale_price']) ?></b>
																		</td>
																	</tr>
																</tbody>
															</table>

															<br>

															<table style="width:100%; font-size:12px; background-color:#f5f5f5;">
																<tbody>
																	<tr>
																		<td style="padding:10px;">
																			Payment date:<br><b><?php echo ($payment_date == "" ? date("F jS, Y") : $payment_date); ?></b>
																		</td>
																		<td style="padding:10px;">
																			Payment method:<br><b><?php echo ($payment_method == "" ? "Debit Card" : $payment_method); ?></b>
																		</td>
																		<td style="padding:10px; text-align:right;">
																			Amount Paid:<br><b>$<?php echo ($amount_paid == "" ? ($p['on_sale'] == "no" ? $p['price'] : $p['sale_price']) : $amount_paid); ?></b>
																		</td>
																	</tr>
																</tbody>
															</table>

															<br>

															<b><?php echo $setting['receipt_contact_name']; ?></b><br>
															<?php echo $setting['receipt_contact_title']; ?> - Wave Link, LLC<br>
															Cell:&nbsp;<b><?php echo $setting['receipt_contact_phone']; ?></b><br>
															Email:&nbsp;<b><?php echo $setting['receipt_contact_email']; ?></b>

															<br><br>
															<div style=" font-weight: bold; font-size: 18px; line-height: 24px; color: #D03C0F; border-top: 1px solid #ddd;"></div>
															<br>

															<a href="<?php echo $setting['facebook_link']; ?>"><img src="http://www.wavelinkllc.com/images/fb.png" width="4%"></a>
															<a href="<?php echo $setting['twitter_link']; ?>"><img src="http://www.wavelinkllc.com/images/twitter.png" width="4%">
															<a href="<?php echo $setting['linkedin_link']; ?>"><img src="http://www.wavelinkllc.com/images/linkedin.png" width="4%">
															<a href="<?php echo $setting['googleplus_link']; ?>"><img src="http://www.wavelinkllc.com/images/googleplus.png" width="4%">
															<a href="<?php echo $setting['instagram_link']; ?>"><img src="http://www.wavelinkllc.com/images/instagram.png" width="4%">
															<br>
															<br>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
			<br>
		</div>

	</div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt-uikit-0.11.0.min.js"></script>
	<script src="https://sdk.ttcdn.co/tt.js"></script>
</body>
</html>
