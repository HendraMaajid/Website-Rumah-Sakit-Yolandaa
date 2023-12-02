<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $read = "SELECT * FROM news WHERE id_news = '$id'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
    $gambar = $row['foto'];
    unlink($gambar);
    $sql = "DELETE FROM news WHERE id_news = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Data news berhasil di hapus");
            location = "viewnews.php";
        </script>
        <?php
    }
?>