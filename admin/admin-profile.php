<?php
include("../db.php");
include("login-authentication.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM admin WHERE admin_unique_id = '$id'";
    $result = mysqli_query($conn,$sql) or die($conn->error . __LINE__);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $admin_username = $row['admin_username'];
            $admin_contact_number = $row['admin_contact_number'];
            $admin_email = $row['admin_email'];
            $admin_address = $row['admin_address'];
            $admin_post_code = $row['admin_post_code'];
            $admin_city = $row['admin_city'];
            $admin_country = $row['admin_country'];
            $admin_profile_image = $row['admin_profile_image'];
        }
    }
}

if(isset($_POST['save'])){
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_contact_number = $_POST['admin_contact_number'];
    $admin_email = $_POST['admin_email'];
    $admin_address = $_POST['admin_address'];
    $admin_post_code = $_POST['admin_post_code'];
    $admin_city = $_POST['admin_city'];
    $admin_country = $_POST['admin_country'];
    $admin_profile_image = $_FILES['file'];
    $admin_profile_image_file = upload_Image('../assets/images/', $admin_profile_image, $admin_id);

    $sql = "UPDATE admin SET admin_username= '$admin_name', admin_contact_number = '$admin_contact_number', admin_email = '$admin_email', admin_address = '$admin_address', 
    admin_post_code = '$admin_post_code', admin_city = '$admin_city', admin_country = '$admin_country', admin_profile_image = '$admin_profile_image_file' 
    WHERE admin_unique_id = '$admin_id'";
    $query = mysqli_query($conn, $sql) or die($conn->error.__LINE__);
    echo "<script>window.alert('Edit Successful!');window.location.assign('profile.php');</script>";
}

function upload_Image($path, $file, $id)
{
    $targetDir = $path;
    $default = "";
    // $default = "avatar-1.png";

    // get the filename
    $filename = basename($file['name']);
    $userfilename = $id . "_" . $filename;
    $targetFilePath = $targetDir . $userfilename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($userfilename)) {
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowType)) {
            // upload file to the server
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $userfilename;
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
            background-color: #AFBBC6;
        }

        .table tr {
            color: black;
        }

        .table-border {
            padding: 0;
        }


        table>thead>tr {
            color: white !important;
        }
