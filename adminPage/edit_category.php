<?php
    if(isset($_GET['edit_category'])){
        $productID = $_GET['edit_category'];
        $select_product = "SELECT * FROM `categories` WHERE category_id=$productID";
        $result = mysqli_query($con, $select_product);
        $catchData = mysqli_fetch_assoc($result);
        $title = $catchData['category_title'];
    }
    if(isset($_POST['update_category'])){
        $setTitle =$_POST['category_title'];

        $update_product = "UPDATE `categories` 
        SET `category_title`='$setTitle' where category_id='$productID'";
        $result_update = mysqli_query($con, $update_product);
        if($result_update){
            echo "<script>alert('Product Updated successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>
<div class="container">
    <h2 class="text-center">Edit Category</h2>
    <form action="" method="post" enctype="multipart/form-data" class="mt-1">
        <div class="form-outline mb-3 w-50 m-auto">
            <label class="form-label">Category Title</label>
            <input type="text" name="category_title" value="<?php echo $title ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto"> 
            <input  type=submit class="btn btn-info p-2 px-3 border-0 text-light" name="update_category" value="Update Category"> 
        </div>
    </form>
</div>