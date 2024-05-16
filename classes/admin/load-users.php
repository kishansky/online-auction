<?php
include("config.php");

$html = null;
$start = $_POST['start'];

$sql = "SELECT * FROM users ORDER BY id LIMIT $start,10";
$result = mysqli_query($conn, $sql) or die();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $html .= '<tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['name'] . '</td>
        <td>&#8377;' . $row['email'] . '</td>
        <td>' . $row['phone'] . '</td>
        <td>' . $row['address'] . '</td>
        </tr>';
    }
}else{
    $html = mysqli_error($conn);
}
echo $html;
