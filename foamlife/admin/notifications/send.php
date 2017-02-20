<?php
    include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/authentication.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/foamlife/admin/utility/functions.php';
	$database_connection = connect_to_database();

    $text = $_POST['text'];
    $url = $_POST['url'];

    $content = array(
        "en" => $text
    );

    $fields = array(
        'app_id' => "6a2513bf-3303-4d5c-bde4-15d9a956be28",
        'included_segments' => array('Testing Users'), // 'All', 'Testing Users'
        'data' => array("url" => "$url"),
        'contents' => $content
    );

    $fields = json_encode($fields);
    // print("\nJSON sent:\n");
    // print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                               'Authorization: Basic ODVlYjNlMzMtNzNjMS00ZGYwLTk1MTctY2ZlZjFjNWE3MDY2'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

	$return["allresponses"] = $response;
	$return = json_encode($return);

    echo "The message '".$text."' was sent!";
?>
