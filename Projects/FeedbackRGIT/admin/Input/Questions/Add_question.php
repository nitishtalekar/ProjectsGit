<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/dbconnect.php");

if(empty($_SESSION['admin'])){
  header('location: index.php');
}


	if(isset($_POST['add'])){
		$question = mysqli_real_escape_string($db, $_POST['question']);
    $option1 = mysqli_real_escape_string($db, $_POST['option1']);
    $option2 = mysqli_real_escape_string($db, $_POST['option2']);
    $option3 = mysqli_real_escape_string($db, $_POST['option3']);
    $option4 = mysqli_real_escape_string($db, $_POST['option4']);
    $option5 = mysqli_real_escape_string($db, $_POST['option5']);


		$qu = "INSERT INTO feedback_ques(question, ans1, ans2, ans3, ans4, ans5) VALUES ('$question','$option1','$option2','$option3','$option4','$option5');";
		mysqli_query($db, $qu);

		header('location: index.php');
	}

?>
<html lang="en">
<head>
	<title>Subjects</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/FeedbackRGIT/style/forms/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/css/util.css">
	<link rel="stylesheet" type="text/css" href="/FeedbackRGIT/style/forms/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/include/header.php")?>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="Add_question.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Add Question
				</span>

        <hr style="width:100%">

				<div class="wrap-input100 bg2">
					<span class="label-input100">Question</span>
					<input class="input100" type="text" name="question" placeholder="Enter Question">
				</div>

        <div class="wrap-input100 bg1">
					<span class="label-input100">Option 1</span>
					<input class="input100" type="text" name="option1" placeholder="Enter Option 1">
				</div>

        <div class="wrap-input100 bg1">
					<span class="label-input100">Option 2</span>
					<input class="input100" type="text" name="option2" placeholder="Enter Option 2">
				</div>

        <div class="wrap-input100 bg1">
					<span class="label-input100">Option 3</span>
					<input class="input100" type="text" name="option3" placeholder="Enter Option 3">
				</div>

        <div class="wrap-input100 bg1">
					<span class="label-input100">Option 4</span>
					<input class="input100" type="text" name="option4" placeholder="Enter Option 4">
				</div>

        <div class="wrap-input100 bg1">
					<span class="label-input100">Option 5</span>
					<input class="input100" type="text" name="option5" placeholder="Enter Option 5">
				</div>


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="add">
						<span>
							Add
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
<div class="container-contact100-form-btn">
  <a href="index.php" class="contact100-form-btn">
    <span>
      Back
      <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
    </span>
  </a>
</div>
		</div>
	</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/include/footer.php")?>

<!--===============================================================================================-->
	<script src="/FeedbackRGIT/style/forms/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/FeedbackRGIT/style/forms/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/FeedbackRGIT/style/forms/vendor/bootstrap/js/popper.js"></script>
	<script src="/FeedbackRGIT/style/forms/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/FeedbackRGIT/style/forms/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="/FeedbackRGIT/style/forms/vendor/daterangepicker/moment.min.js"></script>
	<script src="/FeedbackRGIT/style/forms/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/FeedbackRGIT/style/forms/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/FeedbackRGIT/style/forms/js/main.js"></script>

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
