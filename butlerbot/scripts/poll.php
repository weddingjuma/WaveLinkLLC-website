<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

	include '../common.php';
	$database_connection = connect_to_database();

    $data = mysqli_query($database_connection, "SELECT * FROM users") or die(mysqli_error($database_connection));

	while ($record = mysqli_fetch_array($data, MYSQL_ASSOC)) {
		try {
            echo 'USER: '.$record['id'].' | NAME: '.$record['first_name'].' '.$record['last_name'].'<br /><br />';

            $post_fields = array(
                'app_id' => "5759cafb-f45e-4833-a7a3-71826a03430b",
                'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => $record['id'])),
                //'data' => array("foo" => "bar"),
                'content_available' => true
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

            $response = curl_exec($ch);
            curl_close($ch);

            $return["allresponses"] = $response;
            $return = json_encode($return);

            print("\n\nJSON received:\n");
	        print($return);
	        print("\n");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "<br /><br />";
        }
	}
?>
