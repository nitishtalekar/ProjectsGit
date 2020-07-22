<?php
require($_SERVER['DOCUMENT_ROOT']."/dbconnect.php");
$_SESSION['title'] = 'Index';
 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>YogaAyurveda - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  
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
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel//assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v2.0.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <?php 
  
      $querybg1 = "SELECT * FROM background WHERE bg_page='home'";
      $resultsbg1 = mysqli_query($db, $querybg1);
      $rowbg1 = mysqli_fetch_assoc($resultsbg1);
      $imgid = $rowbg1['bg_img'];
      $querybg = "SELECT * FROM images WHERE image_id='$imgid';";
      $resultsbg = mysqli_query($db, $querybg);
      $rowbg = mysqli_fetch_assoc($resultsbg);

   ?>
  
  <style media="screen">
  #hero::after {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    width: 130%;
    height: 95%;
    background: linear-gradient(to right, rgba(0, 128, 129, 0.8), rgba(30, 67, 86, 0.6)), url('<?=$rowbg['image_path']?>') center top no-repeat;
    z-index: 0;
    border-radius: 0 0 50% 50%;
    transform: translateX(-50%) rotate(0deg);
  }
  
  @media (max-width: 768px) {
    #hero h2 {
      font-size: 28px;
    }
    #hero::after {
      width: 180%;
      height: 83vh;
      border-radius: 0 0 50% 50%;
      transform: translateX(-50%) rotate(0deg);
    }
    #hero::before {
      top: 0;
      width: 180%;
      height: 83vh;
      border-radius: 0 0 50% 50%;
      transform: translateX(-50%) translateY(20px) rotate(4deg);
    }
  }

  @media (max-width: 575px) {
    #hero::after {
      left: 40%;
      top: 0;
      width: 200%;
      height: 83vh;
      border-radius: 0 0 50% 50%;
      transform: translateX(-50%) rotate(0deg);
    }
    #hero::before {
      left: 50%;
      top: 0;
      width: 200%;
      height: 83vh;
      border-radius: 0 0 50% 50%;
      transform: translateX(-50%) translateY(20px) rotate(4deg);
    }
  }
  </style>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php")?>



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center" style="max-height: 100vh;"> 
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->  
      <?php

      $query = "SELECT * FROM home WHERE home_tag='1'";
      $results = mysqli_query($db, $query);
      $row = mysqli_fetch_assoc($results);

       ?>

       <div class="carousel-item active">
         <div class="carousel-container">
           <!-- <img class="animated fadeInDown logo" src="/assets/img/Logo.png" alt=""> -->
           <?php 
           $imglogo = $row['home_image'];
           $querylogo = "SELECT * FROM images WHERE image_id='$imglogo';";
           $resultslogo = mysqli_query($db, $querylogo);
           $rowlogo = mysqli_fetch_assoc($resultslogo);
            ?>
           <img src="<?= $rowlogo['image_path'] ?>" alt="" style="width:20vh">
           <br><br>
           <h2 class="animated fadeInDown text-uppercase"><?= $row['home_title']; ?></h2>
           <p class="animated fadeInUp"><?= $row['home_description']; ?></p>
           <!-- <a href="" class="btn-get-started animated fadeInUp">Read More</a> -->
         </div>
       </div>

      <?php

      $query = "SELECT * FROM home WHERE home_tag='2'";
      $results = mysqli_query($db, $query);
      while($row = mysqli_fetch_assoc($results)){

      ?>

        <div class="carousel-item">
          <div class="carousel-container">
            <h2 class="animated fadeInDown text-uppercase"><?= $row['home_title']; ?></h2>
            <p class="animated fadeInUp"><?= $row['home_description']; ?></p>
            <a href="<?= $row['home_link']; ?>" class="btn-get-started animated fadeInUp">Read More</a>
          </div>
        </div>

        <?php

      }

      ?>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">



    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">
        <div class="row">

        <?php

        $query = "SELECT * FROM home WHERE home_tag='3'";
        $results = mysqli_query($db, $query);
        while($row = mysqli_fetch_assoc($results)){

        ?>

          <div class="col-md-12 col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-teal">
              <div class="icon"><i class="<?= $row['home_image']; ?>"></i></div>
              <h4 class="title"><a href="<?= $row['home_link']; ?>"><?= $row['home_title']; ?></a></h4>
              <p class="description"><?= $row['home_description']; ?></p>
            </div>
          </div>

          <?php

            }

          ?>
        </div>
      
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">

        <div class="row">

          <?php

            $query = "SELECT * FROM home WHERE home_tag='4'";
            $results = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($results)){
              $imgvid = $row['home_image'];
              $queryvid = "SELECT * FROM images WHERE image_id='$imgvid';";
              $resultsvid = mysqli_query($db, $queryvid);
              $rowvid = mysqli_fetch_assoc($resultsvid);
              
          ?>

          <div class="col-lg-8 video-box">
            <img src="<?=$rowvid['image_path']?>" class="img-fluid" alt="">
            <a href="<?=$row['home_link']?>" class="venobox play-btn mb-4" data-gall="gall-video" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-4 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <center>
              <h4 class="title"><a href="<?= $row['home_link']; ?>"><?= $row['home_title']; ?></a></h4>
              <p class="description"><?= $row['home_description']; ?></p>
            </center>
            </div>

          </div>

          <?php

            }

          ?>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <?php

          $query = "SELECT * FROM home WHERE home_tag='5'";
          $results = mysqli_query($db, $query);
          while($row = mysqli_fetch_assoc($results)){

        ?>

        <div class="section-title">
          <h2><?= $row['home_title']; ?></h2>
          <p><?= $row['home_description']; ?></p>
        </div>

        <?php

          }

        ?>


        <?php

          $query = "SELECT * FROM home WHERE home_tag='6'";
          $results = mysqli_query($db, $query);
          $i = 0;
          while($row = mysqli_fetch_assoc($results)){
            $img_id = $row['home_image'];
            $query = "SELECT * FROM images WHERE image_id='$img_id'";
            $r = mysqli_query($db, $query);
            $img = mysqli_fetch_assoc($r);
            if ($i % 2 == 0){

        ?>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="<?= $img['image_path']; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-2">
            <h1><?= $row['home_title']; ?></h1>
            <p>
              <?= $row['home_description']; ?>
            </p>
            <a href="<?= $row['home_link']; ?>" class="btn-get-started animated fadeInUp">Explore</a>
          </div>
        </div>

        <?php

          }
          else{


         ?>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="<?= $img['image_path']; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-2 order-2 order-md-1">
            <h1><?= $row['home_title']; ?></h1>
            <p>
              <?= $row['home_description']; ?>
            </p>
            <a href="<?= $row['home_link']; ?>" class="btn-get-started animated fadeInUp">Explore</a>
          </div>
        </div>

        <?php
            }

            $i++;

          }

        ?>




        <!-- <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="/assets/img/features/Default.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-2">
            <h1>OUR RETREATS</h1>
            <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
            <ul>
              <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="icofont-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
            </ul>
            <a href="" class="btn-get-started animated fadeInUp">Explore</a>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="/assets/img/features/Default.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-2 order-2 order-md-1">
            <h1>PHILOSOPHY</h1>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
            <a href="" class="btn-get-started animated fadeInUp">Explore</a>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="/assets/img/features/Default.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-2">
            <h1>AYURVEDA</h1>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            </ul>
            <a href="" class="btn-get-started animated fadeInUp">Explore</a>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="/assets/img/features/Default.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-2 order-2 order-md-1">
            <h1>YOGA</h1>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
            <a href="" class="btn-get-started animated fadeInUp">Explore</a>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="/assets/img/features/Default.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-2">
            <h1>MEDITATIONS</h1>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="icofont-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="icofont-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
            </ul>
            <a href="" class="btn-get-started animated fadeInUp">Explore</a>
          </div>
        </div> -->

      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->

  <?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php")?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/assets/vendor/counterup/counterup.min.js"></script>
  <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
