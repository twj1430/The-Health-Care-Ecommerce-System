<?php
include("db.php");

$output = "";


// admin login
if (isset($_POST['admin_email_login'])) {
    $sql = "SELECT * FROM admin where admin_email='" . mysqli_real_escape_string($conn, $_POST['admin_email_login']) . "'";
    $result = $conn->query($sql) or die($conn->error . __LINE__);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify(mysqli_real_escape_string($conn, $_POST['admin_password_login']), $row['admin_password'])) {
                $sqli = "SELECT * FROM admin_wallet where admin_id='" . mysqli_real_escape_string($conn, $row['admin_unique_id']) . "'";
                $run = $conn->query($sqli) or die($conn->error . __LINE__);

                if ($run->num_rows == 0) {
                    echo $row['admin_unique_id'];
                } else {
                    if ($_POST['admin_remember'] == "Yes") {
                        setcookie('thehealthcare_admin_emailcookie', $row['admin_email'], time() + (86400 * 365));
                        setcookie('admin_passwordcookie', $_POST['admin_password_login'], time() + (86400 * 365));
                    }
                    $_SESSION['admin_username'] = $row['admin_username'];
                    $_SESSION['admin_email'] = $row['admin_email'];
                    $_SESSION['admin_id'] = $row['admin_unique_id'];

                    echo "Yes";
                }
            } else {
                echo "Wrong";
            }
        }
    } else {
        echo "No";
    }
}


if (isset($_POST['admin_logout'])) {
    $_SESSION['admin_username'] = '';
    $_SESSION['admin_email'] = '';
    $_SESSION['admin_id'] = '';
    setcookie('thehealthcare_admin_emailcookie', "", time() - (86400 * 30));
    setcookie('admin_passwordcookie', "", time() - (86400 * 30));
    echo "Yes";
}

if (isset($_POST['delete_product_id'])) {
    $current_length = count($_SESSION['cart_item']);
    $count = 0;
    if (count($_SESSION['cart_item']) == 1) {
        unset($_SESSION['cart_item'][0]);
    } else {
        foreach ($_SESSION['cart_item'] as [
            "product_id" => $product_id,
            "product_quantity" => $product_quantity,
            "cart_total_price" => $cart_total_price
        ]) {
            if ($product_id == $_POST['delete_product_id']) {
                while (!empty($_SESSION['cart_item'][$count])) {
                    if (!empty($_SESSION['cart_item'][$count + 1])) {
                        $_SESSION['cart_item'][$count] = $_SESSION['cart_item'][$count + 1];
                        ++$count;
                    } else {
                        unset($_SESSION['cart_item'][$count]);
                        break;
                    }
                }
            } else {
                ++$count;
            }
        }
    }

    echo "Yes";

    // if ($_SESSION['cart_item'] == ($current_length - 1)) {
    //     echo "Yes";
    // } else {
    //     echo "No";
    // }
}

if (isset($_POST['add_product_id'])) {
    $edit_status = false;

    $add_product_id = $_POST['add_product_id'];
    $add_product_quantity = $_POST['add_product_quantity'];
    $add_product_price = $_POST['add_product_price'];

    $add_cart_total_price = $add_product_quantity * $add_product_price;

    $count = 0;

    if (!isset($_SESSION['cart_item'])) {
        $_SESSION['cart_item'] = array();
    }

    if (empty($_SESSION['cart_item'])) {
        $_SESSION['cart_item'][] =
            [
                "product_id" => "$add_product_id",
                "product_quantity" => "$add_product_quantity",
                "cart_total_price" => "$add_cart_total_price"
            ];
    } else {
        foreach ($_SESSION['cart_item'] as [
            "product_id" => $product_id,
            "product_quantity" => $product_quantity,
            "cart_total_price" => $cart_total_price
        ]) {
            if ($product_id == $_POST['add_product_id']) {
                $product_quantity += $add_product_quantity;
                $cart_total_price = $cart_total_price + ($add_product_quantity * $add_product_price);
                $_SESSION['cart_item'][$count] =
                    [
                        "product_id" => "$add_product_id",
                        "product_quantity" => "$product_quantity",
                        "cart_total_price" => "$cart_total_price"
                    ];
                $edit_status = true;
            } else {
                ++$count;
            }
        }

        if (!$edit_status) {
            if (!empty($_SESSION['cart_item'])) {
                $_SESSION['cart_item'][] =
                    [
                        "product_id" => "$add_product_id",
                        "product_quantity" => "$add_product_quantity",
                        "cart_total_price" => "$add_cart_total_price"
                    ];
            }
        }
    }


    echo "Yes";
}

