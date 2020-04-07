<?php require('dbconnect.php');

$dept = $_SESSION['Dept'];
$sem = $_SESSION['Sem'];
$div = $_SESSION['Div'];

$teach = array();
$sub = array();
$eteach = array();
$esub = array();
$i = 0;
$j = 0;

$a = array('answer1','answer2','answer3','answer4','answer5','answer6','answer7','answer8','answer9','answer10','answer11','answer12');

$iter = $_SESSION['iter'];

$query = "SELECT * FROM teaching WHERE dept='$dept' AND sem='$sem' AND lec_div='$div';";
$results = mysqli_query($db, $query);
while($row = mysqli_fetch_assoc($results)){
	$tid = $row['teacher_id'];
	$sid = $row['sub_id'];
	$stat = $row['status'];
	if($stat != '10'){
		$qu1 = "SELECT * FROM teacher WHERE teacher_id='$tid';";
		$res1 = mysqli_query($db, $qu1);
		$row1 = mysqli_fetch_assoc($res1);
		$teach[$i] = $row1['teacher_name'];
		$qu2 = "SELECT * FROM subject WHERE sub_id='$sid';";
		$res2 = mysqli_query($db, $qu2);
		$row2 = mysqli_fetch_assoc($res2);
		$sub[$i] = $row2['sub_name'];
		$tids[$i] = $tid;
		$sids[$i] = $sid;
		$i = $i+1;
		}
	else{
		$qu1 = "SELECT * FROM teacher WHERE teacher_id='$tid';";
		$res1 = mysqli_query($db, $qu1);
		$row1 = mysqli_fetch_assoc($res1);
		$eteach[$j] = $row1['teacher_name'];
		$qu2 = "SELECT * FROM subject WHERE sub_id='$sid';";
		$res2 = mysqli_query($db, $qu2);
		$row2 = mysqli_fetch_assoc($res2);
		$esub[$j] = $row2['sub_name'];
		$etids[$j] = $tid;
		$esids[$j] = $sid;
		$j = $j+1;
	}
}
	
	$arrlength = count($teach);
	$arrlength2 = count($eteach);
	
	if($arrlength2 > 0){
	$ec = 1;
}
else{
	$ec = 0;
}
	$_SESSION['count'] = $arrlength;
	$_SESSION['count-elec'] = $arrlength2;

	
	if(isset($_POST['feedback'])){
		
		$ans1 = $_POST['answer1'];
		$ans2 = $_POST['answer2'];
		$ans3 = $_POST['answer3'];
		$ans4 = $_POST['answer4'];
		$ans5 = $_POST['answer5'];
		$ans6 = $_POST['answer6'];
		$ans7 = $_POST['answer7'];
		$ans8 = $_POST['answer8'];
		$ans9 = $_POST['answer9'];
		$ans10 = $_POST['answer10'];
		$ans11 = $_POST['answer11'];
		$ans12 = $_POST['answer12'];
		if(isset($_POST['elective'])){
			$elec = mysqli_real_escape_string($db, $_POST['elective']);
			$elec_explode = explode('---', $elec);
			$subject = $elec_explode[0];
			$teacher = $elec_explode[1];
		}
		else{
			$subject = $sids[$iter];
			$teacher = $tids[$iter];
		}
		if ($_POST['remark']){
			$rmrk = mysqli_real_escape_string($db, $_POST['remark']);
		}
		else{
			$rmrk = "--";
		}
		
		$_SESSION['qu'][$_SESSION['iter']] = "INSERT INTO feedback_temp(teacher_id, sub_id, div_id, ques1, ques2, ques3, ques4, ques5, ques6, ques7, ques8, ques9, ques10, ques11, ques12,remark)";
		$_SESSION['qu'][$_SESSION['iter']] = $_SESSION['qu'][$_SESSION['iter']]."VALUES ('$teacher','$subject','$div','$ans1','$ans2','$ans3','$ans4','$ans5','$ans6','$ans7','$ans8','$ans9','$ans10','$ans11','$ans12','$rmrk');";
		
		$_SESSION['iter'] = $_SESSION['iter']+1;
		if($_SESSION['iter']==($_SESSION['count']+$ec)){
			header('location: complete.php');
		}
		else{
			header('location: Feedback.php');
		}
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
				if($_SESSION['iter']<$_SESSION['count']){
				echo '<div class="wrap-input100 bg3">';
					echo '<center><label class="label-inputx4">Subject '.($_SESSION['iter']+1).': <br>'.$sub[$_SESSION['iter']].'</label></center>';
				echo '</div>';
				}
				if($_SESSION['iter']==$_SESSION['count'] && $_SESSION['count-elec'] > 0){
					echo "<div class='wrap-input100 input100-select bg2 validate-input' data-validate='Please Fill Field'>";
						echo "<span class='label-input100'>Elective</span>";
						echo "<div>";
							echo "<select class='js-select2' style='color:white' name=elective required>";
								echo "<option selected disabled value=''>Choose Elective</option>";
								for($i=0;$i<$_SESSION['count-elec'];$i++){
								echo "<option value=".$esids[$i]."---".$etids[$i].">".$esub[$i]."</option>";
							}
							echo "</select>";
							echo "<div class='dropDownSelect2'></div>";
					echo "</div>";
				echo "</div>";
				}
				?>

				<?php 
					$que = "SELECT * FROM feedback_ques";
					$result = mysqli_query($db, $que);
					$x = 0;
					while($rowq = mysqli_fetch_assoc($result)){
						echo "<hr width=100%>";
						echo "<div class='wrap-input100 bg1 rs1-wrap-input100'>";
						echo "<center><label class='label-inputx'>".$rowq['question']."</label></center>";
						echo "</div>";
						echo "<div class='wrap-input100 input100-select rs1-wrap-input100 bg2 validate-input' data-validate='Please Fill Field'>";
							echo "<span class='label-input100'>Answer</span>";
							echo "<div>";
								echo "<select class='js-select2' name=".$a[$x]." required>";
									echo "<option selected disabled value=''>Choose Option</option>";
									echo "<option value='5'>".$rowq['ans1']."</option>";
									echo "<option value='4'>".$rowq['ans2']."</option>";
									echo "<option value='3'>".$rowq['ans3']."</option>";
									echo "<option value='2'>".$rowq['ans4']."</option>";
									echo "<option value='1'>".$rowq['ans5']."</option>";
								echo "</select>";
								echo "<div class='dropDownSelect2'></div>";
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
