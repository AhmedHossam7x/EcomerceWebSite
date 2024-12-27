<?php
    if(isset($_GET['delete_brand'])){
        $id = $_GET['delete_brand'];
        $delete_query = "DELETE FROM `brands` WHERE brand_id=$id";
        $result = mysqli_query($con, $delete_query);
        if($result){
            echo "<script>alert('Product Deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>