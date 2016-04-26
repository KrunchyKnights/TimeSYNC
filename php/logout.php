<?php 
	// Destroys the current session then redirects the user to login page.
	include "session.php";

	session_destroy();
	header("location: login.php");
?>