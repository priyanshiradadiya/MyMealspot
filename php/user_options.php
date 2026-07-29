<?php
session_start();
include 'header.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Options - Cafe & Restro</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        

        .container-card {
            background: rgba(0,0,0,0.65);
            padding: 40px 30px;
            border-radius: 20px;
            max-width: 400px;
            margin: 100px auto;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            backdrop-filter: blur(5px);
        }

        h2 {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 20px;
            color: #ffdd59;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.6);
        }

        p {
            margin-bottom: 30px;
            color: #fff;
            font-size: 16px;
        }

        .btn-option {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            color: #fff;
        }

        .btn-login { background-color: #75472dff; }
        .btn-register { background-color: #5E2C04; }
        .btn-menu { background-color: #b16327ff; }

        .btn-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.5);
        }

        @media (max-width: 500px) {
            .container-card {
                margin: 50px 20px;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
<!-- Video Background Snippet -->
    <video autoplay muted loop playsinline style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
    ">
    <source src="homevv.mp4" type="video/mp4">
    Your browser does not support the video tag.
    </video>

    <!-- Optional overlay for better readability -->
    <div style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    z-index: 0;
    "></div>
   <!-- Bottom Center QR Code -->
<div style="position:fixed; bottom:20px; left:50%; transform:translateX(-50%); z-index:1000;">
  <div class="card shadow p-3 text-center" style="border-radius:15px; max-width:160px;">
    <h6 class="mb-2">Scan & Explore</h6>
    <img src="appscanner.jpg" alt="QR Code" class="img-fluid" style="max-width:120px;">
    <p class="small text-muted mb-0">Scan this QR code to open our application!</p>
  </div>
</div>

<!-- Optional hover effect -->
<style>
  .card {
    transition: transform 0.3s, box-shadow 0.3s;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
  }
</style>



<div class="container-card">
    <h2>Welcome, Foodie!</h2>
    <p>Select an option to continue:</p>

    <a href="user_login.php" class="btn btn-option btn-login">Login</a>
    <a href="user_register.php" class="btn btn-option btn-register">Register</a>
    <a href="home.php" class="btn btn-option btn-menu">Home</a>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
