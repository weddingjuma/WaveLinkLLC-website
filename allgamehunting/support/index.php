<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "support");
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
    <div class="about_banner" style="background-image:url('/allgamehunting/images/background8.jpg');"></div>
    <div class="about_title">
        <div class="container">
            Support
        </div>
    </div>
    <div class="about_content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 about_text">
                    <span class="about_bullet"><i class="fa fa-wrench"></i> <b>Frequenly Asked Questions</b></span><br /><br />
                    <i class="fa fa-arrow-circle-right"></i> <b><i>How quickly will I receive my purchase?</i></b>
                    <br />
                    After having recieved payment, we will promply ship your item(s) within 3 business days. For standard shipping, you should receive your order within 4-5 business days. Please allow additional time for shipments to U.S. Territories, PO Boxes, or Military APO/FPO addresses.
                    <br /><br />
                    <i class="fa fa-arrow-circle-right"></i> <b><i>Oops, I need to cancel or change something about my order; what should I do?</i></b>
                    <br />
                    Please use the form at the bottom of this page to submit a support request. We will respond as soon as possible to resolve any issues.
                    <br /><br />
                    <i class="fa fa-arrow-circle-right"></i> <b><i>Can I return item(s)?</i></b>
                    <br />
                    If you are not 100% satisfied with your purchase you can return your item(s) for a full refund within 60 days of purchase.
                    Returns must be in the state you received them, and in the original packaging.
                    Please use the form at the bottom of this page to submit a support request. We will respond as soon as possible to resolve any issues.
                </div>
                <div class="col-xs-12 col-md-12 about_text">
                    <span class="about_bullet"><i class="fa fa-gear"></i> <b>Troubleshooting</b></span><br /><br />
                    <i class="fa fa-arrow-circle-right"></i> <b><i>The ROBO caller does not have power</i></b>
                    <br />
                    Please make sure that the batteries are installed properly and that the switch is in the ON position.
                </div>
                <div class="col-xs-12 col-md-12 about_text">
                    <span class="about_bullet"><i class="fa fa-gear"></i> <b>Submit Support Request</b></span><br /><br />
                    <div class="col-xs-12 col-md-12 product_information">
                        <form id="contact_form" method="post" action="submit.php">
                            <div class="row" style="margin: none;">
                                <div class="col-xs-12 col-md-6 contact_container">
                                    <input class="contact_textbox" type="text" name="first_name" placeholder="First Name" />
                                </div>
                                <div class="col-xs-12 col-md-6 contact_container">
                                    <input class="contact_textbox" type="text" name="last_name" placeholder="Last Name" />
                                </div>
                            </div>
                            <div class="row" style="margin: none;">
                                <div class="col-xs-12 col-md-6 contact_container">
                                    <input id="email_address" class="contact_textbox" type="text" name="email_address" placeholder="Email Address" />
                                </div>
                                <div class="col-xs-12 col-md-6 contact_container">
                                    <input class="contact_textbox" type="text" name="phone_number" placeholder="Phone Number (Optional)" />
                                </div>
                            </div>
                            <div class="row" style="margin: none;">
                                <div class="col-xs-12 col-md-12 contact_container">
                                    <textarea class="contact_textbox" name="notes" placeholder="What do you need?" rows="5"></textarea>
                                </div>
                            </div>
                            <button class="buy_button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/footer.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/js/main.php'; ?>
</body>
</html>
