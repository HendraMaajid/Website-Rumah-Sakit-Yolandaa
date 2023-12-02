<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view tabel pasien</title>
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

    <h1 align="center">Tabel pasien</h1>
    <h3 align="center"><a href="pasien.php">Tambah data</a></h3>
        <table>
            <tr>
                <th>no_rekam_medis</th>
                <th>kis</th>
                <th>nama</th>
                <th>alamat</th>
                <th>tanggal lahir</th>
                <th>email</th>
                <th>no_hp</th>
                <th>foto</th>
                <th>dokter</th>
                <th>perawat</th>
                <th>aksi</th>
            </tr>
                <?php
                    $s = "select * from pasien order by no_rekam_medis asc";
                    $q = mysqli_query($conn, $s);
                    while($row=mysqli_fetch_array($q)){
                        echo "<tr>";
                        echo "<td>$row[no_rekam_medis]</td>";
                        echo "<td>$row[kis]</td>";
                        echo "<td>$row[nama_pasien]</td>";
                        echo "<td>$row[alamat]</td>";
                        echo "<td>$row[tanggal_lahir]</td>";
                        echo "<td>$row[email]</td>";
                        echo "<td>$row[no_hp]</td>";
                        echo "<td><img src='$row[foto]' alt='foto pegawai' width=200px height=200px/></td>";
                        echo "<td>$row[id_dokter]</td>";
                        echo "<td>$row[id_perawat]</td>";
                        echo "<td><a href='updatepasien.php?no_rekam_medis=$row[no_rekam_medis]'>Edit</a> | <a href='deletepasien.php?no_rekam_medis=$row[no_rekam_medis]'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
        </table>
</body>
</html>