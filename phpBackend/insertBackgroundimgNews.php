<?php
session_start();
include "../phpBackend/connect.php";
include "../phpBackend/checkSession.php";
if (isset($_SESSION['organizationNr'])) {
	$organizationNr = $_SESSION['organizationNr'];
	$projectID = $_SESSION['projectIDtoRegisterNews'];
	$newsID = $_SESSION['IDofLastNewsInsert'];
	if ( $_FILES['file_background']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_background']['error'] . '<br>';
	}
	else {


		$root = "Bilder/" . $organizationNr . "/";
		if (!file_exists($root)) {
			mkdir($root, 0777, true);
		}

		$child = $root . $projectID . "/";

		if (!file_exists($child)) {
			mkdir($child, 0777, true);
		}

		$child1 = $child . "News/";
		if(!file_exists($child1)){
			mkdir($child1, 0777, true);
		}

		$child2 = $child1 . $newsID . "/";
		if(!file_exists($child2)){
			mkdir($child2, 0777, true);
		}

		$path = $child2 . "Bakgrunnsbilde/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		


		//$path = "Bilder/" . $organizationNr . "/". $projectID . "/News/" . $newsID . "/Bakgrunnsbilde/";
		

		chmod($root, 0777);
		chmod($child, 0777);
		chmod($child1, 0777);
		chmod($child2, 0777);
		chmod($path, 0777);

		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);
		move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);
		chmod($target_file, 0777);
		$backgroundimgURL = "http://student.cs.hioa.no/~s188081/SharityCRM/phpBackend/" . $target_file;
		$sql = "UPDATE news SET backgroundimgURL = '$backgroundimgURL' WHERE newsID = $newsID";
		if (mysqli_query($connection, $sql)) {
			echo "Successful MySQL query INSERT News Background";
		} else {
			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}
}
?>