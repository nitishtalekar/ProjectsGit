<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/dbconnect.php");

if(empty($_SESSION['admin'])){
  header('location: index.php');
}

$mlq = $_SESSION['mail_query']; 
$mresults = mysqli_query($db, $mlq);
// echo $mlq;

$msem = $_SESSION['msem'];
$mbranch = $_SESSION['mbranch'];
$mdiv = $_SESSION['mdiv'];

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
  <?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/include/header.php")?>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="mail_list.php" method="POST" enctype="multipart/form-data">
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
       
			</form>
      <div class="container-contact100-form-btn">
        <a href="mail_list.php" class="contact100-form-btn">
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
