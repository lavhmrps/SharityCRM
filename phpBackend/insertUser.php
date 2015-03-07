<?php
include '../phpBackend/connect.php';
if(isset($_POST['user'])){
	$json = $_POST['user'];
	$user = json_decode($json, true);

	$name = $user['name'];
	$phone = $user['phone'];
	$email = $user['email'];
	$password = $user['password'];

	$sql = "INSERT INTO User (name, phone, email, password) VALUES ('$name','$phone', '$email', '$password')";
	$mysql_status = insertInto($connection, $sql);
	echo $mysql_status;
}else{
	echo "User not set";
}
?>