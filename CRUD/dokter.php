<?php
    include "koneksi.php";
    if(isset($_POST['insert'])){
        $nama = $_POST['nama'];
        $spesialis = $_POST['spesialis'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
        } else {
            $upload = ''; 
        }
        $sql = "INSERT INTO dokter (nama_dokter, spesialis, no_hp, email, alamat, foto) VALUES ('$nama', '$spesialis', '$no_hp', '$email', '$alamat','$upload')";
        $query = mysqli_query($conn, $sql);
        if($query){
                ?>
            <script>
                alert("Data dokter berhasil di tambahkan");
                location = "viewdokter.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Data dokter gagal di tambahkan");
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
    <title>Insert Dokter</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Spesialis</td>
                <td><input type="text" name="spesialis"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td><input type="submit" name="insert" value="insert"></td>
            </tr>
        </table>
    </form>
</body>
</html>