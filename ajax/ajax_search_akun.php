<?php
include 'koneksi.php';

if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);

    $s = "SELECT * FROM akun WHERE username LIKE '%$search_query%';";
    $q = mysqli_query($conn, $s);

    if (mysqli_num_rows($q) > 0) {
        while ($row1 = mysqli_fetch_array($q)) {
            echo "<tr>";
            echo "<td>$row1[username]</td>";
            echo "<td>$row1[email]</td>";
            echo "<td>$row1[id]</td>";
            echo "<td>$row1[role]</td>";
            echo "<td><a class='link-delete' href='editakun.php?id=$row1[username]'>Edit</a> | <a class='link-delete'  href='viewakun.php?id_delete=$row1[username]'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='5'>Tidak ada hasil pencarian</td>";
        echo "</tr>";
    }
}
?>
