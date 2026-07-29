<?php
session_start();
require 'connection.php'; // Your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'] ?? 0; // if user is logged in
    $name    = $_POST['name'] ?? 'Guest';
    $message = $_POST['message'] ?? '';
    $order_id = $_POST['order_id'] ?? 0;

    if ($message && $order_id) {
        $stmt = $conn->prepare("INSERT INTO feedback (user_id, name, message, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iss", $user_id, $name, $message);
        $stmt->execute();
        $stmt->close();
        echo "success";
    } else {
        echo "error";
    }
}
?>
