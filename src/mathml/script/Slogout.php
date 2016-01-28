<?php
	session_start();
	unset($_SESSION['mathmlusr']);
	unset($_SESSION['mathmltex']);
	header("Location: ../index.php");
?>
