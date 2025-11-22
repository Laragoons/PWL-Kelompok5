<h1>EAA Sportstime</h1>
<p> EEA Sportstime adalah sebuah website yang dikembangkan untuk menyelesaikan berbagai permasalahan yang ada saat memesan lapangan olahraga, website ini mempermudah pemesanan berbagai lapangan olahraga dengan memberikan kemudahan bagi pengguna yang ingin memesan lapangan dengan efisien secara online. Kami menyediakan 4 jenis lapangan olahraga yaitu badminton, voli, futsal dan basket. </p>

<h2>Instalasi Project dan Set-Up Database EAA_Sports</h2>
<p><b>1. Download File MySql</b><p>
<p> Tekan file eaa_sports.sql yang ada di git hub repository dan download</p>
<p><b>2. Masuk ke Database</b><p>
<p> Masuk ke database lewat Laragon, setelah itu isi username dengan root dan kosongkan password</p>
<p><b>3. Menambahkan Database</b><p>
<p> Tekan tombol "New" dan masukkan nama database yaitu eaa_sports, setelah itu tekan "Create"</p>
<p><b>4. Import File MySql</b></p>
<p> Tekan tombol "Import" dan masukkan file MySql yang sudah didownload dan tekan tombol "Import" yang ada di bawah</p>
<p><b>5. Git Clone</b></p>
<p> Di terminal laragon ketik "git clone https://github.com/Laragoons/PWL-Kelompok5.git" </p>
<p><b>6. Pindah Directory</b></p>
<p> Ketik cd PWL-Kelompok5</p>
<p><b>7. Jalankan Local Host</b></p>
<p> Ketik "php -S localhost:xxxx"</p>
<p><b>8. Buka Aplikasi</b></p>
<p> Paste "http://localhost:8000/pages/home.php" pada browser untuk masuk ke halaman aplikasi</p>

<h2>Fitur Utama</h2>
<p><b>1. Pengguna dapat mengecek jadwal keempat lapangan dan melihat jam yang sudah dibooking atau belum.</b></p>
<p><b>2. Pengguna dapat melakukan booking lapangan sampai dengan 7 hari kedepan dan memilih jam kosong sesuai dengan keiinginan.</b></p>
<p><b>3. Pengguna disuguhkan dengan tampilan desain UI/UX yang modern dan sederhana sehingga memberikan kenyamanan bagi pengguna.</b></p>
<p><b>4. Pengguna dapat melakukan booking lapangan sampai dengan 7 hari kedepan dan memilih jam kosong sesuai dengan keiinginan.</b></p>
<p><b>5. Admin dapat mengakses halaman admin panel untuk melihat dashboard berisikan data-data pengguna yang sudah booking.</b></p>
<p><b>6. Admin dapat mengakses halaman data pemesanan untuk melihat pesanan lengkap serta mengelola status booking menjadi "Diproses" dan "Sudah Diproses" yang dapat membantu dalam mengelola aplikasi.</b></p>

<h2>Entitas Yang Digunakan</h2>
<p>Proyek ini menggunakan 3 entitas utama  untuk mengelola pengguna, lapangan, dan proses pemesanan:</p>
<ul>
    <li><b>Users (Pengguna):</b> Entitas ini menyimpan data seluruh pengguna aplikasi, termasuk pelanggan dan admin, yang diperlukan untuk proses login/register.</li>
    <li><b>Courts (Lapangan):</b> Entitas ini menyimpan jenis lapangan olahraga yang tersedia untuk dipesan (Badminton, Voli, Futsal, Basket) beserta data detailnya.</li>
    <li><b>Bookings (Pemesanan):</b> Entitas ini menyimpan detail setiap transaksi pemesanan, mencakup tanggal, waktu mulai, waktu selesai, status pemesanan, serta relasi ke Users dan lapangan mana yang dipesan.</li>
</ul>

<h2>Cara Penggunaan</h2>
<p><b>Pengguna</b><p>
<p>1. Pengguna masuk ke home page.</p>
<p>2. Pengguna membuat akun di halaman register.</p>
<p>3. Pengguna log in di halaman login dengan akun yang sudah dibuat.</p>
<p>4. Pengguna kembali ke home page dan memilih lapangan olahraga yang akan dipesan.</p>
<p>5. Pengguna mengecek jadwal hari dan jam yang tersedia.</p>
<p>6. Pengguna melakukan booking dan mengisi data booking.</p>
<p>7. Pengguna mengkonfirmasi pemesanan.</p>

<p><b>Admin</b></p>
<p>1. Admin masuk ke home page</p>
<p>2. Admin log in dengan akun khusus admin yaitu dengan email "admin@gmail.com" dengan password "admin"</p>
<p>3. Admin masuk ke admin panel dan mengecek dashboard dan pemesanan terbaru</p>
<p>4. Admin masuk ke halaman data pemesanan untuk mengkonfirmasi pemesanan belum diproses, diproses, atas sudah diproses</p>

<h2>Arsitektur Project</h2>
<p><b>Frontend:</b> HTML, CSS, JavaScript</p>
<p><b>Backend:</b> PHP, MySql</p>
<p><b>Design:</b>Figma</p>

<h2>Kontributor</h2>
<p><b>Axelle Questine Farrell Then</b></p>
<p><b>Elvan Emmanuel Firdellia</b></p>
<p><b>Louis Chai</b></p>
