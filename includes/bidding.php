<?php
include("config.php");
$html = '';
$id = $_POST['id'];
$bid_price = $_POST['price'];
$user_id = $_POST['user_id'];
$start_time = strtotime("now");
$end_time = $start_time + 900;
$start_time = date("Y-m-d H:i:s", $start_time);
$end_time = date("Y-m-d H:i:s", $end_time);

$sql = "INSERT INTO bidding (user_id,product_id,bid_price) VALUES ({$user_id},{$id},{$bid_price})";

if(mysqli_query($conn, $sql)){
    $sql2 = "INSERT INTO bidding_control (product_id,start_time,end_time) VALUES ({$id},'{$start_time}','{$end_time}')";
    if (mysqli_query($conn, $sql2)) {
        $html = 'success';
    }
}
// $html .=  mysqli_error($conn) ." " . $start_time . " " . $end_time;
echo $html;