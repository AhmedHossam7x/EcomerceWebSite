<?php
    if(isset($_GET['user_delete'])){
        $id = $_GET['user_delete'];
        $delete_query = "DELETE FROM `user_table` WHERE user_id=$id";
        $result = mysqli_query($con, $delete_query);
        if($result){
            echo "<script>alert('User Deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>