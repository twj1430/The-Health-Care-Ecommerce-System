<?php
include("../db.php");
if (isset($_COOKIE['thehealthcare_admin_emailcookie'])) {
    echo '<script>window.location.assign("index.php");</script>';
}
//     $error = array();

//     $email = validate_input_text($_POST['email']);
//     if (empty($email)) {
//         $error[] = "You forgot to enter your Email";
//     }

//     $password = validate_input_text($_POST['password']);
//     if (empty($password)) {
//         $error[] = "You forgot to enter your password";
//     }

//     if (empty($error)) {
//         // sql query
//         $sql = "SELECT * from ADMIN where admin_email='$email'"; //username and password same ？
//         $result = $conn->query($sql) or die($conn->error . __LINE__);


//         if ($result->num_rows > 0) { //over 1 database(record) so run
//             while ($row = $result->fetch_assoc()) {
//                 //display result
//                 $id = $row['admin_id']; //[] inside is follow database 
//                 $name_first = $row['admin_name_first'];
//                 $name_last = $row['admin_name_last'];
//                 $passwordHash = $row['admin_password'];

//                 if (password_verify($password, $passwordHash)) {
//                     $_SESSION['admin_id'] = $id;
//                     $_SESSION['admin_name_first'] = $name_first;
//                     $_SESSION['admin_name_last'] = $name_last;
//                     echo '<script>window.location.assign("admin.php");</script>';
//                 } else {
//                     echo '<script>swal("Wrong password, please try again!");</script>';
//                 }
//             }
//         }
//     } else {
//         echo $error;
//     }
// }


