<?php
    include('../includs/connect.php');
    session_start();
    if(isset($_POST['insert_sign_up'])){
        $name= $_POST['userName'];
        $email= $_POST['email'];
        $pass= $_POST['password'];
        $cpass= $_POST['Cpassword'];

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if($pass === $cpass){
                $password = md5($pass);
                $checkExist="SELECT * FROM `admin_table` WHERE admin_email='$email'";
                $resultCheck = mysqli_query($con, $checkExist);
                $ceckCount = mysqli_num_rows($resultCheck);
                if($ceckCount > 0){
                    echo "<script>alert('Email is exist')</script>";
                }else{
                    $_SESSION['adminName'] = $name;
                    $_SESSION['adminEmail'] = $email;
                    $insertAdmin = "INSERT INTO `admin_table`(`admin_name`, `admin_email`, `admin_password`) VALUES ('$name','$email','$password')";
                    $resultInsert = mysqli_query($con, $insertAdmin);
                    if($resultInsert){
                        echo "<script>alert('Data inserted successfully')</script>";
                        echo "<script>window.open('index.php', '_self')</script>";
                    }
                }
            }
        }
    }
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
    <title>Admin Register</title>
</head>
<body>
    <div class="container-fluid m-0">
        <h2 class="text-center mb-3">Admin Register</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5 mt-3">    <img src="../images/adminPage.avif" alt="">    </div>
            <div class="col-lg-6 col-xl-4 mt-3">    
                <form action="" method="post" enctype="multipart/form-data" class="mt-5">
                    <div class="form-outline mb-3 w-50 m-auto">
                        <label for="" class="form-label">User Name</label>
                        <input type="text" name="userName" class="form-control" placeholder="Enter User Name" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-3 w-50 m-auto">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="Cpassword" class="form-control" placeholder="Enter password" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <a href="#">Forgot Password</a>
                    </div>
                    <div class="form-outline w-50 m-auto"> 
                        <input  type=submit class="btn btn-info p-2 px-5 border-0 text-light" name="insert_sign_up" value="Sign Up"> 
                        <p class="fw-bold p-2">Already have an account? <a href="admin_login.php" class="text-danger text-decoration-none">Login</a></p> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>