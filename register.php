<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './assets/PHPMailer/src/Exception.php';
require './assets/PHPMailer/src/PHPMailer.php';
require './assets/PHPMailer/src/SMTP.php';
include './components/config.php';
hapusstatus1($koneksi);
if (isset($_POST['register'])) {
  register($_POST);
  $password = $_POST['username'];
  $email = $_POST['email'];
  $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'iniakunmaodijual@gmail.com';                     //SMTP username
    $mail->Password   = 'jual12345';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom( 'iniakunmaodijual@gmail.com','aktivasi akun');
    $mail->addAddress($email);               //Name is optional
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST['username'];
    $mail->Body    = "Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
    <a href='http://localhost/rama_htdocs/tugassemester2/components/activasi.php?t=".$password."'>http://localhost/tugassemester2/activation.php?t=".$password."</a>  ";

    $mail->send();
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
  <!-- header -->
  <?php include './components/HeaderNavbar.php';?>
  <!-- endheader -->

    <!-- login regist -->
    <div class="form-register-container">
      <form action="" method="post">
        <h3>Register Now</h3>
        <input type="text" name="username" required placeholder="enter your name" id="">
        <input type="text" name="email" required placeholder="enter your email" id="">
        <input type="password" name="password" required placeholder="enter your password" id="">
        <input type="password" name="password2" required placeholder="enter your password" id="">
        <input type="submit" name="register" value="register now" class="btn-register" id="">
        <p>Already Have An Account? <a href="login.php">Login Now</a></p>
      </form>
    </div>
    <!-- end login regist -->

    <!-- footer -->
    <?php include './components/footer.php';?>
    <!-- endfooter -->
  <script src="./assets/js/style.js"></script>
</body>
</html>