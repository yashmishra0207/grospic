<?php
    session_start();
    
    $_SESSION['vendor_id'] = NULL;
    header('location:./login.php');
?>