<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "marketing");
	$metatags = build_metatags($seo, $setting); 
	$detect = new Mobile_Detect; 
	$header_logo = "../images/WaveLink_Logo.png";
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
	<style>
		.header {
			position: fixed;
			width:100%;
			height:85px;
			z-index: 1000;
			margin: 0px;
			padding: 15px 20px 20px 20px;
			color: #262626;
			background-color: #f9f9fa;
			box-shadow: 0px 0px 1px 1px #b9b9b9;
		}
		
		.header > div > a {
		    color: #262626;
		}
		
		.header > div > a:hover {
			color: black;
		}
		
		.header_link {
			font-size: 11px;
			font-weight: 700;
			letter-spacing: 0.125em;
		}
		
		.header_link_contact {
			color: #262626;
		}
		
		.header_icon {
			font-size: 18px;
			vertical-align: middle;
		}
		
		.header_icon_contact {
			color: #262626;
		}
	</style>
</head>
<body style="background-image:url('../images/background_pattern1.png');">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/facebook.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
	<section class="view">
		<div class="cube pattern_background">
			<figure class="front" style="background: url('../images/notebook.png');">
				<div class="row info">
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#26a9e0;">
						<div class="info_big_text" style="color:white;">
							SOCIAL MEDIA MARKETING
						</div>
						<div class="info_regular_text" style="color:white;">
							These days it's crucial that you have a strong social media presence.
							Let Wave Link handle all of that so you can focus on the leads.
							We offer social media marketing for all of the major platforms and have proven results!
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('social_media_marketing'); return false;">
							GET STARTED | $54+/month
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-6 info_block info_image" style="background-image:url('../images/background29.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-facebook"></i> | Facebook
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-twitter"></i> | Twitter
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-instagram"></i> | Instagram
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-cogs"></i> | Analytics
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/background30.jpg');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#26a9e0;">
						<i class="fa fa-pencil"></i>
					</div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/background31.jpg');"></div>
				</div>
			</figure>
			<figure class="bottom" style="background: url('../images/notebook.png');">
				<div class="row info">
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background32.jpg');"></div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#26a9e0;">
						<div class="info_big_text" style="color:white;">
							GRAPHICS
						</div>
						<div class="info_regular_text" style="color:white;">
							A business is only as good as it's brand. It's what people perceive you as and remember you by.
							Wave Link offers a full suite of graphic services to help make your brand stand out!
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('graphics'); return false;">
							GET STARTED | $50+/hour
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/SSA-logo-9-black-background.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-apple"></i> | Logos
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-info-circle"></i> | Infographics
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-th"></i> | Color Palette
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-facebook"></i> | Profile Pics & Banners
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#26a9e0;">
						<i class="fa fa-pencil"></i>
					</div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/background33.jpg');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/Essence-of-Eden-logo4.png');"></div>
				</div>
			</figure>
			<figure class="back" style="background: url('../images/notebook.png');">
				<div class="row info">
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image"  style="background-image:url('../images/background34.jpg');"></div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('branding_materials'); return false;">
							GET STARTED | $50+
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#26a9e0;">
						<div class="info_big_text" style="color:white;">
							BRANDING MATERIALS
						</div>
						<div class="info_regular_text" style="color:white;">
							Marketing materials can leave a long-lasting impression on potential customers.
							They can repeatedly put your brand in their minds.
							Wave Link offers a variety of options.
						</div>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background35.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-briefcase"></i> | Business Cards
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-maps-signs"></i> | Flyers
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-flag"></i> | Banners
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-pencil"></i> | Pens
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/background36.jpg');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/background37.png');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#26a9e0;">
						<i class="fa fa-pencil"></i>
					</div>
				</div>
			</figure>
			<figure class="top" style="background: url('../images/notebook.png');">
				<div class="quote_text">
					<i>“I use social media as an idea generator, trend mapper and strategic compass for all of our online business ventures.”</i>
				</div>
				<div class="quote_author">
					- Paul Barron (@paulbarron) 
				</div>
			</figure>
		</div>
	</section>
	<div id="pricing_modal_social_media_marketing" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-pencil"></i>
			</div>
			<div class="pricing_box_title">
				SOCIAL MEDIA MARKETING | $54+/month
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> 3 Social Media Accounts (Facebook, Google Plus, Twitter, Instagram or Pinterest)<br />
				<i class="fa fa-check"></i> Complete Customizable Content Creation provided by Wave Link, LLC – 4 posting days a week (your choice in posting days and time, including weekends)<br />
				<i class="fa fa-check"></i> Current Account Cleanup<br />
				<i class="fa fa-check"></i> Community Engagement – Monitoring Social Media presence and referring relevant comments or issues to you for consideration / action as required<br />
				<i class="fa fa-check"></i> Sales and promotion posts (provided by client)<br />
				<i class="fa fa-check"></i> Photo & Video Uploads (provided by the client)<br />
				<i class="fa fa-check"></i> Monthly or quarterly reporting<br />
				<i class="fa fa-check"></i> A dedicated Social Media Manager (monitors accounts for Spam, relevance etc.)<br />
				<i class="fa fa-check"></i> Capitalizing on Keywords and Tending Topics<br />
				<i class="fa fa-check"></i> Advertising Management<br />
				<i class="fa fa-check"></i> 1 month Facebook Ad $25.00<br />
				<i class="fa fa-check"></i> Targeted Follower / Fan Acquisitions<br />
				<i class="fa fa-check"></i> One-time Search Engine Optimization of current website<br />
			</div>
			<a class="pricing_box_button" href="../contact/">GET STARTED</a>
		</div>
	</div>
	<div id="pricing_modal_graphics" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-pencil"></i>
			</div>
			<div class="pricing_box_title">
				GRAPHICS | $50+/hour
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> Logos for business or brand<br />
				<i class="fa fa-check"></i> Graphics for branding materials<br />
				<i class="fa fa-check"></i> Color palettes to be used with logos, branding, etc.<br />
				<i class="fa fa-check"></i> Social media profile photos and banners<br />
				<i class="fa fa-check"></i> Custom icons for apps or websites<br />
				<i class="fa fa-check"></i> Multiple mock-ups to choose from<br />
				<i class="fa fa-check"></i> Images delivered in many formats/sizes<br />
				<i class="fa fa-check"></i> Versions for dark or light backgrounds<br />
			</div>
			<a class="pricing_box_button" href="../contact/">GET STARTED</a>
		</div>
	</div>
	<div id="pricing_modal_branding_materials" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-pencil"></i>
			</div>
			<div class="pricing_box_title">
				BRANDING MATERIALS | $50+
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> Sleek business cards for business or brand<br />
				<i class="fa fa-check"></i> Flyers for sales or events<br />
				<i class="fa fa-check"></i> Banners for business or brand<br />
				<i class="fa fa-check"></i> Pens for business or brand<br />
				<i class="fa fa-check"></i> Unique colors utilized<br />
				<i class="fa fa-check"></i> Multiple mock-ups to choose from<br />
				<i class="fa fa-check"></i> Printing options available<br />
			</div>
			<a class="pricing_box_button" href="../contact/">GET STARTED</a>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/runner.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
	<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/100kelvins.cube.js"></script>
</body>
</html>
<script>
	$( document ).ready(function() { });
</script>