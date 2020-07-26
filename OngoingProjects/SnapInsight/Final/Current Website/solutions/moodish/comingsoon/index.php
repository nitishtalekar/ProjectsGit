<?php
$servername = "localhost";
$username = "snapinsi_sData";
$password = "kysam-sopos2-1nixy10";
$dbname = "snapinsi_snapData";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

 if(isset($_POST['submit'])){
 
     $email = $_POST['email'];
     $sql = "INSERT INTO subscriptions (email)
     VALUES ('$email')";

}


if ($conn->query($sql) === TRUE) {
  echo "You have been subscribed Successfully";
  header("Location: https://snapinsight.net");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