/* 
        .active-sidebar>a {
            font-size: 18px !important;
            font-weight: 600 !important;
            color: #7EC4A0 !important;
        } */

        .dashboard-header .recent-buy {
            padding: 5px !important;
        }

        .nav-tabs .nav-link {
            color: black;
        }

        .bg-white:hover {
            background-color: #198754 !important;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            color: #7EC4A0;
            border-color: transparent transparent #7EC4A0 transparent;
            border-bottom: 3px solid !important;
            /* isolation: isolate; */
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
            border-bottom: 3px solid !important;
            font-weight: bold;
        }

        .nav-tabs .nav-item.show .nav-link:hover,
        .nav-tabs .nav-link.active:hover,
        .nav-tabs .nav-link.active:focus {
            color: #7EC4A0;
            background-color: transparent;
            border-color: transparent transparent #7EC4A0 transparent;
        }

        /* .profile-pic{
            width: 100%;
            border-radius: 50%;
        }

        .upload-profile{
            display: none;
        }

        .upload-btn{
            height: 40px;
            width: 100%;
            position: absolute;
            bottom: -25px;
            left: 25px;
            transform: translateX(-50%);
            text-align: center;
            background-color: rgba(0,0,0, 0.7);
            color: white;
            line-height: 30px;
        } */

        .profile-pic-div{
            height: 100px;
            width: 100px;
            transform: translate(0,0);
            border-radius: 50%;
            overflow: hidden;
        }

        .photo{
            height: 100%;
            width: 100%;
        }

        .file{
            display: none;
        }

        .uploadBtn{
            height: 40px;
            width: 100%;
            position: absolute;
            bottom: -10px;
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

                <div class="row dashboard-header" style="padding-top:20px;">

                    <div class="col-lg-12">
                        <div class="card dashboard-product">

                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="profile.php" style="color:#7EC4A0">
                                        <h5>Back</h5>
                                    </a>
                                </div>

                                <div class="col-lg-12" style="margin-top:10px">
                                    <h5 class="text-dark">Edit Profile</h5>
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <form action="edit-profile.php" method="POST" enctype="multipart/form-data">
                                                
                                                <div class="col-lg-6 offset-lg-3">
                                                    <!-- <div class="profile-pic">
                                                        <img src="../assets/images/avatar-1.png" alt="" style="width:20%;" id="profile-image">
                                                        <input type="file" class="upload-profile">
                                                        <label for="file" class="upload-btn" id="upload-btn">Choose Photo</label>
                                                    </div> -->

                                                    <div class="profile-pic-div">
                                                            <img src="../assets/images/<?php echo $admin_profile_image; ?>" class="photo" id="photo">
                                                            <input type="file" class="file" id="file" name="file">
                                                            <label for="file" class="uploadBtn" id="uploadBtn">Choose Photo</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 offset-lg-3" style="margin-top:10px;">
                                                    <label for="">Username</label>
                                                    <input type="text" class="form-control" name="admin_name" id="admin_name" style="background-color:#F1F3F5" placeholder="Username" value="<?php echo $admin_username; ?>">
                                                </div>


                                                <div class="col-lg-6 offset-lg-3" style="margin-top:10px;">
                                                    <label for="">Contacat Number</label>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <select name="" id="" class="form-control">
                                                                <option value="">+60</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-9">
                                                            <input type="tel" class="form-control" name="admin_contact_number" id="admin_contact_number" style="background-color:#F1F3F5" placeholder="16 466 3564" value="<?php echo $admin_contact_number; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 offset-lg-3" style="margin-top:10px;">
                                                    <label for="">Email Address</label>
                                                    <input type="text" class="form-control" name="admin_email" id="admin_email" style="background-color:#F1F3F5" placeholder="Email Address" value="<?php echo $admin_email; ?>">
                                                </div>

                                                <div class="col-lg-6 offset-lg-3" style="margin-top:10px;">
                                                    <label for="">Address</label>
                                                    <input type="text" class="form-control" name="admin_address" id="admin_address" style="background-color:#F1F3F5" placeholder="Address" value="<?php echo $admin_address; ?>">
                                                </div>

                                                <div class="col-lg-6 offset-lg-3" style="margin-top:10px;">
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <label for="">Post Code</label>
                                                            <input type="text" class="form-control" name="admin_post_code" id="admin_post_code" style="background-color:#F1F3F5" placeholder="Post Code" value="<?php echo $admin_post_code; ?>">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label for="">City</label>
                                                            <div class="row" style="border: none;background-color: #F1F3F5 ; width: 100%; margin-left: 1px;">
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="admin_city" id="admin_city" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px; margin-left: -15px;" placeholder="City" value="<?php echo $admin_city; ?>" />
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <select id="inputState" name="admin_city_option" id="admin_city_option" class="form-select float-right" style="border: none;background-color: #F1F3F5 ; padding: 10px; margin-right: -13px;">
                                                                        <option selected >Choose City</option>
                                                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                                        <option value="Johor Bahru">Johor Bahru</option>
                                                                        <option value="Penang">Penang</option>
                                                                        <option value="Melaka">Melaka</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 offset-lg-3" style="margin-top:10px;">
                                                    <label for="">Country</label>
                                                    <input type="text" class="form-control" name="admin_country" id="admin_country" style="background-color:#F1F3F5" placeholder="Country" value="<?php echo $admin_country; ?>">
                                                </div>

                                                <div class="col-lg-6 offset-lg-3" style="margin-top:20px;">
                                                    <div class="row">
                                                        <div class="col-lg-6" >
                                                            <a href="profile.php" class="btn btn-outline-success" style="width:100%">
                                                                CANCEL
                                                            </a>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <button type="submit" class="btn btn-success" style="width:100%" name="save" id="save">
                                                                SAVE
                                                            </button>
                                                            <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $id; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

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

<script>
</script>

</html>