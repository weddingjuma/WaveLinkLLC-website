<div class="row footer">
	<div class="col-xs-12 col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3 footer_div">
					<div class="footer_title">Info</div>
					<div class="footer_link">&copy <?php echo date("Y")." ".$site_name; ?></div>
					<i>Powered by</i><br /><a href="http://www.wavelinkllc.com/" target="_blank"><img class="wavelink_logo" src="http://www.wavelinkllc.com/images/WaveLink_Logo.png" alt="Wave Link, LLC"></a>
				</div>
				<div class="col-xs-12 col-md-3 footer_div">
					<div class="footer_title">Links</div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/">Home</a></div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/about/">About</a></div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/store/">Store</a></div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/gallery/">Gallery</a></div>
					<div class="footer_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/contact/">Contact</a></div>
				</div>
				<div class="col-xs-12 col-md-3 footer_div">
					<div class="footer_title">Social</div>
					<h4>
						<i class="fa fa-facebook" onclick="window.open('<?php echo $setting['facebook_link']; ?>');"></i><br /><br />
						<i class="fa fa-instagram" onclick="window.open('<?php echo $setting['instagram_link']; ?>');"></i>
					</h4>
				</div>
				<div class="col-xs-12 col-md-3 footer_div">
					<div class="footer_title">Contact Us</div>
					<div class="footer_link"><?php echo $setting['email']; ?></div>
					<div class="footer_link"><?php echo $setting['phone']; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
