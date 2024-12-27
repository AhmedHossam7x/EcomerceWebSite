<?php    
    include('includs/connect.php');
    include('function/commen_function.php');  
    check_update();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="" href="images/ecommerce.svg" style="width: 100%;">
        <!--Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Ecommerce Cart deteils</title>
        <!-- css -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- Navbar -->
        <div class="container-fluid p-0">
            <!-- first-child -->
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <img src="images/logo1.png" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">    <a class="nav-link active" aria-current="page" href="index.php">Home</a>    </li>
                            <li class="nav-item">    <a class="nav-link" href="displayAll.php">Product</a>    </li>
                            <li class="nav-item">    <a class="nav-link" href="#">Contact</a>    </li>
                            <?php
                                session_start();
                                if(isset($_SESSION['email'])){
                                    echo "<li class='nav-item'>    <a class='nav-link' href='users_area/profile.php'>My Account</a>    </li>";
                                }else{
                                    echo "<li class='nav-item'>    <a class='nav-link' href='users_area/user_register.php'>Register</a>    </li>";
                                }
                            ?>
                            <li class="nav-item">    <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup> <?php cart_items(); ?></sup></a>    </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php  //cart(); ?>
            <!-- Second-child -->
            <nav class="navbar navbar-expand-lg bg-secondary text-center">
                <ul class="navbar-nav me-auto">
                    <?php
                        if(isset($_SESSION['username'])){
                            echo "
                                <li class='nav-item'>    <a href='#' class='nav-link text-light'>Welcome: ". $_SESSION['username'] ."</a>    </li>
                                <li class='nav-item'>    <a href='users_area/logout.php' class='nav-link text-light'>Logout</a>    </li>
                            ";
                        }else{
                            echo "
                                <li class='nav-item'>    <a href='#' class='nav-link text-light'>Welcome Guest</a>    </li>
                                <li class='nav-item'>    <a href='users_area/user_login.php' class='nav-link text-light'>Login</a>    </li>
                            ";
                        }
                    ?>
                </ul>
            </nav>
            <!-- Third-child -->
            <div class="bg-light">
                <h3 class="text-center">Hidden Store</h3>
                <p class="text-center">Communications is at the heart of e-commerce and community</p>
            </div>
            <!-- fourth-child -->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                        <table class="table table-bordered text-center">    <?php    cart_item();    ?>    </table>
                        <div class="d-flex p-3">    <?php dis_btn_action(); ?>    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Last-child -->
        <div class="bg-info d-flex align-items-cneter justify-content-center footer"> <p class="text-light text-center mt-4">All right reserved @- Designed by Ahmed Hossam</p> </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>