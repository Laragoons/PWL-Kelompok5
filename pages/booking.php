<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once '../config/db-connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$court_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$courts_images = [
    1 => '../gambar/futsalbooking.png',
    2 => '../gambar/basketbooking.png',
    3 => '../gambar/badminbooking.png',
    4 => '../gambar/volibooking.png'
];

$court_name = "Tidak Ditemukan";

$sql_details = "SELECT name FROM courts WHERE id = ?";
$stmt_details = mysqli_prepare($connection, $sql_details);
if ($stmt_details) {
    mysqli_stmt_bind_param($stmt_details, "i", $court_id);
    mysqli_stmt_execute($stmt_details);
    $result_details = mysqli_stmt_get_result($stmt_details);
    if ($court_data = mysqli_fetch_assoc($result_details)) {
        $court_name = htmlspecialchars($court_data['name']);
    }
    mysqli_stmt_close($stmt_details);
}

$court_image = $courts_images[$court_id] ?? $courts_images[1];

$min_date = date('Y-m-d');
$max_date = date('Y-m-d', strtotime('+6 days'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan <?php echo $court_name; ?></title>
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<header>
    <img src="../gambar/EEA Red.png" alt="logo">
    <div class="navbar">
        <div class="link">
            <a href="home.php"><h4>Home</h4></a>
            <div class="dropdown"> 
                <a href="#" class="dropdown-toggle"> 
                    <h4>Jadwal Lapangan</h4>
                </a>
                <ul class="dropdown-menu"> 
                    <li><a href="jadwal.php?id=1">Jadwal Futsal</a></li>
                    <li><a href="jadwal.php?id=2">Jadwal Basket</a></li>
                    <li><a href="jadwal.php?id=3">Jadwal Badminton</a></li>
                    <li><a href="jadwal.php?id=4">Jadwal Voli</a></li>
                </ul>
            </div>

            <?php if (!isset($_SESSION['user_id'])): ?>
                <div class="garis"></div>
                <a href="register.php"><h4>Register</h4></a>
            <?php endif; ?>
        </div>
        
        <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="login">
                <a href="login.php"><h4>Log in</h4></a>
            </div>
        <?php else: ?>
            <div class="login"> 
                <a href="../db-pages/logout.php"><h4>Logout</h4></a> 
            </div>
        <?php endif; ?>
    </div>
</header>

<body>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div style="color: red; padding: 10px; border: 1px solid red; margin: 20px auto; max-width: 1160px; text-align: center; background-color: #ffebee;">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <main class="content-container">
        <h1 class="page-title">Lapangan <?php echo $court_name; ?></h1>

        <div class="futsal-court-image">
            <img src="<?php echo $court_image; ?>" alt="Lapangan <?php echo $court_name; ?>">
        </div>

        <form action="konfirmasi.php" method="POST" class="booking-form">

            <input type="hidden" name="court_id" value="<?php echo $court_id; ?>">
            
            <div class="form-row">
                <div class="form-group time-group">
                    <label for="jam_mulai">Jam Mulai:</label>
                    <select id="jam_mulai" name="jam_mulai" required>
                        <option value="" disabled selected>Pilih Jam</option>
                        <option value="07:00">07:00</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group time-group">
                    <label for="jam_selesai">Jam Selesai:</label>
                    <select id="jam_selesai" name="jam_selesai" required>
                        <option value="" disabled selected>Pilih Jam</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                        <option value="00:00">00:00</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group date-group">
                    <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
                    <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan" min="<?php echo $min_date; ?>" max="<?php echo $max_date; ?>" value="<?php echo $min_date; ?>" required>
                </div>
            </div>

            <div class="form-row submit-row">
                <button type="submit" class="submit-button">Booking</button>
            </div>
        </form>
    </main>

    <footer>
        <div class="footeratas">
            <div class="footeratas1">
                <div class="logofooter">
                    <img src="../gambar/EAA White.png" alt="logo">
                </div>
                <div class="footer1">
                    <p>Our vision is to provide the best court service for you.</p>
                </div>
                <div class="medsos">
                    <img src="../gambar/Facebook.png" alt="Facebook">
                    <img src="../gambar/Twitter.png" alt="Twitter">
                    <img src="../gambar/Instagram.png" alt="Instagram">
                </div>
            </div>
            <div class="footeratas2">
                <div class="social">
                    <h3>Socials</h3>
                    <p>Discord</p>
                    <p>Instagram</p>
                    <p>Twitter</p>
                    <p>Facebook</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="footerbawah">
            <div class="footerbawah1">
                <p>©2022 EAASPORTSTIME. All rights reserved</p>
            </div>
        </div>
    </footer>

    <script src="../js/home.js"></script>
</body>
</html>