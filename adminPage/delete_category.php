<?php
    if(isset($_GET['delete_category'])){
        $id = $_GET['delete_category'];
        $delete_query = "DELETE FROM `categories` WHERE category_id=$id";
        $result = mysqli_query($con, $delete_query);
        if($result){
            echo "<script>alert('Product Deleted successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>