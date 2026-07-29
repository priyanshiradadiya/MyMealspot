<?php
session_start();
include("connection.php"); // ✅ use your connection file

// check if cart is empty
$cart = mysqli_query($conn, "SELECT * FROM cart");
if (mysqli_num_rows($cart) == 0) {
    echo "<script>alert('Cart is empty!'); window.location='menu.php';</script>";
    exit();
}

// create new order
$total = 0;
while($item = mysqli_fetch_assoc($cart)) {
    $total += $item['price'] * $item['quantity'];
}

$query = "INSERT INTO orders (user_id, total, status, created_at) VALUES (?, ?, 'received', NOW())";
$stmt = $conn->prepare($query);
$stmt->bind_param("id", $_SESSION['user_id'], $total);
$stmt->execute();

$order_id = $stmt->insert_id; // get new order id

// insert order items
$cart = mysqli_query($conn, "SELECT * FROM cart");
while($item = mysqli_fetch_assoc($cart)) {

    $m_id = $item['menu_id'];
    $qty = $item['quantity'];
    $price = $item['price'];

    $q = "INSERT INTO order_items (order_id, menu_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt2 = $conn->prepare($q);
    $stmt2->bind_param("iiid", $order_id, $m_id, $qty, $price);
    $stmt2->execute();
}

// clear cart
mysqli_query($conn, "DELETE FROM cart");

echo "<script>alert('Order Placed Successfully!'); window.location='order_success.php?order_id=$order_id';</script>";
?>
