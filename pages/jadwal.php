<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once '../config/db-connection.php';

$court_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$courts_config = [
    1 => [
        'name' => 'Futsal',
        'image' => '../gambar/futsal jadwal.png',
        'booking_page' => 'bookingfutsal.php'
    ],
    2 => [
        'name' => 'Basket',
        'image' => '../gambar/basket jadwal.png',
        'booking_page' => 'bookingbasket.php'
    ],
    3 => [
        'name' => 'Badminton',
        'image' => '../gambar/badminton jadwal.png',
        'booking_page' => 'bookingbadmin.php'
    ],
    4 => [
        'name' => 'Voli',
        'image' => '../gambar/voli jadwal.png',
        'booking_page' => 'bookingvoli.php'
    ]
];

$court_name = "Tidak Ditemukan";
$court_location = "Tidak Ditemukan";
$court_price = 0;

$sql_details = "SELECT name, location, price_per_hour FROM courts WHERE id = ?";
$stmt_details = mysqli_prepare($connection, $sql_details);
if ($stmt_details) {
    mysqli_stmt_bind_param($stmt_details, "i", $court_id);
    mysqli_stmt_execute($stmt_details);
    $result_details = mysqli_stmt_get_result($stmt_details);
    if ($court_data = mysqli_fetch_assoc($result_details)) {
        $court_name = htmlspecialchars($court_data['name']);
        $court_location = htmlspecialchars($court_data['location']);
        $court_price = $court_data['price_per_hour'];
    }
    mysqli_stmt_close($stmt_details);
}

$current_court_config = $courts_config[$court_id] ?? $courts_config[1];
$court_image = $current_court_config['image'];

$valid_dates = [];
$base_date = date('Y-m-d');
for ($i = 0; $i < 7; $i++) {
    $date_sql = date('Y-m-d', strtotime("$base_date +$i days"));
    $date_display = date('j F Y', strtotime($date_sql));
    $valid_dates[$date_sql] = $date_display;
}

$tanggal_sql = isset($_GET['tanggal']) && isset($valid_dates[$_GET['tanggal']]) ? $_GET['tanggal'] : $base_date;
$tanggal_tampil = $valid_dates[$tanggal_sql];

$all_hours = [];
for ($i = 7; $i <= 23; $i++) {
    $all_hours[] = sprintf('%02d:00', $i);
}
$all_hours[] = '00:00';
$booked_hours = [];

$sql_bookings = "SELECT start_time, end_time FROM bookings 
                 WHERE court_id = ? AND booking_date = ? AND status != 'Dibatalkan'";
$stmt_bookings = mysqli_prepare($connection, $sql_bookings);

if ($stmt_bookings) {
    mysqli_stmt_bind_param($stmt_bookings, "is", $court_id, $tanggal_sql);
    mysqli_stmt_execute($stmt_bookings);
    $result_bookings = mysqli_stmt_get_result($stmt_bookings);

    if ($result_bookings) {
        while ($row = mysqli_fetch_assoc($result_bookings)) {
            $start_time = strtotime($row['start_time']);
            $end_time = strtotime($row['end_time']);

            if ($end_time <= $start_time && $row['end_time'] !== '00:00') {
                 $end_time = strtotime('+1 day', $end_time);
            }
            if ($row['end_time'] === '00:00') {
                 $end_time = strtotime('tomorrow 00:00'); 
                 if ($start_time > $end_time) $end_time = strtotime('+1 day', $end_time);
            }

            $current_time = $start_time;
            while ($current_time < $end_time) {
                $hour_str = date('H:i', $current_time);
                if ($hour_str === '00:00' && $current_time > $start_time) {
                     $booked_hours['00:00'] = true;
                } else {
                     $booked_hours[$hour_str] = true;
                }
                $current_time = strtotime('+1 hour', $current_time);
            }
        }
    }
    mysqli_stmt_close($stmt_bookings);
}
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal <?php echo $court_name; ?></title>
    <link rel="stylesheet" href="../css/jadwal.css">
    <link rel="stylesheet" href="../css/date-dropdown.css">
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
    <div class="jenislapangan">
        <h1>Lapangan <?php echo $court_name; ?></h1>
    </div>

    <div class="jadwal">
        <div class="gambarlapangan">
            <img src="<?php echo $court_image; ?>" alt="lapangan <?php echo $court_name; ?>">
        </div>

        <div class="keterangan">
            <div class="keteranganatas">
                <div class="keterangan1">
                    <h3><?php echo $court_location; ?></h3>
                </div>

                <div class="keterangan2 date-dropdown-container">
                    <div class="date-trigger" id="date-dropdown-toggle">
                        <h3 id="selected-date"><?php echo htmlspecialchars($tanggal_tampil); ?></h3>
                        <img src="../gambar/iconbawah.png" alt="icon dropdown">
                    </div>
                    <ul class="date-dropdown-list" id="date-options">
                        <?php
                        foreach ($valid_dates as $sql_date => $display_date) {
                            echo "<li><a href='jadwal.php?id=$court_id&tanggal=$sql_date' data-date='$display_date'>$display_date</a></li>";
                        }
                        ?>
                    </ul>
                </div>

                <div class="keterangan3">
                    <h4>1 Lapangan</h4>
                </div>
            </div>

            <div class="harga">
                <h3><?php echo number_format($court_price, 0, ',', '.'); ?>/Jam</h3>
            </div>

            <div class="jam">
                <?php 
                foreach ($all_hours as $hour) {
                    $display_time = substr($hour, 0, 5);
                    $class = isset($booked_hours[$hour]) ? 'terpesan' : 'tersedia';
                    echo "<div class=\"$class\">$display_time</div>";
                }
                ?>
            </div>

            <hr class="jam-divider">

            <div class="keteranganbawah">
                <h3>Lapangan <?php echo $court_name; ?> <?php echo $court_location; ?></h3>
                <a href="booking.php?id=<?php echo $court_id; ?>" class="booking-button">Booking</a>
            </div>
        </div>
    </div>

    <hr class="garisbawah">

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

    <script src="../js/jadwal.js"></script>
    <script src="../js/home.js"></script>
</body>
</html>