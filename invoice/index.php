<?php
include '../utility/database.php';
include '../utility/functions.php';

$status = $_GET['status'];
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM products WHERE id = '$id'");
$p = mysql_fetch_assoc($result);
$error = 'no';
if (!$p) {
	$error = 'yes';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>Wave Link, LLC - Invoice</title>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/south-street/jquery-ui.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<?php include '../css/common.php'; ?>
	<link rel="stylesheet" href="../css/common.css">
	<style>
		<?php
			if($status == 'paid') {
				echo "#main { display:none; }
					  #error { display:none; }";
			} else if($error == 'no') {
				echo "#error { display:none; }
					  #paid { display:none; }";
			} else {
				echo "#main { display:none; }
					  #paid { display:none; }";
			}
		?>
		#invoice_table td { border:5px solid #2C3E50; }
	</style>
</head>
<body style="background-color:#2C3E50; background-position:0px 0px;">
	<div class="header" style="position:relative;">
		<a href="http://www.wavelinkllc.com"><img class="logo" src="../images/WaveLink_Logo_white.png" /></a>
		<table class="header_table"> 
			<tr>
				<td>
					<button class="call_to_action_button pure-button" onclick="location.href='http://www.wavelinkllc.com/contact'">
						<i class="fa fa-phone"></i>&nbsp;&nbsp;<b>CONTACT US</b>
					</button>
				</td>
				<td>
					<div class="social_button" onclick="location.href='https://www.facebook.com/WaveLinkLLC'">
						<i class="fa fa-facebook"></i>
					</div>
					<div class="social_button twitter_button" onclick="location.href='http://www.twitter.com'">
						<i class="fa fa-twitter"></i>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div id="main" class="intro_content">
		<div class="pure-g">
			<div class="pure-u-1-1 medium_text">
				<span class="big_text"><b><i>Invoice:</i></b></span><br/><br/>
				<table id="invoice_table" style="width:100%; padding:50px; background-color:#34495E; color:#dfdfdf;
					-webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;" cellpadding="10">
					<tr>
						<td style="width:80%;">
							DESCRIPTION
						</td>
						<td style="text-align:right;">
							SUB-TOTAL
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $p['description']; ?>
						</td>
						<td style="text-align:right;">
							$<?php echo ($p['on_sale'] == "no" ? $p['price'] : $p['sale_price']) ?>
						</td>
					</tr>
					<tr style="color:white;">
						<td style="text-align:right;">
							<b>Grand Total:&nbsp;&nbsp;</b>
						</td>
						<td style="text-align:right;">
							<b>$<?php echo ($p['on_sale'] == "no" ? $p['price'] : $p['sale_price']) ?></b>
						</td>
					</tr>
				</table>
				<br /><br />
				<div style="width:100%; text-align:right;">
					<form name="_xclick" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="item_number" value="<?php echo $p['id']; ?>">
						<input type="hidden" name="item_name" value="<?php echo $p['description']; ?>">
						<input type="hidden" name="amount" value="<?php echo ($p['on_sale'] == "no" ? $p['price'] : $p['sale_price']) ?>">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="no_shipping" value="1">
						<input type="hidden" name="return" value="http://www.wavelinkllc.com/invoice/?status=paid">
						<input type="hidden" name="cancel_return" value="http://www.wavelinkllc.com/invoice/?id=<?php echo $p['id']; ?>">
						<input type="hidden" name="business" value="payments@wavelinkllc.com">
						<input type="hidden" name="cpp_cart_border_color" value="26a9e0">
						<input type="submit" value="Pay Now" class="green_button pure-button" style="width:25%; font-size:35px;">
					</form>
				</div>
				<br />
				<div style="height:500px;"></div>
			</div>
		</div>
	</div>
	<div id="error" class="intro_content">
		<div class="pure-g">
			<div class="pure-u-1-1 small_text">
				<span class="medium_text"><b><img src="../images/error.png" style="height:40px;" />&nbsp;&nbsp;The URL entered was incorrect or does not exist anymore.<br />Please verify the link you were given or contact Wave Link, LLC for help.</b></span>
			</div>
		</div>
	</div>
	<div id="paid" class="intro_content">
		<div class="pure-g">
			<div class="pure-u-1-1 small_text">
				<span class="medium_text"><b><img src="../images/success.png" style="height:40px;" />&nbsp;&nbsp;Thank you for your payment!</b></span>
			</div>
		</div>
	</div>
</body>
</html>
