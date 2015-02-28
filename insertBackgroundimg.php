
<?

session_start();
include "connect.php";
if (isset($_SESSION['organizationNr'])) {
	$organizationNr = $_SESSION['organizationNr'];

	if ( $_FILES['file_background']['error'] > 0) {
		echo 'Error: ' . $_FILES['file_background']['error'] . '<br>';
	}
	else {

		
		if (!file_exists("Pics/")) {
			mkdir("Pics/", 7777, true);

		}
		$path = "Pics/" . $organizationNr . "/";
		if (!file_exists($path)) {
			mkdir($path, 7777, true);

		}

		//chmod($path, 777);

		$target_dir = $path;
		$target_file = $target_dir . basename($_FILES["file_background"]["name"]);

		chmod($target_dir,7777);
		chmod($target_file,7777);


		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES["file_background"]["tmp_name"]);
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
		if ($_FILES["file_background"]["size"] > 500000) {
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

		else {
			if (move_uploaded_file($_FILES["file_background"]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$sql = "UPDATE Organization SET backgroundimgURL = '$target_file' WHERE organizationNr = '$organizationNr'";
				$mysql_status = insertInto($connection, $sql);
				echo $mysql_status;

			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
}
?>