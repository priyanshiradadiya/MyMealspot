<?php
session_start();
require 'connection.php';

// Check order_id exists in URL
if (!isset($_GET['order_id']) || !is_numeric($_GET['order_id'])) {
    echo "<script>alert('Invalid Order!'); window.location='menu.php';</script>";
    exit;
}

$order_id = (int)$_GET['order_id'];

// Fetch order details
$query = mysqli_query($conn, "SELECT * FROM orders WHERE id = $order_id");
if (mysqli_num_rows($query) == 0) {
    echo "<script>alert('Order Not Found!'); window.location='menu.php';</script>";
    exit;
}

$order = mysqli_fetch_assoc($query);
?>
<!doctype html>
<html>
<head>
<title>Order Successful</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: #f9fafb;
    font-family: 'Poppins', sans-serif;
}
.success-box {
    max-width: 600px;
    background: white;
    padding: 30px;
    margin: 60px auto;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
.success-icon {
    font-size: 60px;
    color: #2ecc71;
}
</style>
</head>
<body>

<div class="success-box">
    <div class="success-icon">✅</div>
    <h2>Your Order Has Been Placed!</h2>
    <p class="mt-2">Thank you for ordering 😊</p>
    
    <h4 class="mt-4">Order Details</h4>
    <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
    <p><strong>Status:</strong> <?php echo ucfirst($order['status']); ?></p>

    <?php if(!empty($order['table_number'])): ?>
        <p><strong>Table Number:</strong> <?php echo htmlspecialchars($order['table_number']); ?></p>
    <?php endif; ?>

    <a href="menu.php" class="btn btn-success mt-3">Back to Menu</a>
</div>

</body>
</html>
