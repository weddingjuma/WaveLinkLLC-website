<?php
	function connect_to_database() {
		$host = "localhost";
		$username = "application";
		$password = "wavelink2014";
		$database_name = "foamlife";
		$database_connection = mysqli_connect("$host", "$username", "$password", "$database_name")or die("Cannot connect to database.");
		mysqli_set_charset($database_connection, "utf8mb4");
		return $database_connection;
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
