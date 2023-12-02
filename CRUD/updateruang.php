<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM ruang WHERE id_ruang = '$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $jenis_ruang = $_POST['jenis_ruang'];
        $update="UPDATE ruang SET nama_ruang = '$nama', jenis_ruang = '$jenis_ruang' WHERE id_ruang = '$id'";
        $query= mysqli_query($conn, $update);
        if($query){
            ?>
            <script>
                alert("Data ruang berhasil di update");
                location = "viewruang.php";
            </script>
            <?php
        }
    }
    if($row['id_ruang']!="") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update ruang</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>nama ruang</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama_ruang']; ?>"></td>
            </tr>
            <tr>
                <td>jenis ruang</td>
                <td>
                    <select name="jenis_ruang">
                        <option value="regular" <?php if($row['jenis_ruang'] == 'regular') echo 'selected="selected"'; ?>>Regular</option>
                        <option value="VIP" <?php if($row['jenis_ruang'] == 'VIP') echo 'selected="selected"'; ?>>VIP</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>    
                    <input type="submit" name="update" value="update">
                </td>   
            </tr>
        </table>
</body>
</html>
<?php
    }
?>