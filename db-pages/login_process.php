<?php
session_start();

require_once '../config/db-connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    die("Error: Email dan Password wajib diisi.");
}

$sql = "SELECT id, email, password, role FROM users WHERE email = ?";
$stmt = mysqli_prepare($connection, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];

                if ($user['role'] == 'admin') {
                    header("Location: ../pages/adminpanel.php");
                } else {
                    header("Location: ../pages/home.php");
                }
                exit();

            } else {
                die("Error: Password salah.");
            }
        } else {
            die("Error: Email tidak terdaftar.");
        }
    } else {
        die("Error saat menjalankan query: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
} else {
    die("Error saat menyiapkan statement: " . mysqli_error($connection));
}

mysqli_close($connection);
?>