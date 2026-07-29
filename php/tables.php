<?php $hotel = $_GET['hotel'] ?? 0; 
include 'header.php';?>

<!DOCTYPE html>
<html>
<head>
<title>Select Table</title>

<style>
body{
    margin:0;
    margin-top: 100px;
    font-family:Poppins;
    background:#2c1f16;
    overflow-x:hidden;
}

/* BG */
.bg{
    position:absolute;
    width:180%;
    height:200px;
    background:linear-gradient(145deg,#7a5639,#d8b48a,#7c5c42);
    top:-50px;
    left:-40%;
    border-radius:45%;
    filter:blur(60px);
    animation:wave 7s infinite alternate ease-out;
}
@keyframes wave{
    0%{transform:translateY(0);}
    100%{transform:translateY(50px);}
}

.header{
    padding:22px;
    font-size:26px;
    color:#f8e9d0;
    font-weight:700;
}

/* Card */
.card{
    margin:22px;
    padding:22px;
    border-radius:22px;
    background:rgba(255,255,255,0.14);
    backdrop-filter:blur(18px);
    box-shadow:0 12px 35px rgba(0,0,0,0.45);
}

/* Section title */
.sec{
    color:#ffe9c5;
    font-size:20px;
    margin-bottom:12px;
    font-weight:600;
}

/* Grid */
.grid{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

/* Table button */
.table-btn{
    width:85px;
    height:70px;
    border-radius:20px;
    background:linear-gradient(135deg,#eac898,#b89263);
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.5);
    cursor:pointer;
    transition:.3s;
}
.table-btn:hover{
    transform:scale(1.15) rotate(4deg);
}
.table-btn img{
    width:100px;
    filter:drop-shadow(0 0 8px #fff);
}
</style>

<script>
function go(seats, table){
    window.location.href = "booking_form.php?seats="+seats+"&table="+table;
}
</script>

</head>

<body>

<div class="bg"></div>

<div class="header">Choose a Table</div>

<div class="card">
<div class="sec">2 Seat Tables</div>
<div class="grid">
    <div class="table-btn" onclick="go(2,1)"><img src="table.png"></div>
    <div class="table-btn" onclick="go(2,2)"><img src="table.png"></div>
</div>
</div>

<div class="card">
<div class="sec">4 Seat Tables</div>
<div class="grid">
    <div class="table-btn" onclick="go(4,3)"><img src="table.png"></div>
    <div class="table-btn" onclick="go(4,4)"><img src="table.png"></div>
</div>
</div>

<div class="card">
<div class="sec">6 Seat Tables</div>
<div class="grid">
    <div class="table-btn" onclick="go(6,5)"><img src="table.png"></div>
    <div class="table-btn" onclick="go(6,6)"><img src="table.png"></div>
</div>
</div>

</body>
</html>