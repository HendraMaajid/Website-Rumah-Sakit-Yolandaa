<?php
    include "koneksi.php";
    if(isset($_POST['insert'])){
        $nama = $_POST['nama'];
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
        $sql = "INSERT INTO staff_operator (nama_operator, no_hp, email, alamat, foto) VALUES ('$nama', '$no_hp', '$email', '$alamat','$upload')";
        $query = mysqli_query($conn, $sql);
        if($query){
                ?>
            <script>
                alert("Data operator berhasil di tambahkan");
                location = "viewoperator.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Data operator gagal di tambahkan");
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
    <title>insert operator</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>no_hp</td>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>alamat</td>
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