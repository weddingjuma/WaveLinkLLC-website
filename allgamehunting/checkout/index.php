<?php
    ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/configuration.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/functions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/utility/Mobile_Detect.php';
	$c = connect_to_database();
	$setting = get_settings($c, "SELECT * FROM settings");
	$seo = get_seo($c, "checkout");
	$metatags = build_metatags($seo, $setting);
	$detect = new Mobile_Detect;
    $baseURL = (strpos($_SERVER['SERVER_PROTOCOL'], "HTTPS") === false ? "http" : "https")."://".$_SERVER['SERVER_NAME'].str_replace('\\', '/', str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		echo $metatags;
		include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/css/main.php';
	?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/header.php'; ?>
    <div class="products" style="background-image:url('/allgamehunting/images/background5.jpg');">
        <div class="container">
            <div class="row product">
                <div class="col-xs-12 col-md-12 product_information">
                    <div class="product_title">
                        Checkout
                    </div>
                    <div class="product_description">
                        <?php
                        $cart = "";
                        if(isset($_SESSION['cart_items'])) {
                            $cart_items = json_decode($_SESSION['cart_items'], true);
                            $query = "SELECT * FROM `products`";
                            $ids = array();
                            for($i = 0; $i < count($cart_items); $i++) {
                                $cart_item = $cart_items[$i];
                                array_push($ids, "id = ".$cart_item["id"]);
                            }
                            if(count($cart_items) > 0) {
                                $query .= " WHERE ".implode(" OR ", $ids);
                            } else {
                                $query .= " WHERE id=0";
                                $cart .= "<div class=\"cart_item_table\"><i>No items in cart.</i></div>";
                            }
                            $total = 0.00;
                            $result = mysqli_query($c, $query) or die(mysql_error());
                            while($product = mysqli_fetch_array( $result, MYSQL_ASSOC )) {
                                $index = 0;
                                foreach($cart_items as $key => $cart_item)
                                {
                                    if($cart_item["id"] == $product['id']) {
                                        $index = $key;
                                    }
                                }
                                $type = "";
                                if(($product["type1"] <> "" && $product["type1"] <> "none") || ($product["type2"] <> "" && $product["type2"] <> "none") || ($product["type3"] <> "" && $product["type3"] <> "none") || ($product["type4"] <> "" && $product["type4"] <> "none") ||
                                   ($product["type5"] <> "" && $product["type5"] <> "none") || ($product["type6"] <> "" && $product["type6"] <> "none") || ($product["type7"] <> "" && $product["type7"] <> "none") || ($product["type8"] <> "" && $product["type8"] <> "none")) {
                                    $type =
                                    "<select id=\"cart_item_type_".$product["id"]."\" class=\"cart_item_type\" onchange=\"update_cart_item(".$product['id'].");\">
                                        ".($product["type1"] <> "" && $product["type1"] <> "none" ? "<option value=\"".$product["type1"]."\" ".($product["type1"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type1"]."&nbsp;&#9660;</option>" : "")."
                                        ".($product["type2"] <> "" && $product["type2"] <> "none" ? "<option value=\"".$product["type2"]."\" ".($product["type2"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type2"]."&nbsp;&#9660;</option>" : "")."
                                        ".($product["type3"] <> "" && $product["type3"] <> "none" ? "<option value=\"".$product["type3"]."\" ".($product["type3"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type3"]."&nbsp;&#9660;</option>" : "")."
                                        ".($product["type4"] <> "" && $product["type4"] <> "none" ? "<option value=\"".$product["type4"]."\" ".($product["type4"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type4"]."&nbsp;&#9660;</option>" : "")."
                                        ".($product["type5"] <> "" && $product["type5"] <> "none" ? "<option value=\"".$product["type5"]."\" ".($product["type5"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type5"]."&nbsp;&#9660;</option>" : "")."
                                        ".($product["type6"] <> "" && $product["type6"] <> "none" ? "<option value=\"".$product["type6"]."\" ".($product["type6"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type6"]."&nbsp;&#9660;</option>" : "")."
                                        ".($product["type7"] <> "" && $product["type7"] <> "none" ? "<option value=\"".$product["type7"]."\" ".($product["type7"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type7"]."&nbsp;&#9660;</option>" : "")."
                                        ".($product["type8"] <> "" && $product["type8"] <> "none" ? "<option value=\"".$product["type8"]."\" ".($product["type8"] == $cart_items[$index]["type"] ? "selected" : "").">".$product["type8"]."&nbsp;&#9660;</option>" : "")."
                                    </select>";
                                }
                                $cart .=
                                "<table class=\"cart_item_table\">
                                    <tr>
                                        <td class=\"cart_item_img_td\" style=\"background-image:url('http://".$_SERVER['SERVER_NAME'].'/allgamehunting'.$product['image1']."');\"></td>
                                        <td class=\"cart_item_info_td\">
                                            <input id=\"cart_item_quantity_".$product["id"]."\" class=\"cart_item_quantity\" onkeydown=\"highlight_cart_item_update_td(".$product['id'].");\" type=\"text\" value=\"".$cart_items[$index]["quantity"]."\" /> x <i>".$product['title']."</i><br />
                                            $".(($product['on_sale'] == "no" ? $product['price'] : $product['sale_price']) * $cart_items[$index]["quantity"])."	".($type <> "" ? " &middot; ".$type : "")."
                                        </td>
                                        <td class=\"cart_item_update_td\" onclick=\"update_item(".$product['id'].");\"><i class=\"fa fa-retweet\"></i></td>
                                        <td class=\"item_remove_td\" onclick=\"remove_item(".$product['id'].");\"><i class=\"fa fa-times\"></i></td>
                                    </tr>
                                </table>";
                                if($product['on_sale'] == "no") {
                                    $total = $total + $product["price"] * $cart_items[$index]["quantity"];
                                } else {
                                    $total = $total + $product["sale_price"] * $cart_items[$index]["quantity"];
                                }
                            }
                            if(count($cart_items) > 0) {
                                $cart .=
                                "<div class=\"cart_total_div\">
                                    SUB-TOTAL
                                    <div style=\"float:right;\">$".round($total, 2)."</div>
                                </div>";
                            }
                        } else {
                            $cart .= "<div class=\"cart_item_table\"><i>No items in cart.</i></div>";
                        }
                        echo $cart;
                        ?>
                    </div>
                    <form id="order_form" method="post" action="submit.php">
                        <div class="row" style="margin: none;">
                            <div class="col-xs-12 col-md-6 contact_container">
                                <input class="contact_textbox" type="text" name="first_name" placeholder="First Name" />
                            </div>
                            <div class="col-xs-12 col-md-6 contact_container">
                                <input class="contact_textbox" type="text" name="last_name" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="row" style="margin: none;">
                            <div class="col-xs-12 col-md-6 contact_container">
                                <input id="email_address" class="contact_textbox" type="text" name="email_address" placeholder="Email Address" />
                            </div>
                            <div class="col-xs-12 col-md-6 contact_container">
                                <input class="contact_textbox" type="text" name="email_address_confirm" placeholder="Email Address (Confirm)" />
                            </div>
                        </div>
                        <div class="row" style="margin: none;">
                            <div class="col-xs-12 col-md-6 contact_container">
                                <input class="contact_textbox" type="text" name="phone_number" placeholder="Phone Number" />
                            </div>
                        </div>
                        <div class="row" style="margin: none;">
                            <div class="col-xs-12 col-md-6 contact_container">
                                <input class="contact_textbox" type="text" name="mailing_address_1" placeholder="Mailing Address" />
                            </div>
                            <div class="col-xs-12 col-md-6 contact_container">
                                <input class="contact_textbox" type="text" name="mailing_address_2" placeholder="Mailing Address (Cont.)" />
                            </div>
                        </div>
                        <div class="row" style="margin: none;">
                            <div class="col-xs-5 col-md-5 contact_container">
                                <input class="contact_textbox" type="text" name="city" placeholder="City" />
                            </div>
                            <div class="col-xs-3 col-md-3 contact_container">
                                <input class="contact_textbox" type="text" name="state" placeholder="State" />
                            </div>
                            <div class="col-xs-4 col-md-4 contact_container">
                                <input class="contact_textbox" type="text" name="zip_code" placeholder="ZIP Code" />
                            </div>
                        </div>
                        <div class="row" style="margin: none;">
                            <div class="col-xs-12 col-md-12 contact_container">
                                <input class="contact_textbox" type="text" name="notes" placeholder="Special Requests" />
                            </div>
                        </div>
                        <div class="row" style="margin: none;">
                            <div class="col-xs-12 col-md-12 contact_container">
                                <div class="contact_note">
                                    <input type="checkbox" name="is_subscribed" checked />&nbsp;&nbsp;Join our email list
                                </div>
                                <div class="contact_note">
                                    <input type="checkbox" name="is_agreed" />&nbsp;&nbsp;By checking this box, you agree to our <a href="">terms and conditions</a>
                                </div>
                            </div>
                        </div>
                        <button class="buy_button">Submit Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/footer.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/allgamehunting/js/main.php'; ?>
    <script>
        $("#order_form").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email_address: {
                    required: true,
                    email: true
                },
                email_address_confirm: {
                    equalTo: "#email_address"
                },
                phone_number: {
                    required: true,
                    digits: true
                },
                mailing_address_1: {
                    required: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                zip_code: {
                    required: true,
                    digits: true
                },
                is_agreed: {
                    required: true
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
		});

        function add_item(product_id, quantity, type) {
            $.post("http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/utility/cart/add_cart_item.php", { product_id: product_id, quantity: quantity, type: type } )
                .done(function( data ) {
                    location.reload();
                })
                .fail(function() {
                    alert("There was an network error. Please try again.");
                });
        }

        function remove_item(product_id) {
            $.post("http://<?php echo $_SERVER['SERVER_NAME']; ?>/allgamehunting/utility/cart/remove_cart_item.php", { product_id: product_id } )
                .done(function( data ) {
                    location.reload();
                })
                .fail(function( data ) {
                    alert("There was an network error. Please try again." + data.status);
                });
        }

        function update_item(product_id) {
            var quantity = $("#cart_item_quantity_" + product_id).val();
            var type = $("#cart_item_type_" + product_id).val(); if(!type) { type = ""; }
            add_item(product_id, quantity, type);
        }
	</script>
</body>
</html>
