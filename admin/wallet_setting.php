<?php
include("../db.php");
include("login-authentication.php");

if (isset($_POST['save'])) {
    $admin_id = $_SESSION['admin_id'];
    $admin_bank = mysqli_real_escape_string($conn, $_POST['admin_bank']);
    $admin_bank_account = mysqli_real_escape_string($conn, $_POST['admin_bank_account']);
    $admin_bank_holder = mysqli_real_escape_string($conn, $_POST['admin_bank_holder']);
    $admin_bank_password = mysqli_real_escape_string($conn, $_POST['admin_bank_password']);
    // $admin_bank_password_confirm = mysqli_real_escape_string($conn,$_POST['admin_bank_password_confirm']);

    $admin_bank_password_hash = password_hash($admin_bank_password, PASSWORD_DEFAULT);
    $sql = "UPDATE admin_wallet set bank_id='$admin_bank',bank_account='$admin_bank_account',bank_holdername='$admin_bank_holder', bank_password='$admin_bank_password_hash' where admin_id='$admin_id'";

    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);

    // unset($_SESSION['admin_id']);
    if ($result) {
        echo "<script>alert('Setup Wallet Completed!');</script>";
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
        .container {
            width: 600px !important;
        }

        @media (max-width: 991px) {
            .container {
                width: 100% !important;
            }
        }

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

        /* .profile-pic{
            width: 100%;
            border-radius: 50%;
        }

        .upload-profile{
            display: none;
        }

        .upload-btn{
            height: 40px;
            width: 100%;
            position: absolute;
            bottom: -25px;
            left: 25px;
            transform: translateX(-50%);
            text-align: center;
            background-color: rgba(0,0,0, 0.7);
            color: white;
            line-height: 30px;
        } */

        .profile-pic-div {
            height: 100px;
            width: 100px;
            transform: translate(0, 0);
            border-radius: 50%;
            overflow: hidden;
        }

        .photo {
            height: 100%;
            width: 100%;
        }

        .file {
            display: none;
        }

        .uploadBtn {
            height: 40px;
            width: 100%;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            color: wheat;
            line-height: 30px;
            font-family: sans-serif;
            font-size: 10px;
            cursor: pointer;
            display: none;
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

                    <div class="col-lg-12">
                        <div class="card dashboard-product">

                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="profile.php" style="color:#7EC4A0">
                                        <h5>Back</h5>
                                    </a>
                                </div>

                                <div class="col-lg-12" style="margin-top:10px">
                                    <h5 class="text-dark">Wallet Account Setting</h5>
                                    <hr>
                                    <div class="container">
                                        <form action="wallet_setting.php" method="POST">
                                            <div class="row">

                                                <div class="col-lg-12" style="margin-bottom:20px">
                                                    <label>Bank</label>
                                                    <select name="admin_bank" id="admin_bank" class="form-select form-control" style="border: none;background-color: #F1F3F5 ; padding: 10px 20px;" required>
                                                        <option value="">Choose Bank</option>
                                                        <option value="Maybank">Maybank</option>
                                                        <option value="RHB Bank">RHB Bank</option>
                                                        <option value="CIMB Group Holdings">CIMB Group Holdings</option>
                                                        <option value="Public Bank Berhad">Public Bank Berhad</option>
                                                        <option value="Hong Leong Bank">Hong Leong Bank</option>
                                                        <option value="AmBank">AmBank</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-12" style="margin-bottom:20px">
                                                    <label>Bank Account</label>
                                                    <input type="text" name="admin_bank_account" id="admin_bank_account" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Bank Account" required />
                                                </div>

                                                <div class="col-lg-12" style="margin-bottom:20px">
                                                    <label>Holder Name</label>
                                                    <input type="text" name="admin_bank_holder" id="admin_bank_holder" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Holder Name" required />
                                                </div>

                                                <div class="col-lg-12" style="margin-bottom:20px">
                                                    <label>Current Wallet Password</label>
                                                    <input type="password" name="admin_bank_password" id="admin_bank_password" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Current Wallet Password" required />
                                                </div>

                                                <div class="col-lg-12 py-3">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <a href="profile.php" name="cancel" id="cancel" class="btn btn-outline-success btn-md btn-block waves-effect text-center m-b-20">CANCEL</a>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <button name="save" id="save" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">SAVE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    });
</script>

</html>