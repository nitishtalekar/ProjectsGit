<?php
session_start();
include("database.php");
extract($_POST);
if(isset($signin))
{
	$pass=md5($pass);
	$check=mysqli_query($conn,"select * from user where email_id='$email_id' and password='$pass'");
	$row = mysqli_fetch_array($check);
	if(mysqli_num_rows($check)>0)
	{
		$_SESSION["email_id"]=$email_id;
		$_SESSION["user_id"]=$row['user_id'];
		$_SESSION["name"]=$row['name'];
	}
	else
	{
		$message="Invalid Credentials !";
		
	}
}
if (isset($_SESSION["user_id"]))
{
	header("Location: welcome.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../shortcuts/navbar.html';
       include '../shortcuts/sidebar.html';
        
      ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

   

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
     <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                       
                        <a href="signup.php" class="signup-image-link">Create an account</a>
						<a href="forget.php" class="signup-image-link">Forget Password</a>
                    </div>
                    
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
						<?php
					if(count($_GET)>0){
						echo "<span style='color:green;text-align:center;'>Signup Success ! Please Login to Continue.</span>";
					}
					?>
					<?php
					if(isset($message)){
						echo "<span style='color:red;text-align:center;'>$message</span>";
					}
					?>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email_id" id="email_id" placeholder="Email ID" autocomplete="on" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php include '../shortcuts/footer.html'; ?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
     <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="https://snapinsight.net/public/js/jquery.min.js"></script>
        <script type="text/javascript" src="https://snapinsight.net/public/js/plugins.js"></script>
        <script type="text/javascript" src="https://snapinsight.net/public/js/scripts.js"></script>
</body>
</html>