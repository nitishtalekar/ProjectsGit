<?php 
require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
if(empty($_SESSION['admin'])){
  header('location:index.php');
}
$_SESSION['page'] = 'team';
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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

  <!-- Custom styles for this template-->
  <link href="/Shreejit/assets/css/sb-admin-2.min.css" rel="stylesheet">
  
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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">The Team</h5>
          </div>
          
          <div class="row">
          
          <?php       
            $qteam = "SELECT * FROM team;";
            $resteam = mysqli_query($db, $qteam);
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
                          <input type="text" class="form-control bg-light border-0 small" style="width:80%;" value="<?=$rowteam['team_name']?>">
                      </div>
                      <div class="d-flex justify-content-around mb-3">
                        <label style="font-size:15px;">POST</label>
                          <input type="text" class="form-control bg-light border-0 small" style="width:80%;" value="<?=$rowteam['team_post']?>">
                      </div>
                      <label style="font-size:15px;">EXPERIANCE</label>
                      <div class="d-flex justify-content-around mb-3">
                          <textarea class="form-control bg-light border-0 small" style="width:90%;height:15vh" ><?=$rowteam['team_description']?></textarea>
                      </div>
                      <label style="font-size:15px;">SOCIAL MEDIA</label>
                      <div class="d-flex justify-content-around mb-3 mt-3">
                        <i class="fa fa-twitter" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_twitter']?>">
                        <i class="fa fa-facebook" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_facebook']?>">
                      </div>
                      <div class="d-flex justify-content-around mb-3 mt-3">
                        <i class="fa fa-instagram" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_instagram']?>">
                        <i class="fa fa-linkedin" aria-hidden="true" style="font-size:20px"></i>
                          <input type="text" class="form-control bg-light border-0 small" style="width:45%;" value="<?=$rowteam['team_linkedin']?>">
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
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="homebg" value="'.$rowteam['team_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:100px"></label>';
                            while($rowimg = mysqli_fetch_assoc($resimg)){
                              $img = $rowimg['image_path'];
                              if($rowteam['team_image'] != $rowimg['image_id']){
                                  echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="homebg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                              }
                              
                            }
                             ?>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-around mb-3 mt-5">
                        <button class="btn btn-primary" type="submit" style="width:100%" name='update_<?=$rowteam['team_id']?>'>
                          Update
                        </button>
                      </div>
                      <div class="d-flex justify-content-around mb-3 mt-2">
                        <button class="btn btn-danger" type="submit" style="width:100%" name='delete_<?=$rowteam['team_id']?>'>
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
                        <input type="text" class="form-control bg-light border-0 small" style="width:80%;" placeholder="Enter Name">
                    </div>
                    <div class="d-flex justify-content-around mb-3">
                      <label style="font-size:15px;">POST</label>
                        <input type="text" class="form-control bg-light border-0 small" style="width:80%;" placeholder="Enter Post">
                    </div>
                    <label style="font-size:15px;">EXPERIANCE</label>
                    <div class="d-flex justify-content-around mb-3">
                        <textarea class="form-control bg-light border-0 small" style="width:90%;height:15vh" >Experiance</textarea>
                    </div>
                    <label style="font-size:15px;">SOCIAL MEDIA</label>
                    <div class="d-flex justify-content-around mb-3">
                        <i class="fa fa-twitter" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Twitter">
                        <i class="fa fa-facebook" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Facebook">
                    </div>
                    <div class="d-flex justify-content-around mb-3">
                      <i class="fa fa-instagram" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Instagram">
                        <i class="fa fa-linkedin" aria-hidden="true" style="font-size:20px"></i>
                        <input type="text" class="form-control bg-light border-0 small" style="width:45%;" placeholder="Linkedin">
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
                          echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" checked="checked" name="homebg" value="'.$rowteam['team_image'].'" required>&nbsp&nbsp<img src="'.$checked_img.'" alt="" style="width:100px"></label>';
                          while($rowimg = mysqli_fetch_assoc($resimg)){
                            $img = $rowimg['image_path'];
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="radio" name="homebg" value="'.$rowimg['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:100px"></label>';
                            
                          }
                           ?>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-around mb-3 mt-5">
                      <button class="btn btn-primary" type="submit" style="width:100%" name='update_<?=$rowteam['team_id']?>'>
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






