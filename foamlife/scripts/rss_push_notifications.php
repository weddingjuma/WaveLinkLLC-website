<?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);

	include 'functions.php';
	$database_connection = connect_to_database();

    process_feed("NikeBlog.com", "http://www.nikeblog.com/category/kicks/foamposites/feed/", $database_connection);
    process_feed("SneakerNews.com", "http://sneakernews.com/category/foamposite/feed/", $database_connection);
    process_feed("KicksOnFire.com", "http://www.kicksonfire.com/category/nike/nike-basketball/nike-foamposite-one/feed/", $database_connection);
    process_feed("SneakerBarDetroit.com", "http://sneakerbardetroit.com/tag/nike-air-foamposite-one/feed/", $database_connection);

    function process_feed($name, $url, $database_connection) {
        try {
            $url_contents = file_get_contents($url);
            $xml_document = new SimpleXmlElement($url_contents);

            if ($xml_document->channel != null && $xml_document->channel->item[0] != null)
            {
                $latest_item = $xml_document->channel->item[0];
                $code = $latest_item->guid;

                if (0 == mysqli_num_rows(mysqli_query($database_connection, "SELECT * FROM `notifications` WHERE code='$code'"))) {
                    $message = $name.": ".$latest_item->title;

                    if (mysqli_query($database_connection, "insert into notifications(code, type, message) values('$code', 'news', '$message')")){
                        echo $code.': '.$message.'<br /><br />';

                        $push_contents = array("en" => $message);
                        $post_fields = array(
                            'app_id' => "6a2513bf-3303-4d5c-bde4-15d9a956be28",
                            'included_segments' => array('All'),
                            //'data' => array("foo" => "bar"),
                            'contents' => $push_contents
                        );
                        $post_fields = json_encode($post_fields);

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic ODVlYjNlMzMtNzNjMS00ZGYwLTk1MTctY2ZlZjFjNWE3MDY2'));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_POST, TRUE);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                        $response = curl_exec($ch);
                        curl_close($ch);

                        $return["allresponses"] = $response;
                        $return = json_encode($return);
                    } else {
                        //echo mysqli_error($database_connection);
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "<br /><br />";
        }
    }
?>
