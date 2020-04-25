<?php
  require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
  $_SESSION['title'] = 'Gallery';
 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $_SESSION['title'] ?> - YogaAyurveda</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php

  $queryl = "SELECT * FROM home WHERE home_tag='0'";
  $resultsl = mysqli_query($db, $queryl);
  $rowl = mysqli_fetch_assoc($resultsl);
  $img_idlogos = $rowl['home_image'];
  $querylogos = "SELECT * FROM images WHERE image_id='$img_idlogos'";
  $rlogos = mysqli_query($db, $querylogos);
  $imglogos = mysqli_fetch_assoc($rlogos);

 ?>

<!-- Favicons -->
<link href="<?=$imglogos['image_path']?>" rel="icon">
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

  <main id="main" style="min-height:calc(100vh - 440px)">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Our Gallery</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Our Gallery</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
      <div class="container">


        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active text-uppercase">All</li>

              <?php

                $query = "SELECT * FROM gallery GROUP BY gallery_tag;";
                $results = mysqli_query($db, $query);
                while($row = mysqli_fetch_assoc($results)){
                  if($row['gallery_tag'] != 'None'){

               ?>

              <li class="text-uppercase" data-filter=".filter-<?= $row['gallery_tag']; ?>"><?= $row['gallery_tag']; ?></li>
              <!-- <li data-filter=".filter-course">Course</li>
              <li data-filter=".filter-t">Treatment</li> -->
              <?php
                }}
              ?>
            </ul>
          </div>
        </div>


        <form class="" action="index.php" method="post">

          <div class="row portfolio-container" data-aos-easing="ease-in-out" data-aos-duration="500">

            <?php

            $query = "SELECT * FROM gallery;";
            $results = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($results)){

              $img_id = $row['gallery_image'];
              $query = "SELECT * FROM images WHERE image_id='$img_id'";
              $r = mysqli_query($db, $query);
              $img = mysqli_fetch_assoc($r);
              if($row['gallery_tag'] == 'None'){
                $gal_tag = 'Gallery';
                echo '<div class="col-lg-4 col-md-6">';
              }
              else{
                $gal_tag = $row['gallery_tag'];
                echo '<div class="col-lg-4 col-md-6 filter-'.$gal_tag.'">';
              }
            
            
            ?>
              <div class="portfolio-item">
                <img src="<?= $img['image_path']; ?>" class="img-fluid" alt="">
                <a href="<?= $img['image_path']; ?>" data-gall="portfolioGallery" class="venobox text-uppercase" title="<?= $gal_tag ?>">
                <div class="portfolio-info">
                  <h3 class="text-white"><?= $gal_tag; ?></h3>
                </div>
                </a>
              </div>
            </div>

              <?php

                }

              ?>

          </div>

        </form>



        <!-- <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
              <li data-filter=".filter-new">New</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos-easing="ease-in-out" data-aos-duration="500">

          <div class="col-lg-4 col-md-6 filter-app">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1">App 1</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-new">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1">NEW</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div><div class="col-lg-4 col-md-6 filter-new">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1">NEW</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-web">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 3">Web 3</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-web">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 3">Web 3</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-app">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 2">App 2</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-card">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Card 2">Card 2</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-web">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 2">Web 2</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-app">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 3">App 3</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-card">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Card 1">Card 1</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-card">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Card 3">Card 3</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 filter-web">
            <div class="portfolio-item">
              <img src="/Shreejit/assets/img/Default.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 1">Web 1</a></h3>
                <a href="/Shreejit/assets/img/Default.png" data-gall="portfolioGallery" class="venobox" title="Web 1"><i class="icofont-plus"></i></a>
              </div>
            </div>
          </div>

        </div> -->

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
