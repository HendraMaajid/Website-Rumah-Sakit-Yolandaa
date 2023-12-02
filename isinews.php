<?php
    include "koneksi.php";
    session_start();
    $id_news = $_SESSION['id_news'];
    $read = mysqli_query($conn, "SELECT * FROM news WHERE id_news = '$id_news'");
    $row = mysqli_fetch_array($read);

    if(isset($_GET['id_delete'])){
        $id = $_GET['id_delete'];
        $read = "SELECT * FROM news WHERE id_news = '$id'";
        $query = mysqli_query($conn, $read);
        $row1 = mysqli_fetch_array($query);
        $gambar = $row1['foto'];
        unlink($gambar);
        $sql = "DELETE FROM news WHERE id_news = '$id'";
        $query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("berita berhasil dihapus");
                document.location = "news.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("berita gagal dihapus");
                document.location = "news.php";
            </script>
            <?php
        }
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
        <div class="container-news">
            <h2><?php echo $row['judul'] ?></h2>
            <div class="gambarberita"><img src="<?php echo $row['foto'] ?>" alt=""></div>
            <div class="isiberita">
                <p><?php echo nl2br($row['konten']); ?></p>
                <?php
                    // Cek apakah session role adalah 'owner' atau 'operator'
                    if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['owner', 'operator'])) {
                        ?>
                        <a href="editnews.php?id=<?php echo $row['id_news']; ?>" class="update"><button>Update</button></a>
                        <a href="isinews.php?id_delete=<?php echo $row['id_news']; ?>" class="delete"><button>Delete</button></a>
                        <?php 
                    }
                ?>
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
    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>