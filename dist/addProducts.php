<?php
    ob_start();
    session_start();

    if(isset($_SESSION['vendor_id'])) {
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Products</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-4" >
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Product</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="./assets/addPro.php" enctype="multipart/form-data">
                                            <input type="hidden" name="vendorid" value="<?php echo $_SESSION['vendor_id']; ?>" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="name">Name</label>
                                                <input class="form-control py-4" id="name" name="name" type="text" placeholder="Enter Product Name" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="description">Description</label>
                                                <input class="form-control py-4" id="description" name="description" type="text" placeholder="Enter Description" required/>
                                            </div>
                                            <?php
                                                if(isset($_GET['error'])) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Image Upload Failed!</strong> 
                                                    <?php
                                                        if($_GET['error'] == 0) { echo "Image can only be of type png, jpg or jpeg"; }
                                                        else if($_GET['error'] == 1) { echo "Image size should be less then 2mb"; }
                                                        else { echo "Unknown error, Please try again."; }
                                                    ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                            <div class="form-group">
                                                <label class="small mb-1" for="image">Image</label>
                                                <input class="form-control py-1" id="image" name="image" type="file" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="category">Category</label>
                                                <br>
                                                <select class="" id="category" name="category"  required>
                                                    <option disabled selected value> -- select an option -- </option>
                                                    <option id="liquor" value="liquor">Liquor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="price">Price(in $)</label>
                                                <input class="form-control pb-2" id="price" name="price" type="text" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="stock">Stock</label>
                                                <input class="form-control pb-2" id="stock" name="stock" type="number" required/>
                                            </div>
                                            <div class="form-group d-flex mt-4 mb-0">
                                                <input type="submit" class="btn btn-primary m-auto" name="addproduct" value="Add">
                                            </div>
                                            <?php
                                                if(isset($_GET['error'])) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                                                    <?php
                                                        if($_GET['error'] == 3) { echo "<strong>Error Adding Product!</strong>. Please try again."; }
                                                    ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php

    } else {
        header("location:./index.php");
    }