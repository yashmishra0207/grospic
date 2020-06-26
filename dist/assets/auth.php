<?php
    session_start();
    include "./db.php";

    if(isset($_POST['login'])) {
        $un = mysqli_real_escape_string($connection, $_POST['email']);
        $ps = mysqli_real_escape_string($connection, $_POST['password']);
        $query = "SELECT * FROM vendors WHERE email = '$un'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['password'];
        
        if(strcmp($ps,$db_password) !== 0) {

            header("Location: ../login.php?loginfailed");
        
        } else {
            $_SESSION['vendor_name'] = $row['email'];
            $_SESSION['vendor_id'] = $row['id'];
            header("Location: ../index.php");
        }
    }
?>