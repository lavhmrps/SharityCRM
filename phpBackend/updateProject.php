<?php


session_start();
include "../phpBackend/connect.php";


if (isset($_SESSION['organizationNr'])) {
	if(isset($_POST['organization'])){
		
		$statusName = TRUE;
		$statusTitle = TRUE;
		$statusCountry = TRUE;
		$statusCity = TRUE;
		$statusAbout = TRUE;


		$json = $_POST['organization'];
		$organization = json_decode($json, true);




		$projectID = $_SESSION['projectIDtoShow'];
		
		if(isset($organization['name'])){
			$name = $organization['name'];
			$sql = "UPDATE Project SET name = '$name' WHERE projectID = '$projectID'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusName = FALSE;
			}
		}

		if(isset($organization['title'])){
			$title = $organization['title'];
			$sql = "UPDATE Project SET title = '$title' WHERE projectID = '$projectID'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusTitle = FALSE;
			}
		}
		if(isset($organization['country'])){
			$country = $organization['country'];
			$sql = "UPDATE Project SET country = '$country' WHERE projectID = '$projectID'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusCountry = FALSE;
			}
		}
		if(isset($organization['city'])){
			$city = $organization['city'];
			$sql = "UPDATE Project SET city = '$city' WHERE projectID = '$projectID'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusCity = FALSE;
			}
		}
		if(isset($organization['about'])){
			$about = $organization['about'];
			$sql = "UPDATE Project SET about = '$about' WHERE projectID = '$projectID'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAbout = FALSE;
			}
		}

		$statusName = TRUE;
		$statusTitle = TRUE;
		$statusCountry = TRUE;
		$statusCity = TRUE;
		$statusAbout = TRUE;

		if($statusName && $statusTitle && $statusCountry && $statusCity && $statusAbout){
			echo "OK";
		}
	}
}else{
	echo "sign_in";
}
?>