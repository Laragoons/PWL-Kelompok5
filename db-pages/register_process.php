<?php
require_once '../config/db-connection.php';

$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (empty($email) || empty($password) || empty($confirm_password)) {
    die("Error: Semua field wajib diisi.");
}

if ($password !== $confirm_password) {
    die("Error: Password dan Konfirmasi Password tidak cocok.");
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email, password) VALUES (?, ?)";
$stmt = mysqli_prepare($connection, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $email, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registrasi berhasil! Anda akan diarahkan ke halaman login.";
        header("refresh:2; url=../pages/login.php");
        exit();
    } else {
        if (mysqli_errno($connection) == 1062) {
             die("Error: Email sudah terdaftar. Silakan gunakan email lain.");
        } else {
            die("Error saat menyimpan data: " . mysqli_stmt_error($stmt));
        }
    }

    mysqli_stmt_close($stmt);
} else {
    die("Error saat menyiapkan statement: " . mysqli_error($connection));
}

mysqli_close($connection);
?>