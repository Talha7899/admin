<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>All Book Categories </h2>
                <hr>
                <?php
                include('config.php');
                $fetch_cat = "SELECT * FROM `books_categorey`";
                $fetch_result = mysqli_query($connection, $fetch_cat);
                if(mysqli_num_rows($fetch_result) > 0){
                    while($row = mysqli_fetch_assoc($fetch_result)){
                ?>
            <table class="table table-warning">
                <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Status</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td scope="row"><?php echo $row['cid']; ?></td>
                    <td><?php echo $row['categorey_name']; ?></td>
                    <td><?php echo $row['cat_status']; ?></td>
                    <td ><a href="update-category.php?cat_id=<?php echo $row['cid'];?>" class="btn btn-success">Update</a></td>
                    <td ><a href="delete-categorey.php?cat_id=<?php echo $row['cid'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <!-- <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td ><a href="" class="btn btn-success">Update</a></td>
                    <td ><a href="" class="btn btn-danger">Delete</a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td ><a href="" class="btn btn-success">Update</a></td>
                    <td ><a href="" class="btn btn-danger">Delete</a></td>

                    </tr> -->
                </tbody>
            </table>
            <?php
                    }
                }
            
            ?>
            <!-- <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav> -->

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>