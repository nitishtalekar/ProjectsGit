<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/dbconnect.php");

if(empty($_SESSION['admin'])){
  header('location: index.php');
}


	if(isset($_POST['mailing'])){
		$sem = $_POST['sem'];
		$branch = $_POST['branch'];
		$div = $_POST['div'];
    
    $mail = mysqli_real_escape_string($db, $_POST['mail_list']);
    $mail_list = explode(",",$mail);
    
    for($i=0;$i<count($mail_list);$i++){
      $hashmail = sha1($mail_list[$i]);
      $link = "mctrgitfeedback.000webhostapp.com/index.php?id=".$hashmail;
      $mail_q = "INSERT INTO mail_addr(mail, mail_hash, mail_dept, mail_sem, mail_div, fb_link) VALUES ('$mail_list[$i]','$hashmail','$branch','$sem','$div','$link');";
      mysqli_query($db, $mail_q);
    }
    
    echo "<script>alert('Mail Data Uploaded!')</script>";
		// header('location: index.php');
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

<script type="text/javascript">
$(document).ready(function(){
  selection();
  // changes(x,y);
});
function changes(x,y){      
    var deptID = x;
    if(deptID){
      $.ajax({
          type:'POST',
          url:'ajaxfb2.php',
          data:'deptid='+deptID+y,
          success:function(html){
              $(y).html(html);
              console.log("successful");
          }
      });   
    }
    else{
        $(y).html('<option disabled selected value="">Select Department First</option>');
    }
}
function selection(x) {
  changes(x,'#tdiv');
  changes(x,'#tsem');
}

</script>

</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/include/header.php")?>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="index.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Mailing Information
				</span>
        
        <div class="wrap-input100 bg1">
					<span class="label-input100">Mail List</span>
					<textarea class="input100" name="mail_list" placeholder="Mail List (Comma)"></textarea>
				</div>

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Branch</span>
					<div>
						<select class="js-select2" name="branch" id="department" onchange="selection(this.value);" required>
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

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Semester</span>
					<div>
						<select class="js-select2" name="sem" id="tsem">
              
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 input100-select bg1 validate-input" data-validate="Please Fill Field">
					<span class="label-input100">Division</span>
					<div>
						<select class="js-select2" name="div" id="tdiv">
              
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="mailing">
						<span>
							Next
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
      <div class="container-contact100-form-btn">
        <a href="mail_list.php" class="contact100-form-btn">
          <span>
            Mail List
            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
          </span>
        </a>
      </div>
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
