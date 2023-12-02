<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view perawat</title>
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
    <h1 align="center">Tabel dokter</h1>
    <h3 align="center"><a href="dokter.php">Tambah data</a></h3>
    <table>
        <tr>
            <th>id_dokter</th>
            <th>nama</th>
            <th>spesialis</th>
            <th>no_hp</th>
            <th>email</th>
            <th>alamat</th>
            <th>foto</th>
            <th>aksi</th>
        </tr>
        <?php
            $s = "select * from dokter";
            $q = mysqli_query($conn, $s);
            while($row=mysqli_fetch_array($q)){
                echo "<tr>";
                echo "<td>$row[id_dokter]</td>";
                echo "<td>$row[nama_dokter]</td>";
                echo "<td>$row[spesialis]</td>";
                echo "<td>$row[no_hp]</td>";
                echo "<td>$row[email]</td>";
                echo "<td>$row[alamat]</td>";
                echo "<td><img src='$row[foto]' alt='foto pegawai' width=200px height=200px/></td>";
                echo "<td><a href='updatedokter.php?id=$row[id_dokter]'>update</a> | <a href='deletedokter.php?id=$row[id_dokter]'>delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>