<?php
session_start ();
$id_user = $_SESSION['id_user'];
$koneksi = mysqli_connect('localhost','root','','tugas_semester2');
mysqli_query ($koneksi,"UPDATE users SET status=2 WHERE id=$id_user");
echo "<script>alert('selamat anda suda menjadi admin');
        document.location.href='../index.php'</script>";
        exit;
 
?>