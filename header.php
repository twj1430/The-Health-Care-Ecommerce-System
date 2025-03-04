<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

    <!-- Latest compiled and minified CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <style>
        @media screen and (max-width:991px) {
            .tri {
                left: 10px !important;
            }

            #header .dropdown-show {
                top: 297px;
                left: 5px;
            }
        }

        .dropdown-item:focus {
            background-color: rgb(248, 248, 248) !important;
            color: black;
        }
    </style>
</head>

<html>
<html lang="en">
<section id="header">
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/Logo.png" alt="logo" style="width:100%">
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 nav1" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="index.php" id="list_1">HOME</a>
                    <div class="dot_relative">
                        <span class="dot" id="dot_1"></span>
                    </div>
                </li>

                <li class="nav-item active">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" id="list_2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SHOP
                        </button>
                        <div class="dot_relative">
                            <span class="dot" id="dot_2"></span>
                        </div>
                        <div class="dropdown-menu show_dropdown" aria-labelledby="list_2">

                            <div class="container product_category">
                                <div class="row">
                                    <div class="col-lg-12 product_category_list">
                                        <!-- <img src="https://www.teahub.io/photos/full/57-577113_photo-wallpaper-makeup-shadows-cosmetics-blush-backgrounds-makeup.jpg" alt="" style="width:100%"> -->
                                        <div class="card border-0">
                                            <!-- <a href="product-list.php?id=1" class="product_list_A">
                                                <h3>Product A</h3>
                                            </a> -->
                                            <?php
                                            $sql = "SELECT * FROM products";
                                            $result = $conn->query($sql) or die($conn->die . __LINE__);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <a class="dropdown-item" href="product-details.php?id=<?php echo $row['product_id'] ?>">
                                                        <img src="assets/images/products/<?php echo $row['product_image'] ?>" alt="" style="width:100%">
                                                        <h3>
                                                            -<?php echo $row['product_name'] ?>
                                                        </h3>
                                                    </a>

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
                </li>

                <!-- <li class="nav-item active">
                <a href="" id="list_2">SHOP</a>
                <div class="dot_relative">
                    <span class="dot" id="dot_2"></span>
                </div>
            </li> -->

                <li class="nav-item active">
                    <a href="tracking.php" id="list_3">TRACKING</a>
                    <div class="dot_relative">
                        <span class="dot" id="dot_3"></span>
                    </div>
                </li>

                <!-- <li class="nav-item active">
                    <a href="join-us.php" id="list_4">JOIN US</a>
                    <div class="dot_relative">
                        <span class="dot" id="dot_4"></span>
                    </div>
                </li> -->

                <li class="nav-item active">
                    <a href="contact-us.php" id="list_5">CONTACT US</a>
                    <div class="dot_relative">
                        <span class="dot" id="dot_5"></span>
                    </div>
                </li>

                <!-- <li class="nav-item active">
                    <a href="verify.php" id="list_6">VERIFICATION</a>
                    <div class="dot_relative">
                        <span class="dot" id="dot_6"></span>
                    </div>
                </li> -->

                <!-- <li class="nav-item active">
                    <a href="search.php"><i class="ti-search" aria-hidden="true"></i></a>
                </li> -->

                <li class="nav-item active" style="margin-right:200px">
                    <a href="cart.php"><i class="ti-bag" aria-hidden="true"></i></a>
                    <?php
                    if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) {
                        $count = 0;
                        foreach ($_SESSION['cart_item'] as [
                            "product_id" => $product_id,
                            "product_quantity" => $product_quantity,
                            "cart_total_price" => $cart_total_price
                        ]) {
                            $count += $product_quantity;
                        }
                        echo "<span class='cart_dot'  style='display:block'>" . $count . "</span>";
                    } else {
                        echo '<span class="cart_dot"  style="display:none"></span>';
                    } ?>
                </li>

                <!-- <li class="nav-item active" style="margin-right:200px">
                    <a href="cn/" class="btn language">
                        EN
                    </a>
                </li> -->
            </ul>
        </div>
    </nav>
</section>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if ((!event.target.matches('.dropbtn-header') && !event.target.matches('.fa-user-circle')) && (!event.target.matches('.new_dropbtn') && !event.target.matches('.bi-chevron-down') && !event.target.matches('.choices')) && !event.target.matches('.modal_sub_image')) {
                if (!event.target.matches('.dropbtn-header') && !event.target.matches('.fa-user-circle')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content-header");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('dropdown-show')) {
                            openDropdown.classList.remove('dropdown-show');
                        }
                    }
                    if ($(".tri").css("display") == "block") {
                        $(".tri").css({
                            display: "none"
                        });
                    }
                }

                if (!event.target.matches('.new_dropbtn') && !event.target.matches('.bi-chevron-down') && !event.target.matches('.choices')) {
                    var hasFocus = $('#myInput').is(':focus');
                    if (!hasFocus) {
                        $("#new_mynew_Dropdown").removeClass("show");
                        $('#myInput').val("");
                        var input, filter, ul, li, a, i;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        div = document.getElementById("new_mynew_Dropdown");
                        a = div.getElementsByTagName("a");
                        for (i = 0; i < a.length; i++) {
                            txtValue = a[i].textContent || a[i].innerText;
                            a[i].style.display = "";
                        }
                    }
                }

                if (event.target.matches('.modal_sub_image')) {
                    if ($("#myModal").css("display") == "block") {
                        $("#myModal").css({
                            display: "none"
                        })
                    }
                }

            } else {

                if (event.target.matches('.new_dropbtn') || event.target.matches('.bi-chevron-down')) {
                    if (!$("#new_mynew_Dropdown").hasClass('show')) {
                        $("#new_mynew_Dropdown").addClass("show");
                    } else {
                        $("#new_mynew_Dropdown").removeClass("show");
                        $('#myInput').val("");
                        var input, filter, ul, li, a, i;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        div = document.getElementById("new_mynew_Dropdown");
                        a = div.getElementsByTagName("a");
                        for (i = 0; i < a.length; i++) {
                            txtValue = a[i].textContent || a[i].innerText;
                            a[i].style.display = "";
                        }
                    }
                }

                if (event.target.matches('.dropbtn-header') || event.target.matches('.fa-user-circle')) {
                    if ($(".tri").css("display") == "none") {
                        $(".tri").css({
                            display: "block"
                        });
                        document.getElementById("myDropdown").classList.toggle("dropdown-show");
                    } else {
                        var dropdowns = document.getElementsByClassName("dropdown-content-header");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('dropdown-show')) {
                                openDropdown.classList.remove('dropdown-show');
                            }
                        }
                        if ($(".tri").css("display") == "block") {
                            $(".tri").css({
                                display: "none"
                            });
                        }
                    }
                }
            }
        }

        $(".cart_dot").click(function() {
            location.assign('cart.php');
        });
    });
</script>
<script type="text/javascript" src="assets/js/js.js"></script>

</html>