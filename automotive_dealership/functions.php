<?php
	function connect_to_database() {
		$host="localhost"; // Host name 
		$username="application"; // Mysql username 
		$password="wavelink2014"; // Mysql password 
		$db_name="automotive_dealership"; // Database name 
		// Connect to server and select databse.
		$c = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 
		mysqli_set_charset($c, "utf8mb4");
		return $c;
	}
	
	function update_devices($db_connection, $userId, $iOSdeviceToken, $androidDeviceToken) {
		// update iOS device id
		if($iOSdeviceToken <> ""){
			$result = @mysqli_query($db_connection, "DELETE FROM devices WHERE token='$iOSdeviceToken' AND type='ios'");
			$result = @mysqli_query($db_connection, "INSERT INTO devices (userId, token, type) VALUES ('$userId', '$iOSdeviceToken', 'ios')");
		}
		// update android device id
		if($androidDeviceToken <> ""){
			$result = @mysqli_query($db_connection, "DELETE FROM devices WHERE token='$androidDeviceToken' AND type='android'");
			$result = @mysqli_query($db_connection, "INSERT INTO devices (userId, token, type) VALUES ('$userId', '$androidDeviceToken', 'android')");
		}
	}
	
	function remove_devices($db_connection, $iOSdeviceToken, $androidDeviceToken) {
		// remove iOS device id
		if($iOSdeviceToken <> ""){
			$result = @mysqli_query($db_connection, "DELETE FROM devices WHERE token='$iOSdeviceToken' AND type='ios'");
		}
		// remove android device id
		if($androidDeviceToken <> ""){
			$result = @mysqli_query($db_connection, "DELETE FROM devices WHERE token='$androidDeviceToken' AND type='android'");
		}
	}
	
	function csv_to_array($filename) {
		$array = $fields = array(); $i = 0;
		$handle = @fopen($filename, "r");
		if ($handle) {
		    while (($row = fgetcsv($handle)) !== false) {
		        if (empty($fields)) {
		            $fields = $row;
		            continue;
		        }
		        foreach ($row as $k=>$value) {
		        	$array[$i][trim($fields[$k])] = trim($value);
		        }
		        $i++;
		    }
		    if (!feof($handle)) {
		        echo "Error: failed to open file.\n";
		    }
		    fclose($handle);
		}
		return $array;
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
	
	function get_settings($c, $sql) {
		$settings = mysqli_query($c, "SELECT * FROM settings");
		if (!$settings) { echo 'Could not load settings data.'; exit; }
		$setting = array(); 
		while($row = mysqli_fetch_assoc($settings)) { 
			$setting[$row['code']] = $row['value']; 
		}
		return $setting;
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
?>