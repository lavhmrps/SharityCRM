<?php


session_start();
include "connect.php";
if (isset($_SESSION['organizationNr'])) {
	
	if(isset($_POST['project'])){
		$json = $_POST['project'];
		$project = json_decode($json, true);

		$organizationNr = $_SESSION['organizationNr'];

		
		$name = $project['name'];
		$title = $project['title'];
		$about = $project['about'];
		$country = $project['country'];
		$city = $project['city'];

		$sql = "INSERT INTO Project (name, title, about, country, city, organizationNr) VALUES ('$name', '$title', '$about', '$country', '$city', '$organizationNr')";
		$mysql_status = insertInto($connection, $sql);
		echo $mysql_status;
		
	}
	

	}else{
		echo "sign_in";
	}
	?>