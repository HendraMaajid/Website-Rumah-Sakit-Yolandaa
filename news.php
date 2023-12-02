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
    <title>News Yolandaa Hospital</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<div class="background">
    <div class="title">
        <h1>Yolandaa Hospital News</h1>
    </div>
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
    <div class="bungkus-berita">
        <?php
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
        }
        ?>
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
</div>
    </body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>