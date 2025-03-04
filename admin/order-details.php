<?php
include("../db.php");
include("login-authentication.php");

if (!isset($_GET['id'])) {
    echo "<script>window.location.assign('index.php')</script>";
} else {

    $sql = "SELECT * FROM payments left join products on payments.product_id=products.product_id left join shipping_method on payments.shipping_id=shipping_method.shipping_id where payment_id='" . $_GET['id'] . "'";

    $result = $conn->query($sql) or die($conn->error . __LINE__);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $payment_name = $row['payment_name'];
            $product_name = $row['product_name'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $payment_id = $row['payment_id'];
            $payment_email_phone = $row['payment_email_phone'];
            $payment_address = $row['payment_address'];
            $payment_post_code = $row['payment_post_code'];
            $payment_city = $row['payment_city'];
            $payment_state = $row['payment_state'];
            $payment_country = $row['payment_country'];
            $product_quantity = $row['product_quantity'];
            $payment_amount = $row['payment_amount'];
            $deliver_status = $row['deliver_status'];
            $shipping_name = $row['shipping_name'];
            $shipping_price = $row['shipping_price'];
            $payment_create_time= date("Y-m-d h:i a", strtotime($row['payment_create_time']));
        }
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
     <cript src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>s
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
        .sidebar-menu .dropdown {
            display: none
        }

        @media screen and (max-width:767px) {
            .sidebar-menu .dropdown {
                display: block;
            }
        }

        @media only screen and (min-width: 992px) {
            .tracking-item {
                margin-left: 1rem;
            }

            .tracking-item .tracking-date {
                position: absolute;
                left: -10rem;
                width: 7.5rem;
                text-align: right;
            }

            .tracking-item .tracking-content {
                padding: 0;
                background-color: transparent;
            }

        }

        @media only screen and (max-width:991px) {
            .tracking-item {
                margin-left: 3rem;
            }

            .tracking_date,
            .tracking_status {
                text-align: left !important;
            }
        }


        .tracking-item {
            border-left: 1px solid #e5e5e5;
            position: relative;
            padding: 2rem 1.5rem .5rem 2.5rem;
            font-size: .9rem;
            min-height: 5rem;
            color: black;
        }

        .tracking-item .tracking-icon.status-complete {
            /* border: 1px solid rgba(6, 141, 180, 0.3); */
            background-color: #8598AD;
        }

        .tracking-item .tracking-icon {
            line-height: 2.3rem;
            position: absolute;
            left: -1rem;
            width: 2rem;
            top: 27px;
            height: 2rem;
            text-align: center;
            border-radius: 50%;
            font-size: 20px;
            background-color: #fff;
            color: #e5e5e5;
        }

        .tracking-item .tracking-content {
            padding-bottom: 1rem;
            font-size: 17px;
        }

        .tracking-item .tracking-content span {
            display: inline-block;
            /* color: #888; */
            font-size: 85%;
            float: right;
        }

        .tracking-item.tracking-active {
            font-weight: bold !important;
        }

        .tracking-item .tracking-icon.status-active {
            border: 1px solid rgba(91, 176, 58, 0.7);
            background-color: #5bb03a;
            color: #ffffff;
            -webkit-box-shadow: 0px 0px 0px 6px rgb(91 176 58 / 40%);
            -moz-box-shadow: 0px 0px 0px 6px rgba(91, 176, 58, 0.4);
            box-shadow: 0px 0px 0px 6px rgb(91 176 58 / 40%);
        }

        .tracking-pending .tracking-date span,
        .tracking-pending .tracking-content,
        .tracking-pending .tracking-content span {
            color: #999999;
        }

        .tracking_date {
            font-size: 15px !important;
            color: #738599 !important;
        }

        .tracking_status_form {
            font-size: 16px;
            color: #738599 !important;
        }


        .dropdown-menu li a {
            position: relative;
            padding: 8px 0px;
            color: black;
        }

        .table tr:nth-of-type(even) {
            background-color: rgba(0, 0, 0, .05);
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


        .nav-tabs .nav-link {
            color: black;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            color: #7EC4A0;
            border-color: transparent transparent #7EC4A0 transparent;
            /* isolation: isolate; */
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
        }

        .nav-tabs .nav-item.show .nav-link:hover,
        .nav-tabs .nav-link.active:hover,
        .nav-tabs .nav-link.active:focus {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
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
                <div class="row">
                    <div class="main-header">
                        <a href="my-order.php" style="padding-left:10px;color:#7EC4A0;font-size:17px;text-decoration:none">Back</a>
                    </div>
                </div>
                <!-- 4-blocks row start -->
                <div class="row dashboard-header">
                    <span style="padding-left:20px;font-size:20px;">Order Details</span>

                    <div class="col-lg-7 py-3">
                        <div class="card dashboard-product" style="padding:0">
                            <table class="table mb-0">
                                <thead>
                                    <tr style="background-color:#7EC4A0;">
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 35%;">
                                            <div class="row" style="padding-right:0">
                                                <div class="col-lg-4">
                                                    <img src="../assets/images/products/<?php echo $product_image ?>" style="width:100%" alt="">
                                                </div>
                                                <div class="col-lg-8">
                                                    <h6 style="display:inline-block;color:black;"><?php echo $product_name ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6><?php echo $product_quantity ?></h6>
                                        </td>
                                        <td>
                                            <h6>MYR <?php echo $product_price ?></h6>
                                        </td>
                                        <td>
                                            <h6><?php echo (float)$product_price ^ (float)$product_quantity ?></h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-lg-5 py-3">
                        <div class="card dashboard-product">
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="float-start">
                                        <h6>Subtotal</h6>
                                    </div>
                                    <div class="float-end">
                                        <h6 style="color:black">MYR <?php echo $product_price ?></h6>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-lg-12 mb-1">
                                    <div class="float-start">
                                        <h6>Shipping</h6>
                                    </div>
                                    <div class="float-end">
                                        <h6 style="color:black">RM <?php echo $shipping_price ?></h6>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-lg-12 mb-1" style="background-color: rgba(0, 0, 0, .05);">
                                    <div class="float-start">
                                        <h6>Total</h6>
                                    </div>
                                    <div class="float-end">
                                        <h4 style="color:black"><?php echo $payment_amount ?></h4>
                                    </div>
                                    <br>
                                </div>

                                <div class="col-lg-12 mb-1">
                                    <div class="float-start">
                                        <h6>Order Date</h6>
                                    </div>
                                    <div class="float-end">
                                        <h6 style="color:black"><?php echo $payment_create_time ?></h6>
                                    </div>
                                    <br>
                                </div>

                                <div class="col-lg-12 mb-1">
                                    <div class="float-start">
                                        <h6>Method</h6>
                                    </div>
                                    <div class="float-end">
                                        <h6 style="color:black"><?php echo $shipping_name ?></h6>
                                    </div>
                                    <br>
                                </div>

                                <!-- <div class="col-lg-12 mb-1">
                                    <div class="float-start">
                                        <h6>Payment</h6>
                                    </div>
                                    <div class="float-end">
                                        <h6 style="color:black">Credit Card (7868)</h6>
                                    </div>
                                    <br>
                                </div> -->

                                <!-- <div class="col-lg-12 mb-1">
                                    <div class="float-start">
                                        <h6>My Income</h6>
                                    </div>
                                    <div class="float-end">
                                        <h6 style="color:black">RM 60.00</h6>
                                    </div>
                                    <br>
                                </div> -->

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card dashboard-product">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h3>#<?php echo $payment_id ?></h3>
                                </div>

                                <?php
                                if ($deliver_status == "pending") {
                                    echo '<div class="col-lg-1 text-center" style="border:1px solid #F9008F;color:#F9008F;padding:5px 10px 5px 10px;background-color:#FFF8FD">
                                                            Pending
                                                        </div>';
                                } else if ($deliver_status == "paid") {
                                    echo '<div class="col-lg-1 text-center" style="border:1px solid #00968D;color:#00968D;padding:5px 10px 5px 10px;background-color:#E6FFFD">
                                                            Paid
                                                        </div>';
                                } else if ($deliver_status == "complete") {
                                    echo '<div class="col-lg-1 text-center" style="border:1px solid #1B55E2;color:#1B55E2;padding:5px 10px 5px 10px;background-color:#EEF4FF">
                                                            Complete
                                                        </div>';
                                }
                                ?>
                                <!-- <div class="col-lg-1 text-center" style="border:1px solid #F9008F;color:#F9008F;padding:10px 0 10px 0;">
                                    <span style="font-weight:600">Pending</span>
                                </div> -->
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-lg-12" style="padding-left:20px;">
                                    <h3 style="color:black;font-weight:600"><?php echo $payment_name?></h3>
                                    <p style="font-size:15px">(<?php echo $payment_email_phone?>) <br><?php echo $payment_address ?> <?php echo $payment_post_code ?> <?php echo $payment_city ?> <?php echo $payment_state ?> <?php echo $payment_country ?></p>
                                </div>

                                <div class="col-lg-12" style="background-color:rgb(250, 250, 250);margin-left:0;margin-right:0">
                                    <div class='tracking-item'>
                                        <div class='tracking-icon status-complete'>
                                            <!-- <i class='fa fa-truck' aria-hidden='true'></i> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 text-left">
                                                <p class="tracking_status_form">Parcel is being delivered</p>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <p class="tracking_date" style="font-size: 14px;color:#738599">2021-07-04 05:48</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-left:0;margin-right:0">
                                    <div class='tracking-item'>
                                        <div class='tracking-icon status-complete'>
                                            <!-- <i class='fa fa-truck' aria-hidden='true'></i> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 text-left">
                                                <p class="tracking_status_form">Parcel is being delivered</p>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <p class="tracking_date" style="font-size: 14px;color:#738599">2021-07-04 05:48</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<script>
</script>

</html>