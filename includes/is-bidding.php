<?php
include("config.php");

$html = '';
$id = $_POST['id'];
$add = 100;

$sqlfind = "SELECT * FROM bidding WHERE product_id = $id ORDER BY id DESC LIMIT 1";
$resultfind = mysqli_query($conn, $sqlfind);
if (mysqli_num_rows($resultfind) > 0) {
    while ($rowf = mysqli_fetch_assoc($resultfind)) {
        $html = '<tr>
<th scope="col">Bidding Price</th>
<td>
    <p class="m-0">&#8377; ' . $rowf['bid_price'] . '</p>
</td>
</tr>
<tr>
<th scope="col">Next Bid : &#8377; ' . ($rowf['bid_price'] + $add) . '</th>
<td>
    <button  onclick="bid(' . ($rowf['bid_price'] + $add) . ')" class="btn btn-primary ">Bid Now</button>
</td>
</tr>';
    }
} else {
    $sql = "SELECT base_price FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html = '<tr>
<th scope="col">Bidding Price</th>
<td>
    <p class="m-0">&#8377; ' . $row['base_price'] . '</p>
</td>
</tr>
<tr>
<th scope="col"></th>
<td>
    <button  onclick="bid(' . $row['base_price'] . ')" class="btn btn-primary ">Bid Now</button>
</td>
</tr>';
        }
    }
}
// $html = mysqli_error($conn);
echo $html;
