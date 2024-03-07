<?php
include "config.php";
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>login</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <style>
        .auction {
            height: 100vh;
            /* margin-top: 2rem; */
        }
        .chaudai{
            width: 50%;
        }

        @media(max-width: 768px) {
            .chaudai{
            width: 100%;
        }

            .auction {
                /* padding-top: 10px; */
                height: 4rem;
            }
        }
    </style>

</head>

<body style="background-color:#eee;">
    <div class="container-fluid">
        <div class="row ">
        <div class="col-12 col-sm-6">
                <div class="row text-center auction justify-content-center align-items-center">

                    <h1 class="text-primary  fw-bold" style="text-shadow: 2px 2px 6px grey;" data-aos="fade-in" data-aos-duration="3000">AUCTION</h1>
                </div>

            </div>
            