<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view owner</title>
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
    <h1 align="center">Tabel Owner</h1>
    <h3 align="center"><a href="owner.php">Tambah data</a></h3>
    <table>
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>no_hp</th>
            <th>email</th>
            <th>alamat</th>
            <th>foto</th>
            <th>aksi</th>
        </tr>
        <?php
            $s = "select * from owner order by id_owner asc";
            $q = mysqli_query($conn, $s);
            while($row=mysqli_fetch_array($q)){
                echo "<tr>";
                echo "<td>$row[id_owner]</td>";
                echo "<td>$row[nama_owner]</td>";
                echo "<td>$row[no_hp]</td>";
                echo "<td>$row[email]</td>";
                echo "<td>$row[alamat]</td>";
                echo "<td><img src='$row[foto]' alt='foto pegawai' width=200px height=200px/></td>";
                echo "<td><a href='updateowner.php?id=$row[id_owner]'>update</a> | <a href='deleteowner.php?id=$row[id_owner]'>delete</a></td>";
                echo "</tr>";
            }
        ?>

    </table>
</body>
</html>