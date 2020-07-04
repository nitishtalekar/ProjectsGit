<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "restaurant";

	$conn = mysqli_connect($servername, $username, $password, $db);
	$messages = array();

	function valid_file($filetoUpload, $target_dir){

		$countfiles = count($_FILES[$filetoUpload]['name']);

		$messages = array();

		for($i=0;$i<$countfiles;$i++){

	    $target_file = $target_dir . basename($_FILES[$filetoUpload]["name"][$i]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	      $check = getimagesize($_FILES[$filetoUpload]["tmp_name"][$i]);

	      if (file_exists($target_file)) {
	          $message =  ' file already exists. Please Rename your file';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Check file size
	      if ($_FILES[$filetoUpload]["size"][$i] > 500000) {
	          $message =  ' your file is too large.';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Allow certain file formats
	      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	      && $imageFileType != "gif" ) {
	          $message =  ' only JPG, JPEG, PNG & GIF files are allowed.';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Check if $uploadOk is set to 0 by an error

			}
			return $uploadOk;

	}

	function add_file($filetoUpload, $target_dir){
		// $target_dir = "";
		$countfiles = count($_FILES[$filetoUpload]['name']);

		$messages = array();

		for($i=0;$i<$countfiles;$i++){

	    $target_file = $target_dir . basename($_FILES[$filetoUpload]["name"][$i]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	      $check = getimagesize($_FILES[$filetoUpload]["tmp_name"][$i]);

	      if (file_exists($target_file)) {
	          $message =  ' file already exists. Please Rename your file';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Check file size
	      if ($_FILES[$filetoUpload]["size"][$i] > 500000) {
	          $message =  ' your file is too large.';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Allow certain file formats
	      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	      && $imageFileType != "gif" ) {
	          $message =  ' only JPG, JPEG, PNG & GIF files are allowed.';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Check if $uploadOk is set to 0 by an error
	      if ($uploadOk == 0) {
	          $message =  ' your file was not uploaded.';
	          array_push($messages,$message);
	      // if everything is ok, try to upload file
	      } else {
	          if (move_uploaded_file($_FILES[$filetoUpload]["tmp_name"][$i], $target_file)) {
	              // $message =  '<label class="text-uppercase" style="color:green" >'.'The file "'. basename( $_FILES[$filetoUpload]["name"][$i]). '" has been uploaded.'.'</label><br>';
	              // array_push($messages,$message);
	              $tar = explode("/",$target_file);
	              $x = array_slice($tar, -3);
	              $x2 = join("/",$x);
	              // $new_target = $_SERVER['DOCUMENT_ROOT']."/Shreejit/".$x2;
	              $new_target = "/Shreejit/".$x2;
	              // $qu = "INSERT INTO images (image_path) VALUES ('$new_target')";
	              // mysqli_query($db, $qu);
	          } else {
	              $message =  ' there was an error uploading your file.';
	              array_push($messages,$message);
	          }
	      }
	  }
	}

	if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
		$owner_name = mysqli_real_escape_string($conn, $_POST['owner_name']);
		$poc = mysqli_real_escape_string($conn, $_POST['poc']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$landmark = mysqli_real_escape_string($conn, $_POST['landmark']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$website = mysqli_real_escape_string($conn, $_POST['website']);
		$pay1 = $_POST['pay'];
		$pay2 = "";
		foreach ($pay1 as $color){
				$pay2 = $pay2 . $color . ";";
		}
		$pay = substr($pay2, 0, -1);
		$alcohol = mysqli_real_escape_string($conn, $_POST['alcohol']);
		$cuisine = mysqli_real_escape_string($conn, $_POST['cuisine']);
		$service1 = $_POST['service'];
		$service2 = "";
		foreach ($service1 as $color){
				$service2 = $service2 . $color . ";";
		}
		$service = substr($service2, 0, -1);
		$offer1 = $_POST['offer'];
		$offer2 = "";
		foreach ($offer1 as $color){
				$offer2 = $offer2 . $color . ";";
		}
		$offer = substr($offer2, 0, -1);
		$liscence = mysqli_real_escape_string($conn, $_POST['liscence']);
		$regno = mysqli_real_escape_string($conn, $_POST['regno']);
		$addr = mysqli_real_escape_string($conn, $_POST['addr']);
		$exp = mysqli_real_escape_string($conn, $_POST['exp']);
		$outlets = mysqli_real_escape_string($conn, $_POST['outlets']);
		$avg_cost = mysqli_real_escape_string($conn, $_POST['avg_cost']);
		$primary_area = mysqli_real_escape_string($conn, $_POST['primary_area']);
		$path = "file/" . $name . '_' . $owner_name;
		$menu1 = $_FILES['menu']['name'];
		$menu2 = "";
		foreach ($menu1 as $key) {
			$menu2 = $menu2.$path."/".$key.";";
		}
		$menu = substr($menu2, 0, -1);


		$img1 = $_FILES['img']['name'];
		$img2 = "";
		foreach ($img1 as $key) {
			$img2 = $img2.$path."/".$key.";";
		}
		$img = substr($img2, 0, -1);


		$kyc1 = $_FILES['kyc']['name'];
		$kyc2 = "";
		foreach ($kyc1 as $key) {
			$kyc2 = $kyc2.$path."/".$key.";";
		}
		$kyc = substr($kyc2, 0, -1);


		$pan1 = $_FILES['pan']['name'];
		$pan2 = "";
		foreach ($pan1 as $key) {
			$pan2 = $pan2.$path."/".$key.";";
		}
		$pan = substr($pan2, 0, -1);


		$gstin1 = $_FILES['gstin']['name'];
		$gstin2 = "";
		foreach ($gstin1 as $key) {
			$gstin2 = $gstin2.$path."/".$key.";";
		}
		$gstin = substr($gstin2, 0, -1);


		$shop_liscence1 = $_FILES['shop_liscence']['name'];
		$shop_liscence2 = "";
		foreach ($shop_liscence1 as $key) {
			$shop_liscence2 = $shop_liscence2.$path."/".$key.";";
		}
		$shop_liscence = substr($shop_liscence2, 0, -1);

		$k = valid_file("menu", $path."/");
		$k = $k + valid_file("img", $path."/");
		$k = $k + valid_file("kyc", $path."/");
		$k = $k + valid_file("pan", $path."/");
		$k = $k + valid_file("gstin", $path."/");
		$k = $k + valid_file("shop_liscence", $path."/");

		if ($k == 6){
			mkdir($path, 0700);

			add_file("menu", $path."/");
			add_file("img", $path."/");
			add_file("kyc", $path."/");
			add_file("pan", $path."/");
			add_file("gstin", $path."/");
			add_file("shop_liscence", $path."/");

			$sql = "INSERT INTO data(name, owner_name, poc, city, address, landmark, email, website, payment, alcohol, cuisine, service, offer, menu, img, fssai_liscence, fssai_regno, fssai_addr, fssai_exp, kyc, pan_card, gstin, shop_liscence, outlets, avg_cost, primary_area) VALUES ";
			$sql = $sql."('$name', '$owner_name', '$poc', '$city', '$address', '$landmark', '$email', '$website', '$pay', '$alcohol', '$cuisine', '$service', '$offer', '$menu', '$img', '$liscence', '$regno', '$addr', '$exp', '$kyc', '$pan', '$gstin', '$shop_liscence', '$outlets', '$avg_cost', '$primary_area')";
			mysqli_query($conn, $sql);

		}


}

$services = array("Breakfast","Lunch","Dinner","Night Life","Cafe");
$offers = array("Live Music","Couple Entry","Free Parking","Above 18 Only","Outdoor Seating","Table Resrvation","Poolside","Catering","Pet Friendly","Private Dining","Smoking Area","Buffet","Board Games");
$documents = array(array("KYC Document","kyc"),array("Pan Card","pan"),array("GSTIN CARD","gstin"),array("Shop Liscence","shop_liscence"));
$images = array(array("Menu Images","menu"),array("Restaurant Pictures","pictures"))
// $doc_names = array()
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="style.css">
    
    <title>Moodish</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">M O O D I S H</a>
    </nav>
    <div class="container-fluid head-container">
      <div class="row d-flex justify-content-center align-items-center title-container">
        <div class="col-12">
          <center>
            <h1 class="title">M O O D I S H</h1>
            <span class="text-white text-uppercase medium">The one stop place for your restaurant growth</span>
          </center>
        </div>
      </div>
      <!-- <img src="bg.jpg" alt="" class="cover-img" > -->
    </div>
    <div class="container-fluid mb-4" style="min-height:50vh;">
      <div class="row">
        <div class="col-12 mt-4">
          <center>
            <h1 class="big text-uppercase" style="letter-spacing:2px;">Simple and fast onboarding process</h1>
          </center>
        </div>
        <div class="col-lg-3 col-6">
          <div class="d-flex justify-content-center align-items-center mt-5 mb-4">
            <div class="d-flex justify-content-center align-items-center steps-cont" style="--color:#3b90f6;">
              <h1 class="large">1</h1>
            </div>
          </div>
          <div class="text-uppercase medium">
          <center>
            Fill the Registration form <br>below 
          </center>  
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="d-flex justify-content-center align-items-center mt-5 mb-4">
            <div class="d-flex justify-content-center align-items-center steps-cont" style="--color:#3076c9;">
              <h1 class="large">2</h1>
            </div>
          </div>
          <div class="text-uppercase medium">
          <center>
            Sign the service <br>agreement  
          </center>  
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="d-flex justify-content-center align-items-center mt-5 mb-4">
            <div class="d-flex justify-content-center align-items-center steps-cont" style="--color:#2861a6;">
              <h1 class="large">3</h1>
            </div>
          </div>
          <div class="text-uppercase medium">
          <center>
            Choose from the set of services <br>(optional)
          </center>  
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="d-flex justify-content-center align-items-center mt-5 mb-4">
            <div class="d-flex justify-content-center align-items-center steps-cont" style="--color:#1a406e;">
              <h1 class="large">4</h1>
            </div>
          </div>
          <div class="text-uppercase medium">
          <center>
            Restaurant is now live within <br>24-48 hrs 
          </center>  
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mb-5 mt-5" style="background:#2861a6;min-height:50vh">
      <div class="row">
        <div class="col-12 mt-4 mb-2">
          <center>
            <h1 class="big text-uppercase text-white" style="letter-spacing:2px;">OUR SERVICES for you</h1>
          </center>
        </div>
      </div>
      <div class="row d-flex justify-content-around align-items-center mt-3 mb-5">
        <div class="col-lg-3 col-6 mb-5">
          <div class="card service-card py-5" style="--color:#ffffff">
          <center>
            <i class="fa fa-shopping-cart large" aria-hidden="true"></i><br><br>
            <span class="medium2 text-uppercase">Marketing</span>
          </center>
        </div>
        </div>
        <div class="col-lg-3 col-6 mb-5">
          <div class="card service-card py-5" style="--color:#ffffff">
          <center>
            <i class="fa fa-camera large" aria-hidden="true"></i><br><br>
            <span class="medium2 text-uppercase">Photography</span>
          </center>
        </div>
        </div>
        <div class="col-lg-3 col-6 mb-5">
          <div class="card service-card py-5" style="--color:#ffffff">
          <center>
            <i class="fa fa-superpowers large" aria-hidden="true"></i><br><br>
            <span class="medium2 text-uppercase">Website Development</span>
          </center>
        </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mb-5">
      <div class="row">
        <div class="col-12 mt-1 mb-2">
          <center>
            <h1 class="big text-uppercase" style="letter-spacing:2px;">Partner with us</h1>
            <hr style="background:#1a406e;width:50%;height:5px;">
          </center>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Name of the Restaurant *</label><br>
            <input type="text" class="input-field" id="name" placeholder="ENTER RESTAURANT NAME" name="name" value=""><br>
            <label class="input-label-error" style="display:none" id="name-err" >Please fill field</label><br>
          </div>
        </div>    
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Name of the Owner *</label><br>
            <input type="text" class="input-field" id="owner_name" placeholder="ENTER NAME" name="owner_name" value=""><br>
            <label class="input-label-error" style="display:none" id="owner_name-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Contact No. *</label><br>
            <input type="text" class="input-field" id="contact" placeholder="ENTER NUMBER" name="contact" value=""><br>
            <label class="input-label-error" style="display:none" id="contact-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Owner Email ID *</label><br>
            <input type="text" class="input-field" id="email" placeholder="ENTER EMAIL" name="email" value=""><br>
            <label class="input-label-error" style="display:none" id="email-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Restaurant City *</label><br>
            <input type="text" class="input-field" id="city" placeholder="ENTER CITY NAME" name="city" value=""><br>
            <label class="input-label-error" style="display:none" id="city-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Address *</label><br>
            <textarea type="text" class="input-field" id="addr" placeholder="ENTER ADDRESS" name="address" value=""></textarea><br>
            <label class="input-label-error" style="display:none" id="addr-err" >Please fill field</label><br>
          </div>
        </div> 
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Restaurant Website *</label><br>
            <input type="text" class="input-field" id="website" placeholder="ENTER WEBSITE" name="website" value=""><br>
            <label class="input-label-error" style="display:none" id="website-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Payment Method *</label><br>
            <input type="text" class="input-field" id="pay" placeholder="ENTER METHOD" name="pay" value=""><br>
            <label class="input-label-error" style="display:none" id="pay-err" >Please fill field</label><br>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12">
          <center>
            <h1 class="mbig">CHARACTERISTICS</h1>
          </center>
        </div>
        <div class="col-lg-6 col-12 mt-1 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <center><label for="" class="input-label-big">Alcohol *</label></center><br>
            <!-- <input type="text" class="input-field" id="website" placeholder="ENTER WEBSITE" name="website" value=""><br> -->
            <div id="alcohol" class="option d-flex justify-content-around align-items-center">
              <div class="mt-1 d-flex align-items-center">
                <input id="alc1" type="radio" name="alcohol[]" value="">
                <label for="alc1" class="char-label">&nbsp;&nbsp; Yes, We serve </label>
              </div>
              <div class="mt-1 d-flex align-items-center">
                <input id="alc2" type="radio" name="alcohol[]" value="">
                <label for="alc2" class="char-label">&nbsp;&nbsp; No, We dont </label>
              </div>
            </div>
            <label class="input-label-error" style="display:none" id="alcohol-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-1 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <center><label for="" class="input-label-big">Cuisine *</label></center><br>
            <div class="input-group mb-3" >
              <select class="custom-select selection" id="inputGroupSelect01" >
                <option selected disabled>Choose Cuisine</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <label class="input-label-error" style="display:none" id="website-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-12 col-12 mt-4 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <center><label for="" class="input-label-big">Services Offered *</label></center><br>
            <div id="services" class="option container-fluid">
              <div class="row d-flex justify-content-around">
                <?php
                for($i=0;$i<count($services);$i++){
                ?>
                <div class="col-lg-4 col-6 mb-4 d-flex justify-content-around">
                  <div class="d-flex align-items-center justify-content-start">
                    <input type="checkbox" id="ser<?=$i?>" name="service[]" value="<?= $services[$i] ?>">
                    <div class="" style="width:100%">
                      <label for="ser<?=$i?>" class="char-label2">&nbsp;&nbsp; <?= $services[$i] ?> </label>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>  
              </div>
            </div>
            <label class="input-label-error" style="display:none" id="alcohol-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-12 col-12 mt-4 d-flex justify-content-center">
          <div class="mb-0 input-container">
            <center><label for="" class="input-label-big">Additional Attributes *</label></center><br>
            <div id="services" class="option container">
              <div class="row">
                <?php
                for($i=0;$i<count($offers);$i++){
                ?>
                <div class="col-lg-6 col-12 mb-3 d-flex justify-content-start">
                  <div class="d-flex align-items-center justify-content-start" style="margin-left:25%">
                    <input type="checkbox" id="off<?=$i?>" name="offer[]" value="<?= $offers[$i] ?>">
                    <div class="" style="width:100%">
                      <label for="off<?=$i?>" class="char-label2">&nbsp;&nbsp; <?= $offers[$i] ?> </label>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>  
              </div>
            </div>
            <label class="input-label-error" style="display:none" id="alcohol-err" >Please fill field</label><br>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12 mb-2">
          <hr style="background:#1a406e;width:20%;height:3px;">
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Number Of Outlets *</label><br>
            <input type="text" class="input-field" id="outlets" placeholder="ENTER NUMBER OF OUTLETS" name="outlets" value=""><br>
            <label class="input-label-error" style="display:none" id="outlets-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Average Cost for 2 *</label><br>
            <input type="text" class="input-field" id="avg_cost" placeholder="ENTER AMOUNT" name="avg_cost" value=""><br>
            <label class="input-label-error" style="display:none" id="avg_cost-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Primary Area of Restaurant *</label><br>
            <input type="text" class="input-field" id="primary" placeholder="ENTER AREA" name="primary" value=""><br>
            <label class="input-label-error" style="display:none" id="primary-err" >Please fill field</label><br>
          </div>
        </div> 
      </div>
      
      <div class="row">
        <div class="col-12">
          <center>
            <h1 class="mbig text-uppercase">FSSAI Certificate</h1>
          </center>
        </div>
        
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Liscence Numner *</label><br>
            <input type="text" class="input-field" id="liscence" placeholder="ENTER NUMBER" name="liscence" value=""><br>
            <label class="input-label-error" style="display:none" id="liscence-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Resigtration No. *</label><br>
            <input type="text" class="input-field" id="regno" placeholder="ENTER NUMBER" name="regno" value=""><br>
            <label class="input-label-error" style="display:none" id="regno-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">Owner Email ID *</label><br>
            <input type="text" class="input-field" id="addr" placeholder="ENTER ADDRESS" name="addr" value=""><br>
            <label class="input-label-error" style="display:none" id="addr-err" >Please fill field</label><br>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3 d-flex justify-content-center">
          <div class="mb-2 input-container">
            <label for="" class="input-label">EXPIRY DATE *</label><br>
            <input type="date" class="input-field text-uppercase" id="exp" placeholder="ENTER DATE" name="exp" value=""><br>
            <label class="input-label-error" style="display:none" id="exp-err" >Please fill field</label><br>
          </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
          <hr style="background:#1a406e;width:50%;height:3px;">
        </div>
        
      </div>
      
      <div class="row">
        <div class="col-12">
          <center>
            <h1 class="mbig text-uppercase">Images</h1>
          </center>
        </div>
        <!-- <div class="col-lg-6 col-12"> -->
          <?php 
          for($i=0;$i<count($images);$i++){
            
          // }
           ?>
          <div class="col-12 col-lg-6">
              <div class="mb-4">
                <center>
                  <span class="medium2 text-uppercase doc-title" style=""><?= $images[$i][0]?></span>
                </center>
              </div>
              <center>
                <label for="<?= $images[$i][1]?>-upload" id="<?= $images[$i][1]?>-upload-label" class="upload"> Upload Images
                </label>
              </center>
              <input class="uploading" id="<?= $images[$i][1]?>-upload" name='<?= $images[$i][1]?>[]' type="file" multiple="multiple" style="display:none;" >
              <div class="">
                <center>
                  <span class="text-danger text-uppercase" id="<?= $images[$i][1]?>-upload-error" style="letter-spacing:2px;font-weight:400"></span>
                </center>
              </div>
          </div>
          
          <?php 
        }
         ?>
        <!-- </div> -->
        <div class="col-12 mb-2 mt-2">
          <hr style="background:#1a406e;width:50%;height:3px;">
        </div>
      </div>
      
      <div class="row">
        <div class="col-12">
          <center>
            <h1 class="mbig text-uppercase">Documents</h1>
          </center>
        </div>
        <!-- <div class="col-lg-6 col-12"> -->
          <?php 
          for($i=0;$i<count($documents);$i++){
            
          // }
           ?>
          <div class="col-12 col-lg-6">
              <div class="mb-4">
                <center>
                  <span class="medium2 text-uppercase doc-title" style=""><?= $documents[$i][0]?></span>
                </center>
              </div>
              <center>
                <label for="<?= $documents[$i][1]?>-upload" id="<?= $documents[$i][1]?>-upload-label" class="upload"> Upload Document
                </label>
              </center>
              <input class="uploading" id="<?= $documents[$i][1]?>-upload" name='<?= $documents[$i][1]?>[]' type="file" multiple="multiple" style="display:none;" >
              <div class="">
                <center>
                  <span class="text-danger text-uppercase" id="<?= $documents[$i][1]?>-upload-error" style="letter-spacing:2px;font-weight:400"></span>
                </center>
              </div>
          </div>
          
          <?php 
        }
         ?>
        <!-- </div> -->
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>