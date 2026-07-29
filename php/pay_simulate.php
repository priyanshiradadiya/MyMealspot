<?php
// C:\xampp\htdocs\php_final\pay_simulate.php
session_start();
require 'connection.php';

// Ensure this is a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: menu.php');
    exit;
}

// Get the order ID from POST
$order_id = (int)$_POST['order_id'];

// Fetch order total
$order_res = mysqli_query($conn, "SELECT total FROM orders WHERE id=$order_id");
$order = mysqli_fetch_assoc($order_res);
$amount = $order['total'];

// 1️⃣ Mark order as paid
mysqli_query($conn, "UPDATE orders SET status='paid' WHERE id=$order_id");

unset($_SESSION['cart']);

// 2️⃣ Insert a simulated payment record
$stmt = mysqli_prepare($conn, "INSERT INTO payments (order_id, amount, payment_method, provider_payment_id, status, created_at) VALUES (?,?,?,?,?,NOW())");
$method = 'Simulated';
$provider_id = 'SIM' . time();
$status = 'paid';
mysqli_stmt_bind_param($stmt, 'idsss', $order_id, $amount, $method, $provider_id, $status);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// 3️⃣ Redirect to order success page
header("Location: order_success.php?order_id=$order_id");
exit;
?>
