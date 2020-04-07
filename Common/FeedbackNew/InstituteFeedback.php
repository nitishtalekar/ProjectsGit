<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/dbconnect.php");

$dept = $_SESSION['Dept'];
$sem = $_SESSION['Sem'];
$div = $_SESSION['Div'];

	if(isset($_POST['inst_feedback'])){
		if ($_POST['inst_remark']){
			$irmrk = mysqli_real_escape_string($db, $_POST['inst_remark']);
		}
		else{
			$irmrk = "--";
		}
		
		$_SESSION['inst_fb'] = "INSERT INTO feedback_inst_temp( dept, sem, div_id, comment) VALUES ('$dept','$sem','$div','$irmrk')";
		
		header('location: complete.php');
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


	<div class="container-contact100" style="min-height:calc(100vh - 42px)">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="InstituteFeedback.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback Form
				</span>
				
				<div class="fb2-wrap-input100">
					<center><label class="label-inputx">Department:</label></center>
					<center><label class="label-inputx3"><?= $dept ?></label></center>
				</div>
				<div class="fb2-wrap-input100">
					<center><label class="label-inputx">Semester: <br><?= $sem ?></label></center>
				</div>
				<div class="fb2-wrap-input100">
					<center><label class="label-inputx">Division: <br><?= $div ?></label></center>
				</div>
				<div class="wrap-input100 bg3">
					<center><label class="label-inputx4">Institutional Feedback</label></center>
				</div>
				
        <hr width=100%>
				<div class="wrap-input100  bg2 rs1-alert-validate" >
					<span class="label-input100">Comments</span>
					<textarea class="input100" name="inst_remark" placeholder="Enter Comments Here"></textarea>
				</div>
				
				<hr width=100%>
				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="inst_feedback">
						<span>
							Next
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/include/footer.php")?>


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
