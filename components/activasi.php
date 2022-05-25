<?php
include 'config.php';
$id = $_GET['t'];

$queryUser = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$id' && status=0");
if(mysqli_num_rows($queryUser)>0){
    mysqli_query($koneksi,"UPDATE users SET status = 1 WHERE username='$id' && status=0");
    echo "<script>alert('AKTIVASI AKUN BERHASIL');
        document.location.href='../login.php'</script>";
        exit;
}else {
        echo "<script>alert('invalid token');
    document.location.href='../register.php'</script>";
    exit;
}
?>