<?php
include("config/database.php");
if($_POST['forget_submit']){
    require 'mailer/src/Exception.php';
    require 'mailer/src/PHPMailer.php';
    require 'mailer/src/SMTP.php';
    $email_id=$_POST['email_id'];
	$subject ="Forgot Password !";
	$to=$email_id;
	$rs=mysqli_query($conn,"select * from mst_employees where emp_email='$email_id'");
	$row=mysqli_fetch_array($rs);
	if(mysqli_num_rows($rs)>0){
	    $password=$row['emp_psw'];
	    $message="Your forgot password is: $password";
	        PhpMail($to,$message,$subject);
			echo "<script>alert('Mail Sent Successfully ! Check The mail');</script>";
	}
	else{ 
		$rs=mysqli_query($conn,"select * from mst_admin where email='$email_id'");
		$row=mysqli_fetch_array($rs);
		if(mysqli_num_rows($rs)>0){
		   if(PhpMail($to,$message,$subject)==1){
				echo "<script>alert('Mail Sent Successfully ! Check The mail');</script>";
			}
		}
		else{
		    echo "<script>alert('Email ID not Exists !');</script>";
		}
	}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Enter Email Id!</h1>
                  </div>
						<?php
						  if(isset($found))
						  {
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong> Invalid Email ID !
							</div>
						<?php
							}
						?>
						<?php
						if(isset($message))
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> Your password sent successfully to your  email ID !
							</div>
						<?php
							}
						?>
					<br>
					<form class="user" id="admin_section" method="post" action="" > 
						<div class="form-group">
						  <input type="text" class="form-control form-control-user" name="email_id"  placeholder="Enter Email Id" required>
						</div>
						
						<input type="submit" class="btn btn-primary btn-user btn-block" value="Submit" name="forget_submit">
						
                    </form>
					<hr>
				    <div class="text-center">
                    <a class="small" href="index.php">Login Here!</a>
                   
                  </div>
                  <!--<div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>-->
                  
                </div>
              </div>
            </div>
          </div>
        </div>
		</div>
    </div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
$(document).ready(function(){
  $("#admin").click(function(){
    $("#admin_section").show();
	$("#user_section").hide();
  });
  $("#user").click(function(){
    $("#user_section").show();
	$("#admin_section").hide();
  });
});
</script>
</body>

</html>
