<?php
    include "koneksi.php";
    session_start();
    function encryptPassword($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashedPassword;
    }

    if(isset($_POST["signUp"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $id = $_POST["id"];
        
        $password = $_POST["password"];
        $hashpassword = encryptPassword($password);
        $sql = "INSERT INTO akun (username, email, password, id, role) VALUES ('$username', '$email', '$hashpassword', '$id', 'pasien')";
        $query = mysqli_query($conn, $sql);

        if ($query){
            $sql = "SELECT * FROM akun WHERE username = '$username'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            $id_akun = $row['username'];
            $sql = "UPDATE pasien SET username = '$id_akun' WHERE kis = '$id'";
            $query = mysqli_query($conn, $sql);
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $_SESSION["role"] = "pasien";
            ?>
            <script>
                alert("Anda berhasil mendaftar");
                document.location="dashboard_pasien.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Anda gagal mendaftar");
                document.location="register.php";
            </script>
            <?php
        }

       /* if ($query){
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            ?>
            <script>
                alert("Anda berhasil mendaftar");
                document.location="dashboard_profile.php";
            </script>
            <?php
        }
        */
       /* if($query){
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $id_akun = mysqli_insert_id($conn);
            if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pasien WHERE kis = '$id'")) > 0){
                $sql = "UPDATE pasien SET username = '$id_akun' WHERE kis = '$id'";
                $query = mysqli_query($conn, $sql);
            }
            ?>
        <script>
            alert("Anda berhasil mendaftar");
            document.location="dashboard_profile.php";
        </script>
        <?php
        } */
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style/register.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container">
        <div class="welcome">
            <p class="welcome-text">Welcome to <span class="rumahsakit">RS Yolandaa</span> </p>
        </div>
        <div class="judul">
            <h4>Sign Up</h4>
        </div>
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="sign up">
                <div>
                    <p class="">Enter your email address </p>
                    <input class="email" name="email" type="email" required>
                </div>
                <div class="identity">
                    <div>
                        <p class="">Username </p>
                        <input class="username" name="username" type="text"required>
                    </div>
                    <div>
                        <p class="">Your ID Card/KIS</p>
                        <input class="id" name="id" type="text" required>
                    </div>
                </div>
                <div>
                    <p class="">Enter password</p>
                    <div class="password-toggle">
                        <input class="pass" name="password" type="password">
                        <!-- Tambahkan elemen gambar untuk icon eye -->
                        <img class="toggle-icon" src="image/eye.png" alt="Toggle Password Visibility" onclick="togglePassword()">
                    </div>
                <br>
                <div>
                    <p class="register">Do you have an account? <a href="login.php">Login now</a></p> <br>
                </div>
                <div>
                    <input type="submit" class="button1" value="Sign Up" name="signUp">
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.querySelector(".pass");
            var icon = document.querySelector(".toggle-icon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.src = "image/eye-off.png"; // Gambar saat password terlihat
            } else {
                passwordField.type = "password";
                icon.src = "image/eye.png"; // Gambar saat password tidak terlihat
            }
        }
    </script>
</body>
</html>
