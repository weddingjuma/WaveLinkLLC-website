<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "gallery");
	$metatags = build_metatags($seo, $setting);
	$detect = new Mobile_Detect;
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
    <div class="about_title" style="height: auto; background-image:url('/allgamehunting/images/pattern2.png');">
        <div class="container">
            <br />
            Gallery
        </div>
    </div>
    <div class="row gallery">
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/gallery1.jpg');"></div>
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/gallery2.jpg');"></div>
        <div class="col-xs-12 col-md-3 gallery_video">
            <iframe src="https://www.youtube.com/embed/yPhpjxxrS8s" frameborder="0" style="width: 100%; height: 100%;" allowfullscreen></iframe>
        </div>
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/background8.jpg');"></div>

        <div class="col-xs-12 col-md-3 gallery_video">
            <iframe src="https://www.youtube.com/embed/-_oOUuwl64Q" frameborder="0" style="width: 100%; height: 100%;" allowfullscreen></iframe>
        </div>
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/background1.jpg');"></div>
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/background2.jpg');"></div>
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/background3.jpg');"></div>

        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/background4.jpg');"></div>
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/background5.jpg');"></div>
        <div class="col-xs-12 col-md-3 gallery_image" style="background-image:url('/allgamehunting/images/background6.jpg');"></div>
        <div class="col-xs-12 col-md-3 gallery_video">
            <iframe src="https://www.youtube.com/embed/Y3USel8420M" frameborder="0" style="width: 100%; height: 100%;" allowfullscreen></iframe>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/footer.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/js/main.php'; ?>
</body>
</html>
