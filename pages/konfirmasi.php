<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
    <link rel="stylesheet" href="../css/konfirmasi.css"> 
</head>

<header>
    <img src="../gambar/EEA Red.png" alt="logo">
    <div class="navbar">
        <div class="link">
            <a href="home.php"><h4>Home</h4></a>
            <a href="jadwal.php"><h4>Jadwal Lapangan</h4></a>
            <div class="garis"></div>
            <a href="register.php"><h4>Register</h4></a>
        </div>

        <div class="login"><a href="login.php"><h4>Log in</h4></a></div>  
    </div>    
</header>

<body>
    <div class="confirmation-container">
        <h1>Periksa Pemesanan Anda</h1>
        <div class="details-box">
            <div class="details-top">
                <h3>Lapangan Futsal Sutoyo</h3>
                <span>Rp 90.000</span>
            </div>
            <div class="details-bottom">
                <p>1 Agustus 2025</p>
                <p>08.00 - 09.00</p>
            </div>
        </div>
    </div>

<div class="button-group">
    <button type="submit" id="confirm-booking-button" class="confirm-button">
        <p>Konfirmasi Pemesanan</p>
    </button>
    <a href="home.php" class="cancel-link">
        <button type="button" class="cancel-button"> 
            <p>Batalkan</p>
        </button>
    </a>
</div>

<script src="../js/konfirmasi.js"></script>
</body>
</html>