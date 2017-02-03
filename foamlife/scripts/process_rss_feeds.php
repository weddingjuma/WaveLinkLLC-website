<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

	include 'functions.php';
	$database_connection = connect_to_database();

    process_feed("NikeBlog.com", "https://s11.postimg.org/bwubtgaj7/nike_blog_logo.png", "http://www.nikeblog.com/category/kicks/foamposites/feed/", $database_connection);
    process_feed("SneakerNews.com", "https://s15.postimg.org/8q50sxpsr/tag_box_img.png", "http://sneakernews.com/category/foamposite/feed/", $database_connection);
    process_feed("KicksOnFire.com", "https://s11.postimg.org/vvb0nfyyb/header_logo.png", "http://www.kicksonfire.com/category/nike/nike-basketball/nike-foamposite-one/feed/", $database_connection);
    process_feed("SneakerBarDetroit.com", "https://s22.postimg.org/a4dz6dtq9/sbd.png", "http://sneakerbardetroit.com/tag/nike-air-foamposite-one/feed/", $database_connection);

    function process_feed($author, $author_image_url, $url, $database_connection) {
        try {
            $url_contents = file_get_contents($url);
            $xml_document = new SimpleXmlElement($url_contents);
            if ($xml_document->channel != null && $xml_document->channel->item != null)
            {
                $items = $xml_document->channel->item;
                foreach ($items as $item)
                {
                    $code = $item->guid;
                    if (0 == mysqli_num_rows(mysqli_query($database_connection, "SELECT * FROM `news` WHERE code='$code'"))) {
                        $title = $item->title;
                        $link = $item->link;
                        $description = $item->description;
                        $content = $item->children('content', true)->encoded;
                        str_replace("src=\"https://www.youtube.com", "", $content);
			            str_replace("script src", "", $content);
			            str_replace("async src", "", $content);
                        $imageSourceStartIndex = strpos($content, " src");
                        if ($imageSourceStartIndex != -1) $imageSourceStartIndex += 6;
                        $imageSourceEndIndex = strpos($content, ".jpg");
                        if ($imageSourceEndIndex != -1 && $imageSourceEndIndex - $imageSourceStartIndex < 250)
                        {
                            $imageSourceEndIndex += 4;
                        }
                        else
                        {
                            $imageSourceEndIndex = strpos($content, ".png");
                            if ($imageSourceEndIndex != -1) $imageSourceEndIndex += 4;
                        }
                        $length = $imageSourceEndIndex - $imageSourceStartIndex;
                        $cover_image_url = $length > 0 ? substr($content, $imageSourceStartIndex, $length) : null;
                        $timestamp = strftime("%Y-%m-%d %H:%M:%S", strtotime($item->pubDate));

                        if (mysqli_query($database_connection, "insert into news(code, title, author, author_image_url, link, description, cover_image_url, timestamp)
                                                                values('$code', '$title', '$author', '$author_image_url', '$link', '$description', '$cover_image_url', '$timestamp')")){
                            $notification_message = $author.": ".$title;
                            echo $code.': '.$notification_message.'<br /><br />';

                            $push_contents = array("en" => $notification_message);
                            $post_fields = array(
                                'app_id' => "6a2513bf-3303-4d5c-bde4-15d9a956be28",
                                'included_segments' => array('Testing Users'),
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

                            //$response = curl_exec($ch);
                            //curl_close($ch);

                            //$return["allresponses"] = $response;
                            //$return = json_encode($return);
                        } else {
                            echo mysqli_error($database_connection);
                        }
                    }
                    else
                    {
                        break; // stop looping through items when found in DB
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "<br /><br />";
        }
    }
?>
