<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location:login.php");
}
$id_user = $_SESSION['id_user'];
$user_id = $_SESSION['id_user'];
include './components/config.php';
hapusstatus1($koneksi);
$keranjang = data("SELECT * FROM keranjang WHERE id_user=$id_user");
// $user = data("SELECT * FROM admin WHERE id=$user_id");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Sepeda</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<!-- header -->
<?php include './components/HeaderNavbar.php';?>
<!-- endheader -->

<!-- checkout-->
<section class="checkout-orders">

   <form action="" method="POST">

   <h3>your orders</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $berat1 = 0;
         $keranjang = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = $id_user");
         if(mysqli_num_rows($keranjang) > 0){
            while($Akeranjang = mysqli_fetch_assoc($keranjang)){
               $grand_total += ($Akeranjang['harga'] * $Akeranjang['total']);
               $total_pcs = $Akeranjang['total'];
               $product1[]= $Akeranjang['merek']. ' '.$Akeranjang['total']. ' Pcs - ';
               $product = implode($product1);
      ?>
         <p> <?= $Akeranjang['merek']; ?> <span>(<?= 'Rp. '.number_format($Akeranjang['harga']).' x '. $Akeranjang['total']; ?> Pcs)</span> </p>
         
      <?php $Akeranjang_id = $Akeranjang['id_barang'];
            $id_sepeda = mysqli_query ($koneksi,"SELECT * FROM sepeda WHERE id=$Akeranjang_id");
            $id_sepeda_array = mysqli_fetch_assoc($id_sepeda);
            $berat1 += $id_sepeda_array['berat'] * $Akeranjang['total']; 
            
            }?> <input type="hidden" name="berat"value='<?= $berat1 ;?>'><?php 
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="product" value="<?= $product; ?>">
         <input type="hidden" name="grand_total" id="total_price" value="<?= $grand_total; ?>">
         <div class="grand-total">Total Belanjaan : <span>Rp. </span><span id="hasil"> <?= number_format($grand_total); ?></span></div>
      </div>

      <h3>place your orders</h3>

      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" maxlength="20" required>
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="no_hp" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select class="box" name="bank" required>
                  <option value="">bank</option>
                  <?php 
                     $bank = mysqli_query ($koneksi,"SELECT * FROM bank");
                     while ($array = mysqli_fetch_assoc($bank)){
                  ?>
                      <option value="<?php echo $array['id_bank'];?>">
                          <?php echo $array['nama_bank'];?>
                          
                      </option>
                  <?php } ?>
              </select>
         </div>
         <input type="hidden" name="provinsi" value="kososng">
         <input type="hidden" name="postal_code" value="kososng">
         <input type="hidden" name="kota" value="kososng">
         <input type="hidden" name="ekspedisi" value="kososng">
         <input type="hidden" name="paket_yang_diambil" value="kososng">
         <input type="hidden" name="estimasi" value="kososng">
         <input type="hidden" name="ongkir" value="kososng">
         <div class="inputBox">
            <span>Provinsi</span>
            <select class="box" name="nama_provinsi" id="provinsi" >
              <option></option>
            </select>
         </div>
         <div class="inputBox">
            <span>Kota/Kabupaten</span>
            <select class="box" name="nama_kota" id="kota">
              <option>Pilih Kota</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Ekspedisi</span>
            <select class="box" name="nama_ekspedisi" id="nama_ekspedisi">
            <option >Pilih Ekspedisi</option>
            <option value="pos">Pos Indonesia</option>
            <option value="tiki">TIKI</option>
            <option value="jne">JNE</option>
            </select>
         </div>
         <div class="inputBox">
            <span>paket</span>
            <select class="box" name="nama_paket" id="nama_paket">
              <option ></option>
            </select>
         </div>
         <div class="inputBox">
            <span>alamat lengkap</span>
            <input type="text" name="alamatlengkap" placeholder="Jl. Citanduy x no x rw x rt x" class="box" required>
         </div>
      </div>

      <input type="submit" name="order" id="order_button" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">
   </form>

</section>
<!-- end checkout-->

<?php if(isset($_POST['order'])){
  beli($_POST);
}
?>


<!-- footer -->
<?php include './components/footer.php'?>
<!-- end footer -->
<script src="./assets/jquery/jquery-3.3.1.min.js"></script>
<script src="./assets/js/alamat.js"></script>
<script src="./assets/js/style.js"></script>

</body>
</html>