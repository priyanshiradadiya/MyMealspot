<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top"
     style="background-color: #4a2c17; padding: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.2); z-index: 999;">
  <div class="container-fluid">

    <!-- LOGO (floating style like Belgian Waffle Co.) -->
    <a class="navbar-brand d-flex align-items-center" href="home.php"
       style="padding: 0 25px; position: relative; top: 30px; height: 50px;">
      <img src="logo.jpg" alt="MyMealSpot Logo"
           style="height: 150px; width: auto; object-fit: contain; transition: all 0.3s ease;">
    </a>

    <!-- TOGGLER (for mobile view) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation"
            style="margin-right: 15px;">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- NAVIGATION LINKS -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center" style="font-weight: 500; font-size: 17px; letter-spacing: 0.5px;">
        <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="cart.php">Cart 🛒</a></li>
        <li class="nav-item"><a class="nav-link" href="review.php">Reviews</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="d-flex align-items-center">
    <a href="user_options.php" 
      style="font-size: 1.2rem; text-decoration: none; background: #fff; color: #6b3e22; border-radius: 100%; padding: 7px 2px; height: 30px; width: 30px;">
       👤
    </a>
  </div>
  </div>
</nav>

<!-- Add some spacing so content doesn't hide behind navbar -->
<div style="margin-top: 60px;"></div>
