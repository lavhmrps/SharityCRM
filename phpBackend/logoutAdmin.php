<?php
	session_start();
	unset($_SESSION["username"]); 
	header("Location: ../pages/admin/loginAdmin.php");

?>