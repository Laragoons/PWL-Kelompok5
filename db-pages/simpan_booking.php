<?php
session_start();
require_once '../config/db-connection.php';

$court_id = isset($_POST['court_id']) ? (int)$_POST['court_id'] : 0;
$jam_mulai = isset($_POST['jam_mulai']) ? $_POST['jam_mulai'] : null;
$jam_selesai = isset($_POST['jam_selesai']) ? $_POST['jam_selesai'] : null;
$tanggal_pemesanan = isset($_POST['tanggal_pemesanan']) ? $_POST['tanggal_pemesanan'] : null;
$total_harga = isset($_POST['total_harga']) ? (float)$_POST['total_harga'] : 0;
$user_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;

if ($court_id <= 0 || !$jam_mulai || !$jam_selesai || !$tanggal_pemesanan || $user_id === null) {
    $_SESSION['error_message'] = "Data pemesanan tidak lengkap atau tidak valid.";
    header("Location: ../pages/bookingfutsal.php");
    exit();
}

$tanggal_obj = date_create($tanggal_pemesanan);
$tanggal_awal = date_create('2025-09-01');
$tanggal_akhir = date_create('2025-09-07');

if ($tanggal_obj < $tanggal_awal || $tanggal_obj > $tanggal_akhir) {
     $_SESSION['error_message'] = "Tanggal pemesanan tidak valid. Harap pilih antara 1 hingga 7 September 2025.";
     header("Location: ../pages/bookingfutsal.php");
     exit();
}

if ($jam_mulai == $jam_selesai) {
    $_SESSION['error_message'] = "Jam mulai dan jam selesai tidak boleh sama.";
    header("Location: ../pages/bookingfutsal.php");
    exit();
}

$start_ts = strtotime($jam_mulai);
$end_ts = strtotime($jam_selesai);

if ($end_ts <= $start_ts && $jam_selesai != "00:00") {
    $_SESSION['error_message'] = "Jam selesai tidak boleh lebih awal dari jam mulai.";
    header("Location: ../pages/bookingfutsal.php");
    exit();
}

$sql_check = "SELECT id FROM bookings
              WHERE court_id = ?
              AND booking_date = ?
              AND start_time < ?
              AND end_time > ?";

$stmt_check = mysqli_prepare($connection, $sql_check);

if ($stmt_check) {
    mysqli_stmt_bind_param(
        $stmt_check,
        "isss",
        $court_id,
        $tanggal_pemesanan,
        $jam_selesai,
        $jam_mulai
    );

    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['error_message'] = "Maaf, sebagian atau seluruh jam yang Anda pilih sudah dipesan untuk lapangan ini pada tanggal tersebut.";
        header("Location: ../pages/bookingfutsal.php");
        exit();
    }
    mysqli_stmt_close($stmt_check);
} else {
    $_SESSION['error_message'] = "Gagal memeriksa ketersediaan jadwal: " . mysqli_error($connection);
    header("Location: ../pages/bookingfutsal.php");
    exit();
}

$sql = "INSERT INTO bookings (user_id, court_id, booking_date, start_time, end_time, total_price, status)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connection, $sql);

if ($stmt) {
    $status_default = 'Belum Diproses';
    mysqli_stmt_bind_param(
        $stmt,
        "iisssds",
        $user_id,
        $court_id,
        $tanggal_pemesanan,
        $jam_mulai,
        $jam_selesai,
        $total_harga,
        $status_default
    );

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Pemesanan Anda berhasil disimpan!";
        header("Location: ../pages/home.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Terjadi kesalahan saat menyimpan pemesanan: " . mysqli_stmt_error($stmt);
        header("Location: ../pages/bookingfutsal.php");
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['error_message'] = "Gagal menyiapkan statement: " . mysqli_error($connection);
    header("Location: ../pages/bookingfutsal.php");
    exit();
}

mysqli_close($connection);
?>