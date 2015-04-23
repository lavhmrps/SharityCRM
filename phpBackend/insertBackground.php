<?php
session_start();
include "../phpBackend/connect.php";
include "../phpBackend/checkSession.php";
if (isset($_SESSION['organizationNr'])) {
	$organizationNr = $_SESSION['organizationNr'];
	if ( $_FILES['file_background']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_background']['error'] . '<br>';
	}
	else {
		$path = "Bilder/" . $organizationNr . "/Bakgrunnsbilde/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		
		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);
		move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);
		chmod($target_file, 0777);
		$backgroundimgURL = "http://localhost/SharityCRM/phpBackend/" . $target_file;
		$sql = "UPDATE Organization SET backgroundimgURL = '$backgroundimgURL' WHERE organizationNr = $organizationNr";
		if (mysqli_query($connection, $sql)) {
			echo "Successful MySQL query INSERT Background";
		} else {
			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}
}
?>