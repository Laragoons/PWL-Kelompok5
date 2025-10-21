<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/adminpanel.css">
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
    <div class="dashboard">
        <div class="dashboard_title">
            <h1>Dashboard</h1>
        </div>

        <div class="dashboard_box">
            <div class="box1">
                <div class="text">
                    <h2>Penyewa</h2>
                    <h4>Hari ini: 15</h4>
                    <h4>Minggu ini: 70</h4>
                </div>

                <div class="icon">
                    <img src="../gambar/person_icon.png" alt="person icon">
                </div>
            </div>

            <div class="box2">
                <div class="text">
                    <h2>Total Booking</h2>
                    <h4>Hari ini: 20 Jam</h4>
                    <h4>Minggu ini: 130 Jam</h4>
                </div>

                <div class="icon">
                    <img src="../gambar/time_icon.png" alt="time icon">
                </div>
            </div>

            <div class="box3">
                <div class="text">
                    <h2>Pendapatan</h2>
                    <h4>Hari ini: Rp900.000</h4>
                    <h4>Minggu ini: Rp6.300.000</h4>
                </div>

                <div class="icon">
                    <img src="../gambar/money_icon.png" alt="money">
                </div>
            </div>
        </div>
    </div>

    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Pemesanan Terbaru</h1>
            </div>

            <div class="table_link">
                <h4><a href="datapemesanan.php">Selengkapnya</a></h4>
                <img src="../gambar/right_arrow.png" alt="icon arrow">
            </div>
        </div>

        <div class="tabel-container">
            <table>
                <thead>
                    <tr>
                        <th>Penyewa</th>
                        <th>Lapangan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="dot red"></span>Lebron</td>
                        <td>Basket</td>
                        <td>21 Agustus 2025</td>
                        <td>Belum Diproses</td>
                        <td>07.00 - 08.00</td>
                    </tr>
                    <tr>
                        <td><span class="dot red"></span>Curry</td>
                        <td>Basket</td>
                        <td>21 Agustus 2025</td>
                        <td>Belum Diproses</td>
                        <td>21.00 - 23.00</td>
                    </tr>
                    <tr>
                        <td><span class="dot red"></span>Kageyama</td>
                        <td>Voli</td>
                        <td>20 Agustus 2025</td>
                        <td>Belum Diproses</td>
                        <td>17.00 - 21.00</td>
                    </tr>
                    <tr>
                        <td><span class="dot orange"></span>Firdaus</td>
                        <td>Badminton</td>
                        <td>17 Agustus 2025</td>
                        <td>Diproses</td>
                        <td>22.00 - 23.00</td>
                    </tr>
                    <tr>
                        <td><span class="dot green"></span>Ridwan</td>
                        <td>Futsal</td>
                        <td>17 Agustus 2025</td>
                        <td>Sudah Diproses</td>
                        <td>21.00 - 22.00</td>
                    </tr>
                    <tr>
                        <td><span class="dot green"></span>Agus</td>
                        <td>Futsal</td>
                        <td>17 Agustus 2025</td>
                        <td>Sudah Diproses</td>
                        <td>20.00 - 21.00</td>
                    </tr>
                    <tr>
                        <td><span class="dot green"></span>Jono</td>
                        <td>Basket</td>
                        <td>17 Agustus 2025</td>
                        <td>Sudah Diproses</td>
                        <td>18.00 - 19.00</td>
                    </tr>
                    <tr>
                        <td><span class="dot green"></span>Huta</td>
                        <td>Basket</td>
                        <td>17 Agustus 2025</td>
                        <td>Sudah Diproses</td>
                        <td>17.00 - 18.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>