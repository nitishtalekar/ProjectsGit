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


$_SESSION['page'] = 'team';

if(isset($_POST['add_team'])){
  $n = mysqli_real_escape_string($db, $_POST['t_name']);
  $p = mysqli_real_escape_string($db, $_POST['t_post']);
  $exp = mysqli_real_escape_string($db, $_POST['t_exp']);
  $tw = mysqli_real_escape_string($db, $_POST['t_tw']);
  $fb = mysqli_real_escape_string($db, $_POST['t_fb']);
  $in = mysqli_real_escape_string($db, $_POST['t_in']);
  $li = mysqli_real_escape_string($db, $_POST['t_li']);
  $prof = $_POST['add_profile'];
  $add_q = "INSERT INTO team(team_name, team_post, team_description, team_twitter, team_facebook, team_instagram, team_linkedin, team_image) VALUES ('$n','$p','$exp','$tw','$fb','$in','$li','$prof');";
  mysqli_query($db, $add_q);
  echo "<script>alert('Added');</script>"; 
}

$teamq = "SELECT count(*) FROM team;";
$rteam = mysqli_query($db, $teamq);
$trow = mysqli_fetch_assoc($rteam);
$cnt = $trow['count(*)'];
// echo $cnt;
for($i=0;$i<$cnt;$i++){
  
  if(isset($_POST['update_'.$i])){
      $id = mysqli_real_escape_string($db, $_POST['tid_'.$i]);
      $n = mysqli_real_escape_string($db, $_POST['tname_'.$i]);
      $p = mysqli_real_escape_string($db, $_POST['tpost_'.$i]);
      $exp = mysqli_real_escape_string($db, $_POST['texp_'.$i]);
      $tw = mysqli_real_escape_string($db, $_POST['ttw_'.$i]);
      $fb = mysqli_real_escape_string($db, $_POST['tfb_'.$i]);
      $in = mysqli_real_escape_string($db, $_POST['tin_'.$i]);
      $li = mysqli_real_escape_string($db, $_POST['tli_'.$i]);
      $prof = $_POST['profile_'.$i];
      
      $update_q = "UPDATE team SET team_name='$n',team_post='$p',team_description='$exp',team_twitter='$tw',team_facebook='$fb',team_instagram='$in',team_linkedin='$li',team_image='$prof' WHERE team_id = '$id';";
      mysqli_query($db, $update_q);
      echo "<script>alert('Updated');</script>"; 
    }
  if(isset($_POST['delete_'.$i])){
    $id = mysqli_real_escape_string($db, $_POST['tid_'.$i]);
    $delete_q = "DELETE FROM team WHERE team_id = '$id';";
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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <style media="screen">
  .icons{
    font-family: 'Open Sans', sans-serif !important;
    font-size: 0.85rem;
    margin-right: 0.25rem;
  }

  </style>

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
            <h5 class="h5 mb-0 text-gray-800">The Team</h5>
          </div>
          
          <div class="row">
          
          <?php       
            $qteam = "SELECT * FROM team;";
            $resteam = mysqli_query($db, $qteam);
            $x = 0;
            while($rowteam = mysqli_fetch_assoc($resteam)){
           ?>

          <!-- Home Heading -->
          
              <div class="col-lg-6">
              <div class="card shadow mb-4">
                <a href="#collapse<?=$rowteam['team_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase"><?=$rowteam['team_name']?></h6>
                </a>
                <div class="collapse" id="collapse<?=$rowteam['team_id']?>">
                  <div class="card-body">
                    <form action="team.php" method="post">
                      
                      <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                        <label style="font-size:15px;">NAME</label>
                          <input type="text" name="tname_<?=$x?>" class="form-control bg-light border-0 small" style="width:80%;" value="<?=$rowteam['team_name']?>" required>
                          <input type="text" name="tid_<?=$x?>" class="form-control bg-light border-0 small" style="width:80%;display:none;" value="<?=$rowteam['team_id']?>" required>
                      </div>
                      <div class="d-flex justify-content-around mb-3">
                        <label style="font-size:15px;">POST</label>
                          <input type="text" name="tpost_<?=$x?>" class="form-control bg-light border-0 small" style="width:80%;" value="<?=$rowteam['team_post']?>" required>
                      </div>
                      <label style="font-size:15px;">EXPERIANCE</label>
                      <div class="d-flex justify-content-around mb-3">
                          <textarea class="form-control bg-light border-0 small" name="texp_<?=$x?>" style="width:90%;height:15vh" ><?=$rowteam['team_description']?></textarea>
                      </div>
                      <label style="font-size:15px;">SOCIAL MEDIA</label>
                      <div class="d-flex justify-content-around mb-3 mt-3">
                        <i class="fa fa-twitter" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" name="ttw_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_twitter']?>">
                        <i class="fa fa-facebook" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" name="tfb_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_facebook']?>">
                      </div>
                      <div class="d-flex justify-content-around mb-3 mt-3">
                        <i class="fa fa-instagram" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" name="tin_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_instagram']?>">
                        <i class="fa fa-linkedin" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" name="tli_<?=$x?>" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_linkedin']?>">
                      </div>
                      <?php    
                        $ch_id = $rowteam['team_image'];
                        $cimg_qu = "SELECT * FROM images WHERE image_id = '$ch_id'";
                        $cresimg = mysqli_query($db, $cimg_qu);
                        $checkrow = mysqli_fetch_assoc($cresimg);
                        $checked_img = $checkrow['image_path'];   
                        $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                        $resimg = mysqli_query($db, $qimg);
                       ?>
                      <div class="card mb-4">
                        <a href="#collapseprofile<?=$rowteam['team_id']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                          <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Profile Picture</h6>
                        </a>
                        <div class="collapse" id="collapseprofile<?=$rowteam['team_id']?>">
                          <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                            <?php 
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="profile_'.$x.'" value="'.$rowteam['team_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:100px"></label>';
                            while($rowimg = mysqli_fetch_assoc($resimg)){
                              $img = $rowimg['image_path'];
                              if($rowteam['team_image'] != $rowimg['image_id']){
                                  echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="profile_'.$x.'" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                              }
                              
                            }
                             ?>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-around mb-3 mt-5">
                        <button class="btn btn-primary" type="submit" style="width:100%" name='update_<?=$x?>'>
                          Update
                        </button>
                      </div>
                      <div class="d-flex justify-content-around mb-3 mt-2">
                        <button class="btn btn-danger" type="submit" style="width:100%" name='delete_<?=$x?>'>
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
            <h5 class="h5 mb-0 text-gray-800">Add Team Member</h5>
          </div>
          
          <div class="row">
            <div class="col-lg-12">
            <div class="card shadow mb-4">
              <a href="#collapseAddTeam" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Add a Team Member</h6>
              </a>
              <div class="collapse" id="collapseAddTeam">
                <div class="card-body">
                  <form action="team.php" method="post">
                    
                    <div class="d-flex justify-content-around mb-3" style="align-items:center;">
                      <label style="font-size:15px;">NAME</label>
                        <input type="text" name="t_name" class="form-control bg-light border-0 small" style="width:80%;" placeholder="Enter Name" required>
                    </div>
                    <div class="d-flex justify-content-around mb-3">
                      <label style="font-size:15px;">POST</label>
                        <input type="text" name="t_post" class="form-control bg-light border-0 small" style="width:80%;" placeholder="Enter Post" required>
                    </div>
                    <label style="font-size:15px;">EXPERIANCE</label>
                    <div class="d-flex justify-content-around mb-3">
                        <textarea class="form-control bg-light border-0 small" name= "t_exp" style="width:90%;height:15vh" >Experiance</textarea>
                    </div>
                    <label style="font-size:15px;">SOCIAL MEDIA</label>
                    <div class="d-flex justify-content-around mb-3">
                        <i class="fa fa-twitter" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" name="t_tw" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Twitter">
                        <i class="fa fa-facebook" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" name="t_fb" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Facebook">
                    </div>
                    <div class="d-flex justify-content-around mb-3">
                      <i class="fa fa-instagram" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" name="t_in" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Instagram">
                        <i class="fa fa-linkedin" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" name="t_li" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Linkedin">
                    </div>
                    <?php 
                    $qimg = "SELECT * FROM images ORDER BY image_id DESC";
                    $resimg = mysqli_query($db, $qimg);
                     ?>
                    
                    <div class="card mb-4">
                      <a href="#collapseprofileadd" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Select Profile Picture</h6>
                      </a>
                      <div class="collapse" id="collapseprofileadd">
                        <div class="img-card-body" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                          <?php 
                          while($rowimg = mysqli_fetch_assoc($resimg)){
                            $img = $rowimg['image_path'];
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="add_profile" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                            
                          }
                           ?>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-around mb-3 mt-5">
                      <button class="btn btn-primary" type="submit" style="width:100%" name='add_team'>
                        Add Member
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

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>






