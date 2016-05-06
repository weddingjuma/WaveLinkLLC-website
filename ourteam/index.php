<!doctype html>
<html lang="en">
<head>
	<?php 
		require_once '../utility/Mobile_Detect.php';
		$detect = new Mobile_Detect; 
	?>
	<meta charset="utf-8">
	<title>Wave Link, LLC - Our Team</title>
	<meta name="description" content="Wave Link, LLC - Our Team">

	<?php include '../css/common.php'; ?>
	<?php include '../js/common.php'; ?>
	<?php if ( $detect->isMobile() ) { echo '<link rel="stylesheet" href="../css/common_mobile.css">'; } else { echo '<link rel="stylesheet" href="../css/common.css">'; } ?>
	<script src="../js/common.js"></script>
	<style>
		.quote { font-size: 15px; color: #dfdfdf; }
		.profilepic { height:150px; }
	</style>
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
							<span style="font-weight:300;">Our Team</span>
							<br /><br />';
				} else { 
					echo '
					<div class="pure-u-6-24 big_text">
						<span style="font-weight:300;">Our Team</span>
						<br /><br />';
						include '../navbuttons.php';
					echo '
					</div>
					<div class="pure-u-2-24"></div>
					<div class="pure-u-16-24 small_text">';
				} 
				?>
					<span class="medium_text"><b>Meet the team that will deliver <i>unmatched</i>&nbsp; digital solutions for your business</b></span><br/><br/>
					<div class="pure-g" style="text-align:center;">
						<div class="pure-u-1-2">
							<br />
							<img src="../images/operations.png" class="profilepic" />
							<div style="padding:10px;">
								<span class="medium_text"><b>Aaron Adams, Jr</b></span><br/>
								Operations Manager<br /> 
								<span class="quote"><i>"Growth comes to those that are not afraid to embrace change.."</i></span><br/>
							</div>
						</div>
						<div class="pure-u-1-2">
							<br />
							<img src="../images/brands.png" class="profilepic" />
							<div style="padding:10px;">
								<span class="medium_text"><b>David Clark</b></span><br/>
								Brands Manager<br /> 
								<span class="quote"><i>"'Different' and 'new' is relatively easy. Doing something that's genuinely better is very hard."</i></span><br/>
							</div>
						</div>
						<div class="pure-u-1-2">
							<br />
							<img src="../images/it.png" class="profilepic" />
							<div style="padding:10px;">
								<span class="medium_text"><b>Christopher Williams</b></span><br/>
								Systems Engineer<br /> 
								<span class="quote"><i>"Perception is based off of two critical components: 20% audial and 80% visual. Always keep in mind what message you are projecting."</i></span><br/>
							</div>
						</div>
						<div class="pure-u-1-2">
							<br />
							<img src="../images/it.png" class="profilepic" />
							<div style="padding:10px;">
								<span class="medium_text"><b>Alton Willis</b></span><br/>
								Systems Engineer<br />
								<span class="quote"><i>"Get busy living or get busy dying!" &middot; The Shawshank Redemption</i></span><br/>
							</div>
						</div>
						<div class="pure-u-1-2">
							<br />
							<img src="../images/dev1.png" class="profilepic" />
							<div style="padding:10px;">
								<span class="medium_text"><b>Danielle Williams</b></span><br/>
								Developer<br /> 
								<span class="quote"><i>"The future belongs to those who believe in the beauty of their dreams.."</i></span><br/>
							</div>
						</div>
						<div class="pure-u-1-2">
							<br />
							<img src="../images/dev2.png" class="profilepic" />
							<div style="padding:10px;">
								<span class="medium_text"><b>Kelvin Graddick</b></span><br/>
								Developer<br />
								<span class="quote"><i>"If you're not building your own dream then you're just a building block in someone elses.."</i></span><br/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="height:100px;"></div>
			<?php include '../footer.php'; ?>
		</div>
	</div>
</body>
</html>