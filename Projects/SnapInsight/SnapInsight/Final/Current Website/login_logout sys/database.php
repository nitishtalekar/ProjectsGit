<?php
$url='localhost';
$username='snapinsi_sData';
$password='kysam-sopos2-1nixy10';
$dbname = "snapinsi_snapData";
$conn=mysqli_connect($url,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function PhpMail($to,$message,$subject){
    $mail = new PHPMailer(true);
    try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->isSMTP();
            $mail->Host = 'localhost';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false; 
            $mail->Port = 25;                                   // TCP port to connect to

			//Recipients
			$mail->setFrom('admin@studentstutorial.com', 'Login System');
			
				$to_mail=$to;
				$mail->addAddress($to_mail); 
				// Add a recipient
			
			$mail->addReplyTo('admin@studentstutorial.com', 'Login System');
			$mail->setFrom('admin@studentstutorial.com', 'Employee Management System');
			
			//$mail->addCC($cc_mail);
			//$mail->addBCC('niranjan@weavertec.com');
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body =$message;
			$mail->send();
		    $message=1;
			
		} catch (Exception $e) {
			echo 'Mail could not be sent. Mailer Error: ', $mail->ErrorInfo;
			$message=0;
		}
		return $message;

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>