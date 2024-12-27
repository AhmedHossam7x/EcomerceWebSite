<h2 class="text-center text-info">All Categories</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th class="text-center text-light bg-dark">categorey ID</th>
            <th class="text-center text-light bg-dark">categorey Title</th>
            <th class="text-center text-light bg-dark">Edit</th>
            <th class="text-center text-light bg-dark">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['view_category'])){
                $select_product = "SELECT * FROM `categories`";
                $result_product = mysqli_query($con, $select_product);

                while($row = mysqli_fetch_assoc($result_product)){
                    $idProduct = $row['category_id'];
                    $titleProduct = $row['category_title'];
                    echo "
                        <tr class='text-center'>
                            <td>$idProduct</td>
                            <td>$titleProduct</td>
                            <td><a href='index.php?edit_category=$idProduct' class='text-dark'><i class='fa-regular fa-pen-to-square'></i></a></td>
                            <td><a href='index.php?delete_category=$idProduct' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>