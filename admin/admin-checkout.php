<?php
include("../db.php");
include("login-authentication.php");


if ((!isset($_SESSION['admin_checkout']) || empty($_SESSION['admin_checkout'])) && (!isset($_SESSION['admin_item']) || empty($_SESSION['admin_item']))) {
    echo '<script>window.alert("You cant directly access this page!!");window.location.assign("admin-cart.php")</script>';
}


$all_total = 0;
if (isset($_GET['id'])) {
    $_SESSION['admin_item'] = $_GET['id'];
    $_SESSION['admin_checkout'] = "";
} else {
    $_SESSION['admin_item'] = "";
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
    echo "<script>window.location.assign('admin-shipping.php')</script>";
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
        .content-wrapper {
            background-color: #ebeff2 !important;
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

        .btn-increment-decrement {
            display: inline-block;
            padding: 5px 0px;
            background: #e7e7e75e;
            width: 30px;
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
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 py-5">
                                    <b>Information</b>>
                                    Shipping >
                                    Payment
                                </div>
                                <form action="admin-checkout.php" method="POST">
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
                                            <div class="col-lg-6 py-2">
                                                <div class="card border-0">
                                                    <input type="text" name="first_name" value="<?php if (isset($_GET['change'])) {
                                                                                                    echo $_SESSION['first_name'];
                                                                                                }
                                                                                                ?>" required id=" first_name" class="form-control" style="border-radius:0;padding:25px" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 py-2">
                                                <div class="card border-0">
                                                    <input type="text" name="last_name" value="<?php if (isset($_GET['change'])) {
                                                                                                    echo $_SESSION['last_name'];
                                                                                                }
                                                                                                ?>" required id="last_name" class="form-control" style="border-radius:0;padding:25px" placeholder="Last Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 py-2">
                                                <input type="text" name="address" value="<?php if (isset($_GET['change'])) {
                                                                                                echo $_SESSION['address'];
                                                                                            }
                                                                                            ?>" required id="address" class="form-control" style="border-radius:0;padding:25px" placeholder="Address">
                                            </div>

                                            <div class="col-lg-12 py-2">
                                                <input type="text" name="apart" value="<?php if (isset($_GET['change'])) {
                                                                                            if (isset($_SESSION['apart'])) {
                                                                                                echo $_SESSION['apart'];
                                                                                            }
                                                                                        }
                                                                                        ?>" id="apart" class="form-control" style="border-radius:0;padding:25px" placeholder="Apartment, suits, etc (optional)">
                                            </div>

                                            <div class="col-lg-6 py-2">
                                                <div class="card border-0">
                                                    <input type="text" name="post_code" value="<?php if (isset($_GET['change'])) {
                                                                                                    echo $_SESSION['post_code'];
                                                                                                }
                                                                                                ?>" required id="post_code" class="form-control" style="border-radius:0;padding:25px" placeholder="Postcode">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 py-2">
                                                <div class="card border-0">
                                                    <input type="text" name="city" value="<?php if (isset($_GET['change'])) {
                                                                                                echo $_SESSION['city'];
                                                                                            }
                                                                                            ?>" required class="form-control" style="border-radius:0;padding:25px" placeholder="City">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 py-2">
                                                <div class="row">
                                                    <div class="col-lg-6" style="padding-right:0">
                                                        <input type="text" class="form-control" id="state_name" style="border: none;padding:20px;background-color: #F1F3F5 ;" placeholder="State/territory" value="<?php if (isset($_GET['change'])) {
                                                                                                                                                                                                                        echo $_SESSION['state'];
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo "Johor";
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    ?>" readonly>
                                                    </div>
                                                    <div class=" col-lg-6" style="padding-left:0">
                                                        <select id="inputState1" name="state" class="form-select" style="border: none;background-color: #F1F3F5 ; padding:10px;width:100%">
                                                            <option selected>Choose State</option>
                                                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                            <option value="Johor Bahru">Johor Bahru</option>
                                                            <option value="Penang">Penang</option>
                                                            <option value="Melaka">Melaka</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 py-2">
                                                <div class="row">
                                                    <div class="col-lg-6" style="padding-right:0">
                                                        <input type="text" class="form-control" id="country_name" style="border: none;padding:20px;background-color: #F1F3F5 ;" placeholder="State/territory" value="<?php if (isset($_GET['change'])) {
                                                                                                                                                                                                                            echo $_SESSION['country'];
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo "Malaysia";
                                                                                                                                                                                                                        } ?>" readonly>
                                                    </div>
                                                    <div class=" col-lg-6" style="padding-left:0">
                                                        <select id="inputState2" name="country" class="form-select" style="border: none;background-color: #F1F3F5 ; padding:10px;width:100%">
                                                            <option selected>Choose Country</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Singapore">Singapore</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 py-2">
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


                    <div class="col-lg-6" style="background-color:rgb(250, 250, 250);border:1px solid rgb(240, 240, 240)">

                        <?php
                        if (isset($_GET['id'])) {
                            $sqli = "SELECT * FROM admin_cart left join products on admin_cart.product_id=products.product_id where admin_cart_id ='" . $_GET['id'] . "' and admin_id='" . $_SESSION['admin_id'] . "'";
                            $result = $conn->query($sqli) or die($conn->error . __LINE__);

                            $count = mysqli_num_rows($result);
                            if ($result->num_rows > 0) {
                                while ($row1 = $result->fetch_assoc()) {
                                    $all_total += $row1['cart_total_price'];
                        ?>
                                    <div class="col-lg-12 py-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img src="../assets/images/products/<?php echo $row1['product_image'] ?>" alt="" style="width:100px;height:100px;border-radius:10%">
                                                <span class="cart_dot" style="transition: ease 0.3s;height: 25px;width: 25px;background-color: black;border-radius: 50%;display: block;position: absolute;transform: translate(317%, -429%);font-size: 13px;padding-top: 2px;padding-left: 8px;color: white;"><?php echo $row1['cart_quantity'] ?></span>
                                            </div>
                                            <div class="col-lg-4">
                                                <h5 style="padding-top:30px;"><?php echo $row1['product_name'] ?></h5>

                                            </div>
                                            <div class="col-lg-5">
                                                <h5 style="padding-top:30px;">RM <?php echo $row1['cart_total_price'] ?>.00</h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } else if (isset($_SESSION['admin_checkout']) && !empty($_SESSION['admin_checkout'])) {
                            $sqli = "SELECT * FROM admin_cart left join products on admin_cart.product_id=products.product_id where admin_id='" . $_SESSION['admin_id'] . "'";
                            $result = $conn->query($sqli) or die($conn->error . __LINE__);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $all_total += $row['cart_total_price'];
                                ?>
                                    <div class="col-lg-12 py-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img src="../assets/images/products/<?php echo $row['product_image'] ?>" alt="" style="width:100px;height:100px;border-radius:10%">
                                                <span class="cart_dot" style="transition: ease 0.3s;height: 25px;width: 25px;background-color: black;border-radius: 50%;display: block;position: absolute;transform: translate(317%, -429%);font-size: 13px;padding-top: 2px;padding-left: 8px;color: white;"><?php echo $row['cart_quantity'] ?></span>
                                            </div>
                                            <div class="col-lg-4">
                                                <h5 style="padding-top:30px;"><?php echo $row['product_name'] ?></h5>

                                            </div>
                                            <div class="col-lg-5">
                                                <h5 style="padding-top:30px;">RM <?php echo $row['cart_total_price'] ?>.00</h5>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>

                        <div class="col-lg-12 py-3">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 style="color:#898989"> Subtotal</h5>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <h5>RM <?php if ($all_total > 0) {
                                                echo $all_total;
                                            } ?>.00</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 style="color:#898989"> Shipping</h5>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <h5>Caculated of next step</h5>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-12 py-3">
                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <h5 style="color:#898989">Total</h5>
                                </div>

                                <div class="col-lg-6 text-right">
                                    <h3>RM <?php if ($all_total > 0) {
                                                echo $all_total;
                                            } ?>.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#menu1').removeClass("active-sidebar");
        $('#menu2').removeClass("active-sidebar");
        $('#menu3').removeClass("active-sidebar");
        $('#menu4').removeClass("active-sidebar");
        $('#menu5').removeClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");

        $("#inputState1").change(function() {
            $("#state_name").val($(this).val());
        });
        $("#inputState2").change(function() {
            $("#country_name").val($(this).val());
        });
    });
</script>

</html>