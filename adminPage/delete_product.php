<?php
    if(isset($_GET['delete_product'])){
        $id = $_GET['delete_product'];
        $delete_query = "DELETE FROM `products` WHERE product_id=$id";
        $result = mysqli_query($con, $delete_query);
        if($result){
            echo "<script>alert('Product Deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>