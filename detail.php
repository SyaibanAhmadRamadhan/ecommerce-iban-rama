<?php
session_start();
include './components/config.php';
hapusstatus1($koneksi);
$id = $_GET['id'];
$sepeda = data("SELECT * FROM sepeda WHERE id=$id");
if(isset($_POST['keranjang'])){
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
        exit;
    }else{
        masukankeranjang ($_POST);
    }
}   
if(isset($_POST['belisekarang'])){
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
        exit;
    }
    belilangsung ($_POST);
    header("Location:checkoutlangsung.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Sepeda</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
 <!-- header -->
 <?php include './components/HeaderNavbar.php';?>
<!-- endheader -->
<div class = "main-wrapper">
    <?php foreach ($sepeda as $x) : ?>
        <form action="" method="post">
            <div class = "container">
                <div class = "product-div">
                    <div class = "product-div-left">
                        <div class = "img-container">
                            <img src = "./components/img/<?= $x['gambar'];?>" alt = "watch">
                        </div>
                    </div>
                    <div class = "product-div-right">
                        <span class = "product-name"><?= $x['name'];?></span>
                        <span class = "product-price">Rp. <?= number_format ($x['price']);?></span>
                        <div class = "product-rating">
                            <i class = "fas fa-star"></i>
                            <i class = "fas fa-star"></i>
                            <i class = "fas fa-star"></i>
                            <i class = "fas fa-star"></i>
                            <i class = "fas fa-star-half-alt"></i>
                            <p><?= '('.$x['terjual'].' terjual )';?></p>
                        </div>
                        <div class="qty">
                            <input type="number" name="jumlah" id="" id="jumlah" min="1" size="20" value="1" max="<?= $x['stock'];?>">
                            <span><em>Stock <?= $x['stock'];?> Pcs</em></span>
                        </div>
                        <?php 
                        if ($x['stock']==0) : ?>
                            <strong><p class="stock-habis"><em>PRODUCT TIDAK TERSEDIA</em></p></strong>
                        <?php endif ?>
                        <!-- input hidden -->
                        <input type="hidden" name="price" value="<?php echo $x['price'];?>">
                        <input type="hidden" name="gambar" value="<?php echo $x['gambar'];?>">
                        <input type="hidden" name="id" value="<?php echo $x['id'];?>">
                        <input type="hidden" name="name" value="<?php echo $x['name'];?>">
                        <input type="hidden" name="stock" id="stock" value="<?php echo $x['stock'];?>">
                        <!-- end input hidden -->
                        <h2 class = "product-judul">About Product </h2>
                        <p class = "product-description"><?= $x['detail'];?>.</p>
                        <div class = "btn-groups">
                            <button name="keranjang" type = "submit" class = "add-cart-btn"><i class = "fas fa-shopping-cart"></i>add to cart</button>
                            <button  name="belisekarang" type = "submit" class = "buy-now-btn"><i class = "fas fa-wallet"></i>buy now</button>
                        </div>
                        <div class="icons-detail">
                            <p>Share Att : </p>
                            <span class="buttonicons facebook">
                                <i class="fab fa-facebook-f"></i>
                            </span>
                            <span class="buttonicons pinterest">
                                <i class="fab fa-pinterest"></i>
                            </span>
                            <span class="buttonicons twitter">
                                <i class="fab fa-twitter"></i>
                            </span>
                            <span class="buttonicons whastapp">
                                <i class="fa-brands fa-whatsapp-square"></i>
                            </span>
                            <span class="buttonicons telegram">
                                <i class="fab fa-telegram"></i>
                            </span class="buttonicons">
                            <span class="buttonicons linkedin">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endforeach ?>
</div>

<!-- footer -->
<?php include './components/footer.php';?>
<!-- endfooter -->

<script src="./assets/js/style.js"></script>
<script src="./assets/js/sharelink.js"></script>

</body>
</html> 