<?php require('dbconnect.php');


$dept = $_SESSION['Dept'];
$sem = $_SESSION['Sem'];
$div = $_SESSION['Div'];



//Elective  
if(isset($_POST['elective_intro'])){

    array_push($_SESSION['info'],$_POST['elective']);
    $_SESSION['elective'] = 2;
    header('location: Feedback.php');
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


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="elective.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback - Elective
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">SELECT INFORMATION</label></center>
				</div>

        <div class="wrap-input100 input100-select bg1 validate-input" data-validate="Please Fill Field">
					<span class="label-input100">Elective</span>
					<div>
						<select class="js-select2" name="elective" required>
							<option selected disabled value="">Choose Elective</option>
              
              <?php
              $query = "SELECT * FROM teaching WHERE dept='$dept' AND sem='$sem' AND lec_div='$div' AND status LIKE '10%';";
              $results = mysqli_query($db, $query);
              while($row = mysqli_fetch_assoc($results)){
                $tid = $row['teacher_id'];
                $qu_t = "SELECT * FROM teacher WHERE teacher_id='$tid';";
                $res_t = mysqli_query($db, $qu_t);
                $row_t = mysqli_fetch_assoc($res_t);
                $sid = $row['sub_id'];
                $qu_s = "SELECT * FROM subject WHERE sub_id='$sid';";
                $res_s = mysqli_query($db, $qu_s);
                $row_s = mysqli_fetch_assoc($res_s);
                $val = $tid."%".$sid."---".$row_t['teacher_name']."%".$row_s['sub_name'];
                echo '<option value="'.$val.'">'.$row_s["sub_name"].'</option>';
              }
              ?>

						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="elective_intro">
						<span>
							Next
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

  <?php require "include/footer.php"?>


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
