<?php
	include $_SERVER['DOCUMENT_ROOT'].'/americanlegion/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/americanlegion/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/americanlegion/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "home");
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
		include $_SERVER['DOCUMENT_ROOT'].'/americanlegion/css/main.php';
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/americanlegion/header.php'; ?>
    <div class="row slideshow">
		<div class="col-xs-12 col-md-12 slideshow_image" style="background-image: url('http://<?php echo $_SERVER['SERVER_NAME'].'/americanlegion'.$setting['feature1_photo']; ?>');">
			<div class="slideshow_temp_image"></div>
            <div class="slideshow_tent">
                <div class="container slideshow_text">
                    <div id="slideshow_title" class="slideshow_title">
                        <?php echo $setting['feature1_title']; ?>
                    </div>
                    <div id="slideshow_subtitle" class="slideshow_subtitle">
                        <?php echo $setting['feature1_description']; ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
    <div class="featured">
        <div class="container">
            <div class="featured_subtitle">The American Legion</div>
            <div class="featured_title">Upcoming Events</div>
            <div class="row events">
                <div class="col-xs-12 col-md-4 event" onclick="location.href='/americanlegion'">
                    <div class="event_image" style="background-image:url('/americanlegion/images/event1.jpg');">
                        <div class="event_title">Leadership Training</div>
                    </div>
                    <div class="event_details row">
                        <div class="col-xs-4 col-md-4 event_date">Sept 26-27</div>
                        <div class="col-xs-8 col-md-8 event_location">@ Embassy Suites Montgomery</div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 event" onclick="location.href='/americanlegion'">
                    <div class="event_image" style="background-image:url('/americanlegion/images/event2.jpg');">
                        <div class="event_title">Blood Drive</div>
                    </div>
                    <div class="event_details row">
                        <div class="col-xs-4 col-md-4 event_date">Oct. 1st - 10 AM - 3 PM</div>
                        <div class="col-xs-8 col-md-8 event_location">@ Post 135</div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 event" onclick="location.href='/americanlegion'">
                    <div class="event_image" style="background-image:url('/americanlegion/images/event3.jpg');">
                        <div class="event_title">East Alabama Veterans Council (EAVC)</div>
                    </div>
                    <div class="event_details row">
                        <div class="col-xs-4 col-md-4 event_date">Oct. 8th 12PM</div>
                        <div class="col-xs-8 col-md-8 event_location">@ Post 135</div>
                    </div>
                </div>
                <?php
                    //$property_result = mysqli_query($c, "SELECT * FROM properties LIMIT 3") or die(mysql_error());
                    //while($property = mysqli_fetch_array($property_result, MYSQL_ASSOC)) {
                    //    echo '';
                    //}
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <br />
        <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>">
            <img src="http://<?php echo $_SERVER['SERVER_NAME'].'/americanlegion/images/logo_emblem.jpg'; ?>" />
            <img style="max-width: 100%;" src="http://<?php echo $_SERVER['SERVER_NAME'].'/americanlegion/images/logo_text.jpg'; ?>" />
        </a>
        <br />The American Legion was chartered and incorporated by Congress in 1919 as a patriotic veterans organization devoted to mutual helpfulness.
    </div>
    <div class="container">
        <div class="row ads">
            <div class="col-xs-12 col-md-6 ad" onclick="location.href='/americanlegion'">
                <div class="ad_image" style="background-image:url('/americanlegion/images/ad1.jpg');">
                    <div class="ad_button">More</div>
                    <div class="ad_title">Member Benefits</div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 ad" onclick="location.href='/americanlegion'">
                <div class="ad_image" style="background-image:url('/americanlegion/images/ad2.jpg');">
                    <div class="ad_button">More</div>
                    <div class="ad_title">Baseball</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row banner" style="background-image: url('http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion/images/background1.jpg');"> <!-- <?php //echo $setting['feature1_photo']; ?> -->
        <div class="banner_tent"></div>
		<div class="col-xs-1 col-md-4"></div>
        <div class="col-xs-10 col-md-4" style="text-align: center;">
			<a class="banner_button" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/americanlegion">Contact Us Today!</a>
		</div>
        <div class="col-xs-1 col-md-4"></div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/americanlegion/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/americanlegion/js/main.php'; ?>
</body>
</html>
