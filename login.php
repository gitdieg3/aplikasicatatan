<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "notedata";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { // cek koneksi
    die("tidak bisa terkoneksi");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM userlogin WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        // Login successful, create session
        $_SESSION['username'] = $username;

        include("note.php");
        exit;
        // Redirect to another page or perform other actions
    } else {
        echo "<script type='text/javascript'>alert('pastikan username dan password benar');</script>";
    }
}

 $koneksi->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login user</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h1>hello she/he</h1><br>
                <span>silahkan masukan data anda</span>
                <input type="text" id="username" name="username" placeholder="enter your username">
                <input type="password" id="password" name="password" placeholder="enter your pw"><br>
                <button type="submit" name="masuk">Sign Up</button><br>
                <span>belum punya akun klik di sini<a href="registrasi.php">buat akun</a></span>
            </form>
        </div>
        <div class="overlay">
        </div>
    </div>
</body>
</html>