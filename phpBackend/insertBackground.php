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
		$path = "Bilder/" . $organizationNr . "/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
			

		}
		if(!file_exists($path . "Bakgrunnsbilde/")){
			mkdir($path . "Bakgrunnsbilde/", 0777, true);
		}


		chmod($path . "Bakgrunnsbilde/", 0777);
		chmod($path, 0777);



		$target_dir = $path . "Bakgrunnsbilde/";
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);
		move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);
		chmod($target_file, 0777);
		$backgroundimgURL = "http://student.cs.hioa.no/~s188081/SharityCRM/phpBackend/" . $target_file;
		$sql = "UPDATE organization SET backgroundimgURL = '$backgroundimgURL' WHERE organizationNr = $organizationNr";
		if (mysqli_query($connection, $sql)) {
			echo "Successful MySQL query INSERT Background";
		} else {
			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}
}
?>