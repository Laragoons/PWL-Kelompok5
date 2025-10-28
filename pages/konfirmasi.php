<?php
session_start();
require_once '../config/db-connection.php';

$court_id = isset($_POST['court_id']) ? (int)$_POST['court_id'] : 0;
$jam_mulai = isset($_POST['jam_mulai']) ? $_POST['jam_mulai'] : 'Error';
$jam_selesai = isset($_POST['jam_selesai']) ? $_POST['jam_selesai'] : 'Error';
$tanggal_pemesanan = isset($_POST['tanggal_pemesanan']) ? $_POST['tanggal_pemesanan'] : 'Error';
$nama_pemesan = isset($_POST['nama_pemesan']) ? htmlspecialchars($_POST['nama_pemesan']) : 'Error';
$nomor_wa = isset($_POST['nomor_wa']) ? htmlspecialchars($_POST['nomor_wa']) : 'Error';
$email_pemesan = isset($_POST['email_pemesan']) ? htmlspecialchars($_POST['email_pemesan']) : '';

$court_name = "Lapangan Tidak Ditemukan";
$court_location = "";
$price_per_hour = 0;

if ($court_id > 0 && isset($connection)) {
    $sql_court = "SELECT name, location, price_per_hour FROM courts WHERE id = ?";
    $stmt_court = mysqli_prepare($connection, $sql_court);
    if ($stmt_court) {
        mysqli_stmt_bind_param($stmt_court, "i", $court_id);
        mysqli_stmt_execute($stmt_court);
        $result_court = mysqli_stmt_get_result($stmt_court);
        if ($court = mysqli_fetch_assoc($result_court)) {
            $court_name = htmlspecialchars($court['name']);
            $court_location = htmlspecialchars($court['location']);
            $price_per_hour = $court['price_per_hour'];
        }
        mysqli_stmt_close($stmt_court);
    } else {
         error_log("Gagal menyiapkan statement court: " . mysqli_error($connection));
    }
} else {
     error_log("Court ID tidak valid atau koneksi DB gagal.");
}

$durasi_jam = 0;
if ($jam_mulai && $jam_selesai && $jam_mulai != 'Error' && $jam_selesai != 'Error') {
    $start = strtotime($jam_mulai);
    $end = strtotime($jam_selesai);

    if ($end <= $start) {
        $end += 24 * 60 * 60;
    }

    $selisih_detik = $end - $start;
    $durasi_jam = round($selisih_detik / 3600);
}

$total_harga = $price_per_hour * $durasi_jam;

$tanggal_tampil = date("j F Y", strtotime($tanggal_pemesanan));
$harga_tampil = "Rp " . number_format($total_harga, 0, ',', '.');

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan</title>
    <link rel="stylesheet" href="../css/konfirmasi.css">
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
                    <li><a href="jadwalfutsal.php">Jadwal Futsal</a></li>
                    <li><a href="jadwalbasket.php">Jadwal Basket</a></li>
                    <li><a href="jadwalbadminton.php">Jadwal Badminton</a></li>
                    <li><a href="jadwalvoli.php">Jadwal Voli</a></li>
                </ul>
            </div>
            <div class="garis"></div>
            <a href="register.php"><h4>Register</h4></a>
        </div>
        <div class="login"><a href="login.php"><h4>Log in</h4></a></div>
    </div>
</header>

<body>
    <form action="../db-pages/simpan_booking.php" method="POST">

        <div class="confirmation-container">
            <h1>Periksa Pemesanan Anda</h1>
            <div class="details-box">
                <div class="details-top">
                    <h3><?php echo "Lapangan " . $court_name . " " . $court_location; ?></h3>
                    <span><?php echo $harga_tampil; ?></span>
                </div>
                <div class="details-bottom">
                    <p><?php echo $tanggal_tampil; ?></p>
                    <p><?php echo $jam_mulai . ' - ' . $jam_selesai; ?></p>
                </div>
            </div>
        </div>

        <input type="hidden" name="court_id" value="<?php echo $court_id; ?>">
        <input type="hidden" name="jam_mulai" value="<?php echo $jam_mulai; ?>">
        <input type="hidden" name="jam_selesai" value="<?php echo $jam_selesai; ?>">
        <input type="hidden" name="tanggal_pemesanan" value="<?php echo $tanggal_pemesanan; ?>">
        <input type="hidden" name="nama_pemesan" value="<?php echo $nama_pemesan; ?>">
        <input type="hidden" name="nomor_wa" value="<?php echo $nomor_wa; ?>">
        <input type="hidden" name="email_pemesan" value="<?php echo $email_pemesan; ?>">
        <input type="hidden" name="total_harga" value="<?php echo $total_harga; ?>">

        <?php if (isset($_SESSION['user_id'])): ?>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <?php endif; ?>

        <div class="button-group">
            <button type="submit" class="confirm-button">
                <p>Konfirmasi Pemesanan</p>
            </button>
            <a href="home.php" class="cancel-link">
                <button type="button" class="cancel-button">
                    <p>Batalkan</p>
                </button>
            </a>
        </div>

    </form>

    <script src="../js/home.js"></script>
</body>
</html>