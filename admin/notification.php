<?php
include("../db.php");
include("login-authentication.php");

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .sidebar-menu .dropdown {
            display: none
        }

        @media screen and (max-width:767px) {
            .sidebar-menu .dropdown {
                display: block;
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

        .nav-tabs .nav-link {
            color: black;
        }

        .bg-white:hover {
            background-color: #198754 !important;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            color: #7EC4A0;
            border-color: transparent transparent #7EC4A0 transparent;
            border-bottom: 3px solid !important;
            /* isolation: isolate; */
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
            border-bottom: 3px solid !important;
            font-weight: bold;
        }

        .nav-tabs .nav-item.show .nav-link:hover,
        .nav-tabs .nav-link.active:hover,
        .nav-tabs .nav-link.active:focus {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
        }

        .notification_show {
            padding-left: 0;
            padding-right: 0;
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
                        <h4 style="padding-left:10px">All Notifications</h4>
                    </div>
                </div>
                <!-- 4-blocks row start -->


                <div class="card dashboard-product mb-3" style="margin-bottom: 0px;padding:0px 15px 0px 15px;">
                    <div class="col-lg-12 notification_show">
                        <h4 class="text-dark mt-2">Today, 2/8/2021</h4>
                        <hr class="bg-dark">
                        <div class="row pt-3 pb-3" style="border-bottom:1px solid silver">
                            <div class="col-lg-2 text-center">
                                <div style="background-color:#EAF9F1;width:50px;height:50px;border-radius:50%;padding-top:4px">
                                    <i class="bi bi-box-seam" style="font-size:27px;color:#7EC4A0;"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 mt-1" style="padding-left:0">
                                <div class="row" style="margin-left:0;margin-right:0">
                                    <div class="col-lg-12">
                                        <span>Order has been delivered</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <span style="color:#738599">Order number 4563495652 has been delivered</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <span style="color:#A9BAC9">14 sec ago</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row pt-3 pb-3" style="border-bottom:1px solid silver">
                            <div class="col-lg-2 text-center">
                                <div style="background-color:#EAF9F1;width:50px;height:50px;border-radius:50%;padding-top:4px">
                                    <i class="bi bi-box-seam" style="font-size:27px;color:#7EC4A0;"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 mt-1" style="padding-left:0">
                                <div class="row" style="margin-left:0;margin-right:0">
                                    <div class="col-lg-12">
                                        <span>Order has been delivered</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <span style="color:#738599">Order number 4563495652 has been delivered</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <span style="color:#A9BAC9">14 sec ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card dashboard-product" style="margin-bottom: 0px;padding:0px 15px 0px 15px;">

                    <div class="col-lg-12 notification_show">
                        <h4 class="text-dark mt-2">Sun, 1/8/2021</h4>
                        <hr class="bg-dark">
                        <div class="row pt-3 pb-3" style="border-bottom:1px solid silver">
                            <div class="col-lg-2 text-center">
                                <div style="background-color:#EAF9F1;width:50px;height:50px;border-radius:50%;padding-top:4px">
                                    <i class="bi bi-box-seam" style="font-size:27px;color:#7EC4A0;"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 mt-1" style="padding-left:0">
                                <div class="row" style="margin-left:0;margin-right:0">
                                    <div class="col-lg-12">
                                        <span>Order has been delivered</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <span style="color:#738599">Order number 4563495652 has been delivered</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <span style="color:#A9BAC9">14 sec ago</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row pt-3 pb-3" style="border-bottom:1px solid silver">
                            <div class="col-lg-2 text-center">
                                <div style="background-color:#EAF9F1;width:50px;height:50px;border-radius:50%;padding-top:4px">
                                    <i class="bi bi-box-seam" style="font-size:27px;color:#7EC4A0;"></i>
                                </div>
                            </div>
                            <div class="col-lg-10 mt-1" style="padding-left:0">
                                <div class="row" style="margin-left:0;margin-right:0">
                                    <div class="col-lg-12">
                                        <span>Order has been delivered</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <span style="color:#738599">Order number 4563495652 has been delivered</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <span style="color:#A9BAC9">14 sec ago</span>
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
    $(document).ready(function() {
        $('#menu1').removeClass("active-sidebar");
        $('#menu2').removeClass("active-sidebar");
        $('#menu3').removeClass("active-sidebar");
        $('#menu4').removeClass("active-sidebar");
        $('#menu5').removeClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");
    });
</script>

</html>