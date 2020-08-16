<?php

$host = "localhost";    /* Host name */
$user = "snapinsi_sData";         /* User */
$password = "kysam-sopos2-1nixy10";         /* Password */
$dbname = "snapinsi_snapData";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>