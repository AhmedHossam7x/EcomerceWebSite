<h2 class="text-center text-info">All Products</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th class="text-center text-light bg-dark">Product ID</th>
            <th class="text-center text-light bg-dark">Product Title</th>
            <th class="text-center text-light bg-dark">Product Image</th>
            <th class="text-center text-light bg-dark">Product Price</th>
            <th class="text-center text-light bg-dark">Total Sold</th>
            <th class="text-center text-light bg-dark">Status</th>
            <th class="text-center text-light bg-dark">Edit</th>
            <th class="text-center text-light bg-dark">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['view_product'])){
                $select_product = "SELECT * FROM `products`";
                $result_product = mysqli_query($con, $select_product);

                while($row = mysqli_fetch_assoc($result_product)){
                    $idProduct = $row['product_id'];
                    $titleProduct = $row['product_title'];
                    $imgProduct = $row['product_img1'];
                    $priceProduct = $row['product_price'];
                    $statusProduct = $row['status'];

                    $selectPanding= "SELECT * FROM `orders_panding` WHERE product_id = $idProduct";
                    $resultOrder = mysqli_query($con, $selectPanding);
                    $count = mysqli_num_rows($resultOrder);

                    echo "
                        <tr class='text-center'>
                            <td>$idProduct</td>
                            <td>$titleProduct</td>
                            <td><img src='product_image/$imgProduct' style='width: 50px; height: 50px ; object-fit: fill;' class='rounded-circle' alt='$titleProduct'></td>
                            <td>$priceProduct</td>
                            <td>$statusProduct</td>
                            <td>$count</td>
                            <td><a href='index.php?edit_product=$idProduct' class='text-dark'><i class='fa-regular fa-pen-to-square'></i></a></td>
                            <td><a href='index.php?delete_product=$idProduct' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>