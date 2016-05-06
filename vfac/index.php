<?php
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/vfac/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "home");
	$metatags = build_metatags($seo, $setting); 
	$detect = new Mobile_Detect; 
	//ini_set('display_errors',1);
	//ini_set('display_startup_errors',1);
	//error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
<?php 
	echo $metatags; 
	include 'css/main.php'; 
?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- pop-up-box -->
	<link rel="stylesheet" type="text/css" href="css/jquery.lightbox.css">
	<script src="js/jquery.lightbox.js"></script>
	<script>
	  // Initiate Lightbox
	  $(function() {
		$('.product-gd1 a').lightbox(); 
	  });
	</script>
<!-- //pop-up-box -->
<!-- menu -->
<link href="css/component.css" rel="stylesheet" type="text/css"  />
<!-- //menu -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
	
<body class="cbp-spmenu-push">
<!-- header -->
	<div class="header-top">
		<div class="container">
			<div class="header-top-left">
				<p><i class="fa fa-star"></i> <?php echo $setting['headline']; ?></p>
			</div>
			<div class="header-top-rigt">
				<p><?php echo $setting['phone']; ?></p>
			</div>
			<div class="header-top-right">
				<p><i class="fa fa-mobile"></i> Contact Us</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img style="height:200px;" src="<?php echo $setting['logo']; ?>" /></a>
			</div>
			<div class="social">
				<i class="fa fa-facebook" onclick="window.open('<?php echo $setting['facebook_link']; ?>');"></i><br />
				<i class="fa fa-twitter" onclick="window.open('<?php echo $setting['twitter_link']; ?>');"></i><br />
				<i class="fa fa-instagram" onclick="window.open('<?php echo $setting['instagram_link']; ?>');"></i>
			</div>
			<div class="top-nav">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s2">
					<h3>Menu</h3>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#about" class="scroll">About</a></li>
						<li><a href="#products" class="scroll">Products</a></li>
						<li><a href="#event" class="scroll">Events</a></li>
						<li><a href="#mail" class="scroll">Mail Us</a></li>
					</ul>
				</nav>
				<div class="main buttonset">	
						<!-- Class "cbp-spmenu-open" gets applied to menu and "cbp-spmenu-push-toleft" or "cbp-spmenu-push-toright" to the body -->
						<button id="showRightPush"><img src="images/menu.png" alt=""/></button>
						<!--<span class="menu"></span>-->
				</div>
				<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
				<script src="js/classie.js"></script>
				<script>
					var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
					showRightPush = document.getElementById( 'showRightPush' ),
					body = document.body;
	
					showRightPush.onclick = function() {
						classie.toggle( this, 'active' );
						classie.toggle( body, 'cbp-spmenu-push-toleft' );
						classie.toggle( menuRight, 'cbp-spmenu-open' );
						disableOther( 'showRightPush' );
					};
	
					function disableOther( button ) {
						if( button !== 'showRightPush' ) {
							classie.toggle( showRightPush, 'disabled' );
						}
					}
				</script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- banner -->
	<div class="banner" style="background-image:url('<?php echo $setting['home_page_background1']; ?>');">
		<div class="container">
		<!-- Slider-starts-Here -->
			
				<script src="js/responsiveslides.min.js"></script>
				 <script>
				    // You can also use "$(window).load(function() {"
				    $(function () {
				      // Slideshow 4
				      $("#slider3").responsiveSlides({
				        auto: true,
				        pager: false,
				        nav: true,
				        timeout: 8000,
				        speed: 1000,
				        namespace: "callbacks",
				        before: function () {
				          $('.events').append("<li>before event fired.</li>");
				        },
				        after: function () {
				          $('.events').append("<li>after event fired.</li>");
				        }
				      });
				
				    });
				  </script>
			<!--//End-slider-script -->
			<div  id="top" class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="banner-info">
							<div class="banner-info-left">
								<div style="background-image:url('<?php echo $setting['feature1_photo']; ?>');" alt=" " class="slideshow-image"></div>
							</div>
							<div class="banner-info-right">
								<h1><?php echo $setting['feature1_title']; ?></h1>
								<p><?php echo $setting['feature1_description']; ?></p>
								<div class="cont">
									<a href="#mail" class="scroll">Contact Us</a>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</li>
					<li>
						<div class="banner-info">
							<div class="banner-info-left">
								<div style="background-image:url('<?php echo $setting['feature2_photo']; ?>');" alt=" " class="slideshow-image"></div>
							</div>
							<div class="banner-info-right">
								<h1><?php echo $setting['feature2_title']; ?></h1>
								<p><?php echo $setting['feature2_description']; ?></p>
								<div class="cont">
									<a href="#mail" class="scroll">Contact Us</a>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</li>
					<li>
						<div class="banner-info">
							<div class="banner-info-left">
								<div style="background-image:url('<?php echo $setting['feature3_photo']; ?>');" alt=" " class="slideshow-image"></div>
							</div>
							<div class="banner-info-right">
								<h1><?php echo $setting['feature3_title']; ?></h1>
								<p><?php echo $setting['feature3_description']; ?></p>
								<div class="cont">
									<a href="#mail" class="scroll">Contact Us</a>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="col-md-6 welcome-left">
				<img src="<?php echo $setting['home_page_background2']; ?>" alt=" " class="img-responsive" />
			</div>
			<div class="col-md-6 welcome-right">
				<h3>Our <span>Mission</span></h3>
				<p><?php echo $setting['slogan']; ?></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //welcome -->
