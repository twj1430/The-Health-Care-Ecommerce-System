<?php
include("../db.php");
include("login-authentication.php");

$id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admin_membership WHERE admin_id ='$id'";
$result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {

        $admin_mp_point = $row['admin_mp_point'];
        $admin_mp_status = $row['admin_mp_status'];
        $admin_tp_point = $row['admin_tp_point'];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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

        .active-sidebar>a {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #7EC4A0 !important;
        }

        table>thead>tr {
            color: white !important;
        }

        #tabs .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            border-bottom: 3px solid !important;
            border-top: 0 solid transparent !important;
            border-left: 0 solid transparent !important;
            border-right: 0 solid transparent !important;
            font-weight: bold;
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
                        <h4 style="padding: 0 15px;">Membership <?php echo $_SESSION['admin_id'] ?></h4>
                    </div>
                </div>

                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="background-color: #ebeff2; color: #7EC4A0;">THC Member</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="task-tab" data-toggle="tab" href="#task" role="tab" aria-controls="task" aria-selected="false" style="background-color: #ebeff2; color: #7EC4A0;">Task and Reward</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row dashboard-header">
                                <div class="col-lg-4 col-md-6" style="padding: 20px 15px;">
                                    <div class="card dashboard-product" style="border-radius:17px;">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <span>My Point</span>
                                                <h5 class="dashboard-total-products"><?php echo $admin_mp_point ?></h5>
                                                <input type="hidden" name="mp-point" id="mp-point" value="<?php echo $admin_mp_point ?>">
                                            </div>
                                            <div class="col-lg-3">
                                                <?php
                                                if ($admin_mp_status == "bronze") {
                                                ?>
                                                    <img src="../assets/images/bronzestar.png" alt="bronze" width="50" style="margin-top: 5px;">
                                                <?php
                                                } else if ($admin_mp_status == "gold") {
                                                ?>
                                                    <img src="../assets/images/goldstar.png" alt="gold" width="50" style="margin-top: 5px;">
                                                <?php
                                                } else if ($admin_mp_status == "platinum") {
                                                ?>
                                                    <img src="../assets/images/platinumstar.png" alt="platinum" width="100%" style="margin-top: 5px;">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="../assets/images/bronzestar.png" alt="" width="50" style="margin-top: 5px;">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4" style="padding-top:20px;padding-bottom:20px;">
                                        <div class="card dashboard-product text-center" style="max-width: 280px;border-radius:17px; background: transparent linear-gradient(144deg, #FD824C 6%, #D36E4D 45%, #632100 100%) 0% 0% no-repeat padding-box; color:white;">
                                            <div class="col-lg-12">
                                                <img src="../assets/images/bronzestar.png" alt="bronze" style="margin-bottom: 20px;">
                                                <h4>Bronze</h4>
                                                <h6 style="color: white;">0 - 199 MP</h6>
                                                <hr>
                                                <h6 style="color: white;">Great Deals Rewards</h6>
                                                <h6 style="color: white;">+</h6>
                                                <h6 style="color: white;">5%</h6>
                                                <h6 style="color: white;">+</h6>
                                                <h6 style="color: white;">Birthday Special</h6>
                                                <button type="button" id="bronze" class="btn btn-light" style="width: 100%; padding: 10px; margin-top: 10px; color: #A85227;">CLAIM</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4" style="padding-top:20px;padding-bottom:20px;">
                                        <div class="card dashboard-product text-center" style="max-width: 280px;border-radius:17px; background: transparent linear-gradient(139deg, #FDE403 0%, #E57D00 100%) 0% 0% no-repeat padding-box; color:white;">
                                            <div class="col-lg-12">
                                                <img src="../assets/images/goldstar.png" alt="gold" style="margin-bottom: 20px;">
                                                <h4>Gold</h4>
                                                <h6 style="color: white;">200 - 9,999 MP</h6>
                                                <hr>
                                                <h6 style="color: white;">Forfeit Task</h6>
                                                <h6 style="color: white;">+</h6>
                                                <h6 style="color: white;">Enjoy downlines targets 10%</h6>
                                                <button type="button" id="gold" class="btn btn-light" style="width: 100%; padding: 10px; margin-top: 65px; color: #FF9203;">CLAIM</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4" style="padding-top:20px;padding-bottom:20px;">
                                        <div class="card dashboard-product text-center" style="max-width: 280px;border-radius:17px; background: transparent linear-gradient(135deg, #A2A2A2 0%, #7C7C7C 100%) 0% 0% no-repeat padding-box; color:white;">
                                            <div class="col-lg-12">
                                                <img src="../assets/images/platinumstar.png" alt="platinum" style="margin-bottom: 20px;">
                                                <h4>Platinum</h4>
                                                <h6 style="color: white;">10,000 MP</h6>
                                                <hr>
                                                <h6 style="color: white;">Exclusive Platinum Member</h6>
                                                <button type="button" id="platinum" class="btn btn-light" style="width: 100%; padding: 10px; margin-top: 118px; color: #6E6E6E;">CLAIM</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="task" role="tabpanel" aria-labelledby="task-tab">
                            <div class="main-header">
                                <h4>Total TP: <?php echo $admin_tp_point; ?></h4>
                                <input type="hidden" name="tp-point" id="tp-point" value="<?php echo $admin_tp_point; ?>">
                                <h6>Automatically reset on the 1st of every month, please redeem in time</h6>
                            </div>

                            <div class="row dashboard-header" style="margin-left: 10px;">
                                <div class="col-lg-3 col-md-6">
                                    <div class="card dashboard-product text-center" style="border-radius:9px;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <img src="../assets/images/self-purchase.png" alt="self-purchase">
                                                <h4>Self-Purchase</h4>
                                                <h5 class="dashboard-total-products">(1/1)</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%; background-color: #7EC4A0;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card dashboard-product text-center" style="border-radius:9px;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <img src="../assets/images/sold-purchase.png" alt="sold-purchase">
                                                <h4>Sold Purchase</h4>
                                                <h5 class="dashboard-total-products">(2/4)</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #7EC4A0;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card dashboard-product text-center" style="border-radius:9px;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <img src="../assets/images/tp.png" alt="tp">
                                                <h4>TP</h4>
                                                <h5 class="dashboard-total-products">(0/125)</h5>

                                                <?php

                                                $var = ($admin_tp_point / 125) * 100;
                                                ?>
                                                <style>
                                                    #tp_progressbar {
                                                        width: <?php echo $var . "%"; ?>;
                                                        background-color: #7EC4A0;
                                                    }
                                                </style>

                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" id="tp_progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main-header">
                                <h4>Rewards</h4>
                            </div>
                            <div class="col-lg-9 col-md-6">
                                <div class="card dashboard-product" style="border-radius:9px;">
                                    <div class="row">
                                        <div class="col-lg-1 text-center">
                                            <img src="../assets/images/tp.png" alt="tp">
                                        </div>
                                        <div class="col-lg-9 ml-3">
                                            <h4>100 - 124 TP</h4>
                                            <h5 class="dashboard-total-products">10% Voucher (Valid in 2 Week)</h5>
                                        </div>
                                        <?php
                                        if ($admin_tp_point >= 100 && $admin_tp_point <= 124) {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;">REDEEM</button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;" disabled>REDEEM</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-6">
                                <div class="card dashboard-product" style="border-radius:9px;">
                                    <div class="row">
                                        <div class="col-lg-1 text-center">
                                            <img src="../assets/images/tp.png" alt="tp">
                                        </div>
                                        <div class="col-lg-9 ml-3">
                                            <h4>125 - 499 TP</h4>
                                            <h5 class="dashboard-total-products">Cash Rebate (Example: 125 TP x 40% = 50 USD x Currency)</h5>
                                        </div>
                                        <?php
                                        if ($admin_tp_point >= 125 && $admin_tp_point <= 499) {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;">REDEEM</button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;" disabled>REDEEM</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-6">
                                <div class="card dashboard-product" style="border-radius:9px;">
                                    <div class="row">
                                        <div class="col-lg-1 text-center">
                                            <img src="../assets/images/tp.png" alt="tp">
                                        </div>
                                        <div class="col-lg-9 ml-3">
                                            <h4>500 - 1249 TP</h4>
                                            <h5 class="dashboard-total-products">Cash Rebate (Example: 500 TP x 50% = 250 USD x Currency)</h5>
                                        </div>
                                        <?php
                                        if ($admin_tp_point >= 500 && $admin_tp_point <= 1249) {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;">REDEEM</button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;" disabled>REDEEM</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-6">
                                <div class="card dashboard-product" style="border-radius:9px;">
                                    <div class="row">
                                        <div class="col-lg-1 text-center">
                                            <img src="../assets/images/tp.png" alt="tp">
                                        </div>
                                        <div class="col-lg-9 ml-3">
                                            <h4>1250 TP</h4>
                                            <h5 class="dashboard-total-products">Cash Rebate (Example: 1250 TP x 60% = 750 USD x Currency)</h5>
                                        </div>
                                        <?php
                                        if ($admin_tp_point >= 1250) {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;">REDEEM</button>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-lg-2">
                                                <button type="button" id="redeem-1" class="btn btn-success" style="width: 100%; padding: 10px;margin-top: 10px;" disabled>REDEEM</button>
                                            </div>
                                        <?php
                                        }
                                        ?>
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
        $('#menu6').addClass("active-sidebar");

        $("#bronze").click(function() {
            var mppoint = $("#mp-point").val();
            if (mppoint >= 0 && mppoint <= 199) {
                $.ajax({
                    url: "../ajax.php",
                    method: "post",
                    data: {
                        mppoint: mppoint,
                        member: 'bronze'
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "1") {
                            window.alert('Claim Successful');
                            window.location.assign('membership.php');
                        } else {
                            window.alert('Failed');
                        }
                    }
                });
            } else {
                window.alert('Your MP Point is ' + mppoint + '\nPlease Select Other Option.');
            }
        });

        $("#gold").click(function() {
            var mppoint = $("#mp-point").val();
            if (mppoint >= 200 && mppoint <= 9999) {
                $.ajax({
                    url: "../ajax.php",
                    method: "post",
                    data: {
                        mppoint: mppoint,
                        member: 'gold'
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "1") {
                            window.alert('Claim Successful');
                            window.location.assign('membership.php');
                        } else {
                            window.alert('Failed');
                        }
                    }
                });
            } else {
                window.alert('Your MP Point is ' + mppoint + '\nPlease Select Other Option.');
            }
        });

        $("#platinum").click(function() {
            var mppoint = $("#mp-point").val();
            if (mppoint >= 10000) {
                $.ajax({
                    url: "../ajax.php",
                    method: "post",
                    data: {
                        mppoint: mppoint,
                        member: 'platinum'
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "1") {
                            window.alert('Claim Successful');
                            window.location.assign('membership.php');
                        } else {
                            window.alert('Failed');
                        }
                    }
                });
            } else {
                window.alert('Your MP Point is ' + mppoint + '\nPlease Select Other Option.');
            }
        });

        $("#redeem-1").click(function() {
            var tppoint = $("#tp-point").val();
            if (tppoint >= 100 && tppoint <= 124) {
                $.ajax({
                    url: "../ajax.php",
                    method: "post",
                    data: {
                        tppoint: tppoint,
                        rewards: 'rewards'
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "1") {
                            window.alert('Claim Successful');
                            window.location.assign('membership.php');
                        } else {
                            window.alert('Failed');
                        }
                    }
                });
            } else if (tppoint <= 99) {
                window.alert('Not Enough TP Point.');
            } else {
                window.alert('Your TP Point is ' + tppoint + '\nPlease Select Other Option.');
            }
        });

        $("#redeem-2").click(function() {
            var tppoint = $("#tp-point").val();
            if (tppoint >= 125 && tppoint <= 499) {
                $.ajax({
                    url: "../ajax.php",
                    method: "post",
                    data: {
                        tppoint: tppoint,
                        rewards: 'rewards'
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "1") {
                            window.alert('Claim Successful');
                            window.location.assign('membership.php');
                            // $("#home-tab").removeClass("a-active");
                            // $("#task-tab").addClass("a-active");
                        } else {
                            window.alert('Failed');
                        }
                    }
                });
            } else if (tppoint <= 124) {
                window.alert('Not Enough TP Point.');
            } else {
                window.alert('Your TP Point is ' + tppoint + '\nPlease Select Other Option.');
            }
        });

        $("#redeem-3").click(function() {
            var tppoint = $("#tp-point").val();
            if (tppoint >= 500 && tppoint <= 1249) {
                $.ajax({
                    url: "../ajax.php",
                    method: "post",
                    data: {
                        tppoint: tppoint,
                        rewards: 'rewards'
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "1") {
                            window.alert('Claim Successful');
                            window.location.assign('membership.php');
                        } else {
                            window.alert('Failed');
                        }
                    }
                });
            } else if (tppoint <= 499) {
                window.alert('Not Enough TP Point.');
            } else {
                window.alert('Your TP Point is ' + tppoint + '\nPlease Select Other Option.');
            }
        });

        $("#redeem-4").click(function() {
            var tppoint = $("#tp-point").val();
            if (tppoint >= 1250) {
                $.ajax({
                    url: "../ajax.php",
                    method: "post",
                    data: {
                        tppoint: tppoint,
                        rewards: 'rewards'
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == "1") {
                            window.alert('Claim Successful');
                            window.location.assign('membership.php');
                        } else {
                            window.alert('Failed');
                        }
                    }
                });
            } else {
                window.alert('Not Enough TP Point.');
            }
        });
    });
</script>

</html>