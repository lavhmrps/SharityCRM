<?php


session_start();
include "../phpBackend/connect.php";


if (isset($_SESSION['organizationNr'])) {
	if(isset($_POST['organization'])){
		
		$statusTitle = TRUE;
		$statusTxt = TRUE;


		$json = $_POST['organization'];
		$organization = json_decode($json, true);




		$projectID = $_SESSION['newsIDtoShow'];


		if(isset($organization['title'])){
			$title = $organization['title'];
			$sql = "UPDATE news SET title = '$title' WHERE newsID = '$newsID'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusTitle = FALSE;
			}
		}

		if(isset($organization['txt'])){
			$txt = $organization['txt'];
			$sql = "UPDATE news SET txt = '$txt' WHERE newsID = '$newsID'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAbout = FALSE;
			}
		}


		$statusTitle = TRUE;
		$statusTxt = TRUE;

		if($statusTitle && $statusAbout){
			echo "OK";
		}
	}
}else{
	echo "sign_in";
}
?>