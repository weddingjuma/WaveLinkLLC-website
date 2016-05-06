<?php
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "gallery");
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
	<div style="padding:30px; background-color:#25262A;">
		<div class="page_title" style="margin-bottom:0;">Gallery</div>
	</div>
	<div class="row gallery">
		<?php 
			$result = mysqli_query($c, "SELECT * FROM `portfolio` ORDER BY RAND() LIMIT 50") or die(mysql_error());
			while($style = mysqli_fetch_array( $result, MYSQL_ASSOC )) { 
				echo 
				'<div class="col-xs-12 col-md-3 gallery_image" style="background-image:url(\'http://'.$_SERVER['SERVER_NAME'].$style['image1'].'\')">
					<a href="'.$style['image1'].'" data-lightbox="Portfolio" data-title="'.$style['description'].'">
						<div class="gallery_image"></div>
					</a>
				</div>';
			}
		?>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/footer.php'; ?>
	<?php include '../js/main.php'; ?>
</body>
</html>