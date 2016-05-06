<?php
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "contact");
	$metatags = build_metatags($seo, $setting); 
	$detect = new Mobile_Detect; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
		echo $metatags; 
		include '../css/main.php'; 
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/facebook.php'; ?>
	<div class="row slideshow">
		<div class="col-xs-12 col-md-12 slideshow_image">
			<iframe frameborder="0" style="width:100%; height:100%; border:0;" src="https://www.google.com/maps/embed/v1/place?q=<?php echo str_replace(" ", "+", $setting['address1']." ".$setting['address2']." ".$setting['city'].",".$setting['state']." ".$setting['zip']); ?>&key=AIzaSyClRHLbLGnnFsMAj9MJWj_ouXxXI9w-kOQ"></iframe>
		</div>
	</div>
	<div class="row content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-7 content_div">
					<div class="title">Contact Us</div>
					<form id="contact_form">
						<div class="row">
							<div class="col-xs-12 col-md-12 left_widget">
								<input class="contact_textbox" name="first_name" type="text" class="form-control" placeholder="First Name">
							</div>
							<div class="col-xs-12 col-md-12 right_widget">
								<input class="contact_textbox" name="last_name" type="text" class="form-control" placeholder="Last Name">
							</div>
							<div class="col-xs-12 col-md-12 left_widget">
								<input class="contact_textbox" name="phone" type="text" class="form-control" placeholder="Phone">
							</div>
							<div class="col-xs-12 col-md-12 right_widget">
								<input class="contact_textbox" name="email" type="email" class="form-control" placeholder="Or Email">
							</div>
						</div>
						<button id="submit_button" type="submit" class="btn btn-success contact_button text-uppercase" onclick="add_contact(); return false;">Send</button>
						<span id="response"></span>
					</form>
				</div>
				<div class="col-xs-12 col-md-5 content_div">
					<div class="title">Find Us</div>
					<div class="pricing">
						<?php echo $setting['email']; ?>
					</div>
					<div class="pricing">
						<?php echo $setting['phone']; ?>
					</div>
					<div class="pricing">
						<?php echo $setting['address1']." ".$setting['address2']." ".$setting['city'].", ".$setting['state']." ".$setting['zip']; ?>
					</div>
					<div class="pricing">
						<i class="fa fa-facebook" onclick="window.open('<?php echo $setting['facebook_link']; ?>');"></i><br />
						<i class="fa fa-twitter" onclick="window.open('<?php echo $setting['twitter_link']; ?>');"></i><br />
						<i class="fa fa-instagram" onclick="window.open('<?php echo $setting['instagram_link']; ?>');"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/footer.php'; ?>
	<?php include '../js/main.php'; ?>
	<script>
		function add_contact(){
			$( "#submit_button" ).hide();
			$( "#response" ).html( "Loading..." );
			$.post( "../add_contact.php", $( "#contact_form" ).serialize() )
			  .done(function( data ) {
				$( "#response" ).html( data );
			  })
			  .fail(function() {
			  	$( "#response" ).html( "Network error." );
				alert( "There was an network error. Please try again." );
			  })
			  .always(function() {
				$( "#submit_button" ).show();
			  });
		}
	</script>
</body>
</html>