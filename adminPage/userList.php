<h2 class="text-center text-info">All User</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th class="text-center text-light bg-dark">ID</th>
            <th class="text-center text-light bg-dark">Name</th>
            <th class="text-center text-light bg-dark">Email</th>
            <th class="text-center text-light bg-dark">Image</th>
            <th class="text-center text-light bg-dark">Address</th>
            <th class="text-center text-light bg-dark">Phone</th>
            <th class="text-center text-light bg-dark">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['user'])){
                $select_product = "SELECT * FROM `user_table`";
                $result_product = mysqli_query($con, $select_product);

                while($row = mysqli_fetch_assoc($result_product)){
                    $idProduct = $row['user_id'];
                    $name = $row['user_name'];
                    $email = $row['user_email'];
                    $img = $row['user_image'];
                    $address = $row['user_address'];
                    $phone = $row['user_mobile'];
                    echo "
                        <tr class='text-center'>
                            <td>$idProduct</td>
                            <td>$name</td>
                            <td>$$email</td>
                            <td>$img</td>
                            <td>$address</td>
                            <td>$phone</td>
                            <td><a href='index.php?user_delete=$idProduct' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>