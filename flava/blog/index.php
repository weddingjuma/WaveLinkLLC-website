<?php
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "blog");
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
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/utility/facebook.php'; ?>
	<div class="row content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 content_div">
					<div class="page_title">Blog</div>
					<?php
						echo get_partial_posts_html($c, "SELECT * FROM `posts` WHERE published = 'yes' ORDER BY date_added DESC", $setting);
					?>
				</div>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/flava/footer.php'; ?>
	<?php include '../js/main.php'; ?>
</body>
</html>