<?php
  require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
  $_SESSION['title'] = 'Contact';

  $query = "SELECT * FROM contact_us;";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);

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
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p><?= $row['Address']; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p><?= $row['Email']; ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p><?= $row['Number']; ?></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
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
