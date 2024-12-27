<h2 class="text-center text-info">All Orders</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th class="text-center text-light bg-dark">Ordr ID</th>
            <th class="text-center text-light bg-dark">Due Amount</th>
            <th class="text-center text-light bg-dark">Invoice number</th>
            <th class="text-center text-light bg-dark">Total Product</th>
            <th class="text-center text-light bg-dark">Order Data</th>
            <th class="text-center text-light bg-dark">Status</th>
            <th class="text-center text-light bg-dark">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['all_order'])){
                $select_product = "SELECT * FROM `user_orders`";
                $result_product = mysqli_query($con, $select_product);

                $count = mysqli_num_rows($result_product);

                if($count == 0){
                    echo "<h2 class='text-center bg-danger mt-5'>No Orders</h2>";
                }else{
                    while($row = mysqli_fetch_assoc($result_product)){
                        $idProduct = $row['order_id'];
                        $amount = $row['amount_due'];
                        $invNum = $row['invoice_number'];
                        $totalPrice = $row['total_products'];
                        $data = $row['order_date'];
                        $statue = $row['order_status'];
                        echo "
                            <tr class='text-center'>
                                <td>$idProduct</td>
                                <td>$amount</td>
                                <td>$invNum</td>
                                <td>$totalPrice</td>
                                <td>$data</td>
                                <td>$statue</td>
                                <td><a href='index.php?delete_order=$idProduct' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                        ";
                    }
                }
            }
        ?>
    </tbody>
</table>