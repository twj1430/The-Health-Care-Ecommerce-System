<?php
include("db.php");
// $cart_item = array();


if (isset($_POST['buy'])) {
    $_SESSION['checkout'] = "all";
    echo "<script>window.location.assign('checkout.php')</script>";
}

if (isset($_GET['id']) || isset($_GET['id2'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_GET['id2'];
    }

    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $result = $conn->query($sql) or die($conn->error . __LINE__);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['product_id'] = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $product_create_time = $row['product_create_time'];
        }
    }
} else {
    echo "<script>window.location.assign('index.php')</script";
}

if (isset($_POST["add"])) {
    // $product_id = $_POST['product_id'];
    // $product_quantity = $_POST['product_quantity'];
    // $product_price = $_POST['product_price'];

    // $cart_total_price = $product_quantity * $product_price;


    // $_SESSION['cart_item'][] =
    //     [
    //         "product_id" => $date_time,
    //         "product_id" => "$product_id",
    //         "product_quantity" => "$product_quantity",
    //         "cart_total_price" => "$cart_total_price"
    //     ];


    // echo "Yes";

    // if (count($cart_item) != 0) {
    //     for ($o = 0; $o < count($cart_item); $o++) {
    //     }
    // } else {
    // }

    // list(1 => $second, 3 => $fourth) = [1, 2, 3, 4];
    // echo "$second, $fourth\n";


    // $sql = "SELECT * FROM carts where user_id='" . $_SESSION['user_id'] . "'";
    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $id = $row['product_id'];
    //         $quantity =  $row['cart_quantity'];
    //     }

    // if ($product_id == $id) {
    //     $cq = $quantity + $product_quantity;
    //     $sql2 = "update cart set cart_quantity='$cq' where product_id='$product_id'";
    //     $result = $conn->query($sql2);
    //     // header("location:cart.php");

    // } else {
    //     $sql2 = "INSERT into cart(cart_id,user_id,product_id, cart_quantity, cart_total_price, cart_create_time)values('','" . $_SESSION['user_id'] . "' ,'$product_id', '$product_quantity','$cart_total_price', NOW())";
    //     $query = mysqli_query($conn, $sql2);
    //     // header("location:cart.php");
    // }
    // } else {
    //     $sql2 = "INSERT into cart(cart_id,user_id,product_id, cart_quantity, cart_total_price, cart_create_time)values('','" . $_SESSION['user_id'] . "' ,'$product_id', '$product_quantity','$cart_total_price', NOW())";
    //     $query = mysqli_query($conn, $sql2);
    //     // header("location:cart.php");
    // }


}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="assets/images/Logo.jpg" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THC</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
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

        /* quantity */
        .btn-increment-decrement {
            display: inline-block;
            padding: 22px 0px;
            background: #cecece5e;
            width: 70px;
            height: 65px;
            text-align: center;
            cursor: pointer;
        }

        .input-quantity {
            border: 0px;
            width: 30px;
            display: inline-block;
            margin: 0;
            box-sizing: border-box;
            text-align: center;
        }

        /* end quantity */


        .new_dropbtn {
            /* background-color: #04AA6D; */
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .new_dropbtn:hover,
        .new_dropbtn:focus {
            /* background-color: #3e8e41; */
            outline: none;
        }

        #myInput {
            background-position: 14px 12px;
            font-size: 16px;
            padding: 14px 20px 12px 8px;
            border: none;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
        }

        #myInput:focus {
            /* outline: 1px solid #ddd; */
            background-color: #f6f6f6;

        }

        .new_dropdown {
            position: relative;
            display: inline-block;
        }

        .new_dropdown-content {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 100%;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 1;
        }

        .new_dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .new_dropdown a:hover {
            background-color: #ddd;
            text-decoration: none;
            color: black;
        }

        .show {
            display: block;
        }

        .show_sub_image {
            width: 150px;
            height: 150px;
        }

        @media (max-width:991px) {

            .checkout_back {
                display: none !important;
            }

            .sub_image {
                max-width: 50% !important;
            }

            .show_sub_image {
                width: 100% !important;
                height: 100% !important;
            }

            .new_dropdown {
                width: 100%;
            }

            .new_dropbtn {
                width: 100%;
            }

            .set_quantity {
                margin-bottom: 19px;
            }

            .input-quantity {
                width: 20%;
            }

            .btn-increment-decrement {
                width: 38%;
            }

            .review_img {
                float: none !important;
            }
        }

        @media (max-width:1199px) {
            .set_quantity {
                width: 100% !important;
            }

            .add_cart {
                max-width: 100% !important;
            }

            .slide_img {
                width: 33.3333% !important;
            }
        }

        .others:hover {
            text-decoration: none;
            color: black;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #7EC4A0 !important;
            border-color: transparent transparent #dee2e6 !important;

        }

        .nav-tabs .nav-item .nav-link,
        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link {
            transition: ease 0.3s;
        }

        .nav-tabs .nav-item .nav-link:focus .nav-tabs .nav-item.show .nav-link:focus,
        .nav-tabs .nav-link:focus {
            border-color: transparent transparent #dee2e6 !important;
            /* color: #7EC4A0 !important; */
            transition: ease 0.3s;
        }

        .nav-tabs .nav-item .nav-link:hover .nav-tabs .nav-item.show .nav-link:hover,
        .nav-tabs .nav-link:hover {
            border-color: transparent transparent #dee2e6 !important;
            color: #7EC4A0 !important;
            transition: ease 0.3s;
        }


        .review_img {
            border-radius: 100px;
            float: right;
            margin-top: 5px;
        }





        /*  */
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 50px;
            padding-bottom: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            width: 100%;
            max-width: 500px;
        }

        /* The Close Button */
        .close {
            color: white !important;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #999;
            text-decoration: none;
            cursor: pointer;
        }

        .mySlides {
            display: none;
        }

        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            transform: translate(0%, -50%);
            color: white !important;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .next:hover,
        .prev:hover {
            color: black !important;
        }

        /* On hover, add a black background color with a little bit see-through */
        /* .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        } */

        /* Number text (1/3 etc) */
        .numbertext {
            color: white;
            font-size: 15px;
            font-weight: 600;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .caption-container {
            text-align: center;
            background-color: black;
            padding: 2px 16px;
            color: white;
        }

        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        img.hover-shadow {
            transition: 0.3s;
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            cursor: pointer;
        }

        .slide_img {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /*  */
    </style>
</head>


<?php include("header.php") ?>

<section id="product_details">

    <body>
        <a href="index.php" class="btn btn-dark checkout_back"><i class="bi bi-arrow-left"></i> BACK</a>
        <div class="container" style="margin-bottom:20px;">
            <div class="row">
                <div class="col-lg-12 py-5">
                    <span style="color:#878787">HOME</span> >
                    <b>LAFRE - Negative ion sanitary napkin</b>
                </div>

                <div class="col-lg-2 sub_image_big">
                    <div class="row">
                        <div class="col-lg-12 pb-3 sub_image">
                            <img src="assets/images/products/<?php echo $product_image ?>" data-slide="1" alt="" class="show_sub_image hover-shadow">
                        </div>
                        <div class="col-lg-12 pb-3 sub_image">
                            <img src="assets/images/products/<?php echo $product_image ?>" data-slide="2" alt="" class="show_sub_image hover-shadow">
                        </div>
                    </div>
                    <div id="myModal" class="modal modal_sub_image">
                        <span class="close cursor">&times;</span>
                        <div class="modal-content" style="margin-top: 65px;">

                            <div class="mySlides">
                                <div class="numbertext">1 / 2</div>
                                <img src="assets/images/products/<?php echo $product_image ?>" style="width:100%">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">2 / 2</div>
                                <img src="assets/images/products/<?php echo $product_image ?>" style="width:100%">
                            </div>


                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            <!-- 
                            <div class="caption-container">
                                <p id="caption"></p>
                            </div> -->


                            <!-- <div class="row" style="margin-left:0;margin-right:0;margin-bottom:0px;">
                                <div class="col-lg-4 slide_img">
                                    <img class="demo cursor" src="assets/images/products/<?php echo $product_image ?>" style="width:100%" onclick="currentSlide(1)" alt="Roger Dubuis Sale">
                                </div>
                                <div class="col-lg-4 slide_img">
                                    <img class="demo cursor" src="assets/images/products/<?php echo $product_image ?>" style="width:100%" onclick="currentSlide(2)" alt="Roger Dubuis Sale">
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div>

                <div class="col-lg-5 ">
                    <img src="assets/images/products/<?php echo $product_image ?>" alt="" style="width:100%;height:80%;">
                </div>

                <div class="col-lg-5">
                    <h2 style="font-weight:500;margin:0px"><?php echo $product_name; ?></h2>
                    <h3 style="font-weight:500;color:#7EC4A0">RM <?php echo $product_price; ?>.00</h3>

                    <div class="col-lg-12" style="letter-spacing: 15px;padding-left:0;padding-right:0;">
                        <i class="bi bi-star-fill" style="color:#5FA870;font-size:30px;"></i>
                        <i class="bi bi-star-fill" style="color:#5FA870;font-size:30px;"></i>
                        <i class="bi bi-star-fill" style="color:#5FA870;font-size:30px;"></i>
                        <i class="bi bi-star-half" style="color:#5FA870;font-size:30px;"></i>
                        <i class="bi bi-star" style="color:#5FA870;font-size:30px;"></i>
                        <span style="letter-spacing: 0px;color:#878787">No review</span>
                    </div>
                    <hr>
                    <p class="py-1">
                        <?php echo $product_description; ?>
                    </p>

                    <p class="py-1">
                        <?php echo $product_description; ?>
                    </p>

                    <!-- <p>
                        <a href="https://wa.me/0108820074">weijun1430</a>
                    </p> -->
                    <div class="col-lg-12" style="padding-left:0;">
                        <div class="row">
                            <div class="col-lg-6 set_quantity">
                                <!-- <div class="row" style="margin-left:0;margin-right:0;margin-bottom:10px;"> -->
                                <div class="cart-info quantity">
                                    <div class="dec btn-increment-decrement" id="dec">-</div>
                                    <input class="input-quantity" id="product_quantity" name="product_quantity" value="1">
                                    <div class="inc btn-increment-decrement" id="inc">+</div>
                                </div>
                                <!-- </div> -->
                            </div>

                            <div class="col-lg-6 add_cart">
                                <button class="btn btn-success" style="width:100%;padding:20px 30px 20px 30px;border-radius: 0;" type="submit" id="add" name="add">ADD TO CART</button>
                            </div>
                        </div>
                    </div>

                    <!-- <form action="product-details.php" method="POST"> -->
                    <div class="col-lg-12" style="padding-left:0;padding-left:0;padding-top:20px">
                        <!-- <a href="checkout.php" class="btn btn-dark buy_now" style="width:100%;padding:15px 0 15px 0;border-radius:0">BUY NOW</a> -->
                        <button class="btn btn-dark buy_now" data-link="checkout.php?buy_id=<?php echo $_SESSION['product_id'] ?>" name="buy" id="buy_now" style="width:100%;padding:15px 0 15px 0;border-radius:0">BUY NOW</button>
                    </div>
                    <!-- </form> -->
                </div>

                <input type="hidden" name="product_id" id="product_id" value="<?php echo  $_SESSION['product_id'] ?>" style="display: none;">
                <input type="hidden" name="product_price" id="product_price" value="<?php echo $product_price; ?>" style="display: none;">


                <div class="col-lg-12 py-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Additional</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Review (0)</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <img src="assets/images/products/<?php echo $product_image ?>" alt="" style="width:100%;height:100%;">
                                    </div>
                                    <div class="col-lg-8">
                                        <?php echo $product_description; ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="card border-0 mt-5">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img src="assets/images/avatar-1.png" alt="" class="review_img" width="35">
                                            </div>

                                            <div class="col-md-11">
                                                <div class="card-title">User Name</div>
                                                <div class="col-lg-12" style="padding-left:0;padding-right:0;margin-top: -8px;">
                                                    <i class="bi bi-star-fill" style="color:#5FA870;font-size:15px;"></i>
                                                    <i class="bi bi-star-fill" style="color:#5FA870;font-size:15px;"></i>
                                                    <i class="bi bi-star-fill" style="color:#5FA870;font-size:15px;"></i>
                                                    <i class="bi bi-star-half" style="color:#5FA870;font-size:15px;"></i>
                                                    <i class="bi bi-star" style="color:#5FA870;font-size:15px;"></i>
                                                </div>
                                                <p class="card-text" style="padding-top: 15px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa temporibus asperiores consectetur dolores. Facere adipisci, non eveniet sed esse doloremque nostrum consectetur eligendi, earum repudiandae, sit porro excepturi libero!</p>
                                                <p style="color: grey;font-size: 0.8em;">2021-08-02 22:00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 30px;">
                                </div>

                                <div class="card border-0 mt-5">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="assets/images/avatar-1.png" alt="" class="review_img" width="35">
                                        </div>

                                        <div class="col-md-11">
                                            <div class="card-title">User Name</div>
                                            <div class="col-lg-12" style="padding-left:0;padding-right:0;margin-top: -8px;">
                                                <i class="bi bi-star-fill" style="color:#5FA870;font-size:15px;"></i>
                                                <i class="bi bi-star-fill" style="color:#5FA870;font-size:15px;"></i>
                                                <i class="bi bi-star-fill" style="color:#5FA870;font-size:15px;"></i>
                                                <i class="bi bi-star-half" style="color:#5FA870;font-size:15px;"></i>
                                                <i class="bi bi-star" style="color:#5FA870;font-size:15px;"></i>
                                            </div>
                                            <p class="card-text" style="padding-top: 15px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa temporibus asperiores consectetur dolores. Facere adipisci, non eveniet sed esse doloremque nostrum consectetur eligendi, earum repudiandae, sit porro excepturi libero!</p>
                                            <p style="color: grey;font-size: 0.8em;">2021-08-02 22:00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr style="margin-top: 30px;">
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 py-5">
                    <h2 class="text-center" style="font-weight:600">Sales Arrivals</h2>
                    <div class="row">

                        <?php
                        $sql = "SELECT * FROM products LIMIT 3";
                        $result = $conn->query($sql) or die($conn->error . __LINE__);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $product_id = $row['product_id'];
                                $product_name = $row['product_name'];
                                $product_description = $row['product_description'];
                                $product_image = $row['product_image'];
                                $product_price = $row['product_price'];
                        ?>
                                <div class="col-lg-4 py-3">
                                    <a class="others" href="product-details.php?id2=<?php echo $product_id ?>">
                                        <div class="card border-0">

                                            <img src="assets/images/products/<?php echo $product_image ?>" alt="" style="width:100%;">
                                        </div>
                                        <h5 class="text-center" style="margin-top:10px"><?php echo $product_name ?></h5>
                                        <h5 class="text-center text-success">RM <?php echo $product_price ?>.00</h5>
                                    </a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="successful text-center" style="display:none;background-color: black;opacity:0.8;width:500px;height:180px;position:fixed;top:50%;left:50%;transform: translate(-50%, -50%);">
                <div class="col-md-12 py-3">
                    <i class="fa fa-check" style="color:green;font-size:60px;" aria-hidden="true"></i> <br><br>
                    <p style="font-size:20px;font-weight:500;color:white">
                        Item has been added to your shopping cart
                    </p>
                </div>
            </div>
    </body>
</section>
<script type="text/javascript">
    var incrementButton = document.getElementsByClassName('inc');
    var decrementButton = document.getElementsByClassName('dec');

    for (var i = 0; i < incrementButton.length; i++) {
        var button = incrementButton[i];
        button.addEventListener('click', function(event) {
            var buttonClicked = event.target;
            var input = buttonClicked.parentElement.children[1];
            var inputValue = input.value;
            var newValue = parseInt(inputValue) + 1;

            if (newValue <= 25) {
                input.value = newValue;
            }
        })
    }

    for (var i = 0; i < decrementButton.length; i++) {
        var button = decrementButton[i];
        button.addEventListener('click', function(event) {
            var buttonClicked = event.target;
            var input = buttonClicked.parentElement.children[1];
            var inputValue = input.value;
            var newValue = parseInt(inputValue) - 1;

            if (newValue > 0) {
                input.value = newValue;
            } else {
                input.value = 1;
            }
        })
    }

    $(document).ready(function() {

        $('#shipping_method').prop('checked', false);
        $("#continue").click(function() {
            if ($("#shipping_method").prop("checked") == false) {
                swal({
                    title: "Please select the shipping method before you continue!",
                    icon: "warning",
                    button: "Ok",
                });
                event.preventDefault();
            }
        });

        $(window).click(function(event) {
            if (!$(".dropdown-menu").hasClass("show")) {
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

        $(".buy_now").click(function() {
            var link = $(this).attr('data-link');
            $.ajax({
                url: "ajax.php",
                data: {
                    buy_now: "buy",
                    add_product_id: $("#product_id").val(),
                    add_product_quantity: $("#product_quantity").val(),
                    add_product_price: $("#product_price").val(),
                },
                type: 'post',
                success: function(response) {
                    window.location.assign(link);
                }
            });
        });

        $("#add").click(function() {
            $.ajax({
                url: "ajax.php",
                data: {
                    add_product_id: $("#product_id").val(),
                    add_product_quantity: $("#product_quantity").val(),
                    add_product_price: $("#product_price").val(),
                },
                type: 'post',
                success: function(response) {
                    if (response == "Yes") {
                        // console.log(response);
                        $(".cart_dot").css({
                            display: "block"
                        });

                        $('.successful').css({
                            display: "block"
                        }), setTimeout(function() {
                            $('.successful').css({
                                display: "none"
                            });
                        }, 1000);

                        if ($('.cart_dot').text() != "") {
                            var num = parseInt($('.cart_dot').text());
                            var total_num = num + parseInt($("#product_quantity").val());
                            $('.cart_dot').text(total_num.toString());
                        } else {
                            var total_num = parseInt($("#product_quantity").val());
                            $('.cart_dot').text(total_num.toString());
                        }
                    }
                }
            });
        });

        window.onkeyup = function(event) {
            if (event.target.matches('#myInput')) {
                var input, filter, ul, li, a, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                div = document.getElementById("new_mynew_Dropdown");
                a = div.getElementsByTagName("a");
                for (i = 0; i < a.length; i++) {
                    txtValue = a[i].textContent || a[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        a[i].style.display = "none";
                    }
                }
            } else {
                $("#new_mynew_Dropdown").removeClass("show");
            }
        }


        $(".choices").click(function() {
            $(".new_dropbtn").html($(this).text() + " <i class='bi bi-chevron-down'></i>");
            $("#upline_id").val($(this).attr("data-id"));
            $("#new_mynew_Dropdown").removeClass("show");
            $('#myInput').val("");
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("new_mynew_Dropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                a[i].style.display = "";
            }
            event.preventDefault();
        });


        $(".hover-shadow").click(function() {
            if ($(".modal_sub_image").css("display") == "none") {
                $(".modal_sub_image").css({
                    display: "block"
                });

                currentSlide($(this).attr("data-slide"));
            }
        });
    });

    $(".close").click(function() {
        $(".modal_sub_image").css({
            display: "none"
        })
    })


    var slideIndex = 1;
    showSlides(slideIndex);


    function plusSlides(n) {
        showSlides(slideIndex += parseInt(n));
    }

    function currentSlide(n) {
        showSlides(slideIndex = parseInt(n));
    }

    function showSlides(n) {

        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (parseInt(n) > slides.length) {
            slideIndex = 1
        }
        if (parseInt(n) < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
<?php require_once("footer.php") ?>

</html>