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

  
  $_SESSION['page'] = 'pdf';
  $messages = array();

  $target_dir = "../../assets/pdf/";
if(isset($_POST["add_pdf"])) {

  $countfiles = count($_FILES['fileToUpload']['name']);

  for($i=0;$i<$countfiles;$i++){

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
      // if($check !== false) {
      //     $message = '<label class="text-uppercase" style="color:green" >'.'File is an PDF'.'</label><br>' ;
      //     array_push($messages,$message);
      //     $uploadOk = 1;
      // } else {
      //     $message =  '<label class="text-uppercase" style="color:red" >'.'File is not a PDF.'.'</label><br>';
      //     array_push($messages,$message);
      //     $uploadOk = 0;
      // }
      // Check if file already exists
      if (file_exists($target_file)) {
          $message =  '<label class="text-uppercase" style="color:#d1b741" >'.' file already exists. Please Rename your file'.'</label><br>';
          array_push($messages,$message);
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"][$i] > 500000) {
          $message =  '<label class="text-uppercase" style="color:red" >'.' your file is too large.'.'</label><br>';
          array_push($messages,$message);
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "pdf") {
          $message =  '<label class="text-uppercase" style="color:red" >'.' only PDF files are allowed.'.'</label><br>';
          array_push($messages,$message);
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          $message =  '<label class="text-uppercase" style="color:red" >'.' your file was not uploaded.'.'</label><br>';
          array_push($messages,$message);
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
              $message =  '<label class="text-uppercase" style="color:green" >'.'The file "'. basename( $_FILES["fileToUpload"]["name"][$i]). '" has been uploaded.'.'</label><br>';
              array_push($messages,$message);
              $tar = explode("/",$target_file);
              $x = array_slice($tar, -3);
              $x2 = join("/",$x);
              // $new_target = $_SERVER['DOCUMENT_ROOT']."/".$x2;
              $new_target = "/".$x2;
              $qu = "INSERT INTO pdf (pdf_path) VALUES ('$new_target')";
              mysqli_query($db, $qu);
          } else {
              $message =  '<label class="text-uppercase" style="color:red" >'.' there was an error uploading your file.'.'</label><br>';
              array_push($messages,$message);
          }
      }
    }
}
if(isset($_POST['del_pdf'])){
  $mediaq = "SELECT count(*) FROM pdf;";
  $rmedia = mysqli_query($db, $mediaq);
  $trow = mysqli_fetch_assoc($rmedia);
  $cnt = $trow['count(*)'];
  for($i=0;$i<$cnt;$i++){
    if(isset($_POST['del_media_'.$i])){
      $l = explode('<-->',$_POST['del_media_'.$i]);
      $delete_media = "DELETE FROM pdf WHERE pdf_id = '$l[0]';";
      mysqli_query($db, $delete_media);
      $delpath = $_SERVER['DOCUMENT_ROOT'].$l[1];
      unlink($delpath);
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
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

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
            <h5 class="h5 mb-0 text-gray-800">Documents</h5>
          </div>
          <div class="row">

              <div class="col-lg-12">
                <div class="card shadow mb-5">
                  <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-primary text-uppercase">Upload PDfs</h6>
                  </div>
                  <div class="card-body pb-1">
                    <form action="pdfs.php" method="post" enctype="multipart/form-data">
                      <div class="input-group mb-3">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload" multiple>
                          <label class="custom-file-label">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <button class="btn btn-primary" name="add_pdf" type="submit">Upload</button>
                        </div>
                      </div>
                      <?php
                      for($i=0;$i<count($messages);$i++){
                        echo $messages[$i];
                      }
                       ?>
                    </form>
                  </div>
                </div>
              </div>

          </div>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="h5 mb-0 text-gray-800">Uploaded Documents</h5>
          </div>

          <?php
            $qimg = "SELECT * FROM pdf ORDER BY pdf_id DESC";
            $resimg = mysqli_query($db, $qimg);
           ?>

          <div class="row">
              <div class="col-lg-12">
                <form action="pdfs.php" method="post">
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseLogo" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase text-uppercase">Delete Document</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseLogo">
                  <div class="img-card-body mt-3" style="height:40vh; overflow-x: hidden; overflow-y:auto;">
                    <?php
                    $x = 0;
                    while($rowimg = mysqli_fetch_assoc($resimg)){
                      $img = $rowimg['pdf_path'];
                      $tar = explode("/",$img);
                      $ximg = array_slice($tar, -1)[0];
                      echo '&nbsp&nbsp<label class="mt-3" style="font-size:20px">&nbsp&nbsp<input class="options" type="checkbox" name="del_media_'.$x.'" value="'.$rowimg['pdf_id'].'<-->'.$img.'">&nbsp&nbsp'.$ximg.'</label>';
                    $x++;
                  }
                     ?>
                  </div>
                </div>
              </div>
              </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary mb-3" type="submit" name = 'del_pdf' style="width:100%">
                      Delete PDFs
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
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/assets/js/sb-admin-2.min.js"></script>

  <script>
        $('input[type="file"]').change(function(e){
          var fileName = e.target.files[0].name;
          $('.custom-file-label').html(fileName);
      });
  </script>

</body>

</html>
