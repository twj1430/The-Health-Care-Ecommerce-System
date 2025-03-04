<?php
include("../db.php");
include("login-authentication.php");

// AJAX
if (isset($_POST['cart_id'])) {
    $cartid = $_POST['cart_id'];
    $qty = $_POST['cart_quantity'];
    $price = $_POST['cart_price'];

    $totalprice = $price * $qty;

    $sql = "UPDATE admin_cart SET cart_quantity='$qty', cart_total_price = '$totalprice' WHERE admin_cart_id='$cartid'";
    $result = $conn->query($sql) or die($conn->error . __LINE__);
}

// DELETE
if (isset($_GET['delete'])) {
    $admin_cart_id_delete = $_GET['delete'];
    $DeleteSQL = "DELETE FROM admin_cart WHERE admin_cart_id = '$admin_cart_id_delete'";
    $result2 = $conn->query($DeleteSQL) or die($conn->error . __LINE__);
}

if (isset($_POST['checkout'])) {
    $_SESSION['admin_checkout'] = "all";
    echo "<script>window.location.assign('admin-checkout.php')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
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
            background-color: #dee2e6;
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
                    <div class="main-header">
                        <h4 style="padding-left:15px">My Order</h4>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card dashboard-product table-border">
                        <table class="table">
                            <thead>
                                <tr style="background-color:#7EC4A0;">
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM admin_cart LEFT JOIN products ON admin_cart.product_id = products.product_id where admin_id='" . $_SESSION['admin_id'] . "'";
                                $result = $conn->query($sql) or die($conn->error . __LINE__);
                                $cart_total_price = 0;

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $admin_cart_id = $row['admin_cart_id'];
                                        $admin_id = $row['admin_id'];
                                        $product_id = $row['product_name'];
                                        $product_image = $row['product_image'];
                                        $product_price = $row['product_price'];
                                        $cart_quantity = $row['cart_quantity'];
                                        $cart_total_price = $row['cart_total_price'];
                                        $cart_create_time = $row['cart_create_time'];
                                ?>
                                        <tr>
                                            <td>
                                                <img src="../assets/images/products/<?php echo $product_image; ?>" alt="" style="width:100px">
                                                <h6 style="display:inline-block;padding-left:30px"><?php echo $product_id; ?></h6>
                                            </td>
                                            <td>
                                                <div class="py-4">
                                                    <h6 style="color:#727272;padding-top:10px;">RM <?php echo $product_price; ?>.00</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-4" style="margin-top: 13px;">
                                                    <div class="cart-info quantity">
                                                        <form action="admin-cart.php" method="POST" id="checkout">
                                                            <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo  $admin_cart_id; ?>)">-</div>
                                                            <input class="input-quantity" id="input-quantity-<?php echo  $admin_cart_id; ?>" value="<?php echo $cart_quantity ?>" style="background-color: white;" disabled>
                                                            <div class="btn-increment-decrement" onClick="increment_quantity(<?php echo  $admin_cart_id; ?>)">+</div>
                                                            <input type="hidden" id="price" value="<?php echo $product_price; ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="py-4">
                                                    <h6 style="padding-top:10px;">RM <?php echo $cart_total_price; ?>.00</h6>
                                                </div>

                                            </td>

                                            <td>
                                                <div class="py-4">
                                                    <a href="admin-checkout.php?id=<?php echo  $admin_cart_id ?>" class="btn btn-dark" style="margin-top:10px;">CHECKOUT</a>
                                                    <a href="admin-cart.php?delete=<?php echo $admin_cart_id; ?>" class="btn" name="delete" style="margin-top:5px;margin-left:20px;box-shadow: none;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td class="text-center" colspan="8">No order yet </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-12 py-5">

                    <table class="table dashboard-product table-border  table-responsive">
                        <tbody>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="p-3">
                                        <h5>TOTAL</h5>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="width: 300px;">
                                    <div class="p-3">
                                        <h5><b>RM <?php echo $cart_total_price; ?>.00</b></h5>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $sql2 = "SELECT * FROM admin_cart";
                                    $result2 = $conn->query($sql2) or die($conn->error . __LINE__);
                                    if ($result2->num_rows > 0) {
                                        $row = $result2->fetch_assoc()
                                    ?>
                                        <div class="p-2">
                                            <button class="btn btn-success py-3" name="checkout" form="checkout" style="border-radius: 0;padding-left:30px;padding-right:30px;float:right;">PROCEED TO CHECKOUT</button>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="p-2">
                                            <button class="btn btn-success py-3" style="border-radius: 0;padding-left:30px;padding-right:30px;float:right;" disabled>PROCEED TO CHECKOUT</button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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

    });

    function increment_quantity(admin_cart_id) {
        var inputQuantityElement = $("#input-quantity-" + admin_cart_id);
        var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
        if (newQuantity <= 25) {
            save_to_db(admin_cart_id, newQuantity);
        }
    }

    function decrement_quantity(admin_cart_id) {
        var inputQuantityElement = $("#input-quantity-" + admin_cart_id);
        if ($(inputQuantityElement).val() > 1) {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            save_to_db(admin_cart_id, newQuantity);
        }
    }

    function save_to_db(admin_cart_id, new_quantity) {
        var price = $("#price").val();
        $.ajax({
            url: "admin-cart.php",
            data: "cart_id=" + admin_cart_id + "&cart_quantity=" + new_quantity + "&cart_price=" + price,
            type: 'post',
            success: function(response) {
                location.reload();
            }
        });
    }
</script>

</html>