<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
<style>
    body {
        background-color: #ebeff2;
        font-family: 'Times New Roman', Times, serif;
    }

    p {
        color: black !important;
    }

    .main-header-top a:hover {
        text-decoration: none;
    }

    .main-header-top .top-nav .settings-menu a {
        font-size: 13px;
        font-weight: 500;
        text-transform: capitalize;
        color: #666;
        -webkit-transition: all ease-in 0.3s;
        -moz-transition: all ease-in 0.3s;
        -ms-transition: all ease-in 0.3s;
        transition: all ease-in 0.3s;
    }

    .settings-menu a li i {
        font-size: 18px;
        margin-right: 10px;
        width: 20px;
        vertical-align: middle;
    }

    .active-sidebar>a {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #7EC4A0 !important;
    }

    .dropbtn-header1,
    .dropbtn-header {
        background-color: transparent;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        z-index: 500;
    }

    .dropdown-header {
        transition: ease 0.3s;
        position: absolute;
        display: inline-block;
        top: -4px;
        right: 80px;
        padding: 0px;
    }

    .dropdown-header1 {
        transition: ease 0.3s;
        position: absolute;
        display: inline-block;
        top: -5px;
        right: 210px;
        color: white;
        padding: 0px;
    }

    .dropdown-content-header {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        right: -37px;
        min-width: 130px;
        overflow: auto;
        /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
        z-index: 1;
        border-radius: 10px;
    }

    .dropdown-content-header1 {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        right: -165px;
        min-width: 400px;
        overflow: auto;
        /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
        z-index: 1;
        border-radius: 10px;
    }

    .dropdown-content-header1 h5,
    .dropdown-content-header1 a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        background-color: white;
    }

    .dropdown-content-header1 .col-lg-12 {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .dropdown-content-header1 a {
        border-bottom: 1px solid #f1f1f1;
    }

    .dropdown-content-header a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content-header a:hover,
    .dropdown-content-header1 a:hover {
        background-color: #ddd;
    }



    .dropdown-show {
        display: block;
    }

    .tri {
        width: 20px;
        height: 20px;
        border-right: 20px solid transparent;
        border-bottom: 20px solid #f1f1f1;
        border-left: 20px solid transparent;
        margin-top: -15px;
        margin-left: 7px;
        display: none;
    }

    .tri1 {
        width: 20px;
        height: 20px;
        border-right: 20px solid transparent;
        border-bottom: 20px solid #7EC4A0;
        border-left: 20px solid transparent;
        margin-top: -15px;
        margin-left: 8px;
        display: none;
    }

    .top-nav a {
        text-decoration: none !important;
    }

    /* .top-nav a:hover {
        text-decoration: none !important;
    } */

    .view_notification:hover {
        background-color: white !important;
        text-decoration: underline !important;
    }

    .cart_dot {
        transition: ease 0.3s;
        height: 10px;
        width: 10px;
        background-color: red;
        border-radius: 50%;
        position: absolute;
        right: 0;
        bottom: 0;
    }

    .logo_icon {
        padding: 15px;
        position: absolute;
        z-index: 989;
        top: 0px
    }

    #logo_image {
        width: 60%
    }

    #top_search {
        width: 10%;
        margin: 10px 90px 10px 10px;
        padding: 5px;
        border: none;
        width: 50%;
    }

    #admin_cart {
        position: absolute;
        top: 10px;
        right: 155px;
        color: white;
    }

    @media (max-width: 1040px) {
        .dropdown-content-header {
            right: 0px;
        }

        .dropdown-content-header1 {
            right: -105px;
            min-width: 310px;
        }

        .dropdown-header {
            right: 5px;
        }

        #top_search {
            margin: 5px 150px 5px 0px !important;
        }

        #admin_cart {
            right: 70px;
        }

        .dropdown-header1 {
            right: 110px;
        }
    }

    @media (max-width: 767px) {
        .logo_icon {
            top: 45px;
        }


    }
