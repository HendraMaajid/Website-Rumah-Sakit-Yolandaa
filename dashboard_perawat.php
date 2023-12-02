<?php
    session_start();
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
    $read = "SELECT * FROM perawat WHERE username = '$_SESSION[username]'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    if (isset($_SESSION['role']) && $_SESSION['role'] != "perawat") {
        header("Location: login.php");
        exit(); // Ensure that the script stops executing after redirection.
    }
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM perawat WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $_SESSION['id_perawat'] = $row['id_perawat'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link type="text/css" rel="stylesheet" href="style/dashboard_profile.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="sidebar">
                <div class="top-sidebar">
                    <img src="<?php echo $row['foto'] ?>" alt="fotoprofil">
                    <h4><?php echo $_SESSION['username']; ?></h4> 
                    <h6><?php echo $_SESSION['role'];?></h6>
                </div>
                <div class="bottom-sidebar">
                    <button>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 1.6C7.05701 1.6 6.15264 1.93714 5.48584 2.53726C4.81905 3.13737 4.44444 3.95131 4.44444 4.8C4.44444 5.64869 4.81905 6.46263 5.48584 7.06274C6.15264 7.66286 7.05701 8 8 8C8.94299 8 9.84736 7.66286 10.5142 7.06274C11.181 6.46263 11.5556 5.64869 11.5556 4.8C11.5556 3.95131 11.181 3.13737 10.5142 2.53726C9.84736 1.93714 8.94299 1.6 8 1.6ZM2.66667 4.8C2.66667 3.52696 3.22857 2.30606 4.22876 1.40589C5.22896 0.505713 6.58551 0 8 0C9.41449 0 10.771 0.505713 11.7712 1.40589C12.7714 2.30606 13.3333 3.52696 13.3333 4.8C13.3333 6.07304 12.7714 7.29394 11.7712 8.19411C10.771 9.09429 9.41449 9.6 8 9.6C6.58551 9.6 5.22896 9.09429 4.22876 8.19411C3.22857 7.29394 2.66667 6.07304 2.66667 4.8ZM4.44444 12.8C3.7372 12.8 3.05892 13.0529 2.55883 13.5029C2.05873 13.953 1.77778 14.5635 1.77778 15.2C1.77778 15.4122 1.68413 15.6157 1.51743 15.7657C1.35073 15.9157 1.12464 16 0.888889 16C0.653141 16 0.427048 15.9157 0.260349 15.7657C0.0936505 15.6157 0 15.4122 0 15.2C0 14.1391 0.468253 13.1217 1.30175 12.3716C2.13524 11.6214 3.2657 11.2 4.44444 11.2H11.5556C12.7343 11.2 13.8648 11.6214 14.6983 12.3716C15.5317 13.1217 16 14.1391 16 15.2C16 15.4122 15.9064 15.6157 15.7397 15.7657C15.573 15.9157 15.3469 16 15.1111 16C14.8754 16 14.6493 15.9157 14.4826 15.7657C14.3159 15.6157 14.2222 15.4122 14.2222 15.2C14.2222 14.5635 13.9413 13.953 13.4412 13.5029C12.9411 13.0529 12.2628 12.8 11.5556 12.8H4.44444Z" fill="#0D0D0D"/>
                            </svg>
                            <a href="dashboard_perawat.php">Profil</a>
                    </button>     
                    <button>  
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.4 1.6C5.55131 1.6 4.73737 1.93714 4.13726 2.53726C3.53714 3.13737 3.2 3.95131 3.2 4.8C3.2 5.64869 3.53714 6.46263 4.13726 7.06274C4.73737 7.66286 5.55131 8 6.4 8C7.24869 8 8.06263 7.66286 8.66274 7.06274C9.26286 6.46263 9.6 5.64869 9.6 4.8C9.6 3.95131 9.26286 3.13737 8.66274 2.53726C8.06263 1.93714 7.24869 1.6 6.4 1.6ZM1.6 4.8C1.6 3.52696 2.10571 2.30606 3.00589 1.40589C3.90606 0.505713 5.12696 0 6.4 0C7.67304 0 8.89394 0.505713 9.79411 1.40589C10.6943 2.30606 11.2 3.52696 11.2 4.8C11.2 6.07304 10.6943 7.29394 9.79411 8.19411C8.89394 9.09429 7.67304 9.6 6.4 9.6C5.12696 9.6 3.90606 9.09429 3.00589 8.19411C2.10571 7.29394 1.6 6.07304 1.6 4.8ZM15.7312 7.4024C15.8896 7.54335 15.9856 7.7414 15.998 7.95306C16.0105 8.16471 15.9384 8.37266 15.7976 8.5312L13.6648 10.9312C13.5897 11.0157 13.4976 11.0833 13.3946 11.1296C13.2915 11.1759 13.1798 11.1998 13.0668 11.1998C12.9538 11.1998 12.8421 11.1759 12.739 11.1296C12.636 11.0833 12.5439 11.0157 12.4688 10.9312L11.4024 9.7312C11.2697 9.57157 11.2042 9.3666 11.2199 9.1596C11.2355 8.9526 11.3309 8.75977 11.4861 8.62186C11.6413 8.48394 11.8439 8.41174 12.0513 8.4205C12.2587 8.42926 12.4546 8.51829 12.5976 8.6688L13.0664 9.196L14.6024 7.468C14.7435 7.30972 14.9416 7.21391 15.1532 7.20161C15.3649 7.18931 15.5728 7.26153 15.7312 7.4024ZM3.6 12.8C2.592 12.8 1.6 13.7704 1.6 15.2C1.6 15.4122 1.51571 15.6157 1.36569 15.7657C1.21566 15.9157 1.01217 16 0.8 16C0.587827 16 0.384344 15.9157 0.234315 15.7657C0.0842854 15.6157 0 15.4122 0 15.2C0 13.0944 1.5144 11.2 3.6 11.2H9.2C11.2856 11.2 12.8 13.0944 12.8 15.2C12.8 15.4122 12.7157 15.6157 12.5657 15.7657C12.4157 15.9157 12.2122 16 12 16C11.7878 16 11.5843 15.9157 11.4343 15.7657C11.2843 15.6157 11.2 15.4122 11.2 15.2C11.2 13.7704 10.208 12.8 9.2 12.8H3.6Z" fill="#0D0D0D"/>
                            </svg>
                            <a href="viewpasien_perawat.php">Pasien</a>
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
                <h1>Profile</h1>
                <div class="kotak-biodata">
                    <p class="sub-judul">
                        <strong>Biodata</strong>  
                        <?php if ($_SESSION['role'] == 'perawat') {
                         echo "<a href='editperawat1.php?id=$row[id_perawat]'><span><button>Update Data</button></span></a>";
                        }
                        ?>
                    </p>
                    <div class="kotak-biodata-atas">
                        <div class="kotak-biodata-atas-kiri">
                            <img src="<?php echo $row['foto'] ?>" alt="foto profil" class="foto-profil">
                        </div>
                        <div class="kotak-biodata-atas-kanan">
                            <table class="tabel-biodata">
                                <tr class="tabelbio">
                                    <td class="kolom1">Nama</td>
                                    <td class="kolom2">:</td>
                                    <td><?php echo $row['nama_perawat']; ?></td>
                                </tr>
                                <tr class="tabelbio">
                                   <td class="kolom1">Id Pegawai</td>
                                   <td class="kolom2">:</td>
                                   <td><?php echo $row['id_perawat']; ?></td>
                               </tr>
                               <tr class="tabelbio">
                                    <td class="kolom1">Tanggal Lahir</td>
                                    <td class="kolom2">:</td>
                                    <td><?php echo $row['tanggal_lahir']; ?></td>
                                </tr>
                                <tr class="tabelbio">
                                    <td class="kolom1">Alamat</td>
                                    <td class="kolom2">:</td>
                                    <td><?php echo $row['alamat']; ?></td>
                                </tr>
                                <tr class="tabelbio">
                                    <td class="kolom1">No.Telp</td>
                                    <td class="kolom2">:</td>
                                    <td><?php echo $row['no_hp']; ?></td>
                                </tr>
                                <tr class="tabelbio">
                                    <td class="kolom1">Email</td>
                                    <td class="kolom2">:</td>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                     <div class="kotak-biodata-bawah">
                        <div class="kotak-data-bawah">
                            <h3>Daftar Pasien</h3>
                            <table class="tabeldata-dokter">
                            <tr>
                                <th class="table-header" >Nama Pasien</th>
                                <th class="table-header">Jam Datang</th>
                                <th class="table-header">Tanggal Datang</th>
                                <th class="table-header">Ruang</th>
                            </tr>
                                <?php
                                    $now = date("Y-m-d");
                                    $time = date("H:i:s");
                                    $total_rows_to_display = 3;
                                    $current_row = 0;

                                     $s = "SELECT pasien.*, merawat.*, pesan_kamar.*, ruang.*
                                    FROM perawat
                                    JOIN merawat ON perawat.id_perawat = merawat.id_perawat
                                    JOIN pasien ON merawat.no_rekam_medis = pasien.no_rekam_medis
                                    JOIN pesan_kamar ON pasien.no_rekam_medis = pesan_kamar.no_rekam_medis
                                    JOIN ruang ON pesan_kamar.id_ruang = ruang.id_ruang
                                    WHERE merawat.tgl_masuk_rawat >= CURDATE() 
                                        AND pesan_kamar.tgl_masuk >= CURDATE() 
                                        AND perawat.id_perawat = '$row[id_perawat]'
                                    ORDER BY merawat.tgl_masuk_rawat ASC";
                                    $q = mysqli_query($conn, $s);

                                    if (mysqli_num_rows($q) > 0) {
                                        while ($row1 = mysqli_fetch_array($q)) {
                                            echo "<tr>";
                                            echo "<td>$row1[nama_pasien]</td>";
                                            echo "<td>$row1[jam_datang]</td>";
                                            echo "<td>$row1[tgl_masuk_rawat]</td>";
                                            echo "<td>$row1[nama_ruang]</td>";
                                            echo "</tr>";
                                            $current_row++;
                                            if ($current_row >= $total_rows_to_display) {
                                                break;
                                            }
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo "<td colspan='4'>Tidak ada pasien yang sedang anda rawat</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </table>
                            <?php
                            if(mysqli_num_rows($q) > 0){
                                echo "<a class='view-all-pasien' href='viewpasien_perawat.php' >view all</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <!-- nunggu homepage -->

        </div>
    </div>
</body>
</html>