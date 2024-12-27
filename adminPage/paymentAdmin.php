<h2 class="text-center text-info">All Payment</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th class="text-center text-light bg-dark">Ordr ID</th>
            <th class="text-center text-light bg-dark">Invoice number</th>
            <th class="text-center text-light bg-dark">Amount</th>
            <th class="text-center text-light bg-dark">Payment Mode</th>
            <th class="text-center text-light bg-dark">Order Data</th>
            <th class="text-center text-light bg-dark">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['payment'])){
                $select_product = "SELECT * FROM `user_payment`";
                $result_product = mysqli_query($con, $select_product);

                $count = mysqli_num_rows($result_product);

                if($count == 0){
                    echo "<h2 class='text-center bg-danger mt-5'>No Orders</h2>";
                }else{
                    while($row = mysqli_fetch_assoc($result_product)){
                        $idProduct = $row['payment_id'];
                        $amount = $row['invoice_number'];
                        $invNum = $row['amount'];
                        $mode = $row['payment_mod'];
                        $data = $row['date'];
                        echo "
                            <tr class='text-center'>
                                <td>$idProduct</td>
                                <td>$amount</td>
                                <td>$invNum</td>
                                <td>$mode</td>
                                <td>$data</td>
                                <td><a href='index.php?delete_payment=$idProduct' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                        ";
                    }
                }
            }
        ?>
    </tbody>
</table>