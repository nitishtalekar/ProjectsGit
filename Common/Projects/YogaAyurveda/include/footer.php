

<!-- ======= Footer ======= -->
<footer id="footer" data-aos-easing="ease-in-out" data-aos-duration="500">

  <div class="footer-top">
    <div class="container">
      <div class="row">
        
        <?php

        $query = "SELECT * FROM contact_us;";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($results);

         ?>

        <div class="col-lg-3 col-md-6 footer-info">
          <h3>About Our Organization</h3>
          <p><?=$row['About']?></p>
          <div class="social-links mt-3">
            <a href="<?=$row['Facebook']?>" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="<?=$row['Instagram']?>" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="<?=$row['Youtube']?>" class="youtube"><i class="bx bxl-youtube"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/policy.php#rules">Rules & Regulations</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/policy.php#terms">Terms of Service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/policy.php#privacy">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-info">
          <h3>Rishikesh</h3>
          <div class="container p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg" frameborder="0" style="border:0;width:inherit;" allowfullscreen=""></iframe>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <div class="row">
            <div class="col-lg-6">
              <p>
              <?= $row['Address']; ?> <br><br>
              <p>
            </div>
            <div class="col-lg-6">
              <p>
                <strong>Phone:</strong><?= $row['Phone']; ?><br>
                <strong>Email:</strong><?= $row['Email']; ?><br>
              <p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container" style="opacity:0.1;">
    <div class="copyright">
      &copy; Copyright <strong><span>Moderna</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- End Footer -->
