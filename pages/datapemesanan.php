<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
    <link rel="stylesheet" href="../css/datapemesanan.css">
</head>

<header>
    <img src="../gambar/EEA Red.png" alt="logo">
    <div class="navbar">
        <div class="link">
            <a href="home.php"><h4>Home</h4></a>
            <a href="jadwal.php"><h4>Jadwal Lapangan</h4></a>
        </div>  
    </div>    
</header>

<body>
    <div class="head_table">
        <div class="back">
            <a href="adminpanel.php">
                <img src="../gambar/left_arrow.png" alt="left arrow">
                <h1>Kembali</h1>
            </a>    
        </div>

        <div class="tanggal">
            <input type="checkbox" id="tanggal-toggle" class="dropdown-toggle">

            <label for="tanggal-toggle" class="tanggal-label">
                <h1 id="tanggal-terpilih">17 Agustus 2025</h1>
                <img src="../gambar/down_arrow.png" alt="down arrow">
            </label>

            <ul class="dropdown-menu">
                <li><a href="#" data-value="17 Agustus 2025">17 Agustus 2025</a></li>
                <li><a href="#" data-value="18 Agustus 2025">18 Agustus 2025</a></li>
                <li><a href="#" data-value="19 Agustus 2025">19 Agustus 2025</a></li>
                <li><a href="#" data-value="20 Agustus 2025">20 Agustus 2025</a></li>
                <li><a href="#" data-value="21 Agustus 2025">21 Agustus 2025</a></li>
                <li><a href="#" data-value="22 Agustus 2025">22 Agustus 2025</a></li>
                <li><a href="#" data-value="23 Agustus 2025">23 Agustus 2025</a></li>
            </ul>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Lapangan</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Firdaus</td>
                    <td>Badminton</td>
                    <td>22.00-23.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Ridwan</td>
                    <td>Futsal</td>
                    <td>21.00-22.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Agus</td>
                    <td>Futsal</td>
                    <td>20.00-21.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Jono</td>
                    <td>Basket</td>
                    <td>18.00-19.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
                 <tr>
                    <td>Huta</td>
                    <td>Basket</td>
                    <td>17.00-18.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Joni</td>
                    <td>Badminton</td>
                    <td>17.00-18.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
                 <tr>
                    <td>Santi</td>
                    <td>Voli</td>
                    <td>17.00-18.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Yanti</td>
                    <td>Basket</td>
                    <td>15.00-16.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
                 <tr>
                    <td>Faisal</td>
                    <td>Futsal</td>
                    <td>12.00-14.00</td>
                    <td>
                        <div class="status-icons">
                            <div class="icon-wrapper">
                                <img src="../gambar/time2.png" alt="Menunggu">
                            </div>
                            <div class="icon-wrapper">
                                <img src="../gambar/tick.png" alt="Selesai">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <script src="../js/datapemesanan.js"></script>
</body>
</html>