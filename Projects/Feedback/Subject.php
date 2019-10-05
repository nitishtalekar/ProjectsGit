<?php require('dbconnect.php');

	if(isset($_POST['subject_info'])){
		$id = mysqli_real_escape_string($db, $_POST['courseid']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$sem = $_POST['sem'];
		$branch = $_POST['branch'];

		$qu = "INSERT INTO subject(sub_id, sub_name, sub_sem, sub_dept) VALUES ('$id','$name','$sem','$branch');";
		mysqli_query($db, $qu);
		
		header('location: Subject.php');
	}

?>
<html lang="en">
<head>
	<title>Subjects</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="style/forms/images/icons/favicon.ico"/>
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
			<form class="contact100-form validate-form" action="Subject.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Subjects
				</span>
				
				<div class="wrap-input100 bg1">
					<span class="label-input100">Course ID</span>
					<input class="input100" type="text" name="courseid" placeholder="Course ID">
				</div>
				
				<div class="wrap-input100 bg1">
					<span class="label-input100">Course Name</span>
					<input class="input100" type="text" name="name" placeholder="Course Name">
				</div>
				
				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Branch</span>
					<div>
						<select class="js-select2" name="branch" required>
							<option selected disabled value="">Choose Department</option>
							<option value="F.E">Applied Sciences</option>
							<option value="Mech">Mechanical</option>
							<option value="Comps">Computers</option>
							<option value="EXTC">EXTC</option>
							<option value="Instru">Instumentation</option>
							<option value="IT">IT</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				
				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Semester</span>
					<div>
						<select class="js-select2" name="sem" required>
							<option selected disabled value="">Choose Sem</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				
				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="subject_info">
						<span>
							Add
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



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
