<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $usermail=$_SESSION['email_id'];
} else {
    header("Location:https://snapinsight.net/users/index.php");
}

?>

<!DOCTYPE HTML>
<html lang="en">
     <?php include '../shortcuts/navbar.html';
       include '../shortcuts/sidebar.html';
        
      ?>
           <style>
           *, *:before, *:after {
  box-sizing: border-box;
}

* {
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

*:focus {
  outline: none !important;
}



input, textarea, button {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border: 0;
  font-family: "brandon-grotesque", "Brandon Grotesque", "Source Sans Pro", "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
  resize: none;
}

a, button, input[type="submit"] {
  cursor: pointer;
}

::-moz-selection {
  background: rgba(205, 144, 139, 0.2);
}

::selection {
  background: rgba(205, 144, 139, 0.2);
}


#settings {
  opacity: 0;
  -webkit-transform-origin: center top;
          transform-origin: center top;
  will-change: opacity, transform;
  -webkit-animation: rotateIn 1000ms cubic-bezier(0.215, 0.61, 0.355, 1) 500ms forwards;
          animation: rotateIn 1000ms cubic-bezier(0.215, 0.61, 0.355, 1) 500ms forwards;
  position: relative;
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
          flex-flow: row wrap;
  background: white;
  box-shadow: 0 0 20px rgba(21, 21, 29, 0.2);
  overflow: hidden;
  color: #3f4159;
  border-radius: 2px;
  width: 100%;
  max-width: 800px;
  height: 100%;
}
@media only screen and (min-width: 500px) {
  #settings {
    max-height: 420px;
  }
}

span.nav {
  -webkit-transition: all 150ms ease-out;
  transition: all 150ms ease-out;
  flex-basis: 25%;
  display: block;
  position: relative;
  width: 100%;
  padding: 18px 0;
  text-align: center;
}
span.nav:nth-of-type(1) {
  z-index: 5;
}
span.nav:nth-of-type(2) {
  z-index: 4;
}
span.nav:nth-of-type(3) {
  z-index: 3;
}
span.nav:nth-of-type(4) {
  z-index: 2;
}
span.nav:nth-of-type(5) {
  z-index: 1;
}
span.nav:after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  right: -1px;
  width: 0px;
  height: 100%;
  background: #f3e3e2;
}
span.nav:last-of-type:after {
  display: none;
}

input.nav {
  cursor: pointer;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  opacity: 0;
  position: absolute;
  z-index: 6;
  top: 0;
  width: 25%;
  height: 53px;
}
input.nav:hover + span, input.nav:focus + span {
  background: #f3e3e2;
}
input.nav:active + span, input.nav:checked + span {
  background: #866972;
  color: white;
}
input.nav:active + span {
  -webkit-transition: all 150ms ease-in;
  transition: all 150ms ease-in;
}
input.nav ~ main section {
  -webkit-transition: all 450ms ease-out;
  transition: all 450ms ease-out;
  -webkit-transform: translateY(50%) translateZ(0);
          transform: translateY(50%) translateZ(0);
  opacity: 0;
  z-index: -1;
}
input.nav:nth-of-type(1) {
  left: 0%;
}
input.nav:nth-of-type(1):checked ~ main section:nth-of-type(1) {
  -webkit-transform: translateY(0) translateZ(0);
          transform: translateY(0) translateZ(0);
  opacity: 1;
  z-index: 10;
}
input.nav:nth-of-type(2) {
  left: 25%;
}
input.nav:nth-of-type(2):checked ~ main section:nth-of-type(2) {
  -webkit-transform: translateY(0) translateZ(0);
          transform: translateY(0) translateZ(0);
  opacity: 1;
  z-index: 10;
}
input.nav:nth-of-type(3) {
  left: 50%;
}
input.nav:nth-of-type(3):checked ~ main section:nth-of-type(3) {
  -webkit-transform: translateY(0) translateZ(0);
          transform: translateY(0) translateZ(0);
  opacity: 1;
  z-index: 10;
}
input.nav:nth-of-type(4) {
  left: 75%;
}
input.nav:nth-of-type(4):checked ~ main section:nth-of-type(4) {
  -webkit-transform: translateY(0) translateZ(0);
          transform: translateY(0) translateZ(0);
  opacity: 1;
  z-index: 10;
}
input.nav:nth-of-type(5) {
  left: 100%;
}
input.nav:nth-of-type(5):checked ~ main section:nth-of-type(5) {
  -webkit-transform: translateY(0) translateZ(0);
          transform: translateY(0) translateZ(0);
  opacity: 1;
  z-index: 10;
}

