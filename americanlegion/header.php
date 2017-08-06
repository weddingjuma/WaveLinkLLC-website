<div class="row contact_bar">
    <div class="container">
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
</div>
<div class="row navigation_bar">
    <div class="container">
        <div class="col-xs-hide col-md-6 navigation_bar_left">
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">
                <img src="http://<?php echo $_SERVER['SERVER_NAME'].'/americanlegion'.$setting['logo']; ?>" />
            </a>
        </div>
        <div class="col-xs-hide col-md-6 navigation_bar_right">
            <table>
                <tr>
                    <td>
                        <div class="navigation_link">
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Home</a>
                        </div>
                    </td>
                    <td>
                        <div class="navigation_link">
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Join</a>
                        </div>
                    </td>
                    <td>
                        <div class="navigation_link">
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Events</a>
                        </div>
                    </td>
                    <td>
                        <div class="navigation_link">
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion"><i class="fa fa-phone"></i>&nbsp;<i class="fa fa-envelope"></i></a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-xs-12 col-md-hide">
            <table style="width: 100%;">
                <tr>
                    <td class="navigation_bar_left">
                        <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">
                            <img src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion/images/logo.png" /> <!-- <?php //echo $setting['logo']; ?>  -->
                        </a>
                    </td>
                    <td class="navigation_bar_right" style="width: 20%;" onclick="toggle_navigation_panel();">
                        <i class="fa fa-navicon"></i>&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="row link_bar">
    <div class="container">
        <div class="col-xs-1 col-md-hide"></div>
        <div class="col-xs-10 col-md-6 link_bar_left">
            Fletcher McCollister Post 135 &middot; 511 13th Street Phenix City, Alabama
        </div>
        <div class="col-xs-hide col-md-6 link_bar_right">
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">&middot;&nbsp;About</a>&nbsp;&nbsp;
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">&middot;&nbsp;National</a>&nbsp;&nbsp;
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">&middot;&nbsp;State</a>&nbsp;&nbsp;
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">&middot;&nbsp;Baseball</a>&nbsp;&nbsp;
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">&middot;&nbsp;Sales</a>
        </div>
        <div class="col-xs-1 col-md-hide"></div>
    </div>
</div>
<div id="menu" class="menu">
	<div class="row">
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Home</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Join</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Events</a></div>
		<div class="col-xs-12 col-md-hide menu_link"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Contact</a></div>
	</div>
</div>
<script>
	function toggle_navigation_panel() {
	    $("#menu").slideToggle();
	}
</script>
