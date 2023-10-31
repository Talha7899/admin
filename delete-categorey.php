<?php
include("config.php");

$category_id = $_GET["cat_id"];

$del_query = "DELETE FROM `books_categorey` WHERE `cid` = '$category_id'";
$del_result = mysqli_query($connection,$del_query) or die("Query Failed");
echo "<script>
window.location.href = 'viewcat.php'
</script>";

?>