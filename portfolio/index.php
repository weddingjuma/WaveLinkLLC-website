<?php
	include $_SERVER['DOCUMENT_ROOT'].'/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "portfolio");
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
		include $_SERVER['DOCUMENT_ROOT'].'/css/main.php'; 
	?>
</head>
<body style="background-color:black;">
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/google_analytics.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/utility/facebook.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'; ?>
	<div class="row portfolio">
		<?php
			$portfolio_result = mysqli_query($c, "SELECT * FROM `portfolio` ORDER BY order_index ASC") or die(mysql_error());
			while($portfolio = mysqli_fetch_array( $portfolio_result, MYSQL_ASSOC )) { 
				$portfolio_icon;
				$portfolio_button_text;
				switch($portfolio['category1']) {
					case "app" : 
						$portfolio_icon = "mobile";
						$portfolio_button_text = "GET THE APP";
						break;
					case "website" : 
						$portfolio_icon = "laptop";
						$portfolio_button_text = "VIEW THE WEBSITE";
						break;
					default : 
						$portfolio_icon = "laptop";
						$portfolio_button_text = "VIEW THE WEBSITE";
				}
				echo 
				'<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 portfolio_div">
					<div class="portfolio_item" style="background-image:url(\''.$portfolio['image1'].'\');">
						<div class="portfolio_text">
							<i class="fa fa-'.$portfolio_icon.' portfolio_icon"></i>
							<div class="portfolio_title">
								'.$portfolio['title'].' 
							</div>
							<div class="portfolio_description">
								'.$portfolio['description'].' 
							</div>
							<button class="white_button portfolio_button" onclick="window.open(\''.$portfolio['url'].'\')">
								'.$portfolio_button_text.' 
							</button>
						</div>
					</div>
				</div>';
			}
		?>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/runner.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/js/main.php'; ?>
</body>
</html>
<script>
	$( document ).ready(function() { });
</script>