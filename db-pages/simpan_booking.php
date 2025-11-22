<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
require_once '../config/db-connection.php';

$court_id = isset($_POST['court_id']) ? (int)$_POST['court_id'] : 0;
$jam_mulai = isset($_POST['jam_mulai']) ? $_POST['jam_mulai'] : null;
$jam_selesai = isset($_POST['jam_selesai']) ? $_POST['jam_selesai'] : null;
$tanggal_pemesanan = isset($_POST['tanggal_pemesanan']) ? $_POST['tanggal_pemesanan'] : null;
$total_harga = isset($_POST['total_harga']) ? (float)$_POST['total_harga'] : 0;
$user_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;

function goBack($message, $court_id) {
    $_SESSION['error_message'] = $message;
    $target = ($court_id > 0) ? "../pages/booking.php?id=" . $court_id : "../pages/home.php";
    header("Location: " . $target);
    exit();
}

if ($court_id <= 0 || !$jam_mulai || !$jam_selesai || !$tanggal_pemesanan || $user_id === null) {
    goBack("Data pemesanan tidak lengkap. Silakan ulangi.", $court_id);
}

$tanggal_obj = date_create($tanggal_pemesanan);
$today = date_create(date('Y-m-d'));

if ($tanggal_obj < $today) {
    goBack("Tanggal pemesanan tidak valid (sudah lewat).", $court_id);
}

if ($jam_mulai == $jam_selesai) {
    goBack("Jam mulai dan jam selesai tidak boleh sama.", $court_id);
}

$start_ts = strtotime($jam_mulai);
$end_ts = strtotime($jam_selesai);

if ($end_ts <= $start_ts && $jam_selesai != "00:00") {
    goBack("Jam selesai harus lebih akhir dari jam mulai.", $court_id);
}

$sql_check = "SELECT id FROM bookings 
              WHERE court_id = ? 
              AND booking_date = ? 
              AND status != 'Dibatalkan'
              AND ((start_time < ? AND end_time > ?))";

$stmt_check = mysqli_prepare($connection, $sql_check);
if ($stmt_check) {
    mysqli_stmt_bind_param($stmt_check, "isss", $court_id, $tanggal_pemesanan, $jam_selesai, $jam_mulai);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        mysqli_stmt_close($stmt_check);
        goBack("Jadwal tersebut sudah dibooking orang lain.", $court_id);
    }
    mysqli_stmt_close($stmt_check);
} else {
    goBack("Gagal cek jadwal: " . mysqli_error($connection), $court_id);
}

$sql = "INSERT INTO bookings (user_id, court_id, booking_date, start_time, end_time, total_price, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connection, $sql);
if ($stmt) {
    $status_default = 'Belum Diproses';
    mysqli_stmt_bind_param($stmt, "iisssds", $user_id, $court_id, $tanggal_pemesanan, $jam_mulai, $jam_selesai, $total_harga, $status_default);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Pemesanan Anda berhasil disimpan!";
        header("Location: ../pages/home.php");
        exit();
    } else {
        goBack("Gagal menyimpan ke database: " . mysqli_stmt_error($stmt), $court_id);
    }
    mysqli_stmt_close($stmt);
} else {
    goBack("Database error: " . mysqli_error($connection), $court_id);
}

mysqli_close($connection);
?>