// MP Point
if (isset($_POST['mppoint'])) {
    $admin_mp = $_POST['mppoint'];
    $admin_member = $_POST['member'];
    if ($admin_member == "Bronze") {
        $bronzeSQL = "UPDATE admin_membership SET admin_mp_point= '0', admin_mp_status= 'Bronze'";
        $bronzeQuery = mysqli_query($conn, $bronzeSQL) or die($conn->error . __LINE__);
        echo "1";
    }

    if ($admin_member == "Gold") {
        $goldSQL = "UPDATE admin_membership SET admin_mp_point= '0', admin_mp_status= 'Gold'";
        $goldQuery = mysqli_query($conn, $goldSQL) or die($conn->error . __LINE__);
        echo "1";
    }

    if ($admin_member == "Platinum") {
        $platinumSQL = "UPDATE admin_membership SET admin_mp_point= '0', admin_mp_status= 'Platinum'";
        $platinumQuery = mysqli_query($conn, $platinumSQL) or die($conn->error . __LINE__);
        echo "1";
    }
}

// TP Point
if (isset($_POST['tppoint'])) {
    $admin_tp = $_POST['tppoint'];
    $admin_rewards = $_POST['rewards'];
    if ($admin_rewards == "rewards") {
        $rewardsSQL = "UPDATE admin_membership SET admin_tp_point= '0'";
        $rewardsQuery = mysqli_query($conn, $rewardsSQL) or die($conn->error . __LINE__);
        echo "1";
    }
}

// Edit Profile
if (isset($_POST['edit_profile'])) {
    $admin_id = $_POST['edit_profile'];
    $admin_name = $_POST['admin_name_edit'];
    $admin_contact_number = $_POST['admin_contact_number_edit'];
    $admin_email = $_POST['admin_email_edit'];
    $admin_address = $_POST['admin_address_edit'];
    $admin_post_code = $_POST['admin_post_code_edit'];
    $admin_city = $_POST['admin_city_edit'];
    $admin_country = $_POST['admin_country_edit'];

    $sql = "UPDATE admin SET admin_username= '$admin_name', admin_contact_number = '$admin_contact_number', admin_email = '$admin_email', admin_address = '$admin_address', 
    admin_post_code = '$admin_post_code', admin_city = '$admin_city', admin_country = '$admin_country' WHERE admin_unique_id = '$admin_id'";
    $query = mysqli_query($conn, $sql) or die($conn->error . __LINE__);
    echo "1";
}

