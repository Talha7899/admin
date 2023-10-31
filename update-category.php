<?php
include("config.php");
$category_id = $_GET["cat_id"];
$cat_query = "SELECT * FROM `books_categorey` WHERE `cid` = '$category_id'" or die("Query Falied");
$cat_result = mysqli_query($connection, $cat_query);
if (mysqli_num_rows($cat_result) > 0) {
    while ($cat = mysqli_fetch_assoc($cat_result)) {

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Book Category</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Your Book Category</h1>
                            </div>
                            <form action="update-book-cat.php" method="POST" class="user">
                            <div class="form-group">
                                    <input type="hidden" value="<?php echo $cat['cid'] ?>" name="id" class="form-control form-control-user" id="category"
                                        placeholder="Update Book Category Name" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $cat['categorey_name'] ?>" name="ucat" class="form-control form-control-user" id="category"
                                        placeholder="Update Book Category Name" required autocomplete="off">
                                </div>
                                <div class="form-group row">
                                </div>
                                <input type="submit" name="update" class="btn btn-success btn-user btn-block" value="Update Book Category">
                                </input>
                            </form>
                            <?php
                                }
                            }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>