<?php
include("config.php");

if(isset($_POST["update"])){
    $book_cat_id = $_POST["id"];
    $book_cat_name = $_POST["ucat"];
    $update_query = "UPDATE `books_categorey` SET `categorey_name`='$book_cat_name' WHERE `cid` = '$book_cat_id'";
    $update_result = mysqli_query($connection, $update_query) or die("Query Failed: UPDATE");
    if($update_result){
        echo "<script>
          window.location.href = 'viewcat.php'
          </script>";
}

}
?>