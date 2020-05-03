<?php
  require($_SERVER['DOCUMENT_ROOT']."/dbconnect.php");
  if(empty($_SESSION['admin'])){
    header('location:index.php');
  }
  if(isset($_POST['logout'])){
    session_destroy();
    header('location:/admin/index.php');
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

  
  $_SESSION['page'] = 'services';

  if(isset($_POST['add_retreat'])){
    $n = mysqli_real_escape_string($db, $_POST['retreat_name_add']);
    $pri = mysqli_real_escape_string($db, $_POST['retreat_priority_add']);
    $si = mysqli_real_escape_string($db, $_POST['retreat_sintro_add']);
    $li = mysqli_real_escape_string($db, $_POST['retreat_lintro_add']);
    $h = mysqli_real_escape_string($db, $_POST['retreat_hours_add']);
    $c = mysqli_real_escape_string($db, $_POST['retreat_cost_add']);
    $con = mysqli_real_escape_string($db, $_POST['retreat_contact_add']);
    $imgs = $_POST['retreat_img_add'];
    $pdfs = $_POST['retreat_pdf_add'];
    $add_q = "INSERT INTO retreats(retreat_name,retreat_priority, retreat_shortintro, retreat_longintro, retreat_hours, retreat_cost, retreat_intro_image, retreat_contact, retreat_pdf) VALUES ('$n','$pri','$si','$li','$h','$c','$imgs','$con','$pdfs')";
    mysqli_query($db, $add_q);
    echo "<script>alert('Added');</script>";
  }

  $servq = "SELECT count(*) FROM retreats;";
  $rserv = mysqli_query($db, $servq);
  $trow = mysqli_fetch_assoc($rserv);
  $cnt = $trow['count(*)'];
  // echo $cnt;
  for($i=0;$i<$cnt;$i++){

    if(isset($_POST['retreat_update_'.$i])){
        $id = mysqli_real_escape_string($db, $_POST['retreat_id_'.$i]);
        $n = mysqli_real_escape_string($db, $_POST['retreat_name_'.$i]);
        $pri = mysqli_real_escape_string($db, $_POST['retreat_priority_'.$i]);
        $si = mysqli_real_escape_string($db, $_POST['retreat_sintro_'.$i]);
        $li = mysqli_real_escape_string($db, $_POST['retreat_lintro_'.$i]);
        $h = mysqli_real_escape_string($db, $_POST['retreat_hours_'.$i]);
        $c = mysqli_real_escape_string($db, $_POST['retreat_cost_'.$i]);
        $con = mysqli_real_escape_string($db, $_POST['retreat_contact_'.$i]);
        $imgs = $_POST['retreat_img_'.$i];
        $pdfs = $_POST['retreat_pdf_'.$i];

        $update_q = "UPDATE retreats SET retreat_name='$n',retreat_priority='$pri',retreat_shortintro='$si',retreat_longintro='$li',retreat_hours='$h',retreat_cost='$c',retreat_intro_image='$imgs',retreat_contact='$con',retreat_pdf='$pdfs' WHERE retreat_id = '$id'";
        mysqli_query($db, $update_q);
        echo "<script>alert('Updated');</script>";
      }
    if(isset($_POST['retreat_delete_'.$i])){
        $id = mysqli_real_escape_string($db, $_POST['retreat_id_'.$i]);
        $delete_q = "DELETE FROM retreats WHERE retreat_id = '$id';";
        mysqli_query($db, $delete_q);
        echo "<script>alert('Deleted');</script>";
      }
  }

  if(isset($_POST['retreat_bg'])){
      $retreatbg = mysqli_real_escape_string($db, $_POST['retreatbg']);
      $update_bg = "UPDATE background SET bg_img='$retreatbg' WHERE bg_page = 'retreat';";
      mysqli_query($db, $update_bg);
      echo "<script>alert('Updated');</script>";
    }

    if(isset($_POST['retreat_description'])){
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $update_desc = "UPDATE background SET bg_description='$description' WHERE bg_page = 'retreat';";
        mysqli_query($db, $update_desc);
        echo "<script>alert('Updated');</script>";
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
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include($_SERVER['DOCUMENT_ROOT']."/admin/include/sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include($_SERVER['DOCUMENT_ROOT']."/admin/include/navbar.php")?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">retreat Background</h5>
          </div>

          <?php
            $bg_q = "SELECT * FROM background WHERE bg_page = 'retreat'";
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
              <form action="retreat.php" method="post">
            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#collapseBg" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Background Image</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseBg">
                <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                  <?php
                  echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="retreatbg" value="'.$bg['bg_img'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                  while($rowimg = mysqli_fetch_assoc($resimg)){
                    $img = $rowimg['image_path'];
                    if( $bg['bg_img'] != $rowimg['image_id']){
                        echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="retreatbg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                    }

                  }
                   ?>
                </div>
              </div>
            </div>
            </div>
            <div class="col-lg-1">
            <button class="btn btn-primary mb-3" type="submit" name = 'retreat_bg'>
              Update
            </button>
          </form>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase">TAGLINE</h6>
              </div>
              <div class="card-body">
                <form action="retreat.php" method="post">
                  <div class="d-flex justify-content-around">
                      <textarea name="description" class="form-control bg-light border-0 small" style="width:80%;height:8vh"> <?=$bg['bg_description']?> </textarea>
                      <button class="btn btn-primary" type="submit" name="retreat_description">
                        Update
                      </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">retreats</h5>
          </div>

          <!-- Page Heading -->
        <div class="row">

            <?php
              $q_ser = "SELECT * FROM retreats ORDER BY retreat_priority ASC;";
              $res_ser = mysqli_query($db, $q_ser);
              $x = 0;
              while($row_ser = mysqli_fetch_assoc($res_ser)){
             ?>

          <!-- Home Heading -->

              <div class="col-lg-12">
              <div class="card shadow mb-4">
                <a href="#collapse<?=$row_ser['retreat_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase"><?=$row_ser['retreat_name']?></h6>
                </a>
                <div class="collapse" id="collapse<?=$row_ser['retreat_id']?>">
                  <div class="card-body">
                    <form action="retreat.php" method="post">

                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">retreat NAME</label>
                          <input type="text" name="retreat_name_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;" value="<?=$row_ser['retreat_name']?>">
                          <input type="text" name="retreat_id_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;display:none" value="<?=$row_ser['retreat_id']?>">
                      </div>
                      
                      <div class="d-flex justify-content-center mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">retreat Priority</label>&nbsp;&nbsp;
                          <input type="number" name="retreat_priority_<?=$x?>" class="form-control bg-light border-0 small" style="width:35%;" value="<?=$row_ser['retreat_priority']?>" required>
                      </div>

                      <div class="d-flex justify-content-around mb-3">
                        <label class="text-uppercase" style="font-size:15px;">Short Intro</label>
                          <textarea class="form-control bg-light border-0 small" name="retreat_sintro_<?=$x?>"style="width:85%;height:15vh" ><?=$row_ser['retreat_shortintro']?></textarea>
                      </div>

                      <div class="d-flex justify-content-around mb-3">
                        <label class="text-uppercase" style="font-size:15px;">Long Intro</label>
                          <textarea class="form-control bg-light border-0 small" name="retreat_lintro_<?=$x?>"style="width:85%;height:15vh" ><?=$row_ser['retreat_longintro']?></textarea>
                      </div>
                      <?php
                        $ch_id = $row_ser['retreat_intro_image'];
                        $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                        $cresimg = mysqli_query($db, $cimg_qu);
                        $checkrow = mysqli_fetch_assoc($cresimg);
                        $checked_img = $checkrow['image_path'];
                        $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                        $resimg = mysqli_query($db, $qimg);
                       ?>
                      <div class="card mb-4">
                        <a href="#collapseintroimg<?=$row_ser['retreat_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                          <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Image</h6>
                        </a>
                        <div class="collapse" id="collapseintroimg<?=$row_ser['retreat_id']?>">
                          <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                            <?php
                            echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" checked="checked" name="retreat_img_'.$x.'" value="'.$row_ser['retreat_intro_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:100px"></label>';
                            while($rowimg = mysqli_fetch_assoc($resimg)){
                              $img = $rowimg['image_path'];
                              if($ch_id != $rowimg['image_id']){
                                  echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" name="retreat_img_'.$x.'" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                              }
                            }
                             ?>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase mr-2" style="font-size:15px;">Hours</label>
                          <input type="number" name="retreat_hours_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$row_ser['retreat_hours']?>">
                          <label class="text-uppercase mr-2" style="font-size:15px;">Cost</label>
                            <input type="number" name="retreat_cost_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$row_ser['retreat_cost']?>">
                      </div>
                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">retreat Contact Info</label>
                          <input type="text" name="retreat_contact_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;" value="<?=$row_ser['retreat_contact']?>">
                      </div>

                      <?php
                        $ch_id = $row_ser['retreat_pdf'];
                        $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                        $cresimg = mysqli_query($db, $cimg_qu);
                        $checkrow = mysqli_fetch_assoc($cresimg);
                        $xpdfx = $checkrow['pdf_path'];
                        $tar = explode("/",$xpdfx);
                        $checked_pdf = array_slice($tar, -1)[0];
                        $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                        $resimg = mysqli_query($db, $qimg);
                       ?>

                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">SELECT retreat document</label>
                          <select class="js-example-basic-single custom-select mr-sm-2" name="retreat_pdf_<?=$x?>" style="width:85%;height:10vh;">
                            <?php
                              echo '<option selected value="'.$ch_id.'">'.$checked_pdf.'</option>';
                              while($rowimg = mysqli_fetch_assoc($resimg)){
                                $pdfx = $rowimg['pdf_path'];
                                $tar = explode("/",$pdfx);
                                $pdf = array_slice($tar, -1)[0];
                                if($ch_id != $rowimg['pdf_id']){
                                    echo '<option value="'.$rowimg['pdf_id'].'">'.$pdf.'</option>';
                                }
                              }
                             ?>

                          </select>
                    </div>



                      <div class="d-flex justify-content-around mb-3 mt-5">
                        <button class="btn btn-primary" type="submit" style="width:100%" name='retreat_update_<?=$x?>'>
                          Update
                        </button>
                      </div>
                      <div class="d-flex justify-content-around mb-3 mt-2">
                        <button class="btn btn-danger" type="submit" style="width:100%" name='retreat_delete_<?=$x?>'>
                          Remove
                        </button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>
        </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">Add retreat</h5>
          </div>

        <div class="row">

          <!-- Home Heading -->

              <div class="col-lg-12">
              <div class="card shadow mb-4">
                <a href="#collapseAddretreat" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Add to retreat</h6>
                </a>
                <div class="collapse" id="collapseAddretreat">
                  <div class="card-body">
                    <form action="retreat.php" method="post">

                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">retreat NAME</label>
                          <input type="text" name="retreat_name_add" class="form-control bg-light border-0 small" style="width:85%;" placeholder="Enter Name" required>
                      </div>
                      
                      <div class="d-flex justify-content-center mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">retreat Priority</label>&nbsp;&nbsp;
                          <input type="number" name="retreat_priority_add" class="form-control bg-light border-0 small" style="width:35%;" value="99" required>
                      </div>

                      <div class="d-flex justify-content-around mb-3">
                        <label class="text-uppercase" style="font-size:15px;">Short Intro</label>
                          <textarea class="form-control bg-light border-0 small" name="retreat_sintro_add"style="width:85%;height:15vh" >Short Introduction</textarea>
                      </div>

                      <div class="d-flex justify-content-around mb-3">
                        <label class="text-uppercase" style="font-size:15px;">Long Intro</label>
                          <textarea class="form-control bg-light border-0 small" name="retreat_lintro_add"style="width:85%;height:15vh" >Long Introduction</textarea>
                      </div>
                      <?php
                      $ch_id = 1;
                      $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                      $cresimg = mysqli_query($db, $cimg_qu);
                      $checkrow = mysqli_fetch_assoc($cresimg);
                      $checked_img = $checkrow['image_path'];
                      $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                      $resimg = mysqli_query($db, $qimg);
                       ?>
                      <div class="card mb-4">
                        <a href="#collapseintroimgAdd" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                          <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Image</h6>
                        </a>
                        <div class="collapse" id="collapseintroimgAdd">
                          <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                            <?php
                            echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" checked="checked" name="retreat_img_add" value="'.$ch_id.'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:100px"></label>';
                            while($rowimg = mysqli_fetch_assoc($resimg)){
                              $img = $rowimg['image_path'];
                              if($ch_id != $rowimg['image_id']){
                                  echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" name="retreat_img_add" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                              }
                            }
                             ?>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase mr-2" style="font-size:15px;">Hours</label>
                          <input type="number" name="retreat_hours_add"class="form-control bg-light border-0 small" style="width:45%;" placeholder="Enter Value">
                          <label class="text-uppercase mr-2" style="font-size:15px;">Cost</label>
                            <input type="number" name="retreat_cost_add"class="form-control bg-light border-0 small" style="width:45%;" placeholder="Enter Value">
                      </div>
                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">retreat Contact Info</label>
                          <input type="text" name="retreat_contact_add" class="form-control bg-light border-0 small" style="width:85%;" placeholder="Enter Value">
                      </div>

                      <?php
                      $ch_id = 1;
                      $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                      $cresimg = mysqli_query($db, $cimg_qu);
                      $checkrow = mysqli_fetch_assoc($cresimg);
                      $xpdfx = $checkrow['pdf_path'];
                      $tar = explode("/",$xpdfx);
                      $checked_pdf = array_slice($tar, -1)[0];
                      $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                      $resimg = mysqli_query($db, $qimg);
                       ?>

                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">SELECT retreat document</label>
                          <select class="js-example-basic-single custom-select mr-sm-2" name="retreat_pdf_add" style="width:85%;height:10vh;">
                            <?php
                            echo '<option selected value="'.$ch_id.'">'.$checked_pdf.'</option>';
                            while($rowimg = mysqli_fetch_assoc($resimg)){
                              $pdfx = $rowimg['pdf_path'];
                              $tar = explode("/",$pdfx);
                              $pdf = array_slice($tar, -1)[0];
                              if($ch_id != $rowimg['pdf_id']){
                                  echo '<option value="'.$rowimg['pdf_id'].'">'.$pdf.'</option>';
                              }
                            }
                             ?>

                          </select>
                      </div>

                        <div class="d-flex justify-content-around mb-3 mt-5">
                          <button class="btn btn-primary" type="submit" style="width:100%" name='add_retreat'>
                            Add New retreat
                          </button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
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
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/popper.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/vendor/select2/select2.min.js"></script>

  <script type="text/javascript">
        $(document).ready(function() {
          $('.js-example-basic-single').select2();
      });
  </script>
  <!-- Core plugin JavaScript-->
  <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="/assets/vendor/daterangepicker/daterangepicker.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
