<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan Basket</title>
    <link rel="stylesheet" href="../css/bookingfutsal.css"> </head>

<header>
    <img src="../gambar/EEA Red.png" alt="logo">
    <div class="navbar">
        <div class="link">
            <a href="home.php"><h4>Home</h4></a>
            <a href="jadwal.php"><h4>Jadwal Lapangan</h4></a>
            <div class="garis"></div>
            <a href="register.php"><h4>Register</h4></a>
        </div>
        <div class="login"><a href="login.php"><h4>Log in</h4></a></div>
    </div>
</header>

<body>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div style="color: red; padding: 10px; border: 1px solid red; margin: 20px auto; max-width: 1160px; text-align: center; background-color: #ffebee;">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']);
    }
    ?>
    <main class="content-container">
        <h1 class="page-title">Lapangan Basket</h1>

        <div class="futsal-court-image">
            <img src="../gambar/basketbooking.png" alt="Lapangan Basket">
        </div>

        <form action="konfirmasi.php" method="POST" class="booking-form">

            <input type="hidden" name="court_id" value="2"> <div class="form-row">
                <div class="form-group time-group">
                    <label for="jam_mulai">Jam Mulai:</label>
                    <select id="jam_mulai" name="jam_mulai" required>
                        <option value="" disabled selected>Pilih Jam</option>
                        <option value="07:00">07:00</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group time-group">
                    <label for="jam_selesai">Jam Selesai:</label>
                    <select id="jam_selesai" name="jam_selesai" required>
                        <option value="" disabled selected>Pilih Jam</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                        <option value="00:00">00:00</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
                    <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan" min="2025-09-01" max="2025-09-07" required>
                </div>
                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan:</label>
                    <input type="text" id="nama_pemesan" name="nama_pemesan" required>
                </div>
                <div class="form-group">
                    <label for="nomor_wa">Nomor WA Pemesan:</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input type="tel" id="nomor_wa" name="nomor_wa" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email_pemesan">Email Pemesan</label>
                    <input type="email" id="email_pemesan" name="email_pemesan">
                </div>
            </div>

            <div class="form-row submit-row">
                <button type="submit" class="submit-button">Booking</button>
            </div>
        </form>
    </main>

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

</body>
</html>