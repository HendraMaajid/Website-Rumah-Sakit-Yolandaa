<?php
    include "koneksi.php";
    if(isset($_POST['submit'])){
        $nama_ruang = $_POST['nama_ruang'];
        $jenis_ruang = $_POST['jenis_ruang'];
        $sql = "INSERT INTO ruang (nama_ruang, jenis_ruang) VALUES ('$nama_ruang', '$jenis_ruang')";
        $query = mysqli_query($conn, $sql);
        if($query){
                ?>
            <script>
                alert("Data ruang berhasil di tambahkan");
                location = "viewruang.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Data ruang gagal di tambahkan");
            </script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert ruang</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>nama ruang</td>
                <td><input type="text" name="nama_ruang"></td>
            </tr>
            <tr>
                <td>jenis ruang</td>
                <td>
                    <select name="jenis_ruang">
                        <option value="regular">Regular</option>
                        <option value="VIP">VIP</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>    
                    <input type="submit" name="submit" value="submit">
                </td>   
            </tr>
        </table>
</body>
</html>