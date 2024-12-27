<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="" href="../images/ecommerce.svg" style="width: 100%;">
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>User Orders</title>
</head>
<body>
    <?php
        $email = $_SESSION['email'];

        // $get_user = "
        //     (SELECT * FROM `user_table` user
        //     LEFT JOIN `user_orders` Uord ON Uord.user_id = user.user_id
        //     WHERE user.user_email = '$email')
        //     UNION
        //     (SELECT * FROM `user_table` user
        //     RIGHT JOIN `user_orders` Uord ON Uord.user_id = user.user_id and Uord.order_status='pending'
        //     WHERE user.user_email = '$email')
        // ";
        $getUserId= "SELECT * FROM `user_table` WHERE user_email = '$email'";
        $result = mysqli_query($con, $getUserId);
        $uuid = mysqli_fetch_assoc($result);
        $id = $uuid['user_id'];

        // $result = mysqli_query($con, $get_user);
        $getUserOrder = "SELECT * FROM `user_orders` where user_id='$id'";
        $resultOrder = mysqli_query($con, $getUserOrder);
        $found = mysqli_num_rows($resultOrder);
    ?>
    <h3 class="text-center mt-3">All My Orders</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="bg-black text-light text-center">S1 no</th>
                <!-- <th class="bg-black text-light text-center">Order number</th> -->
                <th class="bg-black text-light text-center">Amount Due</th>
                <th class="bg-black text-light text-center">Total Prodacts</th>
                <th class="bg-black text-light text-center">Invoice Number</th>
                <th class="bg-black text-light text-center">Date</th>
                <th class="bg-black text-light text-center">Complete/Incomplete</th>
                <th class="bg-black text-light text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($found > 0){
                    $number = 1;
                    while($row_order = mysqli_fetch_assoc($resultOrder)){
                        $order_id= $row_order['order_id'];
                        $amount_due= $row_order['amount_due'];
                        $total_product = $row_order['total_products'];
                        $invoice_number = $row_order['invoice_number'];
                        $order_date = $row_order['order_date'];
                        $order_status = $row_order['order_status'];
                        if($order_status == 'pending'){
                            $order_status='InComplete';
                        }else{
                            $order_status='Complete';
                        }
                        echo"
                            <tr class='text-center'>
                                <td>$number</td>
                                <td>$amount_due</td>
                                <td>$total_product</td>
                                <td>$invoice_number</td>
                                <td>$order_date</td>
                                <td>$order_status</td>
                            ";
                            if($order_status == "Complete"){
                                echo "
                                    <td class='text-success'>Paid</td>
                                    </rt>
                                ";
                            }else{
                                echo "
                                    <td><a class='text-danger' href='confirm_payment.php?order_id=$order_id' class='text-black'>Confirm</a></td>
                                    </rt>
                                ";
                            }
                        $number++;
                    }
                }
            ?>
            <tr></tr>
        </tbody>
    </table>    
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>