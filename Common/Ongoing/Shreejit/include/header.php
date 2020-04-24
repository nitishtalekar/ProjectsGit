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
      <h1 class="text-light"><a href="index.php"><span>YOGA AYURVEDA</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php"><img src="/Shreejit/assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>
        <li <?= $th ?>><a href="/Shreejit/index.php">Home</a></li>
        <li class="drop-down"><a href="">Our Services</a>
          <ul>
            <li><a href="/Shreejit/services/retreats">Retreats</a></li>
            <li><a href="/Shreejit/services/philosophy">Philosophy</a></li>
            <li><a href="/Shreejit/services/yoga">Yoga</a></li>
            <li><a href="/Shreejit/services/ayurveda">Aayurveda</a></li>
            <li><a href="/Shreejit/services/meditation">Meditation</a></li>
          </ul>
        </li>
        <li <?= $tg ?> ><a href="/Shreejit/gallery.php">Gallery</a></li>
        <li <?= $tt ?> ><a href="/Shreejit/team.php">Team</a></li>
        <li <?= $tb ?> ><a href="/Shreejit/blog">Blog</a></li>    
        <li <?= $tc ?> ><a href="/Shreejit/contact.php">Contact Us</a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header>