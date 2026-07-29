<?php
session_start();
include 'header.php';
require 'connection.php';

// Get selected hotel OR default to Amiras
$hotel = isset($_GET['hotel']) ? $_GET['hotel'] : 'Amiras';

// Fetch menu items grouped by category
$query = "SELECT * FROM menu WHERE hotel_name = ? ORDER BY category, item_name";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $hotel);
$stmt->execute();
$result = $stmt->get_result();

$categories = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[$row['category']][] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($hotel); ?> Menu</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<style>
    body {
        font-family: bold 'Poppins', sans-serif;
        background: url('main_image.jpg') center/cover fixed no-repeat;
        margin-top: 80px;
        color: #75472dff;
        overflow-x: hidden;
    }

    .container {
        background: rgba(0,0,0,0.55);
        padding: 30px;
        border-radius: 20px;
        margin-top: 40px;
        backdrop-filter: blur(6px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.6);
        animation: fadeIn 1s ease-out;
    }

    @keyframes fadeIn {
        from { opacity:0; transform:translateY(30px); }
        to { opacity:1; transform:translateY(0); }
    }

    .card {
        border-radius: 18px;
        overflow: hidden;
        transition: 0.35s ease;
        transform: translateY(20px);
        opacity: 0;
        animation: slideUp 0.6s ease forwards;
    }

    @keyframes slideUp {
        to { transform: translateY(0); opacity: 1; }
    }

    .card:hover {
        transform: scale(1.06);
        box-shadow: 0 10px 30px rgba(0,0,0,0.65);
    }

    .card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .card-body {
        background:#ffffffc5;
        padding: 18px;
    }

    .price {
        font-weight: bold;
        color: #1f6050;
        font-size: 1.2rem;
    }

    .btn-add {
        background: #1f6050;
        color: #fff;
        font-size: 1rem;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-add:hover {
        background: #4ea68a;
        transform: translateY(-2px);
    }

    /* Star rating */
    .stars {
        color: #ffdd00;
        font-size: 1.2rem;
        margin-bottom: 8px;
    }

    .category-title {
        margin-top: 35px;
        font-weight: 600;
        letter-spacing: 1px;
        border-left: 5px solid #ffdd00;
        padding-left: 10px;
        animation: fadeIn 1s;
        color: #f8f7f2ff;
    }
</style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4"><?php echo htmlspecialchars($hotel); ?> Menu</h2>

    <?php if (!empty($categories)) { ?>
        <?php foreach ($categories as $category => $items) { ?>

            <h3 class="category-title"><?php echo htmlspecialchars($category); ?></h3>

            <div class="row">
                <?php foreach ($items as $item) { ?>

                    <div class="col-md-4 mb-4">
                        <div class="card">

                            <img src="<?php echo htmlspecialchars($item['image'] ?: 'default_food.jpg'); ?>">

                            <div class="card-body">
                                <h5><?php echo htmlspecialchars($item['item_name']); ?></h5>

                                <!-- ⭐ Rating stars -->
                                <div class="stars">
                                    <?php 
                                        $rating = round($item['rating']);
                                        echo str_repeat("⭐", $rating);
                                        echo str_repeat("☆", 5 - $rating);
                                    ?>
                                </div>

                                <p><?php echo htmlspecialchars($item['description']); ?></p>
                                <p class="price">₹<?php echo number_format($item['price'], 2); ?></p>

                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'user') { ?>
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                        <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($item['item_name']); ?>">
                                        <input type="hidden" name="price" value="<?php echo $item['price']; ?>">

                                        <button type="submit" name="add_to_cart" class="btn btn-add w-100">
                                            Add to Cart
                                        </button>
                                    </form>
                                <?php } else { ?>
                                    <a href="user_login.php" class="btn btn-add w-100">Login to Add</a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

        <?php } ?>
    <?php } else { ?>
        <p class="text-center">No menu items available for this hotel.</p>
    <?php } ?>

</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Fly To Cart Animation -->
<script>
function flyToCart(img, cart) {
    const imgRect = img.getBoundingClientRect();
    const cartRect = cart.getBoundingClientRect();
    const fly = img.cloneNode(true);

    fly.style.position = 'fixed';
    fly.style.left = imgRect.left + 'px';
    fly.style.top = imgRect.top + 'px';
    fly.style.width = imgRect.width + 'px';
    fly.style.height = imgRect.height + 'px';
    fly.style.transition = 'all 0.8s cubic-bezier(.65,.05,.36,1)';
    fly.style.zIndex = 9999;

    document.body.appendChild(fly);

    requestAnimationFrame(()=> {
        fly.style.left = cartRect.left + 'px';
        fly.style.top = cartRect.top + 'px';
        fly.style.width = '20px';
        fly.style.height = '20px';
        fly.style.opacity = '0';
        fly.style.transform = 'rotate(35deg)';
    });

    setTimeout(()=> fly.remove(), 900);
}

document.querySelectorAll('.btn-add').forEach(btn => {
    btn.addEventListener('click', function() {
        const img = btn.closest('.card').querySelector('img');
        const cartIcon = document.querySelector('#cart-icon');
        if (img && cartIcon) flyToCart(img, cartIcon);
    });
});
</script>

</body>
</html>