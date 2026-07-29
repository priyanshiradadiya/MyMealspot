<?php
require 'connection.php';

$order_id = (int)$_POST['order_id'];
$method = $_POST['payment_method'];

$order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT total FROM orders WHERE id=$order_id"));
$amount = $order['total'];

mysqli_query($conn, "INSERT INTO payments (order_id, amount, payment_method, payment_status) 
VALUES ($order_id, $amount, '$method', 'success')");

header("Location: feedback.php?order_id=$order_id");
exit;
?>
