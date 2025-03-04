<?php
$servername = "localhost"; //localhost for local PC or use IP address
$username = "root"; //database name
$password = ""; //database password LaQaDX!biUy}
$database = "thehealthcare"; //database name


// Create connection #scawx
$conn = new mysqli($servername, $username, $password, $database);


// Check connection #scawx
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();


date_default_timezone_set('Singapore');
mysqli_set_charset($conn, 'utf8');

$date = date("Y-m-d");
$time = date("h:i a");
$date_time = date("Y-m-d h:i a");
$check_cart_num = 0;

if (isset($_SESSION['user_id'])) {
    $check_cart = "SELECT * FROM cart where user_id='" . $_SESSION['user_id'] . "'";
    $result = $conn->query($check_cart) or die($conn->error . __LINE__);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ++$check_cart_num;
        }
    }
}


// if (isset($_POST['logout'])) {
//     session_destroy();
//     setcookie('emailcookie', "", time() - (86400 * 30));
//     setcookie('passwordcookie', "", time() - (86400 * 30));
//     header('refresh: 0; url=admin-login.php');
// }

//prevent injection
function validate_input_text($textValue)
{
    if (!empty($textValue)) {
        $trim_text = trim($textValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return '';
}

//check the pathinfo and upload the file
function upload_picture($path, $file)
{
    $targetDir = $path;
    $default = "";

    // get the filename
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($filename)) {
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowType)) {
            // upload file to the server
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $filename;
            }
        }
    }
    // return default image
    return $default;
}

// if (isset($_SESSION['client_id'])) {
//     $sql = "SELECT * FROM cart_item where client_id ='" . $_SESSION['client_id'] . "' AND payment_status='No'";
//     $result = $conn->query($sql) or die($conn->error . __LINE__);

//     if ($result->num_rows > 0) {
//         $my_cart = mysqli_num_rows($result);
//     }
// }
