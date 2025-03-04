<?php
include("../db.php");
include("login-authentication.php");


// Create Category
if (isset($_POST['create'])) {
    // $create_product_code = $_POST['name'];

    foreach ($_REQUEST['new_product_code'] as $create_product_code) {
        $sql = "INSERT into product_code values('','$create_product_code','1','',NOW())";
        $query = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
    }

    echo "<script>window.alert('Create Successful!');window.location.assign('insert_code.php')</script>";
}

// Edit Category
if (isset($_POST['edit'])) {
    $edit_code_id = $_POST['id'];
    $edit_code = $_POST['code'];

    $sql = "UPDATE product_code SET product_code = '$edit_code' WHERE code_id = '$edit_code_id'";
    $query = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
    echo "<script>window.alert('Update Successful!');window.location.assign('insert_code.php')</script>";
}

// Delete Category
if (isset($_GET['delete'])) {
    $DeleteSQL = "DELETE FROM product_code WHERE code_id = '" . $_GET['delete'] . "'";
    $DeleteResult = $conn->query($DeleteSQL) or die($conn->error . __LINE__);
    echo "<script>window.location.assign('insert_code.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Code</title>
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

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.min.css">



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


    <!-- Bootstrap Datepicker js -->
    <script type="text/javascript" src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!-- bootstrap range picker -->
    <script type="text/javascript" src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>



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

        /* .table tr>td {
            cursor: pointer;
        } */

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
                <!-- <div class="row">
                    <div class="main-header">
                        <h4 style="padding-left:0 20px">Product</h4>
                    </div>
                </div> -->
                <div class="col-lg-12" style="padding: 0 20px;">
                    <h4 style="margin-top: 30px;">Product Code</h4>
                    <div class="row">
                        <div class="col-lg-2 text-left">
                            <select class="custom-select" id="custom-select1">
                                <option value="1" selected>NEW TO OLD</option>
                                <option value="2">OLD TO NEW</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <input type="search" placeholder="Search" name="search_code" id="search_code" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
                        </div>

                        <div class="col-lg-5 col-md-3"></div>

                        <div class="col-lg-2 col-md-7">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal" style="margin:10px 0;padding: 9px;border:none;width:100%;">Create New</button>
                        </div>
                    </div>

                    <!-- Create Modal -->
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create New Product Code</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="insert_code.php" method="POST" id="insert_form">
                                        <div class="col-lg-12">
                                            <label>Product Code</label>
                                            <input type="text" name="new_product_code[]" id="new_product_code" class="form-control" required />
                                        </div>

                                        <div class="col-lg-12" id="more_code">

                                        </div>
                                    </form>
                                    <div class="col-lg-12 mt-3">
                                        <button class="btn btn-primary" id="btn_more_code" name="btn_more_code">+</button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" name="create" id="create" value="Save" class="btn btn-success" style="width: 100%;" form="insert_form" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card dashboard-product table-border">
                        <div id="result"></div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Product Code</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="insert_code.php" method="POST">
                                    <div class="modal-body" id="edit_detail"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Product Code</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="delete_detail"></div>
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
        // $('#menu1').removeClass("active-sidebar");
        // $('#menu2').removeClass("active-sidebar");
        // $('#menu3').removeClass("active-sidebar");
        // $('#menu4').removeClass("active-sidebar");
        // $('#menu5').removeClass("active-sidebar");
        // $('#menu6').removeClass("active-sidebar");
        // $('#menu7').removeClass("active-sidebar");
        $('#menu10').addClass("active-sidebar");
        // $('#menu9').removeClass("active-sidebar");

        load_data(1);

        function load_data(page, query) {
            $.ajax({
                url: "insert_code_table.php",
                method: "POST",
                data: {
                    load_data: 1,
                    selection: $("#custom-select1").val(),
                    page: page,
                    query: query
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
            var query = $('#search_code').val();
            load_data(page, query);
        });

        $('#search_code').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(1, search);
            } else {
                load_data(1);
            }
        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });


        $('#btn_more_code').click(function() {
            // var new_product_code = "";
            // swal("Please insert the number of input you want to create:", {
            //         content: "input",
            //     })
            //     .then((value) => {
            //         // swal(`You typed: ${value}`);
            //         if (value !== "") {
            //             for (var i = 0; i < value; i++) {
            //                 new_product_code += '<input type="text" name="new_product_code[]" id="new_product_code" class="form-control" required /><br>';
            //             }
            //         }

            //         $('#more_code').html(new_product_code);
            //     });
            // event.preventDefault();

            $('#more_code').append('<label class="mt-3">Product Code</label> <input type="text" name="new_product_code[]" id="new_product_code" class="form-control" required />');
        });
    });
</script>

</html>