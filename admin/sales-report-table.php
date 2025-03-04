<?php
include('../db.php');
$output = '';

$query = '';
$limit = '9';
$page = 1;
if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
} else {
    $start = 0;
}

if (isset($_POST["query"])) {
    if ($_POST['id'] == "1") {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_unique_id='".$_SESSION['admin_id']."' OR admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date DESC";
            // $result = $conn->query($sql) or die($conn->error . __LINE__);

            // if ($result->num_rows > 0) {
            //     while ($row = $result->fetch_assoc()) {

            //     }
            // }
            //         $query = "
            // SELECT * FROM admin_sales WHERE admin_id LIKE '%" . $_POST["admin_id_table"] . "%' OR admin_my_sales LIKE '%" . $_POST["admin_id_table"] . "%' AND 
            // (admin_username LIKE '%" . $_POST["query"] . "%' OR admin_contact_number LIKE '%" . $_POST["query"] . "%' 
            // OR admin_email LIKE '%" . $_POST["query"] . "%' OR admin_wechat LIKE '%" . $_POST["query"] . "%' OR admin_whatsapp LIKE '%" . $_POST["query"] . "%')
            // ORDER BY admin_id DESC
            // ";
        } else {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_unique_id='".$_SESSION['admin_id']."' OR admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date ASC";
    //         $query = "
    // SELECT * FROM admin WHERE admin_upline_id LIKE '%" . $_POST["admin_id_table"] . "%' OR admin_unique_id LIKE '%" . $_POST["admin_id_table"] . "%' AND 
    // (admin_username LIKE '%" . $_POST["query"] . "%' OR admin_contact_number LIKE '%" . $_POST["query"] . "%' 
    // OR admin_email LIKE '%" . $_POST["query"] . "%' OR admin_wechat LIKE '%" . $_POST["query"] . "%' OR admin_whatsapp LIKE '%" . $_POST["query"] . "%')
    // ORDER BY admin_id ASC
    // ";
        }
    } else if ($_POST['id'] == "2") {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin_sales.admin_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date DESC";
    //         $query = "
    // SELECT * FROM admin WHERE admin_unique_id LIKE '%" . $_POST["admin_id_table"] . "%' AND 
    // (admin_username LIKE '%" . $_POST["query"] . "%' OR admin_contact_number LIKE '%" . $_POST["query"] . "%' 
    // OR admin_email LIKE '%" . $_POST["query"] . "%' OR admin_wechat LIKE '%" . $_POST["query"] . "%' OR admin_whatsapp LIKE '%" . $_POST["query"] . "%') 
    // ORDER BY admin_id DESC
    // ";
        } else {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin_sales.admin_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date ASC";
    //         $query = "
    // SELECT * FROM admin WHERE admin_unique_id LIKE '%" . $_POST["admin_id_table"] . "%' AND 
    // (admin_username LIKE '%" . $_POST["query"] . "%' OR admin_contact_number LIKE '%" . $_POST["query"] . "%' 
    // OR admin_email LIKE '%" . $_POST["query"] . "%' OR admin_wechat LIKE '%" . $_POST["query"] . "%' OR admin_whatsapp LIKE '%" . $_POST["query"] . "%') 
    // ORDER BY admin_id ASC
    // ";
        }
    } else {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date DESC";
    //         $query = "
    // SELECT * FROM admin WHERE admin_upline_id LIKE '%" . $_POST["admin_id_table"] . "%' AND 
    // (admin_username LIKE '%" . $_POST["query"] . "%' OR admin_contact_number LIKE '%" . $_POST["query"] . "%' 
    // OR admin_email LIKE '%" . $_POST["query"] . "%' OR admin_wechat LIKE '%" . $_POST["query"] . "%' OR admin_whatsapp LIKE '%" . $_POST["query"] . "%') 
    // ORDER BY admin_id DESC
    // ";
        } else {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date ASC";
    //         $query = "
    // SELECT * FROM admin WHERE admin_upline_id LIKE '%" . $_POST["admin_id_table"] . "%' AND 
    // (admin_username LIKE '%" . $_POST["query"] . "%' OR admin_contact_number LIKE '%" . $_POST["query"] . "%' 
    // OR admin_email LIKE '%" . $_POST["query"] . "%' OR admin_wechat LIKE '%" . $_POST["query"] . "%' OR admin_whatsapp LIKE '%" . $_POST["query"] . "%') 
    // ORDER BY admin_id ASC
    // ";
        }
    }
} else {
    if ($_POST['id'] == "1") {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_unique_id='".$_SESSION['admin_id']."' OR admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date DESC";
        } else {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_unique_id='".$_SESSION['admin_id']."' OR admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date ASC";
        }
    } else if ($_POST['id'] == "2") {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin_sales.admin_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date DESC";
        } else {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin_sales.admin_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date ASC";
        }
    } else {
        if ($_POST['selection'] == "1") {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date DESC";
        } else {
            $query = "SELECT * FROM admin_sales left join admin on admin_sales.admin_id=admin.admin_unique_id where admin.admin_upline_id='" . $_SESSION['admin_id'] . "' ORDER BY sales_create_date ASC";
        }
    }
}

$filter_query = $query . ' LIMIT ' . $start . ', ' . $limit . '';
$result = $conn->query($query) or die($conn->error . __LINE__);
$total_data = $result->num_rows;

$result = $conn->query($filter_query) or die($conn->error . __LINE__);
$total_filter_data = $result->num_rows;

$output .= '<div class="card">';
$count = 0;
if ($total_data > 0) {
    $output .= '
    <div class="table-responsive">
        <table class="table" style="margin-bottom: 0rem;">
            <thead>
                <tr style="background-color:#7EC4A0;">
                    <th></th>
                    <th>User Name</th>
                    <th>Order Name</th>
                    <th>Date</th>
                    <th>Product Quantity</th>
                    <th>Total Amount</th>
                    <th>My Income</th>
                </tr>
            </thead>
            <tbody>
    ';
    foreach ($result as $row) {
        $admin_join_date = strtotime($row['sales_create_date']);
        // strtotime($row['Created_Time']);
        
        // $join_date = new DateTime("$admin_join_date");
        $join_date_format = date("Y-m-d h:i", $admin_join_date);
        ++$count;
        $output .= '
            <tr>
                <td>'.$count.'.</td>
                <td><img src="../assets/images/' . $row['admin_profile_image'] . '" style="width:10%;border-radius:50%;margin-right: 10px;" alt="">' . $row['admin_username'] . '</td>
                <td>+60' . $row['admin_contact_number'] . '</td>
                <td>' . $join_date_format . '</td>
                <td>2</td>
                <td>' . $row['admin_my_sales'] . '</td>
                <td>' . $row['admin_total_income'] . '</td>
            </tr>  
        ';
    }
} else {
    $output .= '
    <div class="table-responsive">
        <table class="table" style="margin-bottom: 0rem;">
            <thead>
                <tr style="background-color:#7EC4A0;">
                    <th></th>
                    <th>User Name</th>
                    <th>Order Name</th>
                    <th>Date</th>
                    <th>Product Quantity</th>
                    <th>Total Amount</th>
                    <th>My Income</th>
                </tr>
            </thead>
            <tbody>
                <tr><td class="text-center" colspan="8" >No member yet </td></tr>
            </tbody>
        </table>
    </div>
  ';
}

$output .= '
            </tbody>
        </table>
    </div>
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

echo $output;
