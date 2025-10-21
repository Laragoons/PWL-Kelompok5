<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
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
    <div class="kotakbesar">
        <div class="gambar">
        <img src="../gambar/gambar login.png" alt="Gambar Voli">
        </div>
        
        <div class="kanan">
            <div class="logo">
                <img src="../gambar/EAA White.png" alt="logo">
            </div>

            <div class="text">
                <div class="email">
                    <h3>Email Address</h3>
                    <input type="email">
                </div>

                <div class="password">
                    <h3>Password</h3>
                    <input type="password">
                </div>
            </div>

            <div class="tombol">
                <a href="home.php"><button>Log In</button></a>
            </div>

            <div class="tulisan">
                <div class="teks_satu"><p>Not signed up?</p></div>
                <div class="teks_dua"><a href="register.php"><p>Create an account.</p></a></div>
            </div>
        </div>
    </div>
</body>
</html>