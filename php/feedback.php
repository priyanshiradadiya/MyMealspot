<?php include 'navbar.php'; ?>
<?php include 'connection.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback (name, rating, message) VALUES ('$name', '$rating', '$message')";
    mysqli_query($conn, $sql);

    echo "<script>
      alert('Thank you for your feedback!');
      window.location='review.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback | Cafe & Restro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(180deg, #fffaf3, #f7e9d5);
      color: #4b3621;
      overflow-x: hidden;
    }

    .feedback-section {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 50px 20px;
    }

    .feedback-card {
      background: #fff;
      border-radius: 25px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      padding: 40px;
      max-width: 550px;
      width: 100%;
      text-align: center;
      animation: fadeInUp 1s ease forwards;
    }

    .feedback-card h2 {
      color: #5c3d2e;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .feedback-card p {
      color: #7b5c4b;
      margin-bottom: 30px;
    }

    form input, form select, form textarea {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 1px solid #d3b89e;
      border-radius: 12px;
      font-size: 0.95rem;
      background: #fff9f3;
      transition: 0.3s;
    }

    form input:focus, form select:focus, form textarea:focus {
      border-color: #8c5530;
      box-shadow: 0 0 8px rgba(139, 85, 48, 0.3);
      outline: none;
    }

    textarea {
      height: 120px;
      resize: none;
    }

    .star-rating {
      display: flex;
      justify-content: center;
      gap: 5px;
      margin-bottom: 20px;
      cursor: pointer;
      font-size: 1.5rem;
      color: #d4b295;
    }

    .star-rating span:hover,
    .star-rating span.active {
      color: #ffb300;
      transform: scale(1.2);
      transition: 0.2s;
    }

    button[type="submit"] {
      background: #6b3e22;
      color: #fff;
      border: none;
      padding: 12px 35px;
      border-radius: 50px;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
      font-weight: 600;
    }

    button[type="submit"]:hover {
      background: #8c5530;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    @keyframes fadeInUp {
      from {opacity: 0; transform: translateY(40px);}
      to {opacity: 1; transform: translateY(0);}
    }

    @keyframes glow {
      0% { box-shadow: 0 0 5px #f5c396; }
      50% { box-shadow: 0 0 20px #f5c396; }
      100% { box-shadow: 0 0 5px #f5c396; }
    }

    .emoji {
      font-size: 3rem;
      animation: glow 2s infinite ease-in-out;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<section class="feedback-section">
  <div class="feedback-card">
    <div class="emoji">☕</div>
    <h2>Share Your Experience</h2>
    <p>Your words help us grow better every day!</p>

    <form method="POST">
      <input type="text" name="name" placeholder="Your Name" required>

      <div class="star-rating" id="starRating">
        <span data-value="1">★</span>
        <span data-value="2">★</span>
        <span data-value="3">★</span>
        <span data-value="4">★</span>
        <span data-value="5">★</span>
      </div>
      <input type="hidden" name="rating" id="rating" value="5">

      <textarea name="message" placeholder="Write your feedback..." required></textarea>
      <button type="submit">Submit Feedback</button>
    </form>
  </div>
</section>

<script>
  const stars = document.querySelectorAll('#starRating span');
  const ratingInput = document.getElementById('rating');

  stars.forEach(star => {
    star.addEventListener('click', () => {
      stars.forEach(s => s.classList.remove('active'));
      star.classList.add('active');
      ratingInput.value = star.getAttribute('data-value');
    });
  });
</script>

</body>
</html>
