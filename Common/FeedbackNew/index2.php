<?php require('dbconnect.php');

  if(isset($_POST['feedback_intro'])){
    $dept = $_POST['dept'];
    $sem = $_POST['sem'];
    $div = $_POST['div'];
    $_SESSION['Dept'] = $dept;
    $_SESSION['Sem'] = $sem;
    $_SESSION['Div'] = $div;
    $_SESSION['iteration'] = 0; 
    $_SESSION['queries'] = array();
    
    $info = array();
    $counts = array();
    
    //No Dependancy
    $query = "SELECT * FROM teaching WHERE dept='$dept' AND sem='$sem' AND lec_div='$div' AND status='00';";
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
      $info_temp = $tid."%".$sid."---".$row_t['teacher_name']."%".$row_s['sub_name'];
      array_push($info,$info_temp);
      }
    array_push($counts,count($info));  
      
    //Multiple Teachers  
    $query = "SELECT * FROM teaching WHERE dept='$dept' AND sem='$sem' AND lec_div='$div' AND status='01';";
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
      $info_temp = $tid."%".$sid."---".$row_t['teacher_name']."%".$row_s['sub_name'];
      array_push($info,$info_temp);
      }
    array_push($counts,count($info));
    
    //elective
    $query = "SELECT * FROM teaching WHERE dept='$dept' AND sem='$sem' AND lec_div='$div' AND status='10';";
    $results = mysqli_query($db, $query);
    if(mysqli_num_rows($results)>0){
      $_SESSION['elective'] = 1;
    }
    else{
      $_SESSION['elective'] = 0;
    }
      
      
		$_SESSION['info'] = $info;
    $_SESSION['counts'] = $counts;
    
    header('location: Feedback.php');
    // 
    // for($i=0;$i<count($info);$i++){
    //   echo $info[$i];
    //   echo '<br>';
    // }
    // for($i=0;$i<3;$i++){
    //   echo $counts[$i];
    //   echo '<br>';
    // }
    
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
			<form class="contact100-form validate-form" action="index.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">ENTER INFORMATION</label></center>
				</div>
        <div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Branch</span>
					<div>
						<select class="js-select2" name="dept" id="department" required>
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

        <div class="wrap-input100 input100-select bg1 validate-input" data-validate="Please Fill Field">
					<span class="label-input100">Semester</span>
					<div>
						<select class="js-select2" name="sem" required>
							<option selected disabled value="">Choose Semester</option>
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

        <div class="wrap-input100 input100-select bg1 validate-input" data-validate="Please Fill Field">
					<span class="label-input100">Division</span>
					<div>
						<select class="js-select2" name="div" required>
							<option selected disabled value="">Choose Division</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
              <option value="F">F</option>
              <option value="G">G</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="feedback_intro">
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
