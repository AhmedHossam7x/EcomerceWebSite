<?php
    include('../includs/connect.php');
    if(isset($_POST["insert_brand"])){
        $brand_titlle = $_POST['brand_title'];
        $select_query = "SELECT * FROM `brands` WHERE brand_title = '$brand_titlle'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('This category is in database')</script>";
        }else{
            $insert_query = "INSERT INTO `brands`(`brand_title`) VALUES ('$brand_titlle')";
            $result = mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('Category has been inserted successfully')</script>";
            }
        }
    }
?>
<h2 class="text-center">Insert Brands</h2>
<form class="mb-2" method="post" action="">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info"><i class="fa soild fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert brand" name="brand_title" aria-label="brands">
    </div>
    <div class="input-group w-10 m-auto mb-2">    
        <input type="submit" name="insert_brand" value="Insert Brand" class="bg-info p-2 border-0 text-light my-2">    
    </div>
</form