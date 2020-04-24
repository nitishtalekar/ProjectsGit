<?php 
require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
if(empty($_SESSION['admin'])){
  header('location:index.php');
}
$_SESSION['page'] = 'services';

$tag_qu = "SELECT * from tags WHERE tag_page='meditation';";
$restag = mysqli_query($db, $tag_qu);
$rowtag = mysqli_fetch_assoc($restag);
$tagnames = $rowtag['tag_names'];
$taglist = explode(';',$tagnames);

if(isset($_POST['meditation_section_add'])){
  $sec = mysqli_real_escape_string($db, $_POST['meditation_tag_new']);
  array_push($taglist,$sec);
  $tagstr = join(";",$taglist);
  $tag_update = "UPDATE tags SET tag_names='$tagstr' WHERE tag_page='meditation';";
  mysqli_query($db, $tag_update);
  echo "<script>alert('Added');</script>"; 
}
if(isset($_POST['meditation_section_del'])){
  for($i=0;$i<count($taglist);$i++){
    if(isset($_POST['meditation_deltag_'.$i])){
      if (($key = array_search($_POST['meditation_deltag_'.$i], $taglist)) !== false) {
          unset($taglist[$key]);
      }
      $tagstr = join(";",$taglist);
      $tag_update = "UPDATE tags SET tag_names='$tagstr' WHERE tag_page='meditation';";
      mysqli_query($db, $tag_update);
      echo "<script>alert('Removed');</script>"; 
    }
  }
}

if(isset($_POST['add_meditation'])){
  $n = mysqli_real_escape_string($db, $_POST['meditation_name_add']);
  $si = mysqli_real_escape_string($db, $_POST['meditation_sintro_add']);
  $li = mysqli_real_escape_string($db, $_POST['meditation_lintro_add']);
  $h = mysqli_real_escape_string($db, $_POST['meditation_hours_add']);
  $c = mysqli_real_escape_string($db, $_POST['meditation_cost_add']);
  $con = mysqli_real_escape_string($db, $_POST['meditation_contact_add']);
  $imgs = $_POST['meditation_img_add'];
  $pdfs = $_POST['meditation_pdf_add'];
  $xtag = $_POST['meditation_tag_add'];
  $add_q = "INSERT INTO meditation(meditation_name, meditation_shortintro, meditation_longintro, meditation_hours, meditation_cost, meditation_tag, meditation_intro_image, meditation_contact, meditation_pdf) VALUES ('$n','$si','$li','$h','$c','$xtag','$imgs','$con','$pdfs')";
  mysqli_query($db, $add_q);
  echo "<script>alert('Added');</script>"; 
}

