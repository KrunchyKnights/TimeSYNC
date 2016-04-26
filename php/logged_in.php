<?php

if (!isset($_SESSION['ID']) && !isset($_SESSION['EMAIL']) && !isset($_SESSION['USER'])) {
	header("location: login.php");
}

?>