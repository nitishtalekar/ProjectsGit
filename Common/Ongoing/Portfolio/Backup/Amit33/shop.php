<?php

  require($_SERVER['DOCUMENT_ROOT']."/Amit/dbconnect.php");

  $sql = "SELECT * FROM images WHERE image_tag = '1' ;";
  $gal_shop = mysqli_query($conn, $sql);
  
  if(!isset($_COOKIE['checkout_var'])){
    $_COOKIE['checkout_var'] = "";
  }


 ?>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shop - Amit Kumar Meena</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- =======================================================
  * Template Name: Amit - v2.0.0
  * Template URL: https://bootstrapmade.com/Amit-free-bootstrap-cv-resume-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script type="text/javascript">
    $(document).ready(function() {
      // console.log("HELLO");

      $(".portfolio-info").each(function(){
        var id = "#plus_"+$(this).attr("id");
        $(this).click(function(){
          $(id).click();
        })
      });

      $(".adding").each(function(){
        $(this).click(function(){
          $(this).attr('style','background:#4d4d4d');
          $("#"+$(this).attr("id")+"_info").html("IN CHECKOUT");
          $(this).prop('disabled', true);
          var old_cookie = "";
          var match = document.cookie.match(new RegExp('(^| )' + "checkout_var" + '=([^;]+)'));
          if (match){
            old_cookie = match[2];
          }
          document.cookie = "checkout_var = " + old_cookie + $(this).attr("value") +  ",";
          console.log(document.cookie);
        });
      });

    });
  </script>

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
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li class="active"><a href="shop.php">Shop</a></li>
          <li><a href="gallery.php">Gallery</a></li>
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

  <main id="main" style="min-height:calc(100vh - 120px)">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Shop</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <form action="shop.php" method="post">

          <?php

          $i = 0;

            while($row = mysqli_fetch_assoc($gal_shop)){
              // if($i == 6){
              //   break;
              // }

           ?>


          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= $row['image_path'] ?>" class="img-fluid" alt="">
              <div class="portfolio-info" id="<?= $i ?>">
                <h4><?= $row['image_title'] ?></h4>
                <p><?= $row['image_title'] ?></p>
                <div class="portfolio-links">
                  <a href="<?= $row['image_path'] ?>" id="plus_<?= $i ?>" data-gall="portfolioGallery" class="venobox" title="<?= $row['image_title'] ?>"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
            <div class="mt-1 d-flex justify-content-between mx-3">
              <span>COST : <b>₹ <?= $row['image_cost'] ?></b></span>
              <?php if (!in_array($row['image_id'], explode(",",$_COOKIE['checkout_var']))){
                 ?>
              <button type="button" class="buy-btn px-3 py-1 adding" name="add" id="add_<?= $i ?>s" onclick="return confirm('Add to checkout?')" value="<?= $row['image_id'] ?>" >
                <i class="fa fa-shopping-cart"></i> &nbsp;&nbsp; <span id="add_<?= $i ?>s_info">BUY</span>
              </button>
            <?php }
              else{
              ?>
              <button type="submit" class="buy-btn px-3 py-1" style="background:#4d4d4d" name="add" value="<?= $row['image_id'] ?>" disabled><i class="fa fa-shopping-cart"></i> &nbsp;&nbsp; IN CHECKOUT</button>
              <?php } ?>

            </div>
          </div>
        <?php
          $i = $i + 1;
          }
         ?>



        </div>
        </form>
      </div>
    </section><!-- End Portfolio Section -->

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
