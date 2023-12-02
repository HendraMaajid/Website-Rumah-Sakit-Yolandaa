<?php
include 'koneksi.php';

if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);

    $s = "SELECT * FROM ruang WHERE nama_ruang LIKE '%$search_query%';";
    $q = mysqli_query($conn, $s);

    if (mysqli_num_rows($q) > 0) {
        while ($row1 = mysqli_fetch_array($q)) {
            echo "<tr>";
            echo "<td>$row1[nama_ruang]</td>";
            echo "<td>$row1[jenis_ruang]</td>";
            echo "<td><a class='link-delete' href='editruang.php?id=$row1[id_ruang]'>Edit</a> | <a class='link-delete'  href='viewruang_operator.php?id_delete=$row1[id_ruang]'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='3'>Tidak ada hasil pencarian</td>";
        echo "</tr>";
    }
}
?>