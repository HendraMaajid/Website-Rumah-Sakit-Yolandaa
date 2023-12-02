<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM dokter WHERE id_dokter = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Data dokter berhasil di hapus");
            location = "viewdokter.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Data dokter gagal di hapus");
        </script>
        <?php
    }
?>