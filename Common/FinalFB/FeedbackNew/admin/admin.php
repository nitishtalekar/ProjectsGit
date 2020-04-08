<?php 
require($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/dbconnect.php");

if(empty($_SESSION['admin'])){
  header('location:index.php');
}


if(isset($_POST['subject'])){

  header('location: Input/Subjects');
}

if(isset($_POST['teacher'])){

  header('location: Input/Teachers');
}

if(isset($_POST['teaching'])){

  header('location: Input/Teaching');
}

if(isset($_POST['output'])){

  header('location: Output.php');
}
if(isset($_POST['question'])){

  header('location: Input/Questions');
}

if(isset($_POST['sem'])){

  header('location: Input/Sems');
}


 ?>



<html lang="en">
<head>
	<title>Feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/vendor/noui/nouislider.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/css/util.css">
		<link rel="stylesheet" type="text/css" href="/FeedbackNew/style/forms/css/main.css">
	<!--===============================================================================================-->
</head>
<body><?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/include/header.php")?>


	<div class="container-contact100">
		<div class="wrap-contact100" style="padding-bottom: 40px;">
			<form class="contact100-form validate-form" action="admin.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">FEEDBACK ADMIN</label></center>
				</div>


        <div class="wrap-input100 rs1-wrap-input100" style="margin-bottom: 0px;padding-bottom: 30px;">
          <div class="container-contact100-form-btn p-b-5">
  					<button type="submit" class="contact100-form-btn" name="subject">
  						<span>
  							Subjects
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>

          <div class="container-contact100-form-btn p-b-5">
  					<button type="submit" class="contact100-form-btn" name="teacher">
  						<span>
  							Teachers
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>

          <div class="container-contact100-form-btn p-b-5">
  					<button type="submit" class="contact100-form-btn" name="teaching">
  						<span>
  							Teaching Schedule
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>
        </div>

        <div class="wrap-input100 rs1-wrap-input100" style="margin-bottom: 0px;padding-bottom: 30px;">
          <div class="container-contact100-form-btn p-b-5">
  					<button type="submit" class="contact100-form-btn" name="output">
  						<span>
  							Output Data
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>

          <div class="container-contact100-form-btn p-b-5">
  					<button type="submit" class="contact100-form-btn" name="question">
  						<span>
  							Questions
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>

          <div class="container-contact100-form-btn p-b-5">
  					<button type="submit" class="contact100-form-btn" name="sem">
  						<span>
  							Set Semester
  							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
  						</span>
  					</button>
  				</div>
        </div>


			</form>
		</div>
	</div>
  
<?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/include/footer.php")?>





	<!--===============================================================================================-->
		<script src="/FeedbackNew/style/forms/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="/FeedbackNew/style/forms/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="/FeedbackNew/style/forms/vendor/bootstrap/js/popper.js"></script>
		<script src="/FeedbackNew/style/forms/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="/FeedbackNew/style/forms/vendor/select2/select2.min.js"></script>
		<script>
			$(".js-select2").each(function(){
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next('.dropDownSelect2')
				});
			})
		</script>
	<!--===============================================================================================-->
		<script src="/FeedbackNew/style/forms/vendor/daterangepicker/moment.min.js"></script>
		<script src="/FeedbackNew/style/forms/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="/FeedbackNew/style/forms/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="/FeedbackNew/style/forms/js/main.js"></script>

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
