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

        @media only screen and (min-width: 992px) {
            .tracking-item {
                margin-left: 1rem;
            }

            .tracking-item .tracking-date {
                position: absolute;
                left: -10rem;
                width: 7.5rem;
                text-align: right;
            }

            .tracking-item .tracking-content {
                padding: 0;
                background-color: transparent;
            }

        }

        @media only screen and (max-width:991px) {
            .tracking-item {
                margin-left: 3rem;

            }
        }


        .tracking-item {
            border-left: 1px solid #e5e5e5;
            position: relative;
            padding: 2rem 1.5rem .5rem 2.5rem;
            font-size: .9rem;
            min-height: 5rem;
        }

        .tracking-item .tracking-icon.status-complete {
            /* border: 1px solid rgba(6, 141, 180, 0.3); */
            background-color: #7EC4A0;
        }

        .tracking-item .tracking-icon {
            line-height: 2.3rem;
            position: absolute;
            left: -1rem;
            width: 2rem;
            height: 2rem;
            text-align: center;
            border-radius: 50%;
            font-size: 20px;
            background-color: #fff;
            color: #e5e5e5;
        }

        .tracking-item .tracking-content {
            padding-bottom: 1rem;
        }

        .tracking-item .tracking-content span {
            display: block;
            color: #888;
            font-size: 85%;
        }

        .tracking-item.tracking-active {
            font-weight: bold !important;
        }

        .tracking-item .tracking-icon.status-active {
            border: 1px solid rgba(91, 176, 58, 0.7);
            background-color: #5bb03a;
            color: #ffffff;
            -webkit-box-shadow: 0px 0px 0px 6px rgb(91 176 58 / 40%);
            -moz-box-shadow: 0px 0px 0px 6px rgba(91, 176, 58, 0.4);
            box-shadow: 0px 0px 0px 6px rgb(91 176 58 / 40%);
        }

        .tracking-pending .tracking-date span,
        .tracking-pending .tracking-content,
        .tracking-pending .tracking-content span {
            color: #999999;
        }


        #progressbar {
            margin-bottom: 3vh;
            overflow: hidden;
            color: white;
            padding-left: 0px;
            margin-top: 3vh
        }

        #progressbar li {
            list-style-type: none;
            font-size: 18px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
            color: black
        }

        #progressbar #step1:before {
            content: "";
            color: white;
            width: 40px;
            height: 40px;
            margin-left: 0px !important
        }


        #progressbar #step2:before {
            content: "";
            color: #fff;
            width: 40px;
            height: 40px;
            /* margin-left: 32% */
        }


        #progressbar #step3:before {
            content: "";
            color: rgb(151, 149, 149, 0.651);
            width: 40px;
            height: 40px;
            margin-right: 11% !important
        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: transparent;
            border: 1px solid green;
            border-radius: 50%;
            margin: auto;
            z-index: -1;
            margin-bottom: 1vh
        }

        #progressbar li:after {
            content: '';
            height: 3px;
            background: rgb(151, 149, 149, 0.651);
            position: absolute;
            left: 0%;
            right: 0%;
            margin-bottom: 2vh;
            top: 19px;
            z-index: 1
        }

        .progress-track {
            padding: 0 8%
        }

        #progressbar li:nth-child(2):after {
            margin-right: auto
        }

        #progressbar li:nth-child(1):after {
            margin: auto
        }

        #progressbar li:nth-child(3):after {
            float: left;
            width: 68%
        }

        #progressbar li:nth-child(4):after {
            margin-left: auto;
            width: 132%
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: green
        }

        #progressbar #step1 .bi {
            position: absolute;
            top: -14px;
            font-size: 40px;
            color: white;
            z-index: 100;
        }

        #progressbar #step2 .bi {
            position: absolute;
            top: -18%;
            left: 39%;
            font-size: 40px;
            color: white;
            z-index: 100;

        }

        #progressbar #step3 .bi {
            position: absolute;
            top: -14px;
            right: 21px;
            font-size: 40px;
            color: white;
            z-index: 100;

        }

        .tracking_input {
            width: 70%;
        }

        .tracking_btn {
            width: 30%;
        }

        @media screen and (max-width:1199px) {
            #progressbar #step3 .bi {
                right: 11% !important;
            }

            #progressbar #step2 .bi {
                left: 37%;
            }
        }

        @media screen and (max-width:991px) {

            .offset-md-2 {
                margin-left: 0px !important;
            }

            .tracking_input,
            .tracking_btn {
                float: none;
                width: 100%;
                padding-top: 10px;
            }

            #progressbar li {
                font-size: 15px;
                width: 33%;
            }

            #progressbar #step2 .bi {
                left: 38%;
                top: -20%;
            }
        }

        @media screen and (max-width:767px) {

            #progressbar #step2 .bi {
                left: 33%;
            }
        }

        @media screen and (max-width:460px) {

            #progressbar #step2 .bi {
                left: 31%;
                top: -20%
            }
        }

        @media screen and (max-width:414px) {

            #progressbar #step2 .bi {
                left: 29%;
                top: -20%
            }
        }

        @media screen and (max-width:375px) {

            #progressbar #step2 .bi {
                left: 26%;
                top: -21%;
            }
        }

        @media screen and (max-width:320px) {

            #progressbar #step2 .bi {
                left: 22%;
                top: -21%;
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

        <div style="margin-left:0;margin-right:0;background-color:rgb(248, 248, 248)">
            <div class="container py-5">
                <div class="col-lg-10 offset-lg-2">
                    <div class="progress-track">
                        <ul id="progressbar">
                            <li class="step0 active " id="step1"><i class="bi bi-check"></i>Order placed</li>
                            <li class="step0 active text-center" id="step2"><i class="bi bi-check"></i>In Transit</li>
                            <li class="step0 active text-right" id="step3"><span id="three"><i class="bi bi-check"></i>Out for Delivery</span></li>
                            <!-- <li class="step0 text-right" id="step4">Delivered</li> -->
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 offset-md-2 text-left bg-white" style="padding:20px;">
                    <div class="col-lg-12">
                        <h2 style="font-weight:600">Shipping Status</h2>
                    </div>
                    <hr>
                    <div class='tracking-item'>
                        <div class='tracking-icon status-complete'>
                            <!-- <i class='fa fa-truck' aria-hidden='true'></i> -->
                        </div>
                        <div class='tracking-content'>Parcel is being delivered<span>22 JUN 21, 11:23 am</span></div>
                    </div>

                    <div class='tracking-item'>
                        <div class='tracking-icon status-complete'>
                            <!-- <i class='fa fa-truck' aria-hidden='true'></i> -->
                        </div>
                        <div class='tracking-content'>Parcel is being processed of warehouse - NUSAJAYA<span>22 JUN 21, 11:23 am</span></div>
                    </div>

                    <div class='tracking-item'>
                        <div class='tracking-icon status-complete'>
                            <!-- <i class='fa fa-truck' aria-hidden='true'></i> -->
                        </div>
                        <div class='tracking-content'>Parcel is being delivered<span>22 JUN 21, 11:23 am</span></div>
                    </div>

                    <div class='tracking-item'>
                        <div class='tracking-icon status-complete'>
                            <!-- <i class='fa fa-truck' aria-hidden='true'></i> -->
                        </div>
                        <div class='tracking-content'>Parcel is being processed of warehouse - NUSAJAYA<span>22 JUN 21, 11:23 am</span></div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</section>
<script type="text/javascript">
    $(document).ready(function() {
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