main {
  align-self: flex-end;
  position: relative;
  border-top: 2px solid #f3e3e2;
  width: 100%;
  height: calc(100% - 52px);
}

section {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow:scroll;
  background: white;
  will-change: transform, opacity;
}
section ul {
  display: -webkit-box;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
          flex-flow: row wrap;
  padding: 12px;
}
section ul li {
  opacity: 0;
  -webkit-transform: translateY(100%) translateZ(0);
          transform: translateY(100%) translateZ(0);
  will-change: transform, opacity;
  -webkit-animation: slideInUp 600ms cubic-bezier(0.215, 0.61, 0.355, 1) forwards;
          animation: slideInUp 600ms cubic-bezier(0.215, 0.61, 0.355, 1) forwards;
  padding: 6px 12px;
  width: 50%;
}
section ul li:nth-child(1) {
  -webkit-animation-delay: 700ms;
          animation-delay: 700ms;
}
section ul li:nth-child(2) {
  -webkit-animation-delay: 800ms;
          animation-delay: 800ms;
}
section ul li:nth-child(3) {
  -webkit-animation-delay: 900ms;
          animation-delay: 900ms;
}
section ul li:nth-child(4) {
  -webkit-animation-delay: 1000ms;
          animation-delay: 1000ms;
}
section ul li:nth-child(5) {
  -webkit-animation-delay: 1100ms;
          animation-delay: 1100ms;
}
section ul li:nth-child(6) {
  -webkit-animation-delay: 1200ms;
          animation-delay: 1200ms;
}
section ul li:nth-child(7) {
  -webkit-animation-delay: 1300ms;
          animation-delay: 1300ms;
}
section ul li.large {
  width: 100%;
}
section ul li.padding {
  padding: 12px;
}
section.upcoming {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  align-content: center;
  -webkit-box-pack: center;
          justify-content: center;
  text-align: center;
}
section.upcoming h1 {
  font-size: 32px;
  color: #cccccc;
}

.avatar {
  display: -webkit-box;
  display: flex;
}
.avatar > span {
  display: block;
  width: 72px;
  height: 72px;
  background-position: center center;
  background-size: cover;
  border-radius: 2px;
}
.avatar > div {
  padding-left: 24px;
}
.avatar > div .material-button {
  margin-top: 13px;
}

.material {
  width: 100%;
}
.material div {
  position: relative;
  width: 100%;
  padding-top: 18px;
}
.material label {
  -webkit-transition: all 150ms ease-out;
  transition: all 150ms ease-out;
  will-change: transform;
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
  display: block;
  position: absolute;
  z-index: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  padding-bottom: 4px;
  font-weight: 500;
  color: #cd908b;
  line-height: 1.5;
}
.material hr {
  display: block;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  border: 0;
  border-radius: 4px;
  margin: 0;
  background: #ebebeb;
}
.material hr:after {
  -webkit-transition: all 150ms ease-out;
  transition: all 150ms ease-out;
  -webkit-transform: scaleX(0) translateZ(0);
          transform: scaleX(0) translateZ(0);
  -webkit-transform-origin: left top;
          transform-origin: left top;
  will-change: transform;
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 4px;
  background: #cd908b;
}
.material input {
  display: block;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  position: relative;
  z-index: 1;
  padding: 0 0 4px;
  margin: 0;
  width: 100%;
  background: none;
  color: #3f4159;
  font-size: 16px;
  line-height: 1.5;
}
.material input:focus + label, .material input:valid + label {
  -webkit-transform: translateY(-24px) translateZ(0);
          transform: translateY(-24px) translateZ(0);
  font-size: 12px;
}
.material input:focus ~ hr:after {
  -webkit-transform: scaleX(1) translateZ(0);
          transform: scaleX(1) translateZ(0);
}

