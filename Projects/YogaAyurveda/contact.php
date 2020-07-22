<?php
  require($_SERVER['DOCUMENT_ROOT']."/dbconnect.php");
  $_SESSION['title'] = 'Contact';

  $query = "SELECT * FROM contact_us;";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);
  
  if(isset($_POST['contact_us'])){
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $subject = mysqli_real_escape_string($db, $_POST['subject']);
    $message = mysqli_real_escape_string($db, $_POST['message']);
    $q = "INSERT INTO enquiry(en_name, en_mail, en_subject, en_msg) VALUES ('$name','$mail','$subject','$message');";
    mysqli_query($db, $q);
    echo "<script>alert('Enquiry Sent');</script>"; 
  }
  
  if(isset($_GET['enq'])){
    $subject = $_GET['enq'];
  }
  else{
    $subject = 'Subject';
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
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map" style="color:#008181"></i>
                  <h3 style="color:#008181">Our Address</h3>
                  <p><?= $row['Address']; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope" style="color:#008181"></i>
                  <h3 style="color:#008181">Email Us</h3>
                  <p><?= $row['Email']; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-phone-call" style="color:#008181"></i>
                  <h3 style="color:#008181">Call Us</h3>
                  <p><?= $row['Phone']; ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">

            <div class="row">
                <div class="col-lg-12">
                  <form action="contact.php" method="post">
                <div class="card shadow mb-4">
                  <a href="#collapseCon" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-uppercase text-uppercase" style="color:#008181">Ask Your Queries</h6>
                  </a>
                  <div class="collapse show" id="collapseCon">
                    <div class="img-card-body" style="overflow-x: hidden; overflow-y:auto;">
                      <div class="d-flex justify-content-around mt-4">
                          <input type="text" name="name" class="form-control bg-light border-0 small" style="width:40%;" placeholder="Enter Name" required>
                          <input type="email" name="mail" class="form-control bg-light border-0 small" style="width:40%;" placeholder="Enter Email Address" required>
                      </div>
                      <div class="d-flex justify-content-around mt-4">
                          <input type="text" name="subject" class="form-control bg-light border-0 small" style="width:90%;" value="<?=$subject?>" required>
                      </div>
                      <div class="d-flex justify-content-around mt-4">
                          <textarea name="message" class="form-control bg-light border-0 small" style="width:90%;height:22vh;" placeholder="Enter Message" required></textarea>
                      </div>
                      <div class="d-flex justify-content-center mt-4">
                        <button class="sendbtn mb-3" type="submit" name = 'contact_us'>
                          Send Message
                        </button>
                      </div>
                      
                    </div>
                  </div>
                </div>
                </div>
              </form>
            </div>
          </div>

      </div>
      
      
    </section><!-- End Contact Section -->

    <!-- ======= Map Section ======= -->
    <section class="map mt-2">
      <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </section><!-- End Map Section -->

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
