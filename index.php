<?php
include("config.php");
session_start();
if(!isset($_SESSION['Email'])){
    header("Location:login.php");
}
?>

<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('admin/includes/footer.php');

?>