<?php
    include "koneksi.php";
    $id = $_GET['no_rekam_medis'];
    $read = "SELECT * FROM pasien WHERE no_rekam_medis = '$id'";
    $query = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($query);
    $gambar = $row['foto'];
    unlink($gambar);
    $sql = "DELETE FROM pasien WHERE no_rekam_medis = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
    ?>
    <script>
        alert("Data pasien berhasil dihapus");
        location = "viewpasien.php";    
    </script>
    <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }   
?>