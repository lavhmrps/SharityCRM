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
		//chmod($path, 0777);


		$files = glob($path . '*'); // get all file names
		foreach($files as $file){ // iterate files
			if(is_file($file))
		    unlink($file); // delete file
	} 



	$target_dir = $path;
	$target_file = $target_dir . basename($_FILES["file_background"]["name"]);

	move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file);

	//chmod($target_file, 0777);	

	$result_delete = mysqli_query($connection, "DELETE FROM imageTemp");

	if($result_delete){
		$sql = "INSERT INTO imageTemp (id, temp) VALUES (1, '$target_file')";

		if (mysqli_query($connection, $sql)) {
			echo $path . $_FILES["file_background"]["name"];
		} else {

			die('Error: ' . mysqli_error($connection));
			db_close($connection);
		}
	}
}
}else{
	$path = "imgtmp/";
	if (!file_exists($path)) {
		mkdir($path, 0777, true);
	}


	//chmod($path, 0777);


	$files = glob($path . '*'); // get all file names
	foreach($files as $file){ // iterate files
		if(is_file($file))
	    unlink($file); // delete file
	}
	$result_delete = mysqli_query($connection, "DELETE FROM imageTemp");

	echo "table imageTemp is cleared, (no rows) directory: " . $path .  " is cleared, all files have been deleted. message sent from insertImageTemp.phh at line 60";
}

?>
