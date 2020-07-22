<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/dbconnect.php");

if(empty($_SESSION['admin'])){
  header('location: index.php');
}

  if($_SESSION['i'] == count($_SESSION['sublist'])){

    header('location: Teaching_complete.php');

  }

	$sem = $_SESSION['Sem'];
	$branch = $_SESSION['Branch'];
	$div = $_SESSION['Div'];

	if(isset($_POST['teaching_cont'])){
		$subj = $_SESSION['subidlist'][$_SESSION['i']];
		$proff = $_POST['prof'];
		$el = isset($_POST['elec'])?'1':'0';
		$rp = isset($_POST['rep'])?'1':'0';
    if($_SESSION['rep'] == 0){
      $rp = '1';
    }
		$stat = $el.$rp;
    if($el == '1' && isset($_POST['eno'])){
      $en = mysqli_real_escape_string($db,$_POST['eno']);
      $stat = $stat."->".$en;
    }

		$qu = "INSERT INTO teaching(dept, sem, lec_div, teacher_id, sub_id,status) VALUES ('$branch','$sem','$div','$proff','$subj','$stat');";
		// mysqli_query($db, $qu);
    array_push($_SESSION['tqueries'],$qu);
    
    if($rp == 1 && isset($_POST['repeat'])){
      $repeat = mysqli_real_escape_string($db, $_POST['repeat']);
      $_SESSION['repeating'] = $repeat-1;
      $_SESSION['rep'] = 0;
    }
    
    if($_SESSION['repeating'] == 0){
      $_SESSION['i'] = $_SESSION['i'] + 1;
      $_SESSION['rep'] = 1;
    }
    else{
      $_SESSION['repeating']=$_SESSION['repeating']-1;
    }

		header('location: Teaching2.php');
	}
  
  if(isset($_POST['teaching_skip'])){
    $_SESSION['i'] = $_SESSION['i'] + 1;
    header('location: Teaching2.php');
  }
  

?>
<html lang="en">
<head>
	<title>Feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/FeedbackNew/style/forms/images/icons/favicon.ico"/>
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
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
    $('#rcheck').change(function () {
        if (!this.checked) 
        //  ^
           $('#rdiv').fadeOut('fast');
        else 
            $('#rdiv').fadeIn('fast');
    });
    $('#echeck').change(function () {
        if (!this.checked) 
        //  ^
           $('#ediv').fadeOut('fast');
        else 
            $('#ediv').fadeIn('fast');
    });
});
    
  </script>

</head>
<body><?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/include/header.php")?>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="Teaching2.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Teaching Information
				</span>


          <div class="wrap-input100">
            <center><label class="label-inputx"><?php echo  $_SESSION['Branch']; ?></label></center>
          </div>

          <div class="wrap-input100">
  					<center><label class="label-inputx"><?php echo "Semester - ".$_SESSION['Sem']."  Division - ".$_SESSION['Div']; ?></label></center>
  				</div>



          <div class="wrap-input100 bg3">
  					<center><label class="label-inputx text-white"><?php echo  $_SESSION['sublist'][$_SESSION['i']]; ?></label></center>
  				</div>

					<?php
						$qu = "SELECT * FROM teacher";
						$result = mysqli_query($db, $qu);
							echo "<div class='wrap-input100 input100-select bg1 validate-input' data-validate='Please Fill Field'>";
								echo "<span class='label-input100'>Professor</span>";
								echo "<div>";
									echo "<select class='js-select2' name=prof >";
										echo "<option selected disabled value=''>Choose Professor</option>";
										while($row = mysqli_fetch_assoc($result)){
										echo "<option value=".$row['teacher_id'].">".$row['teacher_name']."</option>";
									}
									echo "</select>";
									echo "<div class='dropDownSelect2'></div>";
							echo "</div>";
						echo "</div>";
            if($_SESSION['rep'] == 1){
              $elecdisp = 'rs1-wrap-input100';
            }
            else{
              $elecdisp = 'wrap-input100';
            }
						?>

						<div class="wrap-input100 bg1 <?=$elecdisp?>">
							<center>
								<label class="label-inputx">Elective</label>
								<input class="input50" type="checkbox" name="elec" id="echeck" placeholder="Elective">
							</center>
						</div>
						<!-- <div class="wrap-input100 bg1 rs1-wrap-input100">
							<center>
								<label class="label-inputx">Repeated</label>
								<input class="input50" type="checkbox" name="rep" id="rcheck" placeholder="Repeat">
							</center>
						</div> -->
            
            <?php
            if($_SESSION['rep'] == 1){
              
              echo '<div class="wrap-input100 bg1 rs1-wrap-input100">';
  						echo '	<center>';
  						echo '		<label class="label-inputx">Repeated</label>';
  						echo '		<input class="input50" type="checkbox" name="rep" id="rcheck" placeholder="Repeat">';
  						echo '	</center>';
  						echo '</div>';
              
              echo '<div class="wrap-input100 bg1" id="rdiv" style="display: none;">';
      				echo '	<span class="label-input100">Repeat Subject</span>';
      				echo '	<input class="input100" type="number" name="repeat" id="rep_id" placeholder="Enter Repeat Times">';
      				echo '</div>';
            }
            ?>
            
            <div class="wrap-input100 bg1" id="ediv" style="display: none;">
            	<span class="label-input100">Elective No.</span>
            	<input class="input100" type="number" name="eno" placeholder="Enter Elective No." id="elec_id">
            </div>

				<div class="container-contact100-form-btn rs1-wrap-input10">
					<button type="submit" class="contact100-form-btn" name="teaching_cont">
						<span>
							Continue
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
        
        <div class="container-contact100-form-btn rs1-wrap-input10">
          <button type="submit" class="contact100-form-btn" name="teaching_skip">
            <span>
              Skip
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>

			</form>
<div class="container-contact100-form-btn">
  <a href="Teaching.php" class="contact100-form-btn">
    <span>
      Back
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