if (isset($_POST['increment_cart_id'])) {
    $_SESSION['get_cart_total_price'] = 0;
    $count = 0;
    foreach ($_SESSION['cart_item'] as [
        "product_id" => $product_id,
        "product_quantity" => $product_quantity,
        "cart_total_price" => $cart_total_price
    ]) {
        if ($product_id == $_POST['increment_cart_id']) {
            if ($product_quantity < 25) {
                $product_quantity = ++$product_quantity;
                $cart_total_price = $product_quantity * $_POST['price'];
                $_SESSION['cart_item'][$count] =
                    [
                        "product_id" => "$product_id",
                        "product_quantity" => "$product_quantity",
                        "cart_total_price" => "$cart_total_price"
                    ];
                // $output = "Yes";
                break;
            } else {
                // $output = "No";
            }
        } else {
            ++$count;
        }
    }


    $output .= " <div class='col-lg-12 table-responsive' style='padding:0'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>";
    if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) {
        foreach ($_SESSION['cart_item'] as [
            "product_id" => $product_id,
            "product_quantity" => $product_quantity,
            "cart_total_price" => $cart_total_price
        ]) {

            $_SESSION['get_cart_total_price'] += $cart_total_price;

            $sql = "SELECT * FROM products where product_id='$product_id'";
            $result = $conn->query($sql) or die($conn->error . __LINE__);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product_name = $row['product_name'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];


                    $output .= "  <tr>
                                                    <td>
                                                        <img src='assets/images/products/$product_image' alt='image' class='profile_image'>
                                                        <h6 class='product_name'>$product_name</h6>
                                                    </td>
                                                    <td>
                                                        <div class='py-4'>
                                                            <h6 style='color:#727272;padding-top:10px;'>RM $product_price.00</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class='py-4' style='margin-top: 13px;'>
                                                            <div class='cart-info quantity'>
                                                                <form action='cart.php' method='POST' id='checkout'>
                                                                    <div class='btn-increment-decrement' onClick='decrement_quantity($product_id,$product_price)'>-</div>
                                                                    <input class='input-quantity' id='input-quantity-$product_quantity' value='$product_quantity' style='background-color: white;' disabled>
                                                                    <div class='btn-increment-decrement' onClick='increment_quantity($product_id,$product_price)'>+</div>
                                                                    <input type='hidden' id='price' value='$product_price'>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class='py-4'>
                                                            <h6 style='padding-top:10px;'>RM $cart_total_price.00</h6>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class='py-4'>
                                                            <a href='checkout.php?id=$product_id' class='btn btn-dark' style='margin-top:10px;width:100%'>CHECKOUT
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class='py-4'>
                                                            <button class='btn delete_cart' value='$product_id' style='margin-top:10px;padding-left:0'><i class='fa fa-times' aria-hidden='true'></i></button>
                                                        </div>
                                                    </td>
                                                </tr>";
                }
            }
        }
    } else {

        $output .= "   <tr>
                                        <td colspan='5' class='text-center'>
                                            <h2>There are no items in this cart</h2>
                                        </td>
                                    </tr>";
    }

    $output .= "</tbody>
                        </table>
                    </div>


                    <div class='col-lg-12 py-5'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Cart Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <div class='py-4'>
                                            <h5 style='padding-top:10px;'>TOTAL</h5>";
    if (isset($_SESSION['get_cart_total_price']) && !empty($_SESSION['get_cart_total_price'])) {

        $output .= "<button class='btn btn-success py-3' name='checkout' form='checkout' style='margin-top:30px;border-radius: 0;padding-left:30px;padding-right:30px;'>PROCEED TO CHECKOUT</button>";
    }
    $output .= " </div>
                                    </td>
                                    <td>
                                        <div class='py-4'>
                                            <h5 style='padding-top:10px;'><b>RM ";
    if (isset($_SESSION['get_cart_total_price']) && !empty($_SESSION['get_cart_total_price'])) {
        $output .= $_SESSION['get_cart_total_price'];
    }
    $output .= ".00</b></h5>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <script>
                    $('.delete_cart').click(function() {
                        swal({
                                title: 'Are you sure you want to delete?',
                                icon: 'warning',
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        url: 'ajax.php',
                                        data: {
                                            delete_product_id: $(this).val()
                                        },
                                        type: 'post',
                                        success: function(response) {
                                            if (response == 'Yes') {
                                                swal('Delete Successful!', {
                                                        icon: 'success'
                                                    })
                                                    .then((value) => {
                                                        window.location.reload();
                                                    })
                                            } else {
                                                swal('Error occur, please try agian!', {
                                                    icon: 'warning'
                                                });
                                            }
                                        }
                                    });
                                }
                            });
                    });
                    </script>
                    ";

    echo $output;
}


