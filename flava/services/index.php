<?php
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "services");
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
				<div class="col-xs-12 col-md-12 content_div">
					<div class="page_title">Services</div>
					<?php 
						$result = mysqli_query($c, "SELECT * FROM `products` ORDER BY id ASC") or die(mysql_error());
						while($product = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
							echo 
							'<div class="row" style="height:250px;">
								<div class="col-xs-12 col-md-3 service" style="height:250px; max-height:250px;">
									<div class="service_title">'.$product['title'].'</div>
									<div class="price" style="float:none;">
										from $'.($product['on_sale'] == "no" ? $product['price'] : $product['sale_price']).'
									</div>
									<div class="service_description">
										'.$product['description'].'
									</div>
									<a class="gray_button" style="position:absolute; bottom:30px;" href="" target="_blank">Book</a>
								</div>
								<div class="col-xs-12 col-md-3 gallery_image" style="background-image:url(\'http://'.$_SERVER['SERVER_NAME'].$product['image1'].'\')"></div>
								<div class="col-xs-12 col-md-3 gallery_image" style="background-image:url(\'http://'.$_SERVER['SERVER_NAME'].$product['image2'].'\')"></div>
								<div class="col-xs-12 col-md-3 gallery_image" style="background-image:url(\'http://'.$_SERVER['SERVER_NAME'].$product['image3'].'\')"></div>
							</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/footer.php'; ?>
	<?php include '../js/main.php'; ?>
</body>
</html>