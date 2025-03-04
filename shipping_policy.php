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

        p {
            margin-top: 30px !important;
            margin-bottom: 30px !important;
            /* margin-left:20px; */
        }

        li span {
            font-weight: normal;
            /* padding-left: 15px; */
        }

        ol>li {
            margin-bottom: 50px;
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
                <h1>Shipping Policy </h1>
            </div>

            <div class="col-lg-12 mb-3" style="text-align:justify">
                <ol style="padding-left:0px;font-weight: bold;">
                <li>
                    <span>
                        <b>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </b>
                    </span>
                </li>
                </ol>
            </div>
        </div>
    </div>
</body>
<?php require_once("footer.php") ?>

</html>