<?php

function connect_to_database() {
	// Connect to server and select databse.
	$c = mysqli_connect($GLOBALS['database_host'], 
						$GLOBALS['database_username'], 
						$GLOBALS['database_password'], 
						$GLOBALS['database_name'])
						or die("Cannot connect to database."); 
	mysqli_set_charset($c, "utf8mb4");
	return $c;
}

function get_settings($c, $sql) {
	$settings = mysqli_query($c, "SELECT * FROM settings");
	if (!$settings) { echo 'Could not load settings data.'; exit; }
	$setting = array(); 
	while($row = mysqli_fetch_assoc($settings)) { 
		$setting[$row['code']] = $row['value']; 
	}
	return $setting;
}

function get_seo($c, $page) {
	$row = mysqli_fetch_assoc(mysqli_query($c, "SELECT * FROM seo WHERE page='$page'"));
	if (!$row) { return; }
	return $row;
}

function build_metatags($seo, $setting) {
	$metatags = <<< EOF
	    		<title>{title}</title>
				<meta name="description" content="{description}">
				<meta name="keywords" content="{keywords}">
				<meta name="author" content="{title}">
				<meta name="robots" content="index, follow">
				<meta property="fb:app_id" content="[FB_APP_ID]" />
				<meta property="og:description" content="{description}" />
				<meta property="og:image" content="{logo}" />
				<meta property="og:image:type" content="image/png" />
				<meta property="og:title" content="{title}" />
				<meta property="og:url" content="{url}" />
				<meta property="og:site_name" content="{title}" />
				<meta property="og:type" content="company" />
				<meta name="twitter:card" content="summary_large_image">
				<meta name="twitter:site" content="{twitter}">
				<meta name="twitter:creator" content="{twitter}">
				<meta name="twitter:title" content="{title}">
				<meta name="twitter:description" content="{description}">
				<meta name="twitter:image:src" content="{logo}">
EOF;
	$metatags = str_replace("{title}", $seo['title'], $metatags);
	$metatags = str_replace("{description}", $seo['description'], $metatags); 
	$metatags = str_replace("{keywords}", $seo['keywords'], $metatags);
	$metatags = str_replace("{logo}", "https://".$_SERVER['HTTP_HOST'].$setting['logo'], $metatags);
	$metatags = str_replace("{url}", "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], $metatags);
	$metatags = str_replace("{twitter}", $setting['twitter_link'], $metatags);
	return $metatags;
}

function get_partial_posts_html($c, $query, $setting) {
	$html = "";
	$post_icons = array();
	$category_results = mysqli_query($c, "SELECT * FROM categories WHERE type = 'blog'") or die(mysql_error());
	while($category = mysqli_fetch_array( $category_results, MYSQL_ASSOC )) { 
		$post_icons[$category['value']] = $category['description'];
	}
	$post_results = mysqli_query($c, $query) or die(mysql_error());
	while($post = mysqli_fetch_array( $post_results, MYSQL_ASSOC )) { 
		$has_photo = ($post['image1'] != "none");
		$site_image = $setting['logo'];
		$post_url = 'https://'.$_SERVER['SERVER_NAME'].'/flava/post/?id='.$post['id'];
		$html .=
		'<div class="partial_post">
			<table style="width:100%;">
				<tr>
					<td class="partial_post_image" style="'.($has_photo ? 'background-image:url(\''.$post['image1'].'\');' : 'height:auto;').'">
					</td>
					<td class="partial_post_content">
						<div class="partial_post_title">
							<table style="width:100%;">
								<tr>
									<td>
										'.$post['title'].'
									</td>
									<td class="partial_post_social_icons">
										<i class="fa fa-facebook partial_post_social_icon" onclick="shareUrlToFacebook(this, \''.$post_url.'\');"></i>
										<a href="https://twitter.com/intent/tweet?text='.urlencode($post['title']).'&url='.$post_url.'&via=100kelvins" target="_blank"><i class="fa fa-twitter partial_post_social_icon"></i></a>
										<a href="https://www.pinterest.com/pin/create/button/?url='.$post_url.'&media=https://'.$_SERVER['SERVER_NAME'].($has_photo ? $post['image1'] : $site_image).'&description='.urlencode($post['title']).'" target="_blank" data-pin-do="buttonPin" data-pin-config="above">
											<i class="fa fa-pinterest partial_post_social_icon"></i>
										</a>
									</td>
								</tr>
							</table>
						</div>
						<div class="partial_post_subtitle">
							'.$post['author'].' &middot;
							<time class="timeago" datetime="'.date(DATE_ISO8601, strtotime($post['date_added'])).'"></time>
						</div>
						<div class="partial_post_preview">
							'.$post['content'].'
							'.($post['type'] == "music" || $post['type'] == "video" ? 
								'<video id="example_video_1" class="video-js vjs-default-skin"
								  controls preload="auto" width="600" height="264"
								  data-setup=\'{"example_option":true}\'
								  source src="'.$post['url'].'" type=\'video/mp4\' />
								 <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
								</video>'
								:
								""
							).'
						</div>
					</td>
				</tr>
			</table>
			<div class="partial_post_footer">
				<div class="partial_post_link" onclick="location.href=\''.$post_url.'\';">view full post&nbsp;<i class="fa fa-arrow-right"></i></div>
			</div>
		</div>
		';
	}
	return $html;
}

function clean_quotes($string) {
	return str_replace('"', '&quot;', $string);
}

function mysqli_result($mysqli, $sql) {
    $result = $mysqli->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}

function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; } 
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}

function check_email($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
↪([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}

?>