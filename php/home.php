<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyMealSpot | Home</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<?php
  $logoutSuccess = isset($_GET['logout']) && $_GET['logout'] === 'success';
  
    ?>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fffaf3;
      color: #4a2c17;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
      position: relative;
      height: 100vh;
      min-height: 100vh;
      width: 100vw;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0 !important;
    }
    .carousel,
    .carousel-inner,
    .carousel-item,
    .carousel-item video {
      height: 100vh;
      min-height: 100vh;
      width: 100vw;
      object-fit: cover;
    }
    .carousel-item video {
      background: #222;
    }
    .carousel-control-prev,
    .carousel-control-next {
      z-index: 3;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: #d4a373;
      border-radius: 50%;
      opacity: 0.93;
      width: 3rem; height: 3rem;
    }
    .hero-overlay {
      position: absolute;
      top: 0; left: 0; width: 100vw; height: 100vh;
      display: flex; 
      flex-direction: column; 
      justify-content: center; 
      align-items: center; 
      text-align: center;
      z-index: 2;
      pointer-events: none;
    }
    .hero-content {
      animation: fadeInUp 1.5s ease;
      background: rgba(34,34,34,0.34);
      padding: 2.5rem 1rem;
      border-radius: 28px;
      pointer-events: auto;
      color: #fff;
      text-shadow: 0 2px 18px rgba(0,0,0,0.21);
      margin: 0 auto;
      max-width: 600px;
    }
    .hero-content h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: #fff;
    }
    .hero-content p {
      font-size: 1.35rem;
      margin-top: 15px;
      color: #fff;
    }

    .btn-custom {
      background-color: #d4a373;
      color: #fff;
      border-radius: 30px;
      padding: 10px 25px;
      border: none;
      margin-top: 25px;
      font-weight: 600;
      transition: all 0.3s;
    }

    .btn-custom:hover {
      background-color: #fff;
      color: #4a2c17;
    }

    /* Hotel Section */
    .hotel-section {
      padding: 80px 0;
      background-color: #fffdf8;
    }

    .hotel-section h2 {
      text-align: center;
      font-weight: 700;
      color: #4a2c17;
      margin-bottom: 40px;
      text-transform: uppercase;
    }

    .hotel-card {
      overflow: hidden;
      border-radius: 20px;
      background: white;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
      transform: scale(1);
      transition: all 0.4s ease;
    }

    .hotel-card:hover {
      transform: scale(1.04);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .hotel-card video {
      width: 100%;
      height: 260px;
      object-fit: cover;
    }

    .hotel-card .p-3 {
      background: #fff;
    }

    /* Footer */
    footer {
      background-color: #4a2c17;
      color: white;
      text-align: center;
      padding: 25px;
      margin-top: 80px;
    }

    /* Animations */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .fade-in {
      opacity: 0;
      animation: fadeIn 1.5s ease forwards;
    }

    @media (max-width: 768px) {
      .hero-content h1 { font-size: 2rem; }
      .hero-content p { font-size: 1.06rem; }
      .carousel-control-prev-icon,
      .carousel-control-next-icon {
        width: 2rem; height: 2rem;
      }
    }
    @media (max-width: 576px) {
      .hero-content h1 { font-size: 1.25rem; }
      .hero-content p { font-size: 0.95rem; }
    }
  </style>
</head>
<body>
  <?php if ($logoutSuccess): ?>
<div id="logoutToast" style="
    position: fixed;
    top: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    z-index: 9999;
    font-weight: 600;
    display: none;
    animation: fadeInOut 3s ease-in-out;
">
    Logout Successfully ✔
</div>

<style>
@keyframes fadeInOut {
  0% { opacity: 0; transform: translateY(-20px); }
  10% { opacity: 1; transform: translateY(0); }
  90% { opacity: 1; transform: translateY(0); }
  100% { opacity: 0; transform: translateY(-20px); }
}
</style>

<script>
  // Show toast for 3 seconds
  const toast = document.getElementById("logoutToast");
  toast.style.display = "block";

  setTimeout(() => {
    toast.style.display = "none";
  }, 3000);
</script>
<?php endif; ?>
  
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>
  
<!-- HERO SECTION: Full Page Video Carousel, AUTOPLAY SCROLL -->
<section class="hero-section p-0" style="height:100vh;min-height:100vh;overflow:hidden;">
  <div id="videoCarousel" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="6000" data-bs-touch="true">
    <div class="carousel-inner h-100">
      <div class="carousel-item active h-100">
        <video class="d-block w-100 h-100" style="object-fit:cover;" autoplay muted loop playsinline>
          <source src="welcome.mp4" type="video/mp4">
        </video>
      </div>
      <div class="carousel-item h-100">
        <video class="d-block w-100 h-100" style="object-fit:cover;" autoplay muted loop playsinline>
          <source src="welcome1.mp4" type="video/mp4">
        </video>
      </div>
      <div class="carousel-item h-100">
        <video class="d-block w-100 h-100" style="object-fit:cover;" autoplay muted loop playsinline>
          <source src="welcome2.mp4" type="video/mp4">
        </video>
      </div>
      <div class="carousel-item h-100">
        <video class="d-block w-100 h-100" style="object-fit:cover;" autoplay muted loop playsinline>
          <source src="welcome3.mp4" type="video/mp4">
        </video>
      </div>
      <div class="carousel-item h-100">
        <video class="d-block w-100 h-100" style="object-fit:cover;" autoplay muted loop playsinline>
          <source src="welcome4.mp4" type="video/mp4">
        </video>
      </div>
      <div class="carousel-item h-100">
        <video class="d-block w-100 h-100" style="object-fit:cover;" autoplay muted loop playsinline>
          <source src="welcome5.mp4" type="video/mp4">
        </video>
      </div>
    </div>
    <!-- Navigation Arrows -->
    <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color:#d4a373;border-radius:50%;"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true" style="background-color:#d4a373;border-radius:50%;"></span>
      <span class="visually-hidden">Next</span>
    </button>
    <!-- Overlay Content -->
    <div style="
      position: absolute; 
      top: 0; left: 0; width: 100vw; height: 100vh; 
      display: flex; flex-direction: column; 
      justify-content: center; align-items: center; 
      text-align: center;
      z-index: 2;
      pointer-events: none;">
  </div>
</section>


  <!-- Hotel Video Section -->
  <section class="hotel-section container">
    <h2>Our Top 5 Locations</h2>

    <div class="row g-4">
      <!-- Hotel 1 -->
      <div class="col-md-4 fade-in">
        <a href="hotel_page.php?hotel=Amiras" style="text-decoration:none; color:inherit;">
        <div class="hotel-card">
          <video autoplay muted loop playsinline>
            <source src="Amiras.mp4" type="video/mp4">
          </video>
          <div class="p-3 text-center">
            <h5>Amiras</h5>
            <p>Taste the luxury of flavor.</p>
          </div>
        </div>
        </a>
      </div>

      <!-- Hotel 2 -->
      <div class="col-md-4 fade-in" style="animation-delay: 0.3s;">
        <a href="hotel_page.php?hotel=Amrutras" style="text-decoration:none; color:inherit;">
        <div class="hotel-card">
          <video autoplay muted loop playsinline>
            <source src="Amrutras.mp4" type="video/mp4">
          </video>
          <div class="p-3 text-center">
            <h5>Amrutras</h5>
            <p>Where every bite feels special.</p>
          </div>
        </div>
        </a>
      </div>

      <!-- Hotel 3 -->
      <div class="col-md-4 fade-in" style="animation-delay: 0.6s;">
        <a href="hotel_page.php?hotel=Navjivan" style="text-decoration:none; color:inherit;">
        <div class="hotel-card">
          <video autoplay muted loop playsinline>
            <source src="Navjivan.mp4" type="video/mp4">
          </video>
          <div class="p-3 text-center">
            <h5>Navjivan</h5>
            <p>Luxury dining reimagined.</p>
          </div>
        </div>
        </a>
      </div>

      <!-- Hotel 4 -->
      <div class="col-md-6 fade-in" style="animation-delay: 0.9s;">
        <a href="hotel_page.php?hotel=Pavillion" style="text-decoration:none; color:inherit;">
        <div class="hotel-card">
          <video autoplay muted loop playsinline>
            <source src="Pavillion.mp4" type="video/mp4">
          </video>
          <div class="p-3 text-center">
            <h5>Pavillion</h5>
            <p>Delightful taste with royal comfort.</p>
          </div>
        </div>
        </a>
      </div>

      <!-- Hotel 5 -->
      <div class="col-md-6 fade-in" style="animation-delay: 1.2s;">
        <a href="hotel_page.php?hotel=Spice Villa" style="text-decoration:none; color:inherit;">
        <div class="hotel-card">
          <video autoplay muted loop playsinline>
            <source src="Spice_villa.mp4" type="video/mp4">
          </video>
          <div class="p-3 text-center">
            <h5>Spice Villa</h5>
            <p>Modern luxury meets authentic flavor.</p>
          </div>
        </div>
       </a>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Fade-in on Scroll -->
  <script>
  const fadeEls = document.querySelectorAll('.fade-in');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if(entry.isIntersecting) {
        entry.target.style.animation = 'fadeInUp 1s ease forwards';
      }
    });
  }, { threshold: 0.2 });

  fadeEls.forEach(el => observer.observe(el));
  </script>
