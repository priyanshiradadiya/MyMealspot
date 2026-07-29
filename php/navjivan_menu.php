<?php
session_start();
require 'connection.php';

// Only logged-in users
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: index.php');
    exit;
}

// Fetch only Navjivan menu items
$result = $conn->query("SELECT * FROM menu WHERE hotel_name='Navjivan'");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Navjivan Menu</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f8f8f8; }
        h2 { text-align: center; margin-bottom: 30px; }
        .menu-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .menu-item { border: 1px solid #ccc; padding: 10px; width: 200px; text-align: center; border-radius: 10px; box-shadow: 2px 2px 8px rgba(0,0,0,0.1); background-color: white; }
        .menu-item img { width: 100%; height: 100px; object-fit: cover; border-radius: 10px; }
        .menu-item h3 { margin: 10px 0 5px; font-size: 18px; }
        .menu-item p { margin: 5px 0; font-weight: bold; }
        .menu-item input { width: 50px; text-align: center; margin-top: 5px; }
        .menu-item button { padding: 5px 10px; margin-top: 5px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .menu-item button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h2>Navjivan Menu</h2>
    <div class="menu-container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="menu-item">
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['item_name']; ?>">
                <h3><?php echo $row['item_name']; ?></h3>
                <p>₹<?php echo $row['price']; ?></p>
                <form method="POST" action="add_to_cart.php">
                    <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
