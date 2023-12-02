<?php
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta');
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $kis = $_POST['kis'];
        $alamat = $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $keluhan = $_POST['keluhan'];
        $dokter = $_POST['dokter'];
        $perawat = $_POST['perawat'];
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
        } else {
            $upload = ''; 
        }
        $sql = "SELECT * FROM pasien WHERE kis='$kis'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if($count == 1){
            ?>
            <script>
                alert("KIS sudah terdaftar");
            </script>
            <?php
        } else {
            $sql = "INSERT INTO pasien (kis, nama_pasien, alamat, tanggal_lahir, email, no_hp, foto, id_perawat) VALUES ('$kis', '$nama', '$alamat', '$tanggal_lahir', '$email', '$no_hp', '$upload', '$perawat')";
            $query = mysqli_query($conn, $sql);
            $read = "SELECT * FROM pasien WHERE kis = '$kis'";
            $query = mysqli_query($conn, $read);
            $row = mysqli_fetch_array($query);
            $no_rekam_medis = $row['no_rekam_medis'];
            $sql = "INSERT INTO konsultasi (no_rekam_medis, id_dokter, keluhan, tgl_konsultasi, jam_konsultasi) VALUES ('$no_rekam_medis','$dokter','$keluhan','$date','$time')";
            $query = mysqli_query($conn, $sql);
            if($query){
                    ?>
                <script>
                    alert("Data pasien berhasil di tambahkan");
                    location = "viewpasien.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Data pasien gagal di tambahkan");
                </script>
                <?php
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Pasien</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="insert pasien" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kis</td>
                <td><input type="text" name="kis"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tanggal_lahir"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" accept=".jpg, .png"></td>
            </tr>
            <tr>
                <td>Keluhan</td>
                <td><input type="text" name="keluhan"></td>
            </tr>
            <tr>
                <td>Nama Dokter</td>
                <td>
                    <select name="dokter">
                        <?php
                            $s = "select * from dokter";
                            $q = mysqli_query($conn, $s);
                            while($row=mysqli_fetch_array($q)){
                                echo "<option value='$row[id_dokter]'>$row[nama_dokter]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>