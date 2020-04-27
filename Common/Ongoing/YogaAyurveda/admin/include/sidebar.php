<?php  
$td = "";$th = "";$tg = "";$tg_show = "";$tt = "";$tc = "";$ts = "";$ts_show = "";$tb = "";$tb_show = "";$ti = "";$tv = "";
if($_SESSION['page'] == 'dashboard'){
  $td = "active";
}
if($_SESSION['page'] == 'home'){
  $th = "active";
}
if($_SESSION['page'] == 'gallery'){
  $tg = "active";
  $tg_show = "show";
}
if($_SESSION['page'] == 'contact'){
  $tc = "active";
}
if($_SESSION['page'] == 'team'){
  $tt = "active";
}
if($_SESSION['page'] == 'services'){
  $ts = "active";
  $ts_show = "show";
}
if($_SESSION['page'] == 'blog'){
  $tb = "active";
  $tb_show = "show";
}
if($_SESSION['page'] == 'image'){
  $ti = "active";
}
if($_SESSION['page'] == 'pdf'){
  $tv = "active";
}
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

    <div class="sidebar-brand-text mx-3">Yoga Ayurveda</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $td ?>">
    <a class="nav-link" href="admin/dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  
  <li class="nav-item <?= $th ?>">
    <a class="nav-link" href="admin/home.php">
      <i class="fas fa-home"></i>
      <span>Home Page</span></a>
  </li>
  
  <li class="nav-item <?= $tg ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGal" aria-expanded="true" aria-controls="collapseGal">
      <i class="fa fa-film"></i>
      <span>Gallery</span>
    </a>
    <div id="collapseGal" class="collapse <?= $tg_show ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Gallery Media</h6>
        <a class="collapse-item" href="admin/gallery/gallery.php">Add/Delete Images</a>
        <a class="collapse-item" href="admin/gallery/tags.php">Tags</a>
      </div>
    </div>
  </li>
  
  <li class="nav-item <?= $tt ?>">
    <a class="nav-link" href="admin/team.php">
      <i class="fas fa-users"></i>
      <span>Team</span></a>
  </li>
  
  <li class="nav-item <?= $tc ?>">
    <a class="nav-link" href="admin/contact.php">
      <i class="fas fa-phone"></i>
      <span>Contact</span></a>
  </li>
  
  <li class="nav-item <?= $ts ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Services</span>
    </a>
    <div id="collapseTwo" class="collapse <?= $ts_show ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Our Services</h6>
        <a class="collapse-item" href="admin/services/retreat.php">Retreats</a>
        <a class="collapse-item" href="admin/services/yoga.php">Yoga</a>
        <a class="collapse-item" href="admin/services/ayurveda.php">Ayurveda</a>
        <a class="collapse-item" href="admin/services/meditation.php">Meditation</a>
        <a class="collapse-item" href="admin/services/philosophy.php">Philosophy</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item <?= $tb ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fa fa-th-large"></i>
      <span>Blog</span>
    </a>
    <div id="collapseUtilities" class="collapse <?= $tb_show ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Blog Pages</h6>
        <a class="collapse-item" href="admin/blog/blog.php">Page</a>
        <a class="collapse-item" href="admin/blog/post.php">Post</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Uploads
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item <?= $ti ?>">
    <a class="nav-link" href="admin/media/images.php">
      <i class="fa fa-camera"></i>
      <span>Images</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $tv ?>">
    <a class="nav-link" href="admin/media/pdfs.php">
      <i class="fa fa-file" aria-hidden="true"></i>
      <span>PDfs</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->