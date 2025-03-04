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
    </style>
</head>


<?php include("header.php") ?>

<section id="contact_us">

    <body>
        <div class="col-lg-12 tracking_top text-center">
            <div class="container">
                <div class="row contact_name">
                    <div class="col-lg-12 text-center">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-left:0;margin-right:0;background-color:rgb(248, 248, 248)">
            <div class="container py-5 ">
                <div class="alert alert-success text-center" role="alert">
                    <h4>Submit successful!</h4>
                </div>
                <div class="row justify-content-center">
                    <h4 class="text-center text-success mb-4">You can contact us through the following methods</h4>

                    <div class="col-lg-12 mb-3">
                        <div class="row text-center" style="color:#7EC4A0">
                            <div class="col-lg-4">
                                <div class="card border-0 h-100">
                                    <div class="row p-4">
                                        <div class="col-lg-12 ">
                                            <i class="fa fa-map-marker" style="font-size:40px" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-12 text-dark">
                                            <h5><b>Address:</b> No.12A Jalan Anggerik, Taman Anggerik, 81200 Johor Bahru, Johor, Malaysia</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card border-0  h-100">
                                    <div class="row p-4">
                                        <div class="col-lg-12">
                                            <i class="fa fa-phone" style="font-size:40px" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-12 text-dark">
                                            <h5>
                                                <b>
                                                    +6012-1234567
                                                </b>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card border-0  h-100">
                                    <div class="row p-4">
                                        <div class="col-lg-12">
                                            <i class="fa fa-map-marker" style="font-size:40px" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-12 text-dark">
                                            <h5>
                                                <b>
                                                    example.gmail.com
                                                </b>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="contact-wrap w-100 p-lg-5 p-4 bg-white" style="border-radius:5px 0 0 5px;">
                            <h3 class="mb-4 text-center">Get in touch</h3>
                            <form method="POST" action="contact-us.php" id="contactForm" name="contactForm">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required oninvalid="this.setCustomValidity('Please insert your name')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('Please insert your enmail')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required oninvalid="this.setCustomValidity('Please insert your subject')" oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="9" placeholder="Message" style="resize:none" required oninvalid="this.setCustomValidity('Please insert your message')" oninput="this.setCustomValidity('')"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group" align="center">
                                            <input type="submit" value="Send Message" name="submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</section>
<script type="text/javascript">
    $(document).ready(function() {

        $("#dot_5").css("display", "block");

        $("#list_5").hover(function() {
            $("#dot_5").css("display", "block");
        }, function() {
            $("#dot_5").css("display", "block");
        });

        $(window).click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_5").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_5").hover(function() {
                    $("#dot_5").css("display", "block");
                }, function() {
                    $("#dot_5").css("display", "block");
                });
            }
        });

        $("#list_2").click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_5").css("display", "none");
                $("#dot_2").css("display", "block");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "block");
                });

                $("#list_5").hover(function() {
                    $("#dot_5").css("display", "block");
                }, function() {
                    $("#dot_5").css("display", "none");
                });
            } else {
                $("#dot_5").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_5").hover(function() {
                    $("#dot_5").css("display", "block");
                }, function() {
                    $("#dot_5").css("display", "block");
                });
            }
        });
    });
</script>
<?php require_once("footer.php") ?>

</html>