<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

$host="localhost";
$db_user = "root";
$db_pass = "";
$dbase = "timesynch";


$mysqli = mysqli_connect($host, $db_user, $db_pass, $dbase);

//if ($mysqli->connection_error) {
//	die("Connect failed: ".$mysqli->connection_error);
//}

?>