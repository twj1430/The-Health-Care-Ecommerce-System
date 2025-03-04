<?php
include("db.php");
$all_total = 0;

if (!isset($_SESSION['cart_item']) || empty($_SESSION['cart_item'])) {
    echo '<script>window.alert("You cant directly access this page!!");window.location.assign("cart.php")</script>';
}

if (isset($_GET['id']) || isset($_GET['buy_id'])) {
    if (isset($_GET['id'])) {
        $_SESSION['item'] = $_GET['id'];
    } else {
        $_SESSION['item'] = $_GET['buy_id'];
    }
    $_SESSION['checkout'] = "";
}


if ((!isset($_SESSION['checkout']) || empty($_SESSION['checkout'])) && (!isset($_SESSION['item']) || empty($_SESSION['item'])) && (!isset($_GET['buy_id']) && !empty($GET['buy_id']))) {
    echo '<script>window.alert("You cant directly access this page!!");window.location.assign("cart.php")</script>';
}

if (isset($_POST['continue'])) {
    $_SESSION['email_or_phone'] = mysqli_real_escape_string($conn, $_POST['email_or_phone']);
    $_SESSION['first_name'] = mysqli_real_escape_string($conn, $_POST['first_name']);
    $_SESSION['last_name'] = mysqli_real_escape_string($conn, $_POST['last_name']);
    $_SESSION['address'] = mysqli_real_escape_string($conn, $_POST['address']);

    if (isset($_POST['apart'])) {
        $_SESSION['apart'] = mysqli_real_escape_string($conn, $_POST['apart']);
    }

    $_SESSION['post_code'] = mysqli_real_escape_string($conn, $_POST['post_code']);
    $_SESSION['city'] = mysqli_real_escape_string($conn, $_POST['city']);
    $_SESSION['state'] = mysqli_real_escape_string($conn, $_POST['state']);
    $_SESSION['country'] = mysqli_real_escape_string($conn, $_POST['country']);
    if (isset($_POST['next_time'])) {
        $_SESSION['next_time'] = mysqli_real_escape_string($conn, $_POST['next_time']);
    }

    if (isset($_GET['id'])) {
        $_SESSION['one'] = $_GET['id'];
    }
    echo "<script>window.location.assign('shipping.php')</script>";
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

        .custom-select {
            background-color: #F1F3F5 !important;
            border: none !important;
            width: 95% !important;
            border-radius: 0px !important;
            height: 40px !important;
        }

        .custom-select:focus {
            outline: none !important;
        }

        .form-control {
            font-size: 14px !important;
            padding: 20px !important;
        }
    </style>
</head>


<?php include("header.php") ?>

<section id="cart_section">

    <body>
        <a href="cart.php" class="btn btn-dark checkout_back"><i class="bi bi-arrow-left"></i> BACK</a>

        <div class="row" style="margin-left:0;margin-right:0">


            <div class="col-lg-1">
            </div>
            <div class="col-lg-6">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 py-5">
                            <b>Information</b>>
                            Shipping >
                            Payment
                        </div>
                        <form action="checkout.php" method="POST">
                            <div class="col-lg-12">
                                <h1>Contact Information</h1>
                                <input type="text" required name="email_or_phone" id="email_or_phone" class="form-control" style="padding:25px" value="<?php if (isset($_GET['change'])) {
                                                                                                                                                            echo $_SESSION['email_or_phone'];
                                                                                                                                                        }
                                                                                                                                                        ?>" placeholder="Email or mobile phone number">
                                <div class="col-lg-12 py-3" style="padding-left:0;padding-right:0">
                                    <div class="form-check" style="padding-left:23px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Keep me up to date on news and offers
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 py-5">
                                <h1>Shipping Address</h1>
                                <div class="row">
                                    <div class="col-lg-6 py-3">
                                        <div class="card border-0">
                                            <input type="text" name="first_name" value="<?php if (isset($_GET['change'])) {
                                                                                            echo $_SESSION['first_name'];
                                                                                        }
                                                                                        ?>" required id=" first_name" class="form-control" style="border-radius:0;padding:25px" placeholder="First Name" oninvalid="this.setCustomValidity('Please Enter Your First Name')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 py-3">
                                        <div class="card border-0">
                                            <input type="text" name="last_name" value="<?php if (isset($_GET['change'])) {
                                                                                            echo $_SESSION['last_name'];
                                                                                        }
                                                                                        ?>" required id="last_name" class="form-control" style="border-radius:0;padding:25px" placeholder="Last Name" oninvalid="this.setCustomValidity('Please Enter Your Last Name')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 py-3">
                                        <input type="text" name="address" value="<?php if (isset($_GET['change'])) {
                                                                                        echo $_SESSION['address'];
                                                                                    }
                                                                                    ?>" required id="address" class="form-control" style="border-radius:0;padding:25px" placeholder="Address" oninvalid="this.setCustomValidity('Please Enter Your Address')" oninput="this.setCustomValidity('')">
                                    </div>

                                    <div class="col-lg-12 py-3">
                                        <input type="text" name="apart" value="<?php if (isset($_GET['change'])) {
                                                                                    if (isset($_SESSION['apart'])) {
                                                                                        echo $_SESSION['apart'];
                                                                                    }
                                                                                }
                                                                                ?>" id="apart" class="form-control" style="border-radius:0;padding:25px" placeholder="Apartment, suits, etc (optional)">
                                    </div>

                                    <div class="col-lg-6 py-3">
                                        <div class="card border-0">
                                            <input type="text" name="post_code" value="<?php if (isset($_GET['change'])) {
                                                                                            echo $_SESSION['post_code'];
                                                                                        }
                                                                                        ?>" required id="post_code" class="form-control" style="border-radius:0;padding:25px" placeholder="Postcode" oninvalid="this.setCustomValidity('Please Enter Your Post Code')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 py-3">
                                        <div class="card border-0">
                                            <div class="btn-group">
                                                <input type="text" class="form-control" style="padding:20px;background-color:#F1F3F5;" placeholder="Country/region" readonly>
                                                <select name="country" class="custom-select" id="" oninvalid="this.setCustomValidity('Please Enter Your Country')" oninput="this.setCustomValidity('')" required>
                                                    <option value=""></option>
                                                    <option value="Malaysia">Malaysia</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 py-3">
                                        <div class="card border-0">
                                            <div class="btn-group">
                                                <input type="text" class="form-control" style="padding:20px;background-color: #F1F3F5 ;border-radius:0px" placeholder="State/territory" readonly>
                                                <select name="state" class="custom-select" id="" required oninvalid="this.setCustomValidity('Please Select Your State')" oninput="this.setCustomValidity('')">
                                                    <option value=""></option>
                                                    <option value="Johor">Johor</option>
                                                    <option value="Kedah">Kedah</option>
                                                    <option value="Kelantan">Kelantan</option>
                                                    <option value="Melacca">Melacca</option>
                                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                    <option value="Pahang">Pahang</option>
                                                    <option value="Penang">Penang</option>
                                                    <option value="Perak">Perak</option>
                                                    <option value="Perlis">Perlis</option>
                                                    <option value="Sabah">Sabah</option>
                                                    <option value="Sarawak">Sarawak</option>
                                                    <option value="Selangor">Selangor</option>
                                                    <option value="Terengganu">Terengganu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 py-3">
                                        <div class="card border-0">
                                            <input type="text" name="city" value="<?php if (isset($_GET['change'])) {
                                                                                        echo $_SESSION['city'];
                                                                                    }
                                                                                    ?>" required class="form-control" style="border-radius:0;padding:25px" placeholder="City" oninvalid="this.setCustomValidity('Please Enter Your City')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 py-3">
                                        <div class="form-check" style="padding-left:23px;">
                                            <input class="form-check-input" type="checkbox" value="" name="next_time" id="next_time">
                                            <label class="form-check-label" for="next_time">
                                                Save this information for next time
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 py-5">
                                        <button type="submit" name="continue" id="continue" class="btn btn-success" style="padding:15px 30px 15px 30px;border-radius:0">Continue TO SHIPPING</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-5 py-5" style="background-color:rgb(250, 250, 250);border:1px solid rgb(240, 240, 240)">

                <?php
                if (isset($_SESSION['item']) && !empty($_SESSION['item'])) {
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
                } else {
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
                }
                ?>


                <!-- <div class="col-lg-12 py-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="assets/images/products/glasses.jpg" alt="" style="width:100px;height:100px;border-radius:10%">
                            <span class="cart_dot" style="    transition: ease 0.3s;height: 25px;width: 25px;background-color: black;border-radius: 50%;display: block;position: absolute;transform: translate(317%, -429%);font-size: 13px;padding-top: 2px;padding-left: 8px;color: white;">1</span>
                        </div>
                        <div class="col-lg-4">
                            <div class="float-start">
                                <h5 style="padding-top:30px;">Roger Dubuls Sale</h5>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="float-lg-end">
                                <h5 style="padding-top:30px;">RM 60.00</h5>
                            </div>
                        </div>
                    </div>
                </div> -->

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
        function validateemail(email) {
            var x = email;
            var atposition = x.indexOf("@");
            var dotposition = x.lastIndexOf(".");
            if (atposition < 1 || dotposition < atposition + 3 || dotposition + 3 >= x.length) {
                // alert("Please enter a valid e-mail address \n atpostion:" + atposition + "\n dotposition:" + dotposition);
                return false;
            } else {
                return true;
            }
        }

        function validatephone(phone) {
            var x = /^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/;
            return x.test(phone);
        }


        $("#continue").click(function() {
            if (!validateemail($("#email_or_phone").val())) {
                if (!validatephone($("#email_or_phone").val())) {
                    swal({
                        title: "Please enter a valid email or contact number",
                        icon: "warning",
                        dangerMode: true,
                    });
                    event.preventDefault();
                }
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

        // $(".state_selection").click(function() {
        //     $(".state_text").html($(this).text());
        //     $("#state").val($(this).text());
        //     event.preventDefault();
        // });

        // $(".country_selection").click(function() {
        //     $(".country_text").html($(this).text());
        //     $("#country").val($(this).text());
        //     event.preventDefault();
        // });
    });
</script>
<?php require_once("footer.php") ?>

</html>