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

    footer {
      background-color: #4a2c17;
      color: white;
      text-align: center;
      padding: 25px;
      margin-top: 60px;
    }
  </style>
</head>
<body>

  <!-- Include Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- Hero Section -->
  <div class="contact-hero">
    <h1>Contact MyMealSpot</h1>
    <p>We’d love to hear from you ❤️</p>
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

  <!-- Footer -->
  <footer>
    <p>© 2025 MyMealSpot | All Rights Reserved</p>
  </footer>

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
