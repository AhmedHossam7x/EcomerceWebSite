<?php
    include('../includs/connect.php');
    include('../function/commen_function.php'); 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="" href="../images/ecommerce.svg" style="width: 100%;">
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Profile</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
        <!-- Navbar -->
        <div class="container-fluid p-0">
        <!-- first-child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo1.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>    </li>
                        <li class="nav-item">    <a class="nav-link" href="../displayAll.php">Product</a>    </li>
                        <li class="nav-item">    <a class="nav-link" href="#">Contact</a>    </li>
                        <!-- <li class="nav-item">    <a class="nav-link" href="user_register.php">Register</a>    </li> -->
                        <li class="nav-item">    <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items(); ?></sup></a>    </li>
                        <li class="nav-item">    <a class="nav-link" href="#">Total Price: <?php price(); ?></a>    </li>
                    </ul>
                    <!-- <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="SearchData">
                        <input class="btn btn-outline-light" type="submit" value="Search">
                    </form> -->
                </div>
            </div>
        </nav>
        <?php  //cart(); ?>
        <!-- Second-child -->
        <!-- <nav class="navbar navbar-expand-lg bg-secondary text-center">
            <ul class="navbar-nav me-auto">
                <?php 
                    if(isset($_SESSION['username'])){
                        echo "
                            <li class='nav-item'>    <a href='#' class='nav-link text-light'>Welcome: ". $_SESSION['username'] ."</a>    </li>
                            <li class='nav-item'>    <a href='logout.php' class='nav-link text-light'>Logout</a>    </li>
                        ";
                    }else{
                        echo "
                            <li class='nav-item'>    <a href='#' class='nav-link text-light'>Welcome Guest</a>    </li>
                            <li class='nav-item'>    <a href='user_login.php' class='nav-link text-light'>Login</a>    </li>
                        ";
                    }
                ?>
            </ul>
        </nav> -->
        <!-- Third-child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>
        </div>
        <!-- fourth-child -->
        <div class="row m-0 pb-1">
            <div class="col-md-2 p-0">
                <ul class="navbar-nav me-auto text-center  bg-secondary" style="height:79vh;">
                    <?php
                        if(isset($_SESSION['email'])){
                            $email = $_SESSION['email'];
                            $select_query_login = "SELECT * FROM `user_table` WHERE user_email='$email'";
                            $query_login = mysqli_query($con, $select_query_login);
                            $row = mysqli_fetch_assoc($query_login);                            
                            echo "
                                <li class='nav-item bg-info p-2'>    
                                    <a href='#' class='nav-link active text-light fs-3'><h4>Your Profile: ". strtoupper($row['user_name']) ."</h4></a>    
                                </li>
                                <li class='nav-item bg-secondary'> 
                                    <img class='p-3 rounded-circle' src='user_img_tmp/". $row['user_image'] ."' style='width: 150px !important; height: 150px !important; object-fit: fill;'/> 
                                </li>
                            ";
                        }else{
                            echo "
                                <li class='nav-item bg-info p-2'> <a href='#' class='nav-link active text-light fs-3'><h4>Your Profile: ...</h4></a> </li>
                                <li class='nav-item bg-secondary'> 
                                <img class='p-3 rounded-circle' src='../images/anonymous.webp' style='width: 150px; height: 150px ; object-fit: fill;'/> 
                                </li>
                            ";
                        }
                    ?>
                    <li class="nav-item bg-secondary">    <a href="profile.php" class="nav-link active text-light fs-6">Panding Orders</a>    </li>
                    <li class="nav-item bg-secondary">    <a href="profile.php?edit_account" class="nav-link active text-light fs-6">Edit Account</a>    </li>
                    <li class="nav-item bg-secondary">    <a href="profile.php?my_order" class="nav-link active text-light fs-6">My Orders</a>    </li>
                    <li class="nav-item bg-secondary">    <a href="profile.php?delete_account" class="nav-link active text-light fs-6">Delete Account</a>    </li>
                    <li class="nav-item bg-secondary">    <a href="logout.php" class="nav-link active text-light fs-6">Logout</a>    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php 
                    getUserOrderDetails();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }else if(isset($_GET['my_order'])){
                        include('user_orders.php');
                    }elseif (isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="bg-info d-flex align-items-cneter justify-content-center footer"> <p class="text-light text-center mt-4">All right reserved @- Designed by Ahmed Hossam</p> </div>
</body>
</html>