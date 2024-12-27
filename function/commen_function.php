<?php
    // include("../includs/connect.php");

    function getDataQuery($x1, $x=0){
        while($row_data = mysqli_fetch_assoc($x1)){
            $p_id = $row_data['product_id'];
            $p_title = $row_data['product_title'];
            $p_desc = $row_data['product_description'];
            $p_catId = $row_data['cat_id'];
            $p_img1 = $row_data['product_img1'];
            $p_img2 = $row_data['product_img2'];
            $p_img3 = $row_data['product_img3'];
            $p_price = $row_data['product_price'];
            $p_brandId = $row_data['brand_id'];
            if($x == 0){
                echo "
                <div class='col-md-3 mb-2 p-1'>
                    <div class='card'>
                        <img class='p-2' style='width: 100% !important; height: 200px !important; object-fit: fill;' src='adminPage/product_image/$p_img1' alt='$p_title' class='card-img-cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$p_title</h5>
                            <p class='card-text'>$p_desc</p>
                            <p class='card-text'>Price:$p_price$</p>
                            <a href='index.php?add_to_cart=$p_id' class='btn btn-primary text-dark'>Add to Cart</a>
                            <a href='product_detels.php?product_id=$p_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
            }else{
                echo "
                    <div class='col-md-3 ps-5 pt-5'>                        
                        <div class='card'>
                            <img class='p-2' style='width: 100% !important; height: 200px !important; object-fit: fill;' src='adminPage/product_image/$p_img1' alt='$p_title' class='card-img-cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>$p_title</h5>
                                <p class='card-text'>$p_desc</p>
                                <a href='index.php?add_to_cart=$p_id' class='btn btn-primary text-dark'>Add to Cart</a>
                                <a href='index.php' class='btn btn-secondary'>Back Home</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-8 ms-5 m-2 p-5'>
                        <div class='row'>
                            <div class='col-md-12 mb-5'>    <h4 class='text-info text-center'>Related Products</h4>    </div>
                            <div class='col-md-6 p-4'><img style='width: 60% !important; height: 200px !important; object-fit: fill;' src='adminPage/product_image/$p_img2' alt='$p_title'></div>
                            <div class='col-md-6 p-4'><img style='width: 60% !important; height: 200px !important; object-fit: fill;' src='adminPage/product_image/$p_img3' alt='$p_title'></div>
                        </div>
                    </div> ";
            }
        }
    }

    function getProducts(){
        global $con;
        if(isset($_GET['cat'])){
            $getCatId = $_GET['cat'];
            $select_query_product = "SELECT * FROM `products` where cat_id = $getCatId";
            $result_select_product = mysqli_query($con, $select_query_product);
            $num_of_rows = mysqli_num_rows($result_select_product);
            if($num_of_rows == 0){
                echo "<h2 class='text-center text-danger'>No stock for this categorey</h2>";
            }else{
                getDataQuery($result_select_product);
            }
        }else if(isset($_GET['brand'])){
            $getBrandId = $_GET['brand'];
            $select_query_product = "SELECT * FROM `products` where brand_id = $getBrandId";
            $result_select_product = mysqli_query($con, $select_query_product);
            $num_of_rows = mysqli_num_rows($result_select_product);
            if($num_of_rows == 0){
                echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
            }else{
                getDataQuery($result_select_product);
            }
        }else{
            $select_query_product = "SELECT * FROM `products` order by rand() limit 0,12";
            $result_select_product = mysqli_query($con, $select_query_product);
            getDataQuery($result_select_product);
        }
    }
    //=================
    function getBrands(){
        global $con;
        $select_query_brand = "SELECT * FROM `brands`";
        $result_select_brand = mysqli_query($con, $select_query_brand);
        while($row_data = mysqli_fetch_assoc($result_select_brand)){
            $brand_id = $row_data['brand_id'];
            $brand_title = $row_data['brand_title'];
            echo "<li class='nav-item text-light'>    <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>    </li>";
        }
    }
    //=================
    function getCategories(){
        global $con;
        $select_query_brand = "SELECT * FROM `categories`";
        $result_select_brand = mysqli_query($con, $select_query_brand);
        while($row_data = mysqli_fetch_assoc($result_select_brand)){
            $category_id = $row_data['category_id'];
            $category_title = $row_data['category_title'];
            echo "<li class='nav-item text-light'>    <a href='index.php?cat=$category_id' class='nav-link'>$category_title</a>    </li>";
        }
    }
    //=================
    function search_product(){
        global $con;
        if(isset($_GET['SearchData'])){
            $resultSearch = $_GET['SearchData'];
            $select_query_search = "SELECT * FROM `products` where product_keyword like '%$resultSearch%'";
            $result_select_search = mysqli_query($con, $select_query_search);
            $num_of_rows = mysqli_num_rows($result_select_search);
            if($num_of_rows == 0){
                echo "<h2 class='text-center text-danger'>No stock for Searching...!</h2>";
            }else{
                getDataQuery($result_select_search);
            }
        }
    }
    //=================
    function allProduct(){
        global $con;
        $select_query_product = "SELECT * FROM `products` order by rand()";
        $result_select_product = mysqli_query($con, $select_query_product);
        getDataQuery($result_select_product);
    }
    //=================
    function detels(){
        global $con;
        if(isset($_GET['product_id'])){
            $getId = $_GET['product_id'];
            $select_query_detels = "SELECT * FROM `products` where product_id  = $getId";
            $result_select_detels = mysqli_query($con, $select_query_detels);
            getDataQuery($result_select_detels,1);
        }
    }
    //=================
    function getIPAddress() {  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  //whether ip is from the share internet  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  //whether ip is from the remote address  
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }  
    //=================
    function cart(){
        global $con;
        if(isset($_GET['add_to_cart'])){
            $ip = getIPAddress();  
            $getProductId =  $_GET['add_to_cart'];
            $select_query = "SELECT * FROM `cartdetails` WHERE ip_address='$ip' and product_id=$getProductId";
            $result_select_cart = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_select_cart);
            if($num_of_rows > 0){
                echo "<script> alert('This item is already present inside cart!!!!')</script>";
                echo "<script> window.open('index.php','_self')</script>";
            }else{
                $insert_query = "INSERT INTO `cartdetails`(`ip_address`, `quantity`, `product_id`) VALUES ('$ip','1','$getProductId')";
                $result_select_cart = mysqli_query($con, $insert_query);
                echo "<script> alert('Item is added cart....')</script>";
                echo "<script> window.open('index.php','_self')</script>";
            }
        }
    }
    //=================
    function price(){
        global $con;
        $total=0;
        $ip = getIPAddress(); 
        $select_query = "
            (SELECT * FROM `cartdetails` cat
            LEFT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
            UNION
            (SELECT cat.*, p.* FROM `cartdetails` cat
            RIGHT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
        ";
        $result_select_itemCart = mysqli_query($con, $select_query);
        while($row_data = mysqli_fetch_assoc($result_select_itemCart)){
            $p_price = $row_data['product_price'];
            $itemQuantity = $row_data['quantity'];
            $product_total = $p_price * $itemQuantity;  // حساب السعر بشكل صحيح
            $total += $product_total;
        }
        echo $total;
    }
    //=================
    function cart_items(){
        global $con;
        $ip = getIPAddress(); 
        $select_query = "SELECT * FROM `cartdetails` where ip_address='$ip'";
        $result_select_itemCart = mysqli_query($con, $select_query);
        $count_of_rows = mysqli_num_rows($result_select_itemCart);
        echo $count_of_rows;
    }
    //=================
    function cart_item(){
        global $con;
        $total = 0;
        $ip = getIPAddress(); 
        $select_query = "
            (SELECT * FROM `cartdetails` cat
            LEFT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
            UNION
            (SELECT cat.*, p.* FROM `cartdetails` cat
            RIGHT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
        ";
        $result_select_itemCart = mysqli_query($con, $select_query);
        $result = mysqli_num_rows($result_select_itemCart);
        if($result == 0){
            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
        }else{
            echo "
                <tr>
                    <th class='bg-black text-light'>Product Title</th>
                    <th class='bg-black text-light'>Product Image</th>
                    <th class='bg-black text-light'>Quantity</th>
                    <th class='bg-black text-light'>Price</th>
                    <th class='bg-black text-light'>Remove</th>
                    <th class='bg-black text-light' colspan='2'>Operations</th>
                </tr>
            ";
            while($row_data = mysqli_fetch_assoc($result_select_itemCart)){
                $itemProductId = $row_data['product_id'];
                $itemQuantity = $row_data['quantity'];
                $p_title = $row_data['product_title'];
                $p_img1 = $row_data['product_img1'];
                $p_price = $row_data['product_price'];
                $cd_item = $row_data['detalis_id'];
                $product_total = $p_price * $itemQuantity;  // حساب السعر بشكل صحيح
                $total += $product_total;
                echo "
                    <tr>
                        <td class='py-4'>$p_title</td>
                        <td class='py-3'>
                            <img class='rounded-circle p-1' src='adminPage/product_image/$p_img1' style='width: 50px; height: 50px;' alt='$p_title'>
                        </td>
                        <td class='py-4'>
                            <input type='text' name='qty[$itemProductId]' value='$itemQuantity' class='text-center'>
                        </td>
                        <input type='hidden' name='update_qty_id[$itemProductId]' value='$cd_item'>
                        <td class='py-4'>$p_price</td>
                        <td class='py-4'>    <input type='checkbox' name=removeItem[] value='$itemProductId'>    </td>
                        <td class='py-3'>
                            <input type='submit' value='Update' name='Update' class='btn btn-info text-light px-4'>
                            <input type='submit' value='Remove' name='Remove' class='btn btn-info text-light px-4'>
                        </td>
                    </tr>
                ";
            }
        }
    }
    //=================
    function check_update(){
        global $con;
        if (isset($_POST['Update'])) {
            if (isset($_POST['qty']) && isset($_POST['update_qty_id'])) {
                foreach ($_POST['qty'] as $product_id => $new_qty) {
                    $update_qty_id = $_POST['update_qty_id'][$product_id];
                    if (is_numeric($new_qty) && $new_qty > 0) {
                        $update_query = "UPDATE `cartdetails` SET `quantity` = '$new_qty' WHERE `detalis_id` = '$update_qty_id'";
                        mysqli_query($con, $update_query);
                        // echo "<pre>";
                        // print_r($_POST['qty']);
                        // print_r($_POST['update_qty_id']);
                        // echo "</pre>";
                    }
                }
            }
        }
        if(isset($_POST['Remove']) && isset($_POST['removeItem'])){
            foreach($_POST['removeItem'] as $remve_id){
                $delete_query = "DELETE FROM `cartdetails` WHERE product_id = $remve_id";
                mysqli_query($con, $delete_query);
            }
        }
    }
    //=================
    function dis_btn_action(){
        global $con;
        global $total;
        $ip = getIPAddress(); 
        $select_query = "
            (SELECT * FROM `cartdetails` cat
            LEFT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
            UNION
            (SELECT cat.*, p.* FROM `cartdetails` cat
            RIGHT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
        ";
        $result_select_itemCart = mysqli_query($con, $select_query);
        $count_of_rows = mysqli_num_rows($result_select_itemCart);
        if($count_of_rows == 0){
            echo "<a href='index.php' class='back_btn_produ  btn btn-info text-light px-4 mx-2'>Continue shopping</a>";
        }else{
            while($row_data = mysqli_fetch_assoc($result_select_itemCart)){
                $p_price = $row_data['product_price'];
                $itemQuantity = $row_data['quantity'];
                $product_total = $p_price * $itemQuantity;  // حساب السعر بشكل صحيح
                $total += $product_total;
            }
            echo "
                <h4 class='px-3'>Subtotal: <strong class='text-info'> $total </strong></h4>
                <a href='index.php' class='back_btn_produ  btn btn-info text-light px-4 mx-2'>Continue shopping</a>
                <a href='users_area/check_out.php' class='back_btn_produ  btn btn-secondary text-light px-4'>Check Out</a>
            ";
        }
    }
    //=================
    function getUserOrderDetails(){
        global $con;
        $email = $_SESSION['email'];
        $select_user = "SELECT * FROM `user_table` where user_email = '$email'";
        $result_user = mysqli_query($con, $select_user);
        $row_count_id = mysqli_fetch_assoc($result_user);
        $userId = $row_count_id['user_id'];

        $select_userOrder = "SELECT * FROM `user_orders` where user_id = '$userId'";
        $result_userOrder=mysqli_query($con, $select_userOrder);
        $row_count = mysqli_num_rows($result_userOrder);
        
        $_SESSION['user_id'] = $userId;

        // echo $row_count;

        if($row_count > 0){
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_order'])){
                    if(!isset($_GET['delete_account'])){
                        echo "
                            <h3 class='text-center my-5'>You have <span class='text-info'>$row_count</span> panding orders</h3>
                            <p class='text-center'><a class='btn btn-info text-light' href='profile.php?my_order'>Orders Details</a></p>
                        ";
                    }
                }
            }
        }else{
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_order'])){
                    if(!isset($_GET['delete_account'])){
                        echo "
                            <h3 class='text-center my-5'>You have <span class='text-info'>0</span> panding orders</h3>
                            <p class='text-center'><a class='btn btn-info text-light' href='../index.php'>Explore Orders</a></p>
                        ";
                    }
                }
            }
        }
    }
?>