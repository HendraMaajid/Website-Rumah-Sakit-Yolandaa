<?php 
    include "koneksi.php";
    session_start();
    session_unset();
    session_destroy();
        ?>
        <script>
            alert('Anda berhasil logout');
            document.location = "homepage.php";
        </script>
        <?php
?>