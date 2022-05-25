<?php
session_start();
// if( !isset($_SESSION['login']) ){
//     header("Location: lo.php");
//     exit;
// }
include './config.php';
$id = $_GET['id'];
if(hapuspembayaran($id)>0){
    echo "<script>alert('Pembayaran Behasil Dihapus');
    document.location.href='pembayaran.php';
    </script>";
}else {
    echo "<script>alert('data gagal dihapus');
    document.location.href='pembayaran.php';
    </script>";
}
?>
