
<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
$name = $_POST['name'];
	$email_id = $_POST['email_id'];
	$phone=$_POST['phone'];
	$password = md5($_POST['password']);
	
	
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