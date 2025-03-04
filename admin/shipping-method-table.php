<?php
include('../db.php');
if(isset($_POST['load_data'])){

    $output = '';

    $limit = '9';
    $page = 1;
    if ($_POST['page'] > 1) {
        $start = (($_POST['page'] - 1) * $limit);
        $page = $_POST['page'];
    } else {
        $start = 0;
    }

    if(isset($_POST["query"]))
    {
        if ($_POST['selection'] == "1") {
            $query = "
                SELECT * FROM shipping_method WHERE shipping_name LIKE '%".$_POST["query"]."%' 
                OR shipping_price LIKE '%".$_POST["query"]."%' ORDER BY shipping_id DESC
            "; 
        }else{
            $query = "
                SELECT * FROM shipping_method WHERE shipping_name LIKE '%".$_POST["query"]."%' 
                OR shipping_price LIKE '%".$_POST["query"]."%' ORDER BY shipping_id ASC
            "; 
        }
    }
    else
    {
        if ($_POST['selection'] == "1") {
            $query = "
                SELECT * FROM shipping_method ORDER BY shipping_id DESC
            ";
        }else{
            $query = "
                SELECT * FROM shipping_method ORDER BY shipping_id ASC
            ";
        }
    }

    $filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';
    $result = $conn->query($query) or die($conn->error . __LINE__);
    $total_data = $result->num_rows;

    $result = $conn->query($filter_query) or die($conn->error . __LINE__);
    $total_filter_data = $result->num_rows;


    if($total_data > 0)
    {
        $output .= '
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr style="background-color:#7EC4A0;">
                        <th></th>
                        <th style="width: 50%;">Name</th>
                        <th style="width: 20%;">Price</th>
                        <th style="width: 20%;">Create Date</th>
                        <th style="width: 20%;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach ($result as $row)
        {
            $shipping_create_time = $row['shipping_create_time'];
            $create_date = new DateTime("$shipping_create_time");
            $create_date_format = $create_date->format('Y-m-d');
            
            $output .= '
                <tr>
                    <td></td>
                    <td>'.$row['shipping_name'].'</td>
                    <td>RM '.$row['shipping_price'].'</td>
                    <td>'.$create_date_format.'</td>
                    <td>
                        <input type="button" name="edit" value="edit" data-id="'.$row['shipping_id'].'" data-toggle="modal" data-target="#editModal" class="btn btn-warning btn-sm edit_data" style="margin-bottom:10px;"/>
                        <input type="button" name="delete" value="delete" data-id="'.$row['shipping_id'].'" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm delete_data" />
                    </td>
                </tr>  
            ';
        }
    }
    else
    {
        $output .= '
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr style="background-color:#7EC4A0;">
                        <th></th>
                        <th style="width: 50%;">Name</th>
                        <th style="width: 20%;">Price</th>
                        <th style="width: 20%;">Create Date</th>
                        <th style="width: 20%;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="text-center" colspan="8" >No shipping method yet </td></tr>
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

    echo $output;
}

if(isset($_POST['edit_data'])){
    $output = '';  
    $query = "SELECT * FROM shipping_method WHERE shipping_id = '".$_POST["edit_data"]."'";  
    $result = $conn->query($query) or die($conn->error . __LINE__); 
    if(mysqli_num_rows($result) > 0 ){
        $row = $result->fetch_assoc();
        $output .= '  
            <label>Name</label>
            <input type="text" name="name" id="name" value="'.$row['shipping_name'].'" class="form-control" />
            <br />
            <label>Price</label>
            <input type="text" name="price" id="price" value="'.$row['shipping_price'].'" class="form-control"/>
            <br />  
            <br />
            <input type="hidden" name="id" id="id" value="'.$row['shipping_id'].'"/>
            <input type="submit" name="edit" id="edit" value="Save" class="btn btn-success" style="width: 100%;"/>
        ';
    }  
      echo $output; 
}

if(isset($_POST['delete_data'])){
    $output = '';  
    $query = "SELECT * FROM shipping_method WHERE shipping_id = '".$_POST["delete_data"]."'";  
    $result = $conn->query($query) or die($conn->error . __LINE__); 
    if(mysqli_num_rows($result) > 0 ){
        $row = $result->fetch_assoc();
        $output .= '
            <h5>Delete '.$row['shipping_name'].'?</h5>
            <hr>
            <div style="float: right" >
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <a class="btn btn-danger btn-sm" href="shipping-method.php?delete='.$row['shipping_id'].'">DELETE</a>
            </div>
        ';
    }
    echo $output; 
}

?>

<script>
    $(document).ready(function() {
        $(".edit_data").click(function (){
            var edit_data = $(this).attr("data-id"); 
            console.log(edit_data);
            $.ajax({
                url: "shipping-method-table.php",
                method:"POST",  
                data:{edit_data:edit_data},  
                success:function(data){  
                    $('#edit_detail').html(data);   
                }
            });
        });

        $(".delete_data").click(function (){
            var delete_data = $(this).attr("data-id"); 
            $.ajax({
                url: "shipping-method-table.php",
                method:"POST",  
                data:{delete_data:delete_data},  
                success:function(data){  
                    $('#delete_detail').html(data);   
                }
            });
        });
    });
</script>