</style>
<header class="main-header-top hidden-print" style="z-index:100;background-color:green">
    <!-- <img class="img-fluid able-logo" src="" alt="Theme-logo"> -->
    <!-- <a href="admin.php" class="logo">Logo</a> -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
        <!-- Navbar Left Menu-->
        <input type="search" placeholder="search" id="top_search" />

        <!-- Navbar Right Menu-->
        <div class="navbar-custom-menu">
            <ul class="top-nav">

                <div class="dropdown-header1">
                    <button class="dropbtn-header1">
                        <i class="fa fa-bell-o" aria-hidden="true" style="font-size:25px;"></i>
                    </button>
                    <div class="tri1"></div>
                    <div class="dropdown-content-header1" id="myDropdown1">
                        <h5 class="text-center" style="background-color:#7EC4A0;color:white;margin-bottom:0">8 New <br><span style="font-size:15px;padding-bottom:0">Notifications</span></h5>
                        <div class="col-lg-12">
                            <a href="#" id="">
                                <div class="row">
                                    <div class="col-lg-2 text-center">
                                        <div style="background-color:#EAF9F1;width:50px;height:50px;border-radius:50%;padding-top:4px">
                                            <i class="bi bi-box-seam" style="font-size:27px;color:#7EC4A0;"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 mt-1" style="padding-left:0">
                                        <div class="row" style="margin-left:0;margin-right:0">
                                            <div class="col-lg-8">
                                                <span>Order has been delivered</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span style="color:#A9BAC9">14 sec ago</span>
                                            </div>
                                            <div class="col-lg-12" style="margin-left:15px">
                                                <span style="color:#738599;">Order number 4563495652 has been delivered</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="#" id="">
                                <div class="row">
                                    <div class="col-lg-2 text-center">
                                        <div style="background-color:#EAF9F1;width:50px;height:50px;border-radius:50%;padding-top:4px">
                                            <i class="bi bi-box-seam" style="font-size:27px;color:#7EC4A0;"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 mt-1" style="padding-left:0">
                                        <div class="row" style="margin-left:0;margin-right:0">
                                            <div class="col-lg-8">
                                                <span>Order has been delivered</span>
                                            </div>
                                            <div class="col-lg-4">
                                                <span style="color:#A9BAC9">14 sec ago</span>
                                            </div>
                                            <div class="col-lg-12" style="margin-left:15px">
                                                <span style="color:#738599">Order number 4563495652 has been delivered</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="notification.php" style="color:#7EC4A0;" class="text-center view_notification">View All Notifications</h5>
                        </div>
                    </div>
                </div>


                <a href="admin-cart.php" id="admin_cart">
                    <span><i class="ti-bag bag" aria-hidden="true" style="font-size:25px;"></i></span>
                    <?php
                    $sql = "SELECT * FROM admin_cart where admin_id='" . $_SESSION['admin_id'] . "'";
                    $result = $conn->query($sql) or die($conn->error . __LINE__);

                    if ($result->num_rows > 0) {
                    ?>
                        <span class="cart_dot" style="display:block"></span>
                    <?php
                    } else {
                    ?>
                        <span class="cart_dot" style="display:none"></span>
                    <?php
                    }
                    ?>

                </a>

                <div class="dropdown-header">
                    <button class="dropbtn-header"><i class="fa fa-user-circle" aria-hidden="true" style="transition: ease 0.3s;color: white !important;font-size: 22px !important;"></i></button>
                    <div class="tri"></div>
                    <div id="myDropdown" class="dropdown-content-header">
                        <a href="profile.php" class="text-center">Profile</a>
                        <a href="#" id="logout" class="text-center" style="background-color:#7EC4A0;color:white">LOG OUT</a>
                    </div>
                </div>

            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar hidden-print">
    <div class="col-lg-10 offset-lg-2 logo_icon">
        <a href="index.php"><img src="../assets/images/Logo.png" alt="" id="logo_image"></a>
    </div>
    <section class="sidebar" id="sidebar-scroll">
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu" style="padding-top:50px;">
            <li class="treeview" id="menu1">
                <a class="waves-effect waves-dark" href="index.php">
                    <i class="fa fa-home" aria-hidden="true"></i><span> Home</span>
                </a>
            </li>
            <li class="treeview" id="menu2">
                <a class="waves-effect waves-dark" href="sales-report.php">
                    <i class="bi bi-receipt-cutoff"></i><span> Sales Report</span>
                </a>
            </li>
            <li class="treeview" id="menu3">
                <a class="waves-effect waves-dark" href="shopping.php">
                    <i class="bi bi-shop"></i><span>Shopping</span>
                </a>
            </li>
            <li class="treeview" id="menu4">
                <a class="waves-effect waves-dark" href="my-order.php">
                    <i class="bi bi-box-seam"></i><span> My Order</span>
                </a>
            </li>
            <li class="treeview" id="menu5">
                <a class="waves-effect waves-dark" href="team-management.php">
                    <i class="fa fa-users" aria-hidden="true"></i><span> Team Management</span>
                </a>
            </li>

            <li class="treeview" id="menu6">
                <a class="waves-effect waves-dark" href="membership.php">
                    <i class="ti-gift"></i><span> Membership</span>
                </a>
            </li>
            <?php
            if (isset($_SESSION['admin_id'])) {
                $SuperSQL = "SELECT * FROM admin WHERE admin_unique_id = '" . $_SESSION['admin_id'] . "'";
                $SuperResult = mysqli_query($conn, $SuperSQL) or die($conn->error . __LINE__);
                if (mysqli_num_rows($SuperResult) > 0) {
                    while ($row = $SuperResult->fetch_assoc()) {
                        $AdminRole = $row['admin_role'];
                    }

                    if ($AdminRole == 'Super Admin') {
            ?>
                        <li class="treeview" id="menu7">
                            <a class="waves-effect waves-dark" href="product.php">
                                <i class="fa fa-file"></i><span> Products</span>
                            </a>
                        </li>
                        <li class="treeview" id="menu8">
                            <a class="waves-effect waves-dark" href="category.php">
                                <i class="fa fa-tag"></i><span> Category</span>
                            </a>
                        </li>
                        <li class="treeview" id="menu9">
                            <a class="waves-effect waves-dark" href="shipping-method.php">
                                <i class="fa fa-truck"></i><span> Shipping Method</span>
                            </a>
                        </li>

                        <li class="treeview" id="menu10">
                            <a class="waves-effect waves-dark" href="insert_code.php">
                                <i class="fa fa-users" aria-hidden="true"></i><span> Insert_Code</span>
                            </a>
                        </li>
            <?php
                    }
                }
            }
            ?>
        </ul>
    </section>
