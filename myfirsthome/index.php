<?php
	include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/utility/Mobile_Detect.php';
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
		include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/css/main.php';
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/myfirsthome/header.php'; ?>
    <div class="row slideshow">
		<div class="col-xs-12 col-md-12 slideshow_image" style="background-image: url('http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background1.jpg');"> <!-- <?php //echo $setting['feature1_photo']; ?> -->
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
            <div class="featured_subtitle">Jay Steward</div>
            <div class="featured_title">Top Columbus Real Estate Agent</div>
            <div class="row properties">
                <div class="col-xs-12 col-md-4 property">
                    <div class="property_image" style="background-image:url('http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background1.jpg');">
                        <div class="property_title">580 Upper Queens St, London</div>
                    </div>
                    <div class="property_details row">
                        <div class="col-xs-6 col-md-6 property_price">$749900</div>
                        <div class="col-xs-6 col-md-6 property_data">
                            <i class="fa fa-bed"></i>&nbsp;2&nbsp;
                            <i class="fa fa-bath"></i>&nbsp;2
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 property">
                    <div class="property_image" style="background-image:url('http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background2.jpg');">
                        <div class="property_title">1933 Ironwood Rd, London</div>
                    </div>
                    <div class="property_details row">
                        <div class="col-xs-6 col-md-6 property_price">$629900</div>
                        <div class="col-xs-6 col-md-6 property_data">
                            <i class="fa fa-bed"></i>&nbsp;2&nbsp;
                            <i class="fa fa-bath"></i>&nbsp;2
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 property">
                    <div class="property_image" style="background-image:url('http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background3.jpg');">
                        <div class="property_title">1802-363 Colborne St</div>
                    </div>
                    <div class="property_details row">
                        <div class="col-xs-6 col-md-6 property_price">$165900</div>
                        <div class="col-xs-6 col-md-6 property_data">
                            <i class="fa fa-bed"></i>&nbsp;2&nbsp;
                            <i class="fa fa-bath"></i>&nbsp;2
                        </div>
                    </div>
                </div>
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
    <div class="testimonies">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 testimony">
                    <div class="testimony_background">
                        <div class="testimony_icon"><i class="fa fa-quote-left"></i></div>
                        <div class="testimony_quote">You had everything we asked for and more. Your work-ethic was far above the others.</div>
                        <div class="testimony_icon"><i class="fa fa-quote-right"></i></div>
                        <div class="testimony_author">- Julian Smith</div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 testimony">
                    <div class="testimony_background">
                        <div class="testimony_icon"><i class="fa fa-quote-left"></i></div>
                        <div class="testimony_quote">We rave about you and recommend you to anyone we know that is selling their home!</div>
                        <div class="testimony_icon"><i class="fa fa-quote-right"></i></div>
                        <div class="testimony_author">- Susan Nicol</div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 testimony">
                    <div class="testimony_background">
                        <div class="testimony_icon"><i class="fa fa-quote-left"></i></div>
                        <div class="testimony_quote">Jay Stewart is an absolute fantastic agent and we would highly recommend him to anyone who is seriously interested in buying or selling their home.</div>
                        <div class="testimony_icon"><i class="fa fa-quote-right"></i></div>
                        <div class="testimony_author">- Karen Willmont</div>
                    </div>
                </div>
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
    <script>
		$( document ).ready(function() {
			//var images = [<?php //echo "'".$setting['feature1_photo']."', '".$setting['feature2_photo']."', '".$setting['feature3_photo']."'"; ?>];
            var images = ['http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background1.jpg', 'http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background2.jpg', 'http://<?php echo $_SERVER['SERVER_NAME']; ?>/myfirsthome/images/background3.jpg'];
			var titles = [<?php echo "'".$setting['feature1_title']."', '".$setting['feature2_title']."', '".$setting['feature3_title']."'"; ?>];
			var descriptions = [<?php echo "'".$setting['feature1_description']."', '".$setting['feature2_description']."', '".$setting['feature3_description']."'"; ?>];
			var numberOfRotations = 100;
			var count = 1;
			window.setInterval(function(){
				if(numberOfRotations != 0) {
					$('.slideshow_temp_image').css('opacity', '1');
					$('.slideshow_image').css('background-image', 'url("'+ images[count] +'")');
					$('.slideshow_temp_image').fadeTo('slow', 0, function() { });
					var lastImageCount = count - 1;
					if(lastImageCount == -1) {
						lastImageCount = 2;
					}
					$('.slideshow_temp_image').css('background-image', 'url("'+ images[lastImageCount] +'")');
					$('#slideshow_title').html(titles[count]);
					$('#slideshow_subtitle').html(descriptions[count]);
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
