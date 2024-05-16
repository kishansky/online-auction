<?php
include('config.php');
$page = basename($_SERVER['PHP_SELF']);
switch ($page) {
    case 'reports.php':
        $page_title = "Reports";
        break;
    case 'users.php':
        $page_title = "User";
        break;

    default:
    $page_title = "Items";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title><?php  echo $page_title; ?></title>
    <link rel="shortcut icon" href="../../public/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="../../public/js/jquery.js" ></script>
    <script src="../../public/js/bootstrap.min.js" ></script>
</head>
<body>
    <div class="container-fluid">
      <div class="row p-0 " >

