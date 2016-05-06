<?php
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<header>
  <h3><a href="http://www.wavelinkllc.com"><img style="height:75px; position:relative; bottom:10px;" src="http://www.wavelinkllc.com/images/WaveLink_Logo.png" alt="Wave Link, LLC - High-Quality Mobile Apps, Websites, & Graphics" /></a> Administration Panel&nbsp;&nbsp;&middot;&nbsp;&nbsp;<i><?php echo $site_name ?></i></h3>
  <nav class="navbar">
	<ul class="nav navbar-nav">
	  <li><a href="/mboc/admin/accounts/" <?php if (false === strpos($url,'accounts')) { echo 'class="active"'; } ?>>Accounts</a></li>
	  <li><a href="/mboc/admin/notifications/" <?php if (false === strpos($url,'notifications')) { echo 'class="active"'; } ?>>Notifications</a></li>
	  <li><a href="/mboc/admin/home/" <?php if (false === strpos($url,'home')) { echo 'class="active"'; } ?>>Home Page</a></li>
	  <li><a href="/mboc/admin/dealership/" <?php if (false === strpos($url,'dealership')) { echo 'class="active"'; } ?>>Dealership Page</a></li>
	  <li><a href="/mboc/admin/roadside/" <?php if (false === strpos($url,'roadside')) { echo 'class="active"'; } ?>>Roadside Page</a></li>
	  <li><a href="/mboc/admin/specials/" <?php if (false === strpos($url,'specials')) { echo 'class="active"'; } ?>>Specials Page</a></li>
	  <li><a href="/mboc/admin/vehicle/" <?php if (false === strpos($url,'vehicle')) { echo 'class="active"'; } ?>>Vehicle Page</a></li>
	  <li><a href="/mboc/admin/logout.php" style="color:#e74c3c;">Logout</a></li>
	</ul>
  </nav>
</header>