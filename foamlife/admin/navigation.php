<?php
	$url = 'http://'.$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];
?>
<header>
  <h3><a href="http://www.wavelinkllc.com"><img style="height:75px; position:relative; bottom:10px;" src="http://www.wavelinkllc.com/images/WaveLink_Logo.png" alt="Wave Link, LLC - High-Quality Mobile Apps, Websites, & Graphics" /></a> Administration Panel&nbsp;&nbsp;&middot;&nbsp;&nbsp;<i><?php echo $site_name ?></i></h3>
  <nav class="navbar">
	<ul class="nav navbar-nav">
	  <li><a href="/foamlife/admin/settings/" <?php if (false === strpos($url,'settings')) { echo 'class="active"'; } ?>>Settings</a></li>
	  <li><a href="/foamlife/admin/shoes/" <?php if (false === strpos($url,'products')) { echo 'class="active"'; } ?>>Shoes</a></li>
      <li><a href="/foamlife/admin/notifications/" <?php if (false === strpos($url,'notifications')) { echo 'class="active"'; } ?>>Notifications</a></li>
	  <!--<li><a href="/foamlife/admin/seo/" <?php if (false === strpos($url,'seo')) { echo 'class="active"'; } ?>>SEO</a></li>-->
	  <li><a href="/foamlife/admin/logout.php" style="color:#e74c3c;">Logout</a></li>
	</ul>
  </nav>
</header>