if (isset($_POST['register'])) {

    $random = "";
    $adminID = "";

    for ($i = 0; $i < 10; $i++) {
        $random .= mt_rand(0, 9);
    }

    $adminID = 'THCADID' . $random;

    $admin_username = $_POST['admin_username'];
    $admin_contact = $_POST['admin_contact'];
    $admin_email = $_POST['admin_email'];
    $admin_fullname = $_POST['admin_fullname'];
    $admin_gender = $_POST['inlineRadioOptions'];
    $admin_whatsapp = $_POST['admin_whatsapp'];
    $admin_wechat = $_POST['admin_wechat'];
    $admin_identity = $_POST['admin_identity'];

    $identity_card_front = $_FILES['identity_card_front'];
    $identity_card_front_file = upload_Image('../assets/images/', $identity_card_front, $adminID);
    $identity_card_back = $_FILES['identity_card_back'];
    $identity_card_back_file = upload_Image('../assets/images/', $identity_card_back, $adminID);
    $identity_card_holding = $_FILES['identity_card_holding'];
    $identity_card_holding_file = upload_Image('../assets/images/', $identity_card_holding, $adminID);

    $admin_address = $_POST['admin_address'];
    $admin_post = $_POST['admin_post'];
    $admin_state = $_POST['admin_state_option'];

    $admin_city = $_POST['admin_city_option'];

    $admin_country = $_POST['admin_country_option'];
    $admin_password = $_POST['admin_password'];
    $admin_confirm_password = $_POST['admin_confirm_password'];

    


    if ($admin_password != $admin_confirm_password) {
        echo "<script>alert('Password Wrong');window.location.assign('admin-register.php');</script>";
    } else {

        $CheckSQL = "SELECT * FROM admin WHERE admin_email = '$admin_email'";
        $query = mysqli_query($conn, $CheckSQL);
        if (mysqli_num_rows($query) > 0) {
            echo "<script>alert('Email has been used! Please try other emaill!'); window.location.assign('admin-register.php');</script>";
        } else {
            $admin_password_hash = password_hash($admin_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO admin(admin_id, admin_unique_id, admin_upline_id, admin_role, admin_username, admin_contact_number, admin_email, admin_name, admin_gender, admin_whatsapp, admin_wechat, admin_ic_number, admin_ic_frontImage, 
            admin_ic_backImage, admin_ic_selfImage, admin_address, admin_post_code, admin_city, admin_state ,admin_country, admin_profile_image, admin_password, admin_create_time) VALUES 
            ('', '$adminID', 'THCADID4024350036', 'Admin', '$admin_username', '$admin_contact', '$admin_email', '$admin_fullname', '$admin_gender', '$admin_whatsapp', '$admin_wechat', '$admin_identity', '$identity_card_front_file',
            '$identity_card_back_file', '$identity_card_holding_file', '$admin_address', '$admin_post', '$admin_city','$admin_state','$admin_country', 'avatar-1.png', '$admin_password_hash', NOW())";
            $result = mysqli_query($conn, $sql) or die($conn->error . __LINE__);

            $membershipSQL = "INSERT INTO admin_membership(id, admin_id, admin_mp_point, admin_mp_status, admin_tp_point, admin_create_time) VALUES ('', '$adminID', '0', '-', '0', NOW())";
            $result2 = mysqli_query($conn, $membershipSQL) or die($conn->error . __LINE__);
            $_SESSION['admin_id'] = $adminID;
            echo "<script>window.location.assign('admin-setupWallet.php');</script>";
        }
    }
}

function upload_Image($path, $file, $id)
{
    $targetDir = $path;
    $default = "";

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
    <title>Admin Register</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="codedthemes">
    <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="codedthemes">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/images/Logo.jpg" type="image/x-icon">
    <link rel="icon" href="../assets/images/Logo.jpg" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--ico Fonts-->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <style>
        body {
            padding-top: 20px;
        }

        a {
            color: #7EC4A0 !important;
        }

        a:hover {
            color: #5FA870 !important;
        }

        #remember_hover {
            cursor: pointer;
        }

        #contact_text {
            margin-top: 28px;
        }

        #admin_contact_selection {
            padding-top: 8px !important;
        }


        @media (max-width: 992px) {
            .offset-lg-1 {
                margin-left: 0% !important;
            }

            #select_contact {
                float: left !important;
                flex: 0 0 25% !important;
                max-width: 25% !important;
            }

            #contact_text {
                float: left !important;
                flex: 0 0 75% !important;
                width: 75% !important;
                margin-top: 51px !important;
            }
        }

        .upload-profile {
            position: absolute;
            z-index: 100;
            width: 100%;
            height: 100%;
            opacity: 0;
        }

        .upload-profile::-webkit-file-upload-button {
            visibility: hidden;
        }

        .upload-profile::before {
            content: ' ';
            display: inline-block;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .form-check-input:checked {
            border: 7px solid #7EC4A0;
        }
    </style>

</head>

<body>
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="center" style="margin-bottom:20px">
                <div class="text-center">
                    <img src="../assets/images/Logo.png" alt="" style="width:20%">
                </div>
            </div>
            <form action="admin-register.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Username</label>
                        <input type="text" name="admin_username" id="admin_username" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Username" required />
                    </div>


                    <div class="col-lg-2 offset-lg-2" id="select_contact" style="margin-bottom:20px">
                        <label>Contact Number</label>
                        <select name="" id="admin_contact_selection" class="form-select" aria-label="Default select example">
                            <option value="">+60</option>
                        </select>
                    </div>

                    <div class="col-lg-7" id="contact_text" style="margin-bottom:20px">
                        <input type="text" name="admin_contact" id="admin_contact" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="010 - 1234567" required />
                    </div>


                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Email Address</label>
                        <input type="email" name="admin_email" id="admin_email" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Email Address" required />
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Full Name</label>
                        <input type="text" name="admin_fullname" id="admin_fullname" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Full Name" required />
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>WhatsApp</label>
                                <input type="tel" name="admin_whatsapp" id="admin_whatsapp" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="WhatsApp" required />
                            </div>
                            <div class="col-lg-6">
                                <label>WeChat</label>
                                <input type="text" name="admin_wechat" id="admin_wechat" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="WeChat" required />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Identity Card Number</label>
                        <input type="text" name="admin_identity" id="admin_identity" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Identity Card Number" required />
                    </div>


                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:50px">
                        <div class="row">
                            <div class="col-lg-4">
                                <label style="font-size:14px;">Identity Card (Front)</label>
                                <div class="col-lg-12 " style="width:100%;height:200px;background-color:#F1F3F5;padding: 0;">
                                    <input type="file" class="upload-profile" id="identity_card_front" name="identity_card_front">
                                </div>
                                <div style="width:150px;height:50px;background-color:#7EC4A0;position:absolute;top: 50%;left: 50%;transform: translate(-50%, -18%);text-align:center">
                                    <h5 class="text-white" style="font-weight:500;padding-top:3px;display:inline-block">Choose File</h5> &nbsp;&nbsp;<i class="fa fa-upload text-white" style="font-size:20px;font-weight:500;padding-top:3px;display:inline-block" aria-hidden="true"></i>
                                </div>
                                <span style="margin-top:10px;width:200px;text-align:center;position:absolute;top: 50%;left: 50%;transform: translate(-50%, 200%);" id="file_name1">Attachment*</span>
                            </div>

                            <div class="col-lg-4">
                                <label style="font-size:14px;">Identity Card Number (Back)</label>
                                <div class="col-lg-12 " style="width:100%;height:200px;background-color:#F1F3F5;padding: 0;">
                                    <input type="file" class="upload-profile" id="identity_card_back" name="identity_card_back">
                                </div>
                                <div style="width:150px;height:50px;background-color:#7EC4A0;position:absolute;top: 50%;left: 50%;transform: translate(-50%, -18%);text-align:center">
                                    <h5 class="text-white" style="font-weight:500;padding-top:3px;display:inline-block">Choose File</h5> &nbsp;&nbsp;<i class="fa fa-upload text-white" style="font-size:20px;font-weight:500;padding-top:3px;display:inline-block" aria-hidden="true"></i>
                                </div>
                                <span style="margin-top:10px;width:200px;text-align:center;position:absolute;top: 50%;left: 50%;transform: translate(-50%, 200%);" id="file_name2">Attachment*</span>
                            </div>

                            <div class="col-lg-4">
                                <label style="font-size:14px;">Your Photo(Holding identity card)</label>
                                <div class="col-lg-12 " style="width:100%;height:200px;background-color:#F1F3F5;padding: 0;">
                                    <input type="file" class="upload-profile" id="identity_card_holding" name="identity_card_holding">
                                </div>
                                <div style="width:150px;height:50px;background-color:#7EC4A0;position:absolute;top: 50%;left: 50%;transform: translate(-50%, -18%);text-align:center">
                                    <h5 class="text-white" style="font-weight:500;padding-top:3px;display:inline-block">Choose File</h5> &nbsp;&nbsp;<i class="fa fa-upload text-white" style="font-size:20px;font-weight:500;padding-top:3px;display:inline-block" aria-hidden="true"></i>
                                </div>
                                <span style="margin-top:10px;width:200px;text-align:center;position:absolute;top: 50%;left: 50%;transform: translate(-50%, 200%);" id="file_name3">Attachment*</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Address</label>
                        <input type="text" name="admin_address" id="admin_address" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Address" required />
                    </div>

                    <div class="col-lg-9 offset-lg-2">
                        <div class="row">
                            <div class="col-lg-6" style="margin-bottom:20px">
                                <label>Post Code</label>
                                <input type="text" name="admin_post" id="admin_post" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Post Code" required />
                            </div>

                            <div class="col-lg-6" style="margin-bottom:20px">
                                <label>City</label>
                                <div class="row" style="border: none;background-color: #F1F3F5 ; width: 100%; margin-left: 1px;">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px; margin-left: -15px;" placeholder="City" disabled />
                                    </div>
                                    <div class="col-lg-6">
                                        <select id="inputState" name="admin_city_option" class="form-select float-right" style="border: none;background-color: #F1F3F5 ; padding: 10px; margin-right: -13px;">
                                            <option selected>Choose City</option>
                                            <option value="Kulai">Kulai</option>
                                            <option value="Johor">Johor Bahru</option>
                                            <option value="Yong Peng">Yong Peng</option>
                                            <!-- <option value="Melaka">Melaka</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 offset-lg-2">
                        <div class="row">
                            <div class="col-lg-6" style="margin-bottom:20px">
                                <label>State</label>
                                <div class="row" style="border: none;background-color: #F1F3F5 ; width: 100%; margin-left: 1px;">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px; margin-left: -15px;" placeholder="City" disabled />
                                    </div>
                                    <div class="col-lg-6">
                                        <select id="inputState" name="admin_state_option" class="form-select float-right" style="border: none;background-color: #F1F3F5 ; padding: 10px; margin-right: -13px;">
                                            <option selected>Choose State</option>
                                            <option value="Kulai">Kulai</option>
                                            <option value="Johor">Johor</option>
                                            <option value="Yong Peng">Yong Peng</option>
                                            <!-- <option value="Indonesia">Indonesia</option> -->
                                            <!-- <option value="Melaka">Melaka</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6" style="margin-bottom:20px">
                                <label>Country</label>
                                <div class="row" style="border: none;background-color: #F1F3F5 ; width: 100%; margin-left: 1px;">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px; margin-left: -15px;" placeholder="City" disabled />
                                    </div>
                                    <div class="col-lg-6">
                                        <select id="inputState" name="admin_country_option" class="form-select float-right" style="border: none;background-color: #F1F3F5 ; padding: 10px; margin-right: -13px;">
                                            <option selected>Choose Country</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <!-- <option value="Melaka">Melaka</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 offset-lg-2">
                        <div class="row">
                            <div class="col-lg-6" style="margin-bottom:20px">
                                <label>Password</label>
                                <input type="password" name="admin_password" id="admin_password" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Password" required />
                            </div>

                            <div class="col-lg-6" style="margin-bottom:20px">
                                <label>Confirm Password</label>
                                <input type="password" name="admin_confirm_password" id="admin_confirm_password" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Confirm Password" required />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 offset-lg-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                I have read and accepted the terms and conditions
                            </label>
                        </div>
                    </div>


                    <div class="col-lg-9 offset-lg-2 py-3">
                        <button type="submit" name="register" id="register" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">REGISTER</button>
                    </div>
            </form>
            <!-- <div class="card-footer"> -->
            <div class="col-lg-12 text-center" style="margin-bottom:20px">
                <span class="text-muted">Already register account?</span>
                <a href="admin-login.php" class="f-w-600 p-l-5">Login Here</a>
            </div>
            <!-- </div> -->

        </div>
        <!-- end of col-sm-12 -->
    </div>
    </div>
    <!-- end of container-fluid -->

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="../assets/js/menu.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script>
        $(document).ready(function(e) {
            $("#identity_card_front").change(function() {
                $("#file_name1").html($("#identity_card_front").val());
            });

            $("#identity_card_back").change(function() {
                $("#file_name2").html($("#identity_card_back").val());
            });

            $("#identity_card_holding").change(function() {
                $("#file_name3").html($("#identity_card_holding").val());
            });


            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }


            // var enter = false;
            // window.addEventListener('keyup', function(e) {
            //     if (e.keyCode === 13) {
            //         if (!enter) {
            //             enter = true;
            //             document.getElementById("login").click();
            //         } else {
            //             enter = false;
            //         }
            //     }
            // });
            // $("#login").click(function() {

            //     var remember = "";
            //     if ($('#remember_me').prop("checked") == true) {
            //         remember = "Yes";
            //     } else {
            //         remember = "No";
            //     }
            //     console.log(remember);

            //     if ($("#email").val() == "" || $("#password").val() == "") {
            //         swal({
            //             title: "Please fill out all the field!",
            //             icon: "warning",
            //             button: "Ok",
            //         });
            //     } else {
            //         $.ajax({
            //             url: "../ajax.php",
            //             method: "post",
            //             data: {
            //                 login: "login",
            //                 remember: remember,
            //                 email: $("#email").val(),
            //                 password: $("#password").val()
            //             },
            //             dataType: "text",
            //             success: function(data) {
            //                 if (data == "Yes") {
            //                     window.location.assign("admin.php");
            //                 } else if (data == "Wrong") {
            //                     swal("Wrong password, please try again!");
            //                 } else {
            //                     swal(data);
            //                 }
            //                 // $('.modal-body').html(data);
            //             }
            //         });
            //     }
            // });
        });
    </script>
</body>

</html>