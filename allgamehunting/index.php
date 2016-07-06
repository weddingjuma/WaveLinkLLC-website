<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "home");
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
    <div class="products_link" onclick="$('html,body').animate({ scrollTop: $('#products').offset().top });">
		See the products&nbsp;&nbsp;&nbsp;&nabla;
	</div>
    <div class="row slideshow">
		<div class="col-xs-12 col-md-12 slideshow_image" style="background-image: url('/allgamehunting/images/background2.jpg');"> <!-- <php echo $setting['feature1_photo']; ?> -->
			<div class="slideshow_temp_image"></div>
			<div class="container presentation">
				<div id="presentation_title" class="presentation_title">
					<?php echo $setting['feature1_title']; ?>
				</div>
				<div id="presentation_subtitle" class="presentation_subtitle">
					<?php echo $setting['feature1_description']; ?>
				</div>
                <button class="presentation_button">Get Started</button>
				<div class="row presentation_dots">
					<div class="col-xs-4 col-md-4">
						<div id="presentation_dot_1" class="presentation_dot presentation_dot_selected"></div>
					</div>
					<div class="col-xs-4 col-md-4">
						<div id="presentation_dot_2" class="presentation_dot"></div>
					</div>
					<div class="col-xs-4 col-md-4">
						<div id="presentation_dot_3" class="presentation_dot"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="divider">
        Giving Hunters an EDGE
    </div>
    <div id="products" class="products" style="background-image:url('/allgamehunting/images/background5.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="product">
                        <div class="product_image">

                        </div>
                        <div class="product_information">
                            <div class="product_title">
                                ROBO
                            </div>
                            <div class="product_description">
                                This is the robo caller.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/js/main.php'; ?>
    <script>
		$( document ).ready(function() {
			//var images = [<?php echo "'".$setting['feature1_photo']."', '".$setting['feature2_photo']."', '".$setting['feature3_photo']."'"; ?>];
            var images = ['/allgamehunting/images/background2.jpg', '/allgamehunting/images/background3.jpg', '/allgamehunting/images/background1.jpg'];
			var titles = [<?php echo "'".$setting['feature1_title']."', '".$setting['feature2_title']."', '".$setting['feature3_title']."'"; ?>];
			var descriptions = [<?php echo "'".$setting['feature1_description']."', '".$setting['feature2_description']."', '".$setting['feature3_description']."'"; ?>];
			var numberOfRotations = 100;
			var count = 1;
			window.setInterval(function(){
				if(numberOfRotations != 0) {
					$('.slideshow_temp_image').css('opacity', '1');
					$('.slideshow_image').css('background-image', 'url("'+ images[count] +'")');
					$('.slideshow_temp_image').fadeTo('slow', 0, function() { });
					var lastImageCount = count-1;
					if(lastImageCount == -1) {
						lastImageCount = 2;
					}
					$('.slideshow_temp_image').css('background-image', 'url("'+ images[lastImageCount] +'")');
					$('#presentation_dot_1').removeClass('presentation_dot_selected');
					$('#presentation_dot_2').removeClass('presentation_dot_selected');
					$('#presentation_dot_3').removeClass('presentation_dot_selected');
					$('#presentation_dot_' + (count + 1).toString()).addClass('presentation_dot_selected');
					$('#presentation_title').html(titles[count]);
					$('#presentation_subtitle').html(descriptions[count]);
					count++;
					if(count == 3) {
						count = 0;
					}
					numberOfRotations--;
				}
			}, 10000);
		});
	</script>
</body>
</html>
