<?php require($_SERVER['DOCUMENT_ROOT']."/FeedbackNew/dbconnect.php");

require('Output/FPDF/fpdf.php');

if(empty($_SESSION['admin'])){
  header('location: index.php');
}

$display_alert = "";
function backup_tables($tables,$db,$name,$file_name)
{


	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

  $return  = '';

	//cycle through
	foreach($tables as $table)
	{
    $q = 'SELECT * FROM '.$table;
    // echo $db;
    $result = mysqli_query($db, $q);
		// $result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);

		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($db, 'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";

    $colname_query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$table'";
    $col = mysqli_query($db, $colname_query);

    $col_name = [];

    while($row = mysqli_fetch_assoc($col)){
  	  // echo $row['COLUMN_NAME'];
      array_push($col_name, $row['COLUMN_NAME']);
  	  // echo '<br>';
  	}

    $cnt = 0;

		for ($i = 0; $i < $num_fields; $i++)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j < count($col_name); $j++)
				{
          $k = $col_name[$j];
					$row[$k] = addslashes($row[$k]);
					// $row[$k] = ereg_replace("\n","\\n",$row[$k]);
					if (isset($row[$k])) { $return.= '"'.$row[$k].'"' ; } else { $return.= '""'; }
					if ($k < ($num_fields-1)) { $return.= ','; }
				}
        $cnt++;
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}


	$handle = fopen('Backup/'.$file_name.'_'.$name.'-'.$cnt.'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}
if(isset($_POST['backup_local'])){
  $name = mysqli_real_escape_string($db, $_POST['name']);
  // $tables = array('feedback_temp', 'feedback_inst_temp');
  backup_tables('feedback_temp',$db,$name,'feedback_local');
  $display_alert = "LOCAL BACKUP CREATED...";
  // header('location: backup.php');
}

if(isset($_POST['backup_global'])){
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $tables = array('feedback', 'feedback_temp', 'feedback_count', 'feedback_ques', 'subject', 'teacher', 'semester');
  // $tables = array('feedback', 'feedback_temp', 'feedback_count', 'feedback_inst', 'feedback_inst_temp', 'feedback_ques', 'subject', 'teacher', 'semester');
  backup_tables($tables,$db,$name,'feedback_global');
  $display_alert = "GLOBAL BACKUP CREATED...";
  // header('location: backup.php');
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
 			<form class="contact100-form validate-form" action="backup.php" method="POST" enctype="multipart/form-data">
 				<span class="contact100-form-title">
 					CREATE Backup
 				</span>

         <div class="wrap-input100">
           <center><label class="label-inputx text-uppercase">Rename File</label><br>
           <label class="label-inputx text-primary"><?= $display_alert ?></label>
         </center>
         </div>

         <div class="wrap-input100 bg2 wrap-input100">
 					<span class="label-input100 ">File Name</span>
 					<input class="input100" type="text" name="name" placeholder="Name">
 				</div>

         <div class="container-contact100-form-btn">
 					<button type="submit" class="contact100-form-btn" name="backup_local">
 						<span>
 							Create Local Backup
 							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
 						</span>
 					</button>
 				</div>

        <div class="container-contact100-form-btn">
         <button type="submit" class="contact100-form-btn" name="backup_global">
           <span>
             Create Global Backup
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