<!-- about -->
	<div class="about" id="about">
		<div class="about-left" style="background-image:url('<?php echo $setting['home_page_background3']; ?>');"></div>
		<div class="about-right">
			<h3>A Brief History</h3>
			<p><?php echo $setting['pitch']; ?></p>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //about -->
<!-- products -->
	<div class="products" id="products">
		<div class="container">
			<h3>What We Offer</h3>
			<div class="product-grids">
				<?php 
					$result = mysqli_query($c, "SELECT * FROM `products` WHERE category1 = 'service'") or die(mysql_error());
					while($service = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
						echo '
						<div class="col-xs-12 col-md-4 product-grid">
							<div class="product-gd">
								<div class="service-image" style="background-image:url(\''.$service['image1'].'\');"></div>
								<div class="product-grd">
									<h4><a href="">'.$service['title'].'</a></h4>
									<p>'.$service['description'].'</p>
								</div>
							</div>
						</div>';
					}
				?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //products -->
<!-- products-bottom -->
	<div class="products-bottom" style="background-image:url('<?php echo $setting['home_page_background1']; ?>');">
		<div class="container">
			<div class="get-in-grids">
				<div class="get-in-grid-left">
					<p>Newsletter</p>
				</div>
				<div class="get-in-grid-right">
					<input type="text" value="Enter Your Mail..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Mail...';}" required="">
					<input type="submit" value="Subscribe" >
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //products-bottom -->
<!-- events -->
	<div class="event" id="event">
		<div class="container">
			<h3>Events</h3>
			<div class="event-grids">
				<?php 
					$result = mysqli_query($c, "SELECT * FROM `products` WHERE category1 = 'event'") or die(mysql_error());
					while($event = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
						echo '
						<div class="col-xs-12 col-md-6 event-grid">
							<div class="event-grd">
								<div class="event-image" style="background-image:url(\''.$event['image1'].'\');"></div>
								<div class="evnt-grd">
									<div class="col-xs-3 evnt-grd-left">
										<p>'.$event['type1'].'<span>'.$event['type2'].'</span></p>
									</div>
									<div class="col-xs-9 evnt-grd-right">
										<h3><a href="">'.$event['title'].'</a></h3>
										<p>'.$event['description'].'</p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>';
					}
				?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //events -->
<!-- mail -->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.958900464012!2d36.23097800000001!3d49.993379999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0f009ab9f07%3A0xa21e10f67fa29ce!2sGeorgia+Education+Center!5e0!3m2!1sen!2sin!4v1436943860334" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="mail" id="mail">
		<div class="container">
			<div class="feedback-info">
				<h3>Mail Us</h3>
				<p class="lo">Enter your contact information below and we'll reach out to you!</p>
				<div class="name">
					<p id="contact">Your name:</p>
					<form>
						<input type="text" placeholder="Name" required=" ">
					</form>
				</div>
				<div class="name na">
					<p>E-mail:</p>
					<form>
						<input type="text" placeholder="Enter Your Email Here..." required=" ">
					</form>
				</div>
				<div class="name">
					<p>Phone number:</p>
					<form>
						<input type="text" placeholder="+2057 487 906" required=" ">
					</form>
				</div>
				<div class="comment">
					<p>Message:</p>
					<form>
						<textarea placeholder="Write your message here...." required=" "></textarea>
					</form>
				</div>
				<div class="sub">
					<form>
						<input type="submit" value="Send">
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- //mail -->
<!-- footer -->
	<div class="footer">
		<div class="footer-grids">
		  <div class="container">
			<div class="col-md-3 footer-grid">
				<h4>Services</h4>
				<ul>
					<li><a href="#">rerum hic tenetur</a></li>
					<li><a href="#">molestiae non recusandae</a></li>
					<li><a href="#">voluptates repudiandae</a></li>
					<li><a href="#">necessitatibus saepe</a></li>
					<li><a href="#">debitis aut rerum</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h4>Information</h4>
				 <ul>
					<li><a href="#">quibusdam et aut</a></li>
					<li><a href="#">Testimonals</a></li>
					<li><a href="#">Archives</a></li>
					<li><a href="#">Our Staff</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h4>More details</h4>
				<ul>
					<li><a href="#">About us</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Terms &amp; Conditions</a></li>
					<li><a href="#">Site map</a></li>
				</ul>
			</div>
			 <div class="col-md-3 footer-grid contact-grid">
					<h4>Contact us</h4>
					<ul>
						<li><span class="c-icon"> </span><?php echo $setting['address1'] ?></li>
						<li><span class="c-icon1"> </span><a href="mailto:info@example.com"><?php echo $setting['email'] ?></a></li>
						<li><span class="c-icon2"> </span><?php echo $setting['phone'] ?></li>
					</ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
		</div>
	</div>
	<div class="copy">
		 <p>Copyright © 2016 VFAC. All rights reserved | Powered by <a href="http://www.wavelinkllc.com">Wave Link, LLC</a></p>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>