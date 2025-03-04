<?php
include("db.php");
$all_total = 0;

if (!isset($_SESSION['item']) && !isset($_SESSION['checkout'])) {
    echo '<script>window.alert("You cant directly access this page!!");window.location.assign("cart.php")</script>';
};


if (isset($_POST['continue'])) {
    $_SESSION['shipping_method'] = $_POST['shipping_method'];
    echo "<script>window.location.assign('payment.php')</script>";
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
        <a href="cart.php" class="btn btn-dark checkout_back" style="left: -34px;"><i class="bi bi-arrow-left"></i> BACK</a>

        <div class="row" style="margin-left:0;margin-right:0">
            <form action="shipping.php" method="POST" id="shipping"></form>
            <div class="col-lg-6 offset-lg-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 py-5">
                            <span style="color:#5FA870">Information</span> >
                            <b>Shipping</b> >
                            Payment
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table ">
                                        <!-- <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead> -->
                                        <tbody>
                                            <?php
                                            $_SESSION['email_or_phone'];
                                            function validateemail($email)
                                            {
                                                // $x = $email;
                                                // $atposition = $x . indexOf("@");
                                                // $dotposition = $x . lastIndexOf(".");
                                                $check = strrpos($email, '@');
                                                if ($check == false) {
                                                    return false;
                                                } else {
                                                    return true;
                                                }
                                                // if ($atposition < 1 || $dotposition < $atposition + 3 || $dotposition + 3 >= $x . length) {
                                                //     // alert("Please enter a valid e-mail address \n atpostion:" + atposition + "\n dotposition:" + dotposition);
                                                //     return false;
                                                // } else {
                                                //     return true;
                                                // }
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
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 py-5">
                                    <h2>Shipping Method</h2>
                                    <table class="table ">
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM shipping_method";
                                            $result = $conn->query($sql) or die($conn->error . __LINE__);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input shipping_method" required type="radio" name="shipping_method" value="<?php echo $row['shipping_id'] ?>" form="shipping">
                                                            </div>
                                                        </td>
                                                        <td><?php echo $row['shipping_name'] ?></td>
                                                        <td class="text-right"><?php echo $row['shipping_price'] ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6 py-5">
                                    <button class="btn btn-success" name="continue" style="padding:15px 30px 15px 30px;border-radius:0" id="continue" form="shipping">CONTINUE TO PAYMENT</button>
                                </div>
                                <div class="col-lg-6 py-5">
                                    <a href="checkout.php" class="btn btn-outline-success" style="padding:15px 30px 15px 30px;border-radius:0">RETURN TO INFORMATION</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-5 py-5" style="background-color:rgb(250, 250, 250);border:1px solid rgb(240, 240, 240)">

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
                } else if (isset($_SESSION['item'])) {
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
                        <h5 class="shipping_total">Caculated of next step</h5>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-6 py-3 text-left">
                        <h5 style="color:#898989">Total</h5>
                    </div>
                    <div class="col-lg-6 py-3 text-right">
                        <h3>RM <span class="total_view"><?php if ($all_total > 0) {
                                                            echo $all_total;
                                                        } ?>.00</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </body>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        var shipping_total = 0;
        $('.shipping_method').prop('checked', false);

        $('.shipping_method').change(function() {
            // var num = parseInt($('.cart_dot').text());
            // var total_num = ++num;
            $('.shipping_total').text('RM 8.00');
            if (shipping_total == 0) {
                shipping_total = 8;
                var num = parseInt($('.total_view').text());
                num += shipping_total;
                $('.total_view').text(num.toString() + ".00");
            }
        });

        $("#continue").click(function() {
            var count = 0;
            $(".shipping_method").each(function() {
                if ($(this).prop("checked") == true) {
                    ++count
                }
            });

            if (count == 0) {
                swal({
                    title: "Please select the shipping method before you continue!",
                    icon: "warning",
                    button: "Ok",
                });
                event.preventDefault();
            }
        });

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