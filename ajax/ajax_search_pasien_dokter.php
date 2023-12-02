<?php
include 'koneksi.php';
session_start();

date_default_timezone_set('Asia/Jakarta');
if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);
    $read = "SELECT * FROM dokter WHERE username = '$_SESSION[username]';";
    $qread = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($qread);
    $now = date("Y-m-d");

    $s = "SELECT dokter.nama_dokter, pasien.nama_pasien, konsultasi.*, pesan_kamar.*, ruang.*
        FROM konsultasi
        JOIN dokter ON konsultasi.id_dokter = dokter.id_dokter
        JOIN pasien ON konsultasi.no_rekam_medis = pasien.no_rekam_medis
        JOIN pesan_kamar ON pasien.no_rekam_medis = pesan_kamar.no_rekam_medis
        JOIN ruang on pesan_kamar.id_ruang = ruang.id_ruang
        WHERE dokter.id_dokter = '$row[id_dokter]'
        AND konsultasi.tgl_konsultasi >= '$now'
        AND pesan_kamar.tgl_keluar IS NULL
        AND pasien.nama_pasien LIKE '%$search_query%';";

    $q = mysqli_query($conn, $s);

    if (mysqli_num_rows($q) > 0) {
        while ($row1 = mysqli_fetch_array($q)) {
            echo "<tr>";
            echo "<td>$row1[nama_pasien]</td>";
            echo "<td>$row1[keluhan]</td>";
            echo "<td>$row1[nama_ruang]</td>";
            echo "<td>$row1[jam_konsultasi]</td>";
            echo "<td>$row1[tgl_konsultasi]</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='5'>Tidak ada hasil pencarian</td>";
        echo "</tr>";
    }
}
?>
