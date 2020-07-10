$checkout<?php

  require($_SERVER['DOCUMENT_ROOT']."/Amit/dbconnect.php");


  // $checkout = $_COOKIE['checkout_var'];
  $checkout = explode (",", $_COOKIE['checkout_var']);
  array_pop($checkout);

  $r_auth_key = "rzp_test_QYzYYLqx0k4yOQ";
  $t_amount = 100000;

  $sql = "SELECT * FROM images WHERE image_id IN (".implode(',', $checkout).")";
  $img = mysqli_query($conn, $sql);

 ?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Checkout - Amit Kumar Meena</title>
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

  <script type="text/javascript">

    $(document).ready(function() {
      var total = 0;
      $('.sub').each(function(){
        var val_id = "#costvalue_"+$(this).attr('id');
         total = total + parseInt($(val_id).val());
         // console.log(val_id);
         // console.log($(val_id));
        $(this).click(function(){
          console.log(total);
          var id = $(this).attr("id");
          var img = "#img_" + id;
          var cost = "#cost_" + id;
          var id_cost = $(this).val().split("_");
          var old_cookie = "";
          console.log(id_cost[1]);
          var match = document.cookie.match(new RegExp('(^| )' + "checkout_var" + '=([^;]+)'));
          if (match){
            old_cookie = match[2].split(",");
          }

          old_cookie = jQuery.grep(old_cookie, function(value) {
              return value != id_cost[0];
            });
          var new_cookie = old_cookie.join(",")
          console.log(new_cookie);
          var new_total = total - id_cost[1];
          console.log(new_total);
          $("#total_cost").html(new_total);
          document.cookie = "checkout_var = " + new_cookie;
          $(img).fadeOut("slow");
          $(cost).fadeOut("slow");
          $(img).css("display", "none");
          $(cost).css("display", "none");
          $(img).attr('class', '');
          $(cost).attr('class', '');
        });
        $("#total_cost").html(total);
      });
    });

  </script>

</head>

<body class="off-white">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo"><a href="index.php">Amit</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li class="active"><a href="checkout.php">Checkout</a></li>
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

  <main id="main">

    <!-- ======= About Section ======= -->
    <?php
    if(count($checkout) > 0){

     ?>
    <section id="about" class="about" style="min-height:calc(100vh - 120px)">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Checkout</h2>

        </div>
          <div class="row mb-4">
        <?php
        $total = 0;
        $i = 0;
          while($row = mysqli_fetch_assoc($img)){

         ?>

           <div class="col-lg-3 d-flex align-items-center" id="img_<?= $i ?>">
             <img src="<?= $row['image_path'] ?>" class="img-fluid" alt="">
           </div>
           <div class="col-lg-3 pt-4 pt-lg-0 content d-flex align-items-center mb-4" id="cost_<?= $i ?>">
             <div class="mt-2">
               <div class="mt-1">
                 <h3><?= $row['image_title']?></h3>
                 <p class="font-italic">
                   COST : <b>₹ <?= $row['image_cost'] ?></b>
                 </p>

               </div>
               <div class="mt-4">
                 <p>
                   <input type="number" id="costvalue_<?= $i ?>" value="<?= $row['image_cost'] ?>" hidden>
                   <button type="submit" name="sub" id="<?= $i ?>" class="delete-btn py-1 px-3 sub" value="<?= $row['image_id'] ?>_<?= $row['image_cost'] ?>"><i class="fa fa-minus text-white" aria-hidden="true"></i> &nbsp;&nbsp; REMOVE</button>
                   </p>
               </div>
             </div>
           </div>


        <?php
          $total = $total + intval($row['image_cost']);
          $i++;
          }
         ?>
         </div>

         <div class="row mt-5">
           <div class="col-12">
             <center>
               <h1  style="color:#4d4d4d" class="text-uppercase">Total Cost</h1>
               <hr style="background:#262626;width:30%;height:3px">
               <h2 style="color:#4d4d4d"><b>₹
                 <span id="total_cost">
                   0
                 </span>
                 </b></h2>
             </center>
           </div>
         </div>

         <form action="pay.php" method="POST">
     <script
         src="https://checkout.razorpay.com/v1/checkout.js"
         data-key="<?= $r_auth_key ?>" // Enter the Key ID generated from the Dashboard
         data-amount="<?= $t_amount ?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
         data-currency="INR"
         data-buttontext="Pay with Razorpay"
         data-name="Amit Kumar Mena"
         data-description="Test transaction"
         data-image="https://example.com/your_logo.jpg"
         data-theme.color="#EFEFEF"
     ></script>
     <input type="hidden" custom="Hidden Element" name="hidden">
     </form>



      </div>
    </section>

    <?php
      }
    else{
     ?>

    <section id="about" class="about" style="min-height:calc(100vh - 120px)">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Checkout</h2>

        </div>

        <div class="d-flex justify-content-center align-items-center" style="height:50%">
          <span>NO ITEMS ARE SELECTED</span>
        </div>

      </div>
    </section>
    <!-- End About Section -->
    <?php
        }
     ?>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-flex align-items-end justify-content-center">
      <div class="copyright" style="font-size:3px; opacity:0.3;">
        &copy; Copyright <strong><span>Kelly</span></strong>. All Rights Reserved
      </div>
      <div class="credits" style="font-size:3px; opacity:0.3;">
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
