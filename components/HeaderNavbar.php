<header class="header">
    <section class="flex">
      <a href="#home" class="logo">EBIKE</a>

      <nav class="navbar">
        <a href="index.php?#home">Home</a> 
        <a href="index.php?#about">About</a>
        <a href="index.php?#product">Products</a>
        <a href="index.php?#contact">Contact</a>
      </nav>

      <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <?php if (!isset($_SESSION['id_user'])) { ?>
          <div id="search-btn" class="fas fa-search"></div>
          <div id="user-btn" class="fas fa-user"></div>
          <a href="./login.php"><div id="order-btn" class="fas fa-box"></div></a>
          <a href="./login.php"><div id="cart-btn" class="fas fa-shopping-cart"></div></a>
      
        <div class="profile">   
            <div class="profile-icons"id="profile-close"><i class="fa-solid fa-xmark"></i></div>
            <div class="flex-btn">
              <a href="register.php" class="option-btn">register</a>
              <a href="login.php" class="option-btn">login</a>
            </div> 
            </div>
        <?php }elseif (isset($_SESSION['id_user'])){
          $koneksi = mysqli_connect('localhost','root','','tugas_semester2');
          $user = mysqli_query ($koneksi,"SELECT * FROM users WHERE id=$id_user");
          $user_array = mysqli_fetch_assoc($user);
          $status = $user_array['status'];
          if ($status == 1){
            $id_user = $_SESSION['id_user'];
            $keranjang = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = $id_user && status=1");
            $Ckeranjang = mysqli_num_rows($keranjang); ?>
             <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <a href="./pembayaran.php"><div id="order-btn" class="fas fa-box"></div></a>
            <a href="./keranjang.php"><div id="cart-btn" class="fas fa-shopping-cart"><span><?= $Ckeranjang;?></span></div></a>
            <!-- <a href="./components/logout.php"><div id="cart-btn" class="fa-solid fa-arrow-right-from-bracket"></div></a> -->
            
            <div class="profile">   
              <div class="profile-icons"id="profile-close"><i class="fa-solid fa-xmark"></i></div>
              <p>Welcome, <?= $_SESSION["username"]; ?></p>
              <a href="components/admin.php" class="btn-update-profile">Daftar Menjadi Admin</a>
              <!-- <div class="flex-btn">
                <a href="register.php" class="option-btn">register</a>
                <a href="login.php" class="option-btn">login</a>
              </div> -->
              <a href="./components/logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
              </div>
              </div>
        <?php 
            
             }elseif ($status == 2) { 
              $id_user = $_SESSION['id_user'];
              $keranjang = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = $id_user && status=1");
              $Ckeranjang = mysqli_num_rows($keranjang); ?>
               <div id="search-btn" class="fas fa-search"></div>
              <div id="user-btn" class="fas fa-user"></div>
              <a href="./pembayaran.php"><div id="order-btn" class="fas fa-box"></div></a>
              <a href="./keranjang.php"><div id="cart-btn" class="fas fa-shopping-cart"><span><?= $Ckeranjang;?></span></div></a>
              <!-- <a href="./components/logout.php"><div id="cart-btn" class="fa-solid fa-arrow-right-from-bracket"></div></a> -->
              
              <div class="profile">   
                <div class="profile-icons"id="profile-close"><i class="fa-solid fa-xmark"></i></div>
                <p>Welcome, <?= $_SESSION["username"]; ?></p>
                <a href="./admin_suplier/admin/index.php" class="btn-update-profile">Kehalaman Admin</a>
                <!-- <div class="flex-btn">
                  <a href="register.php" class="option-btn">register</a>
                  <a href="login.php" class="option-btn">login</a>
                </div> -->
                <a href="./components/logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
                </div>
                </div>
             <?php }?> 
          <?php }?>
        <form action="" method="POST" class="search-form">
          <input type="search" placeholder="search here..." id="keyword">
          <label id="close-search" class="fas fa-search"></label>
      </form>
    </section>
  </header>