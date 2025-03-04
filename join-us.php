<?php
include("db.php");

if (isset($_POST['submit'])) {
    $error = array();

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    if (empty($name)) {
        $error[] = "You forget the name";
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    if (empty($email)) {
        $error[] = "You forget the email";
    }

    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    if (empty($subject)) {
        $error[] = "You forget the subject";
    }

    $message = mysqli_real_escape_string($conn, $_POST['message']);
    if (empty($message)) {
        $error[] = "You forget the message";
    }

    if (empty($error)) {
        $sql = "INSERT INTO contact_us values('','$name','$email','$subject','$message',NOW())";
        $result = $conn->query($sql) or die($conn->error . __LINE__);

        if ($result) {
            echo "<style>
            .alert-success{
                display:block !important;
            }</style>";
        }
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
            padding-top: 84px;
            /* background: rgb(250, 250, 250) !important; */
            font-family: "Poppins", Arial, sans-serif;
        }

        .alert-success {
            display: none;
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
    </style>
</head>


<?php include("header.php") ?>

<section id="contact_us">

    <body>
        <div class="col-lg-12 tracking_top text-center">
            <div class="container">
                <div class="row contact_name">
                    <div class="col-lg-12 text-center">
                        <h2>Join Us</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-left:0;margin-right:0;background-color:rgb(248, 248, 248)">
            <div class="container py-5 ">
                <div class="alert alert-success text-center" role="alert">
                    <h4>Submit successful!</h4>
                </div>

                <div class="col-lg-12" align="center" style="margin-bottom:20px">
                    <div class="text-center">
                        <img src="assets/images/Logo.png" alt="" style="width:20%">
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
                                <option value="">Halo</option>
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
                                    <input type="text" name="admin_whatsapp" id="admin_whatsapp" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Email Address" required />
                                </div>
                                <div class="col-lg-6">
                                    <label>WeChat</label>
                                    <input type="text" name="admin_wechat" id="admin_wechat" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Email Address" required />
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
                                            <input type="text" name="admin_city" id="admin_city" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px; margin-left: -15px;" placeholder="State/territory" />
                                        </div>
                                        <div class="col-lg-6">
                                            <select id="inputState" name="admin_city_option" class="form-select float-right" style="border: none;background-color: #F1F3F5 ; padding: 10px; margin-right: -13px;">
                                                <option selected>Choose State</option>
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


                        <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                            <label>Country</label>
                            <div class="row" style="border: none;background-color: #F1F3F5 ; width: 100%; margin-left: 1px;">
                                <div class="col-lg-9">
                                    <input type="text" name="admin_country" id="admin_country" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;  margin-left: -15px;" placeholder="Country/region" />
                                </div>
                                <div class="col-lg-3">
                                    <select id="inputState" name="admin_country_option" class="form-select float-right" style="border: none;background-color: #F1F3F5 ; padding: 10px; margin-right: -13px;">
                                        <option selected>Choose Country</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Indonesia">Indonesia</option>
                                    </select>
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
                    </div>
                </form>
                <!-- <div class="card-footer"> -->
                <div class="col-lg-12 text-center" style="margin-bottom:20px">
                    <span class="text-muted">Already register account?</span>
                    <a href="admin-login.php" class="f-w-600 p-l-5">Login Here</a>
                </div>
            </div>
        </div>
    </body>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $("#track").click(function() {
            window.location.assign("tracking_result.php");
        })
        $("#dot_4").css("display", "block");

        $("#list_4").hover(function() {
            $("#dot_4").css("display", "block");
        }, function() {
            $("#dot_4").css("display", "block");
        });

        $(window).click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_4").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_4").hover(function() {
                    $("#dot_4").css("display", "block");
                }, function() {
                    $("#dot_4").css("display", "block");
                });
            }
        });

        $("#list_2").click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_4").css("display", "none");
                $("#dot_2").css("display", "block");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "block");
                });

                $("#list_4").hover(function() {
                    $("#dot_4").css("display", "block");
                }, function() {
                    $("#dot_4").css("display", "none");
                });
            } else {
                $("#dot_4").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_4").hover(function() {
                    $("#dot_4").css("display", "block");
                }, function() {
                    $("#dot_4").css("display", "block");
                });
            }
        });
    });
</script>
<?php require_once("footer.php") ?>

</html>