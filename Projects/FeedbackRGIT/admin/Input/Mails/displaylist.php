<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackRGIT/dbconnect.php");

if(empty($_SESSION['admin'])){
  header('location: index.php');
}

$mlq = $_SESSION['mail_query'];
$mresults = mysqli_query($db, $mlq);
// echo $mlq;

$msem = $_SESSION['msem'];
$mbranch = $_SESSION['mbranch'];
$mdiv = $_SESSION['mdiv'];

if(isset($_POST['delete'])){

  $msem = $_SESSION['msem'];
  $mbranch = $_SESSION['mbranch'];
  $mdiv = $_SESSION['mdiv'];

  $del_mail = "DELETE FROM mail_addr WHERE mail_dept='$mbranch' AND mail_sem = '$msem' AND mail_div='$mdiv';";
  mysqli_query($db, $del_mail);

  header('location: displaylist.php');
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
			<form class="contact100-form validate-form" action="displaylist.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					MAIL
				</span>


        <span class="contact100-form-title">
          <?php
            echo $mbranch."- Sem:".$msem."- Div:".$mdiv;
          ?>
				</span>


        <div class="wrap-input100">
        <?php
        $x = 1;
        while($row = mysqli_fetch_assoc($mresults)){
          echo '<label class="label-inputm">'.$x.") ".$row['mail'].'&nbsp - '.$row['fb_link'].'</label>';
          echo "<br>";
          $x++;
        }
         ?>
       </div>

      <div class="container-contact100-form-btn">
        <a href="mail_list.php" class="contact100-form-btn">
          <span>
            Back
            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
          </span>
        </a>
      </div>
      <div class="container-contact100-form-btn">
        <button type="submit" name="delete" onclick="return confirm('Are you sure?')" class="contact100-form-btn">
          <span>
            Delete
            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
          </span>
        </button>
      </div>
      </form>
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
