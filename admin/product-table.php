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
                SELECT * FROM products LEFT JOIN product_category ON products.category_id = product_category.category_id WHERE product_name LIKE '%".$_POST["query"]."%' 
                OR product_description LIKE '%".$_POST["query"]."%' OR product_price LIKE '%".$_POST["query"]."%' OR category_name LIKE '%".$_POST["query"]."%' 
                ORDER BY product_id DESC
            "; 
        }else{
            $query = "
                SELECT * FROM products LEFT JOIN product_category ON product.category_id = product_category.category_id WHERE product_name LIKE '%".$_POST["query"]."%' 
                OR product_description LIKE '%".$_POST["query"]."%' OR product_price LIKE '%".$_POST["query"]."%' OR category_name LIKE '%".$_POST["query"]."%'
                ORDER BY product_id ASC
            "; 
        }
    }
    else
    {
        if ($_POST['selection'] == "1") {
            $query = "
                SELECT * FROM products LEFT JOIN product_category ON products.category_id = product_category.category_id ORDER BY product_id DESC
            ";
        }else{
            $query = "
                SELECT * FROM products LEFT JOIN product_category ON products.category_id = product_category.category_id ORDER BY product_id ASC
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
                        <th style="width: 20%;">Name</th>
                        <th style="width: 40%;">Description</th>
                        <th style="width: 10%;">Category</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 10%;">Create Date</th>
                        <th style="width: 20%;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
        ';
        foreach ($result as $row)
        {
            $product_create_time = $row['product_create_time'];
            $create_date = new DateTime("$product_create_time");
            $create_date_format = $create_date->format('Y-m-d');
            
            $output .= '
                <tr>
                    <td></td>
                    <td><img src="../assets/images/products/'.$row['product_image'].'" style="width:30%;margin-right: 10px;" alt="">'.$row['product_name'].'</td>
                    <td>'.$row['product_description'].'</td>
                    <td>'.$row['category_name'].'</td>
                    <td>RM '.$row['product_price'].'</td>
                    <td>'.$create_date_format.'</td>
                    <td>
                        <input type="button" name="edit" value="edit" data-id="'.$row['product_id'].'" data-toggle="modal" data-target="#editModal" class="btn btn-warning btn-sm edit_data" style="margin-bottom:10px;" />
                        <input type="button" name="delete" value="delete" data-id="'.$row['product_id'].'" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm delete_data" />
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
                        <th style="width: 20%;">Name</th>
                        <th style="width: 45%;">Description</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 10%;">Create Date</th>
                        <th style="width: 20%;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="text-center" colspan="8" >No product yet </td></tr>
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
    $query = "SELECT * FROM products LEFT JOIN product_category ON products.category_id = product_category.category_id WHERE product_id = '".$_POST["edit_data"]."'";  
    $result = $conn->query($query) or die($conn->error . __LINE__); 
    if(mysqli_num_rows($result) > 0 ){
        $row = $result->fetch_assoc();
        $output .= '  
            <label>Name</label>
            <input type="text" name="name" id="name" value="'.$row['product_name'].'" class="form-control" />
            <br />
            <label>Description</label>
            <textarea name="description" id="description" class="form-control">'.$row['product_description'].'</textarea>
            <br />
            <label>Category</label>
            <select name="category" id="category" class="form-control">
                <option value="'.$row['category_id'].'" >'.$row['category_name'].'</option>  
        '; 
        
        $query2 = "SELECT * FROM product_category WHERE category_id != '".$row['category_id']."'";
        $result2 = $conn->query($query2) or die($conn->error . __LINE__); 
        if(mysqli_num_rows($result2) > 0 ){
            while($CategoryRow = $result2->fetch_assoc()){
                $output .= '<option value="'.$CategoryRow['category_id'].'" >'.$CategoryRow['category_name'].'</option>';
            }
        }

        $output .= '
            </select>
            <br />  
            <label>Price</label>
            <input type="text" name="price" id="price" value="'.$row['product_price'].'" class="form-control"/>
            <br />
            <label>Image</label>
            <br />
            <div class="profile-pic-div">
                <img src="../assets/images/products/'.$row['product_image'].'" class="photo" id="photo">
                <input type="file" class="file" id="file" name="image">
                <label for="file" class="uploadBtn" id="uploadBtn">Choose Photo</label>
            </div>
            <br />  
        ';

        $query3 = "SELECT * FROM product_sub_image WHERE product_id = '".$_POST["edit_data"]."'";
        $result3 = $conn->query($query3) or die($conn->error . __LINE__); 
        if(mysqli_num_rows($result3) > 0 ){
            $i = 1; 
            while($ImageRow = $result3->fetch_assoc()){
                $i++;

                $output .= '
                    <label>Image '.$i.'</label>
                    <br />
                    <div class="profile-pic-div'.$i.'">
                        <img src="../assets/images/products/'.$ImageRow['sub_image'].'" class="photo'.$i.'" id="photo'.$i.'">
                        <input type="file" class="file2" id="file'.$i.'" name="image'.$i.'">
                        <label for="file'.$i.'" class="uploadBtn'.$i.'" id="uploadBtn'.$i.'">Choose Photo</label>
                        <input type="hidden" name="image_no'.$i.'" value="'.$ImageRow['image_no'].'">
                    </div>
                    <br />
                ';
            }
        }

        $output .= '
            <br />
            <input type="hidden" name="id" id="id" value="'.$row['product_id'].'"/>
            <input type="submit" name="edit" id="edit" value="Save" class="btn btn-success" style="width: 100%;"/>
        ';
    }  
      echo $output; 
}

if(isset($_POST['delete_data'])){
    $output = '';  
    $query = "SELECT * FROM products WHERE product_id = '".$_POST["delete_data"]."'";  
    $result = $conn->query($query) or die($conn->error . __LINE__); 
    if(mysqli_num_rows($result) > 0 ){
        $row = $result->fetch_assoc();
        $output .= '
            <h5>Delete '.$row['product_name'].'?</h5>
            <hr>
            <div style="float: right" >
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <a class="btn btn-danger btn-sm" href="product.php?delete='.$row['product_id'].'">DELETE</a>
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
            $.ajax({
                url: "product-table.php",
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
                url: "product-table.php",
                method:"POST",  
                data:{delete_data:delete_data},  
                success:function(data){  
                    $('#delete_detail').html(data);   
                }
            });
        });
    });

    // Image 1
    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    imgDiv.addEventListener('mouseenter', function() {
        uploadBtn.style.display = "block";
    });

    imgDiv.addEventListener('mouseleave', function() {
         uploadBtn.style.display = "none";
    });

    file.addEventListener('change', function() {
        const choosedFile = this.files[0];
        if (choosedFile) {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                img.setAttribute('src', reader.result);
            });
            reader.readAsDataURL(choosedFile);
        }
    });

    let $uploadfile = $('#file');
    $uploadfile.change(function() {
            readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#photo").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Image 2
    const imgDiv2 = document.querySelector('.profile-pic-div2');
    const img2 = document.querySelector('#photo2');
    const file2 = document.querySelector('#file2');
    const uploadBtn2 = document.querySelector('#uploadBtn2');

    imgDiv2.addEventListener('mouseenter', function() {
        uploadBtn2.style.display = "block";
    });

    imgDiv2.addEventListener('mouseleave', function() {
         uploadBtn2.style.display = "none";
    });

    file2.addEventListener('change', function() {
        const choosedFile2 = this.files[0];
        if (choosedFile2) {
            const reader2 = new FileReader();
            reader2.addEventListener('load', function() {
                img2.setAttribute('src', reader2.result);
            });
            reader2.readAsDataURL(choosedFile2);
        }
    });

    let $uploadfile2 = $('#file2');
    $uploadfile2.change(function() {
        readURL2(this);
    });

    function readURL2(input2) {
        if (input2.files && input2.files[0]) {
            let reader2 = new FileReader();
            reader2.onload = function(e2) {
                $("#photo2").attr('src', e2.target.result);
            }
            reader2.readAsDataURL(input2.files[0]);
        }
    }

    // Image 3
    const imgDiv3 = document.querySelector('.profile-pic-div3');
    const img3 = document.querySelector('#photo3');
    const file3 = document.querySelector('#file3');
    const uploadBtn3 = document.querySelector('#uploadBtn3');

    imgDiv3.addEventListener('mouseenter', function() {
        uploadBtn3.style.display = "block";
    });

    imgDiv3.addEventListener('mouseleave', function() {
         uploadBtn3.style.display = "none";
    });

    file3.addEventListener('change', function() {
        const choosedFile3 = this.files[0];
        if (choosedFile3) {
            const reader3 = new FileReader();
            reader3.addEventListener('load', function() {
                img3.setAttribute('src', reader3.result);
            });
            reader3.readAsDataURL(choosedFile3);
        }
    });

    let $uploadfile3 = $('#file3');
    $uploadfile3.change(function() {
        readURL3(this);
    });

    function readURL3(input3) {
        if (input3.files && input3.files[0]) {
            let reader3 = new FileReader();
            reader3.onload = function(e) {
                $("#photo3").attr('src', e.target.result);
            }
            reader3.readAsDataURL(input3.files[0]);
        }
    }
</script>