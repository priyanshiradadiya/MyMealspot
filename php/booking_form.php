<?php
$seats = $_GET['seats'];
$table = $_GET['table'];
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking</title>

<style>
body{
    margin:0;
    background:#2b1f17;
    font-family:Poppins;
    margin-top: 100px;
    overflow-x:hidden;
}

/* BG */
.bg{
    position:absolute;
    width:165%;
    height:100px;
    background:linear-gradient(140deg,#7a5639,#d8b48a,#7c5c42);
    top:-10px;
    left:-35%;
    border-radius:45%;
    filter:blur(60px);
    animation:wave 7s infinite alternate ease;
}
@keyframes wave{
    0%{transform:translateY(0);}
    100%{transform:translateY(55px);}
}

/* Header */
.header{
    padding:25px;
    font-size:26px;
    font-weight:700;
    color:#f8e9d0;
}

/* Form */
.card{
    margin:25px;
    padding:28px;
    border-radius:25px;
    background:rgba(255,255,255,0.13);
    backdrop-filter:blur(15px);
    box-shadow:0 12px 35px rgba(0,0,0,0.45);
}

.inp{
    width:90%;
    padding:14px;
    border-radius:15px;
    border:none;
    margin:10px 0;
    background:rgba(255,255,255,0.2);
    color:#fff;
    font-size:16px;
}
.inp::placeholder{color:#e6d6c6;}

.btn{
    padding:15px;
    width:95%;
    border-radius:18px;
    border:none;
    background:linear-gradient(135deg,#eac898,#b89263);
    font-size:18px;
    font-weight:700;
    color:#3b2a21;
    cursor:pointer;
    transition:.3s;
}
.btn:hover{
    transform:scale(1.07);
}
</style>

</head>

<body>

<div class="bg"></div>

<div class="header">Table <?= $table ?> (<?= $seats ?> seats)</div>

<form class="card" action="submit_booking.php" method="POST">

<input type="hidden" name="table" value="<?= $table ?>">
<input type="hidden" name="seats" value="<?= $seats ?>">

<input class="inp" name="name" placeholder="Your Name" required>
<input class="inp" type="date" name="date" required>
<input class="inp" type="time" name="time" required>
<input class="inp" name="phone" placeholder="Phone Number" required>

<button class="btn">Confirm Booking</button>

</form>

</body>
</html>