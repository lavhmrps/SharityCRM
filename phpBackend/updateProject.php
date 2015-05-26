<?php


session_start();
include "../phpBackend/connect.php";


if (isset($_SESSION['organizationNr'])) {
	if(isset($_POST['project'])){
		
		$statusName = TRUE;
		$statusTitle = TRUE;
		$statusCountry = TRUE;
		$statusCity = TRUE;
		$statusAbout = TRUE;


		$json = $_POST['project'];
		$project = json_decode($json, true);




		$projectNr = $_SESSION['projectIDtoShow'];
		
		if(isset($project['name'])){
			$name = $project['name'];
			$sql = "UPDATE project SET name = '$name' WHERE projectID = '$projectNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusName = FALSE;
			}
		}

		if(isset($project['title'])){
			$title = $project['title'];
			$sql = "UPDATE project SET title = '$title' WHERE projectID = '$projectNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusTitle = FALSE;
			}
		}
		if(isset($project['country'])){
			$country = $project['country'];
			$sql = "UPDATE project SET country = '$country' WHERE projectID = '$projectNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusCountry = FALSE;
			}
		}
		if(isset($project['city'])){
			$city = $project['city'];
			$sql = "UPDATE project SET city = '$city' WHERE projectID = '$projectNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusCity = FALSE;
			}
		}
		if(isset($project['about'])){
			$about = $project['about'];
			$sql = "UPDATE project SET about = '$about' WHERE projectID = '$projectNr'";
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
	}else{
		echo "ProjectID not set";
	}
}else{
	echo "sign_in";
}
?>