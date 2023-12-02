<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM ruang WHERE id_ruang = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Data ruang berhasil dihapus");
            location = "viewruang.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Data ruang gagal dihapus");
        </script>
        <?php
    }
?>