<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "website");
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
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#ef5122;">
						<div class="info_big_text" style="color:white;">
							CUSTOM WEBSITES
						</div>
						<div class="info_regular_text" style="color:white;">
							It's time to get serious about how your business looks online. 
							We can help! 
							Do you want a clean, sharp, professional website design that will adapt to the future growth of your business or organization? 
							You have found your answer with our professional web design services.
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						 <?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('custom_websites'); return false;">
							GET STARTED | $400+
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-6 info_block info_image" style="background-image:url('../images/background21.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-question-circle"></i> | Informational
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-shopping-cart"></i> | Online Store
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-facebook"></i> | Social Media
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-cogs"></i> | Services
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208205611portfolio.png');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#ef5122;">
						<i class="fa fa-laptop"></i>
					</div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208205234portfolio.png');"></div>
				</div>
			</figure>
			<figure class="bottom" style="background: url('../images/notebook.png');">
				<div class="row info">
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background19.jpg');"></div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#ef5122;">
						<div class="info_big_text" style="color:white;">
							EVENT WEBSITES
						</div>
						<div class="info_regular_text" style="color:white;">
							Only need a website temporarily for an event?
							Wave Link's got your back!
							We provide high quality short-term websites for weddings, reunions, you name it.
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('event_websites'); return false;">
							GET STARTED | $99+
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background11.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-book"></i> | Weddings
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-clock-o"></i> | Reunions
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-smile-o"></i> | Parties
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-microphone"></i> | Performances
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#ef5122;">
						<i class="fa fa-laptop"></i>
					</div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208210139portfolio.png');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208211913portfolio.png');"></div>
				</div>
			</figure>
			<figure class="back" style="background: url('../images/notebook.png');">
				<div class="row info">
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image"  style="background-image:url('../images/background16.jpg');"></div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text">
						<?php echo (!$detect->isMobile() ? "<br /><br /><br /><br />" : "<br />"); ?>
						<a class="info_button" href="/portfolio/">
							VIEW OUR WORK
						</a>
						<br /><br /><br />
						<a class="info_button" onclick="openPricingModal('ecommerce_websites'); return false;">
							GET STARTED | $400+
						</a>
						<?php echo ($detect->isMobile() ? "<br /><br />" : ""); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_block info_text" style="background-color:#ef5122;">
						<div class="info_big_text" style="color:white;">
							E-COMMERCE WEBSITES
						</div>
						<div class="info_regular_text" style="color:white;">
							Does your business sell products or services?
							Let Wave Link help your business make money while you sleep with our tailored e-commerce website solution.
							You'll have full control over your products and specials through our powerful admin panel.
						</div>
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_block info_image" style="background-image:url('../images/background17.jpg');"></div>
				</div>
				<div class="row info_banner">
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-th"></i> | Catalog
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 info_banner_item">
						<i class="fa fa-bookmark"></i> | Receipts
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-shopping-cart"></i> | Shopping Cart
					</div>
					<div class="col-xs-hide col-sm-hide col-md-3 info_banner_item">
						<i class="fa fa-paypal"></i> | PayPal
					</div>
				</div>
				<div class="row info_slideshow">
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208210333portfolio.png');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_slideshow_item" style="background-image:url('../images/application/020151208202412portfolio.png');"></div>
					<div class="col-xs-hide col-sm-4 col-md-4 info_icon" style="background-color:#ef5122;">
						<i class="fa fa-laptop"></i>
					</div>
				</div>
			</figure>
			<figure class="top" style="background: url('../images/notebook.png');">
				<div class="quote_text">
					<i>“Websites promote you 24/7: No employee will do that.”</i>
				</div>
				<div class="quote_author">
					― Paul Cookson
				</div>
			</figure>
		</div>
	</section>
	<div id="pricing_modal_custom_websites" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-laptop"></i>
			</div>
			<div class="pricing_box_title">
				CUSTOM WEBSITES | $400+
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> Landing / home pages<br />
				<i class="fa fa-check"></i> About us / meet the team pages<br />
				<i class="fa fa-check"></i> Products / services pages<br />
				<i class="fa fa-check"></i> Photo / video gallery pages<br />
				<i class="fa fa-check"></i> Contact us / get a quote pages<br />
				<i class="fa fa-check"></i> Custom graphics and images<br />
				<i class="fa fa-check"></i> Custom admin panel for content creation/editing and blogging<br />
				<i class="fa fa-check"></i> Online stores; shopping carts; multiple payment options<br />
				<i class="fa fa-check"></i> Donation or checkout button<br />
				<i class="fa fa-check"></i> User logins/profiles for browsing, shopping, saving data, and social interaction<br />
				<i class="fa fa-check"></i> Social functions (your users can post, "like", comment, login with Facebook, share to Twitter, etc.)<br />
				<i class="fa fa-check"></i> Appointment scheduling<br />
				<i class="fa fa-check"></i> Mobile-friendly<br />
				<i class="fa fa-check"></i> Search engine optimization<br />
			</div>
			<a class="pricing_box_button" href="../contact/">GET STARTED</a>
		</div>
	</div>
	<div id="pricing_modal_event_websites" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-laptop"></i>
			</div>
			<div class="pricing_box_title">
				EVENTS WEBSITES | $99+
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> Landing / home pages<br />
				<i class="fa fa-check"></i> Itinerary pages<br />
				<i class="fa fa-check"></i> Meet the bride and groom pages<br />
				<i class="fa fa-check"></i> Meet the wedding party pages<br />
				<i class="fa fa-check"></i> Meet the group / family pages<br />
				<i class="fa fa-check"></i> Contact us / guest book pages<br />
				<i class="fa fa-check"></i> Photo / video gallery pages<br />
				<i class="fa fa-check"></i> Gift registry / wish list pages<br />
				<i class="fa fa-check"></i> Donation or gift button (PayPal)<br />
				<i class="fa fa-check"></i> Social functions (your users can post, "like", comment, login with Facebook, share to Twitter, etc.)<br />
				<i class="fa fa-check"></i> Free domain name<br />
				<i class="fa fa-check"></i> 3+ months free hosting<br />
				<i class="fa fa-check"></i> Mobile-friendly<br />
				<i class="fa fa-check"></i> Search engine optimization<br />
			</div>
			<a class="pricing_box_button" href="../contact/">GET STARTED</a>
		</div>
	</div>
	<div id="pricing_modal_ecommerce_websites" class="pricing_modal">
		<div class="pricing_box pricing_box_left">
			<div class="pricing_close_button" onclick="closePricingModal();"><i class="fa fa-close"></i></div>
			<div class="pricing_box_icon">
				<i class="fa fa-laptop"></i>
			</div>
			<div class="pricing_box_title">
				E-COMMERCE WEBSITES | $400+
			</div>
			<div class="pricing_box_feature">
				<i class="fa fa-check"></i> Home pages with custom deals / prompts<br />
				<i class="fa fa-check"></i> About our business pages<br />
				<i class="fa fa-check"></i> Products / services pages<br />
				<i class="fa fa-check"></i> Photo / video gallery pages<br />
				<i class="fa fa-check"></i> Contact us / find us pages<br />
				<i class="fa fa-check"></i> Shopping cart<br />
				<i class="fa fa-check"></i> Custom admin panel for content creation/editing and blogging<br />
				<i class="fa fa-check"></i> Online stores; shopping carts; multiple payment options<br />
				<i class="fa fa-check"></i> Checkout button<br />
				<i class="fa fa-check"></i> User logins/profiles for browsing, shopping, saving data, and social interaction<br />
				<i class="fa fa-check"></i> Social functions (your users can post, "like", comment, login with Facebook, share to Twitter, etc.)<br />
				<i class="fa fa-check"></i> Appointment scheduling<br />
				<i class="fa fa-check"></i> Mobile-friendly<br />
				<i class="fa fa-check"></i> Search engine optimization<br />
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