<?php

session_start();
include "connect.php";

if(isset($_FILES['file_background'])){
	if ( $_FILES['file_background']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_background']['error'] . '<br>';
		echo "Fil forsøkt lastet opp men ingen fil er valgt";
	}else {
		$path = "imgtmp/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		chmod($path, 0777);
		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);

		move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);

		chmod($target_file, 0777);	

		$backgroundimgURL = $target_file;
		$sql = "UPDATE temp SET image = '$target_file' WHERE id = 1";

		if (mysqli_query($connection, $sql)) {
			echo $path . $_FILES["file_background"]["name"];
		} else {

			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}

}else{

	$sql = "SELECT image FROM temp WHERE id = 1";
	$result = mysqli_query($connection, $sql);
	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			echo $row['temp'];
		}
	}

}

?>