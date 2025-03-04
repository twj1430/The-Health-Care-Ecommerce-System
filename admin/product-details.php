<?php
include("../db.php");
include("login-authentication.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
        }
    }
}

// if(isset($_POST["add"])){
//     $product_id = $_POST['product_id'];
//     $product_quantity = $_POST['add_product_quantity'];
//     $product_price = $_POST['add_product_price'];

//     $cart_total_price = $product_quantity * $product_price;

//     $sql = "SELECT * FROM carts";
//     $result=$conn->query($sql);
//     if ($result->num_rows > 0) {
//         while($row = mysqli_fetch_assoc($result)){
//             $id = $row['product_id'];
//             $quantity =  $row['cart_quantity'];
//         }

//         if($product_id == $id){
//             $cq = $quantity + $product_quantity;
//             $sql2="update admin_cart set cart_quantity='$cq' where product_id='$product_id'";
//             $result=$conn->query($sql2);
//             // header("location:cart.php");

//         }else{
//             $sql2 = "INSERT into admin_cart(admin_cart_id, admin_id, product_id, cart_quantity, cart_total_price, cart_create_time)values('', '-', '$product_id', '$product_quantity','$cart_total_price', NOW())";
//             $query = mysqli_query($conn,$sql2);  
//             // header("location:admin-cart.php");
//         }
//     }else{
//         $sql2 = "INSERT into admin_cart(admin_cart_id, admin_id, product_id, cart_quantity, cart_total_price, cart_create_time)values('', '-', '$product_id', '$product_quantity','$cart_total_price', NOW())";
//         $query = mysqli_query($conn,$sql2);
//         // header("location:admin-cart.php");
//     }
// }

