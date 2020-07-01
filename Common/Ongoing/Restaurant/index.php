<!DOCTYPE html>
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "restaurant";

	$conn = mysqli_connect($servername, $username, $password, $db);


	function add_file($filetoUpload, $target_dir){
		// $target_dir = "";
		$countfiles = count($_FILES['menu']['name']);
		
		$messages = array();
		for($i=0;$i<$countfiles;$i++){

	    $target_file = $target_dir . basename($_FILES[$filetoUpload]["name"][$i]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	      $check = getimagesize($_FILES[$filetoUpload]["tmp_name"][$i]);

	      if (file_exists($target_file)) {
	          $message =  '<label class="text-uppercase" style="color:#d1b741" >'.' file already exists. Please Rename your file'.'</label><br>';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Check file size
	      if ($_FILES[$filetoUpload]["size"][$i] > 500000) {
	          $message =  '<label class="text-uppercase" style="color:red" >'.' your file is too large.'.'</label><br>';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Allow certain file formats
	      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	      && $imageFileType != "gif" ) {
	          $message =  '<label class="text-uppercase" style="color:red" >'.' only JPG, JPEG, PNG & GIF files are allowed.'.'</label><br>';
	          array_push($messages,$message);
	          $uploadOk = 0;
	      }
	      // Check if $uploadOk is set to 0 by an error
	      if ($uploadOk == 0) {
	          $message =  '<label class="text-uppercase" style="color:red" >'.' your file was not uploaded.'.'</label><br>';
	          array_push($messages,$message);
	      // if everything is ok, try to upload file
	      } else {
	          if (move_uploaded_file($_FILES[$filetoUpload]["tmp_name"][$i], $target_file)) {
	              $message =  '<label class="text-uppercase" style="color:green" >'.'The file "'. basename( $_FILES[$filetoUpload]["name"][$i]). '" has been uploaded.'.'</label><br>';
	              array_push($messages,$message);
	              $tar = explode("/",$target_file);
	              $x = array_slice($tar, -3);
	              $x2 = join("/",$x);
	              // $new_target = $_SERVER['DOCUMENT_ROOT']."/Shreejit/".$x2;
	              $new_target = "/Shreejit/".$x2;
	              // $qu = "INSERT INTO images (image_path) VALUES ('$new_target')";
	              // mysqli_query($db, $qu);
	          } else {
	              $message =  '<label class="text-uppercase" style="color:red" >'.' there was an error uploading your file.'.'</label><br>';
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
		$path = "file/" . $name;
		mkdir($path, 0700);
		$menu1 = $_FILES['menu']['name'];
		$menu2 = "";
		foreach ($menu1 as $key) {
			$menu2 = $menu2.$path."/".$key.";";
		}
		$menu = substr($menu2, 0, -1);
		add_file("menu", $path."/");

		$img1 = $_FILES['img']['name'];
		$img2 = "";
		foreach ($img1 as $key) {
			$img2 = $img2.$path."/".$key.";";
		}
		$img = substr($img2, 0, -1);
		add_file("img", $path."/");

		$kyc1 = $_FILES['kyc']['name'];
		$kyc2 = "";
		foreach ($kyc1 as $key) {
			$kyc2 = $kyc2.$path."/".$key.";";
		}
		$kyc = substr($kyc2, 0, -1);
		add_file("kyc", $path."/");

		$pan1 = $_FILES['pan']['name'];
		$pan2 = "";
		foreach ($pan1 as $key) {
			$pan2 = $pan2.$path."/".$key.";";
		}
		$pan = substr($pan2, 0, -1);
		add_file("pan", $path."/");

		$gstin1 = $_FILES['gstin']['name'];
		$gstin2 = "";
		foreach ($gstin1 as $key) {
			$gstin2 = $gstin2.$path."/".$key.";";
		}
		$gstin = substr($gstin2, 0, -1);
		add_file("gstin", $path."/");

		$shop_liscence1 = $_FILES['shop_liscence']['name'];
		$shop_liscence2 = "";
		foreach ($shop_liscence1 as $key) {
			$shop_liscence2 = $shop_liscence2.$path."/".$key.";";
		}
		$shop_liscence = substr($shop_liscence2, 0, -1);
		add_file("shop_liscence", $path."/");

		$sql = "INSERT INTO data(name, owner_name, poc, city, address, landmark, email, website, payment, alcohol, cuisine, service, offer, menu, img, fssai_liscence, fssai_regno, fssai_addr, fssai_exp, kyc, pan_card, gstin, shop_liscence, outlets, avg_cost, primary_area) VALUES ";
		$sql = $sql."('$name', '$owner_name', '$poc', '$city', '$address', '$landmark', '$email', '$website', '$pay', '$alcohol', '$cuisine', '$service', '$offer', '$menu', '$img', '$liscence', '$regno', '$addr', '$exp', '$kyc', '$pan', '$gstin', '$shop_liscence', '$outlets', '$avg_cost', '$primary_area')";
		// mysqli_query($conn, $sql);
}

 ?>
<html lang="en">
<head>
	<title>MOOD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
				$('.uploading').change(function() {
			  var i = $(this).prev('label').clone();
				var id = $(this).attr("id");
				var arr = $("#"+id)[0].files
				var files = ""
				for (k=0;k<arr.length;k++){
					files = files+$("#"+id)[0].files[k].name+" , ";
				}
				files = files.slice(0, -1);
			  $(this).prev('label').text(files);
			});

			$("#open").click(function(){
				$("#form-open").slideToggle(2000);
			});

	});
</script>

</head>
<body>

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="just">
				<center>
			<div class="wrap-contact2-b mb-4 mt-3">
					<span class="contact2-form-title text-white">
						TITLE
					</span>

					<div class="mt-3 mb-3 text-white">
						<center>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
							 enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
							 aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
							esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
							sunt in culpa qui officia deserunt mollit anim id est laborum.
						</center>
					</div>
					<center>
					<div class="mt-4 open-btn" id="open">
						OPEN FORM
					</div>
				</center>

			</div>

			<div class="wrap-contact2-b2" id="form-open" style="display:none;">
				<form name="form" class="contact2-form validate-form" action="index.php" method="post" enctype= "multipart/form-data">
					<div class="mb-5">
						<span class="contact2-form-title gr-text">
							REGISTER
						</span>
						<center><hr style="background:white;width:60%;height:3px;"></center>
					</div>

					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900"> NAME OF RESTAURANT</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="name">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-12">
								<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900"> NAME OF THE OWNER</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="owner_name">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900"> POC designation</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="poc">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900"> CITY</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="city">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-12">
								<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900"> ADDRESS</span>
									<textarea class="input2 text-white" style="background:transparent" type="text" name="address"></textarea>
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-12">
								<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">LANDMARK</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="landmark">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2 mb-1 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">RESTAURANT EMAIL</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="email">
									<span class="focus-input2"></span>
								</div>
								<div class="text-white text-uppercase" style="font-size:15px">
									Owner MAil ID
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2 mb-1 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">RESTAURANT WEBSITE</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="website">
									<span class="focus-input2"></span>
								</div>
								<div class="text-white text-uppercase" style="font-size:15px">
									Dont have One? We Can help YOU. <span style="font-weight:bold">CLICK HERE</span>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2-cb mb-4 mt-4 validate-input" data-validate="Field is required">
									<center><span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">PAYMENT METHOD</span></center>
									<div class="mt-3 d-flex justify-content-around">
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="checkbox" class="mk" name="pay[]" value="card" id="pay1" hidden/>
		                    <label for="pay1" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												CARD
											</div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="checkbox" class="mk" name="pay[]" value="cash" id="pay2" hidden/>
		                    <label for="pay2" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												CASH
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2-cb mb-4 mt-4 validate-input" data-validate="Field is required">
									<center><span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">SERVES ALCOHOL</span></center>
									<div class="mt-3 d-flex justify-content-around">
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="radio" class="mk" name="alcohol" value="yes" id="alcohol1" hidden/>
		                    <label for="alcohol1" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												YES
											</div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="radio" class="mk" name="alcohol" value="no" id="alcohol2" hidden/>
		                    <label for="alcohol2" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												No
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="wrap-input2 mb-4 mt-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">CUISINE</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="cuisine">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-12">
								<div class="wrap-input2-cb mb-4 validate-input" data-validate="Field is required">
									<center><span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">SERVICES Offered</span></center>
									<div class="mt-3 d-flex justify-content-around">
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="checkbox" class="mk" name="service[]" value="Breakfast" id="services1" hidden/>
		                    <label for="services1" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												Breakfast
											</div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="checkbox" class="mk" name="service[]" value="Lunch" id="services2" hidden/>
		                    <label for="services2" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												Lunch
											</div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="checkbox" class="mk" name="service[]" value="Dinner" id="services3" hidden/>
		                    <label for="services3" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												Dinner
											</div>
										</div>
									</div>
									<div class="mt-2 d-flex justify-content-around">
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="checkbox" class="mk" name="service[]" value="Night Life" id="services4" hidden/>
		                    <label for="services4" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												Night Life
											</div>
										</div>
										<div class="d-flex justify-content-center">
											<div class="ch-wrap">
		                    <input type="checkbox" class="mk" name="service[]" value="Cafe" id="services5" hidden/>
		                    <label for="services5" class="mark"></label>
		                  </div>
											&nbsp;&nbsp;
											<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
												Cafe
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<center><hr style="background:white;width:40%;height:2px;"></center>
								<div class="wrap-input2-cb mb-4 mt-4 validate-input" data-validate="Field is required">
									<center><span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">AVAILABLE ATTRIBUTES</span></center>
									<div class="container ml-5 mt-4">
										<div class="row">
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Live Music" id="offer11" hidden/>
				                    <label for="offer11" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Live Music
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Couple Entry" id="offer21" hidden/>
				                    <label for="offer21" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Couple Entry
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Free parking" id="offer31" hidden/>
				                    <label for="offer31" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Free parking
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Above 18 only" id="offer12" hidden/>
				                    <label for="offer12" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Above 18 only
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Outdoor seating" id="offer22" hidden/>
				                    <label for="offer22" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Outdoor seating
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Table Reservation" id="offer32" hidden/>
				                    <label for="offer32" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Table Reservation
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Poolside" id="offer13" hidden/>
				                    <label for="offer13" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Poolside
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Catering" id="offer23" hidden/>
				                    <label for="offer23" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Catering
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Pet friendly" id="offer33" hidden/>
				                    <label for="offer33" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Pet friendly
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Private Dining" id="offer14" hidden/>
				                    <label for="offer14" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Private Dining
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Smoking Area" id="offer24" hidden/>
				                    <label for="offer24" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Smoking Area
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Buffet" id="offer34" hidden/>
				                    <label for="offer34" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Buffet
													</div>
												</div>
											</div>
											<div class="col-4 mb-3">
												<div class="d-flex justify-content-start">
													<div class="ch-wrap">
				                    <input type="checkbox" class="mk" name="offer[]" value="Board Games" id="offer15" hidden/>
				                    <label for="offer15" class="mark"></label>
				                  </div>
													&nbsp;&nbsp;
													<div class="text-white font-weight-bold text-uppercase d-flex align-items-center" style="height:30px;font-size:20px">
														Board Games
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2-cb mb-4 validate-input" data-validate="Field is required">
									<div class="mb-3">
										<center>
											<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">MENU IMAGES</span>
										</center>
									</div>
									<center>
										<label for="menu-upload" class="upload"> Upload Images
										</label>
									</center>
									<input type="file" class="uploading" id="menu-upload" name="menu[]" multiple style="display:none;">
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2-cb mb-4 validate-input" data-validate="Field is required">
									<div class="mb-3">
										<center>
											<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">RESTAURANT IMAGES</span>
										</center>
									</div>
									<center>
										<label for="pic-upload" class="upload"> Upload Images
										</label>
									</center>
									<input class="uploading" id="pic-upload" name='img[]' type="file" multiple="multiple" style="display:none;">
								</div>
							</div>
							<div class="col-12">
								<center><span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900;font-size:20px">FSSAI Certificate</span></center>
								<div class="container-fluid">
									<div class="row">
										<div class="col-6 mt-3">
											<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
												<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">LISCENCE NUMBER</span>
												<input class="input2 text-white" style="background:transparent" type="text" name="liscence">
												<span class="focus-input2"></span>
											</div>
										</div>
										<div class="col-6 mt-3">
											<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
												<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">REGISTRATION NUMBER</span>
												<input class="input2 text-white" style="background:transparent" type="text" name="regno">
												<span class="focus-input2"></span>
											</div>
										</div>
										<div class="col-6 mt-3">
											<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
												<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">ADDRESS</span>
												<textarea class="input2 text-white" style="background:transparent" type="text" name="addr"></textarea>
												<span class="focus-input2"></span>
											</div>
										</div>
										<div class="col-6 mt-3 d-flex align-items-end">
											<div class="wrap-input2 mb-4 validate-input" data-validate="Field is required">
												<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">EXPIRY</span>
												<input class="input2 text-white" style="background:transparent" type="date" name="exp">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<center><span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900;font-size:20px">DOCUMENTS</span></center>
								<div class="container-fluid mt-3">
									<div class="row">
										<div class="col-6">
											<div class="wrap-input2-cb mb-4 validate-input" data-validate="Field is required">
												<div class="mb-3">
													<center>
														<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">KYC VERIFICATION</span>
													</center>
												</div>
												<center>
													<label for="kyc-upload" class="upload"> Upload Document
													</label>
												</center>
												<input class="uploading" id="kyc-upload" name='kyc[]' type="file" multiple="multiple" style="display:none;">
											</div>
										</div>
										<div class="col-6">
											<div class="wrap-input2-cb mb-4 validate-input" data-validate="Field is required">
												<div class="mb-3">
													<center>
														<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">PAN CARD</span>
													</center>
												</div>
												<center>
													<label for="pan-upload" class="upload"> Upload Document
													</label>
												</center>
												<input class="uploading" id="pan-upload" name='pan[]' type="file" multiple="multiple" style="display:none;">
											</div>
										</div>
										<div class="col-6">
											<div class="wrap-input2-cb mb-4 validate-input" data-validate="Field is required">
												<div class="mb-3">
													<center>
														<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">GSTIN Certificate</span>
													</center>
												</div>
												<center>
													<label for="gstin-upload" class="upload"> Upload Document
													</label>
												</center>
												<input class="uploading" id="gstin-upload" name='gstin[]' type="file" multiple="multiple" style="display:none;">
											</div>
										</div>
										<div class="col-6">
											<div class="wrap-input2-cb mb-4 validate-input" data-validate="Field is required">
												<div class="mb-3">
													<center>
														<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">SHOP LISCENCE</span>
													</center>
												</div>
												<center>
													<label for="lis-upload" class="upload"> Upload Document
													</label>
												</center>
												<input class="uploading" id="lis-upload" name='shop_liscence[]' type="file" multiple="multiple" style="display:none;">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2 mb-4 mt-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">Number of Outlets</span>
									<input class="input2 text-white" style="background:transparent" type="number" name="outlets">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="wrap-input2 mb-4 mt-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">Average cost for 2</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="avg_cost">
									<span class="focus-input2"></span>
								</div>
							</div>
							<div class="col-12">
								<div class="wrap-input2 mb-4 mt-4 validate-input" data-validate="Field is required">
									<span class="gr-text text-uppercase" style="letter-spacing:2px;font-weight:900">Primary Area of the Restaurant</span>
									<input class="input2 text-white" style="background:transparent" type="text" name="primary_area">
									<span class="focus-input2"></span>
								</div>
							</div>
						</div>
					</div>

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn" style="border-radius:30px">
							<div class="contact2-form-bgbtn" style="border-radius:30px"></div>
							<button type="submit" name="submit" class="contact2-form-btn text-uppercase" style="border-radius:30px;letter-spacing:2px;">
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</center>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

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
