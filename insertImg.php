<?

session_start();
include "connect.php";
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

		chmod($path, 0777);



		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);




		$uploadOk_bakgrunnsbilde = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES["file_background"]["tmp_name"]);
		if($check !== false) {
			$uploadOk_bakgrunnsbilde = 1;
		} else {
			$uploadOk_bakgrunnsbilde = 0;
		}

		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			$uploadOk_bakgrunnsbilde = 0;
		}

		// Check file size
		if ($_FILES["file_background"]["size"] > 500000) {
			//echo "Sorry, your file is too large.";
			$uploadOk_bakgrunnsbilde = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk_bakgrunnsbilde = 0;
		}

		if ($uploadOk_bakgrunnsbilde == 0) {
			echo "Sorry, your file was not uploaded.";

			// if everything is ok, try to upload file
		}

		else{

			if (move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file)) {

				chmod($target_file, 0777);	

				$backgroundimgURL = "http://localhost/sharityCRM/" . $target_file;
				$sql = "UPDATE Organization SET backgroundimgURL = '$target_file' WHERE organizationNr = '$organizationNr'";

				if (mysqli_query($connection, $sql)) {
					echo "Successful MySQL queru INSERT";
				} else {

					die('Error: ' . mysqli_error($connection));
					db_close($connection);
				}
			}
		}	

	}



	if ( $_FILES['file_logo']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_logo']['error'] . '<br>';
	}
	else {
		$path = "Bilder/" . $organizationNr . "/Logo/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}

		chmod($path, 0777);



		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_logo"]["name"]);




		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES["file_logo"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}

		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["file_logo"]["size"] > 500000) {
			//echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";

			// if everything is ok, try to upload file
		}

		else{

			if (move_uploaded_file($_FILES["file_logo"]["tmp_name"], $target_file)) {

				chmod($target_file, 0777);	

				$logoURL = "http://localhost/sharityCRM/" . $target_file;
				$sql = "UPDATE Organization SET logoURL = '$target_file' WHERE organizationNr = '$organizationNr'";

				if (mysqli_query($connection, $sql)) {
					echo "Successful MySQL queru INSERT";
				} else {

					die('Error: ' . mysqli_error($connection));
					db_close($connection);
				}
			}
		}	

	}

}


?>