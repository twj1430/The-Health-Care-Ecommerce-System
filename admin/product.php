<?php
include("../db.php");
include("login-authentication.php");


// Create Product
if (isset($_POST['create'])) {

    $random = "";
    $ImageID = "";

    for ($i = 0; $i < 10; $i++) {
        $random .= mt_rand(0, 9);
    }

    $ImageID = 'THCIMG' . $random;

    $create_product_name = $_POST['name'];
    $create_product_description = $_POST['description'];
    $create_product_category = $_POST['category'];
    $create_product_price = $_POST['price'];
    $create_product_image = $_FILES['product_image'];
    $create_product_image_file = upload_Image('../assets/images/products/', $create_product_image, $ImageID);

    $sql = "INSERT into products(product_id, category_id, product_name, product_description, product_image, product_price, product_create_time)values('','$create_product_category' , '$create_product_name', '$create_product_description', '$create_product_image_file', '$create_product_price', NOW())";
    $query = mysqli_query($conn, $sql) or die($conn->error . __LINE__);

    if (isset($_POST['moreImageCheck']) == 'checked') {

        $GetSQL = "SELECT * FROM products ORDER BY product_id DESC";
        $GetQuery = mysqli_query($conn, $GetSQL) or die($conn->error . __LINE__);
        $row = $GetQuery->fetch_assoc();
        $product_id = $row['product_id'];

        if ($_FILES['product_image2']['size'] == 0) {

            $create_product_image3 = $_FILES['product_image3'];
            $create_product_image3_file = upload_Image('../assets/images/products/', $create_product_image3, $ImageID);

            $InsertSQL4 = "INSERT into product_sub_image(image_no, product_id, sub_image, sub_create_time)values('', '$product_id', '$create_product_image3_file', NOW())";
            $InsertQuery4 = mysqli_query($conn, $InsertSQL4) or die($conn->error . __LINE__);
        } else if ($_FILES['product_image3']['size'] == 0) {

            $create_product_image2 = $_FILES['product_image2'];
            $create_product_image2_file = upload_Image('../assets/images/products/', $create_product_image2, $ImageID);

            $InsertSQL3 = "INSERT into product_sub_image(image_no, product_id, sub_image, sub_create_time)values('', '$product_id', '$create_product_image2_file', NOW())";
            $InsertQuery3 = mysqli_query($conn, $InsertSQL3) or die($conn->error . __LINE__);
        } else if ($_FILES['product_image2']['size'] != 0 && $_FILES['product_image3']['size'] != 0) {

            $create_product_image2 = $_FILES['product_image2'];
            $create_product_image3 = $_FILES['product_image3'];
            $create_product_image2_file = upload_Image('../assets/images/products/', $create_product_image2, $ImageID);
            $create_product_image3_file = upload_Image('../assets/images/products/', $create_product_image3, $ImageID);

            $InsertSQL3 = "INSERT into product_sub_image(image_no, product_id, sub_image, sub_create_time)values('', '$product_id', '$create_product_image2_file', NOW())";
            $InsertQuery3 = mysqli_query($conn, $InsertSQL3) or die($conn->error . __LINE__);

            $InsertSQL4 = "INSERT into product_sub_image(image_no, product_id, sub_image, sub_create_time)values('', '$product_id', '$create_product_image3_file', NOW())";
            $InsertQuery4 = mysqli_query($conn, $InsertSQL4) or die($conn->error . __LINE__);
        }
    }

    echo "<script>window.alert('Create Successful!');window.location.assign('product.php')</script>";
}

