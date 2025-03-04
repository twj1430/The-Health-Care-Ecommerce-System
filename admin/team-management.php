<?php
include("../db.php");
include("login-authentication.php");
if (!isset($_SESSION['admin_id'])) {
    echo "<script>window.alert('You have to login first!');window.location.assign('admin-login.php')</script>";
}
// if(isset($_SESSION['admin_id'])){
//     $id = $_SESSION['admin_id'];
//     $sql = "SELECT * FROM admin WHERE admin_unique_id = '$id'";
//     $result = mysqli_query($conn,$sql) or die($conn->error . __LINE__);
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $admin_username = $row['admin_username'];
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Team Management</title>
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
    <!-- <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.min.css"> -->

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <style>
        body {
            padding-bottom: 60px;
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

        .active-sidebar>a {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #7EC4A0 !important;
        }

        table>thead>tr {
            color: white !important;
        }

        .pick {
            cursor: pointer;
        }

        .dropdown-content-header2,
        .dropdown-content-header3 {
            transition: ease 0.5s;
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            top: 192px;
            right: 110px;
            min-width: 310px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
            z-index: 1;
            border-radius: 10px;
        }

        .dropdown-content-header3 h5,
        .dropdown-content-header2 h5,
        .dropdown-content-header2 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content-header2 a:hover {
            background-color: #ddd;
        }

        .whatsapp_link {
            padding: 0 !important;
            text-decoration-color: blue !important;
        }

        .whatsapp_link:hover {
            text-decoration: underline !important;
            text-decoration-color: blue !important;
            background-color: transparent !important
        }


        .dropdown-show {
            display: block;
        }

        @media screen and (max-width:1156px) {

            .dropdown-content-header3,
            .dropdown-content-header2 {
                transition: ease 0.5s;
                right: 50px;
            }
        }

        @media screen and (max-width:1140px) {

            .dropdown-content-header3,
            .dropdown-content-header2 {
                transition: ease 0.5s;
                right: 0px;
            }
        }

        @media screen and (max-width:1123px) {

            .dropdown-content-header3,
            .dropdown-content-header2 {
                transition: ease 0.5s;
                right: 50px;
            }
        }

        @media screen and (max-width:991px) {

            .text-right {
                text-align: left !important;
            }

            .wechat_icon {
                margin-bottom: 1rem !important;
            }

            .dropdown-content-header3,
            .dropdown-content-header2 {
                transition: ease 0.5s;
                right: 0%;
                top: 94%;
                transform: translate(-50%, 0%);
                left: 50%;
            }
        }


        /* */
        /*the container must be positioned relative:*/
        .custom-select {
            position: relative;
            font-family: Arial;
        }

        .custom-select select {
            display: none;
            /*hide original SELECT element:*/
        }

        /* .select-selected {
background-color: DodgerBlue;
} */

        /*style the arrow inside the select element:*/
        .select-selected:after {
            position: absolute;
            /* content: ""; */
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
        }

        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
            /* border-color: transparent transparent #fff transparent; */
            top: 7px;
        }

        /*style the items (options), including the selected item:*/
        .select-items div {
            color: black;
            padding: 5px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
            background-color: white;
        }

        .select-selected {
            cursor: pointer;
            margin-right: -40px;
            margin-left: -10px;
            margin-top: -10px;
            padding-left: 5px;
            padding-top: 11px;
            width: 120%;
            height: 160%;
            color: #7EC4A0;
        }

        /*style items (options):*/
        .select-items {
            position: absolute;
            /* background-color: DodgerBlue; */
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
        }

        /*hide the items when the select box is closed:*/
        .select-hide {
            display: none;
        }

        .select-items div:hover,
        .same-as-selected {
            background-color: DodgerBlue;
        }

        /* */

        .custom-select {
            cursor: pointer;
            width: 100%;
            margin: 10px 90px 10px 0;
            border: none;
            border-radius: 0;
            color: #7EC4A0;
        }

        .custom-select>option {
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
                        <!-- <h4>Dashboard</h4> -->
                    </div>
                </div>

                <!-- 4-blocks row start -->
                <div class="col-lg-12" style="padding: 0 20px;">

                    <div class="row dashboard-header">
                        <div class="col-lg-6 col-md-6">
                            <?php
                            if (isset($_SESSION['admin_id'])) {
                                $sql = "SELECT * FROM admin WHERE admin_unique_id = '" . $_SESSION['admin_id'] . "'";
                                $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $admin_upline_id = $row['admin_upline_id'];
                                    }

                                    $sql2 = "SELECT * FROM admin WHERE admin_unique_id = '$admin_upline_id'";
                                    $result2 = mysqli_query($conn, $sql2) or die($conn->error . __LINE__);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = $result2->fetch_assoc()) {
                            ?>
                                            <h4>Upline</h4>
                                            <div class="card dashboard-product">
                                                <div class="row">
                                                    <div class="col-lg-3 text-center pick">
                                                        <img src="../assets/images/<?php echo $row['admin_profile_image']; ?>" alt="avatar" width="90" style="border-radius: 50px;">
                                                    </div>
                                                    <div class="col-lg-7 pick">
                                                        <h5 class="dashboard-total-products"><?php echo $row['admin_username']; ?></h5>
                                                        <p style="font-size:15px;">+60 <?php echo $row['admin_contact_number']; ?></p>
                                                        <p style="font-size:15px;"><?php echo $row['admin_email']; ?></p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="row" style="margin-right:0">
                                                            <div class="col-lg-6">
                                                                <a href="#" id="get_wechat"><img src="../assets/images/wechat.png" alt="wechat" width="25"></a>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <a href="https://api.whatsapp.com/send?phone=+6010-8820074"><img src="../assets/images/whatsapp.png" alt="whatsapp" width="25"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div id="myDropdown2" class="dropdown-content-header2">
                                                    <div class="col-lg-12" style="padding-left:0;padding-right:0;">

                                                        <div style="background-color:#7EC4A0;width:100%;height:100px;border-radius:10px 10px 0 0;">
                                                            <i class="fa fa-times" aria-hidden="true" style="color: white;cursor: pointer;font-size: 30px;position: absolute;top: 8px;right: 8px;"></i>
                                                        </div>

                                                        <div class="col-lg-12 text-center" style="position:absolute;top:50px">
                                                            <img src="../assets/images/<?php echo $row['admin_profile_image']; ?>" alt="avatar" width="90" style="border-radius: 50px;">
                                                        </div>

                                                        <div class="col-lg-12 text-center mt-5">
                                                            <h5 class="dashboard-total-products" style="padding:0"><?php echo $row['admin_username']; ?></h5>
                                                            <p style="font-size:15px;margin-bottom:0">+60 <?php echo $row['admin_contact_number']; ?></p>
                                                            <p style="font-size:15px;"><?php echo $row['admin_email']; ?></p>
                                                        </div>

                                                        <hr>

                                                        <div class="row mt-2" style="margin-left:0;margin-right:0;">
                                                            <div class="col-lg-6 text-left">
                                                                <h6>Join Date</h6>
                                                            </div>

                                                            <div class="col-lg-6 text-right">
                                                                <h6 class="text-dark">2021-01-25</h6>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2" style="margin-left:0;margin-right:0;">
                                                            <div class="col-lg-6 text-left">
                                                                <h6>WeChat</h6>
                                                            </div>

                                                            <div class="col-lg-6 text-right">
                                                                <h6 class="text-dark">Anson Liew_999</h6>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2" style="margin-left:0;margin-right:0;">
                                                            <div class="col-lg-6 text-left">
                                                                <h6>WhatsApp</h6>
                                                            </div>

                                                            <div class="col-lg-6 text-right">
                                                                <a href="https://api.whatsapp.com/send?phone=+6010-8820074" class="text-dark whatsapp_link">
                                                                    <h6 class="text-primary">Link</h6>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div id="myDropdown3" class="dropdown-content-header3">
                                                    <div style="height:20px;border-radius:10px 10px 0 0;">
                                                        <i class="fa fa-times" aria-hidden="true" style="color: black;cursor: pointer;font-size: 30px;position: absolute;top: 8px;right: 8px;"></i>
                                                    </div>
                                                    <div class="col-lg-12" style="padding-left:0;padding-right:0;">
                                                        <div class="col-lg-12 text-center mt-2">
                                                            <img src="../assets/images/wechat.png" id="get_wechat" alt="wechat" width="50">
                                                            <h5>Wechat ID</h5>
                                                        </div>
                                                        <div class="col-lg-12 text-center mt-2 mb-1">
                                                            <input type="text" value="<?php echo $row['admin_wechat']; ?>" id="copyLinktext" style="margin: 10px 0px 10px 0;padding: 0 3px 0 3px;border: none;width: 73%;background-color: transparent;text-align:center" readonly />
                                                            <i class="fa fa-clipboard copyLink3" aria-hidden="true" id="copyLink3" style="position: relative;z-index: 1;top: 13px;right: 10px;float: right;font-size:19px"></i> <br>
                                                            <span id="copy_word1" style="color: green;"></span>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style="padding: 0 20px;">
                    <h4>Downlines</h4>
                    <div class="row">
                        <div class="col-lg-2 text-left">
                            <select class="custom-select" id="custom-select1">
                                <option value="1" selected>NEW TO OLD</option>
                                <option value="2">OLD TO NEW</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <input type="search" placeholder="Search" name="search_text" id="search_text" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
                        </div>

                        <div class="col-lg-5 col-md-3"></div>

                        <div class="col-lg-2 col-md-7">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inviteModal" style="margin:10px 0 10px 0;padding: 9px;border:none;width:100%;">Invite Downline &nbsp;&nbsp;<i class="fa fa-share-alt" aria-hidden="true"></i></button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="inviteModal" tabindex="-1" aria-labelledby="inviteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="../assets/images/Logo.jpg" alt="logo" width="300">
                                        </div>
                                        <h4>Invite Downlines</h4>
                                        <label for="link" style="margin-top: 10px;">Your Invite Link </label>
                                        <div style="border:none;width: 100%;background-color: #e5e5e5;">
                                            <input type="text" value="https://www.thehealthcareofficial.com/admin/admin-inviteRegister.php?invID=<?php echo $_SESSION['admin_id']; ?>" id="copyLink" style="margin:10px 90px 10px 0;padding:0 3px 0 3px;border:none;width: 94%;background-color: #e5e5e5;" readonly />
                                            <i class="fa fa-clipboard" aria-hidden="true" id="copyLink2" style="position: relative; z-index: 1; top: -30px;right: 10px;float: right;"></i>
                                        </div>
                                        <span id="copy_word" style="color: green;"></span>


                                        <a href="admin-inviteRegister.php?invID=<?php echo $_SESSION['admin_id']; ?>" target="_blank" class="btn btn-success" style="margin:50px 0 50px 0;padding:20px;border:none;width:100%;color:white;">Share &nbsp;&nbsp;<i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card dashboard-product table-border">
                        <input type="hidden" name="admin_id_table" id="admin_id_table" value="<?php echo $_SESSION['admin_id']; ?>">

                        <input type="hidden" name="admin_role" id="admin_role" value="<?php echo $_SESSION['admin_role']; ?>">
                        <div id="result"></div>
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
        $('#menu3').removeClass("active-sidebar");
        $('#menu4').removeClass("active-sidebar");
        $('#menu5').addClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");

        document.getElementById("copyLink2").onclick = function() {
            var copyText = document.getElementById("copyLink");
            // var copyText2 = document.getElementById("copyLink").value;
            copyText.select();
            document.execCommand('copy');
            $("#copy_word").html("Invite Link Has Been Copied");
        }

        $("#copyLink3").click(function() {
            var copyText = $("#copyLinktext");
            copyText.select();
            document.execCommand('copy');
            $("#copy_word1").html("Wechat ID Has Been Copied");
        });

        load_data(1);

        function load_data(page, query) {
            $.ajax({
                url: "team-table.php",
                method: "POST",
                data: {
                    selection: $("#custom-select1").val(),
                    page: page,
                    query: query,
                    admin_id_table: $('#admin_id_table').val()
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }

        $("#custom-select1").change(function() {
            load_data(1);
        })

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_text').val();
            load_data(page, query);
        });

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(1, search);
            } else {
                load_data(1);
            }
        });

        $('#sort_team').change(function() {
            var sort = $(this).val();
            if (sort != '') {
                load_data(1, sort);
            } else {
                load_data(1);
            }
        });

        $(".fa-times").click(function() {
            $(".dropdown-content-header2").css({
                display: "none"
            });

            $(".dropdown-content-header3").css({
                display: "none"
            });
        });

        $(".pick").click(function() {
            if ($(".dropdown-content-header2").css("display") == "none") {
                if ($(".dropdown-content-header3").css("display") == "none") {
                    $(".dropdown-content-header2").css({
                        display: "block"
                    });
                } else {
                    $(".dropdown-content-header3").css({
                        display: "none"
                    });

                    $(".dropdown-content-header2").css({
                        display: "block"
                    });
                }
            } else {
                $(".dropdown-content-header3").css({
                    display: "none"
                });

                $(".dropdown-content-header2").css({
                    display: "none"
                });
            }
        });

        $("#get_wechat").click(function() {
            if ($(".dropdown-content-header3").css("display") == "none") {
                if ($(".dropdown-content-header2").css("display") == "none") {
                    $(".dropdown-content-header3").css({
                        display: "block"
                    });
                } else {
                    $(".dropdown-content-header2").css({
                        display: "none"
                    });

                    $(".dropdown-content-header3").css({
                        display: "block"
                    });
                }
            } else {
                $(".dropdown-content-header2").css({
                    display: "none"
                });

                $(".dropdown-content-header3").css({
                    display: "none"
                });
            }
        });
    });
</script>


</html>