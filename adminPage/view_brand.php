<h2 class="text-center text-info">All Brands</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th class="text-center text-light bg-dark">Brand ID</th>
            <th class="text-center text-light bg-dark">Brand Title</th>
            <th class="text-center text-light bg-dark">Edit</th>
            <th class="text-center text-light bg-dark">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET['view_brand'])){
                $select_product = "SELECT * FROM `brands`";
                $result_product = mysqli_query($con, $select_product);

                while($row = mysqli_fetch_assoc($result_product)){
                    $idProduct = $row['brand_id'];
                    $titleProduct = $row['brand_title'];
                    echo "
                        <tr class='text-center'>
                            <td>$idProduct</td>
                            <td>$titleProduct</td>
                            <td><a href='index.php?edit_brand=$idProduct' class='text-dark'><i class='fa-regular fa-pen-to-square'></i></a></td>
                            <td><a href='index.php?delete_brand=$idProduct' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Launch demo modal</button> -->

<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">    <h4>Are you sure delete this?</h4>    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_brand" class="text-light text-decoration-none">NO</a></button>
            <button type="button" class="btn btn-primary"><a href="index.php?delete_brand=<?php echo $idProduct; ?>" class="text-light text-decoration-none">YES</a></button>
        </div>
        </div>
    </div>
</div> -->