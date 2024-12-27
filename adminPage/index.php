<?php    
    include('../includs/connect.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="" href="../images/admin-removebg-preview.png" style="width: 100%;">
        <!--Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css -->
        <link rel="stylesheet" href="../css/style.css">
        <title>Admin Page</title>
    </head>
    <body>
        <!-- navbar -->
        <div class="container-fluid p-0">
            <!-- first child -->
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <img src="../images/logo1.png" alt="" class="logo">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <?php
                                if(isset($_SESSION['adminEmail'])){
                                    $name = $_SESSION['adminName'];
                                    echo "<li class='nav-item'> <a class='nav-link' href='#'>Welcome $name </a> </li>";
                                }else{
                                    echo "<li class='nav-item'> <a class='nav-link' href='admin_login.php'>Register</a> </li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </nav>
            <!-- second child -->
            <div class="bg-light">    <h3 class="text-center p-2">Manage Details</h3>    </div>
            <!-- third child -->
            <div class="row m-0">
                <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                    <div class="px-2">
                        <img src="../images/adminI-removebg-preview.png" alt="" class="admin-image">
                        <?php
                            if(isset($_SESSION['adminEmail'])){
                                $name = $_SESSION['adminName'];
                                echo "<p class='text-light'>Admin $name</p>";
                            }else{
                                echo "<p class='text-light'>Admin Guest</p>";
                            }
                        ?>
                    </div>
                    <div class="button text-center px-5 mx-5 box">
                        <button class="btn btn-info"><a href="insert_product.php" class="nav-link text-light my-1 p-0">Insert Product</a></button>
                        <button class="btn btn-info"><a href="index.php?view_product" class="nav-link text-light my-1 p-0">View Product</a></button>
                        <button class="btn btn-info"><a href="index.php?insert_categories" class="nav-link text-light my-1 p-0">Insert Categories</a></button>
                        <button class="btn btn-info"><a href="index.php?view_category" class="nav-link text-light my-1 p-0">View Categories</a></button>
                        <button class="btn btn-info"><a href="index.php?insert_brand" class="nav-link text-light my-1 p-0">Insert Brand</a></button>
                        <button class="btn btn-info"><a href="index.php?view_brand" class="nav-link text-light my-1 p-0">View Brand</a></button>
                        <button class="btn btn-info"><a href="index.php?all_order" class="nav-link text-light my-1 p-0">All orders</a></button>
                        <button class="btn btn-info"><a href="index.php?payment" class="nav-link text-light my-1 p-0">All payment</a></button>
                        <button class="btn btn-info"><a href="index.php?user" class="nav-link text-light my-1 p-0">List User</a></button>
                        <button class="btn btn-info"><a href="logout_admin.php" class="nav-link text-light my-1 p-0">Logout</a></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-4 p-5">
            <?php
                if(isset($_GET['insert_categories'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brand.php');
                }
                if(isset($_GET['view_product'])){
                    include('view_product.php');
                }
                if(isset($_GET['edit_product'])){
                    include('edit_product.php');
                }
                if(isset($_GET['delete_product'])){
                    include('delete_product.php');
                }
                if(isset($_GET['view_category'])){
                    include('view_category.php');
                }
                if(isset($_GET['view_brand'])){
                    include('view_brand.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brand'])){
                    include('edit_brand.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brand'])){
                    include('delete_brand.php');
                }
                if(isset($_GET['all_order'])){
                    include('all_order.php');
                }
                if(isset($_GET['delete_order'])){
                    include('delete_order.php');
                }
                if(isset($_GET['payment'])){
                    include('paymentAdmin.php');
                }
                if(isset($_GET['user'])){
                    include('userList.php');
                }
                if(isset($_GET['user_delete'])){
                    include('delete_user.php');
                }
                if(isset($_GET['delete_payment'])){
                    include('delete_payment.php');
                }
            ?>
        </div>

        <!-- last child -->
        <div class="bg-info text-center footer">    <p class="text-light p-2">All right reserved @- Designed by Ahmed Hossam</p>    </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>