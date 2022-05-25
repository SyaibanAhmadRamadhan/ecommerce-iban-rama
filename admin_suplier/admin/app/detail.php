<?php 

include 'config.php';
$id=$_GET['id_detail'];
$sepeda = data("SELECT * FROM sepeda WHERE id=$id");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <style>
        .buton {
    float: right;
    display: block;
}
</style>
</head>
<body>
<div class="buton">
<a href="index.php?page=sepeda"><i class="fa-solid fa-xmark fa-2x" data-toggle="tooltip" title="close"></i></a>
</div>
    <center><font Size="4">DETAIL DATA <?php echo "'".$sepeda [0]['name']."'";?></font></center><br>
    
    <div class="table-responsive">

        <table  class="table table-bordered">
            <tr align="center">
                <td colspan="3"><img src='../img/<?php echo $sepeda[0]['gambar'];?>' width="200"></td>    
            </tr>

            <tr>
                <th>File Gambar</th>
                <td><?php echo $sepeda[0]['gambar'];?></td>
            </tr>

            <tr>
                <th>Kode Barang</th>
                <td><?php echo $sepeda[0]['kode'];?></td>
            </tr>
            
            <tr>
                <th>Nama Barang</th>
                <td><?php echo $sepeda[0]['name'];?></td>
            </tr>

            <tr>
                <th>Stock Barang</th>
                <td><?php echo $sepeda[0]['stock'];?></td>
            </tr>

            <tr>
                <th>Harga Barang</th>
                <td><?php echo $sepeda[0]['price'];?></td>
            </tr>

            <tr>
                <th>Tgl_Masuk Barang</th>
                <td><?php echo $sepeda[0]['tgl_masuk'];?></td>
            </tr>

            <tr>
                <th>Supplier Barang</th>
                <td><?php echo $sepeda[0]['suplier'];?></td>
            </tr>

            
</table>
    </div>


</body>
</html>