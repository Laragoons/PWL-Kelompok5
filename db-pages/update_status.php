<?php
session_start();
require_once '../config/db-connection.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    die("Akses ditolak.");
}

$booking_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$new_status = isset($_GET['status']) ? $_GET['status'] : '';
$redirect_date = isset($_GET['redirect_date']) ? $_GET['redirect_date'] : date('Y-m-d');

if (($new_status != 'Diproses' && $new_status != 'Sudah Diproses') || $booking_id <= 0) {
    die("Input tidak valid.");
}

$sql = "UPDATE bookings SET status = ? WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $new_status, $booking_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../pages/datapemesanan.php?tanggal=" . urlencode($redirect_date));
        exit();
    } else {
        die("Gagal memperbarui status: " . mysqli_stmt_error($stmt));
    }
    
    mysqli_stmt_close($stmt);
} else {
    die("Gagal menyiapkan statement: " . mysqli_error($connection));
}

mysqli_close($connection);