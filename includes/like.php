<?php
include("config.php");
// session_start();
// $html = "nn";
$p_id = $_POST['p_id'];

if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $sql = "SELECT * FROM preferences WHERE product_id = {$p_id} AND user_id = {$uid}";
    $result = mysqli_query($conn, $sql) or die();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['preference'] == 'like') {
                $sql2 = "UPDATE preferences SET preference='dislike' WHERE id={$row['id']}";
                if (mysqli_query($conn, $sql2)) {
                    $html = "Disliked";
                }
            }else{
                $sql2 = "UPDATE preferences SET preference='like' WHERE id={$row['id']}";
                if (mysqli_query($conn, $sql2)) {
                    $html = "Liked";
                }
            }
        }
    } else {
        $like = "like";
        $sql1 = "INSERT INTO preferences (user_id,product_id,preference) VALUES ({$uid},{$p_id},'{$like}')";
        if (mysqli_query($conn, $sql1)) {
            $html = "Liked";
        }
        // $result1 = mysqli_query($conn, $sql1) or die();
    }
    echo $html;
}
