<?php
    include('../includs/connect.php');
    include('../function/commen_function.php'); 
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];

        $ip = getIPAddress();
        $total_price=0;
        $invoice_number=mt_rand();
        $status='pending';

        $cart_query_price = "
            (SELECT * FROM `cartdetails` cat
            LEFT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
            UNION
            (SELECT cat.*, p.* FROM `cartdetails` cat
            RIGHT JOIN `products` p ON p.product_id = cat.product_id
            WHERE cat.ip_address = '$ip')
        ";
        
        
        $result_cart_query = mysqli_query($con, $cart_query_price);
        $count_product = mysqli_num_rows($result_cart_query);
        
        while($row_price=mysqli_fetch_array($result_cart_query)){
            $itemProductId = $row_price['product_id'];
            $p_price = $row_price['product_price'];
            $itemQuantity = $row_price['quantity'];
            $product_total = $p_price * $itemQuantity; 
            $total_price += $product_total;
        }
        // echo $total_price;

        $insert_query_user_orders = "INSERT INTO `user_orders`(`user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) 
                VALUES ('$user_id','$total_price','$invoice_number','$count_product', date('Y-m-d H:i:s'),'$status')";
        $result_insert = mysqli_query($con, $insert_query_user_orders);

        $insert_panding = "INSERT INTO `orders_panding`(`user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) 
        VALUES ('$user_id','$invoice_number','$itemProductId','$itemQuantity','$status')";
        $result_panding = mysqli_query($con, $insert_panding);

        $deleta_catD="DELETE FROM `cartdetails` WHERE ip_address='$ip'";
        $result_deleta=mysqli_query($con, $deleta_catD);

        if($result_insert){
            echo "<script>alert('Orders are submitted successfull')</script>";
            echo "<script>window.open('profile.php', '_self')</script>";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="" href="../images/ecommerce.svg" style="width: 100%;">
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Order</title>
</head>
<body>
    
</body>
</html>