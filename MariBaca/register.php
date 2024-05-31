<?php
    include "koneksi.php";

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $sql = "INSERT INTO anggota (username, password, email) VALUES 
        ('$username', '$password', '$email')";

        try {
            if($db->query($sql)) {
                echo '<script>alert("Daftar akun berhasil! Silahkan login.");
                    location.href="login.php";</script>';
            } else {
                echo '<script>alert("Daftar akun gagal! Silahkan coba kembali.");</script>';
            }
        } catch(mysqli_sql_exception) {
            echo '<script>alert("Email telah digunakan! Silahkan coba kembali.");</script>';
        }
    }  

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login MariBaca</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet"/>
</head>

<body>
    <div class="wrapper">
        <i><?php $register_message ?></i>
        <form action="register.php" method="POST">
            <h1>Daftar Akun</h1>
            <div class="input-box">
                <input type="text" id="inputUser" placeholder="Username" name="username" required>
            </div>
            <div class="input-box">
                <input type="password" id="inputPass" placeholder="Password" name="password" required>
            </div>
            <div class="input-box">
                <input type="email" id="inputEmail" placeholder="Email" name="email" required>
            </div>
            <button type="submit" name="register" class="btn">Daftar</button>
            <div class="register-link">
            <p>Sudah Punya Akun? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>