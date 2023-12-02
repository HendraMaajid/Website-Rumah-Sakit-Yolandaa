<?php
include 'koneksi.php';

if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);

    $s = "SELECT * FROM dokter WHERE nama_dokter LIKE '%$search_query%';";
    $q = mysqli_query($conn, $s);

    if (mysqli_num_rows($q) > 0) {
        while ($row1 = mysqli_fetch_array($q)) {
            echo "<tr>";
            echo "<td>$row1[nama_dokter]</td>";
            echo "<td>$row1[tanggal_lahir]</td>";
            echo "<td>$row1[spesialis]</td>";
            echo "<td>$row1[alamat]</td>";
            echo "<td>$row1[no_hp]</td>";
            echo "<td>$row1[email]</td>";
            echo "<td><a class='link-delete' href='editdokter.php?id=$row1[id_dokter]'>Edit</a> | <a class='link-delete'  href='viewdokter_operator.php?id_delete=$row1[id_dokter]'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='7'>Tidak ada hasil pencarian</td>";
        echo "</tr>";
    }
}
?>
