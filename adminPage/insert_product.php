<?php 
    include('../includs/connect.php'); 

    if(isset($_POST['insert_product'])){

        $pTitle = $_POST['product_title'];
        $pDesc = $_POST['product_desc'];
        $pKeyword = $_POST['product_keyword'];
        $pCat = $_POST['product_category'];
        $pBrand = $_POST['product_brand'];
        $pPrice = $_POST['product_price'];
        $pState = 'True';
        // accessing images
        $pImg1 = $_FILES['pImg1']['name'];
        $pImg2 = $_FILES['pImg2']['name'];
        $pImg3 = $_FILES['pImg3']['name'];
        // accessing image tmp name
        $tmpImg1 = $_FILES['pImg1']['tmp_name'];
        $tmpImg2 = $_FILES['pImg2']['tmp_name'];
        $tmpImg3 = $_FILES['pImg3']['tmp_name'];
        //? check
        if($pCat == '' or $pBrand == '' or $pImg1 == '' or $pImg2 == '' or $pImg3 == ''){
            echo "<script>alert('Pls, fill all fields....!')</script>";
        }else{
            move_uploaded_file($tmpImg1, "./product_image/$pImg1");
            move_uploaded_file($tmpImg2, "./product_image/$pImg2");
            move_uploaded_file($tmpImg3, "./product_image/$pImg3");

            $insert_prudoct = "INSERT INTO `products`(product_title, product_description, product_keyword, cat_id, brand_id, product_img1, product_img2, product_img3, product_price, date, status) 
            VALUES ('$pTitle','$pDesc','$pKeyword','$pCat','$pBrand','$pImg1','$pImg2','$pImg3','$pPrice',date('Y-m-d H:i:s'),'$pState')";
            $result = mysqli_query($con, $insert_prudoct);
            if($result){
                echo "<script>alert('Done Inserted')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="" href="../images/insert.png" style="width: 100%;">
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Insert Product</title>
</head>
<body class="bg-light">
    <a href="index.php" class="back_btn_product m-4  position-absolute btn btn-info text-light px-4">Back</a>
    <div class="container p-4">   
        <h2 class="text-center">Insert Products</h2>
        <form action="" method="post" enctype="multipart/form-data" class="mt-5">
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">Product Description</label>
                <input type="text" name="product_desc" id="product_desc" class="form-control" placeholder="Enter Product description" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product keyword" autocomplete="off" required>
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <select class="form-select" name= "product_category">
                    <option selected>Select Category</option>
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
                    <option selected>Select Brand</option>
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
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="formFile" class="form-label">Product Image 1</label>
                <input class="form-control" type="file" id="formFile" name="pImg1">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="formFile" class="form-label">Product Image 2</label>
                <input class="form-control" type="file" id="formFile" name="pImg2">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="formFile" class="form-label">Product Image 3</label>
                <input class="form-control" type="file" id="formFile" name="pImg3">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product keyword" autocomplete="off" required>
            </div>
            <div class="form-outline w-50 m-auto"> 
                <input  type=submit class="btn btn-info p-2 px-3 border-0 text-light" name="insert_product" value="Insert Product"> 
            </div>
        </form>
    </div>
</body>
</html>