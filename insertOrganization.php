<?php



include 'connect.php';

if (isset($_POST['organization'])) {
	$json = $_POST['organization'];
	$organization = json_decode($json, true);


	$organizationNr = $organization['organizationNr'];
	$name = $organization['name'];

	$password = $organization['password'];


	$sql = "INSERT INTO Organization (organizationNr, name, password)VALUES($organizationNr,'$name','$password')";
	$mysql_status = insertInto($connection, $sql);
	echo $mysql_status;
	
}
?>