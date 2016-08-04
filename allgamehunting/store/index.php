<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "store");
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
    <div class="about_title" style="height: auto;">
        <div class="container">
            <br />
            Store
        </div>
    </div>
    <div class="products" style="background-image:url('/allgamehunting/images/background5.jpg');">
        <div class="container">
            <div class="row product">
                <div class="col-xs-12 col-md-6 product_image">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <img src="/allgamehunting/images/product1.png" />
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <img src="/allgamehunting/images/product2.png" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 product_information">
                    <div class="product_title">
                        The <img src="/allgamehunting/images/robo_logo_2.png" style="height: 27px; margin-bottom: 5px;" /> Calling System
                    </div>
                    <div class="product_description">
                        <img src="/allgamehunting/images/robo_logo_2.png" style="height: 14px; margin-bottom: 2px;" /> is a robotic motor-driven device that turns a mechanical call.  This call is better know as a bleat can call. <img src="/allgamehunting/images/robo_logo_2.png" style="height: 14px; margin-bottom: 2px;" /> is 6 1/4" H X 3" W X ?? D and weighs X.XX pounds.  This is the perfect size to stow in or attach to a backpack and place on the ground or strapped to a tree out of plain site.  The ground stake, cradle arm, and shaft are made out of the same high quality material major gun manufactures use in there high quality housings.
                    </div>
                    <table>
                        <tr>
                            <td><?php echo $Cart -> add_to_cart_button(1, 1, "", "Buy &middot; $169.99", "buy_button"); ?>&nbsp;&nbsp;&nbsp;</td>
                            <td><button class="detail_button" onclick="location.href='/allgamehunting/product/?id=1'">Details</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/footer.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/js/main.php'; ?>
</body>
</html>
