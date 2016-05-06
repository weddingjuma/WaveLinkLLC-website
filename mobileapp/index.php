<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "mobileapp");
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
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#82c240;">
						<div class="info_big_text" style="color:white;">
							CUSTOM APPS
						</div>
						<div class="info_regular_text" style="color:white;">
							Everyone has an app idea; let Wave Link bring it to reality!
							Our custom app solution brings your very dream to life.
							We build our apps with the latest iOS and Android features.
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('custom_apps'); return false;">
							GET STARTED | $700+
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-6 info_block info_image" style="background-image:url('../images/background22.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-question-circle"></i> | Brochure App
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-shopping-cart"></i> | Store App
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-facebook"></i> | Social App
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-cogs"></i> | Utility App
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208201655portfolio.jpeg');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#82c240;">
						<i class="fa fa-mobile"></i>
					</div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208205234portfolio.png');"></div>
				</div>
			</figure>
			<figure class="bottom" style="background: url('../images/notebook.png');">
				<div class="row info">
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background25.jpg');"></div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#82c240;">
						<div class="info_big_text" style="color:white;">
							DEALERSHIP APPS
						</div>
						<div class="info_regular_text" style="color:white;">
							Our automotive dealership apps greatly improve a customer's experience with your dealership!
							Give your customers easy access to your inventory, services, and their vehicle information.
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('dealership_apps'); return false;">
							GET STARTED | $1000+
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background24.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-automobile"></i> | Inventory
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-wrench"></i> | Service Requests
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-question-circle"></i> | Customer Information
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-cogs"></i> | Utilities
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#82c240;">
						<i class="fa fa-mobile"></i>
					</div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('http://www.wavelinkllc.com/images/application/120150906155126portfolio.png');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('http://www.wavelinkllc.com/images/application/320150906155126portfolio.png');"></div>
				</div>
			</figure>
			<figure class="back" style="background: url('../images/notebook.png');">
				<div class="row info">
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image"  style="background-image:url('../images/background26.jpg');"></div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('apartment_apps'); return false;">
							GET STARTED | $1000+
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#82c240;">
						<div class="info_big_text" style="color:white;">
							APARTMENT APPS
						</div>
						<div class="info_regular_text" style="color:white;">
							Our apartment community apps greatly improve your tenants experience!
							Separate your apartment complex from the competition by giving your tenants easy access to your community and it's services.
						</div>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background27.png');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-question-circle"></i> | Message Board
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-credit-card"></i> | Rent Pay
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-wrench"></i> | Service Requests
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-exclamation"></i> | Community Alerts
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/background27.jpg');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/background28.jpg');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#82c240;">
						<i class="fa fa-mobile"></i>
					</div>
				</div>
			</figure>
			<figure class="top" style="background: url('../images/notebook.png');">
				<div class="quote_text">
					<i>“Mobile is becoming not only the new digital hub, but also the bridge to the physical world. That’s why mobile will affect more than just your digital operations — it will transform your entire business.”</i>
				</div>
				<div class="quote_author">
					- Thomas Husson, Vice President and Principal Analyst at Forrester Research
				</div>
			</figure>
		</div>
	</section>
	<div id="pricing_modal_custom_apps" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-mobile"></i>
			</div>
			<div class="pricing_box_title">
				CUSTOM APPS | $700+
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> iOS and/or Android<br />
				<i class="fa fa-check"></i> Brochure apps; informational; about us<br />
				<i class="fa fa-check"></i> E-commerce apps; shopping carts; multiple payment options<br />
				<i class="fa fa-check"></i> Social media apps; user logins; posting<br />
				<i class="fa fa-check"></i> Utility apps; physical peripheral integrations<br />
				<i class="fa fa-check"></i> Service apps; use a service; pay bills; change settings<br />
				<i class="fa fa-check"></i> Social integrations (your users can post, "like", comment, login with Facebook, share to Twitter, etc.)<br />
				<i class="fa fa-check"></i> Custom admin panel for content creation/editing and blogging<br />
				<i class="fa fa-check"></i> Push notifications<br />
				<i class="fa fa-check"></i> In-App purchases and Apple Pay<br />
				<i class="fa fa-check"></i> Hosting<br />
			</div>
			<a class="pricing_box_button" href="../contact/">GET STARTED</a>
		</div>
	</div>
	<div id="pricing_modal_dealership_apps" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-mobile"></i>
			</div>
			<div class="pricing_box_title">
				DEALERSHIP APPS | $1000+
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> iOS and/or Android<br />
				<i class="fa fa-check"></i> Push-to-start app starter button<br />
				<i class="fa fa-check"></i> Our dealership page with directions and contact<br />
				<i class="fa fa-check"></i> Roadside assistance quick-call button<br />
				<i class="fa fa-check"></i> Special offers page<br />
				<i class="fa fa-check"></i> Showroom with list of live new and used vehicles<br />
				<i class="fa fa-check"></i> My vehicle page with customer's vehicle and service information<br />
				<i class="fa fa-check"></i> Request service page<br />
				<i class="fa fa-check"></i> Videos page (YouTube)<br />
				<i class="fa fa-check"></i> Rate us page<br />
				<i class="fa fa-check"></i> Inventory/services data integration<br />
				<i class="fa fa-check"></i> Push notifications<br />
				<i class="fa fa-check"></i> Hosting<br />
			</div>
			<a class="pricing_box_button" href="../contact/">GET STARTED</a>
		</div>
	</div>
	<div id="pricing_modal_apartment_apps" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-mobile"></i>
			</div>
			<div class="pricing_box_title">
				APARTMENT APPS | $1000+
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> iOS and/or Android<br />
				<i class="fa fa-check"></i> Community page with tenant posts and management notices<br />
				<i class="fa fa-check"></i> Request service page with history and status<br />
				<i class="fa fa-check"></i> Private messaging<br />
				<i class="fa fa-check"></i> Pay my bill page with bill history<br />
				<i class="fa fa-check"></i> Available apartments page<br />
				<i class="fa fa-check"></i> Push notifications for community and bill alerts<br />
				<i class="fa fa-check"></i> Rate us page<br />
				<i class="fa fa-check"></i> Inventory/services data integration<br />
				<i class="fa fa-check"></i> Hosting<br />
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