.material-checkbox div {
  position: relative;
}
.material-checkbox .check {
  z-index: 0;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  align-content: center;
}
.material-checkbox span {
  display: block;
  width: 24px;
  height: 24px;
  border-radius: 2px;
  background: #ebebeb;
}
.material-checkbox svg {
  display: block;
  width: 100%;
  height: 100%;
}
.material-checkbox line {
  fill: none;
  stroke: rgba(255, 255, 255, 0.5);
  stroke-width: 2px;
  stroke-linecap: round;
}
.material-checkbox g:last-child line {
  stroke: white;
  opacity: 0;
}
.material-checkbox g:last-child line:first-child {
  -webkit-transition: stroke-dashoffset 100ms ease-out;
  transition: stroke-dashoffset 100ms ease-out;
  stroke-dasharray: 6.708;
  stroke-dashoffset: 6.708;
}
.material-checkbox g:last-child line:last-child {
  -webkit-transition: stroke-dashoffset 200ms ease-out 100ms;
  transition: stroke-dashoffset 200ms ease-out 100ms;
  stroke-dasharray: 14.873;
  stroke-dashoffset: 14.873;
}
.material-checkbox label {
  margin-left: 6px;
}
.material-checkbox input {
  cursor: pointer;
  opacity: 0;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  display: block;
  position: absolute;
  z-index: 1;
  width: 100%;
  height: 100%;
}
.material-checkbox input:checked + div span {
  background: #cd908b;
}
.material-checkbox input:checked + div g:last-child line {
  opacity: 1;
}
.material-checkbox input:checked + div g:last-child line:first-child {
  stroke-dashoffset: 0;
}
.material-checkbox input:checked + div g:last-child line:last-child {
  stroke-dashoffset: 0;
}

.material-button {
  width: 100%;
}
.material-button div {
  width: 100%;
}
.material-button button, .material-button input[type="submit"] {
  margin: 0;
  border: 0;
  border-radius: 2px;
  padding: 6px 12px;
  background: #ebebeb;
  color: #3f4159;
  font-size: 16px;
  -webkit-transition: all 150ms ease-out;
  transition: all 150ms ease-out;
}
.material-button button:hover, .material-button button:focus, .material-button input[type="submit"]:hover, .material-button input[type="submit"]:focus {
  background: #cd908b;
  color: white;
}
.material-button button:active, .material-button input[type="submit"]:active {
  -webkit-transition: all 150ms ease-in;
  transition: all 150ms ease-in;
  background: #3f4159;
}
.material-button button.save, .material-button input[type="submit"].save {
  width: 100%;
  max-width: 256px;
  padding: 12px 24px;
  background: #866972;
  color: white;
  font-size: 18px;
}
.material-button button.save:hover, .material-button button.save:focus, .material-button input[type="submit"].save:hover, .material-button input[type="submit"].save:focus {
  background: #cd908b;
}
.material-button button.save:active, .material-button input[type="submit"].save:active {
  background: #3f4159;
}
@media only screen and (max-height: 444px) {
  .material-button button.save, .material-button input[type="submit"].save {
    display: none;
  }
}
.material-button button.connect, .material-button input[type="submit"].connect {
  display: block;
  width: 100%;
  border-radius: 1000px;
  color: white;
}
.material-button button.gh, .material-button input[type="submit"].gh {
  background: #4183c4;
}
.material-button button.gh:hover, .material-button button.gh:focus, .material-button input[type="submit"].gh:hover, .material-button input[type="submit"].gh:focus {
  background: #7ba9d6;
}
.material-button button.gh.connected, .material-button input[type="submit"].gh.connected {
  background: #ebebeb;
  color: #343434;
}
.material-button button.gh.connected:hover, .material-button button.gh.connected:focus, .material-button input[type="submit"].gh.connected:hover, .material-button input[type="submit"].gh.connected:focus {
  background: #4183c4;
  color: white;
}
.material-button button.gh:active, .material-button input[type="submit"].gh:active {
  background: #2c5d8d !important;
}
.material-button button.tw, .material-button input[type="submit"].tw {
  background: #2daae1;
}
.material-button button.tw:hover, .material-button button.tw:focus, .material-button input[type="submit"].tw:hover, .material-button input[type="submit"].tw:focus {
  background: #70c5eb;
}
.material-button button.tw.connected, .material-button input[type="submit"].tw.connected {
  background: #ebebeb;
  color: #343434;
}
.material-button button.tw.connected:hover, .material-button button.tw.connected:focus, .material-button input[type="submit"].tw.connected:hover, .material-button input[type="submit"].tw.connected:focus {
  background: #2daae1;
  color: white;
}
.material-button button.tw:active, .material-button input[type="submit"].tw:active {
  background: #187da9 !important;
}
.material-button button.fb, .material-button input[type="submit"].fb {
  background: #3b5997;
}
.material-button button.fb:hover, .material-button button.fb:focus, .material-button input[type="submit"].fb:hover, .material-button input[type="submit"].fb:focus {
  background: #5e7ec0;
}
.material-button button.fb.connected, .material-button input[type="submit"].fb.connected {
  background: #ebebeb;
  color: #343434;
}
.material-button button.fb.connected:hover, .material-button button.fb.connected:focus, .material-button input[type="submit"].fb.connected:hover, .material-button input[type="submit"].fb.connected:focus {
  background: #3b5997;
  color: white;
}
.material-button button.fb:active, .material-button input[type="submit"].fb:active {
  background: #263960 !important;
}
.material-button button.li, .material-button input[type="submit"].li {
  background: #069;
}
.material-button button.li:hover, .material-button button.li:focus, .material-button input[type="submit"].li:hover, .material-button input[type="submit"].li:focus {
  background: #0099e6;
}
.material-button button.li.connected, .material-button input[type="submit"].li.connected {
  background: #ebebeb;
  color: #343434;
}
.material-button button.li.connected:hover, .material-button button.li.connected:focus, .material-button input[type="submit"].li.connected:hover, .material-button input[type="submit"].li.connected:focus {
  background: #069;
  color: white;
}
.material-button button.li:active, .material-button input[type="submit"].li:active {
  background: #00334d !important;
}
.material-button.center div {
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
          justify-content: center;
}

