<?php
include("../db.php");
include("login-authentication.php");


if (isset($_SESSION['admin_id'])) {
    $today = date("M");
    $lastmonth = date("M", strtotime("last day of previous month"));
    $sql = "select sum(admin_my_sales), sum(admin_downline_sales), sum(admin_total_income)
            from admin_sales WHERE sales_create_date = '$today' AND admin_id = '" . $_SESSION['admin_id'] . "'";
    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        echo $current_my_sum = $row['sum(admin_my_sales)'];
        $current_downline_sum = $row['sum(admin_downline_sales)'];
        $current_income_sum = $row['sum(admin_total_income)'];
    } else {
        $current_my_sum = 0;
        $current_downline_sum = 0;
        $current_income_sum = 0;
    }

    $sql2 = "select sum(admin_my_sales), sum(admin_downline_sales), sum(admin_total_income)
            from admin_sales WHERE sales_create_date = '$lastmonth' AND admin_id = '" . $_SESSION['admin_id'] . "'";
    $result2 = mysqli_query($conn, $sql2) or die($conn->error . __LINE__);
    if (mysqli_num_rows($result2) > 0) {
        $row = $result2->fetch_assoc();
        $previous_my_sum = $row['sum(admin_my_sales)'];
        $previous_downline_sum = $row['sum(admin_downline_sales)'];
        $previous_income_sum = $row['sum(admin_total_income)'];
    } else {
        $previous_my_sum = 0;
        $previous_downline_sum = 0;
        $previous_income_sum = 0;
    }
} else {
    echo "<script>window.alert('You have to login first!');window.location.assign('admin-login.php')</script>";
}

