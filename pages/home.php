<!DOCTYPE html>
<html lang="en">
<head>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

        <div class="login">
            <a href="login.php"><h4>Log in</h4></a>
        </div>  
    </div>    
</header>

<body>
    <div class="slideshow">
        <img src="../gambar/basket slide.png" alt="basket slideshow" id="slideshow">
    </div>

    <div class="bentukload">
        <div class="panjang"></div>
        <div class="bulat"></div>
        <div class="bulat"></div>
    </div>

    <div class="pilihlapangan">
        <section class="judullapangan">
            <h1>Pilihan Lapangan Olahraga</h1>
        </section>

        <div class="menulapangan">
            <div class="kotak">
                <div class="isi">
                    <h3>Futsal</h3>
                    <img src="../gambar/futsal home.png" alt="Futsal">
                    <div class="isibawah">
                        <h3>90.000/Jam</h3>
                        <a href="bookingfutsal.php"><button>Pesan</button></a>
                    </div>
                </div>
            </div>

            <div class="kotak">
                <div class="isi">
                    <h3>Badminton</h3>
                    <img src="../gambar/badmin home.png" alt="Badminton">
                    <div class="isibawah">
                        <h3>90.000/Jam</h3>
                        <a href="bookingbadmin.php"><button>Pesan</button></a>
                    </div>
                </div>
            </div>

            <div class="kotak">
                <div class="isi">
                    <h3>Basket</h3>
                    <img src="../gambar/basket home.png" alt="Basket">
                    <div class="isibawah">
                        <h3>90.000/Jam</h3>
                        <a href="bookingbasket.php"><button>Pesan</button></a>
                    </div>
                </div>
            </div>

            <div class="kotak">
                <div class="isi">
                    <h3>Voli</h3>
                    <img src="../gambar/Voli home.png" alt="Voli">
                    <div class="isibawah">
                        <h3>90.000/Jam</h3>
                        <a href="bookingvoli.php"><button>Pesan</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

    <script src="../js/home.js"></script>
</body>
</html>