$servq = "SELECT count(*) FROM meditation;";
$rserv = mysqli_query($db, $servq);
$trow = mysqli_fetch_assoc($rserv);
$cnt = $trow['count(*)'];
// echo $cnt;
for($i=0;$i<$cnt;$i++){
  
  if(isset($_POST['meditation_update_'.$i])){
      $id = mysqli_real_escape_string($db, $_POST['meditation_id_'.$i]);
      $n = mysqli_real_escape_string($db, $_POST['meditation_name_'.$i]);
      $si = mysqli_real_escape_string($db, $_POST['meditation_sintro_'.$i]);
      $li = mysqli_real_escape_string($db, $_POST['meditation_lintro_'.$i]);
      $h = mysqli_real_escape_string($db, $_POST['meditation_hours_'.$i]);
      $c = mysqli_real_escape_string($db, $_POST['meditation_cost_'.$i]);
      $con = mysqli_real_escape_string($db, $_POST['meditation_contact_'.$i]);
      $imgs = $_POST['meditation_img_'.$i];
      $pdfs = $_POST['meditation_pdf_'.$i];
      $xtag = $_POST['meditation_tag_'.$i];
      $update_q = "UPDATE meditation SET meditation_name='$n',meditation_shortintro='$si',meditation_longintro='$li',meditation_hours='$h',meditation_cost='$c',meditation_tag='$xtag',meditation_intro_image='$imgs',meditation_contact='$con',meditation_pdf='$pdfs' WHERE meditation_id = '$id'";
      mysqli_query($db, $update_q);
      echo "<script>alert('Updated');</script>"; 
    }
  if(isset($_POST['meditation_delete_'.$i])){
      $id = mysqli_real_escape_string($db, $_POST['meditation_id_'.$i]);
      $delete_q = "DELETE FROM meditation WHERE meditation_id = '$id';";
      mysqli_query($db, $delete_q);
      echo "<script>alert('Deleted');</script>"; 
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

  <title>Admin - meditationAyurveda</title>

  <!-- Custom fonts for this template-->
  <link href="/Shreejit/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/Shreejit/assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">meditation Background</h5>
          </div>
          
          <?php
            $bg_q = "SELECT * FROM background WHERE bg_page = 'meditation'";
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
              <form action="meditation.php" method="post">
            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#collapseBg" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Background Image</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseBg">
                <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                  <?php
                  echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="meditationbg" value="'.$bg['bg_img'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                  while($rowimg = mysqli_fetch_assoc($resimg)){
                    $img = $rowimg['image_path'];
                    if( $bg['bg_img'] != $rowimg['image_id']){
                        echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="meditationbg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                    }

                  }
                   ?>
                </div>
              </div>
            </div>
            </div>
            <div class="col-lg-1">
            <button class="btn btn-primary mb-3" type="submit" name = 'meditation_bg'>
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
                <form action="meditation.php" method="post">
                  <div class="d-flex justify-content-around">
                      <textarea name="description" class="form-control bg-light border-0 small" style="width:80%;height:8vh"> <?=$bg['bg_description']?> </textarea>
                      <button class="btn btn-primary" type="submit" name="meditation_description">
                        Update
                      </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">Add/Delete Section In meditation</h5>
          </div>
          
          <div class="row">
              <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">SECTIONS in meditation</h6>
                  </div>
                  <div class="card-body">
                    <div class="d-flex mb-3" style="align-items:center;">
                      <?php 
                      for($i=0;$i<count($taglist);$i++){
                        echo '<label class="text-uppercase" style="font-size:15px;">'.$taglist[$i].'&nbsp&nbsp&nbsp</label>';
                      }
                       ?>
                      </div>
                    <form action="meditation.php" method="post">
                      <div class="d-flex justify-content-around">
                          <input type="text" name="meditation_tag_new" class="form-control bg-light border-0 small" style="width:80%;" placeholder="Enter Section Name">
                          <button class="btn btn-primary" type="submit" name = 'meditation_section_add'>
                            Add New Section
                          </button>
                      </div>
                    </form>
                    <form action="meditation.php" method="post">
                      <div class="d-flex justify-content-center">
                          <?php 
                          for($i=0;$i<count($taglist);$i++){
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="checkbox" name="meditation_deltag_'.$i.'" value="'.$taglist[$i].'">&nbsp&nbsp'.$taglist[$i].'</label>'; 
                          }
                           ?>
                          
                      </div>
                      <center><button class="btn btn-primary" type="submit" name = 'meditation_section_del'>
                        Remove
                      </button></center>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">meditation</h5>
          </div>

          <!-- Page Heading -->
          <div class="row">
            
              <?php       
                $q_ser = "SELECT * FROM meditation;";
                $res_ser = mysqli_query($db, $q_ser);
                $x = 0;
                while($row_ser = mysqli_fetch_assoc($res_ser)){
               ?>

            <!-- Home Heading -->
            
                <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <a href="#collapse<?=$row_ser['meditation_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase"><?=$row_ser['meditation_name']?></h6>
                  </a>
                  <div class="collapse" id="collapse<?=$row_ser['meditation_id']?>">
                    <div class="card-body">
                      <form action="meditation.php" method="post">
                        
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">meditation NAME</label>
                            <input type="text" name="meditation_name_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;" value="<?=$row_ser['meditation_name']?>">
                            <input type="text" name="meditation_id_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;display:none" value="<?=$row_ser['meditation_id']?>">
                        </div>
                        
                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Short Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="meditation_sintro_<?=$x?>"style="width:85%;height:15vh" ><?=$row_ser['meditation_shortintro']?></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Long Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="meditation_lintro_<?=$x?>"style="width:85%;height:15vh" ><?=$row_ser['meditation_longintro']?></textarea>
                        </div>
                        <?php    
                          $ch_id = $row_ser['meditation_intro_image'];
                          $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                          $cresimg = mysqli_query($db, $cimg_qu);
                          $checkrow = mysqli_fetch_assoc($cresimg);
                          $checked_img = $checkrow['image_path'];   
                          $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                          $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="card mb-4">
                          <a href="#collapseintroimg<?=$row_ser['meditation_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Image</h6>
                          </a>
                          <div class="collapse" id="collapseintroimg<?=$row_ser['meditation_id']?>">
                            <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                              <?php 
                              echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" checked="checked" name="meditation_img_'.$x.'" value="'.$row_ser['meditation_intro_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:100px"></label>';
                              while($rowimg = mysqli_fetch_assoc($resimg)){
                                $img = $rowimg['image_path'];
                                if($ch_id != $rowimg['image_id']){
                                    echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" name="meditation_img_'.$x.'" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                                }                              
                              }
                               ?>
                            </div>
                          </div>
                        </div>
                        
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase mr-2" style="font-size:15px;">Hours</label>
                            <input type="number" name="meditation_hours_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$row_ser['meditation_hours']?>">
                            <label class="text-uppercase mr-2" style="font-size:15px;">Cost</label>
                              <input type="number" name="meditation_cost_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$row_ser['meditation_cost']?>">
                        </div>
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">meditation Contact Info</label>
                            <input type="text" name="meditation_contact_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;" value="<?=$row_ser['meditation_contact']?>">
                        </div>
                      
                      
                      <div class="row">
                        <?php    
                          $ch_id = $row_ser['meditation_pdf'];
                          $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                          $cresimg = mysqli_query($db, $cimg_qu);
                          $checkrow = mysqli_fetch_assoc($cresimg);
                          $checked_pdf = $checkrow['pdf_path'];   
                          $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                          $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="col-lg-6">                  
                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">Change meditation document</label>
                          <select class="js-example-basic-single custom-select mr-sm-2" name="ypga_pdf_<?=$x?>" style="width:85%;height:10vh;">    
                            <?php 
                              echo '<option selected value="'.$ch_id.'">'.$checked_pdf.'</option>';
                              while($rowimg = mysqli_fetch_assoc($resimg)){
                                $pdf = $rowimg['pdf_path'];
                                if($ch_id != $rowimg['pdf_id']){
                                    echo '<option value="'.$rowimg['pdf_id'].'">'.$pdf.'</option>';
                                }                              
                              }
                             ?>
                            
                          </select>
                        </div>
                        
                      </div>
                      
                      <div class="col-lg-6">  
                          <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                            <label class="text-uppercase" style="font-size:15px;">Change Section</label>
                              <select class="js-example-basic-single custom-select mr-sm-2" name="meditation_tag_<?=$x?>" style="width:85%;height:10vh;">    
                                <?php 
                                  $ch_id = $row_ser['meditation_tag'];
                                  echo '<option selected value="'.$ch_id.'">'.$ch_id.'</option>';
                                  $tag_qu = "SELECT * from tags WHERE tag_page='meditation';";
                                  $restag = mysqli_query($db, $tag_qu);
                                  $rowtag = mysqli_fetch_assoc($restag);
                                  $tagnames = $rowtag['tag_names'];
                                  $taglist = explode(';',$tagnames);
                                  for($i=0;$i<count($taglist);$i++){
                                    if($ch_id != $tagg){
                                        echo '<option value="'.$taglist[$i].'">'.$taglist[$i].'</option>';
                                    }   
                                  }
  
                                 ?>
                                
                              </select>
                            </div>                  
                            </div>
                        </div>
                      
                      
                      
                        <div class="d-flex justify-content-around mb-3 mt-5">
                          <button class="btn btn-primary" type="submit" style="width:100%" name='meditation_update_<?=$x?>'>
                            Update
                          </button>
                        </div>
                        <div class="d-flex justify-content-around mb-3 mt-2">
                          <button class="btn btn-danger" type="submit" style="width:100%" name='meditation_delete_<?=$x?>'>
                            Remove
                          </button>
                        </div>
                      
                    </form>
                  </div>
                </div>
              </div>
              </div>
              
            <?php $x++;} ?>
          </div>
          
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">Add to meditation</h5>
          </div>
          
          <div class="row">

            <!-- Home Heading -->
            
                <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <a href="#collapseAddmeditation" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Add to meditation</h6>
                  </a>
                  <div class="collapse" id="collapseAddmeditation">
                    <div class="card-body">
                      <form action="meditation.php" method="post">
                        
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">meditation NAME</label>
                            <input type="text" name="meditation_name_add" class="form-control bg-light border-0 small" style="width:85%;" placeholder="Enter Name" required>
                        </div>
                        
                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Short Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="meditation_sintro_add"style="width:85%;height:15vh" >Short Introduction</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Long Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="meditation_lintro_add"style="width:85%;height:15vh" >Long Introduction</textarea>
                        </div>
                        <?php    
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
                              while($rowimg = mysqli_fetch_assoc($resimg)){
                                $img = $rowimg['image_path'];
                                    echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" name="meditation_img_add" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';                         
                              }
                               ?>
                            </div>
                          </div>
                        </div>
                        
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase mr-2" style="font-size:15px;">Hours</label>
                            <input type="number" name="meditation_hours_add"class="form-control bg-light border-0 small" style="width:45%;" placeholder="Enter Value">
                            <label class="text-uppercase mr-2" style="font-size:15px;">Cost</label>
                              <input type="number" name="meditation_cost_add"class="form-control bg-light border-0 small" style="width:45%;" placeholder="Enter Value">
                        </div>
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">meditation Contact Info</label>
                            <input type="text" name="meditation_contact_add" class="form-control bg-light border-0 small" style="width:85%;" placeholder="Enter Value">
                        </div>
                      
                      <div class="row">
                        <?php    
                          $ch_id = $row_ser['meditation_pdf'];
                          $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                          $cresimg = mysqli_query($db, $cimg_qu);
                          $checkrow = mysqli_fetch_assoc($cresimg);
                          $checked_pdf = $checkrow['pdf_path'];   
                          $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                          $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="col-lg-6">                  
                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">Change meditation document</label>
                          <select class="js-example-basic-single custom-select mr-sm-2" name="meditation_pdf_add" style="width:85%;height:10vh;">    
                            <?php 
                            echo '<option selected disabled value="">Select PDF</option>';
                              while($rowimg = mysqli_fetch_assoc($resimg)){
                                $pdf = $rowimg['pdf_path'];
                                    echo '<option value="'.$rowimg['pdf_id'].'">'.$pdf.'</option>';                            
                              }
                             ?>
                            
                          </select>
                        </div>
                        
                      </div>
                      
                      <div class="col-lg-6">  
                          <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                            <label class="text-uppercase" style="font-size:15px;">Change Section</label>
                              <select class="js-example-basic-single custom-select mr-sm-2" name="meditation_tag_add" style="width:85%;height:10vh;">    
                                <?php 
                                  echo '<option selected disabled value="">Select Section</option>';
                                  $tag_qu = "SELECT DISTINCT meditation_tag FROM meditation;";
                                  $restag = mysqli_query($db, $tag_qu);
                                  while($rowtag = mysqli_fetch_assoc($restag)){
                                    $tagg= $rowtag['meditation_tag'];
                                        echo '<option value="'.$tagg.'">'.$tagg.'</option>';                           
                                  }
                                 ?>
                                
                              </select>
                            </div>                  
                            </div>
                        </div>
                      
                      
                      
                      <div class="d-flex justify-content-around mb-3 mt-5">
                        <button class="btn btn-primary" type="submit" style="width:100%" name='add_meditation'>
                          Add New event to meditation
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
            <span>meditationAyurvedaKarona</span>
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
  <script src="/Shreejit/assets/vendor/bootstrap/js/popper.js"></script>
  <script src="/Shreejit/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Shreejit/assets/vendor/select2/select2.min.js"></script>
  
  <script type="text/javascript">
        $(document).ready(function() {
          $('.js-example-basic-single').select2();
      });
  </script>
  <!-- Core plugin JavaScript-->
  <script src="/Shreejit/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/Shreejit/assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="/Shreejit/assets/vendor/daterangepicker/daterangepicker.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/Shreejit/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
