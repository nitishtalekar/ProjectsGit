<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
	$name = test_input($_POST['name']);
	$email_id = test_input($_POST['email_id']);
	$phone=test_input($_POST['phone']);
	$password = md5($_POST['password']);
	$duplicate=mysqli_query($conn,"select * from user where email_id='$email_id'");
	if (mysqli_num_rows($duplicate)>0)
	{
		header("Location: signup.php?status=201");
		exit();
	}
	
	$sql = "INSERT INTO user (name,email_id,phone,password)
	VALUES ('$name','$email_id','$phone','$password')";
	if (mysqli_query($conn, $sql)) {
		header("Location: index.php?status=200");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	 mysqli_close($conn);
}
?>