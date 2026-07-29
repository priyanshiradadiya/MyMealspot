<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to home page with success message
header("Location: home.php?logout=success");
exit;
?>