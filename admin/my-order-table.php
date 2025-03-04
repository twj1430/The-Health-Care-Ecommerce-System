<?php
include('../db.php');
$output = '';

$limit = '9';
$page = 1;
if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
} else {
    $start = 0;
}

if (isset($_POST["query"])) {
    if ($_POST['status'] == "all") {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id ORDER BY payment_create_time DESC
            ";
        } else {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id ORDER BY payment_create_time ASC
            ";
        }
    } else {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id WHERE deliver_status='" . $_POST['status'] . "' ORDER BY payment_create_time DESC
            ";
        } else {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id WHERE deliver_status='" . $_POST['status'] . "' ORDER BY payment_create_time ASC
            ";
        }
    }
} else {
    if ($_POST['status'] == "all") {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id ORDER BY payment_create_time DESC
            ";
        } else {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id ORDER BY payment_create_time ASC
            ";
        }
    } else {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id WHERE deliver_status='" . $_POST['status'] . "' ORDER BY payment_create_time DESC
            ";
        } else {
            $query = "SELECT * FROM payments left join products on payments.product_id=products.product_id WHERE deliver_status='" . $_POST['status'] . "' ORDER BY payment_create_time ASC
            ";
        }
    }
}

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';
$result = $conn->query($query) or die($conn->error . __LINE__);
$total_data = $result->num_rows;

$result = $conn->query($filter_query) or die($conn->error . __LINE__);
$total_filter_data = $result->num_rows;

if ($total_data > 0) {
    $output .= '
        <div class="dashboard-product table-responsive" style="padding:0">
            <table class="table">
                <thead>
                    <tr style="background-color:#7EC4A0;">
                        <th>Order Number</th>
                        <th>Product</th>
                        <th>Total</th>
                        <th>Recipient</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
    ';
    foreach ($result as $row) {

        $output .= '
                <tr>
                    <td class="text-center">
                    <span class="order_list text-primary" id="' . $row['payment_id'] . '" data-id='. $row['payment_id'] .'>#' . $row['payment_id'] . '</span> <br><span style="color:#738599">2021-01-23</span></td>
                    <td tyle="width: 34%;">
                        <div class="row" style="padding-right:0">
                            <div class="col-lg-2">
                                <img src="../assets/images/products/' . $row['product_image'] . '" style="width:100%" alt="">
                            </div>
                            <div class="col-lg-10">
                                <h6 style="display:inline-block;color:black;">' . $row['product_name'] . '</h6>
                                <h6 style="display:inline-block;color:black;;padding-left:20px">x1</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h6> ' . $row['payment_amount'] . '</h6>
                    </td>
                    <td>
                        <h6>' . $row['payment_name'] . '</h6>
                    </td>
                    <td>
                        <h6>+60 14 566 3232</h6>
                    </td>
                    <td>
                        <h6>' . $row['payment_address'] . ' ' . $row['payment_post_code'] . ' ' . $row['payment_city'] . ' ' . $row['payment_state'] . ' ' . $row['payment_country'] . '</h6>
                    </td>
                    <td>';
        if ($row['deliver_status'] == "pending") {
            $output .= '<div class="col-lg-12 text-center" style="width:100%;border:1px solid #F9008F;color:#F9008F;padding:5px 10px 5px 10px;background-color:#FFF8FD">
                            Pending
                        </div>';
        } else if ($row['deliver_status'] == "paid") {
            $output .= ' <div class="col-lg-12 text-center" style="width:100%;border:1px solid #00968D;color:#00968D;padding:5px 10px 5px 10px;background-color:#E6FFFD">
                            Paid
                        </div>';
        } else if ($row['deliver_status'] == "complete") {
            $output .= '<div class="col-lg-12 text-center" style="width:100%;border:1px solid #1B55E2;color:#1B55E2;padding:5px 10px 5px 10px;background-color:#EEF4FF">
                            Complete
                        </div>';
        }

        // if (empty($row['verify_code'])) {
        //     $output .= ' <button class="btn btn-success mt-1 insert_code" data-id="' . $row['payment_id'] . '" data-toggle="modal" data-target="#insertModal">Insert</button>
        //             </td>
        //         </tr>  
        // ';
        // } else {
        //     if ($row['verify_status'] == "1") {
        //         $output .= ' <button class="btn btn-primary mt-1 edit_code" data-id="' . $row['payment_id'] . '" data-toggle="modal" data-target="#editModal">Edit</button>
        //             </td>
        //         </tr>  
        // ';
        //     } else {
        //         $output .= '<div class="col-lg-12 text-center mt-3" style="width:100%;border:1px solid #00968D;color:#00968D;padding:5px 10px 5px 10px;background-color:#E6FFFD">
        //         Verified
        //     </div>';
        //     }
        // }
    }
} else {
    $output .= '
    <div class="dashboard-product" style="padding:0">
        <table class="table">
            <thead>
                <tr style="background-color:#7EC4A0;">
                    <th>Order Number</th>
                    <th>Product</th>
                    <th>Total</th>
                    <th>Recipient</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="order_list"><td class="text-center" colspan="8" >No order yet </td></tr>
            </tbody>
        </table>
    </div>
  ';
}

$output .= '
            </tbody>
        </table>
    </div>
  <ul class="pagination mt-3 pr-3" style="float: right;">
';

$total_links = ceil($total_data / $limit);
$previous_link = '';
$next_link = '';
$page_link = '';

if ($total_links > 4) {
    if ($page < 5) {
        for ($count = 1; $count <= 5; $count++) {
            $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
    } else {
        $end_limit = $total_links - 5;
        if ($page > $end_limit) {
            $page_array[] = 1;
            $page_array[] = '...';
            for ($count = $end_limit; $count <= $total_links; $count++) {
                $page_array[] = $count;
            }
        } else {
            $page_array[] = 1;
            $page_array[] = '...';
            for ($count = $page - 1; $count <= $page + 1; $count++) {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        }
    }
} else {
    for ($count = 1; $count <= $total_links; $count++) {
        $page_array[] = $count;
    }
}
if (!$total_data == 0) {
    for ($count = 0; $count < count($page_array); $count++) {
        if ($page == $page_array[$count]) {
            $page_link .= '
            <li class="page-item disabled">
                <a class="page-link" href="#" style="background-color: #7EC4A0; color: white;">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
            </li>
        ';

            $previous_id = $page_array[$count] - 1;
            if ($previous_id > 0) {
                $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
            } else {
                $previous_link = '
                <li class="page-item disabled">
                    <a class="page-link" href="#">Previous</a>
                </li>
            ';
            }
            $next_id = $page_array[$count] + 1;
            if ($next_id > $total_links) {
                $next_link = '
                <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                </li>
            ';
            } else {
                $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
            }
        } else {
            if ($page_array[$count] == '...') {
                $page_link .= '
                <li class="page-item disabled">
                    <a class="page-link" href="#">...</a>
                </li>
            ';
            } else {
                $page_link .= '
                <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
            ';
            }
        }
    }
}
$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>
';
$output .= '<script>
    $(".order_list").click(function() {
        var data = $(this).attr("data-id");
        console.log(data);
        var link = "order-details.php?id=" + data;
        window.location.assign(link);
    });</script>';
echo $output;
