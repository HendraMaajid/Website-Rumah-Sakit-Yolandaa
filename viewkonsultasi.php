<?php
    session_start();
    include "koneksi.php";
    $read = "SELECT * FROM pasien WHERE username = '$_SESSION[username]'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);

    if (isset($_SESSION['role']) && $_SESSION['role'] != "pasien") {
        header("Location: login.php");
        exit(); // Ensure that the script stops executing after redirection.
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Konsultasi</title>
    <link type="text/css" rel="stylesheet" href="style/viewtabel.css">
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
                            <a href="dashboard_pasien.php">Profil</a>
                    </button>    
                    <button>
                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 7.6C4.71217 7.6 4.91566 7.51571 5.06569 7.36569C5.21571 7.21566 5.3 7.01217 5.3 6.8C5.3 6.58783 5.21571 6.38434 5.06569 6.23431C4.91566 6.08429 4.71217 6 4.5 6C4.28783 6 4.08434 6.08429 3.93431 6.23431C3.78429 6.38434 3.7 6.58783 3.7 6.8C3.7 7.01217 3.78429 7.21566 3.93431 7.36569C4.08434 7.51571 4.28783 7.6 4.5 7.6ZM6.1 6.8C6.1 6.58783 6.18429 6.38434 6.33431 6.23431C6.48434 6.08429 6.68783 6 6.9 6H9.3C9.51217 6 9.71566 6.08429 9.86569 6.23431C10.0157 6.38434 10.1 6.58783 10.1 6.8C10.1 7.01217 10.0157 7.21566 9.86569 7.36569C9.71566 7.51571 9.51217 7.6 9.3 7.6H6.9C6.68783 7.6 6.48434 7.51571 6.33431 7.36569C6.18429 7.21566 6.1 7.01217 6.1 6.8ZM6.9 8.4C6.68783 8.4 6.48434 8.48429 6.33431 8.63431C6.18429 8.78434 6.1 8.98783 6.1 9.2C6.1 9.41217 6.18429 9.61566 6.33431 9.76569C6.48434 9.91571 6.68783 10 6.9 10H9.3C9.51217 10 9.71566 9.91571 9.86569 9.76569C10.0157 9.61566 10.1 9.41217 10.1 9.2C10.1 8.98783 10.0157 8.78434 9.86569 8.63431C9.71566 8.48429 9.51217 8.4 9.3 8.4H6.9ZM6.9 10.8C6.68783 10.8 6.48434 10.8843 6.33431 11.0343C6.18429 11.1843 6.1 11.3878 6.1 11.6C6.1 11.8122 6.18429 12.0157 6.33431 12.1657C6.48434 12.3157 6.68783 12.4 6.9 12.4H9.3C9.51217 12.4 9.71566 12.3157 9.86569 12.1657C10.0157 12.0157 10.1 11.8122 10.1 11.6C10.1 11.3878 10.0157 11.1843 9.86569 11.0343C9.71566 10.8843 9.51217 10.8 9.3 10.8H6.9ZM5.3 9.2C5.3 9.41217 5.21571 9.61566 5.06569 9.76569C4.91566 9.91571 4.71217 10 4.5 10C4.28783 10 4.08434 9.91571 3.93431 9.76569C3.78429 9.61566 3.7 9.41217 3.7 9.2C3.7 8.98783 3.78429 8.78434 3.93431 8.63431C4.08434 8.48429 4.28783 8.4 4.5 8.4C4.71217 8.4 4.91566 8.48429 5.06569 8.63431C5.21571 8.78434 5.3 8.98783 5.3 9.2ZM4.5 12.4C4.71217 12.4 4.91566 12.3157 5.06569 12.1657C5.21571 12.0157 5.3 11.8122 5.3 11.6C5.3 11.3878 5.21571 11.1843 5.06569 11.0343C4.91566 10.8843 4.71217 10.8 4.5 10.8C4.28783 10.8 4.08434 10.8843 3.93431 11.0343C3.78429 11.1843 3.7 11.3878 3.7 11.6C3.7 11.8122 3.78429 12.0157 3.93431 12.1657C4.08434 12.3157 4.28783 12.4 4.5 12.4Z" fill="#0D0D0D"/>
                            <path d="M4.5 0C4.28783 0 4.08434 0.0842854 3.93431 0.234315C3.78429 0.384344 3.7 0.587827 3.7 0.8H2.1C1.67565 0.8 1.26869 0.968571 0.968629 1.26863C0.668571 1.56869 0.5 1.97565 0.5 2.4V14.4C0.5 14.8243 0.668571 15.2313 0.968629 15.5314C1.26869 15.8314 1.67565 16 2.1 16H11.7C12.1243 16 12.5313 15.8314 12.8314 15.5314C13.1314 15.2313 13.3 14.8243 13.3 14.4V2.4C13.3 1.97565 13.1314 1.56869 12.8314 1.26863C12.5313 0.968571 12.1243 0.8 11.7 0.8H10.1C10.1 0.587827 10.0157 0.384344 9.86569 0.234315C9.71566 0.0842854 9.51217 0 9.3 0H4.5ZM10.1 2.4H11.7V14.4H2.1V2.4H3.7V3.2C3.7 3.41217 3.78429 3.61566 3.93431 3.76569C4.08434 3.91571 4.28783 4 4.5 4H9.3C9.51217 4 9.71566 3.91571 9.86569 3.76569C10.0157 3.61566 10.1 3.41217 10.1 3.2V2.4ZM5.3 2.4V1.6H8.5V2.4H5.3Z" fill="#0D0D0D"/>
                            </svg>
                            <a href="bookingkonsultasi.php">Konsultasi</a>
                    </button>    
                    <button>  
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 3.5C1 2.94772 1.44772 2.5 2 2.5H8C9.6356 2.5 11.0878 3.28534 12 4.49951C12.9122 3.28534 14.3644 2.5 16 2.5H22C22.5523 2.5 23 2.94772 23 3.5V18.5C23 19.0523 22.5523 19.5 22 19.5H15C13.8954 19.5 13 20.3954 13 21.5C13 22.0523 12.5523 22.5 12 22.5C11.4477 22.5 11 22.0523 11 21.5C11 20.3954 10.1046 19.5 9 19.5H2C1.44772 19.5 1 19.0523 1 18.5V3.5ZM11 18.0351C10.4117 17.6948 9.72857 17.5 9 17.5H3V4.5H8C9.65687 4.5 11 5.84313 11 7.5V18.0351ZM13 7.5V18.0351C13.5883 17.6948 14.2714 17.5 15 17.5H21V4.5H16C14.3431 4.5 13 5.84313 13 7.5Z" fill="black" fill-opacity="0.85"/>
                            </svg>

                            <a href="pesankamar.php">Pesan Kamar</a>
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
                <h1>Jadwal Konsultasi</h1>
                        <table class="tabeldata">
                            <tr>
                                <th class="table-header">Tanggal</th>
                                <th class="table-header">Jam</th>
                                <th class="table-header">Nama Dokter</th>
                            </tr>
                            <?php 
                                $now=date("Y-m-d");
                                $time=date("H:i:s");
                                $s = "SELECT dokter.nama_dokter, pasien.nama_pasien, konsultasi.*
                                      FROM konsultasi JOIN dokter ON konsultasi.id_dokter = dokter.id_dokter
                                      JOIN pasien ON konsultasi.no_rekam_medis = pasien.no_rekam_medis WHERE pasien.no_rekam_medis = '$_SESSION[no_rekam_medis]'
                                      AND konsultasi.tgl_konsultasi >= '$date' AND konsultasi.jam_konsultasi >= '$time'";
                                $q1 = mysqli_query($conn, $s);
                                if(mysqli_num_rows($q1) > 0){
                                    while($row1=mysqli_fetch_array($q1)){
                                        echo "<tr>";
                                        echo "<td>$row1[tgl_konsultasi]</td>";
                                        echo "<td>$row1[jam_konsultasi]</td>";
                                        echo "<td>$row1[nama_dokter]</td>";
                                        echo "</tr>";
                                    }
                                }else{
                                    echo "<tr>";
                                    echo "<td colspan='3'>Tidak ada jadwal konsultasi</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                
            </div>
        </div>
        <div class="footer">
            <!-- nunggu homepage -->

        </div>
    </div>
</body>
</html>