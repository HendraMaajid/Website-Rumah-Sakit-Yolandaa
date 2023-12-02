<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE id_news = '$id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if(isset($_POST['update'])){
        $judul = $_POST['judul'];
        $konten = $_POST['konten'];
        $operator = $_POST['operator'];
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $upload = 'image/'.$foto;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
            $update="UPDATE news SET judul='$judul', konten='$konten', foto='$upload', id_operator='$operator' WHERE id_news='$id'";
            $query= mysqli_query($conn, $update);
        } else {
            $update="UPDATE news SET judul='$judul', konten='$konten', id_operator='$operator' WHERE id_news='$id'";
            $query= mysqli_query($conn, $update);
        }
        //$sql = "UPDATE news SET judul='$judul', konten='$konten', id_operator='$operator' WHERE id_news='$id'";
        //$query = mysqli_query($conn, $sql);
        if($query){
            ?>
            <script>
                alert("Data news berhasil di update");
                location = "viewnews.php";
            </script>
            <?php
        }
    }
    if($row['id_news']!="") {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update news</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
        <table>
            <tr>
                <td>judul</td>
                <td><input type="text" name="judul" value="<?php echo $row['judul']; ?>"></td>
            </tr>
            <tr>
                <td>konten</td>
                <td>
                    <textarea name="konten" cols="30" rows="10">
                        <?php echo $row['konten']; ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>foto</td>
                <td>
                    <img src="<?php echo $row['foto'] ?>" alt="foto pegawai" width="200px"> <br>
                    <input type="file" name="foto" accept=".jpg, .png">
                </td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td>
                    <select name="operator">
                        <?php
                            $s = "select * from staff_operator";
                            $q = mysqli_query($conn, $s);
                            while($row1=mysqli_fetch_array($q)){
                                if($row1['id_operator']==$row['id_operator']){
                                    echo "<option value='$row1[id_operator]' selected>$row1[nama_operator]</option>";
                                }else{
                                    echo "<option value='$row1[id_operator]'>$row1[nama_operator]</option>";
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