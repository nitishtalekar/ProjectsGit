<?php
include_once 'database.php';
if($_POST['forget_submit']){
    require 'mailer/src/Exception.php';
    require 'mailer/src/PHPMailer.php';
    require 'mailer/src/SMTP.php';
    $email_id=$_POST['email_id'];
	$subject ="Forgot Password !";
	$to=$email_id;
	$rs=mysqli_query($conn,"select * from user where email_id='$email_id'");
	$row=mysqli_fetch_array($rs);
	if(mysqli_num_rows($rs)>0){
	    $password=$row['password'];
	    $message="Your forgot password is: $password";
	        PhpMail($to,$message,$subject);
			echo "<script>alert('Mail Sent Successfully ! Check The mail');</script>";
	}
	
}
?>