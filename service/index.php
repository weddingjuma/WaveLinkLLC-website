<!doctype html>
<html lang="en">
<head>
	<?php 
		require_once '../utility/Mobile_Detect.php';
		$detect = new Mobile_Detect; 
	?>
	<meta charset="utf-8">
	<title>Wave Link, LLC - Services</title>
	<meta name="description" content="Wave Link, LLC - Services">

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
							<span style="font-weight:300;">Services</span>
							<br /><br />';
				} else { 
					echo '
					<div class="pure-u-6-24 big_text">
						<span style="font-weight:300;">Services</span>
						<br /><br />';
						include '../navbuttons.php';
					echo '
					</div>
					<div class="pure-u-2-24"></div>
					<div class="pure-u-16-24 small_text">';
				} 
				?>
					<span class="medium_text"><b>Focus on your customers...we'll handle the rest</b></span><br/><br/>
					Differentiate yourself with our services. Host your website or app with us and enjoy having easy access to techies and developments. Experience a higher level of control of your website by hosting with us.<br/><br/>
					We also provide SEO and Social Media Marketing.<br/>
					Having the appropriate SEO performed on you website is crucial to your visibility on the web. Who doesn't want to show up near the top of the Google search results?<br/>
					Social media is the new word of mouth, and Word-of-mouth is a powerful means of communication. Social media gives you a voice to engage with fans and followers.<br/><br/>
					<div class="social_button" style="color:#515151; font-size:60px;">
						<i class="fa fa-share-alt-square"></i>
					</div>
				</div>
			</div>
			<div style="height:100px;"></div>
			<?php include '../footer.php'; ?>
		</div>
	</div>
</body>
</html>