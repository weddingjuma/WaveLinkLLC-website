<?php
include '../utility/database.php';
include '../utility/functions.php';

$code=$_GET['code'];
if($code==""){ $code = "none"; }
$user_id = @mysql_result(mysql_query("SELECT user_id FROM contracts WHERE code = '$code'"),0);
if($user_id==""){ $user_id = "none"; }
$email = @mysql_result(mysql_query("SELECT email FROM users WHERE id = '$user_id'"),0);
$signed = false;
if(mysql_num_rows(mysql_query("SELECT signature_url FROM `contracts` WHERE code='$code' AND signature_url <> 'none'"))){
	$signed = true;
}
$contract_url = @mysql_result(mysql_query("SELECT contract_url FROM contracts WHERE code = '$code'"),0);
$contract_description = @mysql_result(mysql_query("SELECT description FROM contracts WHERE code = '$code'"),0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>Wave Link, LLC - Sign your contract</title>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/south-street/jquery-ui.css" rel="stylesheet">
	<link href="jquery.signature.css" rel="stylesheet">
	<style>
	.kbw-signature { width: 100%; height: 300px; }
	</style>
	<!--[if IE]>
	<script src="excanvas.js"></script>
	<![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
	<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>
	<script src="jquery.signature.js"></script>
	<?php include '../css/common.php'; ?>
	<link rel="stylesheet" href="../css/common.css">
	<style>
	<?php 
		if($user_id == "none") {
			echo "#main { display:none; }
				  #signed { display:none; }";
		} else if($signed == true) {
			echo "#main { display:none; }
				  #error { display:none; }";
		} else {
			echo "#error { display:none; }
				  #signed { display:none; }";
		}
	?>
	</style>
	<script>
	$(function() {
		$('#sig').signature({guideline: true, guidelineOffset: 25, guidelineIndent: 20, guidelineColor: '#515151'});
		$('#clear').click(function() {
			$('#sig').signature('clear');
		});
		$('#json').click(function() {
			alert($('#sig').signature('toJSON'));
		});
		$('#svg').click(function() {
			alert($('#sig').signature('toSVG'));
		});
	});
	</script>
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
			<div class="pure-u-1-1 small_text">
				<form id="contract_form" class="pure-form">
					<span class="medium_text"><b>Read and sign your contract - <i><?php echo $contract_description; ?></i></b></span><br/><br/>
					<input name="email" type="email" placeholder="Enter your email address" style="width:45%; font-size:35px; font-weight:300; border:none; background-color:rgba(255,255,255,0.2); color:white; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="phone" placeholder="..and/or your phone number" style="width:45%; font-size:35px; font-weight:300; border:none; background-color:rgba(255,255,255,0.2); color:white; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none;">
					<br /><br />
					<?php echo '
					<iframe style="width:100%; height:1000px;" frameBorder="0" seamless="seamless" src="'.$contract_url.'"></iframe>
					'; ?>
					<br/><br/>
					<span class="medium_text"><b>Write your signature in the white box below:</b></span><br/><br/>
					<div id="sig" style="border:none; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;"></div>
					<br /><br /><br />
					<div id="clear" class="clear_button" style="font-size:35px;">
						CLEAR
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="green_button pure-button" onclick="submit_contract(); return false;" style="font-size:35px;">
						SUBMIT CONTRACT
					</div>
					<br /><br /><br />
					<div id="response" style="font-size:35px;"></div>
					<br />
					<div style="height:500px;"></div>
					<?php 
					echo '<input name="user_id" type="hidden" value="'.$user_id.'" />'; 
					echo '<input name="code" type="hidden" value="'.$code.'" />'; 
					?>
					<input id="signature" name="signature" type="hidden" />
				</form>
			</div>
		</div>
	</div>
	<div id="signed" class="intro_content">
		<div class="pure-g">
			<div class="pure-u-1-1 small_text">
				<span class="medium_text"><b><img src="../images/success.png" style="height:40px;" />&nbsp;&nbsp;This contract has been signed! You've been sent a confirmation email to <?php echo $email; ?>. <i>Thank you!</i></b><br/>*Please contact us if you are not the one who signed this contract.</span>
			</div>
		</div>
	</div>
	<div id="error" class="intro_content">
		<div class="pure-g">
			<div class="pure-u-1-1 small_text">
				<span class="medium_text"><b><img src="../images/error.png" style="height:40px;" />&nbsp;&nbsp;The URL entered was incorrect. Please verify the link you were given or contact Wave Link, LLC for help.</b></span>
			</div>
		</div>
	</div>
</body>
<script>
	function submit_contract(){
		$("#signature").val($('#sig').signature('toSVG'));
		$.post( "submit_contract.php", $( "#contract_form" ).serialize() )
		  .done(function( data ) {
		  	var json = jQuery.parseJSON(data);
		  	if(json.status == "SUCCESS") {
		  		location.reload();
		  	} else {
				$( "#response" ).html( json.html );
				alert(json.text);
			}
		  })
		  .fail(function() {
			alert( "There was an network error. Please try again." );
		  });
	}
</script>
</html>