</aside>
<!-- Required Jqurey -->
<script src="../assets/plugins/Jquery/dist/jquery.min.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/plugins/tether/dist/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Scrollbar JS-->
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="../assets/plugins/classie/classie.js"></script>

<!-- notification -->
<!-- <script src="../assets/plugins/notification/js/bootstrap-growl.min.js"></script> -->

<!-- Sparkline charts -->
<script src="../assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

<!-- Counter js  -->
<script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../assets/plugins/countdown/js/jquery.counterup.js"></script>

<!-- Echart js -->
<script src="../assets/plugins/charts/echarts/js/echarts-all.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<!-- custom js -->
<script type="text/javascript" src="../assets/js/main.min.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard.js"></script>
<script type="text/javascript" src="../assets/pages/elements.js"></script>
<script src="../assets/js/menu.min.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */


    // Close the dropdown if the user clicks outside of it


    $(".dropbtn-header").click(function() {
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
    });

    $(".dropbtn-header1").click(function() {
        if ($(".tri1").css("display") == "none") {
            $(".tri1").css({
                display: "block"
            });
            document.getElementById("myDropdown1").classList.toggle("dropdown-show");
        } else {
            var dropdowns = document.getElementsByClassName("dropdown-content-header1");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('dropdown-show')) {
                    openDropdown.classList.remove('dropdown-show');
                }
            }
            if ($(".tri1").css("display") == "block") {
                $(".tri1").css({
                    display: "none"
                });
            }
        }
    });


    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn-header1') && !event.target.matches('.fa-bell-o')) {
            var dropdowns = document.getElementsByClassName("dropdown-content-header1");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('dropdown-show')) {
                    openDropdown.classList.remove('dropdown-show');
                }
            }
            if ($(".tri1").css("display") == "block") {
                $(".tri1").css({
                    display: "none"
                });
            }
        }

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
    }


    $("#logout").click(function() {
        $.ajax({
            url: "../ajax.php",
            type: "post",
            data: {
                admin_logout: "logout"
            },
            dataType: "text",
            success: function(data) {
                if (data == "Yes") {
                    window.location.assign('admin-login.php');
                }
            }
        });
    });
</script>