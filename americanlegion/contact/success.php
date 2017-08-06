<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "contact");
	$metatags = build_metatags($seo, $setting);
	$detect = new Mobile_Detect;
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $metatags;
		include $_SERVER['DOCUMENT_ROOT'].'/css/main.php';
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
    <div class="featured">
        <div class="container">
            <div class="featured_subtitle">My First Home</div>
            <div class="featured_title">Thank You For Contacting Us!</div>
            <div class="featured_subtitle"><br />
                We will be in contact as soon as possible!
            </div>
        </div>
    </div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
