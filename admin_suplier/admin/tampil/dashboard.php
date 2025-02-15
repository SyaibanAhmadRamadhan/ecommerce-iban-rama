<?php

include 'config.php';
$sepeda = mysqli_query($koneksi,"SELECT * FROM sepeda");
$admin = mysqli_query($koneksi,"SELECT * FROM admin");
$hitung = mysqli_num_rows($sepeda);
$hitung_admin = mysqli_num_rows($admin);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
    <title>Document</title>
</head>
<body>
    
<div class="col-md-15 p-3 pt-2">
            <h3> <i class="fa fa-gauge-high mr-3"> Dasboard</i></h3><hr> 
            
            <div class="row text-white">
                <br><div class="card bg-danger ml-5" style="width: 18rem;"><br>
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                    <div class="card-body-icon"><i class="fa fa-bicycle mr-2"> </i> </div>
                      <h5 class="card-title">JUMLAH SEPEDA</h5>
                      <div class="display-4"><?php echo $hitung;?></div>
                      <a href="index.php?page=sepeda"><p class="card-text text-white">Lihat Detail <i class="fas fa-angel-double-right ml-2"></i></p></a>
                    
                    </div>
                  </div>

                  <br> <div class="card bg-primary ml-5" style="width: 18rem;"><br>
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                    <div class="card-body-icon"><i class="fa fa-bicycle mr-2"> </i> </div>
                      <h5 class="card-title">JUMLAH AKSESORIS</h5>
                      <div class="display-4"><?php echo $hitung;?></div>
                      <a href="index.php?page=sepeda"><p class="card-text text-white">Lihat Detail <i class="fas fa-angel-double-right ml-2"></i></p></a>
                    
                    </div>
                  </div>

                  <br><div class="card bg-info ml-5" style="width: 18rem;"><br>
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                    <div class="card-body-icon"><i class="fa fa-user-edit mr-2"></i>  </i> </div>
                      <h5 class="card-title">JUMLAH ADMIN</h5>
                      <div class="display-4"><?php echo $hitung_admin;?></div>
                      <a href="index.php?page=admin"><p class="card-text text-white">Lihat Detail <i class="fas fa-angel-double-right ml-2"></i></p></a>
                    </div>
                  </div>
                </div>

                <div class="row mt-4 ">
                    <div class="card ml-5  text-white text-center"style="width: 18rem;">
                        <div class="card-header bg-danger display-4">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-danger">INSTAGRAM</h5>
                            <a href="https://www.instagram.com/iban.rma/"  target="_blank" class="btn btn-danger">Follow!</a>
                        </div>
                    </div>

                    <div class="card ml-5  text-white text-center"style="width: 18rem;">
                        <div class="card-header bg-primary display-4">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary">FACEBOOK</h5>
                            <a href="https://web.facebook.com/iban.rama/"  target="_blank" class="btn btn-primary">Like!</a>
                        </div>
                    </div>

                    <div class="card ml-5  text-white text-center"style="width: 18rem;">
                        <div class="card-header bg-success display-4">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-success">WHATSAPP</h5>
                            <a href="https://wa.wizard.id/296aa2/"  target="_blank" class="btn btn-success">Chat!</a>
                        </div>
                    </div>
                </div>
            </div>

          </body>
</html>