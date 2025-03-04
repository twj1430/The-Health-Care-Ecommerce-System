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

        .link_a:hover{
            text-decoration: none;
            color: black;
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
                        <h4 style="padding-left:10px">Rencently Buy</h4>
                    </div>
                </div>
                <!-- 4-blocks row start -->
                <div class="row dashboard-header">
                    <?php
                    $sql = "SELECT * FROM products LIMIT 3";
                    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $product_id = $row['product_id'];
                            $product_name = $row['product_name'];
                            $product_image = $row['product_image'];
                            $product_price = $row['product_price'];
                    ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card dashboard-product recent-buy">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <img src="../assets/images/products/<?php echo $product_image; ?>" alt="" style="width:100%;height:100%">
                                        </div>
                                        <div class="col-lg-7" style="padding-top:10px;padding-bottom:10px;">
                                            <h5 style="color:black"><?php echo $product_name; ?></h5>
                                            <h5 style="color:#7EC4A0">RM <?php echo $product_price; ?>.00</h5>
                                            <span style="color:#BCC2CE">I have buy 12 times</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="row dashboard-header" style="margin-top:20px;">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true" style="background-color: #ebeff2; color: #7EC4A0;">All Product</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="seriesA-tab" data-toggle="tab" href="#seriesA" role="tab" aria-controls="seriesA" aria-selected="false" style="background-color: #ebeff2; color: #7EC4A0;">Series A</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="seriesB-tab" data-toggle="tab" href="#seriesB" role="tab" aria-controls="seriesB" aria-selected="false" style="background-color: #ebeff2; color: #7EC4A0;">Series B</a>
                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                            <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="row dashboard-header">
                                    <?php
                                    $sql = "SELECT * FROM products";
                                    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $product_image = $row['product_image'];
                                            $product_price = $row['product_price'];
                                    ?>
                                            <div class="col-lg-4 col-md-6">
                                                <a href="product-details.php?id=<?php echo $product_id ?>" class="link_a">
                                                    <div class="card dashboard-product recent-buy">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <img src="../assets/images/products/<?php echo $product_image; ?>" alt="" style="width:100%;height:100%">
                                                            </div>
                                                            <div class="col-lg-7" style="padding-top:10px;padding-bottom:10px;">
                                                                <h5 style="color:black"><?php echo $product_name; ?></h5>
                                                                <h5 style="color:#7EC4A0">RM <?php echo $product_price; ?>.00</h5>
                                                                <span style="color:#BCC2CE">I have buy 12 times</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="tab-pane" id="seriesA" role="tabpanel" aria-labelledby="seriesA-tab">
                                <div class="row dashboard-header">
                                    <?php
                                    $sql = "SELECT * FROM products where category_id='1'";
                                    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $product_image = $row['product_image'];
                                            $product_price = $row['product_price'];
                                    ?>
                                            <div class="col-lg-4 col-md-6">
                                                <a href="product-details.php?id=<?php echo $product_id ?>">
                                                    <div class="card dashboard-product recent-buy">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <img src="../assets/images/products/<?php echo $product_image; ?>" alt="" style="width:100%">
                                                            </div>
                                                            <div class="col-lg-7" style="padding-left:0px;padding-top:20px">
                                                                <h5 style="color:black"><?php echo $product_name; ?></h5>
                                                                <h5 style="color:#7EC4A0">RM <?php echo $product_price; ?>.00</h5>
                                                                <span style="color:#BCC2CE">I have buy 12 times</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="tab-pane" id="seriesB" role="tabpanel" aria-labelledby="seriesB-tab">
                                <div class="row dashboard-header">
                                    <?php
                                    $sql = "SELECT * FROM products where category_id='2'";
                                    $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $product_id = $row['product_id'];
                                            $product_name = $row['product_name'];
                                            $product_image = $row['product_image'];
                                            $product_price = $row['product_price'];
                                    ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="card dashboard-product recent-buy">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <img src="../assets/images/products/<?php echo $product_image; ?>" alt="" style="width:100%">
                                                        </div>
                                                        <div class="col-lg-7" style="padding-left:0px;padding-top:20px">
                                                            <h5 style="color:black"><?php echo $product_name; ?></h5>
                                                            <h5 style="color:#7EC4A0">RM <?php echo $product_price; ?>.00</h5>
                                                            <span style="color:#BCC2CE">I have buy 12 times</span>
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
        $('#menu3').addClass("active-sidebar");
        $('#menu4').removeClass("active-sidebar");
        $('#menu5').removeClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");
    });
</script>

</html>