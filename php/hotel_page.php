// AAAAAAAAAAAAAAAAAAAAAAAAAAA
<?php 
include 'navbar.php'; 
include 'connection.php'; 

$hotel_name = $_GET['hotel'] ?? "Selected Hotel";
$safe_name = htmlspecialchars($hotel_name, ENT_QUOTES, 'UTF-8');

// Example list of offers
$offers = [
    "50% Off Lunch every weekday",
    "Free dessert with every main course",
    "Weekend brunch special menu",
    "Happy hour from 5 PM to 7 PM"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
:root{
  --card: rgba(255, 255, 255, 0.56);
  --glass-border: rgba(0,0,0,0.1);
  --gold-1: #e9c07a;
  --gold-2: #b9883f;
  --accent: #000000;
}

*{ box-sizing:border-box; }

/* BODY & BACKGROUND */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    color: #0b0b0b;
    /* Clean gradient background */
    background-size: cover;
    background-image: url("main_image.jpg");
}

a{ color:inherit; text-decoration:none; }

/* MAIN CONTAINER */
.container-sec {
  width: 92%;
  max-width: 1100px;
  margin:100px auto 60px;
  display: grid;
  grid-template-columns: 1fr 340px;
  gap: 25px;
}

/* LEFT MAIN CARD */
.card-glass{
  background:var(--card);
  border:1px solid var(--glass-border);
  border-radius:16px;
  padding:26px;
  box-shadow:0 18px 50px rgba(0,0,0,0.15);
  backdrop-filter:blur(12px);
}

.title{
  font-size:29px;
  font-weight:700;
}
.sub{ font-size:14px; }

.meta{ display:flex; gap:10px; margin-top:10px; }

.pill{
  background:linear-gradient(90deg,var(--gold-1),var(--gold-2));
  padding:6px 12px;
  border-radius:8px;
  font-weight:700;
  color:#1a1a1a;
}

.status{
  margin-top:12px;
  font-weight:700;
}

.action-btn{
  margin-top:16px;
  padding:10px 14px;
  border-radius:10px;
  background:rgba(0,0,0,0.04);
  color:var(--accent);
  border:1px solid var(--glass-border);
  display:inline-flex;
  align-items:center;
  gap:6px;
  margin-right:10px;
  transition:0.3s;
}
.action-btn:hover{ background:rgba(0,0,0,0.1); transform:translateY(-4px); }

/* RIGHT SIDEBAR */
.right-col {
  display: flex;
  flex-direction: column;
  gap: 18px;
}
.small-card{
  background:rgba(255, 255, 255, 0.56);
  border:1px solid var(--glass-border);
  padding:18px;
  border-radius:12px;
  transition:0.3s;
}
.small-card:hover{
  transform:translateY(-6px);
  box-shadow:0 12px 35px rgba(0,0,0,0.15);
}

.gold-cta{
  display:inline-block;
  background:linear-gradient(90deg,var(--gold-1),var(--gold-2));
  padding:10px 16px;
  border-radius:10px;
  color:#1a1a1a;
  font-weight:700;
  margin-top:8px;
  transition:0.3s;
}
.gold-cta:hover{
  transform:scale(1.08);
  box-shadow:0 8px 20px rgba(233,192,122,0.45);
}

.qr{
  width:130px;
  height:130px;
  margin-top:12px;
  border-radius:12px;
}

/* OFFERS SECTION */
.offers-section{
  width:92%;
  max-width:1100px;
  margin:50px auto;
}
.offers-section h3{
  margin-bottom:20px;
  font-weight:700;
  font color: #fff;
  text-align:center;
}
.offers-grid{
  display:grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap:20px;
}
.offer-card{
  background: linear-gradient(135deg, #fdf6e3, #f0e2c7);
  border-radius:16px;
  padding:20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
  transition:0.3s;
  text-align:center;
  font-weight:600;
}
.offer-card:hover{
  transform:translateY(-5px);
  box-shadow: 0 12px 35px rgba(0,0,0,0.15);
  background: linear-gradient(135deg, #fbe7b1, #f0c27b);
}

/* FOOTER */
.site-foot{
  margin-top:40px;
  text-align:center;
  padding:26px 0;
  color:var(--accent);
  border-top:1px solid rgba(0,0,0,0.06);
}

/* RESPONSIVE */
@media(max-width:1000px){ .container-sec{ grid-template-columns:1fr; } }
@media(max-width:768px){ .hero { height:300px; } }
</style>
</head>

<body>


<main class="container-sec">

  <!-- LEFT main card -->
  <section class="card-glass">
    <div class="title"><?= $safe_name ?></div>
    <div class="sub">Fine Dining · Modern Cuisine · Family Friendly</div>

    <div class="meta">
      <div class="pill">⭐ 4.5</div>
      <div class="sub">1.8k reviews</div>
    </div>

    <div class="status">Open • Closes 11 PM</div>

    <a class="action-btn" href="tables.php?hotel=<?= urlencode($hotel_name) ?>">📅 Book Table</a>
    <a class="action-btn" href="menu.php?hotel=<?= urlencode($hotel_name) ?>">📜 Menu</a>

    <p style="margin-top:18px;line-height:1.65;">
      Enjoy premium-quality dishes, warm ambience and a comfortable dining space. 
      Perfect for family dinners, celebrations & casual meals.
    </p>
    
  </section>

  <!-- RIGHT Sidebar -->
  <aside class="right-col">
    <div class="small-card">
      <h4>Reserve</h4>
      <p>• Instant Confirmation</p>
      <a class="gold-cta" href="tables.php?hotel=<?= urlencode($hotel_name) ?>">Reserve Now</a>
    </div>

    <div class="small-card">
      <h4>Menu</h4>
      <p>Explore complete menu</p>
      <a class="gold-cta" href="menu.php?hotel=<?= urlencode($hotel_name) ?>">View Menu</a>
    </div>

    <div class="small-card">
      <h4>Download App</h4>
      <p>Scan QR</p>
      <img src="appscanner.jpg" class="qr" alt="App QR">
    </div>
  </aside>
</main>

<!-- OFFERS SECTION -->
<section class="offers-section">
  <h3>Special Offers</h3>
  <div class="offers-grid">
    <?php foreach($offers as $offer): ?>
      <div class="offer-card"><?= htmlspecialchars($offer, ENT_QUOTES) ?></div>
    <?php endforeach; ?>
  </div>
</section>

<footer class="site-foot">
  © <?= date("Y") ?> MyMealSpot — All Rights Reserved
</footer>

</body>
</html>
