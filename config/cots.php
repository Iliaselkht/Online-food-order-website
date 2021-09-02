<?php 
//Start a session
session_start();
//Constants to stock repeating variabls
define('SITEURL', 'http://localhost/fowm/');
define('LOCALHOST','localhost');
define('DB_USERNAME','fowm');
define('DB_PASSWORD','@Mi134368499@');
define('DB_NAME','fowm');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME , DB_PASSWORD) or die(mysqli_error()); // Connect with database
$db_select = mysqli_select_db($conn , DB_NAME) or die(mysqli_error());   //Select database 

?>