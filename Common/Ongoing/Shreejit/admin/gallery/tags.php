<?php 
require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
if(empty($_SESSION['admin'])){
  header('location:index.php');
}
$_SESSION['page'] = 'gallery';
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
            <h5 class="h5 mb-0 text-gray-800 text-capitalize">Add/Delete Tags</h5>
          </div>
          
          <div class="row">
              <div class="col-lg-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">GAllery Tags</h6>
                  </div>
                  <div class="card-body">
                    <div class="d-flex mb-3" style="align-items:center;">
                      <?php 
                      $tag_qu = "SELECT * from tags WHERE tag_page='gallery';";
                      $restag = mysqli_query($db, $tag_qu);
                      $rowtag = mysqli_fetch_assoc($restag);
                      $tagnames = $rowtag['tag_names'];
                      $taglist = explode(';',$tagnames);
                      for($i=0;$i<count($taglist);$i++){
                        echo '<label class="text-uppercase" style="font-size:15px;">'.$taglist[$i].'&nbsp&nbsp&nbsp</label>';
                      }
                       ?>
                      </div>
                    <form action="home.php" method="post">
                      <div class="d-flex justify-content-around">
                          <input type="text" name="title" class="form-control bg-light border-0 small" style="width:80%;" placeholder="Enter Tag Name">
                          <button class="btn btn-primary" type="submit" name = 'section'>
                            Add New Tag
                          </button>
                      </div>
                    </form>
                    <form action="home.php" method="post">
                      <div class="d-flex justify-content-center">
                          <?php 
                          for($i=0;$i<count($taglist);$i++){
                            echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="checkbox" name="media" value="'.$taglist[$i].'">&nbsp&nbsp'.$taglist[$i].'</label>'; 
                          }
                           ?>                          
                      </div>
                      <center><button class="btn btn-primary" type="submit" name = 'section'>
                        Remove
                      </button></center>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Tags</h5>
          </div>

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->
          <div class="row">
            
              <?php 
              $tagq = "SELECT DISTINCT gallery_tag FROM gallery;";
              $tagres = mysqli_query($db, $tagq);
              while($tagrow = mysqli_fetch_assoc($tagres)){
                $tag = $tagrow['gallery_tag'];
                if($tag != 'None'){
               ?>
                    <div class="col-lg-6">
                      <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapse2<?=$tag?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                          <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Images in <?=$tag?></h6>
                        </a>
                        <?php 
                        $tagq2 = "SELECT * FROM gallery WHERE gallery_tag = '$tag';";
                        $tagres2 = mysqli_query($db, $tagq2);
                        ?>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapse2<?=$tag?>">
                          <div class="img-card-body pt-2" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                            <?php 
                            while($rowimg = mysqli_fetch_assoc($tagres2)){
                              $img_id = $rowimg['gallery_image'];
                              $imgq = "SELECT * FROM images WHERE image_id='$img_id';";
                              $imgres = mysqli_query($db, $imgq);
                              $imgrow = mysqli_fetch_assoc($imgres);
                              $img = $imgrow['image_path'];
                              echo '<label>&nbsp&nbsp&nbsp&nbsp<img src="'.$img.'" alt="" style="width:150px"></label>';
                            }
                             ?>
                          </div>
                        </div>
                      </div>
                    </div>
              <?php  }} ?>
            
          </div>
        
  
            <?php 
              $qimg = "SELECT * FROM gallery WHERE gallery_tag = 'None' ORDER BY gallery_id DESC";
              $resimg = mysqli_query($db, $qimg);
             ?>
             
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h5 class="h5 mb-0 text-gray-800">Add Media</h5>
             </div>
             
        <div class="row"> 
             <div class="col-lg-12">
               <form action="tags.php" method="post">
                   <div class="card shadow mb-4">
                     <!-- Card Header - Accordion -->
                     <a href="#collapseadd" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                       <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Add Tags</h6>
                     </a>
                     <!-- Card Content - Collapse -->
                     <div class="collapse" id="collapseadd">
                       <div class="img-card-body" style="overflow-x: hidden; overflow-y:auto;">
                 <div class="row justify-content-around">
                   <div class="col-lg-12">
                                 <div class="card mb-4 mx-2 mt-1">
                                     <div class="img-card-body" style="height:40vh; overflow-x: hidden; overflow-y:auto;">
                                 <?php 
                                 while($rowimg = mysqli_fetch_assoc($resimg)){
                                   $im = $rowimg['gallery_image'];
                                   $imgq = "SELECT * FROM images WHERE image_id = '$im';";
                                   $imgres = mysqli_query($db, $imgq);
                                   $imgrow = mysqli_fetch_assoc($imgres);
                                   $img = $imgrow['image_path'];
                                   echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="checkbox" name="media" value="'.$imgrow['image_id'].'" required>&nbsp&nbsp<img src="'.$img.'" alt="" style="width:150px"></label>';                    
                                 }
                                  ?>
                               <!-- </div> -->
                              </div>
                            </div>
                            
                          </div>
                          <?php 
                          $tagq = "SELECT DISTINCT gallery_tag FROM gallery;";
                          $tagres = mysqli_query($db, $tagq);
                          while($tagrow = mysqli_fetch_assoc($tagres)){
                            $tag = $tagrow['gallery_tag'];
                            if($tag != 'None'){
                           ?>
                            <div class="col-lg-3 mx-2 mb-3">
                              <button class="btn btn-primary text-uppercase" type="submit" name="tag" style="width:100%">
                                Add to <?=$tag?>
                              </button>
                            </div>
                          <?php }} ?>
                          
                        </div>                                            
                 </div>
                 </form>
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
