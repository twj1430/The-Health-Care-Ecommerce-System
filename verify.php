<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/images/Logo.jpg" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
</head>

<style>
    body {
        background-color: rgb(248, 248, 248) !important;
        padding-top: 100px;
    }
</style>
<?php
include('header.php');
?>

<body>
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 bg-white mt-5 text-center pt-5 pb-5">
                <h3>Please insert your verify code</h3>
                <input type="text" class="form-control mt-4" id="verify_text" name="verify_text" style="width:100%">
                <!-- <button class="btn btn-danger">cancel</button> -->
                <input type="submit" class="btn btn-success mt-4" id="verify" value="Verify">
            </div>
        </div>
    </div>
</body>


<script>
    window.onkeypress = function(event) {
        if (event.keyCode === 13) {
            document.getElementById("verify").click();
        }
    }

    $("#verify").click(function() {
        if ($("#verify_text").val() !== "") {
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    verify_text: $("#verify_text").val(),
                },
                success: function(data) {
                    // $('#result_cancel').html(data);
                    if (data == "yes") {
                        swal({
                                title: "Verified",
                                text: "Your product is genuine and verified!",
                                icon: "success"
                            })
                            .then((value) => {
                                window.location.reload();
                            });
                    } else if (data == "undefined") {
                        swal({
                            title: "Warning",
                            text: "Undefined code, please try again!",
                            icon: "warning"
                        })
                    } else {
                        swal({
                            title: "Code already verified!",
                            text: data,
                            icon: "warning"
                        })
                    }
                }
            });
        } else {
            swal({
                title: "Warning",
                text: "Please insert the code!",
                icon: "warning"
            })
        }

    });

    $(document).ready(function() {
        $("#dot_6").css("display", "block");
        $("#list_6").hover(function() {
            $("#dot_6").css("display", "block");
        }, function() {
            $("#dot_6").css("display", "block");
        });


        $(window).click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_6").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_6").hover(function() {
                    $("#dot_6").css("display", "block");
                }, function() {
                    $("#dot_6").css("display", "block");
                });
            }
        });


        $("#list_2").click(function() {
            if (!$(".dropdown-menu ").hasClass("show")) {
                $("#dot_6").css("display", "none");
                $("#dot_2").css("display", "block");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "block");
                });

                $("#list_6").hover(function() {
                    $("#dot_6").css("display", "block");
                }, function() {
                    $("#dot_6").css("display", "none");
                });
            } else {
                $("#dot_6").css("display", "block");
                $("#dot_2").css("display", "none");

                $("#list_2").hover(function() {
                    $("#dot_2").css("display", "block");
                }, function() {
                    $("#dot_2").css("display", "none");
                });

                $("#list_6").hover(function() {
                    $("#dot_6").css("display", "block");
                }, function() {
                    $("#dot_6").css("display", "block");
                });
            }
        });
    });
</script>

<?php include('footer.php') ?>

</html>