<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/dbconnect.php");


if(isset($_POST['complete_fb'])){

  $cnt = count($_SESSION['queries']);
  
  $mode = "SELECT * FROM mode";
  $resultmode = mysqli_query($db, $mode);
  $moderow = mysqli_fetch_assoc($resultmode);
  if($moderow['current_mode'] == 1){

  $mail_sh = $_SESSION['this_mail'];
  $s = "SELECT * FROM mail_addr where mail_hash='$mail_sh';";
  $row = mysqli_query($db, $s);

  $mail_sh = $_SESSION['this_mail'];
  // mysqli_query($db, $q1);
  $del_mail = "DELETE FROM mail_addr WHERE mail_hash='$mail_sh';";
  mysqli_query($db, $del_mail);

  if (mysqli_num_rows($row) == 1){

  for ($i=0; $i < $cnt ; $i++) {
        $q = $_SESSION['queries'][$i];
        mysqli_query($db, $q);
    }
    // echo $q;
  }
  else{
      header('location: done.php');
  }
  
}
else{
  
  for ($i=0; $i < $cnt ; $i++) {
        $q = $_SESSION['queries'][$i];
        mysqli_query($db, $q);
    }
}
  header('location: done.php');
}
?>

<html lang="en">
<head>
	<title>Feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/vendor/noui/nouislider.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/forms/css/util.css">
		<link rel="stylesheet" type="text/css" href="style/forms/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
  <div class="container-fluid" style="background:#e6e6e6;">
    <div class="row pt-3">
      <div class="col-12">
        <center>
        <img src="header.png" style="max-width:90vw">
      </center>
      </div>
    </div>
  </div>

  <div class="container-contact100" style="min-height:calc(100vh - 265px)">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="complete.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">FEEDBACK COMPLETE</label></center>
				</div>


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="complete_fb">
						<span>
							End
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/include/footer.php")?>



	<!--===============================================================================================-->
		<script src="style/forms/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="style/forms/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="style/forms/vendor/bootstrap/js/popper.js"></script>
		<script src="style/forms/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="style/forms/vendor/select2/select2.min.js"></script>
		<script>
			$(".js-select2").each(function(){
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next('.dropDownSelect2')
				});
			})
		</script>
	<!--===============================================================================================-->
		<script src="style/forms/vendor/daterangepicker/moment.min.js"></script>
		<script src="style/forms/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="style/forms/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="style/forms/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
