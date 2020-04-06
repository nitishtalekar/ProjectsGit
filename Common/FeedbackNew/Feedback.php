<?php require('dbconnect.php');


echo count($_SESSION['info']);
if($_SESSION['iteration'] == count($_SESSION['info'])){
	if($_SESSION['elective'] == 1){
		header('location: elective.php');
	}
	else{
		header('location: complete.php');
	}
}

// echo $_SESSION['queries'][$_SESSION['iteration']-1];

$dept = $_SESSION['Dept'];
$sem = $_SESSION['Sem'];
$div = $_SESSION['Div'];

$info = explode("---",$_SESSION['info'][$_SESSION['iteration']]);
$ids = explode("%",$info[0]);
$names = explode("%",$info[1]);

$questions = "SELECT * FROM feedback_ques WHERE status=1";
$resultquestion = mysqli_query($db, $questions);
$ques_count = mysqli_num_rows ($resultquestion);

$answer = array();
$ans_str = 'answer';
for($s=1;$s<=$ques_count;$s++){
	array_push($answer,$ans_str.strval($s));
}

if(isset($_POST['feedback'])){
		
		$ans = '';
		for($i=0;$i<$ques_count;$i++){
			$ans = $ans."'".$_POST[$answer[$i]]."',";
		}
		
		if ($_POST['remark']){
			$rmrk = mysqli_real_escape_string($db, $_POST['remark']);
		}
		else{
			$rmrk = "--";
		}
		$query_str = "INSERT INTO feedback_temp(teacher_id, sub_id, div_id, ques1, ques2, ques3, ques4, ques5, ques6, ques7, ques8, ques9, ques10, ques11, ques12,remark)";
		array_push(	$_SESSION['queries'],$query_str."VALUES ('$ids[0]','$ids[1]','$div',".$ans."'$rmrk');");
		
		$_SESSION['iteration'] = $_SESSION['iteration']+1;
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
			<form class="contact100-form validate-form" action="Feedback.php" method="POST" enctype="multipart/form-data">
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
				<?php 
				echo '<div class="wrap-input100 bg3">';
					echo '<center><label class="label-inputx3 text-white">Subject '.($_SESSION['iteration']+1).'</label></center>';
					echo '<center><label class="label-inputx4 text-white">'.$names[1].'</label></center>';
				echo '</div>';
				if($_SESSION['iteration'] >= $_SESSION['counts'][0] && $_SESSION['iteration'] < $_SESSION['counts'][1]){
					echo '<div class="wrap-input100 bg3">';
						echo '<center><label class="label-inputx4 text-white">'.$names[0].'</label></center>';
					echo '</div>';
				}
				?>
				<?php 
					$x = 0;
					while($rowq = mysqli_fetch_assoc($resultquestion)){
						// echo "<hr width=100%>";
						echo "<div class='wrap-input100 bg1 rs1-wrap-input100'>";
						echo "<div class='wrap-input100 bg1'>";
						echo "<center><label class='label-inputx'>".$rowq['question']."</label></center>";
						echo "</div>";
						echo "<div class='wrap-input100 input100-select bg2 validate-input' data-validate='Please Fill Field'>";
							echo "<span class='label-input100'>Answer</span>";
							echo "<div>";
								echo '&nbsp&nbsp<label class="label-inputr">&nbsp&nbsp<input class="options" type="radio" name="'.$answer[$x].'" value="5" required>&nbsp&nbsp'.$rowq['ans1'].'</label><br>';
								echo '&nbsp&nbsp<label class="label-inputr">&nbsp&nbsp<input class="options" type="radio" name="'.$answer[$x].'" value="4">&nbsp&nbsp'.$rowq['ans2'].'</label><br>';
								echo '&nbsp&nbsp<label class="label-inputr">&nbsp&nbsp<input class="options" type="radio" name="'.$answer[$x].'" value="3">&nbsp&nbsp'.$rowq['ans3'].'</label><br>';
								echo '&nbsp&nbsp<label class="label-inputr">&nbsp&nbsp<input class="options" type="radio" name="'.$answer[$x].'" value="2">&nbsp&nbsp'.$rowq['ans4'].'</label><br>';
								echo '&nbsp&nbsp<label class="label-inputr">&nbsp&nbsp<input class="options" type="radio" name="'.$answer[$x].'" value="1">&nbsp&nbsp'.$rowq['ans5'].'</label><br>';
						echo "</div>";
						echo "</div>";
					echo "</div>";
					$x = $x+1;
					}
					?>
				
        <hr width=100%>
				<div class="wrap-input100  bg2 rs1-alert-validate" >
					<span class="label-input100">Comments</span>
					<textarea class="input100" name="remark" placeholder="Enter Comments Here"></textarea>
				</div>
				
				<hr width=100%>
				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="feedback">
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
