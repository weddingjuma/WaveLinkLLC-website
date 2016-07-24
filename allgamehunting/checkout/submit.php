<?php
    session_start();
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/phpmailer/class.phpmailer.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");

	$first_name = str_replace(',', '', addslashes($_POST['first_name']));
	$last_name = str_replace(',', '', addslashes($_POST['last_name']));
	$email_address = $_POST['email_address'];
	$phone_number = $_POST['phone_number'];
    $mailing_address_1 = str_replace(',', '', addslashes($_POST['mailing_address_1']));
    $mailing_address_2 = str_replace(',', '', addslashes($_POST['mailing_address_2']));
    $city = str_replace(',', '', addslashes($_POST['city']));
    $state = str_replace(',', '', addslashes($_POST['state']));
    $zip_code = $_POST['zip_code'];
	$notes = str_replace(',', '', addslashes($_POST['notes']));
    $is_subscribed = isset($_POST['is_subscribed']) && $_POST['is_subscribed'];
    $total = 0.00;
    $invoice = "";

    $cart_items = json_decode($_SESSION['cart_items'], true);
    $query = "SELECT * FROM `products`";
    $ids = array();
    for ($i = 0; $i < count($cart_items); $i++) {
        $cart_item = $cart_items[$i];
        array_push($ids, "id = ".$cart_item["id"]);
    }
    if (count($cart_items) > 0) {
        $query .= " WHERE ".implode(" OR ", $ids);
    } else {
        $query .= " WHERE id=0";
    }

    $result = mysqli_query($c, $query) or die(mysql_error());
    while ($product = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        $index = 0;
        foreach ($cart_items as $key => $cart_item) {
            if($cart_item["id"] == $product['id']) {
                $index = $key;
            }
        }

        $types = "";
        if ($product["type1"] <> "" && $product["type1"] <> "none") { $types .= " (".$product['type1'].")"; }
        if ($product["type2"] <> "" && $product["type2"] <> "none") { $types .= " (".$product['type2'].")"; }
        if ($product["type3"] <> "" && $product["type3"] <> "none") { $types .= " (".$product['type3'].")"; }
        if ($product["type4"] <> "" && $product["type4"] <> "none") { $types .= " (".$product['type4'].")"; }
        if ($product["type5"] <> "" && $product["type5"] <> "none") { $types .= " (".$product['type5'].")"; }
        if ($product["type6"] <> "" && $product["type6"] <> "none") { $types .= " (".$product['type6'].")"; }
        if ($product["type7"] <> "" && $product["type7"] <> "none") { $types .= " (".$product['type7'].")"; }
        if ($product["type8"] <> "" && $product["type8"] <> "none") { $types .= " (".$product['type8'].")"; }

        $price = 0.00;
        if ($product['on_sale'] == "no") {
            $price = $product["price"] * $cart_items[$index]["quantity"];
        } else {
            $price = $product["sale_price"] * $cart_items[$index]["quantity"];
        }

        $total .= $price;
        $invoice .= str_replace(',', '', "Product ID: ".$product["id"]." | Name: ".$product['title']." |".($types <> "" ? " Types: ".$types." |" : "")." Quantity: ".$cart_items[$index]["quantity"]." | Price: $".$price." | ");
    }
    $total = round($total, 2);

    if (mysqli_query($c, "INSERT INTO orders
                          (first_name, last_name, email_address, phone_number, mailing_address_1, mailing_address_2, city, state, zip_code, invoice, notes, total)
                          VALUES ('$first_name', '$last_name', '$email_address', '$phone_number', '$mailing_address_1', '$mailing_address_2', '$city', '$state', '$zip_code', '$invoice', '$notes', '$total')")) {
        $file_path = "../orders/".date("Y-n-j").".csv";
        $is_new_file = !file_exists($file_path);
        $file = fopen($file_path, "a");
        if ($is_new_file) { fputcsv($file, ['Order ID', 'First Name', 'Last Name', 'Email Address', 'Phone Number', 'Mailing Address 1', 'Mailing Address 2', 'City', 'State', 'ZIP Code', 'Invoice', 'Notes', 'Total']); }
        fputcsv($file, [mysqli_insert_id($c), $first_name, $last_name, $email_address, $phone_number, $mailing_address_1, $mailing_address_2, $city, $state, $zip_code, $invoice, $notes, $total]);
        fclose($file);
    }

    $subject = "New order for ".$site_name;
    $body = "First Name: ".$first_name."<br />
             Last Name: ".$last_name."<br />
             Email Address: ".$email_address."<br />
             Phone Number: ".$phone_number."<br />
             Mailing Address: ".$mailing_address_1."<br />
             Mailing Address (Cont.): ".$mailing_address_2."<br />
             City: ".$city."<br />
             State: ".$state."<br />
             ZIP Code: ".$zip_code."<br />
             Invoice: ".$invoice."<br />
             Notes: ".$notes."<br />
             Email List Opt-In: ".($is_subscribed == 1 ? "Yes" : "No")."<br />
             Total: $".$total;
    //send_email($setting['email'], $subject, $body);
    send_email('kelvingraddick+allgamehunting@gmail.com', $subject, $body);

    if ($is_subscribed == 1) {
        if (!mysqli_num_rows(mysqli_query($c, "SELECT email FROM users WHERE email = '$email_address'"))) {
            if (mysqli_query($c, "INSERT INTO users (first_name, last_name, email, phone, description) VALUES ('$first_name', '$last_name', '$email_address', '$phone_number', '$notes')")) { } else { }
        } else {
            if (mysqli_query($c, "UPDATE users SET first_name = '$first_name', last_name = '$last_name', phone = '$phone_number', description = '$notes' WHERE email = '$email_address'")) { } else { }
        }

        $subject = "New email subscription for ".$site_name;
        $body = "First Name: ".$first_name."<br />
                 Last Name: ".$last_name."<br />
                 Email Address: ".$email_address."<br />
                 Phone Number: ".$phone_number."<br />
                 Notes: ".$notes;
        //send_email($setting['email'], $subject, $body);
        send_email('kelvingraddick+allgamehunting@gmail.com', $subject, $body);
    }

    header("Location: success.php");

    function send_email($email_address, $subject, $body) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->FromName = 'All Game Hunting';
        $mail->Username = "aghnotifications@gmail.com";
        $mail->Password = "AllGameHunting2016";

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AddAddress($email_address);
        //$mail->AddBCC("aadams@wavelinkllc.com");
        //$mail->AddBCC("kgraddick@wavelinkllc.com");
        //$mail->AddBCC("dclark@wavelinkllc.com");
        $mail->send();
    }
?>
