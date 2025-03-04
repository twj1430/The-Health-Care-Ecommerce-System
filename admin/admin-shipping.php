<?php
include("../db.php");
include("login-authentication.php");
$all_total = 0;
if (isset($_GET['id'])) {
    $_SESSION['admin_item'] = $_GET['id'];
    $_SESSION['admin_checkout'] = "";
} else {
    $_SESSION['admin_item'] = "";
}

if ((!isset($_SESSION['admin_checkout']) || empty($_SESSION['admin_checkout'])) && (!isset($_SESSION['admin_item']) || empty($_SESSION['admin_item']))) {
    echo '<script>window.alert("You cant directly access this page!!");window.location.assign("admin-cart.php")</script>';
}


if (isset($_POST['continue'])) {
    $_SESSION['admin_shipping_method'] = $_POST['shipping_method'];
    echo "<script>window.location.assign('admin-payment.php')</script>";
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
            background-color: #ebeff2;
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
                    <form action="admin-shipping.php" method="POST" id="shipping"></form>
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 py-5">
                                    <span style="color:#5FA870">Information</span> >
                                    <b>Shipping</b> >
                                    Payment
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table ">
                                                <!-- <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead> -->
                                                <tbody>
                                                    <?php
                                                    $_SESSION['email_or_phone'];
                                                    function validateemail($email)
                                                    {
                                                        // $x = $email;
                                                        // $atposition = $x . indexOf("@");
                                                        // $dotposition = $x . lastIndexOf(".");
                                                        $check = strrpos($email, '@');
                                                        if ($check == false) {
                                                            return false;
                                                        } else {
                                                            return true;
                                                        }
                                                        // if ($atposition < 1 || $dotposition < $atposition + 3 || $dotposition + 3 >= $x . length) {
                                                        //     // alert("Please enter a valid e-mail address \n atpostion:" + atposition + "\n dotposition:" + dotposition);
                                                        //     return false;
                                                        // } else {
                                                        //     return true;
                                                        // }
                                                    }

                                                    function validatephone($phone)
                                                    {
                                                        if (!preg_match("/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/", $phone)) {
                                                            return false;
                                                        } else {
                                                            return true;
                                                        }
                                                    }



                                                    if (validateemail($_SESSION['email_or_phone'])) {
                                                    ?>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><?php echo $_SESSION['email_or_phone'] ?></td>
                                                            <td class="text-right text-primary"><a href="admin-checkout.php?change=change">Change</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ship to</td>
                                                            <td><?php echo $_SESSION['address'] ?>, <?php echo $_SESSION['post_code'] . '&nbsp;' . $_SESSION['city'] ?>, <?php echo $_SESSION['state']  . '&nbsp;' . $_SESSION['country'] ?></td>
                                                            <td class="text-right text-primary"><a href="admin-checkout.php?change=change">Change</a></td>
                                                        </tr>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <tr>
                                                            <td>Contact</td>
                                                            <td><?php echo $_SESSION['email_or_phone'] ?></td>
                                                            <td class="text-right text-primary"><a href="admin-checkout.php?change=change">Change</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ship to</td>
                                                            <td><?php echo $_SESSION['address'] ?>, <?php echo $_SESSION['post_code'] . '&nbsp;' . $_SESSION['city'] ?>, <?php echo $_SESSION['state'] . '&nbsp;' . $_SESSION['country'] ?></td>
                                                            <td class="text-right text-primary"><a href="admin-checkout.php?change=change">Change</a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 py-5">
                                            <h2>Shipping Method</h2>
                                            <table class="table ">
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM shipping_method";
                                                    $result = $conn->query($sql) or die($conn->error . __LINE__);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="form-radio">
                                                                        <form>
                                                                            <div class="radio">
                                                                                <label style="cursor:pointer">
                                                                                    <input type="radio" class="shipping_method" name="shipping_method" form="shipping" value="<?php echo $row['shipping_id'] ?>" required="required" /><i class="helper"></i><?php echo $row['shipping_name'] ?>
                                                                                </label>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </td>
                                                                <td class="text-right"><?php echo $row['shipping_price'] ?></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 py-5">
                                            <button class="btn btn-success" name="continue" style="padding:15px 20px 15px 20px;border-radius:0" id="continue" form="shipping">CONTINUE TO SHIPPING</button>
                                        </div>
                                        <div class="col-lg-6 py-5">
                                            <a href="checkout.php" class="btn btn-outline-success" style="padding:15px 20px 15px 20px;border-radius:0">RETURN TO INFORMATION</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 " style="background-color:rgb(250, 250, 250);border:1px solid rgb(240, 240, 240)">

                        <?php
                        if (isset($_SESSION['admin_checkout']) && !empty($_SESSION['admin_checkout'])) {
                            $sql = "SELECT * FROM admin_cart left join products on admin_cart.product_id=products.product_id where admin_id='" . $_SESSION['admin_id'] . "'";
                            $result = $conn->query($sql) or die($conn->error . __LINE__);

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
                                                <div class="float-start">
                                                    <h5 style="padding-top:30px;"><?php echo $row['product_name'] ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="float-lg-end">
                                                    <h5 style="padding-top:30px;">RM <?php echo $row['cart_total_price'] ?>.00</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } else if (isset($_SESSION['item'])) {
                            $sql = "SELECT * FROM admin_cart left join products on admin_cart.product_id=products.product_id where admin_cart_id ='" . $_SESSION['item'] . "' and admin_id='" . $_SESSION['admin_id'] . "'";
                            $result = $conn->query($sql) or die($conn->error . __LINE__);

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
                                                <div class="float-start">
                                                    <h5 style="padding-top:30px;"><?php echo $row['product_name'] ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="float-lg-end">
                                                    <h5 style="padding-top:30px;">RM <?php echo $row['cart_total_price'] ?>.00</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>

                        <div class="col-lg-12 py-3">
                            <div class="float-lg-start">
                                <h5 style="color:#898989"> Subtotal</h5>
                            </div>
                            <div class="float-lg-end">
                                <h5>RM <?php if ($all_total > 0) {
                                            echo $all_total;
                                        } ?>.00</h5>
                            </div><br>
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="float-lg-start">
                                <h5 style="color:#898989"> Shipping</h5>
                            </div>
                            <div class="float-lg-end">
                                <h5>Caculated of next step</h5>
                            </div><br>
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="float-lg-start">
                                <h5 style="color:#898989">Total</h5>
                            </div>
                            <div class="float-lg-end">
                                <h3>RM <?php if ($all_total > 0) {
                                            echo $all_total;
                                        } ?>.00</h3>
                            </div><br>
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


        $('.shipping_method').prop('checked', false);
    });
</script>

</html>