if (isset($_POST['decrement_cart_id'])) {
    $_SESSION['get_cart_total_price'] = 0;
    $count = 0;
    foreach ($_SESSION['cart_item'] as [
        "product_id" => $product_id,
        "product_quantity" => $product_quantity,
        "cart_total_price" => $cart_total_price
    ]) {
        if ($product_id == $_POST['decrement_cart_id']) {
            if ($product_quantity > 1) {
                $product_quantity = --$product_quantity;
                $cart_total_price = $product_quantity * $_POST['price'];
                $_SESSION['cart_item'][$count] =
                    [
                        "product_id" => "$product_id",
                        "product_quantity" => "$product_quantity",
                        "cart_total_price" => "$cart_total_price"
                    ];
                break;
            }
        } else {
            ++$count;
        }
    }
    $output .= " <div class='col-lg-12 table-responsive' style='padding:0'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>";
    if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) {
        foreach ($_SESSION['cart_item'] as [
            "product_id" => $product_id,
            "product_quantity" => $product_quantity,
            "cart_total_price" => $cart_total_price
        ]) {

            $_SESSION['get_cart_total_price'] += $cart_total_price;

            $sql = "SELECT * FROM products where product_id='$product_id'";
            $result = $conn->query($sql) or die($conn->error . __LINE__);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product_name = $row['product_name'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];


                    $output .= "  <tr>
                                                    <td>
                                                        <img src='assets/images/products/$product_image' alt='image' class='profile_image'>
                                                        <h6 class='product_name'>$product_name</h6>
                                                    </td>
                                                    <td>
                                                        <div class='py-4'>
                                                            <h6 style='color:#727272;padding-top:10px;'>RM $product_price.00</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class='py-4' style='margin-top: 13px;'>
                                                            <div class='cart-info quantity'>
                                                                <form action='cart.php' method='POST' id='checkout'>
                                                                    <div class='btn-increment-decrement' onClick='decrement_quantity($product_id,$product_price)'>-</div>
                                                                    <input class='input-quantity' id='input-quantity-$product_quantity' value='$product_quantity' style='background-color: white;' disabled>
                                                                    <div class='btn-increment-decrement' onClick='increment_quantity($product_id,$product_price)'>+</div>
                                                                    <input type='hidden' id='price' value='$product_price'>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class='py-4'>
                                                            <h6 style='padding-top:10px;'>RM $cart_total_price.00</h6>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class='py-4'>
                                                            <a href='checkout.php?id=$product_id' class='btn btn-dark' style='margin-top:10px;width:100%'>CHECKOUT
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class='py-4'>
                                                            <button class='btn delete_cart' value='$product_id' style='margin-top:10px;padding-left:0'><i class='fa fa-times' aria-hidden='true'></i></button>
                                                        </div>
                                                    </td>
                                                </tr>";
                }
            }
        }
    } else {

        $output .= "   <tr>
                                        <td colspan='5' class='text-center'>
                                            <h2>There are no items in this cart</h2>
                                        </td>
                                    </tr>";
    }

    $output .= "</tbody>
                        </table>
                    </div>


                    <div class='col-lg-12 py-5'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Cart Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <div class='py-4'>
                                            <h5 style='padding-top:10px;'>TOTAL</h5>";
    if (isset($_SESSION['get_cart_total_price']) && !empty($_SESSION['get_cart_total_price'])) {

        $output .= "<button class='btn btn-success py-3' name='checkout' form='checkout' style='margin-top:30px;border-radius: 0;padding-left:30px;padding-right:30px;'>PROCEED TO CHECKOUT</button>";
    }
    $output .= " </div>
                                    </td>
                                    <td>
                                        <div class='py-4'>
                                            <h5 style='padding-top:10px;'><b>RM ";
    if (isset($_SESSION['get_cart_total_price']) && !empty($_SESSION['get_cart_total_price'])) {
        $output .= $_SESSION['get_cart_total_price'];
    }
    $output .= ".00</b></h5>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>";

    echo $output;
}

