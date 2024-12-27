<?php
    include('../includs/connect.php');
    include('../function/commen_function.php'); 
    session_start();
    if(isset($_POST['insert_sign_up'])){
        $name = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cPassword = $_POST['Cpassword'];
        $address = $_POST['address'];
        $phone = $_POST['mobile'];
        //
        $ip = getIPAddress(); 
        //
        $Img = $_FILES['uImg']['name'];
        $usertmpImg = $_FILES['uImg']['tmp_name'];
        //
        // $hash = password_hash($password, PASSWORD_DEFAULT);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(preg_match("/^\d{11}$/", $phone)) {
                if($password === $cPassword){
                    
                    $check_email_exist = "SELECT * FROM `user_table` WHERE user_email='$email' and user_name='$name'";
                    $check_query = mysqli_query($con, $check_email_exist);
                    $result_check_exist = mysqli_num_rows($check_query);
                    if($result_check_exist){
                        echo "<script>alert('Email and username is exist')</script>";
                    }else{
                        $passwordEncrapty = md5($password);
                        move_uploaded_file($usertmpImg,"user_img_tmp/$Img");
    
                        $insertUserQuery = "INSERT INTO `user_table`(`user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) 
                        VALUES ('$name','$email','$passwordEncrapty','$Img','$ip','$address','$phone')";
                        $sql_execute = mysqli_query($con, $insertUserQuery);
                        if($sql_execute){
                            echo "<script>alert('Data inserted successfully')</script>";
                        }

                        $select_cart_item = "SELECT * FROM `cartdetails` WHERE ip_address='$ip'";
                        $result_check_item = mysqli_query($con, $select_cart_item);
                        $result_check_cartDetals = mysqli_num_rows($result_check_item);
                        if($result_check_cartDetals > 0){
                            $_SESSION['username'] = $name;
                            $_SESSION['email'] = $email;
                            $_SESSION['img'] = $Img;
                            echo "<script>alert('You have items in cart')</script>";
                            echo "<script>window.open('check_out.php', '_self')</script>";
                        }else{
                            echo "<script>window.open('../index.php', '_self')</script>";
                        }

                    }
                }else{
                    echo "<script>alert('Password not match')</script>";
                }
            }else{
                echo "<script>alert('Phone number not vaild')</script>";
            }
        }else{
            echo "<script>alert('Not vaild email')</script>";
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
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>UserRegister</title>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid p-5">
        <h2 class="text-center">New UserRegister</h2>
        <form action="" method="post" enctype="multipart/form-data" class="mt-5">
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">User Name</label>
                <input type="text" name="userName" class="form-control" placeholder="Enter User Name" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="formFile" class="form-label">User Image</label>
                <input class="form-control" type="file" name="uImg">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="Cpassword" class="form-control" placeholder="Enter password" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">Mobile</label>
                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Phone" autocomplete="off" required>
            </div>
            <div class="form-outline w-50 m-auto"> 
                <input  type=submit class="btn btn-info p-2 px-5 border-0 text-light" name="insert_sign_up" value="Sign Up"> 
                <p class="fw-bold p-2 px-3 text-center">Already have an account? <a href="user_login.php" class="text-danger text-decoration-none">Login</a></p> 
            </div>
        </form>
    </div>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>