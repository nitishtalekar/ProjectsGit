<?php
  require($_SERVER['DOCUMENT_ROOT']."/Amit/dbconnect.php");

  $sql = "SELECT * FROM images;";
  $gal = mysqli_query($conn, $sql);
  $sql = "SELECT * FROM images WHERE image_tag = '1' ;";
  $gal_shop = mysqli_query($conn, $sql);

  if (!isset($_SESSION['checkout'])) {
        $_SESSION['checkout'] = array();
    }

 ?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Amit Kumar Meena - Index</title>
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

  <!-- =======================================================
  * Template Name: Amit - v2.0.0
  * Template URL: https://bootstrapmade.com/Amit-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="off-white">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo"><a href="index.php">Amit</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="Shop.php">Shop</a></li>
          <li><a href="Gallery.php">Gallery</a></li>
          <li><a href="blog.php">Blog</a></li>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center pt-2 pb-2" data-aos="zoom-in" data-aos-delay="100" style="background:rgba(0,0,0,0.4)">
      <center>
      <h1 class="text-white">Amit Kumar Meena</h1>
      <h2 class="text-white"><i>“There’s a fine grey line between black and white, Hyperrealism lies in between that grey line.”</i></h2>
    </center>
      <!-- <a href="about.php" class="btn-about">About Me</a> -->
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <!-- <p><b>Amit Kumar meena</b> (b. 1996) is a self taught artist living and working in Mumbai, India.</p> -->
        </div>

        <div class="row">
          <div class="col-lg-4">
            <center><img src="assets/img/profile.jpg" class="img-fluid" alt=""></center>
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content d-flex align-items-center">
            <div class="mt-2">
              <h3 class="text-uppercase">Amit Kumar meena</h3>
              <p class="font-italic">
                <b>Artist</b>
              </p>
              <p class="font-italic">
                Amit Kumar meena (b. 1996) is a self taught artist living and working in Mumbai, India.
              </p>
              <p>
  
                He’s working in a genre of art known as Hyper-realism. Over the years, he has gradually taught himself how to master charcoal on paper.
                All his work are purely made by charcoal which is really hard to handle.
                Amit’s work triggers emotions in the viewers minds through his hyperrealism. He says, “If you see my drawings closely, there’s happiness,
                sadness and different emotions which is real. We often get too involved with hyperrealism art that we forget to observe the emotion
                and we’re emotionless generation. I want people to accept and express.”
              </p>
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->


    <!-- ======= Facts Section ======= -->


    <!-- ======= Testimonials Section ======= -->

    <!-- End Testimonials Section -->

  </main>
  <!-- End #main -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Shop</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php

          $i = 0;

            while($row = mysqli_fetch_assoc($gal_shop)){
              if($i == 6){
                break;
              }

           ?>


          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= $row['image_path'] ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?= $row['image_title'] ?></h4>
                <p><?= $row['image_title'] ?></p>
                <div class="portfolio-links">
                  <a href="<?= $row['image_path'] ?>" data-gall="portfolioGallery" class="venobox" title="<?= $row['image_title'] ?>"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.php" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                  <span>COST : <?= $row['image_cost'] ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php
          $i = $i + 1;
          }
         ?>



        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <?php
          $i = 0;

            while($row = mysqli_fetch_assoc($gal)){
              if($i == 6){
                break;
              }

           ?>


          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= $row['image_path'] ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?= $row['image_title'] ?></h4>
                <p><?= $row['image_title'] ?></p>
                <div class="portfolio-links">
                  <a href="<?= $row['image_path'] ?>" data-gall="portfolioGallery" class="venobox" title="<?= $row['image_title'] ?>"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.php" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                  <span>COST : <?= $row['image_cost'] ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php
        $i = $i + 1;
          }
         ?>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  </main><!-- End #main -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-ic">
              <div class="icon">
                <div class="d-flex justify-content-center align-items-center icon-circle">
                  <i class="icofont-google-map"></i>
                </div>
                
              </div>
              <h4><a href="">Location</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-ic">
              <div class="icon">
                <div class="d-flex justify-content-center align-items-center icon-circle">
                  <i class="icofont-phone"></i>
                </div>
                
              </div>
              <h4><a href="">Phone</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-ic">
              <div class="icon">
                <div class="d-flex justify-content-center align-items-center icon-circle">
                  <i class="icofont-envelope"></i>
                </div>
                
              </div>
              <h4><a href="">E-Mail Id</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-flex align-items-end justify-content-center">
      <div class="copyright" style="font-size:3px; opacity:0.3;">
        &copy; Copyright <strong><span>Kelly</span></strong>. All Rights Reserved
      </div>
      <div class="credits" style="font-size:3px; opacity:0.3;">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/Amit-free-bootstrap-cv-resume-html-template/ -->
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