if (isset($_POST['filter_id'])) {
    $filter_id = mysqli_real_escape_string($conn, $_POST['filter_id']);
    $count = 0;
    $sql = "SELECT * FROM products where category_id='" . $_POST['category_id'] . "'";
    $result = $conn->query($sql) or die($conn->error . __LINE__);

    $total_count = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $first_product_name = str_split($row['product_name']);
            if ($first_product_name[0] == strtoupper($filter_id)) {
                ++$total_count;
            }
        }
    }

    //define how many results you want per page
    $results_per_page = 3;
    //determine which page number visitor is currently on
    $page = 1;

    //determine the sql LIMIT starting number for the results on the displaying page
    $this_page_first_result = ($page - 1) * $results_per_page;

    //$retrieve the sql LIMIT starting number for the results on the displaying page
    $sqli = "SELECT * FROM products where category_id='" . $_POST['category_id'] . "' ORDER BY product_create_time DESC LIMIT  " . $this_page_first_result . ',' . $results_per_page;

    $results = $conn->query($sqli) or die($conn->error . __LINE__);

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {

            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $first_product_name = str_split($row['product_name']);
            $product_description = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];

            if ($first_product_name[0] == strtoupper($filter_id)) {
                ++$count;
                $output .= "    <div class='col-lg-4 py-3'>
                                <a href='product-details.php?id2=$product_id'>
                                    <div class='card border-0'>
                                        <img src='assets/images/products/$product_image' alt='' style='width:100%;'>
                                    </div>
                                </a>
                                <h5 class='text-center' style='margin-top:10px'>$product_name</h5>
                                <h5 class='text-center text-success'>RM $product_price.00</h5>
                            </div>";
            }
        }



        //determine number of total pages available
        $number_of_pages = ceil($total_count / $results_per_page);

        $output .= '<div class="col-lg-12 text-center">';

        for ($page1 = 1; $page1 <= $number_of_pages; $page1++) {
            if ($page == $page1) {
                $output .= '<a href="product-list.php?page=' . $page1 . '" class="btn btn-dark next" style="border-radius:0;margin-left:10px;">' . $page1 . '</a>';
            } else {
                $output .= '<a href="product-list.php?page=' . $page1 . '" class="btn btn-outline-dark next" style="border-radius:0;margin-left:10px;">' . $page1 . '</a>';
            }
        }
    }
    if ($total_count == 0) {
        $output .= "<div class='col-lg-12 py-3 text-center'>
        <h1>No Results</h1>
</div>";
    } else {
        $output .= '
        <a href="product-list.php?page=' . $number_of_pages . '" class="btn btn-outline-dark next" style="border-radius:0;margin-left:10px;">></a></div>';
    }
    echo $output;
}

if (isset($_POST['leave'])) {
    session_destroy();
    echo "1";
}

if (isset($_POST['find_code'])) {
    echo $output .= '
<div class="modal-content">
    <div class="modal-header">
        <h3 id="code_header">Insert code for ' . $_POST["find_code"] . '</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="modal_insert1">
        <input type="hidden" class="form-control" id="order_code_id" name="order_code_id" value="' . $_POST['find_code'] . '">
        <input type="text" class="form-control" id="order_code" name="order_code">
        <input type="submit" class="btn btn-success mt-3" value="submit" name="submit" id="insert_code">
    </div>
</div>

<script>
    $("#insert_code").click(function() {
        swal({
                title: "Confirmation",
                text: "Please check if the code is correct.",
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    insert: "Insert"
                },
            })
            .then((value) => {
                switch (value) {
                    case "insert":
                        $.ajax({
                            url: "../ajax.php",
                            method: "POST",
                            data: {
                                order_code_id: $("#order_code_id").val(),
                                order_code: $("#order_code").val()
                            },
                            success: function(data) {
                                // console.log(data);
                                if (data == "1") {
                                    swal("Insert Successful!", {
                                            icon: "success"
                                        })
                                        .then((value) => {
                                            window.location.reload();
                                        })
                                } else {
                                    swal({
                                        title: "Invalid code, please try again!",
                                        icon: "warning",
                                    })
                                }
                            }
                        });
                        break;
                }
            });
    });
    