</body>
</html>
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
    <p>Where Taste Meets Love 🍽</p>
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


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | MyMealSpot</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #fffaf3;
      color: #4a2c17;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    /* Hero */
    .contact-hero {
      background: linear-gradient(rgba(74,44,23,0.7), rgba(74,44,23,0.7)),
                  url('contact-bg.jpg') center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 120px 20px 100px;
    }

    .contact-hero h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    /* Contact Section */
    .contact-section {
      padding: 80px 0;
    }

    .contact-section h2 {
      color: #d4a373;
      font-weight: 700;
      margin-bottom: 30px;
      text-transform: uppercase;
      text-align: center;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #d4a373;
      padding: 12px;
    }

    .btn-custom {
      background-color: #4a2c17;
      color: white;
      border-radius: 30px;
      padding: 10px 25px;
      border: none;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #d4a373;
      color: #4a2c17;
    }

    .contact-info {
      margin-top: 50px;
      text-align: center;
    }

    .contact-info h5 {
      color: #4a2c17;
      margin-bottom: 15px;
      font-weight: 600;
    }

    .contact-info p {
      color: #6a4b33;
      font-size: 1.1rem;
    }

  
  </style>
</head>
<body>

  <!-- Include Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Hero Section -->
  <div class="contact-hero">
    <h1>Contact MyMealSpot</h1>
    <p>We’d love to hear from you ❤</p>
  </div>

  <!-- Contact Section -->
  <section class="contact-section container">
    <h2>Get In Touch</h2>
    <div class="row justify-content-center">
      <!-- Contact Form -->
      <div class="col-md-6">
        <form id="contactForm">
          <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea class="form-control" id="message" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn-custom">Send Message</button>
        </form>

        <!-- Success Message -->
        <div id="successMessage" class="alert alert-success mt-4" style="display:none;">
          ✅ Your message has been sent successfully! We’ll get back to you soon.
        </div>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="contact-info">
      <h5>📍 Locate Us</h5>
      <p>

