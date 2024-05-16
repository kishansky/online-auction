<?php
include("config.php");

$html = null;
$start = $_POST['start'];
$sql = "SELECT reports.*,products.name as pname , users.name as uname  FROM reports INNER JOIN users ON reports.user_id = users.id LEFT JOIN products ON reports.product_id = products.id ORDER BY products.id DESC LIMIT $start,2";
$result = mysqli_query($conn, $sql) or die();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $status;
        if($row['status'] == 0){
            $status = '<a href="ban.php?id='.$row['product_id'].'"><button class="btn btn-sm btn-danger ">Ban</button></a>';
        }else{
            $status = 'Banned';
        }

        $html .= '<tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['pname'] . '</td>
        <td>' . $row['uname'] . '</td>
        <td>' . $row['description'] . '</td>
        <td>' .  $status. '</td>
        </tr>';
    }
}else{
    $html = mysqli_error($conn);
}
echo $html;
