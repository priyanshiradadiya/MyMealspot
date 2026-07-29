<?php
session_start();
require 'connection.php'; // Must contain $conn = mysqli_connect(...)


$error = '';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user details by email
    $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Compare plain passwords
        // after fetching $user from DB (where $user['password'] contains hashed password)
        if (password_verify($password, $user['password'])) {
        // password ok
        $_SESSION['role'] = 'user';
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: home.php");
    exit;
} else {
    $error = "Invalid password!";
}

    } else {
        $error = "⚠ No account found with this email!";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login - Cafe & Restro</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <style>
        body { margin: 0; padding: 0; }

        .login-box {
            background: rgba(0,0,0,0.7);
            padding: 35px;
            border-radius: 15px;
            max-width: 400px;
            margin: 100px auto;
            color: #fff;
            box-shadow: 0 8px 25px rgba(0,0,0,0.6);
            position: relative;
            z-index: 2;
        }

        .login-box h2 {
            margin-bottom: 20px;
            font-weight: 600;
            color: #ffc107;
        }

        input, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: none;
            outline: none;
        }

        button {
            margin-top: 10px;
            font-weight: 600;
            cursor: pointer;
            background-color: #30475ea5;
            color: #fff;
            transition: 0.3s;
        }

        button:hover {
            background-color: #222831ac;
        }

        .error {
            background: #ff4c4c;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            text-align: center;
        }

        .link a {
            color: #75cfb8;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- ✨ Background Video -->
<video autoplay muted loop playsinline style="
    position: fixed; top: 0; left: 0;
    width: 100%; height: 100%;
    object-fit: cover; z-index: -1;">
    <source src="homev.mp4" type="video/mp4">
</video>

<!-- Dark Overlay -->
<div style="
    position: fixed; top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.4); z-index:1;">
</div>

<div class="login-box text-center">
    <h2>User Login</h2>

    <?php if ($error) echo "<div class='error'>$error</div>"; ?>

    <form method="post">
        <input type="email" name="email" placeholder="Enter your Email" required>
        <input type="password" name="password" placeholder="Enter your Password" required>

        <button type="submit" name="login">Login</button>
    </form>

    <div class="link mt-3">
        <p>Don't have an account? <a href="user_register.php">Register here</a></p>
    </div>
</div>

</body>
</html>
