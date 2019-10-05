<?php require('../dbconnect.php');
	
	if(isset($_POST['teacher_info'])){
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$mname = mysqli_real_escape_string($db, $_POST['mname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$tid = mysqli_real_escape_string($db, $_POST['tid']);
		$pwd = mysqli_real_escape_string($db, $_POST['pwd']);
		$pwd2 = mysqli_real_escape_string($db, $_POST['pwd2']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$gen = $_POST['gender'];
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		$dept = $_POST['dept'];
		$doj = mysqli_real_escape_string($db, $_POST['doj']);
		$priv = $_POST['privilage'];
		$name = $title." ".$fname." ".$mname." ".$lname;

		$query = "INSERT INTO teacher(teacher_id, password, teacher_name, teacher_mail, teacher_phone, teacher_gen, teacher_dob, teacher_dept, teacher_doj) VALUES ('$tid','$pwd','$name','$email','$phone','$gen','$dob','$dept','$doj')";
    mysqli_query($db, $query);
		header('location: index.php');
	}

?>
<html lang="en">
<head>
	<title>Teachers</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../style/forms/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../style/forms/css/util.css">
	<link rel="stylesheet" type="text/css" href="../style/forms/css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="Teacher.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Teachers Information
				</span>

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Title</span>
					<div>
						<select class="js-select2" name="title" required>
							<option selected disabled value="">Choose Title</option>
							<option value="Prof." >Prof.</option>
							<option value="Dr.">Dr.</option>
							<option value="Mr.">Mr.</option>
							<option value="Mrs.">Mrs.</option>
							<option value="Ms.">Ms.</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				
				<div class="wrap-input100 bg1 rs2-wrap-input100" data-validate="Please Fill Field">
					<span class="label-input100">First Name</span>
					<input class="input100" type="text" name="fname" placeholder="First Name">
				</div>
				
				<div class="wrap-input100 bg1 rs2-wrap-input100" data-validate="Please Fill Field">
					<span class="label-input100">Middle Name</span>
					<input class="input100" type="text" name="mname" placeholder="Middle Name">
				</div>
				
				<div class="wrap-input100 bg1 rs2-wrap-input100" data-validate="Please Fill Field">
					<span class="label-input100">Last Name</span>
					<input class="input100" type="text" name="lname" placeholder="Last Name">
				</div>
				
				<div class="wrap-input100 validate-input bg1" data-validate="Please Fill Field">
					<span class="label-input100">Teacher ID</span>
					<input class="input100" type="text" name="tid" placeholder="Enter Teachers ID">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Fill Field">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate="Please Fill Field">
					<span class="label-input100">Phone</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
				</div>
				
				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Gender</span>
					<div>
						<select class="js-select2" name="gender" required>
							<option selected disabled value="">Choose Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Others</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">D.O.B</span>
					<input class="input100" type="date" name="dob" placeholder="DOB">
				</div>
				
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Branch</span>
					<div>
						<select class="js-select2" name="dept" required>
							<option selected disabled value="">Choose Department</option>
							<option value="Applied Sciences">Applied Sciences</option>
							<option value="Mechanical Engineering">Mechanical Engineering</option>
							<option value="Computer Engineering">Computer Engineering</option>
							<option value="Electronics and Telecommunication">Electronics and Telecommunication</option>
							<option value="Instumentation Engineering">Instumentation Engineering</option>
							<option value="Information Technology">Information Technology</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 bg1">
					<span class="label-input100">Date of Joining</span>
					<input class="input100" type="date" name="doj" placeholder="DOB">
				</div>
				
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Role</span>
					<div>
						<select class="js-select2" name="privilage" required>
							<option selected disabled value="">Choose Role</option>
							<option value="Result Analysis">Result Analysis</option>
							<option value="Timetable">Timetable</option>
							<option value="Internship">Internship</option>
							<option value="Certicication">Certicication</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="teacher_info">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="../style/forms/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../style/forms/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../style/forms/vendor/bootstrap/js/popper.js"></script>
	<script src="../style/forms/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../style/forms/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../style/forms/vendor/daterangepicker/moment.min.js"></script>
	<script src="../style/forms/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../style/forms/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../style/forms/js/main.js"></script>

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
