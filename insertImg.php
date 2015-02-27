
<?

session_start();
include "connect.php";
if (isset($_SESSION['organizationNr'])) {
	$organizationNr = $_SESSION['organizationNr'];

	if ( $_FILES['file']['error'] > 0) {
		echo 'Error: ' . $_FILES['file']['error'] . '<br>';
	}
	else {

		$path = 'uploads/' . $_FILES['file']['name'];

		//chmod($path, 777);

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES["file"]["tmp_name"]);
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
		if ($_FILES["file"]["size"] > 500000) {
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
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$sql = "UPDATE Organization SET backgroundimgURL = '$target_file' WHERE organizationNr = '$organizationNr'";
				$mysql_status = insertInto($connection, $sql);
				echo $mysql_status;

			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	?>