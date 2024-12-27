<?php
    include('../includs/connect.php');
    if(isset($_POST["insert_cat"])){
        $category_titlle = $_POST['cat_title'];
        $select_query = "SELECT * FROM `categories` WHERE category_title = '$category_titlle'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('This category is in database')</script>";
        }else{
            $insert_query = "INSERT INTO `categories`(`category_title`) VALUES ('$category_titlle')";
            $result = mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('Category has been inserted successfully')</script>";
            }
        }
    }
?>
<h2 class="text-center">Insert Categories</h2>
<form method="post">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa soild fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert categories" name="cat_title" aria-label="categories" required>
    </div>
    <div class="input-group w-10 m-auto mb-2"> 
        <input  type=submit class="bg-info p-2 border-1 text-light my-2" name="insert_cat" value="Insert Category"> 
    </div>
</form