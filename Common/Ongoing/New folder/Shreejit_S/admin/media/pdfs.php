<?php 
require($_SERVER['DOCUMENT_ROOT']."/Shreejit/dbconnect.php");
if(empty($_SESSION['admin'])){
  header('location:index.php');
}
$_SESSION['page'] = 'pdf';
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
  
  <style media="screen">
  .btn-file {
        position: relative;
        overflow: hidden;
        }
        .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;   
        cursor: inherit;
        display: block;
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
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Documents</h5>
          </div>
          <div class="row">
            
              <div class="col-lg-12">
                <div class="card shadow mb-5">
                  <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">Upload PDfs</h6>
                  </div>
                  <div class="card-body pb-1">
                    <form action="images.php" method="post">
                      <div class="input-group mb-3">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="files">
                          <label class="custom-file-label" id="label">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="btn btn-primary" id="">Upload</span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            
          </div>
            
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Uploaded PDFs</h5>
          </div>
          
          <?php     
            $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
            $resimg = mysqli_query($db, $qimg);
           ?>
           
          <div class="row">
              <div class="col-lg-12">
                <form action="images.php" method="post">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseLogo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Delete Media</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseLogo">
                  <div class="img-card-body mt-5" style="height:25vh; overflow-x: hidden; overflow-y:auto;">
                    <?php 
                    while($rowimg = mysqli_fetch_assoc($resimg)){
                      $img = $rowimg['pdf_path'];
                          echo '&nbsp&nbsp<label>&nbsp&nbsp<input class="options" type="checkbox" name="media" value="'.$rowimg['pdf_id'].'" required>&nbsp&nbsp'.$img.'&nbsp&nbsp</label>';                    
                    }
                     ?>
                  </div>
                </div>
              </div>
              </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary mb-3" type="submit" name = 'home_bg' style="width:100%">
                      Delete Media
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
  
  <script>
        $('input[type="file"]').change(function(e){
          var fileName = e.target.files[0].name;
          $('.custom-file-label').html(fileName);
      });
  </script>

</body>

</html>
