<?php
include 'koneksi.php';
session_start();
 date_default_timezone_set('Asia/Jakarta');
    $read = "SELECT * FROM perawat WHERE username = '$_SESSION[username]'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);
    $now = date("Y-m-d");

    $s = "SELECT pasien.*, merawat.*, pesan_kamar.*, ruang.*
        FROM perawat
        JOIN merawat ON perawat.id_perawat = merawat.id_perawat
        JOIN pasien ON merawat.no_rekam_medis = pasien.no_rekam_medis
        JOIN pesan_kamar ON pasien.no_rekam_medis = pesan_kamar.no_rekam_medis
        JOIN ruang ON pesan_kamar.id_ruang = ruang.id_ruang
        WHERE merawat.tgl_masuk >= CURDATE()  AND perawat.id_perawat = '$row[id_perawat]'
        AND pasien.nama_pasien LIKE '%$search_query%'
        GROUP BY pasien.no_rekam_medis;";

    $q = mysqli_query($conn, $s);

    if (mysqli_num_rows($q) > 0) {
        while ($row1 = mysqli_fetch_array($q)) {
            echo "<tr>";
            echo "<td>$row1[nama_pasien]</td>";
            echo "<td>$row1[jam_datang]</td>";
            echo "<td>$row1[tgl_masuk]</td>";
            echo "<td>$row1[nama_ruang]</td>";
            echo "<td><a class='link-delete'  href='viewpasien_perawat.php?id=$row1[id_perawatan]'>selesai</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='5'>Tidak ada hasil pencarian</td>";
        echo "</tr>";
    }
}
?>
