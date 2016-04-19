<?php 

  $host = "localhost";
  $user = "root";
  $pass = "";

  $databaseName = "test";
  $tableName = "users";


  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $result = mysql_query("SELECT SCHEDULE FROM $tableName");            //query
  $array = mysql_fetch_row($result);                          //fetch result    


  echo json_encode($array);

?>
