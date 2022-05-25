<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location:login.php");
}
$id_user = $_SESSION['id_user'];
include './components/config.php';
hapusstatus1($koneksi);
if (isset($_POST['update'])) {
    krjg($_POST);
}
if (isset($_POST['checkout'])) {
    checkout("SELECT * FROM keranjang WHERE id_user=$id_user");
}
if (isset($_GET['hapus_semua'])) {
    mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_user=$id_user");
    header('location:keranjang.php');
}
if(isset($_POST['hapus'])){
    $id_keranjang = $_POST['id_keranjang'];
    mysqli_query($koneksi,"DELETE FROM keranjang WHERE id=$id_keranjang && id_user=$id_user");
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Sepeda</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

<!-- header -->
<?php include './components/HeaderNavbar.php';?>
<!-- endheader -->

<!-- cart -->
<section class="products shopping-cart">

   <h3 class="heading">shopping cart</h3>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $keranjang = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user=$id_user");
      if(mysqli_num_rows($keranjang)>0){
         while($x = mysqli_fetch_assoc($keranjang)){
        $id_barang_out_while = $x['id_barang'];
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="id_keranjang" value="<?= $x['id']; ?>">
      <input type="hidden" name="price" value="<?php echo $x['harga']; ?>">
      <input type="hidden" name="id_barang" value="<?php echo $x['id_barang']; ?>">
      <a href="detail.php?id=<?=$id_barang_out_while;?>">
      <img src="./components/img/<?= $x['gambar']; ?>" alt="">
      </a>
      <div class="name"><?= $x['merek']; ?></div>
      <div class="flex">
         <div class="price">Rp. <?= number_format($x['harga']); ?></div>
         <?php
            $id_barang = $x['id_barang'];
            $stock = mysqli_query($koneksi,"SELECT * FROM sepeda WHERE id=$id_barang");
            while($arrayStock = mysqli_fetch_assoc($stock)){
        ?>
         <input type="number" name="total" class="qty" min="1"  value="<?= $x['total']; ?>">
         <?php } ?>
         <button type="submit" class="fas fa-edit" name="update"></button>
      </div>
      <div class="sub-total"> sub total : <span>Rp. <?= number_format($sub_total = ($x['harga'] * $x['total'])); ?></span> </div>
      <input type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="delete-btn" name="hapus">
   </form>
   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="keranjang-kosong">your cart is empty</p>';
   }
   ?>
   </div>

   <div class="cart-total">
      <p>grand total : <span>Rp. <?= number_format($grand_total); ?></span></p>
      <a href="index.php#product" class="option-btn">continue shopping</a>
      <a href="keranjang.php?hapus_semua" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all item</a>
      <a href="./components/procesChekout.php" class="checkout-btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</section>
               
    <!-- footer -->
    <?php include './components/footer.php';?>
    <!-- end footer -->
<script src="./assets/js/style.js"></script>
</body>

</html>