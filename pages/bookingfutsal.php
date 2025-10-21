<!DOCTYPE html>
<html lang="en">
<head>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="../css/bookingfutsal.css"> 
</head>

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
<main class="content-container">
    <h1 class="page-title">Lapangan Futsal</h1>

    <div class="futsal-court-image">
        <img src="../gambar/futsalbooking.png" alt="Lapangan Futsal">
    </div>

    <form action="konfirmasi.php" method="POST" class="booking-form">
        
        <div class="form-row">
            <div class="form-group time-group">
                <label for="jam_mulai">Jam Mulai:</label>
                <select id="jam_mulai" name="jam_mulai" required>
                    <option value="" disabled selected>Pilih Jam</option>
                    <option value="07:00">07:00</option>
                    <option value="07:00">08:00</option>
                    <option value="07:00">09:00</option>
                    <option value="07:00">10:00</option>
                    <option value="07:00">11:00</option>
                    <option value="07:00">12:00</option>
                    <option value="07:00">13:00</option>
                    <option value="07:00">14:00</option>
                    <option value="07:00">15:00</option>
                    <option value="07:00">16:00</option>
                    <option value="07:00">17:00</option>
                    <option value="07:00">18:00</option>
                    <option value="07:00">19:00</option>
                    <option value="07:00">20:00</option>
                    <option value="07:00">21:00</option>
                    <option value="07:00">22:00</option>
                    <option value="07:00">23:00</option>
                    </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group time-group">
                <label for="jam_selesai">Jam Selesai:</label>
                <select id="jam_selesai" name="jam_selesai" required>
                    <option value="" disabled selected>Pilih Jam</option>
                    <option value="08:00">08:00</option>
                    <option value="08:00">09:00</option>
                    <option value="08:00">10:00</option>
                    <option value="08:00">11:00</option>
                    <option value="08:00">12:00</option>
                    <option value="08:00">13:00</option>
                    <option value="08:00">14:00</option>
                    <option value="08:00">15:00</option>
                    <option value="08:00">16:00</option>
                    <option value="08:00">17:00</option>
                    <option value="08:00">18:00</option>
                    <option value="08:00">19:00</option>
                    <option value="08:00">20:00</option>
                    <option value="08:00">21:00</option>
                    <option value="08:00">22:00</option>
                    <option value="08:00">23:00</option>
                    <option value="08:00">00:00</option>
                    </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="tanggal_pemesanan">Tanggal Pemesanan:</label>
                <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan" required>
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

