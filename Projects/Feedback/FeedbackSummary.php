<?php
require('../dbconnect.php');
require('FPDF/fpdf.php');


function createpdf($fbresults, $teacherresults, $subjectresults){
    // Cell(float w , float h , string txt , mixed border , int ln , string align , boolean fill , mixed link)
    global $db;
    $pdf= new PDF('P','mm','A4');
    $pdf->AddPage();

    //HEADER only on page 1
    $pdf->Image('data/RGIT.png',10,0,0,35);
    $pdf->SetFont('Arial','B',15);

    $pdf->SetXY(10,30);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10, 'DEPARTMENT OF '.strtoupper($teacherresults['teacher_dept']), 0,1,'C');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Professor Name', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($teacherresults['teacher_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Subject Name', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($subjectresults['sub_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Year', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($fbresults['year']), 0,1,'L');

    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10, 'Feedback Questionnaire', 'T',1,'C');


    $q = "SELECT * FROM feedback_ques";
    $questions = mysqli_query($db, $q);
    $ansindex = 1;

    while($row = mysqli_fetch_assoc($questions)){
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0, 15, 'Q.'.$ansindex.' '.ucfirst(strtolower($row['question'])), 0,'L');
        $pdf->SetFont('Arial','',11);
        $fbscore = $fbresults['score'.$ansindex];
        // $pdf->SetXY(20, $pdf->GetY());
        // $pdf->Cell(0,0,'Average Feedback Score: '.$fbscore,0,1,'L');
        $pdf->SetXY(20, $pdf->GetY());
        $pdf->Cell(0,0,'Feedback: '.$row['ans'.$fbscore],0,1,'L');
        $pdf->Ln(2);
        $ansindex = $ansindex + 1;
    }

    $pdf->AddPage();
    $remarks = explode('<->', $fbresults['remark']);
    $x = count($remarks)-1;
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10, 'Student Reviews', 'T',1,'C');
    while($x >= 0){
        $pdf->SetFont('Arial','',12);
        // $pdf->SetXY(20, $pdf->GetY());
        $pdf->MultiCell(0, 10, ucfirst(strtolower($remarks[$x])), 0,'L');
        $x = $x-1;
    }


    $pdf->Output('FeedbackForProf/'.$teacherresults['teacher_name'].'-'.$subjectresults['sub_name'].'-'.$fbresults['year'].'.pdf', 'F');

}



if(isset($_POST['summary_fb'])){

// feedback ->> SubjectID, TeacherID, Year and Scores
// Get subject name form id
// Get Teacher name from TeacherID

    $q1 = "SELECT * FROM feedback";
    $result = mysqli_query($db, $q1);

    while($fbresults = mysqli_fetch_assoc($result)){
        $subjectid = $fbresults['sub_id'];
        $teacherid = $fbresults['teacher_id'];

        $q2 = "SELECT * FROM teacher WHERE teacher_id = '$teacherid'";
        $teacherresults = mysqli_query($db, $q2);
        $teacherresults = mysqli_fetch_array($teacherresults);

        $q3 = "SELECT * FROM subject WHERE sub_id = '$subjectid'";
        $subjectresults = mysqli_query($db, $q3);
        $subjectresults = mysqli_fetch_array($subjectresults);

        createpdf($fbresults, $teacherresults, $subjectresults);
    }
    // $pdf->Output('xyz.pdf','F');
    // ob_end_flush();
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
			<form class="contact100-form validate-form" action="FeedbackSummary.php" method="POST" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Feedback
				</span>

				<div class="wrap-input100">
					<center><label class="label-inputx">PRINT FEEDBACK DATA</label></center>
				</div>


				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn" name="summary_fb">
						<span>
							Print PDF
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
