<?php
    $ERROR_CODES = array(
        "NONE" => 0,
        "SERVER_PROBLEM" => 1,
        "DATABASE_PROBLEM" => 2,
        "EMAIL_TAKEN" => 3,
        "PHONE_TAKEN" => 4,
        "INVALID_CREDENTIALS" => 5
    );

	function connect_to_database() {
		$host = "localhost";
		$username = "application";
		$password = "wavelink2014";
		$database_name = "property_management";
		$database_connection = mysqli_connect("$host", "$username", "$password", "$database_name")or die("Cannot connect to database.");
		mysqli_set_charset($database_connection, "utf8mb4");
		return $database_connection;
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
