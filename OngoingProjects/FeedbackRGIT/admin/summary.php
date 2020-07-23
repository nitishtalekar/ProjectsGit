<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/dbconnect.php");

require('Output/FPDF/fpdf.php');

if(empty($_SESSION['admin'])){
  header('location: index.php');
}

$display_alert = "";

function InstituteCompleteFeedback(){
    // Cell(float w , float h , string txt , mixed border , int ln , string align , boolean fill , mixed link)
    global $db;
    $pdf2= new FPDF('P','mm','A4');

    $pdf2->AddPage();

    $pdf2->Image('Output/data/RGIT.png',10,0,0,35);
    $pdf2->SetFont('Arial','B',15);

    $pdf2->SetXY(10,30);
    $pdf2->SetFont('Arial','B',15);
    $pdf2->Cell(0,10, 'Institute Reviews', 0,1,'C');

    $q = "SELECT * from feedback_inst";
    $result = mysqli_query($db, $q);
    while($row = mysqli_fetch_assoc($result)){
    $remarks = explode('0-0', $row['comment']);
    $x = count($remarks)-1;
    while($x >= 0){
      if($remarks[$x]!='--' && $remarks[$x]!=' '){
        $pdf2->SetFont('Arial','',12);
        $pdf2->MultiCell(0, 8, ucfirst(strtolower($remarks[$x])),'T','L');
      }
      $x = $x-1;
    }
    $pdf2->MultiCell(0, 8, "",'T','L');
  }
    $pdf2->SetFont('Arial','',12);
    $pdf2->MultiCell(0, 8, "", 'T','L');
    $pdf2->Output('Output/OutputPDF/InstituteSummary/AllFeedback.pdf', 'F');
}

function InstituteDivWiseFeedback($idept,$isem,$idiv,$ir,$y){
    // Cell(float w , float h , string txt , mixed border , int ln , string align , boolean fill , mixed link)
    global $db;
    $pdf2= new FPDF('P','mm','A4');

    $pdf2->AddPage();

    $pdf2->Image('Output/data/RGIT.png',10,0,0,35);
    $pdf2->SetFont('Arial','B',15);

    $pdf2->SetXY(10,30);
    $pdf2->SetFont('Arial','B',15);
    $pdf2->Cell(0,10, 'DEPARTMENT OF '.strtoupper($idept), 0,1,'C');

    $pdf2->SetFont('Arial','',12);
    $pdf2->Cell(35,5, 'SEMESTER', 0,0,'L');
    $pdf2->Cell(100,5, ': '.strtoupper($isem), 0,1,'L');

    $pdf2->SetFont('Arial','',12);
    $pdf2->Cell(35,5, 'Year', 0,0,'L');
    $pdf2->Cell(100,5, ': '.strtoupper($y)."    Div   :    ".$idiv, 0,1,'L');

    $remarks = explode('0-0', $ir);
    $x = count($remarks)-1;
    $pdf2->SetFont('Arial','B',14);
    $pdf2->Cell(0,10, 'Student Reviews - Institute', 'T',1,'C');
    while($x >= 0){
      if($remarks[$x]!='--'){
        $pdf2->SetFont('Arial','',12);
        $pdf2->MultiCell(0, 8, ucfirst(strtolower($remarks[$x])), 'T','L');
        $pdf2->Ln(5);
      }
      $x = $x-1;
    }
    $pdf2->Output('Output/OutputPDF/InstituteResults/'.$idept.'-'.$isem.'-'.$idiv.'.pdf', 'F');

}

