<?php
	include '../phpBackend/connect.php';



	if(isset($_POST['user'])){
		$json = $_POST['user'];
		$user = json_decode($json, true);

		$email = $user['email'];
		$password = $user['password'];

		$sql = "INSERT INTO User (email, password) VALUES ('$email', '$password')";
		$result = mysqli_query($connection, $sql);

		if($result){
			echo "OK";
		}
	}

?>