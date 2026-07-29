<?php
session_start();
include 'header.php';
require 'connection.php';

// Only logged-in users with 'user' role can access
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'user'){
    header('Location: index.php');
    exit;
}





// Handle "Confirm Payment" form submission
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_payment'])){
    // Generate unique order ID
    $order_id = 'ORD'.time();
    
    

    // Clear cart
    unset($_SESSION['cart']);

    // Redirect to success page
    header('Location: payment_success.php?order_id='.$order_id);
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Payment - Cafe & Restro</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: Arial, sans-serif;
    background: url('main_image.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}
.qr-container {
    text-align: center;
    background: rgba(0,0,0,0.6);
    padding: 40px;
    border-radius: 15px;
    color: #fff;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}
.qr-container img {
    width: 250px;
    height: 250px;
    margin-bottom: 20px;
}
.qr-container h2 {
    margin-bottom: 15px;
}
.qr-container p {
    font-size: 1.1rem;
}
.btn-confirm {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    padding: 10px 30px;
    border-radius: 50px;
    font-weight: bold;
    font-size: 1rem;
    transition: all 0.3s;
}
.btn-confirm:hover {
    background-color: #27ae60;
}
</style>
</head>
<body>
<div class="qr-container">
    <h2>Scan to Pay</h2>
    <img src="scanner.jpg" alt="Payment QR Code">
    <p>Scan using any UPI app to complete your payment.</p>
    <form method="post" style="margin-top:20px;">
        <button type="submit" name="confirm_payment" class="btn-confirm">Confirm Payment</button>
    </form>
</div>
</body>
</html>
