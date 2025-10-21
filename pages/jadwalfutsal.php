<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Futsal</title>
    <link rel="stylesheet" href="../css/jadwalfutsal.css">
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

        <div class="login">
            <a href="login.php"><h4>Log in</h4></a>
        </div>  
    </div>    
</header>

<body>
    <div class="jenislapangan">
        <h1>Lapangan Futsal</h1>
    </div>

    <div class="jadwal">
        <div class="gambarlapangan">
            <img src="../gambar/futsal jadwal.png" alt="lapangan futsal">
        </div>

        <div class="keterangan">
            <div class="keteranganatas">
                <div class="keterangan1">
                    <h3>Jl. Sutoyo</h3>
                </div>

                <div class="keterangan2 date-dropdown-container">
                    <div class="date-trigger" id="date-dropdown-toggle">
                        <h3 id="selected-date">1 September 2025</h3>
                        <img src="../gambar/iconbawah.png" alt="icon dropdown">
                    </div>
                    <ul class="date-dropdown-list" id="date-options">
                        <li><a href="#" data-date="1 September 2025">1 September 2025</a></li>
                        <li><a href="#" data-date="2 September 2025">2 September 2025</a></li>
                        <li><a href="#" data-date="3 September 2025">3 September 2025</a></li>
                        <li><a href="#" data-date="4 September 2025">4 September 2025</a></li>
                        <li><a href="#" data-date="5 September 2025">5 September 2025</a></li>
                        <li><a href="#" data-date="6 September 2025">6 September 2025</a></li>
                        <li><a href="#" data-date="7 September 2025">7 September 2025</a></li>
                    </ul>
                </div>

                <div class="keterangan3">
                    <h4>1 Lapangan</h4>
                </div>
            </div>

            <div class="harga">
                <h3>90.000/Jam</h3>
            </div>

            <div class="jam">
                <div class="terpesan">07.00</div>
                <div class="terpesan">08.00</div>
                <div class="terpesan">09.00</div>
                <div class="terpesan">10.00</div>
                <div class="terpesan">11.00</div>
                <div class="tersedia">12.00</div>
                <div class="tersedia">13.00</div>
                <div class="tersedia">14.00</div>
                <div class="tersedia">15.00</div>
                <div class="tersedia">16.00</div>
                <div class="tersedia">17.00</div>
                <div class="tersedia">18.00</div>
                <div class="tersedia">19.00</div>
                <div class="tersedia">20.00</div>
                <div class="tersedia">21.00</div>
                <div class="tersedia">22.00</div>
                <div class="tersedia">23.00</div>
                <div class="tersedia">00.00</div>
            </div>

            <hr class="jam-divider">

            <div class="keteranganbawah">
                <h3>Lapangan Futsal Sutoyo</h3>
                <a href="bookingfutsal.php" class="booking-button">Booking</a>
            </div>
        </div>
    </div>

    <hr class="garisbawah">

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

    <script src="../js/jadwalfutsal.js"></script>
</body>
</html>