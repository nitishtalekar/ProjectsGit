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
  
  $_SESSION['page'] = 'services';

  $tag_qu = "SELECT * from tags WHERE tag_page='ayurveda';";
  $restag = mysqli_query($db, $tag_qu);
  $rowtag = mysqli_fetch_assoc($restag);
  $tagnames = $rowtag['tag_names'];
  $taglist = explode(';',$tagnames);

  if(isset($_POST['ayurveda_section_add'])){
    $sec = mysqli_real_escape_string($db, $_POST['ayurveda_tag_new']);
    array_push($taglist,$sec);
    $tagstr = join(";",$taglist);
    $tag_update = "UPDATE tags SET tag_names='$tagstr' WHERE tag_page='ayurveda';";
    mysqli_query($db, $tag_update);
    echo "<script>alert('Added');</script>";
  }
  if(isset($_POST['ayurveda_section_del'])){
    for($i=0;$i<count($taglist);$i++){
      if(isset($_POST['ayurveda_deltag_'.$i])){
        if (($key = array_search($_POST['ayurveda_deltag_'.$i], $taglist)) !== false) {
            unset($taglist[$key]);
        }
        $tagstr = join(";",$taglist);
        $tag_update = "UPDATE tags SET tag_names='$tagstr' WHERE tag_page='ayurveda';";
        mysqli_query($db, $tag_update);
        echo "<script>alert('Removed');</script>";
      }
    }
  }

  if(isset($_POST['add_ayurveda'])){
    $n = mysqli_real_escape_string($db, $_POST['ayurveda_name_add']);
    $si = mysqli_real_escape_string($db, $_POST['ayurveda_sintro_add']);
    $li = mysqli_real_escape_string($db, $_POST['ayurveda_lintro_add']);
    $h = mysqli_real_escape_string($db, $_POST['ayurveda_hours_add']);
    $c = mysqli_real_escape_string($db, $_POST['ayurveda_cost_add']);
    $con = mysqli_real_escape_string($db, $_POST['ayurveda_contact_add']);
    $imgs = $_POST['ayurveda_img_add'];
    $pdfs = $_POST['ayurveda_pdf_add'];
    $xtag = $_POST['ayurveda_tag_add'];
    $add_q = "INSERT INTO ayurveda(ayurveda_name, ayurveda_shortintro, ayurveda_longintro, ayurveda_hours, ayurveda_cost, ayurveda_tag, ayurveda_intro_image, ayurveda_contact, ayurveda_pdf) VALUES ('$n','$si','$li','$h','$c','$xtag','$imgs','$con','$pdfs')";
    mysqli_query($db, $add_q);
    echo "<script>alert('Added');</script>";
  }

  $servq = "SELECT count(*) FROM ayurveda;";
  $rserv = mysqli_query($db, $servq);
  $trow = mysqli_fetch_assoc($rserv);
  $cnt = $trow['count(*)'];
  // echo $cnt;
  for($i=0;$i<$cnt;$i++){

    if(isset($_POST['ayurveda_update_'.$i])){
        $id = mysqli_real_escape_string($db, $_POST['ayurveda_id_'.$i]);
        $n = mysqli_real_escape_string($db, $_POST['ayurveda_name_'.$i]);
        $si = mysqli_real_escape_string($db, $_POST['ayurveda_sintro_'.$i]);
        $li = mysqli_real_escape_string($db, $_POST['ayurveda_lintro_'.$i]);
        $h = mysqli_real_escape_string($db, $_POST['ayurveda_hours_'.$i]);
        $c = mysqli_real_escape_string($db, $_POST['ayurveda_cost_'.$i]);
        $con = mysqli_real_escape_string($db, $_POST['ayurveda_contact_'.$i]);
        $imgs = $_POST['ayurveda_img_'.$i];
        $pdfs = $_POST['ayurveda_pdf_'.$i];
        $xtag = $_POST['ayurveda_tag_'.$i];
        $update_q = "UPDATE ayurveda SET ayurveda_name='$n',ayurveda_shortintro='$si',ayurveda_longintro='$li',ayurveda_hours='$h',ayurveda_cost='$c',ayurveda_tag='$xtag',ayurveda_intro_image='$imgs',ayurveda_contact='$con',ayurveda_pdf='$pdfs' WHERE ayurveda_id = '$id'";
        mysqli_query($db, $update_q);
        echo "<script>alert('Updated');</script>";
      }
    if(isset($_POST['ayurveda_delete_'.$i])){
        $id = mysqli_real_escape_string($db, $_POST['ayurveda_id_'.$i]);
        $delete_q = "DELETE FROM ayurveda WHERE ayurveda_id = '$id';";
        mysqli_query($db, $delete_q);
        echo "<script>alert('Deleted');</script>";
      }
  }

  if(isset($_POST['ayurveda_bg'])){
      $ayurvedabg = mysqli_real_escape_string($db, $_POST['ayurvedabg']);
      $update_bg = "UPDATE background SET bg_img='$ayurvedabg' WHERE bg_page = 'ayurveda';";
      mysqli_query($db, $update_bg);
      echo "<script>alert('Updated');</script>";
    }

    if(isset($_POST['ayurveda_description'])){
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $update_desc = "UPDATE background SET bg_description='$description' WHERE bg_page = 'ayurveda';";
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
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">ayurveda Background</h5>
          </div>

          <?php
            $bg_q = "SELECT * FROM background WHERE bg_page = 'ayurveda'";
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
              <form action="ayurveda.php" method="post">
            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#collapseBg" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Background Image</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseBg">
                <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                  <?php
                  echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="ayurvedabg" value="'.$bg['bg_img'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:200px"></label>';
                  while($rowimg = mysqli_fetch_assoc($resimg)){
                    $img = $rowimg['image_path'];
                    if( $bg['bg_img'] != $rowimg['image_id']){
                        echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="ayurvedabg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:200px"></label>';
                    }

                  }
                   ?>
                </div>
              </div>
            </div>
            </div>
            <div class="col-lg-1">
            <button class="btn btn-primary mb-3" type="submit" name = 'ayurveda_bg'>
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
                <form action="ayurveda.php" method="post">
                  <div class="d-flex justify-content-around">
                      <textarea name="description" class="form-control bg-light border-0 small" style="width:80%;height:8vh"> <?=$bg['bg_description']?> </textarea>
                      <button class="btn btn-primary" type="submit" name="ayurveda_description">
                        Update
                      </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">Add/Delete Section In ayurveda</h5>
          </div>

          <div class="row">
              <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">SECTIONS in ayurveda</h6>
                  </div>
                  <div class="card-body">
                    <div class="d-flex mb-3" style="align-items:center;">
                      <?php
                      for($i=0;$i<count($taglist);$i++){
                        echo '<label class="text-uppercase" style="font-size:15px;">'.$taglist[$i].'&nbsp&nbsp&nbsp</label>';
                      }
                       ?>
                      </div>
                    <form action="ayurveda.php" method="post">
                      <div class="d-flex justify-content-around">
                          <input type="text" name="ayurveda_tag_new" class="form-control bg-light border-0 small" style="width:80%;" placeholder="Enter Section Name">
                          <button class="btn btn-primary" type="submit" name = 'ayurveda_section_add'>
                            Add New Section
                          </button>
                      </div>
                    </form>
                    <form action="ayurveda.php" method="post">
                      <div class="d-flex justify-content-center">
                          <?php
                          for($i=0;$i<count($taglist);$i++){
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="checkbox" name="ayurveda_deltag_'.$i.'" value="'.$taglist[$i].'">&nbsp&nbsp'.$taglist[$i].'</label>';
                          }
                           ?>

                      </div>
                      <center><button class="btn btn-primary" type="submit" name = 'ayurveda_section_del'>
                        Remove
                      </button></center>
                    </form>
                  </div>
                </div>
              </div>
            </div>


          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">ayurveda</h5>
          </div>

          <!-- Page Heading -->
          <div class="row">

              <?php
                $q_ser = "SELECT * FROM ayurveda;";
                $res_ser = mysqli_query($db, $q_ser);
                $x = 0;
                while($row_ser = mysqli_fetch_assoc($res_ser)){
               ?>

            <!-- Home Heading -->

                <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <a href="#collapse<?=$row_ser['ayurveda_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase"><?=$row_ser['ayurveda_name']?></h6>
                  </a>
                  <div class="collapse" id="collapse<?=$row_ser['ayurveda_id']?>">
                    <div class="card-body">
                      <form action="ayurveda.php" method="post">

                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">ayurveda NAME</label>
                            <input type="text" name="ayurveda_name_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;" value="<?=$row_ser['ayurveda_name']?>">
                            <input type="text" name="ayurveda_id_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;display:none" value="<?=$row_ser['ayurveda_id']?>">
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Short Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="ayurveda_sintro_<?=$x?>"style="width:85%;height:15vh" ><?=$row_ser['ayurveda_shortintro']?></textarea>
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Long Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="ayurveda_lintro_<?=$x?>"style="width:85%;height:15vh" ><?=$row_ser['ayurveda_longintro']?></textarea>
                        </div>
                        <?php
                          $ch_id = $row_ser['ayurveda_intro_image'];
                          $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                          $cresimg = mysqli_query($db, $cimg_qu);
                          $checkrow = mysqli_fetch_assoc($cresimg);
                          $checked_img = $checkrow['image_path'];
                          $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                          $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="card mb-4">
                          <a href="#collapseintroimg<?=$row_ser['ayurveda_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Image</h6>
                          </a>
                          <div class="collapse" id="collapseintroimg<?=$row_ser['ayurveda_id']?>">
                            <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                              <?php
                              echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" checked="checked" name="ayurveda_img_'.$x.'" value="'.$row_ser['ayurveda_intro_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:100px"></label>';
                              while($rowimg = mysqli_fetch_assoc($resimg)){
                                $img = $rowimg['image_path'];
                                if($ch_id != $rowimg['image_id']){
                                    echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" name="ayurveda_img_'.$x.'" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                                }
                              }
                               ?>
                            </div>
                          </div>
                        </div>

                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase mr-2" style="font-size:15px;">Hours</label>
                            <input type="number" name="ayurveda_hours_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$row_ser['ayurveda_hours']?>">
                            <label class="text-uppercase mr-2" style="font-size:15px;">Cost</label>
                              <input type="number" name="ayurveda_cost_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$row_ser['ayurveda_cost']?>">
                        </div>
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">ayurveda Contact Info</label>
                            <input type="text" name="ayurveda_contact_<?=$x?>" class="form-control bg-light border-0 small" style="width:85%;" value="<?=$row_ser['ayurveda_contact']?>">
                        </div>


                      <div class="row">
                        <?php
                          $ch_id = $row_ser['ayurveda_pdf'];
                          $cimg_qu = "SELECT * FROM pdf WHERE pdf_id = '$ch_id'";
                          $cresimg = mysqli_query($db, $cimg_qu);
                          $checkrow = mysqli_fetch_assoc($cresimg);
                          $xpdfx = $checkrow['pdf_path'];
                          $tar = explode("/",$xpdfx);
                          $checked_pdf = array_slice($tar, -1)[0];
                          $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                          $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="col-lg-6">
                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">Change ayurveda document</label>
                          <select class="js-example-basic-single custom-select mr-sm-2" name="ayurveda_pdf_<?=$x?>" style="width:85%;height:10vh;">
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

                      </div>

                      <div class="col-lg-6">
                          <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                            <label class="text-uppercase" style="font-size:15px;">Change Section</label>
                              <select class="js-example-basic-single custom-select mr-sm-2" name="ayurveda_tag_<?=$x?>" style="width:85%;height:10vh;">
                                <?php
                                  $ch_id = $row_ser['ayurveda_tag'];
                                  echo '<option selected value="'.$ch_id.'">'.$ch_id.'</option>';
                                  $tag_qu = "SELECT * from tags WHERE tag_page='ayurveda';";
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
                          <button class="btn btn-primary" type="submit" style="width:100%" name='ayurveda_update_<?=$x?>'>
                            Update
                          </button>
                        </div>
                        <div class="d-flex justify-content-around mb-3 mt-2">
                          <button class="btn btn-danger" type="submit" style="width:100%" name='ayurveda_delete_<?=$x?>'>
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
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">Add to ayurveda</h5>
          </div>

          <div class="row">

            <!-- Home Heading -->

                <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <a href="#collapseAddayurveda" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Add to ayurveda</h6>
                  </a>
                  <div class="collapse" id="collapseAddayurveda">
                    <div class="card-body">
                      <form action="ayurveda.php" method="post">

                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">ayurveda NAME</label>
                            <input type="text" name="ayurveda_name_add" class="form-control bg-light border-0 small" style="width:85%;" placeholder="Enter Name" required>
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Short Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="ayurveda_sintro_add"style="width:85%;height:15vh" >Short Introduction</textarea>
                        </div>

                        <div class="d-flex justify-content-around mb-3">
                          <label class="text-uppercase" style="font-size:15px;">Long Intro</label>
                            <textarea class="form-control bg-light border-0 small" name="ayurveda_lintro_add"style="width:85%;height:15vh" >Long Introduction</textarea>
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
                                    echo '&nbsp&nbsp<label class="text-uppercase">&nbsp&nbsp<input class="options" type="radio" name="ayurveda_img_add" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                              }
                               ?>
                            </div>
                          </div>
                        </div>

                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase mr-2" style="font-size:15px;">Hours</label>
                            <input type="number" name="ayurveda_hours_add"class="form-control bg-light border-0 small" style="width:45%;" placeholder="Enter Value">
                            <label class="text-uppercase mr-2" style="font-size:15px;">Cost</label>
                              <input type="number" name="ayurveda_cost_add"class="form-control bg-light border-0 small" style="width:45%;" placeholder="Enter Value">
                        </div>
                        <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                          <label class="text-uppercase" style="font-size:15px;">ayurveda Contact Info</label>
                            <input type="text" name="ayurveda_contact_add" class="form-control bg-light border-0 small" style="width:85%;" placeholder="Enter Value">
                        </div>

                      <div class="row">
                        <?php
                          $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
                          $resimg = mysqli_query($db, $qimg);
                         ?>
                        <div class="col-lg-6">
                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label class="text-uppercase" style="font-size:15px;">Change ayurveda document</label>
                          <select class="js-example-basic-single custom-select mr-sm-2" name="ayurveda_pdf_add" style="width:85%;height:10vh;">
                            <?php
                            echo '<option selected disabled value="">Select PDF</option>';
                              while($rowimg = mysqli_fetch_assoc($resimg)){
                                $pdfx = $rowimg['pdf_path'];
                                $tar = explode("/",$pdfx);
                                $pdf = array_slice($tar, -1)[0];
                                    echo '<option value="'.$rowimg['pdf_id'].'">'.$pdf.'</option>';
                              }
                             ?>

                          </select>
                        </div>

                      </div>

                      <div class="col-lg-6">
                          <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                            <label class="text-uppercase" style="font-size:15px;">Change Section</label>
                              <select class="js-example-basic-single custom-select mr-sm-2" name="ayurveda_tag_add" style="width:85%;height:10vh;">
                                <?php
                                  echo '<option selected disabled value="">Select Section</option>';
                                  $tag_qu = "SELECT DISTINCT ayurveda_tag FROM ayurveda;";
                                  $restag = mysqli_query($db, $tag_qu);
                                  while($rowtag = mysqli_fetch_assoc($restag)){
                                    $tagg= $rowtag['ayurveda_tag'];
                                        echo '<option value="'.$tagg.'">'.$tagg.'</option>';
                                  }
                                 ?>

                              </select>
                            </div>
                            </div>
                        </div>



                      <div class="d-flex justify-content-around mb-3 mt-5">
                        <button class="btn btn-primary" type="submit" style="width:100%" name='add_ayurveda'>
                          Add New event to ayurveda
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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/bootstrap/js/popper.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/vendor/select2/select2.min.js"></script>

  <script type="text/javascript">
        $(document).ready(function() {
          $('.js-example-basic-single').select2();
      });
  </script>
  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
