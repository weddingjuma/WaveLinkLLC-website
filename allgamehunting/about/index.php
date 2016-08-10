<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "about");
	$metatags = build_metatags($seo, $setting);
	$detect = new Mobile_Detect;
    $is_big_logo = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $metatags;
		include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/css/main.php';
	?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/header.php'; ?>
    <div class="about_banner" style="background-image:url('/allgamehunting/images/background9.jpg');"></div>
    <div class="about_title">
        <div class="container">
            About
        </div>
    </div>
    <div class="about_content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 about_text">
                    <span class="about_bullet"><i class="fa fa-bullseye"></i> <b>How We Started</b></span><br /><br />
                    Hello my name is paul peoples I am the owner of all game hunting company and the inventor of the robo calling system. I grew up around hunting and by being outdoors. I developed a deep passion for hunting at a very young age. I would always bug my dad to go hunting  ( sometimes I would even stay up all night just so he couldn't sneak out in the mornings). He finally told me when I got chest high he would take me with him. My dad was six foot tall and at the age of six that seemed impossible, but it motivated me to the point that I didn't stop growing until I was six foot seven! I aggravate my brother about it because he's only 6 foot. I've always dreamed of having my own hunting company and now God is allowing that dream to come true. Here at all game hunting company we are dedicated to develop and produce products that give hunters the edge and that is our company motto, Giving Hunter the Edge!
                </div>
                <div class="col-xs-12 col-md-6 about_image_container">
                    <img class="about_image" src="/allgamehunting/images/logo.png" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 about_text">
                    <span class="about_bullet"><i class="fa fa-bullseye"></i> <b>Why All Game Hunting?</b></span><br /><br />
                    The Robo Calling system is a robotic device that turns a mechanical call. I'm a big fan of using the doe bleat in a can during rut. One day while hunting during the rut, I used a doe bleat can. About 45 minutes later not seeing anything. I reached in my jacket pocket and pulled out the bleat can and turned it over. A herd of deer snorted, turned and looked, and a monster buck was running off. I was busted! I got mad and threw the call out of the tree and as it was rolling down the hill, making a funny noise, I was thinking what all other hunters are thinking, "how can I get this call away from me?". That's how the robo calling system was born! After filming this year with the Robo calling system, and seeing all the deers reaction, and the young kids getting to kill their first deer, no words could describe how awesome it was!
                </div>
                <div class="col-xs-12 col-md-6 about_image_container">
                    <img class="about_image" src="/allgamehunting/images/robo_logo.png" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 about_image_container">
                    <img class="about_image" src="/allgamehunting/images/gallery1.jpg" />
                </div>
                <div class="col-xs-12 col-md-6 about_image_container">
                    <img class="about_image" src="/allgamehunting/images/gallery2.jpg" />
                </div>
            </div>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/footer.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/js/main.php'; ?>
</body>
</html>
