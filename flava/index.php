<?php
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/Mobile_Detect.php';
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
		include 'css/main.php'; 
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/facebook.php'; ?>
	<div class="row slideshow">
		<div class="col-xs-12 col-md-12 slideshow_image" style="background-image: url('<?php echo $setting['feature1_photo']; ?>');">
			<div class="slideshow_temp_image"></div>
			<div class="container">
				<div id="presentation_title" class="presentation_title">
					<?php echo $setting['feature1_title']; ?>
				</div>	
				<div id="presentation_subtitle" class="presentation_subtitle">
					<?php echo $setting['feature1_description']; ?>
				</div>
				<a class="gray_button" href="<?php echo $setting['setmore_link']; ?>" target="_blank">
					Book Appointment
				</a>
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
	<div class="row content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-7 content_div">
					<div class="title">Latest Posts</div>
					<?php
						echo get_partial_posts_html($c, "SELECT * FROM `posts` WHERE published = 'yes' ORDER BY date_added DESC LIMIT 2", $setting);
					?>
				</div>
				<div class="col-xs-12 col-md-5 content_div">
					<div class="title">Top Services</div>
					<?php 
						$result = mysqli_query($c, "SELECT * FROM `products` ORDER BY RAND() LIMIT 10") or die(mysql_error());
						while($product = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
							echo 
							'<div class="pricing">
								'.$product['title'].'
								<div class="price">
									from $'.($product['on_sale'] == "no" ? $product['price'] : $product['sale_price']).'
								</div>
							</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row parallax">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 parallax_div">
					<div class="parallax_title">Meet Our Team</div>
					<div class="team">
						<div class="row">
							<?php
								$stylist_results = mysqli_query($c, "SELECT * FROM stores") or die(mysql_error());
								while($stylist = mysqli_fetch_array( $stylist_results, MYSQL_ASSOC )) { 
									echo '
									<div class="col-xs-12 col-md-3 stylist">
										<div class="stylist_text">'.$stylist['name'].'</div>
										<div class="stylist_image" style="background-image:url(\'http://'.$_SERVER['SERVER_NAME'].$stylist['photo'].'\');"></div>
										<div class="gray_button stylist_button" onclick="window.open(\''.$stylist['url'].'\');">Book</div>
									</div>
									';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row gallery">
		<?php 
			$result = mysqli_query($c, "SELECT * FROM `portfolio` ORDER BY RAND() LIMIT 8") or die(mysql_error());
			while($style = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
				echo '<div class="col-xs-12 col-md-3 gallery_image" style="background-image:url(\'http://'.$_SERVER['SERVER_NAME'].$style['image1'].'\')"></div>';
			}
		?>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/footer.php'; ?>
	<?php include 'js/main.php'; ?>
	<script>
		$( document ).ready(function() {
			var images = [<?php echo "'".$setting['feature1_photo']."', '".$setting['feature2_photo']."', '".$setting['feature3_photo']."'"; ?>];
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