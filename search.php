<?php
include("db.php");

// if(isset($_POST['search'])){
//     $sql ="SELECT * FROM products WHERE product_name LIKE '%".$_POST["search"]."%'";
//     $result = $conn->query($sql) or die($conn->error . __LINE__);
// }
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

        a:hover {
            text-decoration: none !important;
            color: black !important;
        }

        .search_input {
            width: 70%;
        }

        .search_btn {
            width: 40%;
        }

        @media screen and (max-width:991px) {

            .search_input,
            .search_btn {
                float: none;
                width: 100% !important;
                padding-top: 10px;
            }

            .search_btn1{
                width:100%
            }
        }
    </style>
</head>


<?php include("header.php") ?>

<section id="search_section">

    <body>
        <div class="col-lg-12 search_top">
            <div class="container">
                <form action="search.php" method="POST">
                    <div class="row search_name">
                        <div class="col-lg-8">
                            <div class="float-right search_input">
                                <input type="search" class="form-control" placeholder="Search" name="search" style="height:50px;border-radius:0">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="float-left search_btn">
                                <button class="btn btn-success search_btn1" style="height: 50px;border-radius:0;width:100%"><i class="bi bi-search mr-2"></i>SEARCH</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <?php
                    if (isset($_POST['search'])) {
                        $sql = "SELECT * FROM products WHERE product_name LIKE '%" . $_POST["search"] . "%'";
                        $result = $conn->query($sql) or die($conn->error . __LINE__);
                        if ($result->num_rows > 0) {
                    ?>
                        <div class="col-lg-12">
                            <h2 class="text-center mb-5">Result:</h2>
                        </div>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <div class="col-lg-4 py-3">
                                    <a href="product-details.php?id=<?php echo $row['product_id'] ?>">
                                        <div class="card border-0">
                                            <img src="assets/images/products/<?php echo $row['product_image'] ?>" alt="" style="width:100%;">
                                        </div>
                                        <h5 class="text-center" style="margin-top:10px"><?php echo $row['product_name'] ?></h5>
                                        <h5 class="text-center text-success">RM <?php echo $row['product_price'] ?>.00</h5>
                                    </a>
                                </div>

                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-lg-12">
                                <h2 class="text-center mb-5">Not Found</h2>
                            </div>

                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

        <div class="row" style="margin-left:0;margin-right:0;background-color:rgb(248, 248, 248)">
            <div class="container py-5">
                <h2 class="text-center">Sales Arrivals</h2>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT 3";
                    $result = $conn->query($sql) or die($conn->error . __LINE__);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-lg-4 py-3">
                                <a href="product-details.php?id=<?php echo $row['product_id'] ?>">
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
                    </div> -->
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

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php require_once("footer.php") ?>

</html>