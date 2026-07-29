<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['role'])) {
    header('Location: index.php');
    exit;
}

$uid = $_SESSION['user_id'];

$sql = "SELECT * FROM payments WHERE user_id='$uid' ORDER BY created_at DESC";
$payments = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Payment History</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Your Payment History</h2>

<table class="table table-bordered">
<tr>
  <th>Payment ID</th>
  <th>Amount</th>
  <th>Status</th>
  <th>Date</th>
</tr>

<?php while($p = mysqli_fetch_assoc($payments)): ?>
<tr>
  <td><?= $p['payment_id'] ?></td>
  <td><?= $p['amount'] ?></td>
  <td><?= $p['status'] ?></td>
  <td><?= $p['created_at'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>
