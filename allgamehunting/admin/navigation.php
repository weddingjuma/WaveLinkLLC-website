<?php
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<header>
  <h3><a href="http://www.wavelinkllc.com"><img style="height:75px; position:relative; bottom:10px;" src="http://www.wavelinkllc.com/images/WaveLink_Logo.png" alt="Wave Link, LLC - High-Quality Mobile Apps, Websites, & Graphics" /></a> Administration Panel&nbsp;&nbsp;&middot;&nbsp;&nbsp;<i><?php echo $site_name ?></i></h3>
  <nav class="navbar">
	<ul class="nav navbar-nav">
	  <li><a href="/allgamehunting/admin/settings/" <?php if (false === strpos($url,'settings')) { echo 'class="active"'; } ?>>Settings</a></li>
	  <li><a href="/allgamehunting/admin/homepage/" <?php if (false === strpos($url,'homepage')) { echo 'class="active"'; } ?>>Content</a></li>
	  <li><a href="/allgamehunting/admin/clients/" <?php if (false === strpos($url,'clients')) { echo 'class="active"'; } ?>>Contacts</a></li>
	  <li><a href="/allgamehunting/admin/products/" <?php if (false === strpos($url,'products')) { echo 'class="active"'; } ?>>Products</a></li>
	  <li><a href="/allgamehunting/admin/orders/" <?php if (false === strpos($url,'orders')) { echo 'class="active"'; } ?>>Orders</a></li>
	  <li><a href="/allgamehunting/admin/seo/" <?php if (false === strpos($url,'seo')) { echo 'class="active"'; } ?>>SEO</a></li>
	  <li><a href="/allgamehunting/admin/logout.php" style="color:#e74c3c;">Logout</a></li>
	  <!--<li><button class="btn btn-default btn-sm navbar-btn">Go to website</button></li>-->
	</ul>
  </nav>
</header>
