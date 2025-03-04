<?php
include("../db.php");
// if (isset($_COOKIE['thehealthcare_admin_emailcookie'])) {
//     // sql query
//     $sql = "SELECT * from admin where admin_email='" . $_COOKIE['thehealthcare_admin_emailcookie'] . "'"; //username and password same ？
//     $result = $conn->query($sql) or die($conn->error . __LINE__);

//     if ($result->num_rows > 0) { //over 1 database(record) so run
//         while ($row = $result->fetch_assoc()) {
//             //display result
//             $id = $row['admin_unique_id']; //[] inside is follow database 
//             $usernamet = $row['admin_username'];
//             $passwordHash = $row['admin_password'];

//             if (password_verify($_COOKIE['admin_passwordcookie'], $passwordHash)) {
//                 $_SESSION['admin_username'] = $row['admin_username'];
//                 $_SESSION['admin_email'] = $row['admin_email'];
//                 $_SESSION['admin_id'] = $row['admin_unique_id'];
//             }
//         }
//     }

// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
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

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- waves css -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/Waves/waves.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/color/color-1.min.css" id="color" />


    <style>
        a {
            color: #7EC4A0 !important;
        }

        a:hover {
            color: #5FA870 !important;
        }

        #remember_me {
            cursor: pointer;
        }

        .checkbox-color {
            display: inline-block;
            margin-left: 20px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <section class="login p-fixed d-flex text-center common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-lg-12" align="center" style="margin-bottom:20px">
                        <div class="text-center">
                            <img src="../assets/images/Logo.png" alt="" style="width:30%">
                        </div>
                    </div>

                    <!-- <h3 class="text-center txt-primary">
                        Sign In to your admin account
                    </h3> -->
                    <div class="row">
                        <div class="col-xs-10 offset-xs-1" style="margin-bottom:20px">
                            <!-- <div class="md-input-wrapper"> -->
                            <label>Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:15px;" placeholder="Email Address" required />
                            <!-- <label>Email</label> -->
                            <!-- </div> -->
                        </div>
                        <div class="col-xs-10 offset-xs-1" style="margin-bottom:20px">
                            <!-- <div class="md-input-wrapper"> -->
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:15px;" placeholder="password" required />
                            <!-- <label>Password</label> -->
                            <!-- </div> -->
                        </div>
                        <div class="col-xs-5 offset-xs-1">
                            <div class="checkbox-color checkbox-success">
                                <input id="checkbox3" type="checkbox">
                                <label for="checkbox3" id="remember_me">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4 offset-xs-1 forgot-phone text-right">
                            <a href="#" class="text-right f-w-600"> Forget Password?</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                        <div class="col-xs-10 offset-xs-1">
                            <button type="submit" name="login" id="login" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                        </div>
                    </div>
                    <!-- <div class="card-footer"> -->
                    <div class="col-sm-12 col-xs-12 text-center">
                        <span class="text-muted">Don't have an account?</span>
                        <a href="admin-register.php" class="f-w-600 p-l-5">Register Here</a>
                    </div>
                    <!-- </div> -->

                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jqurey -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets/plugins/tether/dist/js/tether.min.js"></script>

    <!-- Required Fremwork -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--text js-->
    <script type="text/javascript" src="../assets/pages/elements.js"></script>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script>
        $(document).ready(function(e) {


            window.onkeypress = function(event) {
                if (event.keyCode === 13) {
                    document.getElementById("login").click();
                }
            }


            $("#login").click(function() {
                if ($("#email").val() == "" || $("#password").val() == "") {

                    swal({
                        title: "Please fill out all the field!",
                        icon: "warning",
                        button: "Ok",
                    });
                } else {
                    var admin_remember = '';
                    if ($("#checkbox3").is(":checked")) {
                        admin_remember = 'Yes';
                    } else {
                        admin_remember = 'No';
                    }

                    $.ajax({
                        url: "../ajax.php",
                        method: "post",
                        data: {
                            admin_remember: admin_remember,
                            admin_email_login: $("#email").val(),
                            admin_password_login: $("#password").val()
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data == "Yes") {
                                window.location.assign('index.php');
                                // console.log(data);
                            } else if (data == "Wrong") {
                                window.alert('Wrong Password');
                            } else if (data == "No") {
                                window.alert('Account no exits');
                            } else {
                                var link = "admin-setupWallet.php?id=" + data;
                                swal({
                                        title: "You haven't done the wallet setup,do you want to continue the setup?",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((value) => {
                                        if (value) {
                                            window.location.assign(link);
                                        }
                                    });
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>