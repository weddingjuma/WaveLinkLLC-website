<!doctype html>
<html lang="en">
<head>
	<?php 
		require_once '/utility/Mobile_Detect.php';
		$detect = new Mobile_Detect; 
	?>
	<meta charset="utf-8">
	<title>Wave Link, LLC - Coming Soon</title>
	<meta name="description" content="Wave Link, LLC - Coming Soon">

	<?php include '/css/common.php'; ?>
	<?php include '/js/common.php'; ?>
	<?php if ( $detect->isMobile() ) { echo '<link rel="stylesheet" href="/css/common_mobile.css">'; } else { echo '<link rel="stylesheet" href="/css/common.css">'; } ?>
	<script src="../js/common.js"></script>
</head>
<body style="background-color:#2C3E50; background-position:0px 0px;">
	<?php if ( $detect->isMobile() ) { include 'menu.php'; } ?>
	<div id="main">
		<?php if ( $detect->isMobile() ) { include 'header_mobile.php'; } else { include 'header.php'; } ?>
		<div class="content">
			<div class="intro_content">
				<div class="pure-g">
				<?php 
				if ( $detect->isMobile() ) { 
					echo '<div class="pure-u-1-1 main_text">
							<span style="font-weight:300;">Coming Soon</span>
							<br /><br />';
				} else { 
					echo '
					<div class="pure-u-6-24 big_text">
						<span style="font-weight:300;">Coming Soon</span>
						<br /><br />';
						include 'navbuttons.php';
					echo '
					</div>
					<div class="pure-u-2-24"></div>
					<div class="pure-u-16-24 small_text">';
				} 
				?>
					<span class="medium_text"><b>Sorry!</b></span><br/><br/>
					This page doesn't exist yet and is coming soon.<br/>
					Thanks for your patience!<br/>
				</div>
			</div>
			<div style="height:100px;"></div>
			<?php include 'footer.php'; ?>
		</div>
	</div>
</body>
</html>