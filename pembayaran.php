<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location:login.php");
}
include './components/config.php';
hapusstatus1($koneksi);
$id_user = $_SESSION['id_user'];
$pembeli = data("SELECT * FROM pembeli WHERE id_user=$id_user");
invoice("SELECT * FROM pembeli WHERE id_user=$id_user");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
  
  <!-- header -->
  <?php include './components/HeaderNavbar.php';?>
  <!-- end header -->

            
  <section class="orders">

    <h1 class="heading">placed orders</h1>

    <div class="box-container">
    <?php
      if(!$id_user){
         echo '<p class="empty">please login to see your orders</p>';
      }else {
          $order = mysqli_query ($koneksi,"SELECT * FROM pembeli WHERE id_user= $id_user");
          if (mysqli_num_rows($order)){
            while ($order_array = mysqli_fetch_assoc($order)) {
            $id_pembeli = $order_array['id_pembeli'];
          

   ?>
   <div class="box">
      <p>placed on : <span><?= $order_array['date']?></span></p>
      <p>name : <span><?= $order_array['nama']?></span></p>
      <p>number : <span><?= $order_array['no_hp']?></span></p>
      <p>address : <span><?= $order_array['provinsi']?>, <?= $order_array['kota_kabupaten']?>, <?= $order_array['alamat']?></span></p>
      <p>payment method : <span><?= $order_array['id_bank']?></span></p>
      <p>your orders : <span><?= $order_array['produk']?></span></p>
      <p>total price : <span>Rp. <?= number_format($order_array['totalharga'])?></span></p>
      <!-- <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p> -->
   </div>
   <?php
       }}else {echo '<p class="empty">no orders placed yet!</p>';}}
   ?>

   </div>

</section>



<!-- footer -->
<?php include './components/footer.php';?>
<!-- footer section ends -->




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="./assets/jquery/jquery-3.3.1.min.js"></script> -->
    <script src="./assets/js/style.js"></script>
    <script src="./components/search.js"></script>
    <!-- <script src="./search.js"></script> -->
    </body>
</html>