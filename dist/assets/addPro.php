<?php
    session_start();
    include "./db.php";

    $imageerrorflag = -1;

    if(isset($_POST['addproduct'])) {
        $allowed_image_extension = array("png","jpg","jpeg");
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
        if (! in_array($file_extension, $allowed_image_extension)) {
            $imageerrorflag = 0;
        }
        else if (($_FILES["image"]["size"] > 2000000)) {
            $imageerrorflag = 1;
        }
        else {
            $target = "./img/" . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
            } else {
                $imageerrorflag = 2;
            }
        }

    if($imageerrorflag !== -1) {
        if($imageerrorflag == 0) {
            header("location:../addProducts.php?error=0");
        } else if($imageerrorflag == 1) {
            header("location:../addProducts.php?error=1");
        } else {
            header("location:../addProducts.php?error=2");
        }
    }
        
    $vendorid = mysqli_real_escape_string($connection, $_SESSION['vendor_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $stock = mysqli_real_escape_string($connection, $_POST['stock']);
    $image = mysqli_real_escape_string($connection, basename($_FILES["image"]["name"]));

    $query = "INSERT INTO products(vendorid, name, description, image, category, price, stock) ";
    $query .= "VALUES('$vendorid', '$name', '$description', '$image', '$category', '$price', '$stock')";
    $result = mysqli_query($connection, $query);
    if($result) {
        header("location:../viewAllProducts.php");
    } else {
        header("location:../addProducts.php?error=3");
    }
}
?>