@-webkit-keyframes rotateIn {
  0% {
    opacity: 0;
    -webkit-transform: rotateX(30deg) rotateY(30deg) translateY(300px) translateZ(200px);
            transform: rotateX(30deg) rotateY(30deg) translateY(300px) translateZ(200px);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
            transform: none;
  }
}

@keyframes rotateIn {
  0% {
    opacity: 0;
    -webkit-transform: rotateX(30deg) rotateY(30deg) translateY(300px) translateZ(200px);
            transform: rotateX(30deg) rotateY(30deg) translateY(300px) translateZ(200px);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
            transform: none;
  }
}
@-webkit-keyframes slideInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(100%) translateZ(0);
            transform: translateY(100%) translateZ(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
            transform: none;
  }
}
@keyframes slideInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(100%) translateZ(0);
            transform: translateY(100%) translateZ(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
            transform: none;
  }
}

input, textarea, button {
    -webkit-appearance: none;
    -webkit-font-smoothing: antialiased;
    resize: none;
}
input[type="radio"]{
    -webkit-appearance: radio;
}
           </style>
           <body>
           <br><br><br><br>
           <?php 
           require '../t3d/config.php';
           $sql = "SELECT * FROM user
		    WHERE email_id= '$usermail' ;";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result))
			{       
			        $name = $row['name'];
			        $phone = $row['phone'];
				$foodcuisine = $row['food_cuisine'];
				$fooddeter = $row['food_deter'];
				$foodmeal = $row['food_meal'];
				$appgenre = $row['app_genre'];
				$appgenre1 = $row['app_genre1'];
				$appgenre2 = $row['app_genre2'];
				$topic = $row['topic'];
				$topic2 = $row['topic2'];
				$topic3 = $row['topic3'];
				$topic4 = $row['topic4'];
				$topic5 = $row['topic5'];
			}	
           
           ?>
            <br><br><br><br><br><br>
          
  <div id='settings' ontouchstart>
  <input checked class='nav' name='nav' type='radio'>
  <span class='nav'>Profile</span>
  <input class='nav' name='nav' type='radio'>
  <span class='nav'>My Preferences</span>
  <input class='nav' name='nav' type='radio'>
  <span class='nav'>More</span>
  <main class='content'>
    <section id='profile'>
      <form>
        <ul>
         
          <li>
            <fieldset class='material'>
              <div>
                <input name="name"  required type='text' value='<?php echo $name; ?>'>
                <label>Name</label>
                <hr>
              </div>
            </fieldset>
          </li>
          
          <li>
            <fieldset class='material'>
              <div>
                <input name="mobile" required type='text' value='<?php echo $phone; ?>'>
                <label>Mobile Number</label>
                <hr>
              </div>
            </fieldset>
          </li>
         
          <li>
            <fieldset class='material'>
              <div>
                <input name="email" required type='text' value='<?php echo $usermail; ?>'>
                <label>Email</label>
                <hr>
              </div>
            </fieldset>
          </li>
          
          <li class='large padding'>
            <fieldset class='material-button center'>
              <div>
                <input class='save' type='submit' value='Save'>
              </div>
            </fieldset>
          </li>
        </ul>
      </form>
    </section>
    <section id='preferences'>
      <h2> Your food preferences </h2>
 					
 						
 						<li><?php echo $foodcuisine; ?><br/></li>
 						<li><?php echo $fooddeter; ?><br/></li>
 						<li><?php echo $foodmeal; ?><br/></li>			
 				
 						
       
         <h2> Your app preferences </h2>
 					
						<li><?php echo $appgenre; ?><br/></li>
 						<li><?php echo $appgenre1; ?><br/></li>
 						<li><?php echo $appgenre2; ?><br/></li>
        
    <h2> Your prefered topics of interest</h2>
 					
 						<li><?php echo $topic; ?><br/></li>
 						<li><?php echo $topic2; ?><br/></li>
 						<li><?php echo $topic3; ?><br/></li>
 						<li><?php echo $topic4; ?><br/></li>
 						<li><?php echo $topic5; ?><br/></li>
      <footer class="min-footer fl-wrap content-animvisible">
                            <div class="container small-container">
                                <div class="footer-inner fl-wrap">
                                     <a href="https://snapinsight.net/users/interest.php" class="to-top-btn">Change<i class="fal fa-long-arrow-up"></i></a>
                                </div>
                            </div>
                        </footer>
    </section>
    <section class='upcoming' id='more'>
      <h1>Coming&nbsp;soon!</h1>
    </section>
    <section class='upcoming' id='advanced'>
      <h1>Coming&nbsp;soon!</h1>
    </section>
  </main>
