<?php
session_start();
include "../phpBackend/connect.php";
include "../phpBackend/checkSession.php";
if (isset($_SESSION['organizationNr'])) {
	$organizationNr = $_SESSION['organizationNr'];
	$projectID = $_SESSION['IDofLastProjectInsert'];
	if ( $_FILES['file_background']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_background']['error'] . '<br>';
	}
	else {

		$root = "Bilder/" . $organizationNr . "/";

		if(!file_exists($root)){
			mkdir($root, 0777, true);
		}
		$child = $root . $projectID . "/";

		if(!file_exists($child)){
			mkdir($child, 0777, true);
		}

		$path = $child . "/Bakgrunnsbilde/";

		if (!file_exists($path)) {
			mkdir($path, 0777, true);

		}
		chmod($root, 0777);
		chmod($child, 0777);
		chmod($path, 0777);

		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);
		move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);
		chmod($target_file, 0777);
		$backgroundimgURL = "http://student.cs.hioa.no/~s188081/SharityCRM/phpBackend/" . $target_file;
		$sql = "UPDATE project SET backgroundimgURL = '$backgroundimgURL' WHERE projectID = $projectID";
		if (mysqli_query($connection, $sql)) {
			echo "Successful MySQL query INSERT Background";
		} else {
			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}
}
?>