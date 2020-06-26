<?php
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_NAME', "grospic");

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$connection) {
        die("<center><h1>Sorry! Database Not Connected</h1></center>" . mysqli_error($connection));
    }
    mysqli_set_charset($connection, "utf8mb4");
?>