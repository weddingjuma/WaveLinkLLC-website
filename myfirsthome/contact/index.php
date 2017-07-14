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
            <div class="featured_title">Contact Us</div>
            <div class="featured_subtitle"><br />
                Please fill out the form below and we will be in contact as soon as possible!
            </div>
        </div>
    </div>
    <form id="contact_form">
        <div class="container contact_form">
            <div class="row contact_field" style="border: none;">
                <div class="col-xs-3 col-md-3 contact_label">
                    Full Name*
                </div>
                <div class="col-xs-9 col-md-9 contact_control">
                    <input type="text" name="full_name" value="" required>
                </div>
            </div>
            <div class="row contact_field" style="border: none;">
                <div class="col-xs-3 col-md-3 contact_label">
                    Email*
                </div>
                <div class="col-xs-9 col-md-9 contact_control">
                    <input type="text" name="email" value="" required>
                </div>
            </div>
            <div class="row contact_field" style="border: none;">
                <div class="col-xs-3 col-md-3 contact_label">
                    Phone
                </div>
                <div class="col-xs-9 col-md-9 contact_control">
                    <input type="text" name="phone" value="">
                </div>
            </div>
            <div class="row contact_field" style="border: none;">
                <div class="col-xs-3 col-md-3 contact_label">
                    Needs?
                </div>
                <div class="col-xs-9 col-md-9 contact_control">
                    <input type="checkbox" name="needs" value="Buy right now">&nbsp;Buy&nbsp;right&nbsp;now<?php echo responsive_space($detect->isMobile()); ?>
                    <input type="checkbox" name="needs" value="Buying within a year">&nbsp;Buying&nbsp;within&nbsp;a&nbsp;year<?php echo responsive_space($detect->isMobile()); ?>
                    <input type="checkbox" name="needs" value="Just looking">&nbsp;Just&nbsp;looking<?php echo responsive_space($detect->isMobile()); ?>
                    <input type="checkbox" name="needs" value="Selling">&nbsp;Selling
                </div>
            </div>
            <div class="row contact_field" style="border: none;">
                <div class="col-xs-3 col-md-3 contact_label">
                    Pre-Approved?
                </div>
                <div class="col-xs-9 col-md-9 contact_control">
                    <input type="radio" name="pre_approved" value="true" checked="checked">&nbsp;Yes&nbsp;&nbsp;
                    <input type="radio" name="pre_approved" value="false">&nbsp;No
                </div>
            </div>
            <div class="row contact_field" style="border: none;">
                <div class="col-xs-3 col-md-3 contact_label">
                    Property Type?
                </div>
                <div class="col-xs-9 col-md-9 contact_control">
                    <input type="checkbox" name="property_type" value="Single family home">&nbsp;Single&nbsp;family&nbsp;home<?php echo responsive_space($detect->isMobile()); ?>
                    <input type="checkbox" name="property_type" value="Condo">&nbsp;Condo<?php echo responsive_space($detect->isMobile()); ?>
                    <input type="checkbox" name="property_type" value="New construction">&nbsp;New&nbsp;construction
                </div>
            </div>
            <div class="row contact_field" style="border: none;">
                <div class="col-xs-1 col-md-3"></div>
                <div class="col-xs-10 col-md-6">
                    <button>Submit</button>
                </div>
                <div class="col-xs-1 col-md-3"></div>
            </div>
        </div>
    </form>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/footer.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/js/main.php'; ?>
</body>
</html>
