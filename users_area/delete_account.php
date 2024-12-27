<?php
    if(isset($_POST['delete'])){
        $email = $_SESSION['email'];
        $delete_query = "DELETE FROM `user_table` WHERE user_email = '$email'";
        $result = mysqli_query($con, $delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account Deleted successfully')</script>";
            echo "<script>window.open('../index.php', '_self')</script>";
        }
    }
    if(isset($_POST['cancel'])){
        echo "<script>window.open('profile.php', '_self')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="" href="../images/ecommerce.svg" style="width: 100%;">
    <title>Delete Account</title>
</head>
<body>
    <h3 class='text-center text-danger mt-4'>Delete Account</h3>
    <form action="" method="post" class="mt-5 w-50 m-auto">
        <div class="form-outline">    <input type="submit" value="Delete Account" name="delete" class="form-control">    </div>
        <div class="form-outline mt-3">    <input type="submit" value="Don`t Delete Account" name="cancel" class="form-control">    </div>
    </form>
</body>
</html>