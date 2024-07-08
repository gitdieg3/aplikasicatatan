<?php
include 'confiq.php'; // Mengubah 'confiq.php' menjadi 'config.php'

// Koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$Title = "";
$Description = "";

// Memeriksa apakah form telah disubmit
if (isset($_POST['masuk'])) {
    // Menggunakan isset untuk memeriksa keberadaan kunci dan mengamankan input
    $Title = isset($_POST['Title']) ? mysqli_real_escape_string($koneksi, $_POST['Title']) : '';
    $Description = isset($_POST['Description']) ? mysqli_real_escape_string($koneksi, $_POST['Description']) : '';

    // Memeriksa apakah Title dan Description tidak kosong
    if ($Title && $Description) {
        // Menggunakan SQL yang benar dengan VALUES
        $sql1 = "INSERT INTO catatan (Title, Description) VALUES ('$Title', '$Description')";
        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            echo "<script type='text/javascript'>alert('Data sudah masuk yeah');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Data gagal masuk');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    <link rel="stylesheet" href="css/note.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="shortcut icon" href="assets/img/favicon.jpeg" type="image/x-icon">
</head>

<body>
    <nav class="navbar">
        <div class="logo">Mynote</div>
        <ul class="nav-links">
            <li><a href="#home">note</a></li>
            <li><a href="#about">setting</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <div class="popup-box">
        <div class="popup">
            <div class="content">
                <header>
                    <p></p>
                    <i class="uil uil-times"></i>
                </header>
                <form action="" method="post">
                    <div class="row title">
                        <label>Title</label>
                        <input type="text" id="Title" name="Title" spellcheck="false"
                            value="<?php echo htmlspecialchars($Title); ?>">
                    </div>
                    <div class="row description">
                        <label>Description</label>
                        <textarea id="Description" name="Description"
                            spellcheck="false"><?php echo htmlspecialchars($Description); ?></textarea>
                    </div>
                    <button type="submit" name="masuk" id="masuk">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <li class="add-box">
            <div class="icon"><i class="uil uil-plus"></i></div>
            <p>Add new note</p>
        </li>
    </div>

    <script src="note.js"></script>
    <script>document.addEventListener('DOMContentLoaded', () => {
            const burger = document.querySelector('.burger');
            const navLinks = document.querySelector('.nav-links');

            burger.addEventListener('click', () => {
                navLinks.classList.toggle('nav-active');
                burger.classList.toggle('toggle');
            });
        });
    </script>
</body>

</html>