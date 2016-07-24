<?php
    session_start();
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/cart/cart.php';
    $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$Cart = new Cart();
	$Cart -> database_connection = $c;
	$Cart -> paypal_email = "amar_anderson@yahoo.com";
	$Cart -> paypal_color = "F9690E";
	$Cart -> no_shipping = "0";
	$Cart -> return_url = "http://".$_SERVER['SERVER_NAME'];
	$Cart -> cancel_url = "http://".$_SERVER['SERVER_NAME'];
	echo $Cart -> styles();
	echo $Cart -> scripts();
?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-9 col-md-5 header_logo">
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/">
                    <img src="/allgamehunting/images/logo_background.png" />
                    <!--<img class="logo" src="<?php echo $setting['logo']; ?>" />-->
                </a>
                ALL GAME HUNTING
            </div>
            <div class="col-xs-hide col-md-1 header_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/">Home</a></div>
            <div class="col-xs-hide col-md-1 header_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/about/">About</a></div>
            <div class="col-xs-hide col-md-1 header_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/store/">Store</a></div>
            <div class="col-xs-hide col-md-1 header_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/gallery/">Gallery</a></div>
            <div class="col-xs-hide col-md-1 header_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/contact/">Contact</a></div>
            <div class="col-xs-hide col-md-2 header_button">
                <a href="<?php echo $setting['linkedin_link']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo $setting['facebook_link']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
                <?php if (false === strpos($url, 'checkout')) { echo "&middot;&nbsp;&nbsp;&nbsp;".$Cart -> shopping_cart_button("header_cart_button", "<i class=\"fa fa-shopping-cart\"></i>"); } ?>
            </div>
            <div class="col-xs-3 col-md-hide header_button" onclick="toggle_navigation_panel();">
                <i class="fa fa-navicon"></i>
            </div>
        </div>
    </div>
</div>
<div id="menu" class="menu">
	<div class="row">
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/">Home</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/about/">About</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/store/">Store</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/gallery/">Gallery</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/contact/">Contact</a></div>
	</div>
</div>
<?php if (false === strpos($url, 'checkout')) { echo $Cart -> cart(); } ?>
<script>
	function toggle_navigation_panel() {
	    $("#menu").slideToggle();
	}
</script>
