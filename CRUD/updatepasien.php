<?php
    include "koneksi.php";
    $id = $_GET['no_rekam_medis'];
    $sql = "SELECT * FROM pasien WHERE no_rekam_medis = '$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $read = "SELECT * FROM konsultasi WHERE no_rekam_medis = '$id'";
    $query = mysqli_query($conn, $read);
    $row1 = mysqli_fetch_array($query);
    if(isset($_POST['update'])){
        $nama = $_POST['nama'];
        $kis = $_POST['kis'];
        $alamat = $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $keluhan = $_POST['keluhan'];
        $perawat = $_POST['perawat'];
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
            $update="UPDATE pasien SET kis='$kis' ,nama_pasien='$nama', alamat='$alamat', tanggal_lahir='$tanggal_lahir', email='$email', no_hp='$no_hp', foto='$upload' , id_perawat='$perawat' WHERE no_rekam_medis='$id'";
            $query= mysqli_query($conn, $update);
            $update= "UPDATE konsultasi SET keluhan='$keluhan' WHERE no_rekam_medis='$id'";
            $query= mysqli_query($conn, $update);
        } else {
            $update="UPDATE pasien SET kis='$kis' ,nama_pasien='$nama', alamat='$alamat', tanggal_lahir='$tanggal_lahir', email='$email', no_hp='$no_hp', id_perawat='$perawat' WHERE no_rekam_medis='$id'";
            $query= mysqli_query($conn, $update);
        }
        if($query){
            ?>
            <script>
                alert("Data pasien berhasil di update");
                location = "viewpasien.php";
            </script>
            <?php
        }
    }
    if($row['no_rekam_medis']!="") {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama_pasien']; ?>"></td>
            </tr>
            <tr>
                <td>Kis</td>
                <td><input type="number" name="kis" value="<?php echo $row['kis']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>
                    <input type="file" name="foto" accept=".jpg, .png">
                </td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>
                    <select name="dokter">
                        <?php
                            $s = "select * from dokter";
                            $q = mysqli_query($conn, $s);
                            while($row1=mysqli_fetch_array($q)){
                                if($row1['id_dokter']==$row['id_dokter']){
                                    echo "<option value='$row1[id_dokter]' selected>$row1[nama_dokter]</option>";
                                }else{
                                    echo "<option value='$row1[id_dokter]'>$row1[nama_dokter]</option>";
                                }
                            }
                        ?>
                    </select>
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