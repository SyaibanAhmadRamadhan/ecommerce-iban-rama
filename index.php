<?php 
  session_start();
// ini_set("display_errors",true);
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  require './assets/PHPMailer/src/Exception.php';
  require './assets/PHPMailer/src/PHPMailer.php';
  require './assets/PHPMailer/src/SMTP.php';
 
  if(isset($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];
  }else{
    $id_user = '';
  };
  include './components/config.php';
  hapusstatus1($koneksi);
  $sepeda = data("SELECT * FROM sepeda");
if (isset($_POST['contactus'])){
  $mail = new PHPMailer(true);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $no_hp = $_POST['no_hp'];
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'iniakunmaodijual@gmail.com';                     //SMTP username
    $mail->Password   = 'jual12345';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom( 'iniakunmaodijual@gmail.com',$email);
    $mail->addAddress('syaiban95@gmail.com');               //Name is optional

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $name;
    $mail->Body    = 'name : '.$name .'<br>'.'email : '.$email .'<br>' . 'no_hp : '.$no_hp . '<br><br><br>pesan : <br>'.$pesan;
    // $mail->AltBody = $no_hp;

    if($mail->send()){
    echo "<script>alert('Sudah Terkirim');
        document.location.href='index.php'</script>";
        exit;
    }else{
      echo "<script>alert('gagal terkirim');
        document.location.href='index.php'</script>";
        exit;
    }
    // header("Location:index.php");
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


<!-- home section starts  -->

<section1 class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box" style="background: url(./assets/img/imgslide/home.jpg);">
            <?php if (!isset($_SESSION['id_user'])) { ?>
              <div class="content">
                    <h3>NUSANTARA </h3>
                    <p>E-BIKE Store</p>
                    <div class="button">
                        <a href="register.php" class="btnhome">Register Now</a>
                    </div>
                </div>
              <?php } else {?>
                <div class="content">
                    <h3>NUSANTARA </h3>
                    <p>E-BIKE Store</p>
                    <div class="button">
                        <a href="#product" class="btnhome">shop now</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

</section1>

<!-- home section ends -->


<!-- about -->
<section class="about" id="about">

   <h1 class="heading">about us</h1>

   <div class="box-container">

      <div class="box">
         <img src="./assets/img/imgslide/asoggetti-HPpj2190tGs-unsplash.jpg" alt="">
         <h3>made with love</h3>
         <p>Toko Sepeda E-Bike merupakan salah satu distributor sepeda di indonesia. Dengan semangat dan dedikasi tinggi, Kami mengenalkan aneka macam tipe sepeda berkualitas untuk anak hingga dewasa.</p>
      </div>

      <!-- <div class="box">
         <img src="./assets/img/imgslide/paolo-chiabrando-KSwd2lb3lfs-unsplash.jpg" alt="">
         <h3>30 minutes delivery</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum quae amet beatae magni numquam facere sit. Tempora vel laboriosam repudiandae!</p>
      </div> -->

      <div class="box">
         <img src="./assets/img/imgslide/portuguese-gravity-MLbsn2aQfQs-unsplash.jpg" alt="">
         <h3>share with freinds</h3>
         <p>4 Sejak didirikan, Koleksi merk dan jenis sepeda kami makin bertambah banyak dan tentunya kualitas mutu dan harga terjangkau, dan barang-barang berkualitas, serta pelayanan yang sangat ramah.</p>
      </div>

   </div>

</section>
<!-- endabout -->


<!-- prooduct -->
<section id="product" class="menu">
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
</section>
<!-- end product -->

<!-- contact -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

    <div class="row">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.048310176368!2d106.85083321409314!3d-6.387767564255676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb8f802b09f5%3A0xcabf30e77020ccb!2sLenni%20Penjahit!5e0!3m2!1sid!2sid!4v1652850633106!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>

        <form action="" method="post">
            <h3 data-aos="zoom-in">Hubungi Kami!</h3>
            <input data-aos="zoom-in" name="name"type="text" placeholder="your name" class="box">
            <input data-aos="zoom-in" name="email"type="email" placeholder="your email" class="box">
            <input data-aos="zoom-in" name="no_hp"type="number" placeholder="your number" class="box">
            <textarea data-aos="zoom-in" name="pesan"placeholder="your message" class="box" cols="30" rows="10"></textarea>
            <input data-aos="zoom-in" name="contactus"type="submit" value="send message" class="btn">
        </form>

    </div>

</section>

<!-- contact section ends -->


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