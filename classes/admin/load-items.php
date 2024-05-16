<?php
include("config.php");

$html = null;
$start = $_POST['start'];

$sql = "SELECT * FROM products ORDER BY id LIMIT $start,10";
$result = mysqli_query($conn, $sql) or die();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $status;
        switch ($row['status']) {
            case 1:
                $status = "Sold";
                break;
            case 2:
                $status = "UnSold";
                break;
            case 3:
                $status = "Banned";
                break;
            case 4:
                $status = "Deleted";
                break;
            default:
                $status = "Progress";
                break;
        }
        $html .= '<tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>&#8377;' . $row['base_price'] . '</td>
        <td>' . $row['auction_date'] . '</td>
        <td>' . $status . '</td>
        </tr>';
    }
}else{
    $html = mysqli_error($conn);
}
echo $html;
