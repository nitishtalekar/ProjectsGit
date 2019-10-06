<?php require('../dbconnect.php');

if(isset($_POST['upload_fb'])){
    $query = "SELECT DISTINCT teacher_id,sub_id FROM feedback_temp;";
    $results = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($results)){
        $t = $row['teacher_id'];
        $s = $row['sub_id'];
        $ans = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $rmrks = '';
        $q = "SELECT * FROM feedback_temp WHERE teacher_id = '$t' AND sub_id = '$s';";
        $res = mysqli_query($db, $q);
        $length = mysqli_num_rows($res);
        while($row1 = mysqli_fetch_assoc($res)){
            $ans[0] = $ans[0] + (int)$row1['ques1'];
            $ans[1] = $ans[1] + (int)$row1['ques2'];
            $ans[2] = $ans[2] + (int)$row1['ques3'];
            $ans[3] = $ans[3] + (int)$row1['ques4'];
            $ans[4] = $ans[4] + (int)$row1['ques5'];
            $ans[5] = $ans[5] + (int)$row1['ques6'];
            $ans[6] = $ans[6] + (int)$row1['ques7'];
            $ans[7] = $ans[7] + (int)$row1['ques8'];
            $ans[8] = $ans[8] + (int)$row1['ques9'];
            $ans[9] = $ans[9] + (int)$row1['ques10'];
            $ans[10] = $ans[10] + (int)$row1['ques11'];
            $ans[11] = $ans[11] + (int)$row1['ques12'];
            $rmrks = $rmrks.'<->'.$row1['remark'];
        }
        $avg_ans = array();
        for($i=0;$i<12;$i++){
            $avg_ans[$i] = strval(round((float)$ans[$i]/(float)$length));
        }
        $yr = strval(date('Y'));
        $qu = "INSERT INTO feedback(teacher_id, sub_id, year, score1, score2, score3, score4, score5, score6, score7, score8, score9, score10, score11, score12, remark)";
        $qu = $qu."VALUES ('$t','$s','$yr','$avg_ans[0]','$avg_ans[1]','$avg_ans[2]','$avg_ans[3]','$avg_ans[4]','$avg_ans[5]','$avg_ans[6]','$avg_ans[7]','$avg_ans[8]','$avg_ans[9]','$avg_ans[10]','$avg_ans[11]','$rmrks')";

        mysqli_query($db, $qu);
        echo "<script type='text/javascript'>alert('UPLOADED');</script>";
        header('location: ../index.php');
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
			<form class="contact100-form validate-form" action="UploadFeedback.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">UPLOAD FEEDBACK DATA</label></center>
				</div>


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="upload_fb">
						<span>
							Upload
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
