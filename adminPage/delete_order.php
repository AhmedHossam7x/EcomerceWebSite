<?php
    if(isset($_GET['delete_order'])){
        $id = $_GET['delete_order'];
        $delete_query = "DELETE FROM `user_orders` WHERE order_id =$id";
        $result = mysqli_query($con, $delete_query);
        if($result){
            echo "<script>alert('Order Deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>