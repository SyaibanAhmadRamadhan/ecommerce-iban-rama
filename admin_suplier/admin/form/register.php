<?php
include 'config.php';

$sepeda     

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>>
</head>
<body>
    <?php if (isset($eror['error'])){ ?>
    <p> <?php echo $eror['pesan'];?></p>
    <?php }?>
        
  
    <center><font Size="4">REGISTER</font></center><br>
    
    <div class="table-responsive">

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4" type="text" name="name" placeholder="Nama Panjang...">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4" type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="no_hp" placeholder="Nomer Hp...">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4"type="email" name="email" placeholder="Email..." required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4"type="text" name="username" placeholder="Username..."required>
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea class="form-control" name="alamat" cols="45" rows="4" placeholder="Alamat..."></textarea> 
                </div>
            </div>
            
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4" type="password" name="password" placeholder="Password..."required>
                </div>
            </div>


            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4"  type="password" name="password2" placeholder="Re-Password..."required>
                </div>
            </div>

            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"></label>
				<div class="col-md-6 col-sm-6 ">
					<input type="radio" name="gender" value="Laki-Laki" required> &nbsp;Laki-Laki &nbsp;
                    <input type="radio" name="gender" value="Perempuan" required> &nbsp;Perempuan
                </div>
			</div>
        
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                <div class="col-md-6 col-sm-6 ">
                    <input size="4" name="gambar" type="file" required>
                </div>
            </div>

            <div class="item form-group">
			    <div  class="col-md-6 col-sm-6 offset-md-3">
				    <input type="submit" name="register" class="btn btn-primary bg-dark" value="Register">
			</div>
            
    </div>


</body>
</html>