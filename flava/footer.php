<div class="row footer">
	<div class="col-xs-12 col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3 footer_div">
					<div class="footer_title">Hours</div>
					Monday - Friday &middot; 10 - 7PM<?php //echo $setting['weekday_hours']; ?><br />
					Saturday &middot; 10 - 7PM<?php //echo $setting['saturday_hours']; ?><br />
					Sunday &middot; Closed<?php //echo $setting['sunday_hours']; ?><br /><br /><br />
				</div>
				<div class="col-xs-12 col-md-3 footer_div">
					<div class="footer_title">Map</div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/">Home</a></div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/about/">About</a></div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/services/">Services</a></div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/gallery/">Gallery</a></div>
					<!--<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/blog/">Blog</a></div>-->
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/flava/contact/">Contact</a></div>
				</div>
				<div class="col-xs-12 col-md-3 footer_div" style="cursor:pointer;">
					<div class="footer_title">Contact</div>
					<div class="footer_link"><?php echo $setting['email']; ?></div>
					<div class="footer_link"><?php echo $setting['phone']; ?></div>
					<i class="fa fa-facebook" onclick="window.open('<?php echo $setting['facebook_link']; ?>');"></i><br />
					<i class="fa fa-twitter" onclick="window.open('<?php echo $setting['twitter_link']; ?>');"></i><br />
					<i class="fa fa-instagram" onclick="window.open('<?php echo $setting['instagram_link']; ?>');"></i>
				</div>
				<div class="col-xs-12 col-md-3 footer_div">
					<div class="footer_title">Find Us</div>
					<?php echo $setting['address1']." ".$setting['address2']." ".$setting['city'].", ".$setting['state']." ".$setting['zip']; ?>
					<iframe width="150" height="150" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo str_replace(" ", "+", $setting['address1']." ".$setting['address2']." ".$setting['city'].",".$setting['state']." ".$setting['zip']); ?>&key=AIzaSyClRHLbLGnnFsMAj9MJWj_ouXxXI9w-kOQ"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row runner">
	<div class="col-xs-12 col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="wavelink_div">
						&copy <?php echo date("Y")." ".$site_name; ?>
						<i>Powered by</i><a href="http://www.wavelinkllc.com/" target="_blank"><img class="wavelink_logo" src="http://www.wavelinkllc.com/images/WaveLink_Logo_white.png" alt="Wave Link - Mobile Apps, Websites, and Marketing"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>