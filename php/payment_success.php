<?php
session_start();
include 'header.php';


// Ensure user came from payment
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '';
if(!$order_id){
    header('Location: menu.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Payment Success</title>
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

.popup {
    background: rgba(0,0,0,0.85);
    color: #fff;
    padding: 40px 60px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.6);
    animation: popIn 0.6s ease;
    position: relative;
}

.popup h2 {
    font-size: 2rem;
    margin-bottom: 15px;
}

.popup p {
    font-size: 1.2rem;
    margin-bottom: 25px;
}

.checkmark {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: inline-block;
    border: 4px solid #2ecc71;
    position: relative;
    margin-bottom: 20px;
    animation: scaleIn 0.5s ease forwards;
}

.checkmark::after {
    content: '';
    position: absolute;
    left: 40px;
    top: 20px;
    width: 15px;
    height: 30px;
    border-right: 4px solid #2ecc71;
    border-bottom: 4px solid #2ecc71;
    transform: rotate(45deg);
    transform-origin: left top;
    opacity: 0;
    animation: draw 0.5s 0.5s forwards;
}

@keyframes popIn {
    0% { transform: scale(0.5); opacity: 0; }
    100% { transform: scale(1); opacity: 1; }
}

@keyframes scaleIn {
    0% { transform: scale(0); }
    100% { transform: scale(1); }
}

@keyframes draw {
    0% { opacity: 0; height: 0; width: 0; }
    100% { opacity: 1; height: 30px; width: 15px; }
}

.btn-home {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    padding: 10px 25px;
    border-radius: 50px;
    font-weight: bold;
    font-size: 1rem;
    transition: all 0.3s;
    text-decoration: none;
}
.btn-home:hover {
    background-color: #27ae60;
}
</style>
</head>
<body>

<div class="popup">
    <div class="checkmark"></div>
    <h2>Payment Successful!</h2>
    <p>Your order ID: <strong><?php echo htmlspecialchars($order_id); ?></strong></p>
    <a href="feedback.php" class="btn-home">Give us a feedback </a>
</div>

</body>
</html>
