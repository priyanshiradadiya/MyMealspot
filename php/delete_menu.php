<?php
require 'connection.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];
mysqli_query($conn, "DELETE FROM menu WHERE id=$id");
header('Location: admin_menu.php');
exit;
?>
