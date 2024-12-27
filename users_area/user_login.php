<?php
    include('../includs/connect.php');
    include('../function/commen_function.php'); 
    if(isset($_POST['login'])){
        session_start();
        $email = $_POST['email'];
        $password = $_POST['l_password'];
        $haskPass = md5($password);
        $select_query_login = "SELECT * FROM `user_table` WHERE user_email='$email' and user_password='$haskPass'";
        $query_login = mysqli_query($con, $select_query_login);
        $row = mysqli_fetch_assoc($query_login);

        //
        $ip = getIPAddress(); 
        $select_cart_item = "SELECT * FROM `cartdetails` WHERE ip_address='$ip'";
        $select_cart_query = mysqli_query($con, $select_cart_item);
        $row_count_item = mysqli_num_rows($select_cart_query);
        //
        
        if($row > 0){
            $_SESSION['username']= $row['user_name'];
            $_SESSION['email'] = $email;
            $_SESSION['img'] = $row['user_image'];

            $name = $_SESSION['username'];

            if($row > 0 && $row_count_item ==0){
                echo "<script>alert('Login successfull ($name)')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            }else{
                echo "<script>alert('Welcome: $name')</script>";
                echo "<script>window.open('check_out.php', '_self')</script>";
            }

        }else{
            echo "<script>alert('Your Email not exist')</script>";
        }
    }
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
    <title>UserLogin</title>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid p-5">
        <h2 class="text-center">User Login</h2>
        <form action="" method="post" enctype="multipart/form-data" class="mt-5">
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">User Name</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Password</label>
                <input type="password" name="l_password" class="form-control" placeholder="Enter password" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <a href="#">Forgot Password</a>
            </div>
            <div class="form-outline w-50 m-auto"> 
                <input  type=submit class="btn btn-info p-2 px-5 border-0 text-light" name="login" value="Login"> 
                <p class="fw-bold p-2 px-3 text-center">Don`t have an account? <a href="user_register.php" class="text-danger text-decoration-none">SignUp</a></p> 
            </div>
        </form>
    </div>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>