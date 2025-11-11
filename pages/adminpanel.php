<?php
session_start();
require_once '../config/db-connection.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header("Location: login.php");
    exit();
}

function getDashboardData($conn, $period) {
    $date_condition = "";
    if ($period == 'today') {
        $date_condition = "booking_date = '2025-09-01'";
    } elseif ($period == 'week') {
        $date_condition = "booking_date BETWEEN '2025-09-01' AND '2025-09-07'";
    }

    $sql_count = "SELECT COUNT(*) as total FROM bookings WHERE $date_condition";
    $res_count = mysqli_query($conn, $sql_count);
    $data_count = mysqli_fetch_assoc($res_count);
    $total_penyewa = $data_count['total'] ?? 0;

    $sql_hours = "SELECT SUM(
                    CASE
                        WHEN end_time <= start_time THEN TIME_TO_SEC(TIMEDIFF(ADDTIME(end_time, '24:00:00'), start_time)) / 3600
                        ELSE TIME_TO_SEC(TIMEDIFF(end_time, start_time)) / 3600
                    END
                  ) as total_hours 
                  FROM bookings WHERE $date_condition";
    $res_hours = mysqli_query($conn, $sql_hours);
    $data_hours = mysqli_fetch_assoc($res_hours);
    $total_hours = $data_hours['total_hours'] ? round($data_hours['total_hours']) : 0;

    $sql_income = "SELECT SUM(total_price) as total_income FROM bookings WHERE $date_condition";
    $res_income = mysqli_query($conn, $sql_income);
    $data_income = mysqli_fetch_assoc($res_income);
    $total_income = $data_income['total_income'] ?? 0;

    return [
        'penyewa' => $total_penyewa,
        'hours' => $total_hours,
        'income' => $total_income
    ];
}

$data_today = getDashboardData($connection, 'today');
$data_week = getDashboardData($connection, 'week');

$bookings = [];
$sql_table = "SELECT b.id, u.email, c.name AS lapangan, b.booking_date, b.status, b.start_time, b.end_time 
              FROM bookings b
              LEFT JOIN users u ON b.user_id = u.id
              JOIN courts c ON b.court_id = c.id
              ORDER BY b.id DESC LIMIT 10";

$result_table = mysqli_query($connection, $sql_table);
if ($result_table) {
    while ($row = mysqli_fetch_assoc($result_table)) {
        $bookings[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
    <div class="dashboard">
        <div class="dashboard_title">
            <h1>Dashboard</h1>
        </div>

        <div class="dashboard_box">
            <div class="box1">
                <div class="text">
                    <h2>Penyewa</h2>
                    <h4>Hari ini: <?php echo $data_today['penyewa']; ?></h4>
                    <h4>Minggu ini: <?php echo $data_week['penyewa']; ?></h4>
                </div>
                <div class="icon">
                    <img src="../gambar/person_icon.png" alt="person icon">
                </div>
            </div>

            <div class="box2">
                <div class="text">
                    <h2>Total Booking</h2>
                    <h4>Hari ini: <?php echo $data_today['hours']; ?> Jam</h4>
                    <h4>Minggu ini: <?php echo $data_week['hours']; ?> Jam</h4>
                </div>
                <div class="icon">
                    <img src="../gambar/time_icon.png" alt="time icon">
                </div>
            </div>

            <div class="box3">
                <div class="text">
                    <h2>Pendapatan</h2>
                    <h4>Hari ini: Rp<?php echo number_format($data_today['income'], 0, ',', '.'); ?></h4>
                    <h4>Minggu ini: Rp<?php echo number_format($data_week['income'], 0, ',', '.'); ?></h4>
                </div>
                <div class="icon">
                    <img src="../gambar/money_icon.png" alt="money">
                </div>
            </div>
        </div>
    </div>

    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Pemesanan Terbaru</h1>
            </div>

            <div class="table_link">
                <h4><a href="datapemesanan.php">Selengkapnya</a></h4>
                <img src="../gambar/right_arrow.png" alt="icon arrow">
            </div>
        </div>

        <div class="tabel-container">
            <table>
                <thead>
                    <tr>
                        <th>Penyewa</th>
                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($bookings)): ?>
                        <tr>
                            <td colspan="5">Belum ada pemesanan terbaru.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($bookings as $row): ?>
                            <?php
                                $status_class = 'red';
                                if ($row['status'] == 'Diproses') {
                                    $status_class = 'orange';
                                } elseif ($row['status'] == 'Sudah Diproses') {
                                    $status_class = 'green';
                                }
                                
                                $tgl = date('d F Y', strtotime($row['booking_date']));
                                $jam = substr($row['start_time'], 0, 5) . ' - ' . substr($row['end_time'], 0, 5);
                                
                                $penyewa = $row['email'];
                            ?>
                            <tr>
                                <td><span class="dot <?php echo $status_class; ?>"></span><?php echo htmlspecialchars($penyewa); ?></td>
                                <td><?php echo htmlspecialchars($row['lapangan']); ?></td>
                                <td><?php echo $tgl; ?></td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td><?php echo $jam; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="../js/home.js"></script> 
</body>
</html>