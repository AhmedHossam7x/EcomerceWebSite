<?php
    if(isset($_GET['delete_payment'])){
        $id = $_GET['delete_payment'];
        $delete_query = "DELETE FROM `user_payment` WHERE payment_id =$id";
        $result = mysqli_query($con, $delete_query);
        if($result){
            echo "<script>alert('Payment Deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>