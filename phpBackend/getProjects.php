<?php

session_start();

header('Content-Type: application/javascript');


$connection = mysqli_connect("localhost", "root", "", "database");

if(isset($_POST['sql'])){
	$sql = $_POST['sql'];

	$sql .= " AND organizationNr = " . $_SESSION['organizationNr']; 


	$result = mysqli_query($connection, $sql);


	$json = Array();

	while($row = mysqli_fetch_assoc($result)){
		$json[] = $row;
	}
	echo json_encode($json);
	
}

?>


