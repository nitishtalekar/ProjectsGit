<?php
require($_SERVER['DOCUMENT_ROOT']."dbconnect.php");
$_SESSION['title'] = 'Policy';
 ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>YogaAyurveda - Index</title>
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
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v2.0.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."include/header.php")?>



  <!-- ======= Hero Section ======= -->

  <main id="main">

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">


        <?php

          $query = "SELECT * FROM policy WHERE p_id='1'";
          $results = mysqli_query($db, $query);
          $row = mysqli_fetch_assoc($results);
        ?>

        <div class="row" data-aos="fade-up">
          <div id="rules" class="col-md-12 pt-5 pb-5">
            <h1>RULES AND REGULATIONS</h1>
            <p>
              <?=$row['rules']?>
            </p>
            <?php 
              $pdf_id = $row['rules_pdf'];
              $query = "SELECT * FROM pdf WHERE pdf_id='$pdf_id'";
              $p = mysqli_query($db, $query);
              $pdf = mysqli_fetch_assoc($p);
             ?>
             <p class="font-italic">
               <center><a href="<?= $pdf['pdf_path']; ?>" class="sendbtn" target="blank"> Read More</a></center>
             </p>
        </div>
        <hr>
          <div id="policy" class="col-md-12 pt-5 pb-5">
            <h1>PRIVACY POLICY</h1>
            <p>
              <?=$row['privacy']?>
            </p>
            <?php 
              $pdf_id = $row['privacy_pdf'];
              $query = "SELECT * FROM pdf WHERE pdf_id='$pdf_id'";
              $p = mysqli_query($db, $query);
              $pdf = mysqli_fetch_assoc($p);
             ?>
             <p class="font-italic">
               <center><a href="<?= $pdf['pdf_path']; ?>" class="sendbtn" target="blank"> Read More</a></center>
             </p>
        </div>
        <hr>
        <div id="terms" class="col-md-12 pt-5 pb-5">
          <h1>TERMS AND CONDITIONS</h1>
          <p>
            <?=$row['terms']?>
          </p>
          <?php 
            $pdf_id = $row['terms_pdf'];
            $query = "SELECT * FROM pdf WHERE pdf_id='$pdf_id'";
            $p = mysqli_query($db, $query);
            $pdf = mysqli_fetch_assoc($p);
           ?>
           <p class="font-italic">
             <center><a href="<?= $pdf['pdf_path']; ?>" class="sendbtn" target="blank"> Read More</a></center>
           </p>
      </div>
      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->

  <?php include($_SERVER['DOCUMENT_ROOT']."include/footer.php")?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
