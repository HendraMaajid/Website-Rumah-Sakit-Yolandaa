<?php
    include "koneksi.php";
    $get_data=mysqli_query($conn,"select * from news order by id_news asc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view news</title>
</head>
<body>
    <h1>Post News</h1>
    <a href="news.php"><button>Tambah Posts</button></a>
    <br><br>
    <?php
    while ($data_post=mysqli_fetch_array($get_data)) {
        echo "<h2>".$data_post['judul']."</h2>";
        echo "<a href='updatenews.php?id=$data_post[id_news]'>Edit</a> | <a href='deletenews.php?id=$data_post[id_news]'>Delete</a> <br>";
        echo "<td><img src='$data_post[foto]' alt='foto news' width=200px height=200px/></td>";
        echo nl2br("<p>".$data_post['konten']."</p>");
    }
    ?>
</body>
</html>