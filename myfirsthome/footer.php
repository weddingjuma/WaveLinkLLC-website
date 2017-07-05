<div class="container">
    <div class="row footer">
        <div class="col-xs-12 col-md-3 footer_section">
            <div class="footer_title">Info</div>
            &copy<?php echo date("Y")." ".$site_name; ?><br />
            <i>Powered by</i><br />
            <a href="http://www.wavelinkllc.com/" target="_blank">
                <img class="wavelink_logo" src="http://www.wavelinkllc.com/images/WaveLink_Logo.png" alt="Wave Link, LLC">
            </a>
        </div>
        <div class="col-xs-12 col-md-3 footer_section">
            <div class="footer_title">Map</div>
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Home</a><br />
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">About</a><br />
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Mortgage Calculator</a><br />
            <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/">Contact</a>
        </div>
        <div class="col-xs-12 col-md-3 footer_section">
            <div class="footer_title">Social</div>
            <a href="<?php echo $setting['facebook_link']; ?>"><i class="fa fa-facebook"></i>&nbsp;/myfirsthome</a><br />
            <a href="<?php echo $setting['twitter_link']; ?>"><i class="fa fa-twitter"></i>&nbsp;@myfirsthome</a><br />
            <a href="<?php echo $setting['instagram_link']; ?>"><i class="fa fa-instagram"></i>&nbsp;@myfirsthome</a>
        </div>
        <div class="col-xs-12 col-md-3 footer_section">
            <div class="footer_title">Contact</div>
            <?php echo $setting['email']; ?><br />
            <?php echo $setting['phone']; ?>
        </div>
    </div>
</div>
