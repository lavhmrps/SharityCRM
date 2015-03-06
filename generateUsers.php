<?php
session_start();
include "phpBackend/connect.php";

if(isset($_POST['antallBrukere'])){

	$json = $_POST['antallBrukere'];
	$json = json_decode($json, true);

	$antall = $json['antall'];

	for($i = 0; $i < $antall; $i++){

		$name = "testUser No. " . $i;
		$email = $i. "@sharity.com";
		$password = $i;

		$sql = "INSERT INTO User (name, email, password) VALUES('$name', '$email', '$password')";


		$mysql_status = insertInto($connection, $sql);
	}
	echo "OK";
}
?>