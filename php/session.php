<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

$host="localhost";
$db_user = "";
$db_pass = "";
$dbase = "timesynch";

//$site_url="https://www.cefns.nau.edu/~ghs32";
//$zz_u = "ghs32";
//$zz_p = "password-removed-sorry-dan";
//$zz_h = "localhost/phpmyadmin";

$mysqli = mysqli_connect($host, $db_user, $db_pass, $dbase);

//if ($mysqli->connection_error) {
//	die("Connect failed: ".$mysqli->connection_error);
//}

//if ((empty($_SESSION['user']) || empty($_SESSION['site'])) && !preg_match('/s_login/',current_url()) && !preg_match('/enable/',current_url())) {
//	include 'login.php';
//	die();
//}
?>