function PercentIncrease($num1, $num2)
{
    if ($num1 == 0 || $num2 == 0) {
        return 0 . "%";
    } else {
        return (($num2 - $num1) / $num1 * 100 . "%");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .sidebar-menu .dropdown {
            display: none
        }

        @media (max-width: 1040px) {
            .main-header-top {
                position: fixed;
                width: 100% !important;
                max-height: 50px;
            }
        }

        @media screen and (max-width:767px) {
            .sidebar-menu .dropdown {
                display: block;
            }

            .content-wrapper {
                padding-top: 40px;
            }
        }



        .dropdown-menu li a {
            position: relative;
            padding: 8px 0px;
            color: black;
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
        }


        .tracking-item {
            border-left: 1px solid #e5e5e5;
            position: relative;
            padding: 1.8rem 1.5rem .5rem 2.5rem;
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
            font-size: 85%;
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

        .home_product_name {
            padding-left: 0;
            padding-top: 15px;

        }

        .logistic_num_show {
            color: #9CADBC;
            padding-top: 22%;
            /* transform: translate(0%, 0%); */
        }

        .logistic_left {
            padding-left: 0;
        }

        .logistic_right {
            padding-right: 0;
        }


        @media only screen and (max-width:991px) {

            .home_product_image {
                max-width: 33.333333% !important;
            }

            .home_product_name {
                max-width: 66.666667% !important;
                padding-top: 10%;
                /* transform: translate(0, 50%); */
            }

            .logistic_code_right,
            .logistic_code {
                max-width: 50% !important;
            }


            .logistic_left {
                padding-left: 5px;
                margin-left: 48.333333% !important;
                max-width: 16.666667% !important;
            }

            .logistic_num {
                padding-left: 0;
                padding-right: 0;
                max-width: 16.666667% !important;
            }

            .logistic_right {
                padding-right: 15px !important;
                max-width: 16.666667% !important;
            }

            .logistic_num_show {
                padding-top: 25% !important;
                /* padding-left: 10px; */
            }

            .tracking_date,
            .tracking_status {
                text-align: left !important;
            }

            .tracking-item .tracking-icon {
                top: 40px;
            }
        }

        @media only screen and (max-width:817px) {
            .logistic_left {
                margin-left: 40.333333% !important;
            }
        }


        .active-sidebar>a {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #7EC4A0 !important;
        }

        table>thead>tr {
            color: white !important;
        }

        .admin_cart_dot {
            transition: ease 0.3s;
            height: 25px;
            width: 25px;
            background-color: black;
            border-radius: 50%;
            display: block;
            position: absolute;
            top: 50%;
            right: 5%;
            transform: translate(0, -50%);
            /* font-size: 13px; */
            text-align: center;
            color: white;
        }

        .order_details:hover {
            text-decoration: none;
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
                        <!-- <h4>Dashboard</h4> -->
                    </div>
                </div>
                <!-- 4-blocks row start -->
                <div class="row dashboard-header">
                    <div class="col-lg-4 col-md-6">
                        <div class="card dashboard-product">
                            <span>My Sales</span>
                            <div class="row">
                                <div class="col-lg-5">
                                    <h5 class="dashboard-total-products">RM <?php if ($current_my_sum == 0) { ?> 0<?php } else {
                                                                                                                    echo $current_my_sum;
                                                                                                                } ?></h5>
                                </div>
                                <div class="col-lg-7">
                                    <?php
                                    if (PercentIncrease($previous_my_sum, $current_my_sum) >= 0) {
                                    ?>
                                        <h6 class="dashboard-total-products" style="color:#32AB13"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> <span><?php echo PercentIncrease($previous_my_sum, $current_my_sum);  ?> 31 days ago</span></h6>
                                    <?php
                                    } else {


                                    ?>
                                        <h6 class="dashboard-total-products" style="color:#F90B6C"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> <span><?php echo PercentIncrease($previous_my_sum, $current_my_sum);  ?> 31 days ago</span></h6>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card dashboard-product">
                            <span>Downlines Sales</span>
                            <div class="row">
                                <div class="col-lg-5">
                                    <h5 class="dashboard-total-products">RM <?php if ($current_downline_sum == 0) { ?> 0<?php } else {
                                                                                                                        echo $current_downline_sum;
                                                                                                                    } ?></h5>
                                </div>
                                <div class="col-lg-7">
                                    <?php
                                    if (PercentIncrease($previous_downline_sum, $current_downline_sum) >= 0) {
                                    ?>
                                        <h6 class="dashboard-total-products" style="color:#32AB13"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> <span><?php echo PercentIncrease($previous_downline_sum, $current_downline_sum);  ?> 31 days ago</span></h6>
                                    <?php
                                    } else {
                                    ?>
                                        <h6 class="dashboard-total-products" style="color:#F90B6C"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> <span><?php echo PercentIncrease($previous_downline_sum, $current_downline_sum);  ?> 31 days ago</span></h6>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card dashboard-product">
                            <span>My Total Income</span>
                            <div class="row">
                                <div class="col-lg-5">
                                    <h5 class="dashboard-total-products">RM <?php if ($current_income_sum == 0) { ?> 0<?php } else {
                                                                                                                        echo $current_income_sum;
                                                                                                                    } ?></h5>
                                </div>
                                <div class="col-lg-7">
                                    <?php
                                    if (PercentIncrease($previous_income_sum, $current_income_sum) >= 0) {
                                    ?>
                                        <h6 class="dashboard-total-products" style="color:#32AB13"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> <span><?php echo PercentIncrease($previous_income_sum, $current_income_sum);  ?> 31 days ago</span></h6>
                                    <?php
                                    } else {
                                    ?>
                                        <h6 class="dashboard-total-products" style="color:#F90B6C"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> <span><?php echo PercentIncrease($previous_income_sum, $current_income_sum);  ?> 31 days ago</span></h6>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 4-blocks row end -->
                <div class="row dashboard-header">
                    <div class="col-lg-7 col-md-6">
                        <h4>Latest logistics situation</h4>
                        <div class="card dashboard-product">
                            <?php
                            $sql = "SELECT * FROM payments where admin_id='" . $_SESSION['admin_id'] . "' ORDER BY payment_create_time DESC LIMIT 1";

                            $result = $conn->query($sql) or die($conn->error . __LINE__);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="row" style="margin-right: 0;">
                                        <div class="col-lg-6 logistic_code">
                                            <a class="order_details" href="order-details.php">
                                                <h5 class="dashboard-total-products" style="color:#7EC4A0">#<?php echo $row['payment_id'] ?></h5>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 logistic_code_right">
                                            <div class="row">
                                                <div class="col-lg-1 offset-lg-7 text-center logistic_left">
                                                    <a href="#"><i class="fa fa-angle-left" aria-hidden="true" style="font-size:25px;margin-top:7px"></i></a>
                                                </div>
                                                <div class="col-lg-3 text-center logistic_num">
                                                    <h6 class="logistic_num_show">01</h6>
                                                </div>
                                                <div class="col-lg-1 text-center logistic_right">
                                                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true" style="font-size:25px;margin-top:7px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr style="margin:5px 0">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <?php
                                            $sqli = "SELECT * FROM products where product_id='" . $row['product_id'] . "'";
                                            $run = $conn->query($sqli) or die($conn->error . __LINE__);


                                            if ($run->num_rows > 0) {
                                                while ($row1 = $run->fetch_assoc()) {
                                            ?>
                                                    <div class="col-lg-6">
                                                        <div class="card border-0" style="background-color:#AFBBC6;padding:5px">
                                                            <div class="row">
                                                                <div class="col-lg-4 home_product_image">
                                                                    <img src="../assets/images/products/<?php echo $row1['product_image'] ?>" alt="" style="width:100%;">
                                                                </div>

                                                                <div class="col-lg-8 home_product_name">
                                                                    <span class="text-dark"><?php echo $row1['product_name'] ?></span>
                                                                </div>
                                                            </div>
                                                            <span class="admin_cart_dot"><?php echo $row['product_quantity'] ?></span>
                                                        </div>
                                                    </div>

                                            <?php
                                                }
                                            }
                                            ?>
                                            <!-- <div class="col-lg-6">
                                                <div class="card border-0" style="background-color:#AFBBC6;padding:5px">
                                                    <div class="row">
                                                        <div class="col-lg-4 home_product_image">
                                                            <img src="../assets/images/products/earpods_cover.png" alt="" style="width:100%;">
                                                        </div>

                                                        <div class="col-lg-8 home_product_name">
                                                            <span class="text-dark">Roger Dubuls Sale</span>
                                                        </div>
                                                    </div>
                                                    <span class="admin_cart_dot">1</span>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3 style="color:black;font-weight:600">Mr <?php echo $row['payment_name'] ?></h3>
                                                <p style="font-size:15px">(<?php echo $row['payment_email_phone'] ?>) <br><?php echo $row['payment_address'] ?> <?php echo $row['payment_post_code'] ?> <?php echo $row['payment_city'] ?> <?php echo $row['payment_state'] ?> <?php echo $row['payment_country'] ?>
                                                    <!-- 56, Jalan Austin 12, Taman Austin, 82320 Johor, Malaysia -->
                                                </p>
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
                                                        <div class="col-lg-6 text-left tracking_status">
                                                            <p class="tracking_status_form">Parcel is being delivered</p>
                                                        </div>
                                                        <div class="col-lg-6 text-right tracking_status_date">
                                                            <p class="tracking_date" style="font-size: 14px;color:#738599">2021-07-04 05:48</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <h4>Downlines</h4>
                        <div class="card dashboard-product table-border">
                            <input type="hidden" name="admin_id_table" id="admin_id_table" value="<?php echo $_SESSION['admin_id']; ?>">
                            <div id="result"></div>
                            <!-- <table class="table">
                                <thead>
                                    <tr style="background-color:#7EC4A0;">
                                        <th></th>
                                        <th>User Name</th>
                                        <th>Contact Number</th>
                                        <th>Join Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="../assets/images/avatar-3.png" style="width:25%;border-radius:50%" alt=""> Jacky</td>
                                        <td>+60 14 566 3232</td>
                                        <td>2021-01-05</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img src="../assets/images/avatar-3.png" style="width:25%;border-radius:50%" alt=""> Jacky</td>
                                        <td>+60 14 566 3232</td>
                                        <td>2021-01-05</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img src="../assets/images/avatar-3.png" style="width:25%;border-radius:50%" alt=""> Jacky</td>
                                        <td>+60 14 566 3232</td>
                                        <td>2021-01-05</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img src="../assets/images/avatar-3.png" style="width:25%;border-radius:50%" alt=""> Jacky</td>
                                        <td>+60 14 566 3232</td>
                                        <td>2021-01-05</td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

<script>
    $(document).ready(function() {
        $('#menu1').addClass("active-sidebar");
        $('#menu2').removeClass("active-sidebar");
        $('#menu3').removeClass("active-sidebar");
        $('#menu4').removeClass("active-sidebar");
        $('#menu5').removeClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");

        load_data(1);


        function load_data(page) {
            $.ajax({
                url: "admin-team-table.php",
                method: "POST",
                data: {
                    page: page,
                    admin_id_table: $('#admin_id_table').val()
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
    });
</script>

</html>