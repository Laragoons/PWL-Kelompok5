<?php
session_start();
require_once '../config/db-connection.php';

// if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
//     header("Location: login.php");
//     exit();
// }

$valid_dates = [];
$base_date = '2025-09-01';
for ($i = 0; $i < 7; $i++) {
    $date_sql = date('Y-m-d', strtotime("$base_date +$i days"));
    $date_display = date('j F Y', strtotime($date_sql));
    $valid_dates[$date_sql] = $date_display;
}
$tanggal_sql = isset($_GET['tanggal']) && isset($valid_dates[$_GET['tanggal']]) ? $_GET['tanggal'] : $base_date;
$tanggal_tampil = $valid_dates[$tanggal_sql];

$bookings = [];
$sql = "SELECT b.id, u.email AS pelanggan_email, c.name AS lapangan_nama, b.start_time, b.end_time 
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        JOIN courts c ON b.court_id = c.id
        WHERE b.booking_date = ? AND b.status = 'Belum Diproses'
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
    <link rel="stylesheet" href="../css/date-dropdown.css">
</head>

<header>
    <img src="../gambar/EEA Red.png" alt="logo">
    <div class="navbar">
        <div class="link">
            <a href="home.php"><h4>Home</h4></a>
            <a href="jadwal.php"><h4>Jadwal Lapangan</h4></a>
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
                <h1 id="selected-date"><?php echo htmlspecialchars($tanggal_tampil); ?></h1>
                <img src="../gambar/down_arrow.png" alt="down arrow">
            </div>
            <ul class="date-dropdown-list" id="date-options">
                <?php
                foreach ($valid_dates as $sql_date => $display_date) {
                    echo "<li><a href='datapemesanan.php?tanggal=$sql_date' data-date='$display_date'>$display_date</a></li>";
                }
                ?>
            </ul>
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
                        <td colspan="4">Tidak ada pemesanan yang perlu diproses untuk tanggal ini.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr id="booking-row-<?php echo $booking['id']; ?>">
                            <td><?php echo htmlspecialchars($booking['pelanggan_email']); ?></td>
                            <td><?php echo htmlspecialchars($booking['lapangan_nama']); ?></td>
                            <td><?php echo substr($booking['start_time'], 0, 5) . '-' . substr($booking['end_time'], 0, 5); ?></td>
                            <td>
                                <div class="status-icons">
                                    <a href="../db-pages/update_status.php?id=<?php echo $booking['id']; ?>&status=Diproses&redirect_date=<?php echo $tanggal_sql; ?>" class="icon-wrapper icon-proses">
                                        <img src="../gambar/time2.png" alt="Proses">
                                    </a>
                                    <a href="../db-pages/update_status.php?id=<?php echo $booking['id']; ?>&status=Sudah Diproses&redirect_date=<?php echo $tanggal_sql; ?>" class="icon-wrapper icon-selesai">
                                        <img src="../gambar/tick.png" alt="Selesai">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="../js/jadwal.js"></script> 
</body>
</html>