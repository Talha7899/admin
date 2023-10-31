<?php
include("config.php");
if (isset($_POST["add-products"])) {

    $title = $_POST["title"];
    $category = $_POST["book"];
    $discription = $_POST["discription"];
    $author = $_POST["author"];

    $book_img_name = $_FILES["bimage"]["name"];
    $book_img_size = $_FILES["bimage"]["size"];
    $book_img_tmp_name = $_FILES["bimage"]["tmp_name"];
    $book_price = $_POST["price"];

    $query = "SELECT * FROM `add-books` WHERE `book_title` = '$title'";
    $result = mysqli_query($connection, $query) or die("Query Failed");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Book Already Exists')</script>";
    } else {
        $insert_query = "INSERT INTO `add-books` (`book_title`, `category`,`book_discription`, `author`, `book_img`, `book_price`) VALUES ('$title', '$category', '$discription', '$author', '$book_img_name', '$book_price')";
        move_uploaded_file($_FILES["bimage"]["tmp_name"], 'books-images/' . $book_img_name);
        $insert_result = mysqli_query($connection, $insert_query);
        if ($insert_result) {
            echo "<script> alert('Book Successfully Inserted') 
            window.location.href = 'view-product.php'
            </script>";
        }
    }

    // $book_pdf_name = $_FILES["pdf"]["name"];
    // $book_pdf_tmp_name = $_FILES["pdf"]["tmp_name"];
    // $book_pdf_size = $_FILES["pdf"]["size"];

    // $book_cd_name = $_FILES["cd"]["name"];
    // $book_cd_tmp_name = $_FILES["cd"]["tmp_name"];
    // $book_cd_size = $_FILES["cd"]["size"];

    // $book_hard_copy_name = $_FILES["hard-copy"]["name"];
    // $book_hard_copy_size = $_FILES["hard-copy"]["size"];
    // $book_hard_copy_tmp_name = $_FILES["hard-copy"]["tmp_name"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Books</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</head>

<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Your Books</h1>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                                enctype="multipart/form-data" class="user">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Book Title" required autocomplete="off">
                                </div>
                                <?php
                                $sql1 = "SELECT * FROM `books_categorey`";
                                $result1 = mysqli_query($connection, $sql1) or die("Query Failed");
                                if (mysqli_num_rows($result1) > 0) {
                                ?>
                                <select class="form-select" name="book" aria-label="Default select example">
                                    <option selected  disabled>Book Category</option>
                                    <?php
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                    ?>
                                    <option value="<?php echo $row1['cid'] ?>"><?php echo $row1['categorey_name'] ?></option>
                                    <?php
                                        }
                                        }
                                    ?>
                                </select>
                               
                                <div class="form-group">
                                    <input type="text" name="discription" class="form-control form-control-user mt-3"
                                        id="discription" placeholder="Book Discription" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="author" class="form-control form-control-user"
                                        id="discription" placeholder="Book Author" required autocomplete="off">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="floatingInputValue">Book Image</label>
                                        <input type="file" name="bimage" class="form-control form-control-user"
                                            id="image" placeholder="Book Image" required autocomplete="off">
                                    </div>
                                    <!-- <div class="col-sm-6">
                                    <label for="floatingInputValue">Book CD</label>
                                        <input type="file" name="cd" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Book CD" required autocomplete="off">
                                    </div> -->
                                    <!-- <div class="col-sm-6">
                                    <label for="floatingInputValue">Book PDF</label>
                                        <input type="file" name="pdf" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Book PDF" required autocomplete="off">
                                    </div> -->
                                    <!-- <div class="col-sm-6">
                                    <label for="floatingInputValue">Book Hard Copy</label>
                                        <input type="file" name="hard-copy" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Book Hard Copy" required autocomplete="off">
                                    </div> -->
                                    <div class="col-sm-6">
                                        <input type="text" name="price" class="form-control form-control-user mt-3"
                                            id="RepeatPassword" placeholder="Book Price" required autocomplete="off">
                                    </div>
                                </div>
                                <input type="submit" name="add-products" value="Add Book" class="btn btn-success">
                                </input>
                            </form>
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
</body>

</html>