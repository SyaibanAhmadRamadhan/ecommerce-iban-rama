<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location:../index.php");
}

// include 'logindanregis.php';

// mysqli_query($koneksi,"SELECT * FROM tabel WHERE username='$username'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>selamat datang,</h1>
    <a href="logout.php">logout</a>
</body>
</html>