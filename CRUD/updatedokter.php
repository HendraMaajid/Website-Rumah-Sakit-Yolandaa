<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM dokter WHERE id_dokter = '$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
            $update="UPDATE dokter SET nama_dokter = '$nama', spesialis='$spesialis', no_hp = '$no_hp', email = '$email', alamat = '$alamat', foto = '$upload' WHERE id_dokter = '$id'";
            $query= mysqli_query($conn, $update);
        } else {
            $update="UPDATE dokter SET nama_dokter = '$nama', spesialis='$spesialis', no_hp = '$no_hp', email = '$email', alamat = '$alamat' WHERE id_dokter = '$id'";
            $query= mysqli_query($conn, $update);
        }
        //$sql = "UPDATE dokter SET nama_dokter='$nama', spesialis='$spesialis', no_hp='$no_hp', email='$email', alamat='$alamat' WHERE id_dokter='$id'";
        //$query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Data dokter berhasil di update");
                location = "viewdokter.php";
            </script>
            <?php
        }
    }
    if($row['id_dokter']!="") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama_dokter']; ?>"></td>
            </tr>
            <tr>
                <td>Spesialis</td>
                <td><input type="text" name="spesialis" value="<?php echo $row['spesialis']; ?>"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="number" name="no_hp" value="<?php echo $row['no_hp']; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <input type="file" name="foto" accept=".jpg, .png">
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
	<?php
}

?>