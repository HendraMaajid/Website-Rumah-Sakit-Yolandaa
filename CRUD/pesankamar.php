<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan ruang</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>nama ruang</td>
                <td><select name="ruang">
                        <?php
                            $s = "select * from ruang";
                            $q = mysqli_query($conn, $s);
                            while($row=mysqli_fetch_array($q)){
                                echo "<option value='$row[id_ruang]'>$row[nama_ruang]-$row[jenis_ruang]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>tanggal masuk</td>
                <td><input type="date" name="tanggal_masuk"></td>
            </tr>
            <tr>
                <td>tanggal keluar</td>
                <td><input type="date" name="tanggal_keluar"></td>
            </tr>
            <tr>
                <td>    
                    <input type="submit" name="submit" value="submit">
                </td>   
            </tr>
        </table>
    </form>
</body>
</html>