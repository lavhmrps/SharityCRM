<?php
header('Access-Control-Allow-Origin: *');  
session_start();
include "../phpBackend/connect.php";

if(isset($_SESSION['userEmailToInsertImage'])){

	if ( $_FILES['image']['error'] > 0) {
		die('Error: ' . $_FILES['image']['error'] . '<br>');
	}
	else {

		$email = $_SESSION['userEmailToInsertImage'];

		$path = "image_user/" . $email . "/portrait/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		chmod($path, 0777);


		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["image"]["name"]);


		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

		chmod($target_file, 0777);

		$picURL = "http://localhost/SharityCRM/phpBackend/" . $target_file;
		$sql = "UPDATE User SET picURL = '$picURL' WHERE email = '$email'";
		if (mysqli_query($connection, $sql)) {
			echo "Successful MySQL query INSERT Background";
		} else {
			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}
}
?>