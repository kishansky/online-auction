<?php 
include("config.php");

$html = '';
$id = $_POST['id'];

$sql = "SELECT * FROM bidding_control WHERE product_id = $id ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $html = '<th id="bid-content" scope="col">Bidding Time : </th>
        <td>
        <p id="countdown" val="'.strtotime($row['end_time']).'" class="m-0">loading</p>
        </td>' ;
    }
}
echo $html;