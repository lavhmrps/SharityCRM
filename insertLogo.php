<?php

session_start();
include "connect.php";
if (isset($_SESSION['organizationNr'])) {
	$organizationNr = $_SESSION['organizationNr'];


	if ( $_FILES['file_logo']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_logo']['error'] . '<br>';
		echo "HEEEELLO";
	}
	else {
		$path = "Bilder/" . $organizationNr . "/Logo/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		chmod($path, 0777);



		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_logo"]["name"]);




		move_uploaded_file($_FILES["file_logo"]["tmp_name"], $target_file);

		chmod($target_file, 0777);	

		$logoURL = "http://localhost/sharityCRM/" . $target_file;
		$sql = "UPDATE Organization SET logoURL = '$target_file' WHERE organizationNr = '$organizationNr'";

		if (mysqli_query($connection, $sql)) {
			echo "Successful MySQL query INSERT Logo";
		} else {

			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}
}	

?>