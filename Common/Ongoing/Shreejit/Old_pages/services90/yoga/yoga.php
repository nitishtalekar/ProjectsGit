<?php
  require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
  $_SESSION['title'] = 'Service';
  $serve_title = 'Retreat1';

  $id =  $_GET['yoga'];
  $query = "SELECT * FROM yoga where yoga_id = '$id' ";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);

  $img_id = $row['yoga_intro_image'];
  $query = "SELECT * FROM images WHERE image_id='$img_id'";
  $r = mysqli_query($db, $query);
  $img = mysqli_fetch_assoc($r);

  $pdf_id = $row['yoga_pdf'];
  $query = "SELECT * FROM pdf WHERE pdf_id='$pdf_id'";
  $p = mysqli_query($db, $query);
  $pdf = mysqli_fetch_assoc($p);

  $serve_title = $row['yoga_name'];
 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $_SESSION['title'] ?> - YogaAyurveda</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/Shreejit/assets/img/favicon.png" rel="icon">
  <link href="/Shreejit/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/Shreejit/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Shreejit/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/Shreejit/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/Shreejit/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/Shreejit/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/Shreejit/assets/vendor/owl.carousel//Shreejit/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/Shreejit/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/Shreejit/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v2.0.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php include($_SERVER['DOCUMENT_ROOT']."/Shreejit/include/header.php")?>

  <main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?= $serve_title ?></h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Services</li>
            <li>Yoga</li>
            <li><?= $serve_title ?></li>
          </ol>
        </div>

      </div>

      <!-- ======= About Section ======= -->
      <section class="about" data-aos="fade-up">
        <div class="container">

          <div class="row">
            <div class="col-lg-6 pt-4 pt-lg-0" style="text-align:right;">
              <h3><?= $row['yoga_longintro']; ?></h3>
              <p class="font-italic">
                <a href="<?= $pdf['pdf_path']; ?>" target="blank" class="sendbtn mb-3"> Read PDF </a>
              </p>
            </div>
            <div class="col-lg-6">
              <center><img src="<?= $img['image_path']; ?>" class="img-fluid"  alt=""></center>
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <section class="facts section-bg" data-aos="fade-up">
        <div class="container">

          <div class="row counters">

            <div class="col-lg-6 col-12 text-center">
              <span style="font-size:70px" data-toggle="counter-up"><?= $row['yoga_hours']; ?></span>
              <p style="font-size:30px">Hours</p>
            </div>

            <div class="col-lg-6 col-12 text-center" >
              <span style="font-size:70px" data-toggle="counter-up"><?= $row['yoga_cost']; ?></span>
              <p style="font-size:30px">Rupees</p>
            </div>

            <!-- <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up">1,463</span>
              <p>Hours Of Support</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up">15</span>
              <p>Hard Workers</p>
            </div> -->

          </div>

        </div>
      </section><!-- End Facts Section -->

      <section class="portfolio">
        <div class="container">

          <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

            <div class="col-lg-3 col-md-6 filter-app">
              <div class="portfolio-item">
                <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1">App 1</a></h3>
                  <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 filter-new">
              <div class="portfolio-item">
                <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1">App 1</a></h3>
                  <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 filter-new">
              <div class="portfolio-item">
                <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1">App 1</a></h3>
                  <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 filter-web">
              <div class="portfolio-item">
                <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 3">Web 3</a></h3>
                  <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus"></i></a>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <?php include($_SERVER['DOCUMENT_ROOT']."/Shreejit/include/footer.php")?>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="/Shreejit/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/Shreejit/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/Shreejit/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/Shreejit/assets/vendor/php-email-form/validate.js"></script>
  <script src="/Shreejit/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/Shreejit/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/Shreejit/assets/vendor/counterup/counterup.min.js"></script>
  <script src="/Shreejit/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/Shreejit/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/Shreejit/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="/Shreejit/assets/js/main.js"></script>

</body>

</html>
