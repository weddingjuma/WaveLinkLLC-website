<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "contact");
	$metatags = build_metatags($seo, $setting); 
	$detect = new Mobile_Detect; 
	$prefill = $_GET['prefill'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
		echo $metatags; 
		include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; 
	?>
</head>
<body style="background-image:url('../images/background1.png'); background-repeat: no-repeat; background-size: cover;">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/facebook.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
	<div class="tent" style="opacity:.5;"></div>
	<form id="contact_form">
		<div class="contact">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="contact_title">
						GET STARTED TODAY!
						<div style="font-size:17px;"><?php echo $setting['contactus_phone'] ?> &middot; <?php echo $setting['contactus_email'] ?></div>
					</div>
				</div>
				<div class="col-xs-6 col-md-6">
					<input class="contact_text_box" type="text" name="firstname" placeholder="First Name.." />
				</div>
				<div class="col-xs-6 col-md-6">
					<input class="contact_text_box" type="text" name="lastname" placeholder="Last Name.." />
				</div>
				<div class="col-xs-6 col-md-6">
					<input class="contact_text_box" type="text" name="email" placeholder="Email Address.." />
				</div>
				<div class="col-xs-6 col-md-6">
					<input class="contact_text_box" type="text" name="phone" placeholder="Phone Number.." />
				</div>
				<div class="col-xs-12 col-md-12">
					<textarea class="contact_text_box" name="description" placeholder="What can we do for you?..." rows="7"><?php echo $prefill; ?></textarea>
				</div>
				<div class="col-xs-12 col-md-12">
					<button class="contact_button" onclick="submit_contact(); return false;">SUMBIT</button>
				</div>
				<span id="response"></span>
			</div>
		</div>
	</form>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/runner.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
	<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/100kelvins.cube.js"></script>
</body>
</html>
<script>
	function submit_contact(){
		$.post( "../submit_contact.php", $( "#contact_form" ).serialize() )
			.done(function( data ) {
				$( "#response" ).html( data );
			})
			.fail(function() {
				alert( "There was an network error. Please try again." );
			});
		}
</script>