<?php
    session_start();
    include "koneksi.php";

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }

    if (!isset($_SESSION['role']) || ($_SESSION['role'] != "operator" && $_SESSION['role'] != "owner")) {
        header("Location: login.php");
        exit();
    }

    if($_SESSION['role']=="operator"){
        $read = "SELECT * FROM staff_operator WHERE username = '$_SESSION[username]'";
        $query = mysqli_query($conn, $read);
        $row = mysqli_fetch_array($query);
    }
    if($_SESSION['role']=="owner"){
        $read = "SELECT * FROM owner WHERE username = '$_SESSION[username]'";
        $query = mysqli_query($conn, $read);
        $row = mysqli_fetch_array($query);
    }

    if(isset($_SESSION['role'])) {
        $role = $_SESSION['role'];

        // Dynamically generate the link based on the user's role
        if($role === 'operator') {
            $profileLink = 'dashboard_operator.php';
        } elseif($role === 'owner') {
            $profileLink = 'dashboard_owner.php';
        }
    }

    $id = $_GET['id'];
    $read = mysqli_query($conn, "SELECT * FROM news WHERE id_news = '$id'");
    $row2 = mysqli_fetch_array($read);

     if(isset($_POST['update'])){
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
            $update="UPDATE news SET judul = '$judul', konten = '$isi', foto = '$upload' WHERE id_news = '$id'";
            $query= mysqli_query($conn, $update);
        } else {
            $update="UPDATE news SET judul = '$judul', konten = '$isi' WHERE id_news = '$id'";
            $query= mysqli_query($conn, $update);
        }
        if($query){
            ?>
            <script>
                alert("berita berhasil di update");
                location = "news.php";
            </script>
            <?php
        }
    }


    if($row2['id_news']!="") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link type="text/css" rel="stylesheet" href="style/insert.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="sidebar">
                <div class="top-sidebar">
                    <img src="<?php echo $row['foto'] ?>" alt="fotoprofil" class="img-icon">
                    <h4><?php echo $_SESSION['username']; ?></h4> 
                    <h6><?php echo $_SESSION['role'];?></h6>
                </div>
                <div class="bottom-sidebar">
                    <button>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 1.6C7.05701 1.6 6.15264 1.93714 5.48584 2.53726C4.81905 3.13737 4.44444 3.95131 4.44444 4.8C4.44444 5.64869 4.81905 6.46263 5.48584 7.06274C6.15264 7.66286 7.05701 8 8 8C8.94299 8 9.84736 7.66286 10.5142 7.06274C11.181 6.46263 11.5556 5.64869 11.5556 4.8C11.5556 3.95131 11.181 3.13737 10.5142 2.53726C9.84736 1.93714 8.94299 1.6 8 1.6ZM2.66667 4.8C2.66667 3.52696 3.22857 2.30606 4.22876 1.40589C5.22896 0.505713 6.58551 0 8 0C9.41449 0 10.771 0.505713 11.7712 1.40589C12.7714 2.30606 13.3333 3.52696 13.3333 4.8C13.3333 6.07304 12.7714 7.29394 11.7712 8.19411C10.771 9.09429 9.41449 9.6 8 9.6C6.58551 9.6 5.22896 9.09429 4.22876 8.19411C3.22857 7.29394 2.66667 6.07304 2.66667 4.8ZM4.44444 12.8C3.7372 12.8 3.05892 13.0529 2.55883 13.5029C2.05873 13.953 1.77778 14.5635 1.77778 15.2C1.77778 15.4122 1.68413 15.6157 1.51743 15.7657C1.35073 15.9157 1.12464 16 0.888889 16C0.653141 16 0.427048 15.9157 0.260349 15.7657C0.0936505 15.6157 0 15.4122 0 15.2C0 14.1391 0.468253 13.1217 1.30175 12.3716C2.13524 11.6214 3.2657 11.2 4.44444 11.2H11.5556C12.7343 11.2 13.8648 11.6214 14.6983 12.3716C15.5317 13.1217 16 14.1391 16 15.2C16 15.4122 15.9064 15.6157 15.7397 15.7657C15.573 15.9157 15.3469 16 15.1111 16C14.8754 16 14.6493 15.9157 14.4826 15.7657C14.3159 15.6157 14.2222 15.4122 14.2222 15.2C14.2222 14.5635 13.9413 13.953 13.4412 13.5029C12.9411 13.0529 12.2628 12.8 11.5556 12.8H4.44444Z" fill="#0D0D0D"/>
                            </svg>
                            <a href="<?php echo $profileLink; ?>">Profil</a>
                    </button>      
                    <button>  
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.4 1.6C5.55131 1.6 4.73737 1.93714 4.13726 2.53726C3.53714 3.13737 3.2 3.95131 3.2 4.8C3.2 5.64869 3.53714 6.46263 4.13726 7.06274C4.73737 7.66286 5.55131 8 6.4 8C7.24869 8 8.06263 7.66286 8.66274 7.06274C9.26286 6.46263 9.6 5.64869 9.6 4.8C9.6 3.95131 9.26286 3.13737 8.66274 2.53726C8.06263 1.93714 7.24869 1.6 6.4 1.6ZM1.6 4.8C1.6 3.52696 2.10571 2.30606 3.00589 1.40589C3.90606 0.505713 5.12696 0 6.4 0C7.67304 0 8.89394 0.505713 9.79411 1.40589C10.6943 2.30606 11.2 3.52696 11.2 4.8C11.2 6.07304 10.6943 7.29394 9.79411 8.19411C8.89394 9.09429 7.67304 9.6 6.4 9.6C5.12696 9.6 3.90606 9.09429 3.00589 8.19411C2.10571 7.29394 1.6 6.07304 1.6 4.8ZM15.7312 7.4024C15.8896 7.54335 15.9856 7.7414 15.998 7.95306C16.0105 8.16471 15.9384 8.37266 15.7976 8.5312L13.6648 10.9312C13.5897 11.0157 13.4976 11.0833 13.3946 11.1296C13.2915 11.1759 13.1798 11.1998 13.0668 11.1998C12.9538 11.1998 12.8421 11.1759 12.739 11.1296C12.636 11.0833 12.5439 11.0157 12.4688 10.9312L11.4024 9.7312C11.2697 9.57157 11.2042 9.3666 11.2199 9.1596C11.2355 8.9526 11.3309 8.75977 11.4861 8.62186C11.6413 8.48394 11.8439 8.41174 12.0513 8.4205C12.2587 8.42926 12.4546 8.51829 12.5976 8.6688L13.0664 9.196L14.6024 7.468C14.7435 7.30972 14.9416 7.21391 15.1532 7.20161C15.3649 7.18931 15.5728 7.26153 15.7312 7.4024ZM3.6 12.8C2.592 12.8 1.6 13.7704 1.6 15.2C1.6 15.4122 1.51571 15.6157 1.36569 15.7657C1.21566 15.9157 1.01217 16 0.8 16C0.587827 16 0.384344 15.9157 0.234315 15.7657C0.0842854 15.6157 0 15.4122 0 15.2C0 13.0944 1.5144 11.2 3.6 11.2H9.2C11.2856 11.2 12.8 13.0944 12.8 15.2C12.8 15.4122 12.7157 15.6157 12.5657 15.7657C12.4157 15.9157 12.2122 16 12 16C11.7878 16 11.5843 15.9157 11.4343 15.7657C11.2843 15.6157 11.2 15.4122 11.2 15.2C11.2 13.7704 10.208 12.8 9.2 12.8H3.6Z" fill="#0D0D0D"/>
                            </svg>
                            <a href="viewpasien_operator.php">Pasien</a>
                    </button>
                    <button>  
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                            <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                            <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                            <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                            </svg>
                            <a href="viewdokter_operator.php">Dokter</a>
                    </button>
                    <button>  
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
                            <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                            </svg>
                            <a href="viewperawat_operator.php">Perawat</a>
                    </button>
                    <?php
                    if ($_SESSION['role'] == 'owner') {
                        echo '<button>';
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">';
                        echo '<path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>';
                        echo '<path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>';
                        echo '</svg>';
                        echo '<a href="viewoperator.php">Operator</a>';
                        echo '</button>';
                    }
                    ?>
                    <button>  
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"/>
                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"/>
                            </svg>
                            <a href="viewakun.php">Akun</a>
                    </button>
                    <button>  
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                            <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                            <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                            </svg>
                            <a href="viewruang_operator.php">Ruang</a>
                    </button>
                    <button>  
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                            </svg>
                            <a href="addnews.php">Berita</a>
                    </button>
                    <button>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="16" height="16" fill="url(#pattern0)"/>
                            <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_1_2" transform="scale(0.0111111)"/>
                            </pattern>
                            <image id="image0_1_2" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAACSElEQVR4nO2dTWoVQRSFPx3kKbgB4w6jZqg7UHDiwFFG7sGBuIKYDDRuQhAcaSLB0ZEHNXAgCfK66p7XdT44w26qPi63f6rohhBCCCGEEEJYCRvgGDgDrgDtSa7amJ8AB5jzCPhiIE075qLNxbaS1yBZLZ9dK/vYQI4WzmMMOTcQo4XzEUMuDcRo4WznZIdWGjuqhSii62UpFV0vUmkdWMSOaiGK6HpZSkXXi1RaBxaxo1qIIrpellLR9SKV1oFF7KgWooiul6VU9Dpax33gpC3wfgdetaW9tA6WFX3yj+Pe95I9a0XfuWF1qYvsmVvHzxuOX1z2zKJf33KORWXPLHrTZA6RPbNo2mabd7ec6wNwjx2ZXfQw2dVCZCB6iOxqITIR3V12tRAZie4qu1qIzER3kz1y8r+BZ8DhjiJc5vVft34jRT/v67ZkXi/dBiTgYV+3JfP65jYgDWoZo+f11W1AWmnreOE2ILWL4VZ2LoYrytS3d9oD0Xlgob/oPILTv6LzUon+rSOvSenfo/Pin/4XwyxlMeau480t58jiLLuLvgv8GiWZhe9dtWeir0dJnln0lrejJDO56AdN9nXbHrbdUJNNjiwv+u99eN2ZuaKHUi1EEV0vS6noepFK68AidlQLUUTXy1Iqul6k0jqwiB3VQhTR9bKUiq4XqbQOLGJHtRDNInqNH4H9gSFnBmK0cE4x5KmBGC2cIwzZtG/jayX55PrpedoPCC5WIvkQcw7aLzZO9+wCednGfORcySGEEEIIIYRABX8AauG3G/2c6pcAAAAASUVORK5CYII="/>
                            </defs>
                            </svg>
                            <a href="logout.php">Log out</a>
                    </button>
                    
                    
                </div>
            </div>
            <div class="isi_content">
                <!--isi konten disini cuy janhgan ubah atas soalnya layout-->
                <h1>Tambah Berita</h1>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                       <label for="judul">Judul Berita:</label>
                        <input type="text" id="judul" name="judul" value="<?php echo $row2['judul'] ?>" required>
                        <br>
                        <img src="<?php echo $row2['foto'] ?>" alt="fotoprofil" height="300" width="400"> <br>
                        <label for="foto">Gambar Berita:</label>
                        <input type="file" id="foto" name="foto" required>
                        <br>
                        <label for="isi">Isi Berita:</label>
                        <textarea id="isi" name="isi" rows="6" required>
                            <?php echo $row2['konten'] ?>
                        </textarea>
                        <input type="submit" value="Update Berita" class="tambahberita" name="update">
                    </form>
            </div>
        </div>
        <div class="footer">
            <!-- nunggu homepage -->
            
        </div>
    </div>
    <script src="script/select.js"></script>
</body>
</html>
<?php
    }
?>