📍Head Office: B1 - 901,
Marathon Next Gen Complex,
Lower Parel (W),
Mumbai - 400013
<br></br>
📍Warehouse: Bloombay Enterprises Pvt. Ltd.,
Gupta Mills Estate,
Reay Road, Darukhana,
Mumbai- 400010</p>

      <h5>📞 Phone</h5>
      <p>+91 98765 43210</p>

      <h5>📧 Email</h5>
      <p>support@mymealspot.com</p>
    </div>
  </section>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Simple JS for form submission -->
  <script>
    document.getElementById("contactForm").addEventListener("submit", function(e) {
      e.preventDefault(); // stop real submission
      document.getElementById("successMessage").style.display = "block"; // show success
      this.reset(); // clear form fields
    });
  </script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyMealSpot | Visit Our App</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #fffaf3, #f7e9d5);
      overflow-x: hidden;
    }

    /* Floating shapes */
    .float-circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(212, 163, 115, 0.25);
      backdrop-filter: blur(6px);
      animation: float 6s infinite ease-in-out;
      z-index: 1;
    }

    .circle1 { width: 130px; height: 130px; top: 5%; left: 5%; }
    .circle2 { width: 180px; height: 180px; bottom: 10%; right: 8%; animation-delay: 1s; }
    .circle3 { width: 90px; height: 90px; bottom: 25%; left: 12%; animation-delay: 2s; }

    @keyframes float {
      0%   { transform: translateY(0px); }
      50%  { transform: translateY(-20px); }
      100% { transform: translateY(0px); }
    }

    /* QR Card */
    .qr-card {
      position: relative;
      z-index: 10;
      max-width: 450px;
      margin: 120px auto;
      padding: 40px 30px;
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(14px);
      border-radius: 25px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.15);
      animation: fadeIn 1.5s ease;
      text-align: center;
    }

    .qr-card h1 {
      color: #4a2c17;
      font-size: 2.4rem;
      font-weight: 700;
    }

    .qr-card p {
      margin-top: 10px;
      color: #6a4b33;
      font-size: 1.2rem;
    }

    /* QR Image */
    .qr-img {
      width: 220px;
      height: 220px;
      border-radius: 15px;
      margin-top: 30px;
      border: 4px solid #d4a373;
      animation: pop 1.7s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pop {
      0% { transform: scale(0.6); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    /* Button */
    .btn-custom {
      margin-top: 25px;
      background-color: #4a2c17;
      color: #fff;
      padding: 12px 28px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #d4a373;
      color: white;
    }

    footer {
      margin-top: 80px;
      text-align: center;
      color: #4a2c17;
      padding-bottom: 40px;
    }
  </style>
</head>
<body>

  <?php include 'navbar.php'; ?>


  <!-- Main QR Card -->
  <div class="qr-card">
    <h1>Scan & Visit Our App 📱</h1>
    <p>Your next delicious meal is just a scan away.</p>

    <!-- Replace qr.png with your actual QR code file -->
    <img src="appscanner.jpg" alt="QR Code" class="qr-img">

  </div>


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