if (isset($_POST["add_product_id"])) {
    $product_id = $_POST['add_product_id'];
    $product_quantity = $_POST['add_product_quantity'];
    $product_price = $_POST['add_product_price'];

    $cart_total_price = $product_quantity * $product_price;

    $sql = "SELECT * FROM admin_cart WHERE admin_id = '" . $_SESSION['admin_id'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['product_id'];
            $quantity =  $row['cart_quantity'];
        }

        if ($product_id == $id) {
            $cq = $quantity + $product_quantity;
            $sql2 = "update admin_cart set cart_quantity='$cq' where product_id='$product_id' AND admin_id = '" . $_SESSION['admin_id'] . "'";
            $result = $conn->query($sql2);
            // header("location:cart.php");

        } else {
            $sql2 = "INSERT into admin_cart(admin_cart_id, admin_id, product_id, cart_quantity, cart_total_price, cart_create_time)values('', '" . $_SESSION['admin_id'] . "', '$product_id', '$product_quantity','$cart_total_price', NOW())";
            $query = mysqli_query($conn, $sql2);
            // header("location:admin-cart.php");
        }
    } else {
        $sql2 = "INSERT into admin_cart(admin_cart_id, admin_id, product_id, cart_quantity, cart_total_price, cart_create_time)values('', '" . $_SESSION['admin_id'] . "', '$product_id', '$product_quantity','$cart_total_price', NOW())";
        $query = mysqli_query($conn, $sql2);
        // header("location:admin-cart.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quantum Able Bootstrap 4 Admin Dashboard Template</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="../assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">

    <!-- Weather css -->
    <link href="../assets/css/svg-weather.css" rel="stylesheet">


    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

    <!-- fa icon -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Required Jqurey -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets/plugins/tether/dist/js/tether.min.js"></script>

    <!-- Required Fremwork -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- waves effects.js -->
    <script src="../assets/plugins/Waves/waves.min.js"></script>

    <!-- Scrollbar JS-->
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

    <!--classic JS-->
    <script src="../assets/plugins/classie/classie.js"></script>

    <!-- notification -->
    <script src="../assets/plugins/notification/js/bootstrap-growl.min.js"></script>

    <!-- Date picker.js -->
    <script src="../assets/plugins/datepicker/js/moment-with-locales.min.js"></script>
    <script src="../assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Select 2 js -->
    <script src="../assets/plugins/select2/dist/js/select2.full.min.js"></script>

    <!-- Max-Length js -->
    <script src="../assets/plugins/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>

    <!-- Multi Select js -->
    <script src="../assets/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
    <script src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="../assets/plugins/multi-select/js/jquery.quicksearch.js"></script>

    <!-- Tags js -->
    <script src="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

    <!-- Bootstrap Datepicker js -->
    <script type="text/javascript" src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- bootstrap range picker -->
    <script type="text/javascript" src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- color picker -->
    <script type="text/javascript" src="../assets/plugins/spectrum/spectrum.js"></script>
    <script type="text/javascript" src="../assets/plugins/jscolor/jscolor.js"></script>

    <!-- highlite js -->
    <script type="text/javascript" src="../assets/plugins/syntaxhighlighter/scripts/shCore.js"></script>
    <script type="text/javascript" src="../assets/plugins/syntaxhighlighter/scripts/shBrushJScript.js"></script>
    <script type="text/javascript" src="../assets/plugins/syntaxhighlighter/scripts/shBrushXml.js"></script>
    <script type="text/javascript">
        SyntaxHighlighter.all();
    </script>

    <!-- custom js -->
    <script type="text/javascript" src="../assets/js/main.min.js"></script>
    <script type="text/javascript" src="../assets/pages/advance-form.js"></script>
    <script src="../assets/js/menu.min.js"></script>
    <script type="text/javascript">
        SyntaxHighlighter.all();
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        p {
            font-size: 16px;
        }

        @media screen and (max-width:767px) {
            .sidebar-menu .dropdown {
                display: block;
            }
        }

        @media screen and (max-width:1312px) {
            .add_cart {
                width: 100% !important;
            }

            .set_quantity {
                width: 100% !important;
                margin-bottom:10px;
            }
        }

        .dropdown-menu li a {
            position: relative;
            padding: 8px 0px;
            color: black;
        }

        .sidebar-menu .dropdown {
            display: none
        }

        .table tr:nth-of-type(even) {
            background-color: #AFBBC6;
        }

        .table tr {
            color: black;
        }

        .table-border {
            padding: 0;
        }


        table>thead>tr {
            color: white !important;
        }

        .active-sidebar>a {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #7EC4A0 !important;
        }

        .dashboard-header .recent-buy {
            padding: 5px !important;
        }

        .bg-white:hover {
            background-color: #198754 !important;
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

        @media (max-width:1230px) {
            .slide_img {
                width:33.3333%
            }
            .show_sub_image {
                width: 100% !important;
                height: 100% !important;
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
            color: black;
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



        .nav-tabs .nav-item {
            float: left;
            margin-bottom: 0px !important;
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
            z-index: 1000;
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
            transform: translate(0%, -150%);
            color: white;
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

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
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

        .card {
            margin-bottom: 0px;
            border: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .card-text {
            font-size: 17px;
        }
    </style>
</head>

<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
        <!-- Side-Nav-->
        <?php require("nav-bar.php") ?>

        <!-- Sidebar chat end-->
        <div class="content-wrapper">
            <!-- Container-fluid starts -->
            <!-- Main content starts -->
            <div class="container-fluid">
                <!-- <div class="row">
                    <div class="main-header">
                        <a style="padding-left:10px;color:#7EC4A0;font-size:17px;">Back</a>
                    </div>
                </div> -->
                <!-- 4-blocks row start -->
                <div class="row dashboard-header">
                    <div class="col-lg-12">
                        <div class="card dashboard-product mt-3">
                            <div class="col-lg-12">
                                <div class="row">
                                    <!-- <form method="post" action="product-details.php?id=<?php echo $_GET['id']; ?>"> -->
                                    <div class="col-lg-2 sub_image_big">
                                        <div class="row">
                                            <div class="col-lg-12 pb-3 sub_image">
                                                <img src="../assets/images/products/<?php echo $product_image ?>" data-slide="1" alt="" class="show_sub_image hover-shadow">
                                            </div>
                                            <div class="col-lg-12 pb-3 sub_image">
                                                <img src="../assets/images/products/<?php echo $product_image ?>" data-slide="2" alt="" class="show_sub_image hover-shadow">
                                            </div>
                                        </div>
                                        <div id="myModal" class="modal modal_sub_image">
                                            <span class="close cursor">&times;</span>
                                            <div class="modal-content">

                                                <div class="mySlides">
                                                    <div class="numbertext">1 / 2</div>
                                                    <img src="../assets/images/products/<?php echo $product_image ?>" style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <div class="numbertext">2 / 2</div>
                                                    <img src="../assets/images/products/<?php echo $product_image ?>" style="width:100%">
                                                </div>


                                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                                <div class="caption-container">
                                                    <p id="caption"></p>
                                                </div>


                                                <div class="row" style="margin-left:0;margin-right:0;margin-bottom:0px;">
                                                    <div class="col-lg-4 slide_img">
                                                        <img class="demo cursor" src="../assets/images/products/<?php echo $product_image ?>" style="width:100%" onclick="currentSlide(1)" alt="Roger Dubuis Sale">
                                                    </div>
                                                    <div class="col-lg-4 slide_img">
                                                        <img class="demo cursor" src="../assets/images/products/<?php echo $product_image ?>" style="width:100%" onclick="currentSlide(2)" alt="Roger Dubuis Sale">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 ">
                                        <img src="../assets/images/products/<?php echo $product_image; ?>" alt="" style="width:100%;height:80%;">
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

                                    <input name="product_id" id="product_id" value="<?php echo $product_id; ?>" type="hidden">
                                    <input name="product_price" id="product_price" value="<?php echo $product_price; ?>" type="hidden">
                                    <!-- </form> -->
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6" style="margin-top:30px;">
                                <div class="dashboard-product" style="background-color:transparent">
                                    <div class="row">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Additional</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Review (0)</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane show active" id="home">

                                                <div class="container">
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4">
                                                            <img src="../assets/images/products/<?php echo $product_image ?>" alt="" style="width:100%;height:100%;">
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <?php echo $product_description; ?>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="tab-pane show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                ...
                                            </div>
                                            <div class="tab-pane show" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="card border-0 mt-5">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <img src="../assets/images/avatar-1.png" alt="" class="review_img" width="35">
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
                                                                <img src="../assets/images/avatar-1.png" alt="" class="review_img" width="35">
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
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="successful text-center" style="display:none;background-color: black;opacity:0.8;width:500px;height:180px;position:fixed;top:50%;left:50%;transform: translate(-50%, -50%);">
                    <div class="col-md-12 py-3">
                        <i class="fa fa-check" style="color:green;font-size:60px;" aria-hidden="true"></i> <br><br>
                        <p style="font-size:20px;font-weight:500;color:white !important;">
                            Item has been added to your shopping cart
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

<script>
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

    $("#add").click(function() {
        $.ajax({
            url: "product-details.php",
            data: {
                add_product_id: $("#product_id").val(),
                add_product_quantity: $("#product_quantity").val(),
                add_product_price: $("#product_price").val()
            },
            type: 'post',
            success: function(response) {
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
                }, 5000);
            }
        });
    });

    $(".hover-shadow").click(function() {
        if ($(".modal_sub_image").css("display") == "none") {
            $(".modal_sub_image").css({
                display: "block"
            })

            console.log($(this).attr("data-slide"));
            currentSlide($(this).attr("data-slide"));
        }
    });

    $(".close").click(function() {
        $(".modal_sub_image").css({
            display: "none"
        })
    });

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
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

</html>