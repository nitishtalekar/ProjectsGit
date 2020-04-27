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
  
  $_SESSION['page'] = 'dashboard';

  if(isset($_POST['dashboard_title'])){
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $tq = "UPDATE home SET home_title='$title' WHERE home_tag = '0';";
    mysqli_query($db, $tq);
    echo "<script>alert('Updated');</script>"; 
  }

  if(isset($_POST['dashboard_about'])){
    $about = mysqli_real_escape_string($db, $_POST['about']);
    $tq = "UPDATE contact_us SET About='$about';";
    mysqli_query($db, $tq);
    echo "<script>alert('Updated');</script>"; 
  }

  if(isset($_POST['dashboard_logo'])){
    $logo = mysqli_real_escape_string($db, $_POST['logo']);
    $tq = "UPDATE home SET home_image='$logo' WHERE home_tag = '0';";
    mysqli_query($db, $tq);
    echo "<script>alert('Updated');</script>"; 
  }

  $servq = "SELECT count(*) FROM home WHERE home_tag = '2';";
  $rserv = mysqli_query($db, $servq);
  $trow = mysqli_fetch_assoc($rserv);
  $cnt = $trow['count(*)'];
  // echo $cnt;
  for($i=0;$i<$cnt;$i++){

    if(isset($_POST['event_update_'.$i])){
        $id = mysqli_real_escape_string($db, $_POST['event_id_'.$i]);
        $n = mysqli_real_escape_string($db, $_POST['event_name_'.$i]);
        $desc = mysqli_real_escape_string($db, $_POST['event_description_'.$i]);
        $link = mysqli_real_escape_string($db, $_POST['event_link_'.$i]);

        $update_q = "UPDATE home SET home_title='$n',home_description='$desc',home_link='$link' WHERE home_id = '$id'";
        mysqli_query($db, $update_q);
        echo "<script>alert('Updated');</script>";
      }
    if(isset($_POST['event_delete_'.$i])){
        $id = mysqli_real_escape_string($db, $_POST['event_id_'.$i]);
        $delete_q = "DELETE FROM home WHERE home_id = '$id';";
        mysqli_query($db, $delete_q);
        echo "<script>alert('Deleted');</script>";
        
      }
  }

  if(isset($_POST['add_event'])){
    $n = mysqli_real_escape_string($db, $_POST['event_name_add']);
    $desc = mysqli_real_escape_string($db, $_POST['event_description_add']);
    $link = mysqli_real_escape_string($db, $_POST['event_link_add']);
    $add_q = "INSERT INTO home(home_title, home_description, home_link, home_tag) VALUES ('$n','$desc','$link','2');";
    mysqli_query($db, $add_q);
    echo "<script>alert('Added');</script>";
   
  }

  if(isset($_POST['dashboard_rules'])){
    $rules = mysqli_real_escape_string($db, $_POST['rules']);
    $rpdf = $_POST['rules_pdf'];
    $tq = "UPDATE policy SET rules='$rules' , rules_pdf='$rpdf' WHERE 1;";
    mysqli_query($db, $tq);
    echo "<script>alert('Updated');</script>"; 
  }

  if(isset($_POST['dashboard_terms'])){
    $terms = mysqli_real_escape_string($db, $_POST['terms']);
    $tpdf = $_POST['terms_pdf'];
    $tq = "UPDATE policy SET terms='$terms'  , terms_pdf='$tpdf' WHERE 1;";
    mysqli_query($db, $tq);
    echo "<script>alert('Updated');</script>"; 
  }

  if(isset($_POST['dashboard_privacy'])){
    $privacy = mysqli_real_escape_string($db, $_POST['privacy']);
    $ppdf = $_POST['privacy_pdf'];
    $tq = "UPDATE policy SET privacy='$privacy'  , privacy_pdf='$ppdf' WHERE 1;";
    mysqli_query($db, $tq);
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
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Dashboard</h5>
          </div>

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->

          <?php
            $qhome = "SELECT * FROM home WHERE home_tag = '0';";
            $reshome = mysqli_query($db, $qhome);
            $rowhome = mysqli_fetch_assoc($reshome);
           ?>


          <div class="row">
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase">TITLE</h6>
                </div>
                <div class="card-body">
                  <form action="dashboard.php" method="post">
                    <div class="d-flex justify-content-around">
                        <input type="text" name="title" class="form-control bg-light border-0 small" style="width:80%;height:5vh" value="<?=$rowhome['home_title']?>">
                        <button class="btn btn-primary" type="submit" name = 'dashboard_title'>
                          Update
                        </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <?php
              $qcontact = "SELECT * FROM contact_us ";
              $rescontact = mysqli_query($db, $qcontact);
              $rowcontact = mysqli_fetch_assoc($rescontact);
             ?>

            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase">ABOUT US</h6>
                </div>
                <div class="card-body">
                  <form action="dashboard.php" method="post">
                    <div class="d-flex justify-content-around">
                        <input type="text" name="about" class="form-control bg-light border-0 small" style="width:80%;height:5vh" value="<?=$rowcontact['About']?>">
                        <button class="btn btn-primary" type="submit" name = 'dashboard_about'>
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
                <form action="dashboard.php" method="post">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseLogo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Icon</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseLogo">
                  <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                    <?php
                    echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="logo" value="'.$rowhome['home_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                    while($rowimg = mysqli_fetch_assoc($resimg)){
                      $img = $rowimg['image_path'];
                      if($rowhome['home_image'] != $rowimg['image_id']){
                          echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="logo" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                      }

                    }
                     ?>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-lg-1">
              <button class="btn btn-primary mb-3" type="submit" name = 'dashboard_logo'>
                Update
              </button>
            </form>
            </div>
          </div>
          <hr>
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-uppercase">ENQUIRIES</h5>
          </div>
          

              <div class="card shadow mb-4">
                <a href="#collapseEnq" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Your Enquiries</h6>
                </a>
                <div class="collapse show" id="collapseEnq">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email Id</th>
                          <th>Subject</th>
                          <th>Enquiry</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email Id</th>
                          <th>Subject</th>
                          <th>Enquiry</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php 
                        $eq = "SELECT * FROM enquiry;";
                        $eres = mysqli_query($db, $eq);                      
                        while($erow = mysqli_fetch_assoc($eres)){

                         ?>
                        
                        <tr>
                          <td><?=$erow['en_id']?></td>
                          <td><?=$erow['en_name']?></td>
                          <td><?=$erow['en_mail']?></td>
                          <td><?=$erow['en_subject']?></td>
                          <td><?=$erow['en_msg']?></td>
                        </tr>
                        
                      <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <hr>
          
          


          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">featured events</h5>
          </div>
          
          <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#collapsetopFE" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">FEATURED Events</h6>
              </a>
              <div class="collapse" id="collapsetopFE">
                <div class="img-card-body pt-3 px-3">

          <div class="row">

              <?php
                $q_ser = "SELECT * FROM home WHERE home_tag = '2';";
                $res_ser = mysqli_query($db, $q_ser);
                $x = 0;
                while($row_ser = mysqli_fetch_assoc($res_ser)){
               ?>

            <!-- Home Heading -->

              <div class="col-lg-6 mx-auto">
                <div class="card shadow mb-4">
                  <a href="#collapse<?=$row_ser['home_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase"><?=$row_ser['home_title']?></h6>
                  </a>
                  <div class="collapse" id="collapse<?=$row_ser['home_id']?>">
                    <div class="card-body">
                      <form action="dashboard.php" method="post">

                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">Event NAME</label>
                            <input type="text" name="event_name_<?=$x?>" class="form-control bg-light border-0 small" style="width:70%;" value="<?=$row_ser['home_title']?>">
                            <input type="text" name="event_id_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;display:none" value="<?=$row_ser['home_id']?>">
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Event Description</label>
                            <textarea class="form-control bg-light border-0 small" name="event_description_<?=$x?>"style="width:85%;height:15vh" ><?=$row_ser['home_description']?></textarea>
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Event Link</label>
                            <input type="text" class="form-control bg-light border-0 small" name="event_link_<?=$x?>"style="width:85%;" value="<?=$row_ser['home_link']?>">
                        </div>

                        <div class="d-flex justify-content-around mb-3 mt-5">
                          <button class="btn btn-primary" type="submit" style="width:100%" name='event_update_<?=$x?>'>
                            Update
                          </button>
                        </div>
                        <div class="d-flex justify-content-around mb-3 mt-2">
                          <button class="btn btn-danger" type="submit" style="width:100%" name='event_delete_<?=$x?>'>
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

          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">Add featured events</h5>
          </div> -->

          <div class="row">

            <!-- Home Heading -->

                <div class="col-lg-12 mx-auto">
                <div class="card shadow mb-4">
                  <a href="#collapseAddevent" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Add to Featured Events</h6>
                  </a>
                  <div class="collapse" id="collapseAddevent">
                    <div class="card-body">
                      <form action="dashboard.php" method="post">

                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">Event NAME</label>
                            <input type="text" name="event_name_add" class="form-control bg-light border-0 small" style="width:85%;" placeholder="Enter Name" required>
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Event Description</label>
                            <textarea class="form-control bg-light border-0 small" name="event_description_add"style="width:85%;height:15vh" >Event Description</textarea>
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Event Link</label>
                            <input type="text" class="form-control bg-light border-0 small" name="event_link_add"style="width:85%;" value="#">
                        </div>

                          <div class="d-flex justify-content-around mb-3 mt-5">
                            <button class="btn btn-primary" type="submit" style="width:100%" name='add_event'>
                              Add New Event
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
    
    <hr>
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h5 class="h5 mb-0 text-gray-800 text-capitalize">policies</h5>
    </div>



          <?php
            $qpolicy = "SELECT * FROM policy;";
            $respolicy = mysqli_query($db, $qpolicy);
            $rowpolicy = mysqli_fetch_assoc($respolicy);
           ?>
           
           <div class="card shadow mb-4">
               <!-- Card Header - Accordion -->
               <a href="#collapsePolicy" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                 <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Edit Policy</h6>
               </a>
               <div class="collapse" id="collapsePolicy">
                 <div class="img-card-body pt-3 px-3">

          <div class="row">
              <div class="col-lg-12 mx-auto">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">RULES AND REGULATIONS</h6>
                  </div>
                  <div class="card-body">
                    <form action="dashboard.php" method="post">
                      <div class="d-flex justify-content-around">
                          <textarea name="rules" class="form-control bg-light border-0 small" style="width:100%;height:10vh"> <?=$rowpolicy['rules']?> </textarea>
                      </div>
                      <?php 
                      $ch_id = $rowpolicy['rules_pdf'];
                      $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                      $cresimg = mysqli_query($db, $cimg_qu);
                      $checkrow = mysqli_fetch_assoc($cresimg);
                      $xpdfx = $checkrow['pdf_path'];
                      $tar = explode("/",$xpdfx);
                      $checked_pdf = array_slice($tar, -1)[0];
                      $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                      $resimg = mysqli_query($db, $qimg);
                       ?>
                      <div class="d-flex justify-content-around mb-3 mt-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">Change Rules document</label>
                          <select class="js-example-basic-single custom-select mr-sm-2" name="rules_pdf" style="width:65%;">
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
                        <div class="d-flex justify-content-around mt-3">
                      <button class="btn btn-primary" type="submit" name="dashboard_rules">
                        Update
                      </button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mx-auto">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary text-uppercase">TERM AND CONDITION</h6>
                    </div>
                    <div class="card-body">
                      <form action="dashboard.php" method="post">
                        <div class="d-flex justify-content-around">
                            <textarea name="terms" class="form-control bg-light border-0 small" style="width:100%;height:10vh"> <?=$rowpolicy['terms']?> </textarea>
                            
                        </div>
                        <?php 
                        $ch_id = $rowpolicy['terms_pdf'];
                        $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                        $cresimg = mysqli_query($db, $cimg_qu);
                        $checkrow = mysqli_fetch_assoc($cresimg);
                        $xpdfx = $checkrow['pdf_path'];
                        $tar = explode("/",$xpdfx);
                        $checked_pdf = array_slice($tar, -1)[0];
                        $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                        $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="d-flex justify-content-around mb-3 mt-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">Change Terms & Conditions document</label>
                            <select class="js-example-basic-single custom-select mr-sm-2" name="terms_pdf" style="width:65%;">
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
                          <div class="d-flex justify-content-around mt-3">
                        <button class="btn btn-primary" type="submit" name="dashboard_terms">
                          Update
                        </button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 mx-auto">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary text-uppercase">PRIVACY POLICY</h6>
                    </div>
                    <div class="card-body">
                      <form action="dashboard.php" method="post">
                        <div class="d-flex justify-content-around">
                            <textarea name="privacy" class="form-control bg-light border-0 small" style="width:100%;height:10vh"> <?=$rowpolicy['privacy']?> </textarea>
                            
                        </div>
                        <?php 
                        $ch_id = $rowpolicy['privacy_pdf'];
                        $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                        $cresimg = mysqli_query($db, $cimg_qu);
                        $checkrow = mysqli_fetch_assoc($cresimg);
                        $xpdfx = $checkrow['pdf_path'];
                        $tar = explode("/",$xpdfx);
                        $checked_pdf = array_slice($tar, -1)[0];
                        $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                        $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="d-flex justify-content-around mb-3 mt-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">Change Privacy document</label>
                            <select class="js-example-basic-single custom-select mr-sm-2" name="privacy_pdf_" style="width:65%;">
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
                          <div class="d-flex justify-content-around mt-3">
                        <button class="btn btn-primary" type="submit" name="dashboard_privacy">
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

  <!-- Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>
