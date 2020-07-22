<?php 

if($_SESSION['title'] == 'Index'){
  $th = 'class="active"';$tg = '';$ts = '';$tt = '';$tb = '';$tc = '';$transparent = 'header-transparent';
}
if($_SESSION['title'] == 'Gallery'){
  $th = '';$tg = 'class="active"';$ts = '';$tt = '';$tb = '';$tc = '';$transparent = '';
}
if($_SESSION['title'] == 'Services'){
  $th = '';$tg = '';$ts = '';$tt = '';$tb = '';$tc = '';$transparent = 'header-transparent';
}
if($_SESSION['title'] == 'Team'){
  $th = '';$tg = '';$ts = '';$tt = 'class="active"';$tb = '';$tc = '';$transparent = '';
}
if($_SESSION['title'] == 'Blog'){
  $th = '';$tg = '';$ts = '';$tt = '';$tb = 'class="active"';$tc = '';$transparent = '';
}
if($_SESSION['title'] == 'Contact'){
  $th = '';$tg = '';$ts = '';$tt = '';$tb = '';$tc = 'class="active"';$transparent = '';
}
if($_SESSION['title'] == 'Service'){
  $th = '';$tg = '';$ts = 'class="active"';$tt = '';$tb = '';$tc = '';$transparent = '';
}
if($_SESSION['title'] == 'Policy'){
  $th = '';$tg = '';$ts = '';$tt = '';$tb = '';$tc = '';$transparent = '';
}
 ?>

<!-- <header id="header" class="fixed-top header-transparent"> -->
  <header id="header" class="fixed-top <?=$transparent?>">
  <div class="container">

    <div class="logo float-left">
      
      <?php

      $querytitle = "SELECT * FROM home WHERE home_tag = '0';";
      $resultstitle = mysqli_query($db, $querytitle);
      $rowtitle = mysqli_fetch_assoc($resultstitle);

       ?>
       
      <h1 class="text-light text-uppercase"><a href="index.php"><span><?=$rowtitle['home_title']?></span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>
        <li <?= $th ?>><a href="/index.php">Home</a></li>
        <li class="drop-down"><a href="">Our Services</a>
          <ul>
            <li><a href="/services/retreats">Retreats</a></li>
            <li><a href="/services/philosophy">Philosophy</a></li>
            <li><a href="/services/yoga">Yoga</a></li>
            <li><a href="/services/ayurveda">Aayurveda</a></li>
            <li><a href="/services/meditation">Meditation</a></li>
          </ul>
        </li>
        <li <?= $tg ?> ><a href="/gallery.php">Gallery</a></li>
        <li <?= $tt ?> ><a href="/team.php">Team</a></li>
        <li <?= $tb ?> ><a href="/blog">Blog</a></li>    
        <li <?= $tc ?> ><a href="/contact.php">Contact Us</a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header>