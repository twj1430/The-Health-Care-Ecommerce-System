<?php
if (!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id'])) {
    if (isset($_COOKIE['thehealthcare_admin_emailcookie'])) {
        // sql query
        $sql = "SELECT * from admin where admin_email='" . $_COOKIE['thehealthcare_admin_emailcookie'] . "'"; //username and password same ？
        $result = $conn->query($sql) or die($conn->error . __LINE__);

        if ($result->num_rows > 0) { //over 1 database(record) so run
            while ($row = $result->fetch_assoc()) {
                if (password_verify($_COOKIE['admin_passwordcookie'], $row['admin_password'])) {
                    $_SESSION['admin_username'] = $row['admin_username'];
                    $_SESSION['admin_email'] = $row['admin_email'];
                    $_SESSION['admin_id'] = $row['admin_unique_id'];
                }
            }
        }
    }else{
        echo "<script>window.location.assign('admin-login.php')</script>";
    }
}

// if (!isset($_SESSION['thehealthcare_admin_id'])) {
//     echo "<script>window.alert('You need to login first!');window.location.assign('admin-login.php')</script>";
// }
