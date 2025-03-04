<?php
include("../db.php");
include("login-authentication.php");


if (isset($_SESSION['admin_id'])) {
    $id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM admin WHERE admin_unique_id = '$id'";
    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $admin_username = $row['admin_username'];
            $admin_contact_number = $row['admin_contact_number'];
            $admin_email = $row['admin_email'];
            $admin_whatsapp = $row['admin_whatsapp'];
            $admin_wechat = $row['admin_wechat'];
            $admin_address = $row['admin_address'];
            $admin_post_code = $row['admin_post_code'];
            $admin_city = $row['admin_city'];
            $admin_country = $row['admin_country'];
            $admin_profile_image = $row['admin_profile_image'];
            $admin_create_time = $row['admin_create_time'];

            $join_date = new DateTime("$admin_create_time");
            $join_date_format = $join_date->format('Y-m-d');
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

                <div class="row dashboard-header" style="padding-top:20px;">
                    <div class="col-lg-4">
                        <div class="row dashboard-header">
                            <div class="col-lg-12 col-md-6">
                                <div class="card dashboard-product" style="border-radius:10px 10px 10px 10px;padding-left:0;padding-right:0;padding-top:0">
                                    <div style="background-color:#7EC4A0;width:100%;height:100px;border-radius:10px 10px 0 0;">
                                    </div>

                                    <div class="col-lg-12 text-center" style="position:absolute;top:40px">
                                        <img src="../assets/images/<?php echo $admin_profile_image; ?>" alt="" style="border-radius:50%;width:35%">
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <h5 style="color:black;margin-top:80px;"><?php echo $admin_username; ?></h5>
                                        <h6>(+60) <?php echo $admin_contact_number; ?></h6>
                                        <h6><?php echo $admin_email; ?></h6>
                                    </div>
                                    <hr>

                                    <div class="row" style="padding:0 15px 0 15px">
                                        <div class="col-lg-6 text-left">
                                            <h6>Join Date</h6>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <h6 class="text-dark"><?php echo $join_date_format; ?></h6>
                                        </div>
                                    </div>

                                    <div class="row" style="padding:0 15px 0 15px">
                                        <div class="col-lg-6 text-left">
                                            <h6>WeChat</h6>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <h6 class="text-dark"><?php echo $admin_wechat; ?></h6>
                                        </div>
                                    </div>

                                    <div class="row" style="padding:0 15px 0 15px">
                                        <div class="col-lg-6 text-left">
                                            <h6>WhatsApp</h6>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <a href="https://api.whatsapp.com/send?phone=+6010-8820074">
                                                <h6 class="text-primary">Link</h6>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top:30px;">
                                        <a href="edit-profile.php?id=<?php echo $id; ?>" class="btn" style="width:100%;color:#777E84">Edit Profile</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row dashboard-header">
                            <div class="col-lg-12 col-md-6">
                                <div class="card dashboard-product" style="border-radius:10px 10px 0 0;">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true" style="color: #7EC4A0;">Personal Info</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="voucher-tab" data-toggle="tab" href="#voucher" role="tab" aria-controls="voucher" aria-selected="false" style="color: #7EC4A0;">My Voucher</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="wallet-tab" data-toggle="tab" href="#wallet" role="tab" aria-controls="wallet" aria-selected="false" style="color: #7EC4A0;">Wallet</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false" style="color: #7EC4A0;">Setting</a>
                                        </li>
                                    </ul>


                                    <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                                        <div class="tab-pane show active" id="personal">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <img src="../assets/images/<?php echo $admin_profile_image; ?>" alt="" style="border-radius:50%;width:100%">
                                                    </div>

                                                    <div class="col-lg-9">
                                                        <div class="col-lg-12">
                                                            <h5 style="padding:5px 0px 0px 0"><?php echo $admin_username; ?></h5>
                                                            <h6 style="color:#7EC4A0"><?php echo $join_date_format; ?> Join</h6>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-6" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">Contact</h5>
                                                            </div>
                                                            <div class="col-lg-6" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0" class="text-right text-dark">(+60) <?php echo $admin_contact_number; ?></h5>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-6">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">Email Address</h5>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h5 style="padding:5px 0px 0px 0" class="text-right text-dark"><?php echo $admin_email; ?></h5>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-6" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">WeChat</h5>
                                                            </div>
                                                            <div class="col-lg-6" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0" class="text-right text-dark"><?php echo $admin_wechat; ?></h5>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-6">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">WhatsApp</h5>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <a href="#">
                                                                    <h5 style="padding:5px 0px 0px 0" class="text-right text-primary"><?php echo $admin_whatsapp; ?></h5>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-3" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">Address</h5>
                                                            </div>
                                                            <div class="col-lg-9" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0" class="text-right text-dark"><?php echo $admin_address; ?></h5>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-6">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">Post Code</h5>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h5 style="padding:5px 0px 0px 0" class="text-right text-dark"><?php echo $admin_post_code; ?></h5>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-6" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">City</h5>
                                                            </div>
                                                            <div class="col-lg-6" style="background-color:#ced9e4;">
                                                                <h5 style="padding:5px 0px 0px 0" class="text-right text-dark"><?php echo $admin_city; ?></h5>
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-left:0">
                                                            <div class="col-lg-6">
                                                                <h5 style="padding:5px 0px 0px 0;color:#A6ACB2">Country</h5>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h5 style="padding:5px 0px 0px 0" class="text-right text-dark"><?php echo $admin_country; ?></h5>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="voucher" role="tabpanel" aria-labelledby="voucher-tab">

                                        </div>

                                        <div class="tab-pane" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                                            <div class="container">
                                                <div class="row dashboard-header">
                                                    <div class="col-lg-6 col-md-6" style="background-color:#ced9e4;border-radius:10px;padding:15px;">
                                                        <h6>My Sales</h6>
                                                        <h5 class="text-dark">RM 1,462.00</h5>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 text-right" style="padding:15px;">
                                                        <i class="bi bi-gear" style="font-size:30px;color:#7EC4A0"></i>
                                                    </div>

                                                    <div class="col-lg-12" style="margin-top:20px;">
                                                        <table class="table">
                                                            <thead>
                                                                <tr style="background-color:#7EC4A0;">
                                                                    <th>Join Date</th>
                                                                    <th>Sales</th>
                                                                    <th>Income</th>
                                                                    <th>Bank</th>
                                                                    <th>Holder Name</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>2021-09-05</td>
                                                                    <td>14</td>
                                                                    <td>RM 2,562.00</td>
                                                                    <td>Public Bank (5623)</td>
                                                                    <td>ANSON LIEW</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="setting" role="tabpanel" aria-labelledby="setting-tab">

                                        </div>
                                    </div>
                                    <hr style="margin:5px 0">
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
        $(".bi-gear").click(function(){
            window.location.assign("wallet_setting.php");
        });
    });
</script>

</html>