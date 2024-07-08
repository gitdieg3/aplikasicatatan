<?php
session_start();
session_destroy();

include 'confiq.php';

$koneksi = mysqli_connect($host, $user, $pass, $db);
$usser = "";
$password = "";

if (isset($_POST['masuk'])) {
    $usser = $_POST['username'];
    $password = $_POST['password'];

    if ($usser && $password) {
        $sql1 = "insert into userlogin(username,password) values ('$usser','$password')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            echo "<script type='text/javascript'>alert('berhasil membuat akun');</script>";
            include ("login.html");
            exit;
        } else {
            echo "<script type='text/javascript'>alert('pastikan username dan password benar');</script>";
        }
    } else {
        $error = ".";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi user</title>
    <link rel="stylesheet" href="css/registrasi.css">
    <link rel="shortcut icon" href="assets/img/favicon.jpeg" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h1>hallo she/he</h1><br>
                <span>silahkan buat akun di sini</span>
                <input type="text" id="username" name="username" placeholder="enter your username"
                    value="<?php echo $usser ?>">
                <input type="text" id="password" name="password" placeholder="enter your password"
                    value="<?php echo $password ?>">
                <input type="password" id="password" name="password" placeholder="repeat password"
                    value="<?php echo $password ?>"><br>
                <button type="submit" id="masuk" name="masuk">creat</button>
            </form>
        </div>
        <div class="overlay">
        </div>
    </div>
</body>

</html>