<?php
include("db.php");

if (isset($_POST['track_button'])) {
    echo "<script>window.location.assign('tracking_result.php');</script>";
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
            padding-top: 84px;
            /* background: rgb(250, 250, 250) !important; */
        }


        .show_product_list:hover {
            text-decoration: none;
            color: black;
        }

        .product_list:hover {
            color: black;
        }

        @media screen and (max-width:991px) {
            .track_button {
                margin-top: 10px !important;
            }
        }
    </style>
</head>


<?php include("header.php") ?>

<section id="home">

    <body>
        <div class="col-lg-12 health_care">
            <div class="col-lg-7 offset-lg-5" style="padding-top:200px;padding-bottom:350px;">
                <h1 style="font-weight:600">We Care your health</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore repellat iusto vel blanditiis in voluptatibus error iure alias perspiciatis quis. Iusto hic sit corrupti doloremque natus fugiat libero consectetur possimus.</p>

                <form action="index.php" method="POST">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card border-0">
                                <input type="text" class="form-control" placeholder="Enter parcel tracking number" style="height:50px;border-radius:0" required>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <!-- <div class="card border-0"> -->
                            <button class="btn btn-success track_button" name="track_button" style="height:50px;border-radius:0;width:100%">Track</button>
                            <!-- </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <img src="assets/images/support.png" alt="">
                    <div class="card border-0 py-4">
                        <h3>24/7 FRIENDLY SUPPORT</h3>
                        <p>Our support team always ready for you to 7 days a week</p>
                    </div>
                </div>

                <div class="col-lg-4 text-center">
                    <img src="assets/images/delivery-truck.png" alt="">
                    <div class="card border-0 py-4">
                        <h3>FREE SHIPPING</h3>
                        <p>Free worldwide shipping on all area order above RM100</p>
                    </div>
                </div>

                <div class="col-lg-4 text-center">
                    <img src="assets/images/return.png" alt="">
                    <div class="card border-0 py-4">
                        <h3>7 DAYS EASY RETURN</h3>
                        <p>Product ant fault whithin 7 days for an immediately exhange</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card h-100 border-0" id="shopping_productA">
                        <div class="col-lg-12">

                            <h2>
                                Product A
                            </h2>
                            <a href="product-list.php?id=1" class="product_list">SHOP NOW</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card h-100 border-0" id="shopping_productB">
                        <div class="col-lg-12">
                            <h2>
                                Product B
                            </h2>
                            <a href="product-list.php?id=2" class="product_list">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="container py-5">
            <h2 class="text-center">Sales Arrivals</h2>
            <div class="row">
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql) or die($conn->error . __LINE__);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-lg-4 py-3 offset-lg-4">
                            <a href="product-details.php?id=<?php echo $row['product_id'] ?>" class="show_product_list">
                                <div class="card border-0">
                                    <img src="assets/images/products/<?php echo $row['product_image'] ?>" alt="" style="width:100%;">
                                </div>
                                <h5 class="text-center" style="margin-top:10px"><?php echo $row['product_name'] ?></h5>
                                <h5 class="text-center text-success">RM <?php echo $row['product_price'] ?>.00</h5>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>


                <!-- <div class="col-lg-4 py-3">
                    <div class="card border-0">
                        <img src="assets/images/products/camera.jpg" alt="" style="width:100%;">
                    </div>
                    <h5 class="text-center" style="margin-top:10px">Roger Dubuls Sale</h5>
                    <h5 class="text-center text-success">RM 455.00</h5>
                </div>

                <div class="col-lg-4 py-3">
                    <div class="card border-0">
                        <img src="assets/images/products/cup.jpg" alt="" style="width:100%;">
                    </div>
                    <h5 class="text-center" style="margin-top:10px">Roger Dubuls Sale</h5>
                    <h5 class="text-center text-success">RM 455.00</h5>
                </div>

                <div class="col-lg-4 py-3">
                    <div class="card border-0">
                        <img src="assets/images/products/earphone.jpg" alt="" style="width:100%;">
                    </div>
                    <h5 class="text-center" style="margin-top:10px">Roger Dubuls Sale</h5>
                    <h5 class="text-center text-success">RM 455.00</h5>
                </div>

                <div class="col-lg-4 py-3">
                    <div class="card border-0">
                        <img src="assets/images/products/glasses.jpg" alt="" style="width:100%;">
                    </div>
                    <h5 class="text-center" style="margin-top:10px">Roger Dubuls Sale</h5>
                    <h5 class="text-center text-success">RM 455.00</h5>
                </div>

                <div class="col-lg-4 py-3">
                    <div class="card border-0">
                        <img src="assets/images/products/skin_care.jpg" alt="" style="width:100%;">
                    </div>
                    <h5 class="text-center" style="margin-top:10px">Roger Dubuls Sale</h5>
                    <h5 class="text-center text-success">RM 455.00</h5>
                </div> -->
            </div>
        </div>
    </body>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $("#dot_1").css("display", "block");
        $("#list_1").hover(function() {
            $("#dot_1").css("display", "block");
        }, function() {
            $("#dot_1").css("display", "block");
        });


        $(window).click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_1").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_1").hover(function() {
                    $("#dot_1").css("display", "block");
                }, function() {
                    $("#dot_1").css("display", "block");
                });
            }
        });


        $("#list_2").click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_1").css("display", "none");
                $("#dot_2").css("display", "block");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "block");
                });

                $("#list_1").hover(function() {
                    $("#dot_1").css("display", "block");
                }, function() {
                    $("#dot_1").css("display", "none");
                });
            } else {
                $("#dot_1").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_1").hover(function() {
                    $("#dot_1").css("display", "block");
                }, function() {
                    $("#dot_1").css("display", "block");
                });
            }
        });
    });
</script>
<?php require_once("footer.php") ?>

</html>