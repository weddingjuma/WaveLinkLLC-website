<!doctype html>
<html lang="en">
<head>
	<?php 
		require_once '../utility/Mobile_Detect.php';
		$detect = new Mobile_Detect; 
	?>
	<meta charset="utf-8">
	<title>Wave Link, LLC - Get A Quote</title>
	<meta name="description" content="Wave Link, LLC - Get A Quote">

	<?php include '../css/common.php'; ?>
	<?php include '../js/common.php'; ?>
	<?php if ( $detect->isMobile() ) { echo '<link rel="stylesheet" href="../css/common_mobile.css">'; } else { echo '<link rel="stylesheet" href="../css/common.css">'; } ?>
	<script src="../js/common.js"></script>
	<style>
		.hover:hover { border: 5px solid white; }
		.hover { cursor: pointer; }
		.selected { border: 5px solid white; }
	</style>
</head>
<body style="background-color:#2C3E50; background-position:0px 0px;">
	<?php if ( $detect->isMobile() ) { include '../menu.php'; } ?>
	<div id="main">
		<?php if ( $detect->isMobile() ) { include '../header_mobile.php'; } else { include '../header.php'; } ?>
		<div class="content">
			<div class="intro_content">
				<div class="pure-g">
				<?php 
				if ( $detect->isMobile() ) { 
					echo '<div class="pure-u-1-1 main_text">
							<span style="font-weight:300;">Get A Quote</span>
							<br /><br />';
				} else { 
					echo '
					<div class="pure-u-6-24 big_text">
						<span style="font-weight:300;">Get A Quote</span>
						<br /><br />';
						include '../navbuttons.php';
					echo '
					</div>
					<div class="pure-u-2-24"></div>
					<div class="pure-u-16-24 small_text">';
				} 
				?>
					<span class="medium_text"><b>Quote Calculator</b></span><br/><br/>
					<div class="calculator" style="padding:50px; background-color:#bdc3c7;
						-webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;">
						<div class="pure-g">
							<div class="pure-u-1-1 big_text calculator_text" style="background-color:#34495E; padding:10px; text-align:right;
							-webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;">
								<div id="quote" style="font-weight:300;">$0</div>
							</div>
							<div class="pure-u-1-1">
								<br />
								SELECT A PRODUCT: 
								<br /><br />
							</div>
							<div class="pure-u-1-1">
								<div id="mobileapps" class="blue_button pure-button">
									MOBILE APP
								</div>
								&nbsp;&nbsp;
								<div id="websites" class="green_button pure-button">
									WEBSITE
								</div>
								<?php if ( $detect->isMobile() ) { echo '<br /><br />'; } else { echo '&nbsp;&nbsp;'; } ?>
								<div id="graphics" class="red_button pure-button">
									GRAPHICS
								</div>
								&nbsp;&nbsp;
								<div id="services" class="gray_button pure-button">
									SERVICE
								</div>
							</div>
							<br /><br />
							<div id="mobileapps_packages" style="display:none;">
								<div class="pure-u-1-1">
									<br />
									SELECT WHAT'S NEEDED IN YOUR APP: 
									<br />
								</div>
								<div class="pure-u-1-1">
									<br />
									<div id="mobileapps_standard" class="hover" style="background-color:#26a9e0; color:#0d475f; padding:20px;
									-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px">
										&middot; Less than <b>20</b> pages<br />
										&middot; Less than <b>20</b> custom graphics and images<br />
										&middot; <b>Blog</b> or content creation/editing<br />
										&middot; Basic <b>online store</b> with product pages and PayPal<br />
										&middot; Donation or <b>checkout button</b><br />
										&middot; Basic user <b>logins/profiles</b> for saving minor data and browsing<br /> 
										&middot; "Like us on <b>Facebook</b>" button, social feeds for your accounts, etc.<br />
										&middot; <b>Portal</b> handled by a third party (WordPress, etc.)<br />
										&middot; <b>Appointment scheduling</b> handled by a third party<br />
										&middot; Basic <b>touch gesture, camera, calendar, and contacts</b> functionality<br />
										&middot; Basic <b>animations and scoring</b><br />
									</div>
									&nbsp;&nbsp;
									<div id="mobileapps_advanced" class="hover" style="background-color:#82c240; color:#35501a; padding:20px;
									-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px">
										&middot; <b>Unlimited</b> pages<br />
										&middot; <b>Unlimited</b> custom graphics and images<br />
										&middot; Custom <b>admin panel</b> for content creation/editing and blogging<br />
										&middot; <b>Major online store</b>; unlimted products and pages; multiple payment options<br />
										&middot; Donation or <b>checkout button</b><br />
										&middot; User <b>logins/profiles</b> for browsing, shopping, saving data, and social interaction<br />
										&middot; <b>Social functions</b> are built into app (your users can post, "like", comment, login with Facebook, share to Twitter, etc.)<br />
										&middot; Custom built <b>portal</b> (ex. employee work portal)<br />
										&middot; Custom built <b>appointment scheduling</b><br />
										&middot; Advanced <b>touch gesture, camera, calendar, contacts, geolocation, and audio</b> functionality<br />
										&middot; Advanced <b>animation, scoring, controls, and graphics</b><br />
									</div>
								</div>
							</div>
							<div id="websites_packages" style="display:none;">
								<div class="pure-u-1-1">
									<br />
									SELECT WHAT'S NEEDED IN YOUR WEBSITE:
									<br />
								</div>
								<div class="pure-u-1-1">
									<br />
									<div id="websites_standard" class="hover" style="background-color:#82c240; color:#35501a; padding:20px;
									-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px">
										&middot; Less than <b>20</b> pages<br />
										&middot; <b>About Us</b> page, etc.<br />
										&middot; One <b>portfolio</b> of your work<br />
										&middot; Less than <b>20</b> photo/video galleries<br />
										&middot; Less than <b>20</b> custom graphics and images<br />
										&middot; <b>Blog</b> or content creation/editing handled by a third party (WordPress, Facebook)<br />
										&middot; Basic <b>online store</b><br />
										&middot; Donation or <b>checkout button</b><br />
										&middot; <b>Contact Us</b> page, etc.<br />
										&middot; Basic user <b>logins/profiles</b> for saving minor data and browsing<br /> 
										&middot; "Like us on <b>Facebook</b>" button, social feeds for your accounts, etc.<br />
										&middot; <b>Portal</b> handled by a third party (WordPress, etc.)<br />
										&middot; <b>Appointment scheduling</b> handled by a third party<br />
									</div>
									&nbsp;&nbsp;
									<div id="websites_advanced" class="hover" style="background-color:#ef5122; color:#702008; padding:20px;
									-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px">
										&middot; <b>Unlimited</b> pages<br />
										&middot; <b>About Us</b> page, etc.<br />
										&middot; <b>Unlimited</b> portfolios of your work<br />
										&middot; <b>Unlimited</b> photo/video galleries<br />
										&middot; <b>Unlimited</b> custom graphics and images<br />
										&middot; Custom <b>admin panel</b> for content creation/editing and blogging<br />
										&middot; Major <b>online store</b> (ex. Amazon.com)<br />
										&middot; Donation or <b>checkout button</b><br />
										&middot; <b>Contact Us</b> page, etc.<br />
										&middot; User <b>logins/profiles</b> for browsing, shopping, saving data, and social interaction<br />
										&middot; <b>Social functions</b> are built into your site (your users can post, "like", comment, login with Facebook, share to Twitter, etc.)<br />
										&middot; Custom built <b>portal</b> (ex. employee work portal)<br />
										&middot; Custom built <b>appointment scheduling</b><br />
									</div>
								</div>
							</div>
							<div id="graphics_packages" style="display:none;">
								<div class="pure-u-1-1">
									<br />
									WHAT TYPE OF GRAPHICS DO YOU NEED?
									<br />
								</div>
								<div class="pure-u-1-1">
									<br />
									<div id="logo" class="blue_button pure-button">
										LOGO
									</div>
									&nbsp;&nbsp;
									<div id="icon" class="green_button pure-button">
										ICON(S)
									</div>
									<?php if ( $detect->isMobile() ) { echo '<br /><br />'; } else { echo '&nbsp;&nbsp;'; } ?>
									<div id="print" class="red_button pure-button">
										BUSINESS CARD / FLYER DESIGN
									</div>
									<?php if ( $detect->isMobile() ) { echo '<br /><br />'; } else { echo '<br /><br /><br />'; } ?>
									<div id="wearable" class="gray_button pure-button">
										T-SHIRT / HAT / PHONE CASE DESIGN
									</div>
								</div>
							</div>
							<div id="services_packages" style="display:none;">
								<div class="pure-u-1-1">
									<br />
									WHAT KIND OF SERVICES DO YOU NEED?
									<br />
								</div>
								<div class="pure-u-1-1">
									<br />
									<div id="webhosting" class="blue_button pure-button">
										WEB HOSTING
									</div>
									<?php if ( $detect->isMobile() ) { echo '<br /><br />'; } else { echo '&nbsp;&nbsp;'; } ?>
									<div id="marketing" class="green_button pure-button">
										SOCIAL MARKETING
									</div>
								</div>
							</div>
							<div style="display:none;" class="pure-u-1-1"></div>
						</div>
						<?php if ( $detect->isMobile() ) { echo '<br />'; } else { echo ''; } ?>
					</div>
				</div>
			</div>
			<div style="height:100px;"></div>
			<?php include '../footer.php'; ?>
		</div>
	</div>
