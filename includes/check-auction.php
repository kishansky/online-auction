<?php
include("config.php");

$html = '';
$id = $_POST['id'];

$sql = "SELECT * FROM bidding_control WHERE product_id = $id ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $time = strtotime(date('Y/m/d H:i:s'));
        $endtime = strtotime($row['end_time']);
        if ($endtime < $time) {
            $sql1 = "SELECT * FROM bidding WHERE product_id = $id ORDER BY id DESC LIMIT 1";
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $sql2 = "SELECT * FROM transaction WHERE product_id = $id ";
                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $sql4 = "SELECT * FROM users WHERE id = {$row2['user_id']} ";
                            $result4 = mysqli_query($conn, $sql4);
                            if (mysqli_num_rows($result4) > 0) {
                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                    $html = '<tr>
                            <th class="fw-bolder align-middle">Item Sold to :</th>
                            <td class="align-middle">
                                <div class="d-flex  bg-info p-2 rounded-2 m-0">
                                    <img class="rounded-circle " src="./profile_photo/' . $row4['photo'] . '" style="height:2rem; width:2rem;" />
                                    <h6 class="ms-2 mt-1">' . ucwords($row4['name']) . ' | ' . ucwords($row4['email']) . ' </h6>
                                </div>
                            </td>
                            </tr>';
                                }
                            }
                        }
                    } else {
                        $sql3 = "INSERT INTO transaction (user_id, product_id, datetime, sold_price) VALUES ({$row1['user_id']},{$row1['product_id']},'{$row['end_time']}',{$row1['bid_price']})";
                        if (mysqli_query($conn, $sql3)) {
                            $sql5 = "UPDATE products SET status = 1 WHERE id = {$id}";
                            if (mysqli_query($conn, $sql5)) {
                                $sql4 = "SELECT * FROM users WHERE id = {$row1['user_id']} ";
                                $result4 = mysqli_query($conn, $sql4);
                                if (mysqli_num_rows($result4) > 0) {
                                    while ($row4 = mysqli_fetch_assoc($result4)) {
                                        $html = '<tr>
                                        <th class="fw-bolder align-middle">Item Sold to :</th>
                                        <td class="align-middle">
                                            <div class="d-flex  bg-info p-2 rounded-2 m-0">
                                                <img class="rounded-circle " src="./profile_photo/' . $row4['photo'] . '" style="height:2rem; width:2rem;" />
                                                <h6 class="ms-2 mt-1">' . ucwords($row4['name']) . ' | ' . ucwords($row4['email']) . ' </h6>
                                            </div>
                                        </td>
                                        </tr>';
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                $sql5 = "UPDATE products SET status = 2 WHERE id = {$id}";
                if (mysqli_query($conn, $sql5)) {
                    $html = '<tr>
                                                    <td class="fw-bolder align-middle">Item Status:<td>
                                                    <td class="align-middle">
                                                        <div class="d-flex bg-danger text-white">
                                                            <h6 class="ms-2 mt-1">Unsold</h6>
                                                        </div>
                                                    </td>
                                                    </tr>';
                }
            
            }
        }
    }
}

echo $html;
