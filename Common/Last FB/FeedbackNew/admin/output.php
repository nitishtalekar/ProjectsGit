<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/dbconnect.php");

set_time_limit(5000);
if(empty($_SESSION['admin'])){
  header('location: index.php');
}


$sem_query = "SELECT * from semester";
$sem_results = mysqli_query($db, $sem_query);
$sem_row = mysqli_fetch_assoc($sem_results);
$sem = $sem_row['current_sem'];


if(isset($_POST['upload_fb'])){
    $query = "SELECT DISTINCT teacher_id,sub_id,div_id FROM feedback_temp;";
    $results = mysqli_query($db, $query);
    if(mysqli_num_rows($results) > 0){
      while($row = mysqli_fetch_assoc($results)){
          $t = $row['teacher_id'];
          $s = $row['sub_id'];
          $did = $row['div_id'];
          // echo $t.'--'.$s.'--'.$did.'<br>';
          $ans = array(0,0,0,0,0,0,0,0,0,0,0,0);
          $rmrks = '';
          $q = "SELECT * FROM feedback_temp WHERE teacher_id = '$t' AND sub_id = '$s' AND div_id = '$did';";
          $res = mysqli_query($db, $q);
          $length = mysqli_num_rows($res);
          $cnt = array(array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0));
          while($row1 = mysqli_fetch_assoc($res)){
              $ans[0] = $ans[0] + (int)$row1['ques1'];
              $cnt[0][(int)$row1['ques1'] - 1] = $cnt[0][(int)$row1['ques1'] - 1] + (int)1;

              $ans[1] = $ans[1] + (int)$row1['ques2'];
              $cnt[1][(int)$row1['ques2'] - 1] = $cnt[1][(int)$row1['ques2'] - 1] + (int)1;

              $ans[2] = $ans[2] + (int)$row1['ques3'];
              $cnt[2][(int)$row1['ques3'] - 1] = $cnt[2][(int)$row1['ques3'] - 1] + (int)1;

              $ans[3] = $ans[3] + (int)$row1['ques4'];
              $cnt[3][(int)$row1['ques4'] - 1] = $cnt[3][(int)$row1['ques4'] - 1] + (int)1;

              $ans[4] = $ans[4] + (int)$row1['ques5'];
              $cnt[4][(int)$row1['ques5'] - 1] = $cnt[4][(int)$row1['ques5'] - 1] + (int)1;

              $ans[5] = $ans[5] + (int)$row1['ques6'];
              $cnt[5][(int)$row1['ques6'] - 1] = $cnt[5][(int)$row1['ques6'] - 1] + (int)1;

              $ans[6] = $ans[6] + (int)$row1['ques7'];
              $cnt[6][(int)$row1['ques7'] - 1] = $cnt[6][(int)$row1['ques7'] - 1] + (int)1;

              $ans[7] = $ans[7] + (int)$row1['ques8'];
              $cnt[7][(int)$row1['ques8'] - 1] = $cnt[7][(int)$row1['ques8'] - 1] + (int)1;

              $ans[8] = $ans[8] + (int)$row1['ques9'];
              $cnt[8][(int)$row1['ques9'] - 1] = $cnt[8][(int)$row1['ques9'] - 1] + (int)1;

              $ans[9] = $ans[9] + (int)$row1['ques10'];
              $cnt[9][(int)$row1['ques10'] - 1] = $cnt[9][(int)$row1['ques10'] - 1] + (int)1;

              $ans[10] = $ans[10] + (int)$row1['ques11'];
              $cnt[10][(int)$row1['ques11'] - 1] = $cnt[10][(int)$row1['ques11'] - 1] + (int)1;

              $ans[11] = $ans[11] + (int)$row1['ques12'];
              $cnt[11][(int)$row1['ques12'] - 1] = $cnt[11][(int)$row1['ques12'] - 1] + (int)1;

              $rmrks = $rmrks.'0-0'.str_replace(array("'", "\""), "", $row1['remark']);
          }

          for($i = 0; $i < 12; $i++)
          {
            $c1 = $cnt[$i][0];
            $c2 = $cnt[$i][1];
            $c3 = $cnt[$i][2];
            $c4 = $cnt[$i][3];
            $c5 = $cnt[$i][4];
            $qn = $i+1;


            $q = "INSERT INTO feedback_count(teacher_id, sub_id, div_id, question_no, count_1, count_2, count_3, count_4, count_5) VALUES ('$t','$s','$did','$qn','$c1','$c2','$c3','$c4','$c5')";
            mysqli_query($db,$q);

          }


          $avg_ans = array();
          for($i=0;$i<12;$i++){
              $avg_ans[$i] = strval(round((float)$ans[$i]/(float)$length));
          }

          $yr = strval(date('Y'));
          $qu = "INSERT INTO feedback(teacher_id, sub_id, div_id, year, sem, score1, score2, score3, score4, score5, score6, score7, score8, score9, score10, score11, score12, remark)";
          $qu = $qu."VALUES ('$t','$s','$did','$yr','$sem','$avg_ans[0]','$avg_ans[1]','$avg_ans[2]','$avg_ans[3]','$avg_ans[4]','$avg_ans[5]','$avg_ans[6]','$avg_ans[7]','$avg_ans[8]','$avg_ans[9]','$avg_ans[10]','$avg_ans[11]','$rmrks')";
          mysqli_query($db, $qu);
          // echo $qu.'<br>';

      }
      $qt = "TRUNCATE table feedback_temp";
      mysqli_query($db, $qt);
      echo "<script>alert('Feedback Data Uploaded!')</script>";
    }
    else{
      echo "<script>alert('No Feedback Data to Upload!')</script>";
    }


    // $query1 = "SELECT DISTINCT dept,sem,div_id FROM feedback_inst_temp;";
    // $results1 = mysqli_query($db, $query1);
    // if(mysqli_num_rows($results1) > 0){
    //   while($row1 = mysqli_fetch_assoc($results1)){
    //     $irmrks = '';
    //     $dept_id = $row1['dept'];
    //     $sem_id = $row1['sem'];
    //     $div_id = $row1['div_id'];
    //
    //     $qu2 = "SELECT * FROM feedback_inst_temp WHERE dept='$dept_id' and sem='$sem_id' and div_id='$div_id';";
    //     $res2 = mysqli_query($db, $qu2);
    //
    //     while($row2 = mysqli_fetch_assoc($res2)){
    //       $irmrks = $irmrks.'0-0'.str_replace(array("'", "\""), "", $row2['comment']);
    //     }
    //
    //     $yr = strval(date('Y'));
    //     $qu1 = "INSERT INTO feedback_inst(year, dept, sem, div_id, comment) VALUES ('$yr','$dept_id','$sem_id','$div_id','$irmrks')";
    //     mysqli_query($db, $qu1);
    //
    //   }
    //   // $qt = "TRUNCATE table feedback_inst_temp";
    //   // mysqli_query($db, $qt);
    //   echo "<script>alert('Institute Data Uploaded!')</script>";
    // }
    // else{
    //   echo "<script>alert('No Institute Data to Upload!')</script>";
    // }

}

if(isset($_POST['trunc_fb'])){

    $q1 = "TRUNCATE table feedback_temp";
    mysqli_query($db, $q1);
    // $qt = "TRUNCATE table feedback_count";
    // mysqli_query($db, $qt);
    echo "<script>alert('Data Cleared!')</script>";
}

if(isset($_POST['summary'])){
  header('location: summary.php');
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
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="output.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback Data
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">FEEDBACK CREATION</label></center>
				</div>


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="upload_fb">
						<span>
							Upload Data
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>

        <div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="summary">
						<span>
							Obtain Feedback Summary
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>

        <div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="trunc_fb">
						<span>
							Truncate Collected Data
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
      <div class="container-contact100-form-btn">
        <a href="admin.php" class="contact100-form-btn">
          <span>
            Back to Home
            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
          </span>
        </a>
      </div>
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
