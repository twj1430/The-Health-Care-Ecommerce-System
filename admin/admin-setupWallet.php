<?php
include("../db.php");

if(isset($_GET['id'])){
    $_SESSION['admin_id'] = $_GET['id'];
}

if(isset($_POST['confirm'])){
    $admin_id = $_SESSION['admin_id'];
    $admin_bank = $_POST['admin_bank'];
    $admin_bank_account = $_POST['admin_bank_account'];
    $admin_bank_holder = $_POST['admin_bank_holder'];
    $admin_bank_password = $_POST['admin_bank_password'];
    $admin_bank_password_confirm = $_POST['admin_bank_password_confirm'];

    if($admin_bank_password != $admin_bank_password_confirm){
        echo "<script>alert('Password and Confirm Password Different'); window.location.assign('admin-setupWallet.php');</script>";
    }else{
        $admin_bank_password_hash = password_hash($admin_bank_password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin_wallet(wallet_id, admin_id, bank_id, bank_account, bank_holdername, bank_password, bank_create_time) values 
        ('', '$admin_id', '$admin_bank', '$admin_bank_account', '$admin_bank_holder', '$admin_bank_password_hash', NOW())";
        $result = mysqli_query($conn,$sql) or die($conn->error . __LINE__);  

        // echo "$admin_id <br>";
        // echo "$admin_bank <br>";
        // echo "$admin_bank_account <br>";
        // echo "$admin_bank_holder <br>";
        // echo "$admin_bank_password_hash <br>";

        unset($_SESSION['admin_id']);
        echo "<script>alert('Setup Wallet Completed!');window.location.assign('index.php');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Setup Wallet</title>
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

            <h3 class="text-center text-success">
                Setup Your Wallet Password
            </h3>
            <div class="row">
                <form action="admin-setupWallet.php" method="POST">
                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Bank</label>
                        <select name="admin_bank" id="admin_bank" class="form-select" style="border: none;background-color: #F1F3F5 ; padding: 10px 20px;">
                            <option selected>Choose Bank</option> 
                            <option value="Maybank">Maybank</option>
                            <option value="RHB Bank">RHB Bank</option>
                            <option value="CIMB Group Holdings">CIMB Group Holdings</option>
                            <option value="Public Bank Berhad">Public Bank Berhad</option>
                            <option value="Hong Leong Bank">Hong Leong Bank</option>
                            <option value="AmBank">AmBank</option>
                        </select>
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Bank Account</label>
                        <input type="text" name="admin_bank_account" id="admin_bank_account" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Bank Account" required />
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Holder Name</label>
                        <input type="text" name="admin_bank_holder" id="admin_bank_holder" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Holder Name" required />
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>New Wallet Password</label>
                        <input type="password" name="admin_bank_password" id="admin_bank_password" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="New Wallet Password" required />
                    </div>

                    <div class="col-lg-9 offset-lg-2" style="margin-bottom:20px">
                        <label>Confirm Wallet Password</label>
                        <input type="password" name="admin_bank_password_confirm" id="admin_bank_password_confirm" class="form-control" style="border: none;background-color: #F1F3F5 ;padding:20px;" placeholder="Confirm Wallet Password" required />
                    </div>


                    <div class="col-lg-9 offset-lg-2 py-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <button name="confirm" id="confirm" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">REGISTER</button>
                            </div>
                        </div>
                    </div>
                </form>

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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        // $(document).ready(function(e) {
        //     var enter = false;
        //     window.addEventListener('keyup', function(e) {
        //         if (e.keyCode === 13) {
        //             if (!enter) {
        //                 enter = true;
        //                 document.getElementById("login").click();
        //             } else {
        //                 enter = false;
        //             }
        //         }
        //     });
        //     $("#login").click(function() {

        //         var remember = "";
        //         if ($('#remember_me').prop("checked") == true) {
        //             remember = "Yes";
        //         } else {
        //             remember = "No";
        //         }
        //         console.log(remember);

        //         if ($("#email").val() == "" || $("#password").val() == "") {
        //             swal({
        //                 title: "Please fill out all the field!",
        //                 icon: "warning",
        //                 button: "Ok",
        //             });
        //         } else {
        //             $.ajax({
        //                 url: "../ajax.php",
        //                 method: "post",
        //                 data: {
        //                     login: "login",
        //                     remember: remember,
        //                     email: $("#email").val(),
        //                     password: $("#password").val()
        //                 },
        //                 dataType: "text",
        //                 success: function(data) {
        //                     if (data == "Yes") {
        //                         window.location.assign("admin.php");
        //                     } else if (data == "Wrong") {
        //                         swal("Wrong password, please try again!");
        //                     } else {
        //                         swal(data);
        //                     }
        //                     // $('.modal-body').html(data);
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
</body>

</html>