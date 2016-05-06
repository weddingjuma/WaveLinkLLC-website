<?php
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<header>
  <h3><a href="http://www.wavelinkllc.com"><img style="height:75px; position:relative; bottom:10px;" src="http://www.wavelinkllc.com/images/WaveLink_Logo.png" alt="Wave Link, LLC - High-Quality Mobile Apps, Websites, & Graphics" /></a> Administration Panel&nbsp;&nbsp;&middot;&nbsp;&nbsp;<i><?php echo $site_name ?></i></h3>
  <nav class="navbar">
	<ul class="nav navbar-nav">
	  <li><a href="/automotive_dealership/admin/accounts/" <?php if (false === strpos($url,'accounts')) { echo 'class="active"'; } ?>>Accounts</a></li>
	  <li><a href="/automotive_dealership/admin/notifications/" <?php if (false === strpos($url,'notifications')) { echo 'class="active"'; } ?>>Notifications</a></li>
	  <li><a href="/automotive_dealership/admin/home/" <?php if (false === strpos($url,'home')) { echo 'class="active"'; } ?>>Home Page</a></li>
	  <li><a href="/automotive_dealership/admin/dealership/" <?php if (false === strpos($url,'/dealership')) { echo 'class="active"'; } ?>>Dealership Page</a></li>
	  <li><a href="/automotive_dealership/admin/roadside/" <?php if (false === strpos($url,'roadside')) { echo 'class="active"'; } ?>>Roadside Page</a></li>
	  <li><a href="/automotive_dealership/admin/specials/" <?php if (false === strpos($url,'specials')) { echo 'class="active"'; } ?>>Specials Page</a></li>
	  <li><a href="/automotive_dealership/admin/showroom/" <?php if (false === strpos($url,'showroom')) { echo 'class="active"'; } ?>>Showroom Page</a></li>
	  <li><a href="/automotive_dealership/admin/vehicle/" <?php if (false === strpos($url,'vehicle')) { echo 'class="active"'; } ?>>Vehicle Page</a></li>
	  <li><a href="/automotive_dealership/admin/appointment/" <?php if (false === strpos($url,'appointment')) { echo 'class="active"'; } ?>>Appointment Page</a></li>
	  <li><a href="/automotive_dealership/admin/video/" <?php if (false === strpos($url,'video')) { echo 'class="active"'; } ?>>Video Page</a></li>
	  <li><a href="/automotive_dealership/admin/signin/" <?php if (false === strpos($url,'signin')) { echo 'class="active"'; } ?>>Sign In Page</a></li>
	  <li><a href="/automotive_dealership/admin/signup/" <?php if (false === strpos($url,'signup')) { echo 'class="active"'; } ?>>Sign Up Page</a></li>
	  <li><a href="/automotive_dealership/admin/account/" <?php if (false === strpos($url,'account')) { echo 'class="active"'; } ?>>Account Page</a></li>
	  <li><a href="/automotive_dealership/admin/history/" <?php if (false === strpos($url,'history')) { echo 'class="active"'; } ?>>History Page</a></li>
	  <li><a href="/automotive_dealership/admin/settings/" <?php if (false === strpos($url,'settings')) { echo 'class="active"'; } ?>>Settings Page</a></li>
	  <li><a href="/automotive_dealership/admin/warranty/" <?php if (false === strpos($url,'warranty')) { echo 'class="active"'; } ?>>Warranty Page</a></li>
	  <li><a href="/automotive_dealership/admin/parts/" <?php if (false === strpos($url,'parts')) { echo 'class="active"'; } ?>>Parts Page</a></li>
	  <li><a href="/automotive_dealership/admin/service/" <?php if (false === strpos($url,'service')) { echo 'class="active"'; } ?>>Service Page</a></li>
	  <li><a href="/automotive_dealership/admin/url/" <?php if (false === strpos($url,'url')) { echo 'class="active"'; } ?>>URL Page</a></li>
	  <li><a href="/automotive_dealership/admin/logout.php" style="color:#e74c3c;">Logout</a></li>
	</ul>
  </nav>
</header>