<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once '../config/db-connection.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$today_date = date('Y-m-d');

$tanggal_sql = isset($_GET['tanggal']) && !empty($_GET['tanggal']) ? $_GET['tanggal'] : $today_date;

$tanggal_tampil = date('j F Y', strtotime($tanggal_sql));
if ($tanggal_sql == $today_date) {
    $tanggal_tampil .= ' (Hari Ini)';
}

$bookings = [];

$sql = "SELECT b.id, u.email AS pelanggan_email, c.name AS lapangan_nama, b.start_time, b.end_time, b.status
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        JOIN courts c ON b.court_id = c.id
        WHERE b.booking_date = ? AND b.status IN ('Belum Diproses', 'Diproses')
        ORDER BY b.start_time ASC";

$stmt = mysqli_prepare($connection, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $tanggal_sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $bookings[] = $row;
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
    <link rel="stylesheet" href="../css/datapemesanan.css">
    <link rel="stylesheet" href="../css/adminpanel.css">
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
        </div>
        
        <div class="login">
            <a href="../db-pages/logout.php"><h4>Log out</h4></a>
        </div>
    </div>    
</header>

<body>
    <div class="head_table">
        <div class="back">
            <a href="adminpanel.php">
                <img src="../gambar/left_arrow.png" alt="left arrow">
                <h1>Kembali</h1>
            </a>    
        </div>
        
        <div class="tanggal date-dropdown-container">
            <div class="date-trigger" id="date-dropdown-toggle">
                <h1 id="selected-date" style="display: block;"><?php echo htmlspecialchars($tanggal_tampil); ?></h1>
                
                <input 
                    type="date" 
                    id="date-input-field" 
                    value="<?php echo htmlspecialchars($tanggal_sql); ?>" 
                    style="display: none;" 
                    onchange="window.location.href='datapemesanan.php?tanggal=' + this.value"
                >
                
                <img src="../gambar/down_arrow.png" alt="icon dropdown">
            </div>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Lapangan</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($bookings)): ?>
                    <tr>
                        <td colspan="4" style="text-align:center;">Tidak ada pemesanan yang perlu diproses atau sedang diproses untuk tanggal ini.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr id="booking-row-<?php echo $booking['id']; ?>">
                            <td><?php echo htmlspecialchars($booking['pelanggan_email']); ?></td>
                            <td><?php echo htmlspecialchars($booking['lapangan_nama']); ?></td>
                            <td><?php echo substr($booking['start_time'], 0, 5) . '-' . substr($booking['end_time'], 0, 5); ?></td>
                            <td>
                                <div class="status-content">
                                    <p class="current-status-text">(<?php echo htmlspecialchars($booking['status']); ?>)</p>
                                    <div class="status-icons">
                                        <a href="../db-pages/update_status.php?id=<?php echo $booking['id']; ?>&status=Diproses&redirect_date=<?php echo $tanggal_sql; ?>" class="icon-wrapper icon-proses">
                                            <img src="../gambar/time2.png" alt="Proses">
                                        </a>
                                        <a href="../db-pages/update_status.php?id=<?php echo $booking['id']; ?>&status=Sudah Diproses&redirect_date=<?php echo $tanggal_sql; ?>" class="icon-wrapper icon-selesai">
                                            <img src="../gambar/tick.png" alt="Selesai">
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('date-dropdown-toggle');
            const dateInput = document.getElementById('date-input-field');
            const dateHeader = document.getElementById('selected-date');

            if (toggle && dateInput && dateHeader) {
                toggle.addEventListener('click', function() {
                    dateHeader.style.display = 'none';
                    dateInput.style.display = 'block';
                    dateInput.focus();
                    
                    dateInput.click();
                });
                
                dateInput.addEventListener('blur', function() {
                    dateInput.style.display = 'none';
                    dateHeader.style.display = 'block';
                });
            }
        });
    </script>
    <script src="../js/jadwal.js"></script> 
    <script src="../js/home.js"></script> 
</body>
</html>