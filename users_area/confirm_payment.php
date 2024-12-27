<?php
    include('../includs/connect.php');
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $select_order_user = "SELECT * FROM `user_orders`WHERE order_id = '$order_id'";
        $result = mysqli_query($con, $select_order_user);
        $row_fetch = mysqli_fetch_assoc($result);
        $invoic = $row_fetch['invoice_number'];
        $amount = $row_fetch['amount_due'];
    }
    if(isset($_POST['confirm'])){
        $invoic = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];
        $current_date = date('Y-m-d H:i:s');

        $insert_payment = "INSERT INTO `user_payment`(`order_id`, `invoice_number`, `amount`, `payment_mod`, `date`) 
                VALUES ('$order_id','$invoic','$amount','$payment_mode', date('Y-m-d H:i:s'))";
        $result = mysqli_query($con, $insert_payment);
        if($result){
            echo "<script>alert('Successfully Completed the payment')</script>";
            echo "<script>window.open('profile.php', '_self')</script>";
        }

        $update_order = "UPDATE `user_orders` SET `order_status`='Complete' WHERE order_id=$order_id";
        $result_order = mysqli_query($con, $update_order);
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
    <title>Confirm Payment</title>
</head>
<body class="bg-body-tertiary">
    <div class="container my-5">
        <h1 class="text-center text-info">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoic ?>">
            </div>
            <div class="form-outline my-4 text-center pb-5">
                <label class="pb-2 fs-4">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option selected>Select Payment Mode</option>
                    <option value="upi">UPI</option>
                    <option value="netbanking">Netbanking</option>
                    <option value="papal">Paypal</option>
                    <option value="cash on delivery">Cash on Delivery</option>
                    <option value="pay offline">Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
                <input type="submit" class="btn btn-info text-light" name="confirm" value="Confirm">
            </div>
        </form>
    </div>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>