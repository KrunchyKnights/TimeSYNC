<?php 
	// Destroys the current session then redirects the user to login page.
	include "server.php";
	session_destroy();
	header("location: login.php");
?>