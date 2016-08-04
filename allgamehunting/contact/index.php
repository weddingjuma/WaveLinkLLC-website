<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "contact");
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
    <div class="products" style="background-image:url('/allgamehunting/images/background5.jpg');">
        <div class="container">
            <div class="row product">
                <div class="col-xs-12 col-md-12 product_information">
                    <div class="product_title">
                        Contact Us
                    </div>
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
                        <div class="row" style="margin: none;">
                            <div class="col-xs-12 col-md-12 contact_container">
                                <div class="contact_note">
                                    <input type="checkbox" name="is_subscribed" checked />&nbsp;&nbsp;Join our email list
                                </div>
                                <div class="contact_note">
                                    <input type="checkbox" name="is_agreed" />&nbsp;&nbsp;By checking this box, you agree to our <a href="">terms and conditions</a>
                                </div>
                            </div>
                        </div>
                        <button class="buy_button">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/footer.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/js/main.php'; ?>
    <script>
        $("#contact_form").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email_address: {
                    required: true,
                    email: true
                },
                phone_number: {
                    digits: true
                },
                is_agreed: {
                    required: true
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
		});
	</script>
</body>
</html>
