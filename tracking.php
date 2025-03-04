<?php
include("db.php");
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
        }

        .tracking_input {
            width: 70%;
        }

        .tracking_btn {
            width: 30%;
        }

        @media screen and (max-width:991px) {
            .tracking_input,
            .tracking_btn {
                float:none;
                width:100%;
                padding-top:10px;
            }
        }
    </style>
</head>


<?php include("header.php") ?>

<section id="tracking_section">

    <body>
        <div class="col-lg-12 tracking_top text-center">
            <div class="container">
                <div class="row tracking_name">
                    <div class="col-lg-8">
                        <div class="float-right tracking_input">
                            <input type="search" class="form-control" placeholder="Enter parcel tracking number" style="height:50px;border-radius:0">
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="float-left tracking_btn">
                            <button class="btn btn-success" style="height:50px;border-radius:0;width:100%" id="track"> TRACK </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-left:0;margin-right:0;background-color:rgb(248, 248, 248)">
            <div class="container py-5 text-center">
                <div class="col-lg-12">
                    <p style="color:#878787">Start tracking your parcel by entering your tracking ID in the box above</p>
                </div>

                <div class="col-lg-12">
                    <img src="assets/images/tracking.png" alt="" style="width:60%">
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
        $("#dot_3").css("display", "block");

        $("#list_3").hover(function() {
            $("#dot_3").css("display", "block");
        }, function() {
            $("#dot_3").css("display", "block");
        });

        $(window).click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_3").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_3").hover(function() {
                    $("#dot_3").css("display", "block");
                }, function() {
                    $("#dot_3").css("display", "block");
                });
            }
        });

        $("#list_2").click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_3").css("display", "none");
                $("#dot_2").css("display", "block");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "block");
                });

                $("#list_3").hover(function() {
                    $("#dot_3").css("display", "block");
                }, function() {
                    $("#dot_3").css("display", "none");
                });
            } else {
                $("#dot_3").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_3").hover(function() {
                    $("#dot_3").css("display", "block");
                }, function() {
                    $("#dot_3").css("display", "block");
                });
            }
        });
    });
</script>
<?php require_once("footer.php") ?>

</html>