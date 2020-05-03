<?php
  require($_SERVER['DOCUMENT_ROOT']."/dbconnect.php");
  $_SESSION['title'] = 'Service';
  $serve_title = '';

  $id =  $_GET['ayurveda'];
  $query = "SELECT * FROM ayurveda where ayurveda_id = '$id' ";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);

  $img_id = $row['ayurveda_intro_image'];
  $query = "SELECT * FROM images WHERE image_id='$img_id'";
  $r = mysqli_query($db, $query);
  $img = mysqli_fetch_assoc($r);

  $pdf_id = $row['ayurveda_pdf'];
  $query = "SELECT * FROM pdf WHERE pdf_id='$pdf_id'";
  $p = mysqli_query($db, $query);
  $pdf = mysqli_fetch_assoc($p);

  $serve_title = $row['ayurveda_name'];
  $s_tag = $row['ayurveda_tag'];
  if($s_tag == 'None'){
    $s_tag = 'ayurveda';
  }
  
  if(isset($_POST['enquiry'])){
    $get = 'Ayurveda-'.$s_tag.':-'.$serve_title;
    header('location: /contact.php?enq='.strtoupper($get));
  }
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

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v2.0.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php")?>

  <main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="text-uppercase"><?= $s_tag ?> : <?= $serve_title ?></h2>
          <ol>
            <li><a href="/index.php">Home</a></li>
            <li style="color:#008181">Services</li>
            <li><a href="index.php">Ayurveda</a></li>
            <li class="text-capitalize"><?= $s_tag ?></li>
            <li class="text-capitalize"><?= $serve_title ?></li>
          </ol>
        </div>
      </div>
      </section>

      <!-- ======= About Section ======= -->
      <section class="about" data-aos="fade-up">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 py-3">
              <center><h1 class="text-uppercase teal"><?= $serve_title ?></h1></center>
            </div>    
          </div>

          <div class="row">
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-md-1" style="text-align:center;">
              <h3><?= $row['ayurveda_longintro']; ?></h3>
              <p class="font-italic">
                <center><a href="<?= $pdf['pdf_path']; ?>" class="sendbtn" target="blank" style="width:80%"> Read More Information </a></center>
              </p>
            </div>
            <div class="col-lg-6 order-1 order-md-2">
              <center><img src="<?= $img['image_path']; ?>" class="img-fluid"  alt=""></center>
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <section class="facts section-bg" data-aos="fade-up">
        <div class="container">

          <div class="row counters">

            <div class="col-lg-6 col-12 text-center">
              <span style="font-size:70px" data-toggle="counter-up"><?= $row['ayurveda_hours']; ?></span>
              <p style="font-size:30px">Hours</p>
            </div>

            <div class="col-lg-6 col-12 text-center" >
              <span style="font-size:70px" data-toggle="counter-up"><?= $row['ayurveda_cost']; ?></span>
              <p style="font-size:30px">Rupees</p>
            </div>

          </div>

        </div>
      </section><!-- End Facts Section -->
      
      <section class="about" data-aos="fade-up">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 py-2">
              <form action="ayurveda.php?ayurveda=<?=$id?>" method="post">
              <p class="text-white">
                <center><button class="sendbtn text-uppercase" name="enquiry" style="width:80%;font-size:20px;">Enquire More</button></center>
              </p>                
            </form>
            </div>    
          </div>
        </div>
      </section>

<!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