// Edit Product
if (isset($_POST['edit'])) {

    $random = "";
    $ImageID = "";

    for ($i = 0; $i < 10; $i++) {
        $random .= mt_rand(0, 9);
    }

    $ImageID = 'THCIMG' . $random;

    $edit_product_id = $_POST['id'];
    $edit_product_name = $_POST['name'];
    $edit_product_description = $_POST['description'];
    $edit_product_category = $_POST['category'];
    $edit_product_price = $_POST['price'];

    $ImageSQL = "SELECT * FROM products WHERE product_id = '$edit_product_id'";
    $ImageQuery = mysqli_query($conn, $ImageSQL) or die($conn->error . __LINE__);
    if (mysqli_num_rows($ImageQuery) > 0) {
        while ($row = $ImageQuery->fetch_assoc()) {
            $default_image = $row['product_image'];
        }
    }

    $edit_product_image = $_FILES['image'];
    $edit_product_image_file = edit_Image('../assets/images/products/', $edit_product_image, $default_image, $ImageID);

    if (isset($_POST['image_no3'])) {
        $GetSubImg2 = "SELECT * FROM product_sub_image WHERE image_no = '" . $_POST['image_no2'] . "'";
        $GetSubQuery2 = mysqli_query($conn, $GetSubImg2) or die($conn->error . __LINE__);
        if (mysqli_num_rows($GetSubQuery2) > 0) {
            $row = $GetSubQuery2->fetch_assoc();
            $sub_image = $row['sub_image'];
        }

        $GetSubImg3 = "SELECT * FROM product_sub_image WHERE image_no = '" . $_POST['image_no3'] . "'";
        $GetSubQuery3 = mysqli_query($conn, $GetSubImg3) or die($conn->error . __LINE__);
        if (mysqli_num_rows($GetSubQuery3) > 0) {
            $row = $GetSubQuery3->fetch_assoc();
            $sub_image2 = $row['sub_image'];
        }

        $edit_sub_image2 = $_FILES['image2'];
        $edit_sub_image2_file = edit_Image('../assets/images/products/', $edit_sub_image2, $sub_image, $ImageID);

        $edit_sub_image3 = $_FILES['image3'];
        $edit_sub_image3_file = edit_Image('../assets/images/products/', $edit_sub_image3, $sub_image2, $ImageID);

        $Image2SQL = "UPDATE product_sub_image SET sub_image = '$edit_sub_image2_file' WHERE image_no = '" . $_POST['image_no2'] . "'";
        $Image2Query = mysqli_query($conn, $Image2SQL) or die($conn->error . __LINE__);

        $Image3SQL = "UPDATE product_sub_image SET sub_image = '$edit_sub_image3_file' WHERE image_no = '" . $_POST['image_no3'] . "'";
        $Image3Query = mysqli_query($conn, $Image3SQL) or die($conn->error . __LINE__);
    } else if (isset($_POST['image_no2'])) {
        $GetSubImg = "SELECT * FROM product_sub_image WHERE image_no = '" . $_POST['image_no2'] . "'";
        $GetSubQuery = mysqli_query($conn, $GetSubImg) or die($conn->error . __LINE__);
        if (mysqli_num_rows($GetSubQuery) > 0) {
            $row = $GetSubQuery->fetch_assoc();
            $sub_image = $row['sub_image'];
        }

        $edit_sub_image2 = $_FILES['image2'];
        $edit_sub_image2_file = edit_Image('../assets/images/products/', $edit_sub_image2, $sub_image, $ImageID);

        $Image2SQL = "UPDATE product_sub_image SET sub_image = '$edit_sub_image2_file' WHERE image_no = '" . $_POST['image_no2'] . "'";
        $Image2Query = mysqli_query($conn, $Image2SQL) or die($conn->error . __LINE__);
    }

    $sql = "UPDATE products SET category_id= '$edit_product_category', product_name= '$edit_product_name', product_description= '$edit_product_description', product_image= '$edit_product_image_file', product_price= '$edit_product_price' WHERE product_id = '$edit_product_id'";
    $query = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
    echo "<script>window.alert('Update Successful!');window.location.assign('product.php')</script>";
}

// Delete Product
if (isset($_GET['delete'])) {
    $DeleteSQL = "DELETE FROM products WHERE product_id = '" . $_GET['delete'] . "'";
    $DeleteResult = $conn->query($DeleteSQL) or die($conn->error . __LINE__);

    $DeleteSQL2 = "DELETE FROM product_sub_image WHERE product_id = '" . $_GET['delete'] . "'";
    $DeleteResult2 = $conn->query($DeleteSQL2) or die($conn->error . __LINE__);
    echo "<script>window.location.assign('product.php');</script>";
}

function upload_Image($path, $file, $id)
{
    $targetDir = $path;
    $default = "";

    // get the filename
    $filename = basename($file['name']);
    $productfilename = $id . "_" . $filename;
    $targetFilePath = $targetDir . $productfilename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($productfilename)) {
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowType)) {
            // upload file to the server
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $productfilename;
            }
        }
    }
    // return default image
    return $default;
}

