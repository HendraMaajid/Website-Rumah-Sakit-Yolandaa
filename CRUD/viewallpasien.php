<?php
    include "koneksi.php";
    $read ="SELECT dokter.nama_dokter, pasien.nama_pasien, konsultasi.*
    FROM
    konsultasi
    JOIN
    dokter ON konsultasi.id_dokter = dokter.id_dokter
    JOIN
    pasien ON konsultasi.no_rekam_medis = pasien.no_rekam_medis;";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View semua pasien</title>
       <style>
    table {
      border-collapse: collapse;
      border: 1px solid #000;
      margin-left: auto;
      margin-right: auto;
    }

    td, th {
      border: 1px solid #000;
      padding: 8px;
    }

    tr {
      border-bottom: 1px solid #000;
    }
    a{
        text-align: center;
    }
    </style>
</head>
<body>
    <h1 align="center">Tabel Pasien (lengkap)</h1>
    <table>
        <tr>
            <th>no_rekam_medis</th>
            <th>nama_pasien</th>
            <th>nama_dokter</th>
            <th>keluhan</th>
        </tr>
        <?php
            $s = "SELECT dokter.nama_dokter, pasien.nama_pasien, konsultasi.*
            FROM
            konsultasi
            JOIN
            dokter ON konsultasi.id_dokter = dokter.id_dokter
            JOIN
            pasien ON konsultasi.no_rekam_medis = pasien.no_rekam_medis;";
            $q = mysqli_query($conn, $s);
            while($row=mysqli_fetch_array($q)){
                echo "<tr>";
                echo "<td>$row[no_rekam_medis]</td>";
                echo "<td>$row[nama_pasien]</td>";
                echo "<td>$row[nama_dokter]</td>";
                echo "<td>$row[keluhan]</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>