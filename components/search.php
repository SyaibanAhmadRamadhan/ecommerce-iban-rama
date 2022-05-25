<?php
$koneksi = mysqli_connect("localhost","root","","tugas_semester2");

// ========================================================================================================================

// keluarin data
function data($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $sepeda=[];
    while ($array = mysqli_fetch_assoc($result) ){
        $sepeda[] = $array;
    }    
    return $sepeda;
}

$keyword = $_GET['keyword'];

$query = "SELECT * FROM sepeda WHERE 
                    name LIKE '%$keyword%'";

$sepeda = data($query);
// header("Location:#product")
?>

<!-- produk -->
<div id="container">
   <h1 class="heading">our menu</h1>

   <div class="box-container">
      <?php foreach ($sepeda as $x) : ?>
        <div class="box">
          <a href="detail.php?id=<?= $x['id'];?>"><img src="./components/img/<?= $x['gambar'];?>"alt="">
          <div class="name"><?= $x['name'];?></div>
          <div class="icon mt-3" >
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half"></i>
            <i class="font"><?= '('.$x['terjual'].' terjual )';?></i>
          </div>
          <p>Rp. <?= number_format($x['price']);?></p></a>
        </div>
      <?php endforeach ?>

   </div>
      </div>
<!-- end produk -->
