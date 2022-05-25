<?php 
session_start();
include 'config.php';
//$id = $_GET['page'];
$page=$_GET["page"];
$id=$_GET["id"];

if($page=="ubah")
{
    $sepeda = ubah("SELECT * FROM sepeda WHERE id='$id'");
    if(isset($_POST["submit"])){
        updatebarang($_POST);
    
    }

    print '
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
<h3> <i class="fa-solid fa-pen-to-square mr-3"></i> edit data</i></h3><hr> 
            
           
                <form method="post" action=""enctype="multipart/form-data" >

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Kode</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="kode" required="required" value="'.$sepeda[0]['kode'].'" readonly>
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4" type="text" name="merek" id="merek" required value="'.$sepeda[0]['name'].'"><br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Barang</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input  class="form-control" size="4" type="text" name="harga"  id="dengan-rupiah" required value="'.$sepeda[0]['price'].'"><br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Stock Barang</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input  class="form-control" size="4" type="text" name="stock" id="stock" onkeypress="return event.charCode >= 48 && event.charCode <=57" required value="'.$sepeda[0]['stock'].'"><br>
                        </div>
                    </div>

                

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Supplier</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="suplier"  required value="'.$sepeda[0]['suplier'].'"><br>
                                <option value="'.$sepeda[0]['suplier'].'>'.$sepeda[0]['suplier'].'</option>
                                <option value="Jakarta, Tambun">Jakarta, Tambun</option>
                                <option value="Depok, Citayem">Depok, Citayem</option>
                                <option value="Batam">Batam</option>
                                <option value="Jawa timur, tuban">Jawa timur, tuban</option>
                                <option value="Sumedang">Sumedang</option>
                            </select>
                        </div>
                    </div>


                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >File Gambar</label><br>
                        <div class="col-md-6 col-sm-6">
                            <input size="4" name="gambar" type="file" required value="<img src=../img/'.$sepeda[0]['gambar'].'">
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <div  class="col-md-6 col-sm-6 offset-md-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
            </div>
        </div>

    <script src="../method/js/rp.js"></script>
    </body>
    </html>

    ';
}



// header("Location:index.php?page=ubah")
?>


