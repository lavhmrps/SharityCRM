<?php
include '../phpBackend/connect.php';
include '../phpBackend/hash.php';

if (isset($_POST['organization'])) {
	$json = $_POST['organization'];
	$organization = json_decode($json, true);
	$organizationNr = $organization['organizationNr'];
	$name = $organization['name'];
	$password = $organization['password'];
	

	$hash = better_crypt($password);
	
	
	$sql = "INSERT INTO organization (organizationNr, name, password)VALUES($organizationNr,'$name','$hash')";
	$mysql_status = insertInto($connection, $sql);
	echo $mysql_status;
}
?>