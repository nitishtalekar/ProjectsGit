<?php require('../../../dbconnect.php');


if(empty($_SESSION['admin'])){
  header('location: index.php');
}

$sem = $_SESSION['sem'];
$dept = $_SESSION['dept'];

$q = "SELECT * from subject WHERE sub_sem='$sem' AND sub_dept='$dept';";

$results= mysqli_query($db, $q);

if(isset($_POST['add'])){
  header('location: Add_subject.php');
}

if(isset($_POST['delete'])){
  header('location: Delete_subject.php');
}


?>




<html lang="en">
<head>
	<title>Feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/vendor/noui/nouislider.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="../../../style/forms/css/util.css">
		<link rel="stylesheet" type="text/css" href="../../../style/forms/css/main.css">
	<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="subjects.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">FEEDBACK SUBJECTS</label></center>
				</div>

        <div class="wrap-input100">
					<center><label class="label-inputx"><?php echo  $_SESSION['sem']." ".$_SESSION['dept'];  ?></label></center>
				</div>

        <?php

        while($row = mysqli_fetch_assoc($results)){

          echo $row['sub_id']." ".$row['sub_name'];
          echo "<br>";

        }
         ?>

         <div class="container-contact100-form-btn">
 					<button type="submit" class="contact100-form-btn" name="add">
 						<span>
 							Add Subjects
 							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
 						</span>
 					</button>
 				</div>

        <div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="delete">
						<span>
							Delete Subjects
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>


			</form>
		</div>
	</div>

  <?php require "../../../include/footer.php"?>



	<!--===============================================================================================-->
		<script src="../../../style/forms/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="../../../style/forms/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="../../../style/forms/vendor/bootstrap/js/popper.js"></script>
		<script src="../../../style/forms/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="../../../style/forms/vendor/select2/select2.min.js"></script>
		<script>
			$(".js-select2").each(function(){
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next('.dropDownSelect2')
				});
			})
		</script>
	<!--===============================================================================================-->
		<script src="../../../style/forms/vendor/daterangepicker/moment.min.js"></script>
		<script src="../../../style/forms/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="../../../style/forms/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="../../../style/forms/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
