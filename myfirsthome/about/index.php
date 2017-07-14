<?php
	include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "about");
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
		include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/css/main.php';
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/header.php'; ?>
    <div class="featured">
        <div class="container">
            <div class="featured_subtitle">My First Home</div>
            <div class="featured_title">About Us</div>
            <div class="featured_subtitle"><br />
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.
            </div>
        </div>
    </div>
    <div class="container services">
        <div class="row service">
            <div class="col-xs-12 col-md-6 service_label">
                <div class="service_subtitle">Real Estate</div>
                <div class="service_title">Buying</div>
            </div>
            <div class="col-xs-12 col-md-6 service_description">
                The best properties disappear off the market quickly. Our London real estate agents stay current with listings and can alert you when an ideal property for your needs becomes available.<br /><br />
                Since we know what to expect and how each step progresses, you have a knowledgeable advocate on your side. We teach you about MLS listings to help you understand what to look for and how to identify the right properties for you.
            </div>
        </div>
        <div class="row service" style="border: none;">
            <div class="col-xs-12 col-md-6 service_label">
                <div class="service_subtitle">Real Estate</div>
                <div class="service_title">Selling</div>
            </div>
            <div class="col-xs-12 col-md-6 service_description">
                If you are a seller, you want a fair price for your property and want to sell it quickly. Many sellers who work without agents make the mistake of not optimizing their property.<br /><br />
                Our experienced real estate agents analyze your property and show you how to visually optimize it. We guide you through every step, and we work hard to market your property.
            </div>
        </div>
    </div>
    <div class="row banner" style="background-image: url('http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background1.jpg');"> <!-- <?php //echo $setting['feature1_photo']; ?> -->
        <div class="banner_tent"></div>
		<div class="col-xs-1 col-md-4"></div>
        <div class="col-xs-10 col-md-4" style="text-align: center;">
			<a class="banner_button" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/contact/">Contact us to get started!</a>
		</div>
        <div class="col-xs-1 col-md-4"></div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/js/main.php'; ?>
</body>
</html>
