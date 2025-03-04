<?php
include("db.php");
if (!isset($_SESSION['list_id'])) {
    if (isset($_GET['id'])) {
        $_SESSION['list_id'] = $_GET['id'];
    } else {
        unset($_SESSION['list_id']);
        echo "<script>window.location.assign('index.php')</script>";
    }
}else{
    if (isset($_GET['id'])) {
        $_SESSION['list_id'] = $_GET['id'];
    }
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
            padding-top: 72px;
            /* background: rgb(250, 250, 250) !important; */
        }

        .dropdown-toggle::after {
            display: none !important;
        }
    </style>
</head>


<?php include("header.php") ?>

<section id="product_list">

    <body>
        <div class="col-lg-12 product_list_image text-center">
            <h1 class="product_category_name">Product A</h1>
            <input type="hidden" id="category_id" value="<?php echo $_SESSION['list_id'] ?>">
        </div>

        <div class="container-fluid py-5">
            <div class="col-lg-6">
                <a href="index.php">HOME</a> >
                <button style="border:none;background:none" id="">SHOP</button> >
                <!-- <a href=""></a> --> <b>AIMPRO Eye Care by THC</b>
            </div>
        </div>

        <div class="container py-5">
            <div class="row" style="margin-left:0;margin-right:0">
                <div class="col-lg-6">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" style="width:40%;border-radius: 0;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-funnel"></i> &nbsp;FILTER
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="position: absolute;transform: translate3d(0px, 35px, 0px);top: 0px;left: 0px;height: 220px;overflow-y: auto;will-change: transform; width: 40%;">
                            <a class="dropdown-item data_id" data-id="a">A</a>
                            <a class="dropdown-item data_id" data-id="b">B</a>
                            <a class="dropdown-item data_id" data-id="c">C</a>
                            <a class="dropdown-item data_id" data-id="d">D</a>
                            <a class="dropdown-item data_id" data-id="e">E</a>
                            <a class="dropdown-item data_id" data-id="f">F</a>
                            <a class="dropdown-item data_id" data-id="g">G</a>
                            <a class="dropdown-item data_id" data-id="h">H</a>
                            <a class="dropdown-item data_id" data-id="i">I</a>
                            <a class="dropdown-item data_id" data-id="j">J</a>
                            <a class="dropdown-item data_id" data-id="k">K</a>
                            <a class="dropdown-item data_id" data-id="l">L</a>
                            <a class="dropdown-item data_id" data-id="m">M</a>
                            <a class="dropdown-item data_id" data-id="n">N</a>
                            <a class="dropdown-item data_id" data-id="o">O</a>
                            <a class="dropdown-item data_id" data-id="p">P</a>
                            <a class="dropdown-item data_id" data-id="q">Q</a>
                            <a class="dropdown-item data_id" data-id="r">R</a>
                            <a class="dropdown-item data_id" data-id="s">S</a>
                            <a class="dropdown-item data_id" data-id="t">T</a>
                            <a class="dropdown-item data_id" data-id="u">U</a>
                            <a class="dropdown-item data_id" data-id="v">V</a>
                            <a class="dropdown-item data_id" data-id="w">W</a>
                            <a class="dropdown-item data_id" data-id="x">X</a>
                            <a class="dropdown-item data_id" data-id="y">Y</a>
                            <a class="dropdown-item data_id" data-id="z">Z</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                </div> -->
            <div class="row" id="show_product_list" style="margin-left:0;margin-right:0">
                <?php
                $sql = "SELECT * FROM products where category_id='" . $_SESSION['list_id'] . "'";
                $result = $conn->query($sql) or die($conn->error . __LINE__);

                $number_of_results = mysqli_num_rows($result);
                //define how many results you want per page
                $results_per_page = 3;

                //determine number of total pages available
                $number_of_pages = ceil($number_of_results / $results_per_page);

                //determine which page number visitor is currently on
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                //determine the sql LIMIT starting number for the results on the displaying page
                $this_page_first_result = ($page - 1) * $results_per_page;

                //$retrieve the sql LIMIT starting number for the results on the displaying page
                $sqli = "SELECT * FROM products where category_id='" . $_SESSION['list_id'] . "' ORDER BY product_create_time DESC LIMIT  " . $this_page_first_result . ',' . $results_per_page;

                $results = mysqli_query($conn, $sqli) or die($conn->error . __LINE__);

                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $product_description = $row['product_description'];
                        $product_image = $row['product_image'];
                        $product_price = $row['product_price'];
                ?>
                        <div class="col-lg-4 py-3">
                            <a href="product-details.php?id2=<?php echo $product_id ?>">
                                <div class="card border-0">
                                    <img src="assets/images/products/<?php echo $product_image ?>" alt="" style="width:100%;">
                                </div>
                            </a>
                            <h5 class="text-center" style="margin-top:10px"><?php echo $product_name ?></h5>
                            <h5 class="text-center text-success">RM <?php echo $product_price ?>.00</h5>
                        </div>
                <?php
                    }


                    echo '<div class="col-lg-12 text-center">';

                    for ($page1 = 1; $page1 <= $number_of_pages; $page1++) {
                        if ($page == $page1) {
                            echo '<a href="product-list.php?page=' . $page1 . '" class="btn btn-dark next" style="border-radius:0;margin-left:10px;">' . $page1 . '</a>';
                        } else {
                            echo '<a href="product-list.php?page=' . $page1 . '" class="btn btn-outline-dark next" style="border-radius:0;margin-left:10px;">' . $page1 . '</a>';
                        }
                    }
                    echo '<a href="product-list.php?page=' . $number_of_pages . '" class="btn btn-outline-dark next" style="border-radius:0;margin-left:10px;">></a></div>';
                }
                ?>
            </div>
        </div>
    </body>
</section>

<?php require_once("footer.php") ?>
<script>
    $(document).ready(function() {
        $(".data_id").click(function() {
            var data_id = $(this).attr("data-id");
            // console.log(data_id);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    filter_id: data_id,
                    category_id: $("#category_id").val()
                },
                dataType: "text",
                success: function(response) {
                    $("#show_product_list").html(response);
                    // console.log(response);
                }
            });
        });
    });
</script>

</html>