function SubjectDivWiseFeedback($fbresults, $teacherresults, $subjectresults,$subjectid,$teacherid,$divisionid){
    global $db;
    $pdf= new FPDF('P','mm','A4');
    $pdf->AddPage();

    //HEADER only on page 1
    $pdf->Image('Output/data/RGIT.png',15,0,0,40);
    $pdf->SetFont('Arial','B',15);

    $pdf->SetXY(10,40);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10, 'DEPARTMENT OF '.strtoupper($subjectresults['sub_dept']), 0,1,'C');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10, strtoupper($fbresults['year']), 0,1,'R');
    // $pdf->Cell(100,5, ': '.strtoupper($subjectresults['sub_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Professor Name', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($teacherresults['teacher_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Subject Name', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($subjectresults['sub_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Department', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($subjectresults['sub_dept']), 0,1,'L');
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Semester', 0,0,'L');
    $pdf->Cell(100,5, ': '.$fbresults['sem_no']."           Div   :    ".$divisionid, 0,1,'L');

    // strtoupper($fbresults['year'])

    $pdf->Ln(5);



    $width_cell=array(35,20,20,20,20,20,20,30);
    $pdf->SetFont('Arial','',12);

    //Background color of header//
    $pdf->SetFillColor(255,255,255);

    $pdf->Cell($width_cell[0],10,'Question no',1,0,'C',true);
    //Second header column//
    $pdf->Cell($width_cell[1],10,'A',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[2],10,'B',1,0,'C',true);
    //Fourth header column//
    $pdf->Cell($width_cell[3],10,'C',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[4],10,'D',1,0,'C',true);
    $pdf->Cell($width_cell[5],10,'E',1,0,'C',true);
    $pdf->Cell($width_cell[6],10,'Total',1,0,'C',true);
    $pdf->Cell($width_cell[7],10,'Average %',1,1,'C',true);

    $q = "SELECT * FROM feedback_count where teacher_id='$teacherid' and div_id='$divisionid' and sub_id='$subjectid' ORDER BY question_no; ";
    $questions = mysqli_query($db, $q);

    $fill=false;

    $totalsum = 0;

    while($row = mysqli_fetch_assoc($questions)){

      $pdf->Cell($width_cell[0],10,$row['question_no'],1,0,'C',$fill);
      $pdf->Cell($width_cell[1],10,$row['count_5'],1,0,'C',$fill);
      $pdf->Cell($width_cell[2],10,$row['count_4'],1,0,'C',$fill);
      $pdf->Cell($width_cell[3],10,$row['count_3'],1,0,'C',$fill);
      $pdf->Cell($width_cell[4],10,$row['count_2'],1,0,'C',$fill);
      $pdf->Cell($width_cell[5],10,$row['count_1'],1,0,'C',$fill);
      $sum = $row['count_1'] + $row['count_2'] + $row['count_3'] + $row['count_4'] + $row['count_5'] ;
      $avg = $row['count_1'] + $row['count_2'] * 2 + $row['count_3'] * 3 + $row['count_4'] * 4 + $row['count_5'] * 5 ;
      $rndavg = ($avg/(int)$sum)*20;
      $totalsum = $totalsum + $rndavg;
      $pdf->Cell($width_cell[6],10,$sum,1,0,'C',$fill);
      $pdf->Cell($width_cell[7],10,round($rndavg,2)."%",1,1,'C',$fill);
    }

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(0,20, 'Overall Average :'.round(($totalsum/(int)12),2)."%", 'T',1,'C');


    // $pdf->SetFont('Arial','',12);
    // $pdf->Cell(0,10, "_________________________                          _________________________                          _________________________", 'T',1,'C');

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,20, ".", 'T',1,'C');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10, strtoupper($teacherresults['teacher_name'])."                          Head Of Department                          Principal, RGIT", 0,1,'C');

    $pdf->AddPage();
    $remarks = explode('0-0', $fbresults['remark']);
    $x = count($remarks)-1;
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10, 'Student Reviews', 'T',1,'C');
    while($x >= 0){
      if($remarks[$x]!='--'){
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(0, 8, ucfirst(strtolower($remarks[$x])), 'T','L');
      }
      $x = $x-1;
    }

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,40, ".", 'T',1,'C');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10, strtoupper($teacherresults['teacher_name'])."                          Head Of Department                          Principal, RGIT", 0,1,'C');

    $pdf->Output('Output/OutputPDF/FeedbackResults/'.$subjectresults['sub_dept'].'-'.$fbresults['year'].'-'.$subjectresults['sub_name'].'-'.$divisionid.'-'.$teacherresults['teacher_name'].'.pdf', 'F');

}

