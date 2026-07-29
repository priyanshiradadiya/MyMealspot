<?php
include "connection.php";

$name  = $_POST['name'];
$date  = $_POST['date'];
$time  = $_POST['time'];
$phone = $_POST['phone'];
$table = $_POST['table'];
$seats = $_POST['seats'];

mysqli_query($conn, 
"INSERT INTO table_booking (user_id, table_no, table_type, guests, booking_date, booking_time)
 VALUES (1,'$table','$seats','1','$date','$time')");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booking Success</title>

<style>
body{
    margin:0;
    font-family:Poppins, sans-serif;
    background:#2b1f17;
    overflow:hidden;
}

/* Background wave */
.bg{
    position:absolute;
    width:180%;
    height:300px;
    background:linear-gradient(140deg,#7a5639,#d8b48a,#7c5c42);
    top:-70px;
    left:-40%;
    border-radius:55%;
    filter:blur(70px);
    animation:wave 7s infinite alternate ease-in-out;
    opacity:.6;
}
@keyframes wave{
    from{transform:translateY(0);}
    to{transform:translateY(60px);}
}

/* Floating blur */
.orb{
    position:absolute;
    width:280px;
    height:280px;
    border-radius:50%;
    background:rgba(255,220,170,0.18);
    filter:blur(75px);
    animation:float 8s infinite alternate ease;
}
.o1{top:40px; left:-60px;}
.o2{bottom:-120px; right:-70px; animation-delay:1.7s;}

@keyframes float{
    0%{transform:translate(0);}
    100%{transform:translate(70px,60px);}
}

/* Success Card */
.card{
    position:absolute;
    top:50%; left:50%;
    transform:translate(-50%, -50%) scale(0.6);
    width:80%;
    max-width:400px;
    padding:35px;
    border-radius:25px;
    background:rgba(255,255,255,0.14);
    backdrop-filter:blur(16px);
    border:1px solid rgba(255,255,255,0.25);
    box-shadow:0 20px 50px rgba(0,0,0,0.45);
    text-align:center;
    opacity:0;
    animation:popIn .30s ease forwards;
}
@keyframes popIn{
    to{
        transform:translate(-50%,-50%) scale(1);
        opacity:1;
    }
}

h1{
    color:#ffe9c5;
    font-size:28px;
    margin-bottom:10px;
}

p{
    color:#e3d5c6;
    font-size:15px;
}

/* Checkmark Circle */
.check{
    width:100px;
    height:100px;
    border-radius:50%;
    background:linear-gradient(145deg,#eac898,#b89263);
    margin:0 auto 18px auto;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 0 30px rgba(234,200,152,0.65);
    animation:pop .6s ease;
}
@keyframes pop{
    from{transform:scale(.4); opacity:.5;}
    to{transform:scale(1); opacity:1;}
}

.check i{
    font-size:45px;
    color:#3b2a21;
}

/* Redirect text */
.redirect{
    margin-top:18px;
    color:#cbb8a8;
    font-size:14px;
}

/* Confetti Animation */
.confetti{
    position:absolute;
    width:8px;
    height:14px;
    background:gold;
    opacity:.85;
    animation:fall linear infinite;
    top:-20px;
}
@keyframes fall{
    to{transform:translateY(110vh) rotate(360deg);}
}
</style>

</head>

<body>

<div class="bg"></div>
<div class="orb o1"></div>
<div class="orb o2"></div>

<!-- Confetti Generator -->
<script>
for(let i=0; i<35; i++){
    let c=document.createElement("div");
    c.className="confetti";
    c.style.left=Math.random()*100+"vw";
    c.style.animationDuration= (2 + Math.random()*3)+"s";
    c.style.background = ["#eac898","#f5d8a8","#d4a66b"][Math.floor(Math.random()*3)];
    document.body.appendChild(c);
}
</script>

<div class="card">
    <div class="check"><i>✔</i></div>
    <h1>Booking Successful!</h1>
    <p>Your table has been reserved with<br>premium Dineout experience.</p>

    <div class="redirect">Redirecting back…</div>
</div>

<script>
setTimeout(() => {
    window.location.href = "tables.php";
}, 3000);
</script>

</body>
</html>