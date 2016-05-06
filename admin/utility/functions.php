<?php

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 $pageURL=substr($pageURL, 0, strrpos($pageURL, '/')+1);
 return $pageURL;
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

function get_device(){
	//Detect special conditions devices
	$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
	$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
	
	$device;
	//do something with this information
	if( $iPod || $iPhone ){
			//were an iPhone/iPod touch -- do something here
			$device = "iOS"; return $device;
	}else if($iPad){
			//were an iPad -- do something here
			$device = "iOS"; return $device;
	}else if($Android){
			//were an Android device -- do something here
			$device = "Android"; return $device;
	}else if($webOS){
			//were a webOS device -- do something here
			$device = "Android"; return $device;
	}else{
			$device = "Android"; return $device;
	}
}

function send_admin_emails($subject, $body) {
	//Send emails to Wave Link admin
	$headers = 'From: Wave Link <notifications@wavelinkllc.com>' . "\r\n";
	$to = "aadams@wavelinkllc.com";
	if (mail($to, $subject, $body, $headers)) { } else { }
	$to = "bjackson@wavelinkllc.com";
	if (mail($to, $subject, $body, $headers)) { } else { }
	$to = "dclark@wavelinkllc.com";
	if (mail($to, $subject, $body, $headers)) { } else { }
	$to = "kgraddick@wavelinkllc.com";
	if (mail($to, $subject, $body, $headers)) { } else { }
	$to = "kelvingraddick@gmail.com";
	if (mail($to, $subject, $body, $headers)) { } else { }
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

?>

