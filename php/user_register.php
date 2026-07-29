<?php
session_start();
require 'connection.php'; // must set $conn = mysqli_connect(...)

// Ensure DB connection
if (!isset($conn) || !$conn) {
    die("Database connection missing.");
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Trim inputs
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $mobile   = trim($_POST['mobile'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Basic validation
    if ($username === '' || $email === '' || $mobile === '' || $password === '') {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // Check if email already exists using prepared statement
        $checkStmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkRes = $checkStmt->get_result();

        if ($checkRes && $checkRes->num_rows > 0) {
            $error = "Email already registered. Try logging in.";
        } else {
            // Hash the password securely
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert user using prepared statement
            $insertStmt = $conn->prepare("INSERT INTO user (username, email, mobile, password) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param("ssss", $username, $email, $mobile, $hashed_password);

            if ($insertStmt->execute()) {
                // Registration successful -> redirect to login
                // Optionally you can set a flash message in session before redirecting
                $_SESSION['register_success'] = "Registration successful. Please login.";
                header("Location: user_login.php");
                exit;
            } else {
                $error = "Something went wrong while creating your account. Please try again.";
            }
            $insertStmt->close();
        }

        $checkStmt->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Registration - Cafe & Restro</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: url('main_image.jpg') no-repeat center center fixed; background-size: cover; margin: 0; color: #fff; }
        .register-card { background: rgba(0,0,0,0.65); max-width: 420px; margin: 90px auto; padding: 36px 28px; border-radius: 18px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.4); backdrop-filter: blur(4px); z-index: 2; position: relative; }
        h2 { color: #ffdd59; font-weight: 700; margin-bottom: 18px; text-shadow: 1px 1px 5px rgba(0,0,0,0.6); }
        input { width: 100%; padding: 12px; margin-bottom: 14px; border-radius: 50px; border: none; outline: none; }
        .btn-register { width: 100%; padding: 12px; border-radius: 50px; border: none; font-weight: 600; cursor: pointer; background: linear-gradient(45deg,#fa9579,#e68b6e); color:#fff; }
        .btn-register:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.45); }
        .alert-success, .alert-error { border-radius: 10px; padding: 10px; margin-bottom: 12px; font-weight: 600; }
        .alert-success { background: #34c759; color: #fff; }
        .alert-error { background: #ff453a; color: #fff; }
        a.login-link { display:block; margin-top:12px; color:#75cfb8; text-decoration:none; font-weight:600; }
    </style>
</head>
<body>

<!-- background video (optional) -->
<video autoplay muted loop playsinline style="position:fixed;top:0;left:0;width:100%;height:100%;object-fit:cover;z-index:-1;">
    <source src="indexvv.mp4" type="video/mp4">
</video>
<div style="position: fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4); z-index:0;"></div>

<div class="register-card">
    <h2>Create Account</h2>

    <?php if (!empty($error)): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="post" autocomplete="off">
        <input type="text" name="username" placeholder="Username" required value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">
        <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
        <input type="text" name="mobile" placeholder="Mobile Number" required value="<?= isset($mobile) ? htmlspecialchars($mobile) : '' ?>">
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn-register">Register</button>
    </form>

    <a href="user_login.php" class="login-link">Already have an account? Login</a>
</div>

</body>
</html>
