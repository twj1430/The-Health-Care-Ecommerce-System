<?php
include("db.php");

$_SESSION['get_cart_total_price'] = 0;
$_SESSION['item'] = "";
$_SESSION['checkout'] = "";

// AJAX
if (isset($_POST['cart_id'])) {
    $cartid = $_POST['cart_id'];
    $qty = $_POST['cart_quantity'];
    $price = $_POST['cart_price'];

    $totalprice = $price * $qty;

    // $sql = "UPDATE cart SET cart_quantity='$qty', cart_total_price = '$totalprice' WHERE cart_id='$cartid'";
    // $result = $conn->query($sql);
}

if (isset($_POST['checkout'])) {
    $_SESSION['checkout'] = "all";
    echo "<script>window.location.assign('checkout.php')</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="assets/images/Logo.jpg" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THC</title>

    <style>
        body {
            padding-top: 73px;
            /* background: rgb(250, 250, 250) !important; */
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

        .profile_image {
            width: 150px;
        }

        .product_name {
            display: inline-block;
            padding-left: 30px;

        }

        @media screen and (max-width:991px) {
            .profile_image {
                width: 100px;
            }

            .product_name {
                padding-left: 0px;
            }

            .input-quantity,
            .btn-increment-decrement {
                width: 100%
            }
        }
    </style>
</head>


<?php include("header.php") ?>

<section id="cart_section">

    <body>
        <div class="col-lg-12 cart_top text-center">
            <h1 class="cart_name">CART</h1>
        </div>

        <div class="row" style="margin-left:0;margin-right:0;">
            <div class="container pt-5">
                <div class="row" id="cart_table">
                    <div class="col-lg-12 table-responsive" style="padding:0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) {
                                    foreach ($_SESSION['cart_item'] as [
                                        "product_id" => $product_id,
                                        "product_quantity" => $product_quantity,
                                        "cart_total_price" => $cart_total_price
                                    ]) {

                                        $_SESSION['get_cart_total_price'] += $cart_total_price;

                                        $sql = "SELECT * FROM products where product_id='$product_id'";
                                        $result = $conn->query($sql) or die($conn->error . __LINE__);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $product_name = $row['product_name'];
                                                $product_image = $row['product_image'];
                                                $product_price = $row['product_price'];

                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="assets/images/products/<?php echo $product_image; ?>" alt="image" class="profile_image">
                                                        <h6 class="product_name"><?php echo $product_name; ?></h6>
                                                    </td>
                                                    <td>
                                                        <div class="py-4">
                                                            <h6 style="color:#727272;padding-top:10px;">RM <?php echo $product_price; ?>.00</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="py-4" style="margin-top: 13px;">
                                                            <div class="cart-info quantity">
                                                                <form action="cart.php" method="POST" id="checkout">
                                                                    <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $product_id; ?>,<?php echo $product_price ?>)">-</div>
                                                                    <input class="input-quantity" id="input-quantity-<?php echo $product_quantity; ?>" value="<?php echo $product_quantity ?>" style="background-color: white;" disabled>
                                                                    <div class="btn-increment-decrement" onClick="increment_quantity(<?php echo $product_id; ?>,<?php echo $product_price ?>)">+</div>
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
                                                            <a href="checkout.php?id=<?php echo $product_id ?>" class="btn btn-dark" style="margin-top:10px;width:100%">CHECKOUT
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="py-4">
                                                            <button class="btn delete_cart" value="<?php echo $product_id ?>" style="margin-top:10px;padding-left:0"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                    <?php
                                            }
                                        }
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <h2>There are no items in this cart</h2>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-12" style="padding:0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cart Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-4">
                                            <h5 style="padding-top:10px;">TOTAL</h5>
                                            <?php if (isset($_SESSION['get_cart_total_price']) && !empty($_SESSION['get_cart_total_price'])) {
                                            ?>
                                                <button class="btn btn-success py-3" name="checkout" form="checkout" style="margin-top:30px;border-radius: 0;padding-left:30px;padding-right:30px;">PROCEED TO CHECKOUT</button>
                                            <?php
                                            } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-4">
                                            <h5 style="padding-top:10px;"><b>RM <?php if (isset($_SESSION['get_cart_total_price']) && !empty($_SESSION['get_cart_total_price'])) {
                                                                                    echo $_SESSION['get_cart_total_price'];
                                                                                } ?>.00</b></h5>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </body>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $(window).click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });
            }
        });

        $("#list_2").click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_2").css("display", "block");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "block");
                });
            } else {
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });
            }
        });
    });

    // Cart QTY
    function increment_quantity(cart_id, price) {
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: {
                increment_cart_id: cart_id,
                price: price
            },
            dataType: "text",
            success: function(response) {
                $("#cart_table").html(response);
                var num = parseInt($('.cart_dot').text());
                var total_num = ++num;
                $('.cart_dot').text(total_num.toString());
            }
        });
    }

    function decrement_quantity(cart_id, price) {
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: {
                decrement_cart_id: cart_id,
                price: price
            },
            dataType: "text",
            success: function(response) {
                $("#cart_table").html(response);
                var num = parseInt($('.cart_dot').text());
                var total_num = --num;
                $('.cart_dot').text(total_num.toString());
            }
        });
    }

    $(".delete_cart").click(function() {
        swal({
                title: "Are you sure you want to delete?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "ajax.php",
                        data: {
                            delete_product_id: $(this).val()
                        },
                        type: 'post',
                        success: function(response) {
                            if (response == "Yes") {
                                swal("Delete Successful!", {
                                        icon: "success"
                                    })
                                    .then((value) => {
                                        window.location.reload();
                                    })
                            } else {
                                swal("Error occur, please try agian!", {
                                    icon: "warning"
                                });
                            }
                        }
                    });
                }
            });
    });
    //   
</script>
<?php require_once("footer.php") ?>

</html>