<?php
  require($_SERVER['DOCUMENT_ROOT']."dbconnect.php");
  if(empty($_SESSION['admin'])){
    header('location:index.php');
  }
  if(isset($_POST['logout'])){
    session_destroy();
    header('location:admin/index.php');
  }
  if(isset($_POST['change_pwd'])){
    $new = mysqli_real_escape_string($db, $_POST['newpwd']);
    $cnew = mysqli_real_escape_string($db, $_POST['cnewpwd']);
    if($new == $cnew){
      $adn = $_SESSION['admin_name'];
      $pwd_q = "UPDATE admin SET password='$new' WHERE admin_name = '$adn';";
      mysqli_query($db,$pwd_q);
    }
  }
  
  $_SESSION['page'] = 'gallery';

  if(isset($_POST['gallery_addimages'])){
    if(!empty($_POST['addimages'])) {
      foreach($_POST['addimages'] as $value){
        $qu = "INSERT INTO gallery(gallery_image) VALUES ('$value');";
        mysqli_query($db, $qu);
        header('location: gallery.php');
      }
    }
  }

  if(isset($_POST['gallery_deleteimages'])){
    if(!empty($_POST['deleteimages'])) {
      foreach($_POST['deleteimages'] as $value){
        $qu = "DELETE FROM gallery WHERE gallery_image = '$value';";
        mysqli_query($db, $qu);
        header('location: gallery.php');
      }
    }
  }
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
<link href="<?=$imglogos['image_path']?>" rel="icon">  <title>Admin - YogaAyurveda</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include($_SERVER['DOCUMENT_ROOT']."admin/include/sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include($_SERVER['DOCUMENT_ROOT']."admin/include/navbar.php")?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Gallery Media</h5>
          </div>

          <?php
            $qimg = "SELECT * FROM images ORDER BY image_id DESC";
            $resimg = mysqli_query($db, $qimg);
           ?>

          <div class="row">
            <div class="col-lg-12">
              <form action="gallery.php" method="post">
            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <!-- <a href="#collapseAdd" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Add Media</h6>
              </a>
              <div class="collapse" id="collapseAdd"> -->
                <div class="img-card-body mt-3" style="height:40vh; overflow-x: hidden; overflow-y:auto;">
                  <?php
                  while($rowimg = mysqli_fetch_assoc($resimg)){
                    $img = $rowimg['image_path'];
                        echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="checkbox" name="addimages[]" value="'.$rowimg['image_id'].'">&nbsp&nbsp<img src="'.$img.'" alt="" style="width:150px"></label>';
                  }
                   ?>
                <!-- </div> -->
              </div>
            </div>
            </div>
              <div class="col-lg-12">
                  <button class="btn btn-primary mb-3" type="submit" name = 'gallery_addimages' style="width:100%">
                    Add to Gallery
                  </button>
            </form>
            </div>

             </div>

             <?php
               $qimg = "SELECT * FROM gallery ORDER BY gallery_id DESC";
               $resimg = mysqli_query($db, $qimg);
              ?>

             <div class="row">
               <div class="col-lg-12">
                 <form action="gallery.php" method="post">
               <div class="card shadow mb-4">
                 <!-- Card Header - Accordion -->
                 <!-- <a href="#collapseDel" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                   <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Delete Media</h6>
                 </a>
                 <div class="collapse" id="collapseDel"> -->
                   <div class="img-card-body mt-3" style="height:40vh; overflow-x: hidden; overflow-y:auto;">
                     <?php
                     while($rowimg = mysqli_fetch_assoc($resimg)){
                       $img_id = $rowimg['gallery_image'];
                       $imgq = "SELECT * FROM images WHERE image_id='$img_id';";
                       $imgres = mysqli_query($db, $imgq);
                       $imgrow = mysqli_fetch_assoc($imgres);
                       $img = $imgrow['image_path'];
                           echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="checkbox" name="deleteimages[]" value="'.$imgrow['image_id'].'">&nbsp&nbsp<img src="'.$img.'" alt="" style="width:150px"></label>';
                     }
                      ?>
                   <!-- </div> -->
                 </div>
               </div>
               </div>
                 <div class="col-lg-12">
                     <button class="btn btn-primary mb-3" type="submit" name = 'gallery_deleteimages' style="width:100%">
                       Delete from Gallery
                     </button>
               </form>
               </div>

                </div>





        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>YogaAyurvedaKarona</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
