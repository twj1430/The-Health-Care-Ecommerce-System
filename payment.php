<?php
include("db.php");
$v_amount = 0;
$all_total = 0;
$shpping_total = 0;
date_default_timezone_set('Asia/Kuala_Lumpur');

$post_url = "./payment.php";

// ***Integration Credentials ******//
// Please replace your integration credentials
// Please refer to the email title of 'Pay [User Account]  User Credentials'
$CID = 'M161-U-20382';
$signatureKey = 'V8vONipKXMdaiNR';
//**********************************//
$returnurl = 'http://localhost/ecommerce/successful.php';
$callbackurl = 'http://localhost/ecommerce/index.php';
//**********************************//


if (isset($_POST['send'])) {
    // if (isset($_POST['HostToHost'])) {
    //     $post_url = "https://api-staging.pay.asia/api/payment/submit";
    // // } else {
    // if ($post_url != "https://api-staging.pay.asia/api/paymentform.aspx") {

    //     if (isset($_SESSION['checkout']) && !empty($_SESSION['checkout'])) {
    //         foreach ($_SESSION['cart_item'] as [
    //             "product_id" => $product_id,
    //             "product_quantity" => $product_quantity,
    //             "cart_total_price" => $cart_total_price
    //         ]) {
    //             $cookie_product_id[] = $product_id;
    //             $cookie_quantity[] = $product_quantity;
    //             $cookie_price[] = $cart_total_price;
    //         }
    //     } else {
    //         foreach ($_SESSION['cart_item'] as [
    //             "product_id" => $product_id,
    //             "product_quantity" => $product_quantity,
    //             "cart_total_price" => $cart_total_price
    //         ]) {
    //             if ($product_id == $_SESSION['item']) {
    //                 $cookie_product_id[] = $product_id;
    //                 $cookie_quantity[] = $product_quantity;
    //                 $cookie_price[] = $cart_total_price;
    //             }
    //         }
    //     }

    //     if (!isset($_COOKIE['cookie_product_id'])) {
    //         setcookie('cookie_product_id', json_encode($cookie_product_id), time() + (86400 * 365));
    //         setcookie('cookie_quantity', json_encode($cookie_quantity), time() + (86400 * 365));
    //         setcookie('cookie_price', json_encode($cookie_price), time() + (86400 * 365));

    //         $cookie = $_COOKIE['cookie_product_id'];
    //         $cookie = stripslashes($cookie);
    //         $savedProductArray = json_decode($cookie, true);
    //         foreach ($_COOKIE['cookie_product_id'] as $value) {
    //             echo $value;
    //         }
    //     } else {
    //         $cookie = $_COOKIE['cookie_product_id'];
    //         $cookie = stripslashes($cookie);
    //         $savedProductArray = json_decode($cookie, true);
    //         foreach ($savedProductArray as $value) {
    //             echo $value;
    //         }
    //     }
    // }

    $post_url = "https://api-staging.pay.asia/api/paymentform.aspx";
    // }

    $_SESSION['amount'] = trim($_POST['v_currency']) . " " . trim($_POST['v_amount']);
    $_SESSION['v_amount'] = trim($_POST['v_amount']);
    $_SESSION['cart_id'] = trim($_POST['v_cartid']);
    $post = array(
        'version' => !empty($_POST['version']) ? htmlentities($_POST['version']) : '1.5.4',
        'v_currency' => trim($_POST['v_currency']),
        'v_amount' => trim($_POST['v_amount']),
        'v_firstname' => trim($_POST['v_firstname']),
        'v_billemail' => trim($_POST['v_billemail']),
        'v_billphone' => trim($_POST['v_billphone']),
        'CID' => !($_POST['CID'] == 'M161-U-20382') ? htmlentities($_POST['CID']) : $CID,
        'signature' => '',
        'v_cartid' => trim($_POST['v_cartid']),
        'returnurl' => !empty($_POST['returnurl']) ? htmlentities($_POST['returnurl']) : $returnurl,
        'callbackurl' => !empty($_POST['callbackurl']) ? htmlentities($_POST['callbackurl']) : $callbackurl
    );

    // $signatureKey = !empty($_POST['signatureKey']) ? htmlentities($_POST['signatureKey']):$signatureKey;

    $signature_arr = array(
        $signatureKey,
        $post['CID'],
        $post['v_cartid'],
        number_format($_POST['v_amount'], 2, '', ''),
        $post['v_currency']
    );

    $post['signature'] = hash('sha512', strtoupper(implode(";", $signature_arr)));
    $_SESSION['successful'] = "successful";
}