function edit_Image($path, $file, $default_image, $id)
{
    $targetDir = $path;
    $default = $default_image;

    // get the filename
    $filename = basename($file['name']);
    $productfilename = $id . "_" . $filename;
    $targetFilePath = $targetDir . $productfilename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($productfilename)) {
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowType)) {
            // upload file to the server
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $productfilename;
            }
        }
    }
    // return default image
    return $default;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quantum Able Bootstrap 4 Admin Dashboard Template</title>
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

        .table tr>td {
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

        /* Image 1  */
        .profile-pic-div {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .photo {
            height: 100%;
            width: 100%;
        }

        .file {
            display: none;
        }

        .uploadBtn {
            height: 30px;
            width: 93%;
            position: absolute;
            margin-top: -30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            color: wheat;
            line-height: 30px;
            font-family: sans-serif;
            font-size: 10px;
            cursor: pointer;
            display: none;
        }

        /* Image 2 */
        .profile-pic-div2 {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .photo2 {
            height: 100%;
            width: 100%;
        }

        .file2 {
            display: none;
        }

        .uploadBtn2 {
            height: 30px;
            width: 93%;
            position: absolute;
            margin-top: -30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            color: wheat;
            line-height: 30px;
            font-family: sans-serif;
            font-size: 10px;
            cursor: pointer;
            display: none;
        }

        /* Image 3 */
        .profile-pic-div3 {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .photo3 {
            height: 100%;
            width: 100%;
        }

        .file3 {
            display: none;
        }

        .uploadBtn3 {
            height: 30px;
            width: 93%;
            position: absolute;
            margin-top: -30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background: rgba(0, 0, 0, 0.7);
            color: wheat;
            line-height: 30px;
            font-family: sans-serif;
            font-size: 10px;
            cursor: pointer;
            display: none;
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
                    <h4 style="margin-top: 30px;">Products</h4>
                    <div class="row">
                        <div class="col-lg-2 text-left">
                            <select class="custom-select" id="custom-select1">
                                <option value="1" selected>NEW TO OLD</option>
                                <option value="2">OLD TO NEW</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <input type="search" placeholder="Search" name="search_product" id="search_product" style="margin:10px 90px 10px 0;padding:8px;border:none;width:100%" />
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
                                    <h4 class="modal-title">Create New</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="product.php" method="POST" enctype="multipart/form-data">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required />
                                        <br />
                                        <label>Description</label>
                                        <textarea name="description" id="description" class="form-control" required></textarea>
                                        <br />
                                        <label>Category</label>
                                        <select name="category" id="category" class="form-control" required>
                                            <?php
                                            $categorySQL = "SELECT * FROM product_category";
                                            $categoryResult = $conn->query($categorySQL) or die($conn->error . __LINE__);
                                            if (mysqli_num_rows($categoryResult) > 0) {
                                                while ($row = $categoryResult->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <br />
                                        <label>Price</label>
                                        <input type="text" name="price" id="price" class="form-control" required />
                                        <br />
                                        <label>Image 1</label>
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="product_image">Choose file</label>
                                            <input type="file" class="custom-file-input" id="product_image" name="product_image" required />
                                        </div>
                                        <div class="form-check" style="margin-top: 5px; ">
                                            <input class="form-check-input" type="checkbox" value="checked" name="moreImageCheck" id="moreImageCheck">
                                            <label class="form-check-label" for="moreImageCheck" style="margin-left: -20px;">
                                                More Image?
                                            </label>
                                        </div>
                                        <div id="extraImage" style="display:none;">
                                            <label>Image 2</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="product_image">Choose file</label>
                                                <input type="file" class="custom-file-input" id="product_image2" name="product_image2" />
                                            </div>
                                            <br />
                                            <br />
                                            <label>Image 3</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="product_image">Choose file</label>
                                                <input type="file" class="custom-file-input" id="product_image3" name="product_image3" />
                                            </div>
                                        </div>
                                        <br />
                                        <br />
                                        <input type="submit" name="create" id="create" value="Save" class="btn btn-success" style="width: 100%;" />
                                    </form>
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
                                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="product.php" method="POST" enctype="multipart/form-data">
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
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
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

<script>
    $(document).ready(function() {
        $('#menu1').removeClass("active-sidebar");
        $('#menu2').removeClass("active-sidebar");
        $('#menu3').removeClass("active-sidebar");
        $('#menu4').removeClass("active-sidebar");
        $('#menu5').removeClass("active-sidebar");
        $('#menu6').removeClass("active-sidebar");
        $('#menu7').addClass("active-sidebar");
        $('#menu8').removeClass("active-sidebar");
        $('#menu9').removeClass("active-sidebar");

        load_data(1);

        function load_data(page, query) {
            $.ajax({
                url: "product-table.php",
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
            var query = $('#search_product').val();
            load_data(page, query);
        });

        $('#search_product').keyup(function() {
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

        $("#moreImageCheck").click(function() {
            $('#extraImage').toggle();
        });

    });
</script>

</html>