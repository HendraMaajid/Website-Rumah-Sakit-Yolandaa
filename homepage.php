<?php
    include "koneksi.php";
    session_start();
    $read = mysqli_query($conn, "SELECT * FROM news");
    if (isset($_POST['submit'])) {
        $id_news = $_POST['id'];
        $_SESSION['id_news'] = $id_news;
        header("Location: isinews.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="navigasi">
        <nav class="wrapper">
            <a href="homepage.php">
                <div class="nama">
                    <img src="image/logo.png" alt="image/logo.png">
                    <div class="firstname">YOLANDAA</div>
                    <div class="lastname">HOSPITAL</div>
                </div>
            </a>
            <ul class="menu">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="news.php">News</a></li>
                <?php
                    if (isset($_SESSION['role']) && !empty($_SESSION['role'])) {
                        // Jika ada nilai pada $_SESSION['role']

                        $role = $_SESSION['role'];

                        // Menentukan URL sesuai dengan peran (role)
                        $dashboardUrl = '';
                        if ($role == 'owner') {
                            $dashboardUrl = 'dashboard_owner.php';
                        } elseif ($role == 'operator') {
                            $dashboardUrl = 'dashboard_operator.php';
                        } elseif ($role == 'dokter') {
                            $dashboardUrl = 'dashboard_dokter.php';
                        } elseif ($role == 'perawat') {
                            $dashboardUrl = 'dashboard_perawat.php';
                        } elseif ($role == 'pasien') {
                            $dashboardUrl = 'dashboard_pasien.php';
                        }

                        // Tampilkan tombol Dashboard dengan URL sesuai peran (role)
                        echo '<li><a href="' . $dashboardUrl . '">Dashboard</a></li>';
                    }

                    // Pemeriksaan untuk menentukan apakah tombol Login harus ditampilkan
                    if (!isset($_SESSION['role']) || empty($_SESSION['role'])) {
                        // Jika tidak ada nilai, tampilkan tombol Login
                        echo '<li><a href="login.php" class="active">Login</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </div>
    <div class="konten">
        <div class="kontenkiri">
            <div class="sambutan">
                <p>Selamat Datang!</p><br>
                <h1>Yolandaa Hospital</h1>
                <p>Kami siap membantu anda kapanpun dengan layanan terbaik kami!</p><br><br>
                <a href="register.php"><button class="signup">Sign Up!</button></a>
            </div>
        </div>
        <div class="kontenkanan">
            <img src="image/hospital.png" alt="">
        </div>
    </div>
    <div class="kotak-berita">
        <div class="menu-berita">
            <h2>Yolandaa Hospital News</h2>
        </div>
            <div class="bungkus-berita">
        <?php
        $total_rows_to_display = 3;
        $current_row = 0;
        while($row = mysqli_fetch_array($read)) {
        ?>
            <div class="box1">
                <div class="box2"><a href=""><img src="<?php echo $row['foto']; ?>" alt="image/berita 1.jpg"></a></div>
                <div class="box3">
                    <h4><?php echo $row['judul'] ?></h4>
                    <p>
                        <?php
                        // Menampilkan hanya 300 karakter pertama dari konten
                        echo substr($row['konten'], 0, 230);

                        // Menambahkan elipsis jika konten lebih panjang dari 300 karakter
                        if (strlen($row['konten']) > 230) {
                            echo '...';
                        }
                        ?>
                    </p>
                </div>
                <div class="box4">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id_news']; ?>">
                        <button type="submit" class="readmore" name="submit">Readmore &nbsp;></button>
                    </form>
                </div>
            </div>
        <?php

            $current_row++;
            if ($current_row >= $total_rows_to_display) {
                break;
            }
        }
        ?>
    </div>
    </div>
    <div class="container-layanan">
        <div class="card-layanan">
            <div class="header-layanan">
                <img src="image/doktor.jpg" alt="image/doktor.jpg">
            </div>
            <div class="konten-layanan">
                <h3>Dokter Spesialis</h3>
                <p>Dokter spesialis yang ahli dalam bidangnya, dengan pengetahuan serta pengalaman yang luas.</p>
            </div>
        </div>
        <div class="card-layanan">
            <div class="header-layanan">
                <img src="image/pelayanan.jpg" alt="image/pelayanan.jpg">
            </div>
            <div class="konten-layanan">
                <h3>Pelayanan Terbaik</h3>
                <p>Memberikan pelayanan terbaik adalah komitmen kami, serta pengalaman pasien adalah prioritas kami.</p>
            </div>
        </div>
        <div class="card-layanan">
            <div class="header-layanan">
                <img src="image/murah.jpg" alt="image/murah.jpg">
            </div>
            <div class="konten-layanan">
                <h3>Biaya Terjangkau</h3>
                <p>Meyediakan pelayanan yang berkualitas dengan biaya terjangkau, kesehatan tetaplah prioritas kami.</p>
            </div>
        </div>
    </div>
    <div class="footer-konten">
        <h3>Yolandaa Hospital</h3>
        <p>Kami siap membantu anda kapanpun dengan layanan terbaik kami!</p>
        <p>Contact : 082415764985</p>
        <ul class="sosmed">
            <li><a href=""><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href=""><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href=""><ion-icon name="logo-twitter"></ion-icon></a></li>
        </ul>
        <div class="footer-bottom">
            <p>Copyright &copy;2023 Designed by <span>Yolandaa Hospital</span></p>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>