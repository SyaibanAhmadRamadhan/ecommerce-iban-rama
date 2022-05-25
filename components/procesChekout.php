<?php 
session_start();
$id_user = $_SESSION['id_user'];
include './config.php';
checkout();
?>