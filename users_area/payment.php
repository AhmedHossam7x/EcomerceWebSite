<?php
    include('../includs/connect.php');
    include('../function/commen_function.php'); 
    // session_start();
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
    <title>PaymentPage</title>
    <style>
        .payImag{
            width: 50%;
            margin-left: 30%;
            display: block;
        }
    </style>
</head>
<body>
    <?php
        // $ip = getIPAddress(); ===========>>>>>>>>>>
        $email = $_SESSION['email'];
        $select_query = "SELECT * FROM `user_table` WHERE user_email='$email'";
        $result_query = mysqli_query($con, $select_query);
        $run_query = mysqli_fetch_array($result_query);
        $user_id = $run_query['user_id'];
        // echo $user_id;
    ?>
    <div class="container mt-3 text-center ms-5 ps-5">
        <h2 class="text-center text-info">Payment Option</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6"> <a href="https://www.paypal.com"><img class="payImag" src="../images/paypal.jpg" target="_blank"></a> </div>
            <div class="col-md-6"> <a href="orders.php?user_id=<?php echo $user_id ?>"><h2>Pay Offline</h2></a> </div>
        </div>
    </div>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>