<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view ruang</title>
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
    <h1 align="center">Tabel ruang</h1>
    <h3 align="center"><a href="ruang.php">Tambah data</a></h3>
    <table border="1">
        <tr>
            <th>id ruang</th>
            <th>nama ruang</th>
            <th>jenis ruang</th>
            <th>aksi</th>
        </tr>
        <?php
            $s = "select * from ruang";
            $q = mysqli_query($conn, $s);
            while($row=mysqli_fetch_array($q)){
                echo "<tr>";
                echo "<td>$row[id_ruang]</td>";
                echo "<td>$row[nama_ruang]</td>";
                echo "<td>$row[jenis_ruang]</td>";
                echo "<td><a href='updateruang.php?id=$row[id_ruang]'>Edit</a> | <a href='deleteruang.php?id=$row[id_ruang]'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
</body>
</html>