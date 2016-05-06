<div class="row banner">
	<div class="col-xs-12 col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 banner_buttons">
					<div class="banner_button" style="float:left;"><i class="fa fa-star"></i>&nbsp;&nbsp;<?php echo $setting['headline']; ?></div>
					<div class="banner_button"><i class="fa fa-mobile"></i>&nbsp;&nbsp;<?php echo $setting['phone']; ?></div>
					<div class="banner_button">
						<i class="fa fa-facebook" onclick="window.open('<?php echo $setting['facebook_link']; ?>');"></i>&nbsp;&nbsp;
						<i class="fa fa-twitter" onclick="window.open('<?php echo $setting['twitter_link']; ?>');"></i>&nbsp;&nbsp;
						<i class="fa fa-instagram" onclick="window.open('<?php echo $setting['instagram_link']; ?>');"></i>&nbsp;&nbsp;
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row header">
	<div class="col-xs-12 col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-4 header_logo_div">
					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/"><img class="header_logo_img" src="<?php echo $setting['logo']; ?>" /></a>
				</div>
				<div class="col-xs-hide col-md-8 header_links">
					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/">Home</a>
					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/about/">About</a>
					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/services/">Services</a>
					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/gallery/">Gallery</a>
					<!--<a href="http://<?php //echo $_SERVER['SERVER_NAME']; ?>/flava/blog/">Blog</a>-->
					<a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/contact/">Contact</a>
				</div>
				<div class="col-xs-6 col-md-hide" style="text-align:right;">
					<div class="navicon_button" onclick="toggle_navigation_panel();">
						<i class="fa fa-navicon"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="navigation_panel" class="navigation_panel">
	<div class="row">
		<div class="col-xs-12 col-md-hide mobile_navigation_button text-uppercase"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/">Home</a></div>
		<div class="col-xs-12 col-md-hide mobile_navigation_button text-uppercase"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/about/">About</a></div>
		<div class="col-xs-12 col-md-hide mobile_navigation_button text-uppercase"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/services/">Services</a></div>
		<div class="col-xs-12 col-md-hide mobile_navigation_button text-uppercase"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/gallery/">Gallery</a></div>
		<!--<div class="col-xs-12 col-md-hide mobile_navigation_button text-uppercase"><a href="http://<?php //echo $_SERVER['SERVER_NAME']; ?>/flava/blog/">Blog</a></div>-->
		<div class="col-xs-12 col-md-hide mobile_navigation_button text-uppercase"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/contact/">Contact</a></div>
	</div>
</div>
<script>
	function toggle_navigation_panel() {
	    $("#navigation_panel").slideToggle();
	}
</script>