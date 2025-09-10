<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="register.css">
</head>

<header>
    <img src="gambar/EEA Red.png" alt="logo">
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
        <img src="gambar/gambar register.png" alt="Gambar futsal">
        </div>
        
        <div class="kanan">
            <div class="logo">
                <img src="gambar/EAA White.png" alt="logo">
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

                <div class="confirm">
                <h3>Confirm Password</h3>
                <input type="password">
                </div>
            </div>

            <div class="tombol">
                <a href="home.php"><button>Sign Up</button></a>
            </div>

            <div class="tulisan">
                <div class="teks_satu"><p>Already signed up?</p></div>
                <div class="teks_dua"><a href="login.php"><p>Log In.</p></a></div>
            </div>
        </div>
    </div>
</body>
</html>