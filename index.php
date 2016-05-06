<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "home");
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
	<link href='http://<?php echo $_SERVER['SERVER_NAME']; ?>/css/100kelvins.cube.css' rel='stylesheet' type='text/css'>
</head>
<body style="background-image:url('/images/background_pattern1.png');">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/facebook.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
	<section class="view">
		<div class="cube image_background">
			<figure class="front" style="background: #dfdfdf url('images/background4.jpg');">
				<div class="tent" style="opacity:.4;"></div>
				<?php echo get_background_design_html(); ?>
				<div class="content">
					<div class="big_text">
						WE CREATE
					</div>
					<div class="regular_text">
						Wave Link is a creative digital agency focused on providing results. 
						With our creative expertise and your future in mind, let us show you the results. 
					</div>
					<br /><br />
					<a class="white_button" href="/website">
						WEBSITES | AS LOW AS $400
					</a>
					<div class="responsive_divider"></div>
					<a class="white_button" href="/mobileapp/">
						MOBILE APPS | AS LOW AS $700
					</a>
				</div>
			</figure>
			<figure class="bottom" style="background: #dfdfdf url('images/background5.jpg');">
				<?php echo get_background_design_html(); ?>
				<div class="content">
					<div class="big_text">
						WE DESIGN
					</div>
					<div class="regular_text">
						With Wave Link your plans meet with our passion for design and your dreams match our dedication to providing unique, customized web/app design services that turns your vision into success.
					</div>
					<br /><br />
					<a class="white_button" href="/marketing/">
						GRAPHICS | AS LOW AS $50/HOUR
					</a>
				</div>
			</figure>
			<figure class="back" style="background: #dfdfdf url('images/background2.jpg');">
				<?php echo get_background_design_html(); ?>
				<div class="content">
					<div class="big_text">
						WE MARKET
					</div>
					<div class="regular_text">
						A great product is wasted if no one knows about it. Wave Link has experts who develop innovative strategies to help your product not only be seen, but sold. 
					</div>
					<br /><br />
					<a class="white_button" href="/marketing/">
						MARKETING | AS LOW AS $54/MONTH
					</a>
				</div>
			</figure>
			<figure class="top" style="background: #dfdfdf url('images/background6.jpg');">
				<div class="tent" style="opacity:.5;"></div>
				<?php echo get_background_design_html(); ?>
				<div class="content">
					<div class="big_text">
						WE SOLVE
					</div>
					<div class="regular_text">
						Wave Link offers world class website/app maintenance and hosting to all of our clients. 
						Skip the headaches and let our team keep your product up-and-running.
					</div>
					<br /><br />
					<a class="white_button" href="/contact/">
						MAINTENANCE | AS LOW AS $50/MONTH
					</a>
				</div>
			</figure>
		</div>
	</section>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/runner.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
	<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/100kelvins.cube.js"></script>
</body>
</html>
<script>
	$( document ).ready(function() { });
</script>