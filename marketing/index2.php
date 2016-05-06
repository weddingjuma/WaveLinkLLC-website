<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "marketing");
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
		include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; 
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/facebook.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
	<div class="screen" style="background-image: url('../images/blue.png');">
		<?php echo get_background_design_html(); ?>
		<div class="row screen_row">
			<div class="col-xs-12 col-md-12" style="text-align:right;">
				<div class="screen_text" style="margin-top:100px; margin-bottom:25px;">
					<div class="big_text">
						MARKETING
					</div>
					<div class="regular_text">
						Wave Link provides innovative and cutting edge mobile applications for iOS and Android.
						<br /><br />
						<a id="pricing_button" class="white_button">
							PRICING AND FEATURES <i class="fa fa-arrow-down"></i>
						</a>
					</div>
				</div>
				<img class="screen_image" style="position:absolute; right:20px; height:300px;" src="../images/social-media.png" />
			</div>
		</div>
	</div>
	<div class="screen_space"></div>
	<div id="pricing" class="row pricing">
		<div class="col-xs-12 col-md-12 pricing_header">
			PRICING
		</div>
		<div class="col-xs-12 col-md-4 pricing_wrapper">
			<div class="pricing_box pricing_box_left">
				<div class="pricing_box_icon">
					<i class="fa fa-thumbs-up"></i>
				</div>
				<div class="pricing_box_title">
					BASIC $800 - $1000
				</div>
				<div class="pricing_box_feature">
					<i class="fa fa-check"></i> Up to 20 pages<br />
					<i class="fa fa-check"></i> Up to 20 custom graphics and images<br />
					<i class="fa fa-check"></i> Blog or content creation/editing handled by a third party (WordPress, Facebook)<br />
					<i class="fa fa-check"></i> Basic online store with product pages and PayPal<br /> 
					<i class="fa fa-check"></i> Donation or checkout button<br />
					<i class="fa fa-check"></i> Basic user logins/profiles for saving minor data and browsing <br />
					<i class="fa fa-check"></i> "Like us on Facebook" button, social feeds for your accounts, etc.<br />
					<i class="fa fa-check"></i> Portal handled by a third party (WordPress, etc.)<br />
					<i class="fa fa-check"></i> Appointment scheduling handled by a third party<br />
					<i class="fa fa-check"></i> Basic touch gesture, camera, calendar, and contacts functionality<br />
					<i class="fa fa-check"></i> Basic animations and scoring<br />
				</div>
				<a class="white_button" href="../contact/">GET STARTED</a>
			</div>
		</div>
		<div class="col-xs-12 col-md-4 pricing_wrapper">
			<div class="pricing_box pricing_box_middle">
				<div class="pricing_box_icon">
					<i class="fa fa-star"></i>
				</div>
				<div class="pricing_box_title">
					STANDARD $1000 - $1500
				</div>
				<div class="pricing_box_feature">
					<i class="fa fa-check"></i> Up to 20 pages<br />
					<i class="fa fa-check"></i> Up to 20 custom graphics and images<br />
					<i class="fa fa-check"></i> Blog or content creation/editing handled by a third party (WordPress, Facebook)<br />
					<i class="fa fa-check"></i> Basic online store with product pages and PayPal<br /> 
					<i class="fa fa-check"></i> Donation or checkout button<br />
					<i class="fa fa-check"></i> Basic user logins/profiles for saving minor data and browsing <br />
					<i class="fa fa-check"></i> "Like us on Facebook" button, social feeds for your accounts, etc.<br />
					<i class="fa fa-check"></i> Portal handled by a third party (WordPress, etc.)<br />
					<i class="fa fa-check"></i> Appointment scheduling handled by a third party<br />
					<i class="fa fa-check"></i> Basic touch gesture, camera, calendar, and contacts functionality<br />
					<i class="fa fa-check"></i> Basic animations and scoring<br />
				</div>
				<a class="white_button" href="../contact/">GET STARTED</a>
			</div>
		</div>
		<div class="col-xs-12 col-md-4 pricing_wrapper">
			<div class="pricing_box pricing_box_right">
				<div class="pricing_box_icon">
					<i class="fa fa-trophy"></i>
				</div>
				<div class="pricing_box_title">
					ADVANCED $1500+
				</div>
				<div class="pricing_box_feature">
					<i class="fa fa-check"></i> Unlimited pages<br />
					<i class="fa fa-check"></i> Unlimited custom graphics and images<br />
					<i class="fa fa-check"></i> Custom admin panel for content creation/editing and blogging<br />
					<i class="fa fa-check"></i> Major online store; unlimted products and pages; multiple payment options<br />
					<i class="fa fa-check"></i> Donation or checkout button<br />
					<i class="fa fa-check"></i> User logins/profiles for browsing, shopping, saving data, and social interaction<br />
					<i class="fa fa-check"></i> Social functions are built into app (your users can post, "like", comment, login with Facebook, share to Twitter, etc.)<br />
					<i class="fa fa-check"></i> Custom built portal (ex. employee work portal)<br />
					<i class="fa fa-check"></i> Custom built appointment scheduling<br />
					<i class="fa fa-check"></i> Advanced touch gesture, camera, calendar, contacts, geolocation, and audio functionality<br />
					<i class="fa fa-check"></i> Advanced animation, scoring, controls, and graphics<br />
				</div>
				<a class="white_button" href="../contact/">GET STARTED</a>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/runner.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
<script>
	$( document ).ready(function() {
		setSpace();
	});
	
	$(window).resize(function() {
		setSpace();
	});
	
	$("#pricing_button").click(function() {
	    $('html, body').animate({
	        scrollTop: $("#pricing").offset().top
	    }, 500);
	});
	
	function setSpace() {
		$('.screen_space').height($(window).height());
	}
</script>