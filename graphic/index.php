<!doctype html>
<html lang="en">
<head>
	<?php 
		require_once '../utility/Mobile_Detect.php';
		$detect = new Mobile_Detect; 
	?>
	<meta charset="utf-8">
	<title>Wave Link, LLC - Graphics</title>
	<meta name="description" content="Wave Link, LLC - Graphics">

	<?php include '../css/common.php'; ?>
	<?php include '../js/common.php'; ?>
	<?php if ( $detect->isMobile() ) { echo '<link rel="stylesheet" href="../css/common_mobile.css">'; } else { echo '<link rel="stylesheet" href="../css/common.css">'; } ?>
	<script src="../js/common.js"></script>
</head>
<body style="background-color:#2C3E50; background-position:0px 0px;">
	<?php if ( $detect->isMobile() ) { include '../menu.php'; } ?>
	<div id="main">
		<?php if ( $detect->isMobile() ) { include '../header_mobile.php'; } else { include '../header.php'; } ?>
		<div class="content">
			<div class="intro_content">
				<div class="pure-g">
				<?php 
				if ( $detect->isMobile() ) { 
					echo '<div class="pure-u-1-1 main_text">
					      	<span style="font-weight:300;">Graphics</span>
							<br /><br />';
				} else { 
					echo '
					<div class="pure-u-6-24 big_text">
						<span style="font-weight:300;">Graphics</span>
						<br /><br />';
						include '../navbuttons.php';
					echo '
					</div>
					<div class="pure-u-2-24"></div>
					<div class="pure-u-16-24 small_text">';
				} 
				?>
						<span class="medium_text"><b>We want you to show off</b></span><br/><br/>
						Make your business stand out with custom graphics tailored to your needs.<br/><br/>
						Need a logo?<br/>Some icons?<br/>A flyer?<br/>A business card?<br/>A Facebook and Twitter cover banner?<br/><br/>
						We got you.<br/><br/>
						<div class="social_button" style="color:#ef5122; font-size:60px;">
							<i class="fa fa-picture-o"></i>
						</div>
					</div>
				</div>
				<div style="height:100px;"></div>
				<?php include '../footer.php'; ?>
			</div>
		</div>
	</div>
</body>
</html>