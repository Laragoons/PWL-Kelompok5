<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
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
                    <li><a href="jadwal.php?id=1">Jadwal Futsal</a></li>
                    <li><a href="jadwal.php?id=2">Jadwal Basket</a></li>
                    <li><a href="jadwal.php?id=3">Jadwal Badminton</a></li>
                    <li><a href="jadwal.php?id=4">Jadwal Voli</a></li>
                </ul>
            </div>

            <?php 
            if (!isset($_SESSION['user_id'])):
            ?>
                <div class="garis"></div>
                <a href="register.php"><h4>Register</h4></a>
            <?php endif; ?>
        </div>

        <?php
        if (!isset($_SESSION['user_id'])): 
        ?>
            <div class="login">
                <a href="login.php"><h4>Log in</h4></a>
            </div>
        <?php else: ?>
            <div class="login">
                <a href="../db-pages/logout.php"><h4>Log out</h4></a>
            </div>
        <?php endif; ?>
    </div>
</header>