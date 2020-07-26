<?php

// $database_host = 'sql102.epizy.com';
// $database_username = 'epiz_26291901';
// $database_password = 'LUaCxbZHDx8p';
// $database_name = 'epiz_26291901_rgit_feedback	';

$database_host = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'rgit_feedback';

$db = mysqli_connect($database_host, $database_username, $database_password, $database_name);
session_start();
?>
