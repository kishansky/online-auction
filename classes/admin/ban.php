<?php 
include("config.php");
if (isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "UPDATE products SET status = 3 WHERE id = {$id}";
if(mysqli_query($conn,$sql)){
    $sql1 = "UPDATE reports SET status = 1 WHERE product_id = {$id}";
    if (mysqli_query($conn, $sql1)) {
        header("location:{$hostname}/classes/admin/reports.php");
    }
}