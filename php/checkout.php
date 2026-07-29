<?php
session_start();
require 'connection.php';

// Ensure user is logged in
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit;
}

// Cart must not be empty
if (empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty!'); window.location='menu.php';</script>";
    exit;
}

// Get user_id from session
$user_id = $_SESSION['user_id'];
$table_number = $_SESSION['table_number'] ?? null;

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['qty'];
}

// Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (user_id, total, status, table_number, created_at) VALUES (?, ?, 'pending', ?, NOW())");
$stmt->bind_param("ids", $user_id, $total, $table_number);
$stmt->execute();
$order_id = $stmt->insert_id; // Get new order ID

// Insert each item into order_items
foreach ($_SESSION['cart'] as $menu_id => $item) {
    $price = $item['price'];
    $qty = $item['qty'];
    $stmt2 = $conn->prepare("INSERT INTO order_items (order_id, menu_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("iiid", $order_id, $menu_id, $qty, $price);
    $stmt2->execute();
}

// Clear session cart
unset($_SESSION['cart']);

header("Location: payment.php?order_id=$order_id");
exit;
?>
