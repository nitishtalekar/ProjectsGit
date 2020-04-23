<?php 
require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
if(empty($_SESSION['admin'])){
  header('location:index.php');
}
$_SESSION['page'] = 'home';


if(isset($_POST['home_title'])){
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $tq = "UPDATE home SET home_title='$title' WHERE home_tag = '1';";
  mysqli_query($db, $tq);
  header('location: home.php');
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - YogaAyurveda</title>

  <!-- Custom fonts for this template-->
  <link href="/Shreejit/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/Shreejit/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/Shreejit/admin/include/sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include($_SERVER['DOCUMENT_ROOT']."/Shreejit/admin/include/navbar.php")?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Home</h5>
          </div>
          
          <?php       
            $qhome = "SELECT * FROM home WHERE home_tag = '1';";
            $reshome = mysqli_query($db, $qhome);
            $rowhome = mysqli_fetch_assoc($reshome);
           ?>

          <!-- Home Heading -->
          <div class="row">
              <div class="col-lg-6">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">HOME PAGE TITLE</h6>
                  </div>
                  <div class="card-body">
                    <form action="home.php" method="post">
                      <div class="d-flex justify-content-around">
                          <input type="text" name="title" class="form-control bg-light border-0 small" style="width:80%;height:10vh" value="<?=$rowhome['home_title']?>">
                          <button class="btn btn-primary" type="submit" name = 'home_title'>
                            Update
                          </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-6">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">TAGLINE</h6>
                  </div>
                  <div class="card-body">
                    <form action="home.php" method="post">
                      <div class="d-flex justify-content-around">
                          <textarea class="form-control bg-light border-0 small" style="width:80%;height:10vh"> <?=$rowhome['home_description']?> </textarea>
                          <button class="btn btn-primary" type="submit" name="tag">
                            Update
                          </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
            <?php    
              $ch_id = $rowhome['home_image'];
              $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
              $cresimg = mysqli_query($db, $cimg_qu);
              $checkrow = mysqli_fetch_assoc($cresimg);
              $checked_img = $checkrow['image_path'];   
              $qimg = "SELECT * FROM images ORDER BY image_id DESC";
              $resimg = mysqli_query($db, $qimg);
             ?>
             
            <div class="row">
                <div class="col-lg-11">
                  <form action="home.php" method="post">
                <div class="card shadow mb-4">
                  <!-- Card Header - Accordion -->
                  <a href="#collapseLogo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Logo</h6>
                  </a>
                  <!-- Card Content - Collapse -->
                  <div class="collapse" id="collapseLogo">
                    <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                      <?php 
                      echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="homebg" value="'.$rowhome['home_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                      while($rowimg = mysqli_fetch_assoc($resimg)){
                        $img = $rowimg['image_path'];
                        if($rowhome['home_image'] != $rowimg['image_id']){
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="homebg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                        }
                        
                      }
                       ?>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-lg-1">
                <button class="btn btn-primary mb-3" type="submit" name = 'home_bg'>
                  Update
                </button>
              </form>
              </div>
            </div>
              <?php    
                $bg_q = "SELECT * FROM background WHERE bg_page = 'home'";
                $bg_res = mysqli_query($db, $bg_q);
                $bg = mysqli_fetch_assoc($bg_res);
                $ch_id = $bg['bg_img'];
                $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                $cresimg = mysqli_query($db, $cimg_qu);
                $checkrow = mysqli_fetch_assoc($cresimg);
                $checked_img = $checkrow['image_path'];   
                $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                $resimg = mysqli_query($db, $qimg);
               ?>
            <div class="row">
                <div class="col-lg-11">
                  <form action="home.php" method="post">
                <div class="card shadow mb-4">
                  <!-- Card Header - Accordion -->
                  <a href="#collapseBg" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Background Image</h6>
                  </a>
                  <!-- Card Content - Collapse -->
                  <div class="collapse" id="collapseBg">
                    <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                      <?php 
                      echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="homebg" value="'.$rowhome['home_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                      while($rowimg = mysqli_fetch_assoc($resimg)){
                        $img = $rowimg['image_path'];
                        if( $bg['bg_img'] != $rowimg['image_id']){
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="homebg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                        }
                        
                      }
                       ?>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-lg-1">
                <button class="btn btn-primary mb-3" type="submit" name = 'home_bg'>
                  Update
                </button>
              </form>
              </div>
          </div>
          <!-- End home -->
          
          
          <!-- Purpose -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Pupose and Goals</h5>
          </div>
          
          <div class="row">
            <?php 
              $qhome = "SELECT * FROM home WHERE home_tag = '3';";
              $reshome = mysqli_query($db, $qhome);
              while($rowhome = mysqli_fetch_assoc($reshome)){

             ?>
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?=$rowhome['home_title']?></h6>
                </div>
                <div class="card-body">
                  <form action="home.php" method="post">
                    <div class="d-flex justify-content-around">
                        <textarea class="form-control bg-light border-0 small" style="width:80%;"><?=$rowhome['home_description']?></textarea>
                        <button class="btn btn-primary" type="submit" name="<?=$rowhome['home_link']?>">
                          Update
                        </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php 
              }
             ?>
          </div>
          <!-- End Purpose -->
          
          <!-- Intro -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Introduction</h5>
          </div>
          
          <?php  
            $qhome = "SELECT * FROM home WHERE home_tag = '4';";
            $reshome = mysqli_query($db, $qhome);
            $rowhome = mysqli_fetch_assoc($reshome);
          ?>
          
          <div class="row">
              <div class="col-lg-7">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Video Link</h6>
                          </div>
                          <div class="card-body">
                            <form action="home.php" method="post">
                              <div class="d-flex justify-content-around">
                                  <input type="text" class="form-control bg-light border-0 small" style="width:80%;" value="'<?=$rowhome['home_link']?>'" aria-label="Search" aria-describedby="basic-addon2">
                                  <button class="btn btn-primary" type="submit" name="video">
                                    Update
                                  </button>
                              </div>
                            </form>  
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Introduction</h6>
                          </div>
                          <div class="card-body">
                            <form action="home.php" method="post">
                              <div class="d-flex justify-content-around">
                                  <textarea class="form-control bg-light border-0 small" style="width:80%;height:15vh"><?=$rowhome['home_description']?></textarea>
                                  <button class="btn btn-primary" type="submit" name="intro">
                                    Update
                                  </button>
                              </div>
                            </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <?php      
                $ch_id = $rowhome['home_image'];
                $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                $cresimg = mysqli_query($db, $cimg_qu);
                $checkrow = mysqli_fetch_assoc($cresimg);
                $checked_img = $checkrow['image_path'];
                $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                $resimg = mysqli_query($db, $qimg);
               ?>
              
              <div class="col-lg-5">
                <div class="col-lg-12">
                  <form action="home.php" method="post">
                <div class="card shadow mb-4">
                  <!-- Card Header - Accordion -->
                  <a href="#collapseIntro" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Background Image</h6>
                  </a>
                  <!-- Card Content - Collapse -->
                  <div class="collapse show" id="collapseIntro">
                    <div class="img-card-body pt-3" style="height:34vh; overflow-x: hidden; overflow-y:auto;">
                      <?php 
                      echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="homebg" value="'.$rowhome['home_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                      while($rowimg = mysqli_fetch_assoc($resimg)){
                        $img = $rowimg['image_path'];
                        if($rowhome['home_image'] != $rowimg['image_id']){
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="homebg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                        }
                      }
                       ?>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-lg-12">
                <button class="btn btn-primary mb-3" style="width:100%" type="submit" name = 'home_bg'>
                  Update
                </button>
              </form>
              </div>
            </div>
            
          </div>
          <!-- End Intro -->
          
          <hr>
          
          <!-- Services Intro-->
          <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h5 class="h5 mb-0 text-gray-800">SERVICES</h5>
          </div>
          
          <?php  
            $qhome = "SELECT * FROM home WHERE home_tag = '5';";
            $reshome = mysqli_query($db, $qhome);
            $rowhome = mysqli_fetch_assoc($reshome);
          ?>
          
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?=$rowhome['home_title']?></h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <input type="text" class="form-control bg-light border-0 small" style="width:80%;" value="<?=$rowhome['home_description']?>">
                        <button class="btn btn-primary" type="submit" type="service">
                          Update
                        </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>            
          </div>
          <!-- End Services Intro -->
          
          <hr>
          <!-- Services Start -->
          <?php 
            $ser_arr = array('retreats','yoga','ayurveda','meditation','philosophy');
            $qhome = "SELECT * FROM home WHERE home_tag = '6';";
            $reshome = mysqli_query($db, $qhome);
            $x = 0;
            while($rowhome = mysqli_fetch_assoc($reshome)){
          ?>
          
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#collapsetop<?=$x?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase"><?=$ser_arr[$x]?></h6>
              </a>
              <div class="collapse" id="collapsetop<?=$x?>">
                <div class="img-card-body pt-3">
                  <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="h5 mb-0 text-gray-800 text-capitalize"><?=$ser_arr[$x]?></h5>
                  </div> -->
                  
                  <div class="row">
                    <?php      
                      $ch_id = $rowhome['home_image'];
                      $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                      $cresimg = mysqli_query($db, $cimg_qu);
                      $checkrow = mysqli_fetch_assoc($cresimg);
                      $checked_img = $checkrow['image_path'];
                      $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                      $resimg = mysqli_query($db, $qimg);
                     ?>
                    
                    <div class="col-lg-5">
                      <div class="col-lg-12">
                        <form action="home.php" method="post">
                      <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapse<?=$x?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                          <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select <?=$ser_arr[$x]?> Image</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapse<?=$x?>">
                          <div class="img-card-body pt-3" style="height:34vh; overflow-x: hidden; overflow-y:auto;">
                            <?php 
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="homebg" value="'.$rowhome['home_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                            while($rowimg = mysqli_fetch_assoc($resimg)){
                              $img = $rowimg['image_path'];
                              if($rowhome['home_image'] != $rowimg['image_id']){
                                  echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="homebg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                              }
                            }
                             ?>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12">
                      <button class="btn btn-primary mb-3" style="width:100%" type="submit" name = 'home_bg'>
                        Update
                      </button>
                    </form>
                    </div>
                  </div>
                  
                      <div class="col-lg-7">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="card shadow mb-4 mr-3">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?=$ser_arr[$x]?> Title</h6>
                                  </div>
                                  <div class="card-body">
                                    <form action="home.php" method="post">
                                      <div class="d-flex justify-content-around">
                                          <input type="text" class="form-control bg-light border-0 small" style="width:80%;" value="<?=$rowhome['home_title']?>">
                                          <button class="btn btn-primary" type="submit" name="<?=$ser_arr[$x]?>_title">
                                            Update
                                          </button>
                                      </div>
                                    </form>  
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="card shadow mb-4 mr-3">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">SHORT <?=$ser_arr[$x]?> Introduction</h6>
                                  </div>
                                  <div class="card-body">
                                    <form action="home.php" method="post">
                                      <div class="d-flex justify-content-around">
                                          <textarea class="form-control bg-light border-0 small" style="width:80%;height:15vh"><?=$rowhome['home_description']?></textarea>
                                          <button class="btn btn-primary" type="submit" name="<?=$ser_arr[$x]?>_intro">
                                            Update
                                          </button>
                                      </div>
                                    </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                  </div>
                </div>
              </div>
          </div>
          
          <?php 
              $x++;
            }
           ?>
           <!-- Services End -->
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto py-0">
          <div class="text-center my-auto">
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="submit" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/Shreejit/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/Shreejit/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/Shreejit/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/Shreejit/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
