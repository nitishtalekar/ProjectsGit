<?php
  require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
  $_SESSION['title'] = 'Services';

  $s_title = 'Retreat';

 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $s_title ?> - <?= $_SESSION['title'] ?> - YogaAyurveda</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="/Shreejit/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v2.0.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <?php

      $querybg1 = "SELECT * FROM background WHERE bg_page='retreat'";
      $resultsbg1 = mysqli_query($db, $querybg1);
      $rowbg1 = mysqli_fetch_assoc($resultsbg1);
      $imgid = $rowbg1['bg_img'];
      $querybg = "SELECT * FROM images WHERE image_id='$imgid';";
      $resultsbg = mysqli_query($db, $querybg);
      $rowbg = mysqli_fetch_assoc($resultsbg);
   ?>

  <style media="screen">
  #herohead::after {
    content: '';
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(0, 128, 129, 0.8), rgba(30, 67, 86, 0.6)), url("<?= $rowbg['image_path'] ?>") center top no-repeat;
    z-index: 0;
  }
  </style>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."/Shreejit/include/header.php")?>

  <!-- ======= Hero Section ======= -->
  <section id="herohead" class="d-flex justify-content-center align-items-center">
        <div class="head-container">
          <h2 class="animated fadeInDown text-uppercase"><?= $s_title ?></h2>
          <p class="animated fadeInUp"><?= $rowbg1['bg_description'] ?></p>
          <!-- <a href="" class="btn-get-started animated fadeInUp">Read More</a> -->
        </div>

  </section><!-- End Hero -->

  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-uppercase"><?= $s_title ?></h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Services</li>
          <li><?= $s_title ?></li>
        </ol>
      </div>

    </div>
  </section><!-- End Our Portfolio Section -->

  <main id="main2">

    <!-- ======= Features Section ======= -->

    <!-- <div class="section-title">
      <h2>Yoga Ayurveda Karona Retreats</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div> -->

    <section class="service-details">
      <div class="container">

        <form class="" action="index.php" method="post">

          <div class="row service-details-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

            <?php

            $query = "SELECT * FROM retreats ORDER BY retreat_id desc;";
            $results = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($results)){

              $img_id = $row['retreat_intro_image'];
              $query = "SELECT * FROM images WHERE image_id='$img_id'";
              $r = mysqli_query($db, $query);
              $img = mysqli_fetch_assoc($r);
            ?>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <div class="card-img">
                  <img src="<?= $img['image_path']; ?>" alt="...">
                </div>
                <div class="card-body">
                  <h5 class="card-title text-uppercase"><a href="retreat.php?retreat=<?= $row['retreat_id']; ?>"><?= $row['retreat_name']; ?></a></h5>
                  <p class="card-text"><?= $row['retreat_shortintro']; ?></p>
                  <div class="read-more"><a href="retreat.php?retreat=<?= $row['retreat_id']; ?>"><i class="icofont-arrow-right"></i> Read More</a></div>
                </div>
              </div>
            </div>

              <?php

                }

              ?>

          </div>

        </form>

        <!-- <div class="row">
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="/Shreejit/assets/img/Default.png" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Mission</a></h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="/Shreejit/assets/img/Default.png" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Plan</a></h5>
                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</p>
                <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
              </div>
            </div>

          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="/Shreejit/assets/img/Default.png" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Vision</a></h5>
                <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
                <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="/Shreejit/assets/img/Default.png" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Care</a></h5>
                <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam laudantium voluptatem. In molestiae earum ab sit esse voluptatem. Eos ipsam cumque ipsum officiis qui nihil aut incidunt aut</p>
                <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="/Shreejit/assets/img/Default.png" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Care</a></h5>
                <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam laudantium voluptatem. In molestiae earum ab sit esse voluptatem. Eos ipsam cumque ipsum officiis qui nihil aut incidunt aut</p>
                <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="/Shreejit/assets/img/Default.png" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="#">Our Care</a></h5>
                <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam laudantium voluptatem. In molestiae earum ab sit esse voluptatem. Eos ipsam cumque ipsum officiis qui nihil aut incidunt aut</p>
                <div class="read-more"><a href="#"><i class="icofont-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
        </div> -->


      </div>
    </section><!-- End Service Details Section -->

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
