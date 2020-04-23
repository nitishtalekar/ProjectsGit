<?php
require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
$_SESSION['title'] = 'Index';
 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>YogaAyurveda - Index</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->

      <?php

      $query = "SELECT * FROM home WHERE home_tag='1'";
      $results = mysqli_query($db, $query);
      $row = mysqli_fetch_assoc($results);

      $img_id = $row['home_image'];
      $query = "SELECT * FROM images WHERE image_id='$img_id'";
      $r = mysqli_query($db, $query);
      $img = mysqli_fetch_assoc($r);

       ?>

       <div class="carousel-item active">
         <div class="carousel-container">
           <img class="animated fadeInDown logo" src="<?= $img['image_path']; ?>" alt="">
           <h2 class="animated fadeInDown text-uppercase"><?= $row['home_title']; ?></h2>
           <p class="animated fadeInUp"><?= $row['home_description']; ?></p>
           <!-- <a href="" class="btn-get-started animated fadeInUp">Read More</a> -->
         </div>
       </div>

      <!-- <div class="carousel-item active">
        <div class="carousel-container">
          <img class="animated fadeInDown logo" src="/Shreejit/assets/img/Logo.png" alt="">
          <h2 class="animated fadeInDown"><span>WELCOME TO</span><br> YOGA AYURVEDA KARONA</h2>
          <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="" class="btn-get-started animated fadeInUp">Read More</a>
        </div>
      </div> -->

      <!-- Slide 2 -->

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

      <!-- <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animated fadeInDown">Recent Events 1</h2>
          <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="" class="btn-get-started animated fadeInUp">Read More</a>
        </div>
      </div> -->

      <!-- Slide 2 -->
      <!-- <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animated fadeInDown">Recent Events 2</h2>
          <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="" class="btn-get-started animated fadeInUp">Read More</a>
        </div>
      </div> -->

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
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="<?= $row['home_image']; ?>"></i></div>
              <h4 class="title"><a href="<?= $row['home_link']; ?>"><?= $row['home_title']; ?></a></h4>
              <p class="description"><?= $row['home_description']; ?></p>
            </div>
          </div>

          <?php

            }

          ?>
        </div>
        <!-- <div class="row">
          <div class="col-md-12 col-lg-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="fa fa-leaf"></i></div>
              <h4 class="title"><a href="">Our Purpose</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>

          <div class="col-md-12 col-lg-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="fa fa-globe"></i></div>
              <h4 class="title"><a href="">Our Goals</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div> -->

          <!-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div> -->

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

          ?>

          <div class="col-lg-8 video-box">
            <img src="/Shreejit/assets/img/Video.png" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-gall="gall-video" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-4 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-fingerprint"></i></div> -->
              <center>
              <h4 class="title"><a href="<?= $row['home_link']; ?>"><?= $row['home_title']; ?></a></h4>
              <p class="description"><?= $row['home_description']; ?></p>
              <!-- <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p> -->
            </center>
            </div>

            <!-- <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div> -->

          </div>

          <?php

            }

          ?>

        </div>

        <!-- <div class="row">



          <div class="col-lg-8 video-box">
            <img src="/Shreejit/assets/img/Video.png" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-gall="gall-video" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-4 d-flex flex-column justify-content-center p-5">

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <center>
              <h4 class="title"><a href="">Introduction</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </center>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

          </div>
        </div> -->

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

        <!-- <div class="section-title">
          <h2>What the Yoga Ayurveda Karona Offers</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div> -->


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
            <img src="/Shreejit/assets/img/features/Default.png" class="img-fluid" alt="">
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
            <img src="/Shreejit/assets/img/features/Default.png" class="img-fluid" alt="">
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
            <img src="/Shreejit/assets/img/features/Default.png" class="img-fluid" alt="">
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
            <img src="/Shreejit/assets/img/features/Default.png" class="img-fluid" alt="">
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
            <img src="/Shreejit/assets/img/features/Default.png" class="img-fluid" alt="">
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