function SubjectDivWiseCompleteFeedback($fbresults, $teacherresults, $subjectresults,$subjectid,$teacherid,$divisionid){
    // Cell(float w , float h , string txt , mixed border , int ln , string align , boolean fill , mixed link)
    global $db;
    $pdf= new FPDF('P','mm','A4');
    $pdf->AddPage();

    //HEADER only on page 1
    $pdf->Image('Output/data/RGIT.png',10,0,0,40);
    $pdf->SetFont('Arial','B',15);

    $pdf->SetXY(10,40);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10, 'DEPARTMENT OF '.strtoupper($subjectresults['sub_dept']), 0,1,'C');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10, strtoupper($fbresults['year']), 0,1,'R');
    // $pdf->Cell(100,5, ': '.strtoupper($subjectresults['sub_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Professor Name', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($teacherresults['teacher_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Subject Name', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($subjectresults['sub_name']), 0,1,'L');

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Department', 0,0,'L');
    $pdf->Cell(100,5, ': '.strtoupper($subjectresults['sub_dept']), 0,1,'L');
    
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(35,5, 'Semester', 0,0,'L');
    $pdf->Cell(100,5, ': '.$fbresults['sem_no']."           Div   :    ".$divisionid, 0,1,'L');

    $pdf->Ln(5);

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10, 'Feedback Questionnaire', 'T',1,'C');


    $q = "SELECT * FROM feedback_ques WHERE status='1';";
    $questions = mysqli_query($db, $q);
    $ansindex = 1;

    while($row = mysqli_fetch_assoc($questions)){
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0, 15, 'Q.'.$ansindex.' '.ucfirst(strtolower($row['question'])), 0,'L');
        $pdf->SetFont('Arial','',11);
        $fbscore = $fbresults['score'.$ansindex];
        $pdf->SetXY(20, $pdf->GetY());
        $pdf->Cell(0,0,'Feedback: '.$row['ans'.(6-$fbscore)],0,1,'L');
        $pdf->Ln(2);
        $ansindex = $ansindex + 1;
    }

   //  //--------------------------//
    $pdf->AddPage();

    $pdf->Image('Output/data/RGIT.png',10,0,0,35);
    $pdf->SetFont('Arial','B',15);

    $pdf->SetXY(10,30);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10, 'DEPARTMENT OF '.strtoupper($teacherresults['teacher_dept']), 0,1,'C');

    $pdf->Ln(5);

    $width_cell=array(35,20,20,20,20,20,20,30);
    $pdf->SetFont('Arial','',12);

    //Background color of header//
    $pdf->SetFillColor(255,255,255);
    $pdf->SetXY(10,40);
    // Header starts ///
    //First header column //
    $pdf->Cell($width_cell[0],10,'Question no',1,0,'C',true);
    //Second header column//
    $pdf->Cell($width_cell[1],10,'A',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[2],10,'B',1,0,'C',true);
    //Fourth header column//
    $pdf->Cell($width_cell[3],10,'C',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[4],10,'D',1,0,'C',true);
    $pdf->Cell($width_cell[5],10,'E',1,0,'C',true);
    $pdf->Cell($width_cell[6],10,'Total',1,0,'C',true);
    $pdf->Cell($width_cell[7],10,'Average %',1,1,'C',true);

    $q = "SELECT * FROM feedback_count where teacher_id='$teacherid' and div_id='$divisionid' and sub_id='$subjectid' ORDER BY question_no; ";
    $questions = mysqli_query($db, $q);

    $fill=false;

    $totalsum = 0;

    while($row = mysqli_fetch_assoc($questions)){

      $pdf->Cell($width_cell[0],10,$row['question_no'],1,0,'C',$fill);
      $pdf->Cell($width_cell[1],10,$row['count_5'],1,0,'C',$fill);
      $pdf->Cell($width_cell[2],10,$row['count_4'],1,0,'C',$fill);
      $pdf->Cell($width_cell[3],10,$row['count_3'],1,0,'C',$fill);
      $pdf->Cell($width_cell[4],10,$row['count_2'],1,0,'C',$fill);
      $pdf->Cell($width_cell[5],10,$row['count_1'],1,0,'C',$fill);
      $sum = $row['count_1'] + $row['count_2'] + $row['count_3'] + $row['count_4'] + $row['count_5'] ;
      $avg = $row['count_1'] + $row['count_2'] * 2 + $row['count_3'] * 3 + $row['count_4'] * 4 + $row['count_5'] * 5 ;
      $rndavg = ($avg/(int)$sum)*20;
      $totalsum = $totalsum + $rndavg;
      $pdf->Cell($width_cell[6],10,$sum,1,0,'C',$fill);
      $pdf->Cell($width_cell[7],10,round($rndavg,2)."%",1,1,'C',$fill);
    }

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(0,10, 'Overall Average :'.round(($totalsum/(int)12),2)."%", 'T',1,'C');

    $pdf->AddPage();
    $remarks = explode('0-0', $fbresults['remark']);
    $x = count($remarks)-1;
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,10, 'Student Reviews', 'T',1,'C');
    while($x >= 0){
      if($remarks[$x]!='--'){
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0, 8, ucfirst(strtolower($remarks[$x])), 0,'L');
      }
      $x = $x-1;
    }
    $pdf->Output('Output/OutputPDF/FeedbackSummary/'.$subjectresults['sub_dept'].'-'.$fbresults['year'].'-'.$subjectresults['sub_name'].'-'.$divisionid.'-'.$teacherresults['teacher_name'].'.pdf', 'F');

}


