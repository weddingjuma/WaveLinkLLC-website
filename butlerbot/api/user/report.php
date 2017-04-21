<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include '../../common.php';
	$database_connection = connect_to_database();

    $POST = json_decode(trim(file_get_contents("php://input")), true);
    $user_id = $POST['user_id'];
    $wifi_connected = $POST['wifi_connected'];
    $longitude = $POST['longitude'];
    $latitude = $POST['latitude'];

    $response = array();

    $user = mysqli_fetch_assoc(mysqli_query($database_connection, "SELECT * FROM users WHERE id=$user_id LIMIT 1"));
	if ($user =! null) {
        if ($wifi_connected == false) {
            $locations = mysqli_query($database_connection, "SELECT * FROM locations WHERE user_id=$user_id") or die(mysqli_error($database_connection));
            while ($location = mysqli_fetch_array($locations, MYSQL_ASSOC)) {
                if (50 > distance($location['latitude'], $location['longitude'], $latitude, $longitude)) {
                    $content = array(
                        "en" => "Hello! You are currently at your ".$location['name']." location; please get on the Wi-Fi network!"
                    );
                    $post_fields = array(
                        'app_id' => "5759cafb-f45e-4833-a7a3-71826a03430b",
                        'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => $location['user_id'])),
                        'contents' => $content
                        //'data' => array("foo" => "bar")
                    );
                    $post_fields = json_encode($post_fields);

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic OTY5OWQwMGItMDBiZC00NzA2LWFkZjgtMDViYzg0NDc3ZDU3'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                    curl_setopt($ch, CURLOPT_POST, TRUE);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                    $result = curl_exec($ch);
                    curl_close($ch);

                    $return["allresponses"] = $result;
                    $return = json_encode($return);

                    //print("\n\nJSON received:\n");
                    //print($return);
                    //print("\n");
                }
            }
        }

        if (mysqli_query($database_connection, "UPDATE users SET last_poll_time = NOW()".($wifi_connected == true ? ", last_wifi_on_time = NOW()" : "")." WHERE id = $user_id")) { }
            else { echo "\ndb error: ".mysqli_error($database_connection); }

		$response['success'] = true;
	} else {
		$response['success'] = false;
        $response['error_code'] = $ERROR_CODES['INVALID_CREDENTIALS'];
	}

	echo json_encode($response);

    function distance($lat1, $lon1, $lat2, $lon2) {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);
      return ($miles * 1.609344) * 1000;
    }
?>
