<?php 
include("config.php");


$description = $_POST['description'];
$post_id = $_POST['id'];
$user_id = $_SESSION['id'];
$sql = "INSERT INTO reports (user_id, product_id , description) VALUES ({$user_id},{$post_id},'{$description}')";

if (mysqli_query($conn, $sql)){
    header("location:{$hostname}/auction.php?id={$post_id}");
}else{
    echo mysqli_error($conn);

}
