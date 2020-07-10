<?php

  require($_SERVER['DOCUMENT_ROOT']."/Amit/dbconnect.php");
  $sql = "SELECT * FROM blog;";
  $blg = mysqli_query($conn, $sql);

 ?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>About - Amit Kumar Meena</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="off-white">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo"><a href="index.php">Amit</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li class="active"><a href="blog.php">Blog</a></li>
          <li><a href="checkout.php">Checkout</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="min-height:calc(100vh - 120px)">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Blog</h2>

        </div>
        <?php

          $i = 0;

          while($row = mysqli_fetch_assoc($blg)){
            if($i % 2 == 0){
         ?>
        <div class="row mb-4">
          <div class="col-lg-4">
            <img src="<?= $row['blog_img'] ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content d-flex align-items-center">
            <div class="mt-2">
              <h3><?= $row['blog_title'] ?></h3>
              <p class="font-italic">
                <?= $row['blog_date'] ?>
              </p>
              <p>
                <?= $row['blog_content'] ?></p>
            </div>

          </div>
        </div>
        <?php
          }
          else{
            ?>
            <div class="row mb-4">
              <div class="col-lg-8 order-lg-first order-last pt-4 pt-lg-0 content d-flex align-items-center">
                <div class="mt-2">
                  <h3 style="text-align:right"><?= $row['blog_title'] ?></h3>
                  <p class="font-italic" style="text-align:right">
                    <?= $row['blog_date'] ?>
                  </p>
                  <p  style="text-align:right">
                    <?= $row['blog_content'] ?></p>
                </div>

              </div>
              <div class="col-lg-4 order-lg-last order-first">
                <img src="<?= $row['blog_img'] ?>" class="img-fluid" alt="">
              </div>
            </div>
            <?php
          }
          $i++;
        }
         ?>

      </div>
    </section><!-- End About Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-flex align-items-end justify-content-center">
      <div class="copyright" style="font-size:3px; opacity:0.3;">
        &copy; Copyright <strong><span>Kelly</span></strong>. All Rights Reserved
      </div>
      <div class="credits" style="font-size:3px; opacity:0.3;">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
