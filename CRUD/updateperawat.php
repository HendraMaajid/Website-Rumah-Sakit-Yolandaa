<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM perawat WHERE id_perawat = '$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
            $update="UPDATE perawat SET nama_perawat = '$nama', no_hp = '$no_hp', email = '$email', alamat = '$alamat', foto = '$upload' WHERE id_perawat = '$id'";
            $query= mysqli_query($conn, $update);
        } else {
            $update="UPDATE perawat SET nama_perawat = '$nama', no_hp = '$no_hp', email = '$email', alamat = '$alamat' WHERE id_perawat = '$id'";
            $query= mysqli_query($conn, $update);
        }
        //$sql = "UPDATE perawat SET nama_perawat='$nama', no_hp='$no_hp', email='$email', alamat='$alamat' WHERE id_perawat='$id'";
        //$query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Data perawat berhasil di update");
                location = "viewperawat.php";
            </script>
            <?php
        }
    }
    if($row['id_perawat']!="") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update perawat</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>nama</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama_perawat']; ?>"></td>
            </tr>
            <tr>
                <td>no_hp</td>
                <td><input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <img src="<?php echo $row['foto'] ?>" alt="foto pegawai" width="200px"> <br>
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