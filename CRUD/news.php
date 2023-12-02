<?php
    include "koneksi.php";
    if(isset($_POST['submit'])){
        $judul = $_POST['judul'];
        $konten = $_POST['konten'];
        $operator = $_POST['operator'];
        $foto = $_FILES['foto']['name'];
         if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
        } else {
            $upload = ''; 
        }
        $sql = "INSERT INTO news (judul, konten, foto, id_operator) VALUES ('$judul', '$konten', '$upload', '$operator')";
        $query = mysqli_query($conn, $sql);
        if($query){
                ?>
            <script>
                alert("Data news berhasil di tambahkan");
                location = "viewnews.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Data news gagal di tambahkan");
            </script>
            <?php
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah news</title>
</head>
<body>
    <form action= "<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td>
                    <textarea name="konten" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" accept=".jpg, .png"></td>
            </tr>
            <tr>
                <td>Nama Penulis</td>
                <td>
                    <select name="operator">
                        <?php
                            $s = "select * from staff_operator";
                            $q = mysqli_query($conn, $s);
                            while($row=mysqli_fetch_array($q)){
                                echo "<option value='$row[id_operator]'>$row[nama_operator]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>