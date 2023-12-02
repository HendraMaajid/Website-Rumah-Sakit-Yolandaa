<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $read = "SELECT * FROM staff_operator WHERE id_operator = '$id'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
    $gambar = $row['foto'];
    unlink($gambar);
    $sql = "DELETE FROM staff_operator WHERE id_operator = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Data operator berhasil di hapus");
            location = "viewoperator.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Data operator gagal di hapus");
            location = "viewoperator.php";
        </script>
        <?php
    }
?>