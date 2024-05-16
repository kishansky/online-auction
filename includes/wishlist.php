<?php
include("config.php");

$html = null;
$start = $_POST['start'];
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    $sql1 = "SELECT * FROM preferences WHERE user_id= $uid AND preference = 'like' ORDER BY id DESC LIMIT $start,2";
    $result1 =  mysqli_query($conn, $sql1) or die();
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $sql = "SELECT products.*,products.id as pid, users.name AS username ,users.id AS uid , users.photo , product_type.id,product_type.type AS typename  FROM products INNER JOIN users ON products.user_id = users.id LEFT JOIN product_type ON products.type = product_type.id WHERE products.id  = {$row1['product_id']} ";
            $result = mysqli_query($conn, $sql) or die();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $html .= "<div class='whats-m'><div class='icon1'><div class='row icon2'>
        <div class='col-1 user-img' style='padding:4px;'>
    <img src='profile_photo/" . $row['photo'] . "' alt=''/>
    </div>
    <div class='col-9'>
    <div class='name-date'>
    <b><a href='index.php?user=" . $row['uid'] . "' style='text-decoration:none;color:black;'>" . ucwords($row['username']) . "</a></b><br />
    <a href='index.php?type=" . $row['type'] . "' style='font-size:12px;text-decoration:none;color:black;'><b style='padding-right:5px;'>" . $row['typename'] . "</b>" . substr($row['datetime'], 0, 10) . "</a>
 </div>
 </div>
 <div class='col-2 text-center p-4 ps-0 '>
<a href='auction.php?id=" . $row['pid'] . "' class='btn btn-sm btn-primary '>Show</a>
</div>
 </div>
 </div>
 <hr class='hr'>
 <div class='responsive'>
 <div class='gallery'> 
 <p style='padding-left:15px;font-weight:600;margin:0;'>
 " . ucwords($row['name']) . "
 </p>
    <p class='desc'>
    " . substr($row['details'], 0, 100) . "..." . "
    </p>
    <img src='./item_image/" . $row['image_url'] . "'alt='' loading='lazy'/>
</div>
</div>
<div class='row' id='likes'>
<div class='col-12 m-2'>";
                    $sql2 = "SELECT * FROM preferences WHERE product_id ={$row['pid']} AND preference='like'";
                    $result2 = mysqli_query($conn, $sql2) or die();
                    if (mysqli_num_rows($result2) > 0) {
                        $html .= "<div class=''>
                " . mysqli_num_rows($result2) . " Like
                </div>";
                    } else {
                        $html .= "<div class=''>
                0 Like
                </div>";
                    }

                    $html .= "</div>


</div>
<hr class='hr'>
<div class='row' id='b-likes'>
<div class='col-6 '>
<div class='b-like'>";
                    $sql3 = "SELECT * FROM preferences WHERE product_id ={$row['pid']} AND preference='like' AND user_id ={$uid}";
                    $result3 = mysqli_query($conn, $sql3) or die();
                    if (mysqli_num_rows($result3) > 0) {
                        $html .= "<button class='btn-like valueButton ' onclick='myLike(" . $row['pid'] . ")' style='font-size:18px;color:blue;'>Liked</button>";
                    } else {
                        $html .= "<button class='btn-like valueButton' onclick='myLike(" . $row['pid'] . ")' style='font-size:18px;color:black;'>Like</button>";
                    }
                    $html .= "
</div>
</div>

<div class='col-6 '>
<div class='b-like'>
<button class='btn-like' style='font-size:18px'>

Share
</button>
</div>
</div>
</div>
</div>";
                }
            }
        }
       
    }
    
}


echo $html;
