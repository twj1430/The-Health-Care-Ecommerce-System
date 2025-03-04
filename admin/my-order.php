<?php
include("../db.php");
include("login-authentication.php");


if (isset($_POST['submit'])) {
    // <input type="hidden" class="form-control" id="order_code_id" name="order_code_id">
    // <input type="text" class="form-control" id="order_code" name="order_code">
    // <input type="submit" class="btn btn-success" value="submit" name="submit">

    // $sql = "UPDATE payments set verify_code='$order_code',verify_status='1' where payment_id='$order_code_id'";
    // $result = $conn->query($sql) or die($conn->error.__LINE__);

    // if($result){
    //     echo "<script>window.location.reload()</script>";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>my order</title>
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
            background-color: rgba(0, 0, 0, .05);
        }

        table {
            margin-bottom: 0 !important;
        }

        .table tr {
            color: black;
        }

        .table tr .order_list {
            cursor: pointer;
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
            color: #A6ACB2;
        }

        .bg-white:hover {
            background-color: #198754 !important;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            color: #7EC4A0;
            border-color: transparent transparent #7EC4A0 transparent !important;
            border-bottom: 3px solid !important;
            /* isolation: isolate; */
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
            border-bottom: 3px solid !important;
        }

        .nav-tabs .nav-item.show .nav-link:hover,
        .nav-tabs .nav-link.active:hover,
        .nav-tabs .nav-link.active:focus {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
        }


        /*  */
        /*the container must be positioned relative:*/
        .custom-select {
            position: relative;
            font-family: Arial;
        }

        .custom-select select {
            display: none;
            /*hide original SELECT element:*/
        }

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
                        <h4 style="padding-left:10px">My Order</h4>
                    </div>
                </div>
                <!-- 4-blocks row start -->
                <div class="row dashboard-header">
                    <div class="col-lg-12 col-md-6">
                        <div class="dashboard-product" style="background-color:transparent;padding-top:0">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true" style="background-color: #ebeff2; ">All Order</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="paid" aria-selected="false" style="background-color: #ebeff2; ">Paid</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false" style="background-color: #ebeff2; ">Pending</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="complete-tab" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="false" style="background-color: #ebeff2;">Complete</a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="canceled-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false" style="background-color: #ebeff2;">Canceled</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                                <div class="tab-pane active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <select class="custom-select" id="custom-select1">
                                                <option value="1" selected>NEW TO OLD</option>
                                                <option value="2">OLD TO NEW</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="search" placeholder="Search" name="search_order" id="search_order" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 py-2">
                                            <input type="hidden" name="admin_id_table" id="admin_id_table" value="<?php echo $_SESSION['admin_id']; ?>">
                                            <div id="result"></div>
                                        </div>
                                    </div>

                                    <!-- <form action="my-order.php" method="POST" id="order_post"></form> -->
                                    <!-- Modal -->
                                    <!-- <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">

                                        <div class="modal-dialog" id="insert_modal">
                                        </div>
                                    </div>

                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="edittModalLabel" aria-hidden="true">

                                        <div class="modal-dialog" id="edit_modal">
                                        </div>
                                    </div> -->
                                </div>

                                <div class="tab-pane" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <select class="custom-select" id="custom-select2">
                                                <option value="1" selected>NEW TO OLD</option>
                                                <option value="2">OLD TO NEW</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3">
                                            <input type="search" placeholder="Search" name="search_paid" id="search_paid" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 py-2">
                                            <div id="result_paid"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <select class="custom-select" id="custom-select3">
                                                <option value="1" selected>NEW TO OLD</option>
                                                <option value="2">OLD TO NEW</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="search" placeholder="Search" name="search_pending" id="search_pending" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 py-2">
                                            <div id="result_pending"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="complete" role="tabpanel" aria-labelledby="complete-tab">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <select class="custom-select" id="custom-select4">
                                                <option value="1" selected>NEW TO OLD</option>
                                                <option value="2">OLD TO NEW</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="search" placeholder="Search" name="search_complete" id="search_complete" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 py-2">
                                            <div id="result_complete"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <select class="custom-select" id="custom-select5">
                                                <option value="1" selected>NEW TO OLD</option>
                                                <option value="2">OLD TO NEW</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="search" placeholder="Search" name="search_cancel" id="search_cancel" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 py-2">
                                            <div id="result_cancel"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#menu1').removeClass("active-sidebar");
        $('#menu2').removeClass("active-sidebar");
        $('#menu3').removeClass("active-sidebar");
        $('#menu4').addClass("active-sidebar");
        $('#menu5').removeClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");


        load_data(1);
        load_data2(1);
        load_data3(1);
        load_data4(1);
        load_data5(1);

        // All Order 
        function load_data(page, query) {
            $.ajax({
                url: "my-order-table.php",
                method: "POST",
                data: {
                    status: "all",
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
        });

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_order').val();
            load_data(page, query);
        });

        $('#search_order').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(1, search);
            } else {
                load_data(1);
            }
        });

        $('#sort_order').change(function() {
            var sort = $(this).val();
            if (sort != '') {
                load_data(1, sort);
            } else {
                load_data(1);
            }
        });

        // Paid Order
        function load_data2(page, query) {
            $.ajax({
                url: "my-order-table.php",
                method: "POST",
                data: {
                    status: "paid",
                    selection: $("#custom-select2").val(),
                    page: page,
                    query: query,
                    admin_id_table: $('#admin_id_table').val()
                },
                success: function(data) {
                    $('#result_paid').html(data);
                }
            });
        }

        $("#custom-select2").change(function() {
            load_data2(1);
        });

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_paid').val();
            load_data2(page, query);
        });

        $('#search_paid').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data2(1, search);
            } else {
                load_data2(1);
            }
        });

        $('#sort_paid').change(function() {
            var sort = $(this).val();
            if (sort != '') {
                load_data2(1, sort);
            } else {
                load_data2(1);
            }
        });

        // Pending Order
        function load_data3(page, query) {
            $.ajax({
                url: "my-order-table.php",
                method: "POST",
                data: {
                    status: "pending",
                    selection: $("#custom-select3").val(),
                    page: page,
                    query: query,
                    admin_id_table: $('#admin_id_table').val()
                },
                success: function(data) {
                    $('#result_pending').html(data);
                }
            });
        }

        $("#custom-select3").change(function() {
            load_data3(1);
        });

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_pending').val();
            load_data3(page, query);
        });

        $('#search_pending').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data3(1, search);
            } else {
                load_data3(1);
            }
        });

        $('#sort_pending').change(function() {
            var sort = $(this).val();
            if (sort != '') {
                load_data3(1, sort);
            } else {
                load_data3(1);
            }
        });

        // Complete Order
        function load_data4(page, query) {
            $.ajax({
                url: "my-order-table.php",
                method: "POST",
                data: {
                    status: "complete",
                    selection: $("#custom-select4").val(),
                    page: page,
                    query: query,
                    admin_id_table: $('#admin_id_table').val()
                },
                success: function(data) {
                    $('#result_complete').html(data);
                }
            });
        }

        $("#custom-select4").change(function() {
            load_data4(1);
        });

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_complete').val();
            load_data4(page, query);
        });

        $('#search_complete').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data4(1, search);
            } else {
                load_data4(1);
            }
        });

        $('#sort_complete').change(function() {
            var sort = $(this).val();
            if (sort != '') {
                load_data4(1, sort);
            } else {
                load_data4(1);
            }
        });

        // Cancel Order
        function load_data5(page, query) {
            $.ajax({
                url: "my-order-table.php",
                method: "POST",
                data: {
                    status: "canceled",
                    selection: $("#custom-select5").val(),
                    page: page,
                    query: query,
                    admin_id_table: $('#admin_id_table').val()
                },
                success: function(data) {
                    $('#result_cancel').html(data);
                }
            });
        }

        $("#custom-select5").change(function() {
            load_data5(1);
        });

        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_cancel').val();
            load_data5(page, query);
        });

        $('#search_cancel').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data5(1, search);
            } else {
                load_data5(1);
            }
        });

        $('#sort_cancel').change(function() {
            var sort = $(this).val();
            if (sort != '') {
                load_data5(1, sort);
            } else {
                load_data5(1);
            }
        });
    });
</script>

</html>