</div>
		 
 						
 					
 				          
 						<script>
 						function myFunction() {
window.alert("A few Key Points,\n1- Press the submit button availabe at the end of each question once you have selected your options. \n2- You can set or update any or all preference as you like. \n3- You can leave a few preferences blank if you wish(not recommended.Fill all for best result). \n4-Look at your preferences in the My Profile Tab in. the menu\n Have Fun!!");
}
</script>		
	<?php 
	 require 'dbconfig.php';
			
if (isset($_POST['submit']))
{

  
  if(!empty($_POST['fooddeter'])){
         $fooddeter = $_POST['fooddeter'];
         $sql = "UPDATE user
 	         SET food_deter =('$fooddeter')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
  if(!empty($_POST['foodcuisine'])){
         $foodcuisine = $_POST['foodcuisine'];
         $sql = "UPDATE user
 	         SET food_cuisine =('$foodcuisine')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
      
      if(!empty($_POST['foodtaste'])){
         $foodtaste = $_POST['foodtaste'];
         $sql = "UPDATE user
 	         SET food_taste =('$foodtaste')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['foodmeal'])){
         $foodmeal = $_POST['foodmeal'];
         $sql = "UPDATE user
 	         SET food_meal =('$foodmeal')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['appgenre'])){
         $appgenre = $_POST['appgenre'];
         $sql = "UPDATE user
 	         SET app_genre =('$appgenre')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['appgenre1'])){
         $appgenre1 = $_POST['appgenre1'];
         $sql = "UPDATE user
 	         SET app_genre1 =('$appgenre1')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['appgenre2'])){
         $appgenre2 = $_POST['appgenre2'];
         $sql = "UPDATE user
 	         SET app_genre2 =('$appgenre2')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['topic'])){
         $topic = $_POST['topic'];
         $sql = "UPDATE user
 	         SET topic =('$topic')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['topic2'])){
         $topic2 = $_POST['topic2'];
         $sql = "UPDATE user
 	         SET topic2 =('$topic2')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['topic3'])){
         $topic3 = $_POST['topic3'];
         $sql = "UPDATE user
 	         SET topic3 =('$topic3')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['topic4'])){
         $topic4 = $_POST['topic4'];
         $sql = "UPDATE user
 	         SET topic4 =('$topic4')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
     
     if(!empty($_POST['topic5'])){
         $topic5 = $_POST['topic5'];
         $sql = "UPDATE user
 	         SET topic5 =('$topic5')
 	         WHERE email_id= '$usermail' ";
                 if ($conn->query($sql) === TRUE){
                    echo ""; 
                    }
                 else {
                     echo "Error updating record: " . $conn->error;
                    }   
     }
 
 
  

	}

 
	
	
	
	
	
	?>	 			
       
 <?php include '../shortcuts/footer.html'; ?>
 <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="https://snapinsight.net/js/jquery.min.js"></script>
        <script type="text/javascript" src="https://snapinsight.net/js/plugins.js"></script>
        <script type="text/javascript" src="https://snapinsight.net/js/scripts.js"></script>       



    </body>
</html>