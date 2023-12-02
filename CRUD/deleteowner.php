<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $read = "SELECT * FROM owner WHERE id_owner = '$id'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
    $gambar = $row['foto'];
    unlink($gambar);
    $sql = "DELETE FROM owner WHERE id_owner = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Data owner berhasil di hapus");
            location = "viewowner.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Data owner gagal di hapus");
            location = "viewowner.php";
        </script>
        <?php
    }
?>