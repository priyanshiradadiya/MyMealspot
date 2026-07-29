<?php
session_start();
include 'header.php';
require 'connection.php';

// Only logged-in users with 'user' role can access cart
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: user_options.php');
    exit;
}

$loginError = "";
if (isset($_GET['error']) && $_GET['error'] === 'loginfirst') {
    $loginError = "Please login first!";
}

// Initialize cart array if not present
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/*
 * 1) Handle Add to Cart (from menu.php)
 *    Expected POST fields: add_to_cart, item_id, item_name, price, (optional) table_number
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item_id = isset($_POST['item_id']) ? (int)$_POST['item_id'] : 0;
    $item_name = isset($_POST['item_name']) ? trim($_POST['item_name']) : '';
    $price = isset($_POST['price']) ? (float)$_POST['price'] : 0.0;

    if ($item_id > 0) {
        if (isset($_SESSION['cart'][$item_id])) {
            // increment quantity
            $_SESSION['cart'][$item_id]['qty'] = (int)$_SESSION['cart'][$item_id]['qty'] + 1;
        } else {
            // add new item
            $_SESSION['cart'][$item_id] = [
                'name' => $item_name,
                'price' => $price,
                'qty' => 1
            ];
        }
    }

    // If table_number provided (QR flow), persist it in session
    if (!empty($_POST['table_number'])) {
        $_SESSION['table_number'] = htmlspecialchars(trim($_POST['table_number']));
    }

    // redirect to avoid re-posting on refresh
    header('Location: cart.php');
    exit;
}

/*
 * 2) Handle Update Cart quantities (form with qty[])
 *    Expected POST fields: update_cart, qty[<item_id>] => numeric
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    if (isset($_POST['qty']) && is_array($_POST['qty'])) {
        foreach ($_POST['qty'] as $mid => $q) {
            $mid = (int)$mid;
            $q = (int)$q;
            if ($mid <= 0) continue;
            if ($q <= 0) {
                // remove item if quantity set to 0
                unset($_SESSION['cart'][$mid]);
            } else {
                // update qty safely
                if (isset($_SESSION['cart'][$mid])) {
                    $_SESSION['cart'][$mid]['qty'] = $q;
                } else {
                    // If somehow cart missing this item, create entry (defensive)
                    $_SESSION['cart'][$mid] = [
                        'name' => '',
                        'price' => 0.0,
                        'qty' => $q
                    ];
                }
            }
        }
    }
    header('Location: cart.php');
    exit;
}

/*
 * 3) Remove single item via POST remove_item
 *    Expected POST field: remove_item = item_id
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $rem = (int)$_POST['remove_item'];
    if ($rem > 0 && isset($_SESSION['cart'][$rem])) {
        unset($_SESSION['cart'][$rem]);
    }
    header('Location: cart.php');
    exit;
}

/*
 * 4) Clear cart via GET action=clear
 */
if (isset($_GET['action']) && $_GET['action'] === 'clear') {
    unset($_SESSION['cart']);
    // optionally keep table_number if you want; currently clearing cart only
    header('Location: cart.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Your Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body {
          font-family: 'bold', shrikhand, sans-serif;
          background-image: url("main_image.jpg");
          background-size: cover;
          min-height: 100vh;
          margin-top: 20px;
          padding: 80px;
          color: #0b0b0bff;
      }
      .cart-container {
          background: rgba(255, 255, 255, 0.4);
          padding: 80px;
          border-radius: 15px;
          max-width: 900px;
          margin: 40px auto;
          box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      }
      table { border-radius: 10px; overflow: hidden; }
      th { background: #343a40; color: #ffffff70; }
      td { vertical-align: middle; }
      .btn-custom { border-radius: 50px; padding: 8px 25px; font-family: 'bold', shrikhand; font-weight: 500; transition: all 0.3s; }
      .btn-remove { background-color: #e74c3c; color: #fff; border: none; }
      .btn-remove:hover { background-color: #c0392b; }
      .btn-update { background-color: #3498db; color: #fff; border: none; }
      .btn-update:hover { background-color: #2980b9; }
      .btn-clear { background-color: #f1c40f; color: #fff; border: none; }
      .btn-clear:hover { background-color: #d4ac0d; }
      .btn-checkout { background-color: #2ecc71; color: #fff; border: none; }
      .btn-checkout:hover { background-color: #27ae60; }
      input[type=number] { width: 80px; text-align: center; }
  </style>
</head>
<body>
<div class="cart-container">
  <h2 class="mb-4">Your Cart</h2>
  <?php if (!empty($loginError)): ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
    <div class="toast show text-bg-danger border-0">
        <div class="d-flex">
            <div class="toast-body">
                <?= $loginError ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>
<?php endif; ?>

  <?php if (empty($_SESSION['cart'])): ?>
      <p>Your cart is empty. <a href="menu.php" class="text-decoration-none">Go to Menu</a></p>
  <?php else: ?>
  <form method="post">
    <table class="table table-bordered text-center align-middle">
      <thead>
        <tr>
          <th>Item</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php
        $grand = 0;
        $cart_keys = array_keys($_SESSION['cart']);
        // protect against SQL problems
        $ids = array_map('intval', $cart_keys);
        $ids_list = implode(',', $ids);

        $items = [];
        if (!empty($ids_list)) {
            $res = mysqli_query($conn, "SELECT * FROM menu WHERE id IN ($ids_list)");
            while ($r = mysqli_fetch_assoc($res)) $items[$r['id']] = $r;
        }

        foreach ($_SESSION['cart'] as $mid => $cartItem):
            $mid = (int)$mid;
            if (!isset($items[$mid])) {
                // item missing from DB—skip or show fallback
                continue;
            }
            $it = $items[$mid];
            $price = (float)$it['price'];
            $qty = isset($cartItem['qty']) ? (int)$cartItem['qty'] : 1;
            $sub = $price * $qty;
            $grand += $sub;
        ?>
        <tr>
          <td><?php echo htmlspecialchars($it['item_name']); ?></td>
          <td><input type="number" name="qty[<?php echo $mid; ?>]" value="<?php echo $qty; ?>" min="0"></td>
          <td>₹<?php echo number_format($price,2); ?></td>
          <td>₹<?php echo number_format($sub,2); ?></td>
          <td>
            <!-- Remove handled as POST with remove_item -->
            <button type="submit" name="remove_item" value="<?php echo $mid; ?>" class="btn btn-remove btn-custom btn-sm">Remove</button>
          </td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="3" class="text-end"><strong>Grand Total</strong></td>
          <td colspan="2"><strong>₹<?php echo number_format($grand,2); ?></strong></td>
        </tr>
      </tbody>
    </table>

    <div class="d-flex gap-2 mt-3">
      <button type="submit" name="update_cart" class="btn btn-update btn-custom">Update Cart</button>
      <a href="cart.php?action=clear" class="btn btn-clear btn-custom">Clear Cart</a>
      <a href="checkout.php" class="btn btn-checkout btn-custom ms-auto">Proceed to Checkout</a>
    </div>
  </form>
  <?php endif; ?>
</div>
</body>
</html>
