<?php
include("db.php");

if (isset($_SESSION['successful'])) {
    foreach ($_SESSION['cart_item'] as [
        "product_id" => $product_id,
        "product_quantity" => $product_quantity,
        "cart_total_price" => $cart_total_price
    ]) {
        $sql = "INSERT INTO payments values('','" . $_SESSION['cart_id'] . "','" . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "','" . $_SESSION['email_or_phone'] . "','" . $_SESSION['address'] . "','" . $_SESSION['post_code'] . "','" . $_SESSION['city'] . "','" . $_SESSION['state'] . "','" . $_SESSION['country'] . "','THCADID9409487063','$product_id','$product_quantity','" . $_SESSION['shipping_method'] . "','" . $_SESSION['amount'] . "','paid',NOW())";
        $result = $conn->query($sql) or die($conn->error . __LINE__);
    }
}



// session_destroy();
if (isset($_POST['continue'])) {
    // session_destroy();
    unset($_SESSION['cart_item']);
    unset($_SESSION['successful']);
    echo "<script>window.location.assign('index.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

    <!-- Latest compiled and minified CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <style>
        body {
            background-color: #7EC4A0;
            padding-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container bg-white mt-5">
        <div class="row">
            <div class="col-lg-12 text-center mt-3">
                <i class="fa fa-check-circle" aria-hidden="true" style="font-size:80px;color:#7EC4A0"></i>
                <h1 style="color:#7EC4A0">Payment Successful!</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-2 text-left">
                            <h5 style="color:#8c8c8c">Payment ID</h5>
                        </div>
                        <div class="col-lg-5 text-right">
                            <h5>
                                <!-- 20210912154937 --><?php echo $_SESSION['cart_id'] ?>
                            </h5>
                        </div>

                        <div class="col-lg-4 offset-lg-2 text-left pt-3">
                            <h5 style="color:#8c8c8c">
                                Phone or Email
                            </h5>
                        </div>
                        <div class="col-lg-5 pt-3 text-right">
                            <h5>
                                <!-- weijun_1430@gmail.com --> <?php echo $_SESSION['email_or_phone'] ?>
                            </h5>
                        </div>

                        <div class="col-lg-4 offset-lg-2 text-left pt-3">
                            <h5 style="color:#8c8c8c">Name</h5>
                        </div>

                        <div class="col-lg-5 pt-3 text-right">
                            <h5>
                                <!-- Tan Chun --> <?php echo $_SESSION['first_name'] ?>
                            </h5>
                        </div>

                        <div class="col-lg-4 offset-lg-2 text-left pt-3">
                            <h5 style="color:#8c8c8c">Shipping Address</h5>
                        </div>

                        <div class="col-lg-5 pt-3 text-right">
                            <h5>
                                <!-- No.14 Jalan Anggerik 1/3, Taman Anggerik 81200 Johor Bahru, Johor --><?php echo $_SESSION['address'] ?> <?php echo $_SESSION['post_code'] ?> <?php echo $_SESSION['city'] ?> <?php echo $_SESSION['state'] ?> <?php echo $_SESSION['country'] ?>
                            </h5>
                        </div>

                        <div class="col-lg-4 offset-lg-2 text-left pt-3">
                            <h5 style="color:#8c8c8c">Transaction time</h5>
                        </div>

                        <div class="col-lg-5 pt-3 text-right">
                            <h5><?php echo date("Y-m-d h:ia"); ?></h5>
                        </div>
                    </div>
                    <hr>
                    <?php
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql) or die($conn->error);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-lg-11 offset-lg-1 py-3">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="assets/images/products/<?php echo $row['product_image'] ?>" alt="" style="width:100px;height:100px;border-radius:10%">
                                        <span class="cart_dot" style="transition: ease 0.3s;height: 25px;width: 25px;background-color: black;border-radius: 50%;display: block;position: absolute;transform: translate(210%, -429%);font-size: 13px;padding-top: 2px;padding-left: 1px;color: white;">1</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="float-start">
                                            <h5 style="padding-top:30px;"><?php echo $row['product_name'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="float-lg-end">
                                            <h5 style="padding-top:30px;">RM <?php echo $row['product_price'] ?>.00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <hr>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-2 text-left pt-3">
                            <h5 style="color:#8c8c8c">Shipping Method</h5>
                        </div>

                        <div class="col-lg-5 pt-3 text-right">
                            <h5>
                                <!-- West Malaysia (RM8) -->
                                <?php
                                $get_shipping = "SELECT * FROM shipping_method where shipping_id='" . $_SESSION['shipping_method'] . "'";
                                $run_shipping = $conn->query($get_shipping) or die($conn->error . __LINE__);

                                if ($run_shipping->num_rows > 0) {
                                    while ($row = $run_shipping->fetch_assoc()) {
                                ?>
                                        <?php echo $row['shipping_name'] ?> (RM <?php echo $row['shipping_price'] ?>)
                                <?php
                                    }
                                }
                                // echo $_SESSION['shipping_method']
                                ?>
                            </h5>
                        </div>

                        <div class="col-lg-4 offset-lg-2 text-left pt-3">
                            <h5><b>Total Amount</b></h5>
                        </div>

                        <div class="col-lg-5 pt-3 text-right">
                            <h5>
                                RM
                                <!-- 408 --> <?php echo $_SESSION['amount'] ?>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="successful.php" method="POST" id="return">
            <div class="col-lg-12 pt-3 pb-3">
                <input type="submit" class="btn btn-success pt-3 pb-3" name="continue" id="continue" style="width:100%" value="Back To Home">
        </form>
    </div>
</body>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
    // if (window.history.replaceState) {
    //     window.history.replaceState(null, null, window.location.href);
    // }

    // Set the date we're counting down to
    var countDownDate = new Date();
    countDownDate.setSeconds(countDownDate.getSeconds() + 10);
    console.log(countDownDate);

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("continue").value = "It will take you back to the homepage in " + seconds + " seconds ";

        // If the count down is over, write some text 
        if (distance < 0) {
            // clearInterval(x);
            // document.getElementById("continue").innerHTML = "EXPIRED";
            // document.form.submit();
            $("#return").submit();
            // window.location.assign('index.php');

            $.ajax({
                url: "ajax.php",
                data: {
                    leave: "leave"
                },
                type: 'post',
                success: function(response) {
                    if (response == "yes") {
                        window.location.assign('index.php');
                    }
                }
            });
        }
    }, 1000);
</script> -->

</html>