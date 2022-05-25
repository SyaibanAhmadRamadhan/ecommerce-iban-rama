<?php 
session_start();
include './components/config.php';
hapusstatus1($koneksi);
if (isset($_POST['login'])){
    login($_POST);
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
</body>
</html>
<body class="bg-body">
  <!-- header -->
  <?php include './components/HeaderNavbar.php';?>
  <!-- endheader -->

    <!-- login regist -->
    <div class="form-login-container">
      <form action="" method="post">
        <h3>Login Now</h3>
        <input type="text" name="username" required placeholder="enter your name" id="">
        <input type="password" name="password" required placeholder="enter your password" id="">
        <input type="submit" name="login" value="login now" class="btn-login" id="">
        <p>Dont Have An Account? <a href="register.php">Register Now</a></p>
      </form>
    </div>
    <!-- end login regist -->

    <!-- footer -->
    <?php include './components/footer.php';?>
    <!-- endfooter -->
  <script src="./assets/js/style.js"></script>
</body>
</html>

</body>
</html>