if(isset($_POST['summary_fb'])){

    $year = mysqli_real_escape_string($db, $_POST['year']);
    $sem = $_POST['sem'];

    $q1 = "SELECT * FROM feedback WHERE sem = '$sem' AND year = '$year'; ";
    $result = mysqli_query($db, $q1);

    if(mysqli_num_rows($result)>0){
      while($fbresults = mysqli_fetch_assoc($result)){
          $subjectid = $fbresults['sub_id'];
          $teacherid = $fbresults['teacher_id'];
          $divisionid = $fbresults['div_id'];

          $q2 = "SELECT * FROM teacher WHERE teacher_id = '$teacherid'";
          $teacherresults = mysqli_query($db, $q2);
          $teacherresults = mysqli_fetch_array($teacherresults);

          $q3 = "SELECT * FROM subject WHERE sub_id = '$subjectid'";
          $subjectresults = mysqli_query($db, $q3);
          $subjectresults = mysqli_fetch_array($subjectresults);

          // SubjectDivWiseCompleteFeedback($fbresults, $teacherresults, $subjectresults,$subjectid,$teacherid,$divisionid);
          SubjectDivWiseFeedback($fbresults, $teacherresults, $subjectresults,$subjectid,$teacherid,$divisionid);

      }
      // $qtr = "TRUNCATE table feedback_count";
      // mysqli_query($db, $qtr);
      // echo "<script>alert('Summary Created!')</script>";
      $display_alert = "Summary Created!";
    }
    else{
      // echo "<script>alert('No data to summarize!')</script>";
      $display_alert = "No data to summarize!";
    }

    // $qu1 = "SELECT * FROM feedback_inst";
    // $result1 = mysqli_query($db, $qu1);
    //
    // if(mysqli_num_rows($result1)>0){
    //   while($fbiresults = mysqli_fetch_assoc($result1)){
    //       $isem = $fbiresults['sem'];
    //       $idept = $fbiresults['dept'];
    //       $idiv = $fbiresults['div_id'];
    //       $ir = $fbiresults['comment'];
    //       $yr = $fbiresults['year'];
    //
    //
    //       InstituteDivWiseFeedback($idept,$isem,$idiv,$ir,$yr);
    //       InstituteCompleteFeedback();
    //
    //   }
    //   $qtr = "TRUNCATE table feedback_inst_temp";
    //   mysqli_query($db, $qtr);
    //   echo "<script>alert('Summary Created!')</script>";
    // }
    // else{
    //   echo "<script>alert('No data to summarize!')</script>";
    // }


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
 </head>
 <body><?php include($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/include/header.php")?>


 	<div class="container-contact100">
 		<div class="wrap-contact100" style="width:800px;">
 			<form class="contact100-form validate-form" action="summary.php" method="POST" enctype="multipart/form-data">
 				<span class="contact100-form-title">
 					CREATE SUMMARY
 				</span>

         <div class="wrap-input100">
           <center><label class="label-inputx">SELECT YEAR AND SEMESTER CYCLE</label><br>
           <label class="label-inputx text-primary"><?= $display_alert ?></label>
         </center>
         </div>

         <div class="wrap-input100 bg2 rs1-wrap-input100">
 					<span class="label-input100 ">Year</span>
 					<input class="input100" type="text" name="year" placeholder="Enter Year YYYY">
 				</div>

 						<div class='wrap-input100 input100-select rs1-wrap-input100 bg2 validate-input' data-validate='Please Fill Field'>
 							<span class='label-input100'>Select Semester</span>
 							<div>
 								<select class='js-select2' name="sem" required>
 									<option selected disabled value=''>Choose Semester</option>
                  <option value='0'>EVEN SEMESTER</option>
                  <option value='1'>ODD SEMESTER</option>
 								</select>
 								<div class='dropDownSelect2'></div>
 						</div>
 					</div>

         <div class="container-contact100-form-btn">
 					<button type="submit" class="contact100-form-btn" name="summary_fb">
 						<span>
 							Create Summary
 							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
 						</span>
 					</button>
 				</div>

 			</form>
 <div class="container-contact100-form-btn">
   <a href="output.php" class="contact100-form-btn">
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
