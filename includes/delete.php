<?php 
include("config.php");
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
$user_id = $_SESSION['id'];
$sql = "UPDATE products SET status = 4 WHERE id = {$id} AND user_id = {$user_id}";
if(mysqli_query($conn,$sql)){
    header("location:{$hostname}/your-items.php");
}