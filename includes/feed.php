<?php
$row['user_img'] = "item-1.png";
$row['firstname'] = "Kishan";
$row['lastname'] = "Kumar";
$row['date'] = "23-02-2024";
$row['description'] = "It's is just demo page chacking for beta testing";
$row['post_img'] = "item-2.png";


$html="<div class='whats-m'><div class='icon1'><div class='row icon2'>
<div class='col-1 user-img' style='padding:3px;'>
    <img src='./public/img/".$row['user_img']."' alt=''/>
</div>
<div class='col-11'>
    <div class='name-date'>
<b>".$row['firstname']." " .$row['lastname']."</b><br />
<p  style='font-size:12px;'>".$row['date']."</p>
 </div>
</div>
</div>
</div>
<hr class='hr'>
<div class='responsive'>
<div class='gallery'> 
    <p class='desc'>
       ".substr($row['description'],0,100)."..."."
    </p>
    <img src='./public/img/".$row['post_img']."'alt=''/>
</div>
</div>
<div class='row' id='likes'>
<div class='col-5 mb-1 mt-1'>
<div class=''>
Like
</div>
</div>
<div class='col-4 mb-1 mt-1'>
<div class='float-end'>
    Comment
</div>
</div>
<div class='col-3 mb-1 mt-1'>
<div class='float-end'>
    Share
</div>
</div>
</div>
<hr class='hr'>
<div class='row' id='b-likes'>
<div class='col-4 '>
<div class='b-like'>
    <button class='btn-like' onclick='myLike()'>
    <i id='like-btn' class='fa fa-thumbs-o-up' style='font-size:22px'></i>
    Like
    </button>
</div>
</div>
<div class='col-4 '>
<div class='b-like'>
    <button class='btn-like'>
    <i class='fa fa-comment-o' style='font-size:22px'></i>
    Comment
    </button>
</div>
</div>
<div class='col-4 '>
<div class='b-like'>
    <button class='btn-like'>
    <i class='fa fa-share' style='font-size:22px'></i>
    Share
</button>
</div>
</div>
</div>
</div>";


echo $html;

?>