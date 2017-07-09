<div class="container">
    <div class="row contact_bar">
        <div class="col-xs-1 col-md-hide"></div>
        <div class="col-xs-5 col-md-6 contact_bar_left">
            <i class="fa fa-phone"></i>&nbsp;<?php echo $setting['phone']; ?>
        </div>
        <div class="col-xs-5 col-md-6 contact_bar_right">
            <a href="<?php echo $setting['facebook_link']; ?>"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
            <a href="<?php echo $setting['twitter_link']; ?>"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;
            <a href="<?php echo $setting['instagram_link']; ?>"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="col-xs-1 col-md-hide"></div>
    </div>
    <div class="row navigation_bar">
        <div class="col-xs-hide col-md-4 navigation_bar_left">
            <div class="navigation_link">
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">About</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
        <div class="col-xs-hide col-md-4 navigation_bar_logo">
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">
                <img src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/logo.png" /> <!-- <?php //echo $setting['logo']; ?>  -->
            </a>
        </div>
        <div class="col-xs-hide col-md-4 navigation_bar_right">
            <div class="navigation_link">
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Mortgage Calculator</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Contact</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-hide">
            <table style="width: 100%;">
                <tr>
                    <td class="navigation_bar_logo">
                        <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">
                            <img src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/logo.png" /> <!-- <?php //echo $setting['logo']; ?>  -->
                        </a>
                    </td>
                    <td class="navigation_bar_right" onclick="toggle_navigation_panel();">
                        <i class="fa fa-navicon"></i>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div id="menu" class="menu">
	<div class="row">
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Home</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">About</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Mortgage Calculator</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Contact</a></div>
	</div>
</div>
<script>
	function toggle_navigation_panel() {
	    $("#menu").slideToggle();
	}
</script>
