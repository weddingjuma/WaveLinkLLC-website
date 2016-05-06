<?php
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "about");
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
		include '../css/main.php'; 
	?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/header.php'; ?>
	<div class="row content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-7 content_div">
					<div class="page_title">About Us</div>
					<div class="reading_text">
						<?php echo $setting['aboutus']; ?>
					</div>
				</div>
				<div class="col-xs-12 col-md-5 content_div">
					<div class="row gallery">
						<?php 
							$result = mysqli_query($c, "SELECT * FROM `portfolio` ORDER BY RAND() LIMIT 4") or die(mysql_error());
							while($style = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
								echo '<div class="col-xs-6 col-md-6 gallery_image" style="background-image:url(\'http://'.$_SERVER['SERVER_NAME'].$style['image1'].'\')"></div>';
							}
						?>
					</div>
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
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/footer.php'; ?>
	<?php include '../js/main.php'; ?>
</body>
</html>