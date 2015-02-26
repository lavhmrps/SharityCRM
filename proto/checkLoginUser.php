<?php
include 'connect.php';

if(isset($_POST['combination'])){
	$json = $_POST['combination'];
	$combination = json_decode($json,true);

	$email = $combination['email'];
	$password = $combination['password'];

	$sql = "SELECT password FROM User WHERE email = '$email'";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$dbpassword = $row['password'];

			if($dbpassword == $password){
				session_start();
				$_SESSION['email'] = $email;
				echo "OK";
			}else{
			echo "WRONG";
		}

		}
		
	}
}
?>