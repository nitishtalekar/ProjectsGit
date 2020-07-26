<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/dbconnect.php");

if(empty($_SESSION['admin'])){
  header('location: index.php');
}

$q = "SELECT * from feedback_ques;";
$results= mysqli_query($db, $q);
$q_len = mysqli_num_rows($results);
	if(isset($_POST['edit'])){
    
    $tqu = "TRUNCATE TABLE feedback_ques;";  
    $aiqu = "ALTER TABLE feedback_ques AUTO_INCREMENT = 1;";
    $ques_arr = array();
    for($x=0;$x<mysqli_num_rows($results);$x++){
      $qstr = 'question'.$x;
      $stat = 'status'.$x;
  		$question = mysqli_real_escape_string($db, $_POST[$qstr]);
      $stat = $_POST[$stat];
      $option = array();
      for($i=1;$i<=5;$i++){
        $a_str = 'option'.$x.$i;
        $op = mysqli_real_escape_string($db, $_POST[$a_str]);
        array_push($option,$op);
      }
  		$qu = "INSERT INTO feedback_ques(question, status, ans1, ans2, ans3, ans4, ans5) VALUES ('$question',$stat,'$option[0]','$option[1]','$option[2]','$option[3]','$option[4]');";
  		array_push($ques_arr,$qu);
    }
    
		mysqli_query($db, $tqu);
		mysqli_query($db, $aiqu);
    for($j=0;$j<count($ques_arr);$j++){
      $qu = $ques_arr[$j];
  		mysqli_query($db, $qu);
    }
		header('location: index.php');
	}

?>
<html lang="en">
<head>
	<title>Feedback</title>
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
<script>
function validate12() {
  var status = 0;
  var ql = '<?php echo $q_len ;?>';
  var i;
  var s
  for(i=0;i<ql;i++){
    s = 'status'+i;
    var n2 = document.getElementById(s);
    var si = n2.selectedIndex;
    var n3 = n2.options[si].value;
    if(n3 == '1'){
      status++;
    }
  }
  if (status != 12) {
      alert("EXACT 12 Questions should be switched ON");
      return false;
      
  }
}
</script>
</head>
<body><?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/include/header.php")?>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="Edit_question.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
  				Edit Questionnaire
				</span>
        <?php
        $x = 0;
        while($row = mysqli_fetch_assoc($results)){
				echo '<div class="wrap-input100 bg2">';
				echo '	<span class="label-input100">Question '.($x+1).'</span>';
				echo '	<input class="input100" type="text" name="question'.$x.'" value="'.$row['question'].'">';
				echo '</div>';
        
        if($row['status'] == 0){
          $stat0 = 'selected';
          $stat1 = '';
        }
        else{
          $stat0 = '';
          $stat1 = 'selected';
        }
        
        for($i=1;$i<=5;$i++){
        $a_str = 'ans'.$i;
        $val = $row[$a_str];
        echo '<div class="wrap-input100 bg1 rs1-wrap-input100">';
				echo '	<span class="label-input100">Option '.$i.'</span>';
				echo '	<input class="input100" type="text" name="option'.$x.$i.'" value="'.$val.'">';
				echo '</div>';
                }
                
        echo '<div class="wrap-input100 input100-select bg2 rs1-wrap-input100 validate-input" data-validate="Please Fill Field">';
        echo '    <span class="label-input100">Status</span>';
        echo '      <select class="js-select2" name="status'.$x.'" id="status'.$x.'">';
        echo '        <option '.$stat1.' value="1">ON</option>';
        echo '        <option '.$stat0.' value="0">OFF</option>';
        echo '      </select>';
        echo '      <div class="dropDownSelect2"></div>';
        echo '  </div>';
          
          $x++;
          }
        ?>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" onclick="return validate12()" name="edit">
						<span>
							Edit
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