</body>
<script>	

	// SELECT PRODUCT
	
	$("#mobileapps, #websites, #graphics, #services").click(function() {
		grayOutAllProductButtonsExcept(this);
	  	$(this).fadeTo(500, 1);
	  	hideAllPackagesExcept(this);
	 	$("#" + $(this).attr('id') + "_packages").show("slow");
	 	removeAllSelectedClasses();
	 	lightUpAllGraphicAndServiceButtons();
	 	changeQuoteWithAnimation("$0");
	});
	
	// SELECT PACKAGE
	
	$("#mobileapps_standard, #mobileapps_advanced, #websites_standard, #websites_advanced").click(function() {
		removeAllSelectedClasses();
	  	$(this).addClass('selected');
	});
	
	$("#logo, #icon, #print, #wearable, #webhosting, #marketing").click(function() {
	  	grayOutAllGraphicAndServiceButtonsExcept(this);
	  	$(this).fadeTo(500, 1);
	});
	
	// SET QUOTE
	
	function setQuote(item) {
		switch ($(item).attr('id')) {
			case 'mobileapps_standard':
				changeQuoteWithAnimation(".. starting at $599 !"); break;
			case 'mobileapps_advanced':
				changeQuoteWithAnimation(".. starting at $999 !"); break;
			case 'websites_standard':
				changeQuoteWithAnimation(".. starting at $299 !"); break;
			case 'websites_advanced':
				changeQuoteWithAnimation(".. starting at $699 !"); break;
			case 'logo':
				changeQuoteWithAnimation(".. starting at $29.99 !"); break;
			case 'icon':
				changeQuoteWithAnimation(".. starting at $19.99 !"); break;
			case 'print':
				changeQuoteWithAnimation(".. starting at $29.99 !"); break;
			case 'wearable':
				changeQuoteWithAnimation(".. starting at $29.99 !"); break;
			case 'webhosting':
				changeQuoteWithAnimation(".. starting at $24.99/month !"); break;
			case 'marketing':
				changeQuoteWithAnimation(".. starting at $89.99/month !"); break;
			default:
				changeQuoteWithAnimation("$0");
		}
	}
	
	function changeQuoteWithAnimation(text) {
		$('#quote').fadeOut("slow", function() {
			$('#quote').html(text);
		});
		$('#quote').fadeIn("slow");
	}
	
	$("#mobileapps_standard, #mobileapps_advanced, #websites_standard, #websites_advanced, #logo, #icon, #print, #wearable, #webhosting, #marketing").click(function() {
	  	setQuote(this);
	});
	
	// HELPER FUNCTIONS

	function grayOutAllProductButtonsExcept(exception) {
		if($(exception).attr('id') != "mobileapps") { $("#mobileapps").fadeTo(500, 0.4); }
		if($(exception).attr('id') != "websites") { $("#websites").fadeTo(500, 0.4); }
		if($(exception).attr('id') != "graphics") { $("#graphics").fadeTo(500, 0.4); } 
		if($(exception).attr('id') != "services") { $("#services").fadeTo(500, 0.4); }
	}
	
	function grayOutAllGraphicAndServiceButtonsExcept(exception) {
		if($(exception).attr('id') != "logo") { $("#logo").fadeTo(500, 0.4); }
		if($(exception).attr('id') != "icon") { $("#icon").fadeTo(500, 0.4); }
		if($(exception).attr('id') != "print") { $("#print").fadeTo(500, 0.4); } 
		if($(exception).attr('id') != "wearable") { $("#wearable").fadeTo(500, 0.4); }
		if($(exception).attr('id') != "webhosting") { $("#webhosting").fadeTo(500, 0.4); }
		if($(exception).attr('id') != "marketing") { $("#marketing").fadeTo(500, 0.4); }
	}
	
	function lightUpAllGraphicAndServiceButtons(exception) {
		$("#logo, #icon, #print, #wearable, #webhosting, #marketing").fadeTo(500, 1);
	}
	
	function hideAllPackagesExcept(exception) {
		if($(exception).attr('id') != "mobileapps") { $("#mobileapps_packages").hide("slow"); }
		if($(exception).attr('id') != "websites") { $("#websites_packages").hide("slow"); }
		if($(exception).attr('id') != "graphics") { $("#graphics_packages").hide("slow"); } 
		if($(exception).attr('id') != "services") { $("#services_packages").hide("slow"); }
	}
	
	function removeAllSelectedClasses() {
		$("#mobileapps_standard, #mobileapps_advanced, #websites_standard, #websites_advanced").removeClass('selected');
	}
	
</script>
</html>