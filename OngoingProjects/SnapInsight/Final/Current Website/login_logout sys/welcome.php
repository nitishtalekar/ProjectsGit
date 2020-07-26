<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "";
} else {
    header("Location:https://snapinsight.net/public/users/index.php");
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
    <title>Welcome to Snapinsight </title>

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
                        <h1 class="form-title">Welcome <?php echo $_SESSION['name'];?>, 
                        <form method="POST" action="logout.php">
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Logout"/>
                            </div>
                        </form>
                        <form method="POST" action="change_password.php">
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Change Password"/>
                            </div>
                        </form>
                        <form method="POST" action="myinterest.php">
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="My Profile"/>
                            </div>
                        </form>
                        <form method="POST" action="interest.php">
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Set My Preferences"/>
                            </div>
                        </form>
                        <form method="POST" action="https://snapinsight.net/public/t3d/personalised.php">
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="My Personalised Feed"/>
                            </div>
                        </form>
                      <form method="POST" action="https://snapinsight.net/public/t3d/index.php">
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Generalised Feed"/>
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
    <?php include '../shortcuts/footer.html'; ?>
 <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="https://snapinsight.net/public/js/jquery.min.js"></script>
        <script type="text/javascript" src="https://snapinsight.net/public/js/plugins.js"></script>
        <script type="text/javascript" src="https://snapinsight.net/public/js/scripts.js"></script>
</body>
</html>