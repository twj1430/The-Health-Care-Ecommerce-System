<?php
include("db.php");

if (isset($_POST['track_button'])) {
    echo "<script>window.location.assign('tracking_result.php');</script>";
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
        }

        ol>li {
            margin-bottom: 20px;
        }

        p {
            margin-top: 30px !important;
            margin-bottom: 30px !important;
            /* margin-left:20px; */
        }

        li span {
            font-weight: normal;
            /* padding-left: 15px; */
        }
    </style>
</head>


<?php include("header.php") ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="./assets/images/Logo.jpg" alt="Logo" style="width:25%;height:100%">
            </div>

            <div class="col-lg-12 text-center mb-3">
                <h1>Privacy Policy</h1>
            </div>

            <div class="col-lg-12 mb-3" style="text-align:justify">
                <!-- It is The Healthcare Official (THE HEALTHCARE TRADING) (No. Registration 202103142312 (003268166-X)'s policy to respect your privacy regarding any information we may collect while operating our website. Accordingly, we have developed this privacy policy in order for you to understand how we collect, use, communicate, disclose and otherwise make use of personal information. We have outlined our privacy policy below: -->
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
</body>
<?php require_once("footer.php") ?>

</html>