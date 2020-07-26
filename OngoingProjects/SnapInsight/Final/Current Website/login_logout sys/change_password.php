<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $usermail=$_SESSION['email_id'];
} else {
    header("Location:https://snapinsight.net/public/users/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

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
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        
                    </div>
                    
                    <div class="signin-form">
                        <h1 class="form-title">Welcome <?php echo $_SESSION['name'];?>, <a href="logout.php">Logout</a></h1>
						<h3><a href="welcome.php">Home</a></h3>
						<h3>Change Password</h3>
						<?php
					if(count($_GET)>0){
						if($_GET['status']==200){
							echo "<span style='color:green;text-align:center;'>Password changed successfully !</span>";
						}
						if($_GET['status']==201){
							echo "<span style='color:red;text-align:center;'>Invalid Old password  !</span>";
						}
					}
					?>
                        <form method="POST" class="register-form" id="register-form" action="change_password_a.php">
						   
                            
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="old_pass" id="old_pass" placeholder="Old Password"  required />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="new_pass" id="new_pass" placeholder="New password"  required />
								<span id="CheckPasswordMatch" style="color:red;"></span>
                            </div>
							<span><i class="zmdi zmdi-eye" id="show_password"></i>Show Password</span>
							
                            <div class="form-group form-button">
                                <input type="submit" name="change_pass" id="signup" class="form-submit" value="Change Password"/>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>