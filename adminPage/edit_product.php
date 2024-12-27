<?php
    if(isset($_GET['edit_product'])){
        $productID = $_GET['edit_product'];
        $select_product = "SELECT * FROM `products` WHERE product_id=$productID";
        $result = mysqli_query($con, $select_product);
        $catchData = mysqli_fetch_assoc($result);

        $title = $catchData['product_title'];
        $des = $catchData['product_description'];
        $keyword = $catchData['product_keyword'];
        $category = $catchData['cat_id'];
        $brand = $catchData['brand_id'];
        $img1 = $catchData['product_img1'];
        $img2 = $catchData['product_img2'];
        $img3 = $catchData['product_img3'];
        $price = $catchData['product_price'];
        // fetching category
        $select_category = "SELECT * FROM `categories` WHERE category_id=$category";
        $result_cat = mysqli_query($con, $select_category);
        $fetsh = mysqli_fetch_assoc($result_cat);
        $catTital = $fetsh['category_title'];
        // fetcching brand
        $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand";
        $result_brand = mysqli_query($con, $select_brand);
        $fetsh_brand = mysqli_fetch_assoc($result_brand);
        $brandTital = $fetsh_brand['brand_title'];
    }
    if(isset($_POST['update_product'])){
        $setTitle =$_POST['product_title'];
        $setDes =$_POST['product_desc'];
        $setKeyword =$_POST['product_keyword'];
        $setCategory =$_POST['product_category'];
        $setBrand =$_POST['product_brand'];
        $setPrice =$_POST['product_price'];

        $setImg =$_FILES['Img1']['name'];
        $setImg2 =$_FILES['Img2']['name'];
        $setImg3 =$_FILES['Img3']['name'];

        $tmpImg1 = $_FILES['Img1']['tmp_name'];
        $tmpImg2 = $_FILES['Img2']['tmp_name'];
        $tmpImg3 = $_FILES['Img3']['tmp_name'];

        if($setImg == null){
            $setImg = $img1;
            $tmpImg1 = $img1;
        }
        if($setImg2 == null){
            $setImg2 = $img2;
            $tmpImg2 = $img2;
        }
        if($setImg3 == null){
            $setImg3 = $img3;
            $tmpImg3 = $img3;
        }

        move_uploaded_file($tmpImg1, "./product_image/$setImg");
        move_uploaded_file($tmpImg2, "./product_image/$setImg2");
        move_uploaded_file($tmpImg3, "./product_image/$setImg3");

        $update_product = "UPDATE `products` 
        SET `product_title`='$setTitle',`product_description`='$setDes',`product_keyword`='$setKeyword',`cat_id`='$setCategory',`brand_id`='$setBrand',
        `product_img1`='$setImg',`product_img2`='$setImg2',`product_img3`='$setImg3',`product_price`='$setPrice', `date`=date('Y-m-d H:i:s')
        where product_id='$productID'";
        $result_update = mysqli_query($con, $update_product);
        if($result_update){
            echo "<script>alert('Product Updated successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>

<div class="container">
    <h2 class="text-center">Edit Products</h2>
    <form action="" method="post" enctype="multipart/form-data" class="mt-1">
        <div class="form-outline mb-3 w-50 m-auto">
            <label class="form-label">Product Title</label>
            <input type="text" name="product_title" value="<?php echo $title ?>" class="form-control" required>
        </div>
        <div class="form-outline mb-3 w-50 m-auto">
            <label class="form-label">Product Description</label>
            <input type="text" name="product_desc" value="<?php echo $des ?>" class="form-control" required>
        </div>
        <div class="form-outline mb-3 w-50 m-auto">
            <label class="form-label">Product Keyword</label>
            <input type="text" name="product_keyword" value="<?php echo $keyword ?>" class="form-control" required>
        </div>

        <div class="form-outline mb-3 w-50 m-auto">
            <select class="form-select" name= "product_category">
                <option value="<?php echo $category ?>"><?php echo $catTital ?></option>
                <?php
                    $select_query_brand = "SELECT * FROM `categories`";
                    $result_select_brand = mysqli_query($con, $select_query_brand);
                    while($row_data = mysqli_fetch_assoc($result_select_brand)){
                        $category_id = $row_data['category_id'];
                        $category_title = $row_data['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-3 w-50 m-auto">
            <select class="form-select" name="product_brand">
                <option value="<?php echo $brand ?>"><?php echo $brandTital; ?></option>
                <?php
                    $select_query_brand = "SELECT * FROM `brands`";
                    $result_select_brand = mysqli_query($con, $select_query_brand);
                    while($row_data = mysqli_fetch_assoc($result_select_brand)){
                        $brand_id = $row_data['brand_id'];
                        $brand_title = $row_data['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-outline mb-3 w-50 m-auto d-flex">
            <input class="form-control m-auto" type="file" name="Img1" value="<?php echo $img1; ?>">
            <img class="imgEdit" src="product_image/<?php echo $img1; ?>" alt="">
        </div>
        <div class="form-outline mb-3 w-50 m-auto d-flex">
            <input class="form-control m-auto" type="file" name="Img2" value="<?php echo $img2; ?>">
            <img class="imgEdit" src="product_image/<?php echo $img2; ?>" alt="">
        </div>
        <div class="form-outline mb-3 w-50 m-auto d-flex">
            <input class="form-control m-auto" type="file" name="Img3" value="<?php echo $img3; ?>">
            <img class="imgEdit" src="product_image/<?php echo $img3; ?>" alt="">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product Price</label>
            <input type="text" name="product_price" value="<?php echo $price ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto"> 
            <input  type=submit class="btn btn-info p-2 px-3 border-0 text-light" name="update_product" value="Update Product"> 
        </div>
    </form>
</div>