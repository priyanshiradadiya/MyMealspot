<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | MyMealSpot</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #fffaf3;
      color: #4a2c17;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    /* Hero Section */
    .about-hero {
      background: linear-gradient(rgba(74,44,23,0.7), rgba(74,44,23,0.7)),
                  url('about-bg.jpg') center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 120px 20px 100px;
    }

    .about-hero h1 {
      font-size: 3rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .about-section {
      padding: 80px 0;
      text-align: center;
    }

    .about-section h2 {
      color: #d4a373;
      font-weight: 700;
      margin-bottom: 30px;
      text-transform: uppercase;
    }

    .about-section p {
      max-width: 900px;
      margin: auto;
      font-size: 1.1rem;
      line-height: 1.8;
    }

    /* Founders Section */
    .founders {
      background-color: #f9efe6;
      padding: 60px 0;
      text-align: center;
    }

    .founders h3 {
      color: #4a2c17;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .founder-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      padding: 25px;
      margin: 20px;
      transition: 0.3s;
    }

    .founder-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .founder-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 15px;
      object-fit: cover;
    }

    /* Footer */
    footer {
      background-color: #4a2c17;
      color: white;
      padding: 25px;
      text-align: center;
      margin-top: 60px;
    }
  </style>
</head>
<body>

  <!-- Include Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Hero Section -->
  <div class="about-hero">
    <h1>About MyMealSpot</h1>
    <p>Where Taste Meets Love 🍽️</p>
  </div>

  <!-- About Section -->
  <section class="about-section container">
    <h2>Our Story</h2>
    <p>
      MyMealSpot began with a simple idea — to bring joy to every meal. Inspired by the warmth of homemade flavors
      and the comfort of good company, our mission is to serve food that connects hearts. From quick bites to hearty meals,
      every dish we craft reflects passion, quality, and care.
    </p>
    <p>
      With a blend of traditional taste and modern flair, MyMealSpot is more than a restaurant — it’s a place to create
      delicious memories with friends, family, and loved ones.
    </p>
  </section>

  <!-- Founders Section -->
  <section class="founders">
    <div class="container">
      <h3>Our Founders</h3>
      <div class="row justify-content-center">
        <div class="col-md-3 founder-card">
          <img src="mitanshi1.jpg" alt="Founder 1">
          <h5>Ms. Mitanshi Babubhai Shihora</h5>
        </div>
        <div class="col-md-3 founder-card">
          <img src="rutu.jpg" alt="Founder 2">
          <h5>Ms. Rutu Ashokbhai Vaghasiya</h5>
        </div>
        <div class="col-md-3 founder-card">
          <img src="priyanshi.jpg" alt="Founder 3">
          <h5>Ms. Priyanshi Dipakbhai Radadiya</h5>
        </div>
        <div class="col-md-3 founder-card">
          <img src="nisha.jpg" alt="Founder 4">
          <h5>Ms. Nisha Maheshbhai Mangukiya </h5>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 MyMealSpot | All Rights Reserved</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
