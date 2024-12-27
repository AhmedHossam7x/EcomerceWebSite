<?php
    if(isset($_GET['edit_brand'])){
        $productID = $_GET['edit_brand'];
        $select_product = "SELECT * FROM `brands` WHERE brand_id=$productID";
        $result = mysqli_query($con, $select_product);
        $catchData = mysqli_fetch_assoc($result);
        $title = $catchData['brand_title'];
    }
    if(isset($_POST['update_brand'])){
        $setTitle =$_POST['brand_title'];
        $update_product = "UPDATE `brands` SET `brand_title`='$setTitle' where brand_id='$productID'";
        $result_update = mysqli_query($con, $update_product);
        if($result_update){
            echo "<script>alert('Product Updated successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>
<div class="container">
    <h2 class="text-center">Edit Brand</h2>
    <form action="" method="post" enctype="multipart/form-data" class="mt-1">
        <div class="form-outline mb-3 w-50 m-auto">
            <label class="form-label">Brand Title</label>
            <input type="text" name="brand_title" value="<?php echo $title ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto"> 
            <input  type=submit class="btn btn-info p-2 px-3 border-0 text-light" name="update_brand" value="Update Brand"> 
        </div>
    </form>
</div>