</script>';
}

// if (isset($_POST['find_edit_code'])) {

//     $sql = "SELECT * FROM payments where payment_id='" . mysqli_real_escape_string($conn, $_POST["find_edit_code"]) . "'";

//     $result = $conn->query($sql) or die($conn->error . __LINE__);

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             echo $output .= '
// <div class="modal-content">
//     <div class="modal-header">
//         <h3 id="code_header">Edit code for ' . $_POST["find_edit_code"] . '</h3>
//         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
//             <span aria-hidden="true">&times;</span>
//         </button>
//     </div>
//     <div class="modal-body" id="modal_edit1">
//         <input type="hidden" class="form-control" id="order_code_id" name="order_code_id" value="' . $_POST['find_edit_code'] . '">
//         <input type="text" class="form-control" id="order_code" name="order_code" value="' . $row["verify_code"] . '">
//         <input type="submit" class="btn btn-success mt-3" value="submit" name="submit" id="edit_code">
//     </div>
// </div>

// <script>
//     $("#edit_code").click(function() {
//         swal({
//                 title: "Confirmation",
//                 text: "Are you sure you want to change the code?",
//                 icon: "warning",
//                 buttons: {
//                     cancel: "Cancel",
//                     yes: "Yes"
//                 },
//             })
//             .then((value) => {
//                 switch (value) {
//                     case "yes":
//                         $.ajax({
//                             url: "../ajax.php",
//                             method: "POST",
//                             data: {
//                                 edit_order_code_id: $("#order_code_id").val(),
//                                 edit_order_code: $("#order_code").val()
//                             },
//                             success: function(data) {
//                                 // console.log(data);
//                                 if (data == "1") {
//                                     swal("Edit Successful!", {
//                                             icon: "success"
//                                         })
//                                         .then((value) => {
//                                             window.location.reload();
//                                         })
//                                 } else {
//                                     swal({
//                                         title: "Invalid code, please try again!",
//                                         icon: "warning",
//                                     })
//                                 }
//                             }
//                         });
//                         break;
//                 }
//             });
//     });

// </script>';
//         }
//     }
// }

// if (isset($_POST['order_code'])) {
//     $sql = "UPDATE payments set verify_code='" . mysqli_real_escape_string($conn, $_POST['order_code']) . "' where payment_id='" . mysqli_real_escape_string($conn, $_POST['order_code_id']) . "'";
//     $result = $conn->query($sql) or die($conn->error . __LINE__);

//     if ($result) {
//         $output .= "1";
//     } else {
//         $output .= "2";
//     }

//     echo $output;
// }

// if (isset($_POST['edit_order_code_id'])) {
//     $sql = "UPDATE payments set verify_code='" . mysqli_real_escape_string($conn, $_POST['edit_order_code']) . "',verify_status='1' where payment_id='" . mysqli_real_escape_string($conn, $_POST['edit_order_code_id']) . "'";
//     $result = $conn->query($sql) or die($conn->error . __LINE__);

//     if ($result) {
//         $output .= "1";
//     } else {
//         $output .= "2";
//     }

//     echo $output;
// }

if (isset($_POST['verify_text'])) {
    $verify_text = mysqli_real_escape_string($conn, $_POST['verify_text']);

    $sql = "SELECT * FROM product_code";
    $result = $conn->query($sql) or die($conn->error . __LINE__);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['product_code'] == $verify_text) {
                if ($row['product_status'] == "1") {
                    $sqli = "UPDATE product_code set product_status='2',product_verify_time=NOW() where code_id='" . $row['code_id'] . "'";
                    $run = $conn->query($sqli) or die($conn->error . __LINE__);
                    $output = "yes";
                } else {
                    // $output = "no";
                    $output .= "Verified Time: " . date("Y-m-d h:i a", strtotime($row['product_verify_time'])) . "";
                }
            }
        }
    }


    if ($output == "") {
        $output = "undefined";
    }

    echo $output;
}
