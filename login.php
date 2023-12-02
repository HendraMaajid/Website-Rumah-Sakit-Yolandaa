<?php
    include "koneksi.php";
    function verifyPassword($enteredPassword, $hashedPassword) {
        return password_verify($enteredPassword, $hashedPassword);
    }
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM akun WHERE username='$username' OR email='$username'";
        $query = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($query);
        if($count == 1){
            $row = mysqli_fetch_array($query);
            $hashpassword = $row['password'];
            if(verifyPassword($password, $hashpassword)){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];
                if ($_SESSION['role']=='pasien'){
                    ?>
                    <script>
                        alert("anda berhasil login");
                        document.location="dashboard_pasien.php";
                    </script>
                    <?php
                }else if ($_SESSION['role']=='dokter'){
                    ?>
                    <script>
                        alert("anda berhasil login");
                        document.location="dashboard_dokter.php";
                    </script>
                    <?php
                }else if ($_SESSION['role']=='perawat'){
                    ?>
                    <script>
                        alert("anda berhasil login");
                        document.location="dashboard_perawat.php";
                    </script>
                    <?php
                }else if ($_SESSION['role']=='operator'){
                    ?>
                    <script>
                        alert("anda berhasil login");
                        document.location="dashboard_operator.php";
                    </script>
                    <?php
                }else if ($_SESSION['role']== 'owner'){
                    ?>
                    <script>
                        alert("anda berhasil login");
                        document.location="dashboard_owner.php";
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert("Password salah");
                </script>
                <?php
            }
        }else{ 
            ?>
            <script>
                alert("Username atau Email tidak ditemukan");
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
    <title>Login</title>
    <link rel="stylesheet" href="style/login.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container">
        <div class="welcome">
            <p class="welcome-text">Welcome to <span class="rumahsakit">RS Yolandaa</span> </p>
        </div>
        <div class="judul">
            <h4>Sign In</h4>
        </div>
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="login">
                <p class="">Enter your username </p>
                <input class="email" name="username" type="text">
                <p class="">Enter password</p>
                <div class="password-toggle">
                    <input class="pass" name="password" type="password">
                    <!-- Tambahkan elemen gambar untuk icon eye -->
                    <img class="toggle-icon" src="image/eye.png" alt="Toggle Password Visibility" onclick="togglePassword()">
                </div>
                <br>
                <p class="register">Don't have an account yet? <a href="register.php">Register now</a></p> <br>
                <input type="submit" class="button1" value="Sign In" name="submit">
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
