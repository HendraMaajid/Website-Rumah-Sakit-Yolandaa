<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $read = "SELECT * FROM perawat WHERE id_perawat = '$id'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
    $gambar = $row['foto'];
    unlink($gambar);
    $sql = "DELETE FROM perawat WHERE id_perawat = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Data perawat berhasil di hapus");
            location = "viewperawat.php";
        </script>
        <?php
    }
?>