//################################################ RETURN ##########################################################

// GET Method
//html form post

//Return URLs are URLs on your website. They are used to redirect your customer to inform him about the state of the order.
//Merchant should not rely on the status return from web-to-web response, should rely the status on callbackurl
function return_url()
{
    $order = $_GET['cartid'];
    $paymentStatus = $_GET['status'];

    $RedirectPage = "";

    if ($paymentStatus == "88 - Transferred") {
        $RedirectPage = "http://localhost/ecommerce/successful.php";
    } else if ($paymentStatus == "66 - Failed") {
        $RedirectPage = "http://localhost/ecommerce/index.php";
    } else {
        $RedirectPage = "http://localhost/ecommerce/index.php";
    }

    header('Location: ' . $RedirectPage, true, 301);
    exit();
}

//################################################ CALLBACK ##########################################################

//POST Method
//cURL to your provided URL with the final status when the transaction completed

//The callback URL is a URL on your server.
//The URL will be used to indicate that the status of one of your orders has changed. 
//If a status has changed, our system will call your callback URL on your server. 
//We'll send a notify response. You'll then be able to retrieve the new status.

function callback_url()
{
    //user integrate signature key
    $signature_key = "V8vONipKXMdaiNR";

    $self_sign = hash('sha512', strtoupper(
        $signature_key . ";"
            . $_POST['CID'] . ";"
            . $_POST['POID'] . ";"
            . $_POST['cartid'] . ";"
            . str_replace(".", "", $_POST['amount']) . ";"
            . $_POST['currency'] . ";"
            . $_POST['status']
    ));

    $orderId = $_POST(['cartid']);

    if ($self_sign != $_POST['signature']) {
        //log error 
        //The signature used to authenticate the request is created from the requester, which enables you to check the identity of the person who sends the request.
        exit();
    }

    //gkash response status
    $paymentStatus = $_POST['status'];

    //your product status
    $orderStatus = "pending";

    if ($paymentStatus == "88 - Transferred") {
        $orderStatus = "success";
    } else if ($paymentStatus == "66 - Failed") {
        $orderStatus = "failed";
    }

    //Update your product status here before return "OK"
    //i.e: UpdateStatus($orderStatus,$orderId);

    echo 'OK';
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="assets/images/Logo.jpg" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THC</title>

    <style>
        body {
            padding-top: 83px;
            /* background: rgb(250, 250, 250) !important; */
        }

        .btn-group-lg>.btn,
        .btn-lg {
            padding-left: 15px !important;
            padding-right: 15px !important;
            font-size: 1rem !important;
        }
    </style>
</head>


<?php include("header.php") ?>

<section id="cart_section">

    <body>
        <form class="form-horizontal" name="form" method="post" id="payment" action="<?php echo $post_url; ?>"></form>
        <input name="signature" type="hidden" value="<?php echo !empty($post['signature']) ? htmlentities($post['signature']) : ''; ?>" form="payment" />

        <a href="cart.php" class="btn btn-dark checkout_back"><i class="bi bi-arrow-left"></i> BACK</a>
        <div class="row" style="margin-left:0;margin-right:0">

            <div class="col-lg-6 offset-lg-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 py-5">
                            <span style="color:#5FA870">Information</span> >
                            <span style="color:#5FA870">Shipping</span> >
                            <b>Payment</b>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table ">
                                        <tbody>
                                            <?php
                                            $_SESSION['email_or_phone'];
                                            function validateemail($email)
                                            {
                                                $check = strrpos($email, '@');
                                                if ($check == false) {
                                                    return false;
                                                } else {
                                                    return true;
                                                }
                                            }

                                            function validatephone($phone)
                                            {
                                                if (!preg_match("/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/", $phone)) {
                                                    return false;
                                                } else {
                                                    return true;
                                                }
                                            }



                                            if (validateemail($_SESSION['email_or_phone'])) {
                                            ?>
                                                <tr>
                                                    <td style="color:silver">Email</td>
                                                    <td><?php echo $_SESSION['email_or_phone'] ?></td>
                                                    <td class="text-right text-primary"><a href="checkout.php?change=change">Change</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:silver">Ship to</td>
                                                    <td><?php echo $_SESSION['address'] ?>, <?php echo $_SESSION['post_code'] . '&nbsp;' . $_SESSION['city'] ?>, <?php echo $_SESSION['state']  . '&nbsp;' . $_SESSION['country'] ?></td>
                                                    <td class="text-right text-primary"><a href="checkout.php?change=change">Change</a></td>
                                                </tr>
                                                <?php
                                                $sqli = "SELECT * FROM shipping_method where shipping_id='" . $_SESSION['shipping_method'] . "'";
                                                $run = $conn->query($sqli) or die($conn->error . __LINE__);

                                                if ($run->num_rows > 0) {
                                                    while ($row1 = $run->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td style="color:silver">Method</td>
                                                            <td><?php echo $row1['shipping_name'] ?></td>
                                                            <td class="text-right text-primary"></td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td style="color:silver">Contact</td>
                                                    <td><?php echo $_SESSION['email_or_phone'] ?></td>
                                                    <td class="text-right text-primary"><a href="checkout.php?change=change">Change</a></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:silver">Ship to</td>
                                                    <td><?php echo $_SESSION['address'] ?>, <?php echo $_SESSION['post_code'] . '&nbsp;' . $_SESSION['city'] ?>, <?php echo $_SESSION['state'] . '&nbsp;' . $_SESSION['country'] ?></td>
                                                    <td class="text-right text-primary"><a href="checkout.php?change=change">Change</a></td>
                                                </tr>
                                                <?php
                                                $sqli = "SELECT * FROM shipping_method where shipping_id='" . $_SESSION['shipping_method'] . "'";
                                                $run = $conn->query($sqli) or die($conn->error . __LINE__);

                                                if ($run->num_rows > 0) {
                                                    while ($row1 = $run->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td style="color:silver">Method</td>
                                                            <td><?php echo $row1['shipping_name'] ?></td>
                                                            <td class="text-right text-primary"></td>
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <input name="version" type="hidden" class="form-control" value="1.5.4" form="payment" />

                                <input name="CID" type="hidden" class="form-control" value="<?php echo !empty($post['CID']) ? htmlentities($post['CID']) : 'M161-U-20382'; ?>" form="payment" />

                                <input name="v_currency" type="hidden" class="form-control" value="<?php echo !empty($post['v_currency']) ? htmlentities($post['v_currency']) : 'MYR'; ?>" form="payment" />

                                <?php
                                if (isset($_SESSION['checkout']) && !empty($_SESSION['checkout'])) {
                                    foreach ($_SESSION['cart_item'] as [
                                        "product_id" => $product_id,
                                        "product_quantity" => $product_quantity,
                                        "cart_total_price" => $cart_total_price
                                    ]) {
                                        $sql = "SELECT * FROM products where product_id ='$product_id'";
                                        $result = $conn->query($sql) or die($conn->error . __LINE__);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $v_amount += $cart_total_price;
                                            }
                                        }
                                    }
                                } else {
                                    foreach ($_SESSION['cart_item'] as [
                                        "product_id" => $product_id,
                                        "product_quantity" => $product_quantity,
                                        "cart_total_price" => $cart_total_price
                                    ]) {
                                        if ($product_id == $_SESSION['item']) {
                                            $sql = "SELECT * FROM products where product_id ='" . $_SESSION['item'] . "'";
                                            $result = $conn->query($sql) or die($conn->error . __LINE__);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $v_amount += $cart_total_price;
                                                }
                                            }
                                        }
                                    }
                                } ?>
                                <input name="v_amount" type="hidden" class="form-control" value="1.00" form="payment" />

                                <input name="v_cartid" type="hidden" class="form-control" value="<?php echo !empty($post['v_cartid']) ? htmlentities($post['v_cartid']) : date('YmdHis'); ?>" form="payment" />

                                <input name="v_firstname" type="hidden" class="form-control" value="<?php echo !empty($post['v_firstname']) ? htmlentities($post['v_firstname']) : 'Gkash Payment'; ?>" form="payment" />

                                <input name="v_billemail" type="hidden" class="form-control" value="<?php echo !empty($post['v_billemail']) ? htmlentities($post['v_billemail']) : 'testing123@gkash.com'; ?>" form="payment" />

                                <input name="v_billphone" type="hidden" class="form-control" value="<?php echo !empty($post['v_billphone']) ? htmlentities($post['v_billphone']) : '01234567890'; ?>" form="payment" />


                                <input name="returnurl" type="hidden" class="form-control" value="<?php echo !empty($post['returnurl']) ? htmlentities($post['returnurl']) : $returnurl; ?>" form="payment" />



                                <input name="callbackurl" type="hidden" class="form-control" value="<?php echo !empty($post['callbackurl']) ? htmlentities($post['callbackurl']) : $callbackurl; ?>" form="payment" />



                                <input name="clientip" type="hidden" class="form-control" value="<?php echo !empty($post['clientip']) ? htmlentities($post['clientip']) : '127.0.0.1'; ?>" form="payment" />


                                <input name="wechatauthcode" type="hidden" class="form-control" value="<?php echo !empty($post['wechatauthcode']) ? htmlentities($post['wechatauthcode']) : ''; ?>" form="payment" />

                                <div class="col-lg-6 py-5">
                                    <button class="btn btn-success" style="padding:15px 30px 15px 30px;border-radius:0;width:100%" id="pay_now" name="send" type="submit" form="payment">PAY NOW</button>
                                </div>

                                <div class="col-lg-6 py-5">
                                    <a href="shipping.php" class="btn btn-outline-success" style="padding:15px 30px 15px 30px;border-radius:0">RETURN TO SHIPPING</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-5 py-5" style="background-color:rgb(250, 250, 250);border:1px solid rgb(240, 240, 240)">
                <?php
                if (isset($_SESSION['checkout'])) {
                    if ($_SESSION['checkout'] == "all") {
                        foreach ($_SESSION['cart_item'] as [
                            "product_id" => $product_id,
                            "product_quantity" => $product_quantity,
                            "cart_total_price" => $cart_total_price
                        ]) {
                            $sql = "SELECT * FROM products where product_id ='$product_id'";
                            $result = $conn->query($sql) or die($conn->error . __LINE__);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $all_total += $cart_total_price;
                ?>

                                    <div class="col-lg-12 py-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img src="assets/images/products/<?php echo $row['product_image'] ?>" alt="" style="width:100px;height:100px;border-radius:10%">
                                                <span class="cart_dot" style="transition: ease 0.3s;height: 25px;width: 25px;background-color: black;border-radius: 50%;display: block;position: absolute;transform: translate(317%, -429%);font-size: 13px;padding-top: 2px;padding-left: 8px;color: white;"><?php echo $product_quantity ?></span>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="float-start">
                                                    <h5 style="padding-top:30px;"><?php echo $row['product_name'] ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="float-lg-end">
                                                    <h5 style="padding-top:30px;">RM <?php echo $cart_total_price ?>.00</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    } else {
                        foreach ($_SESSION['cart_item'] as [
                            "product_id" => $product_id,
                            "product_quantity" => $product_quantity,
                            "cart_total_price" => $cart_total_price
                        ]) {
                            if ($product_id == $_SESSION['item']) {
                                $sql = "SELECT * FROM products where product_id ='" . $_SESSION['item'] . "'";
                                $result = $conn->query($sql) or die($conn->error . __LINE__);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $all_total += $cart_total_price;
                                    ?>

                                        <div class="col-lg-12 py-3">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <img src="assets/images/products/<?php echo $row['product_image'] ?>" alt="" style="width:100px;height:100px;border-radius:10%">
                                                    <span class="cart_dot" style="transition: ease 0.3s;height: 25px;width: 25px;background-color: black;border-radius: 50%;display: block;position: absolute;transform: translate(317%, -429%);font-size: 13px;padding-top: 2px;padding-left: 8px;color: white;"><?php echo $product_quantity ?></span>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="float-start">
                                                        <h5 style="padding-top:30px;"><?php echo $row['product_name'] ?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="float-lg-end">
                                                        <h5 style="padding-top:30px;">RM <?php echo $cart_total_price ?>.00</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                <?php
                                    }
                                }
                            }
                        }
                    }
                }
                ?>

                <hr>
                <div class="row">
                    <div class="col-lg-6 py-3 text-left">
                        <h5 style="color:#898989"> Subtotal</h5>

                    </div>
                    <div class="col-lg-6 py-3 text-right">
                        <h5>RM <?php if ($all_total > 0) {
                                    echo $all_total;
                                } ?>.00</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 py-3 text-left">
                        <h5 style="color:#898989"> Shipping</h5>
                    </div>
                    <div class="col-lg-6 py-3 text-right">
                        <h5 class="shipping_total">RM <?php
                                                        $sqli = "SELECT * FROM shipping_method where shipping_id='" . $_SESSION['shipping_method'] . "'";
                                                        $run = $conn->query($sqli) or die($conn->error . __LINE__);


                                                        if ($run->num_rows > 0) {
                                                            while ($row = $run->fetch_assoc()) {
                                                                echo $row['shipping_price'];
                                                                $shpping_total = $row['shipping_price'];
                                                            }
                                                        }
                                                        ?></h5>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-6 py-3 text-left">
                        <h5 style="color:#898989">Total</h5>
                    </div>
                    <div class="col-lg-6 py-3 text-right">
                        <h3>RM <span class="total_view"><?php if ($all_total > 0) {
                                                            $get_total = (int)$all_total + (int)$shpping_total;
                                                            echo (string)$get_total;
                                                        } ?>.00</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </body>
</section>
<?php

if (strpos($post_url, "https://api-staging.pay.asia") !== false) {
    echo '<script type="text/javascript">
		document.form.submit();
	</script>';
}
?>
<script type="text/javascript">
    $(document).ready(function() {

        // $("#payment").submit(function(event) {
        //     if ($(this).attr("action") != "$post_url") {

        //     }
        //     alert("Handler for .submit() called.");
        //     event.preventDefault();
        // });

        // $("#pay_now").click(function() {
        //     if ($("#credit_card").prop("checked") == false) {
        //         swal({
        //             title: "Please check the payment method before you pay!",
        //             icon: "warning",
        //             button: "Ok",
        //         });
        //         event.preventDefault();
        //     }
        // });



        $(window).click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });
            }
        });

        $("#list_2").click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_2").css("display", "block");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "block");
                });
            } else {
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });
            }
        });
    });
</script>
<?php require_once("footer.php") ?>

</html>