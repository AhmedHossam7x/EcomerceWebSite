<?php
    if(isset($_GET['edit_account'])){
        $userId = $_SESSION['user_id'];
        $select_user_query = "SELECT * FROM `user_table` WHERE user_id='$userId'";
        $result_query = mysqli_query($con, $select_user_query);
        $result = mysqli_fetch_array($result_query);
        $getName = $result['user_name'];
        $getEmail = $result['user_email'];
        $getImg = $result['user_image'];
        $getAddress = $result['user_address'];
        $getPhone = $result['user_mobile'];
    }
    
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $img= $_FILES['uImg']['name'];
        $img_tmp = $_FILES['uImg']['tmp_name'];
        if($img == null){
            $img = $getImg;
            $img_tmp = $getImg;
        }
        
        move_uploaded_file($img_tmp,"user_img_tmp/$img");

        $update_query = "UPDATE `user_table` 
                        SET `user_name`='$name',`user_email`='$email',`user_image`='$img',`user_address`='$address',`user_mobile`='$phone' 
                        WHERE user_id='$userId'";
        $result_query_update = mysqli_query($con, $update_query);
        if($result_query_update){
            echo "<script>alert('Data Updated successfully')</script>";
            echo "<script>window.open('logout.php', '_self')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="" href="../images/ecommerce.svg" style="width: 100%;">
        <link rel="stylesheet" href="../css/style.css"/>
        <title>Edit Account</title>
    </head>
    <body>
        <h3 class="text-center text-info mb-4">Edit Account</h3>
        <form action="" method="post" enctype="multipart/form-data" class="mt-5">
            <div class="form-outline mb-3 w-50 m-auto">
                <input type="text" name="name" class="form-control" value="<?php echo $getName; ?>" placeholder="Enter your Name" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <input type="email" name="email" class="form-control" value="<?php echo $getEmail; ?>" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto d-flex">
                <input class="form-control m-auto" type="file" name="uImg" value="<?php echo $getImg; ?>">
                <img class="imgEdit" src="user_img_tmp/<?php echo $getImg; ?>" alt="">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="text" name="address" value="<?php echo $getAddress; ?>" class="form-control" placeholder="Enter Address" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="text" name="phone" value="<?php echo $getPhone; ?>" class="form-control" placeholder="Enter Mobile Phone" autocomplete="off" required>
            </div>
            <div class="form-outline w-50 m-auto text-center"> 
                <input  type=submit class="btn btn-info p-2 px-5 border-0 text-light" name="update" value="Update"> 
            </div>
        </form>
    </body>
</html>