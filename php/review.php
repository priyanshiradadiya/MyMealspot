<?php include 'navbar.php'; 
 include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Reviews | Cafe & Restro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: #fffaf3;
      font-family: 'Poppins', sans-serif;
      color: #4b3621;
      overflow-x: hidden;
    }
    .review-section {
      padding: 80px 0;
      background: linear-gradient(180deg, #fffaf3, #f9efe1);
      text-align: center;
    }
    .review-section h1 {
      font-weight: 700;
      font-size: 2.8rem;
      color: #5c3d2e;
      margin-bottom: 10px;
    }
    .review-section p {
      color: #7b5c4b;
      margin-bottom: 40px;
    }
    .review-card {
      background: #fff;
      border: none;
      border-radius: 20px;
      padding: 25px;
      margin: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .review-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
    }
    .review-card img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
      border: 3px solid #d9b88f;
    }
    .review-name { font-weight: 600; font-size: 1.1rem; color: #5b3b28; }
    .review-stars { color: #ffb300; margin-bottom: 10px; }
    .review-text { color: #7b5c4b; font-size: 0.95rem; }
    .btn-feedback {
      margin-top: 40px;
      background: #6b3e22;
      color: #fff;
      padding: 12px 30px;
      border-radius: 50px;
      text-decoration: none;
      transition: 0.3s;
    }
    .btn-feedback:hover { background: #8c5530; color: #fff; }
    @keyframes fadeInUp {
      from {opacity: 0; transform: translateY(30px);}
      to {opacity: 1; transform: translateY(0);}
    }
    .review-card { animation: fadeInUp 0.8s ease forwards; }
  </style>
</head>
<body>

<section class="review-section">
  <div class="container">
    <h1>What Our Guests Say</h1>
    <p>Every meal tells a story — here’s what our customers experienced at our partner restaurants.</p>
    <div class="row justify-content-center">

      <?php
      $result = mysqli_query($conn, "SELECT * FROM feedback ORDER BY id DESC");
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
          <div class="col-md-4">
            <div class="review-card">
              <img src="https://i.pravatar.cc/80?u='.$row['id'].'" alt="User">
              <div class="review-name">'.htmlspecialchars($row['name']).'</div>
              <div class="review-stars">'.str_repeat("★", $row['rating']).str_repeat("☆", 5 - $row['rating']).'</div>
              <div class="review-text">'.htmlspecialchars($row['message']).'</div>
            </div>
          </div>';
        }
      } else {
        echo "<p>No feedback yet. Be the first to share your experience!</p>";
      }
      ?>

    </div>
    <a href="feedback.php" class="btn-feedback">Give Your Feedback</a>
  </div>
</section>
<footer style="
    background-color: #4a2c17;
    color: white;
    text-align: center;
    padding: 25px;
    margin-top: 80px;
">
    © 2025 MyMealSpot | All Rights Reserved
</footer>

</body>
</html>
