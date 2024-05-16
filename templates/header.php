<?php
include('includes/config.php');
$page = basename($_SERVER['PHP_SELF']);
switch ($page) {
    case 'wishlist.php':
        $page_title = "WishList";
        break;
    case 'profile.php':
        $page_title = "Profile";
        break;
    case 'add-item.php':
        $page_title = "Add New Item";
        break;
    case 'youe-items.php':
        $page_title = "My Item";
        break;
    case 'auction.php':
        $page_title = "Auction";
        break;
    case 'purchase.php':
        $page_title = "Purchases";
        break;

    default:
        $page_title = "Online Auction";
        break;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <title><?php echo $page_title; ?></title>
    <link rel="shortcut icon" href="./public/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row p-0 ">