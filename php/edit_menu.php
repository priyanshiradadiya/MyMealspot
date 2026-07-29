<?php
require 'connection.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];
$item = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id=$id"));

if (!$item) {
    header('Location: admin_menu.php');
    exit;
}

if (isset($_POST['update_item'])) {
    $name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $price = (float)$_POST['price'];

    $img_name = $item['image'];
    if (!empty($_FILES['image']['name'])) {
        $img_name = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$img_name);
    }

    mysqli_query($conn, "UPDATE menu SET item_name='$name', description='$desc', price=$price, image='$img_name' WHERE id=$id");
    header('Location: admin_menu.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu Item</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<h2>Edit Menu Item</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="item_name" value="<?= htmlspecialchars($item['item_name']) ?>" class="form-control mb-2" required>
    <textarea name="description" class="form-control mb-2"><?= htmlspecialchars($item['description']) ?></textarea>
    <input type="number" step="0.01" name="price" value="<?= $item['price'] ?>" class="form-control mb-2" required>
    <?php if($item['image']): ?>
        <img src="uploads/<?= $item['image'] ?>" width="100" class="mb-2"><br>
    <?php endif; ?>
    <input type="file" name="image" class="form-control mb-2">
    <button type="submit" name="update_item" class="btn btn-success">Update Item</button>
</form>
</body>
</html>
