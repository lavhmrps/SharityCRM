<?php

session_start();
include "../phpBackend/connect.php";
include "../phpBackend/checkSession.php";


$uid = 1;



if(isset($_FILES['file_background'])){
	if ( $_FILES['file_background']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_background']['error'] . '<br>';
		echo "Fil forsøkt lastet opp men ingen fil er valgt";
	}else {
		$path = "Uploads/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		chmod($path, 0777);



		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);




		move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);

		chmod($target_file, 0777);	

		$backgroundimgURL = $target_file;
		$sql = "UPDATE users SET profile_image = '$target_file' WHERE uid = '$uid'";

		if (mysqli_query($connection, $sql)) {
			echo $path . $_FILES["file_background"]["name"];
		} else {

			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}

}else{

	$sql = "SELECT profile_image FROM users WHERE uid = $uid ";
	$result = mysqli_query($connection, $sql);
	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			echo $row['profile_image'];
		}
	}

}





?>