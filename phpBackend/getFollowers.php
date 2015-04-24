<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';


$organizationNr = $_SESSION['organizationNr'];


$sql = "SELECT subscription.* from subscription INNER JOIN project ON subscription.projectID = project.projectID WHERE project.organizationNr = '".$organizationNr."'";

$result = mysqli_query($connection, $sql);
$json = array();
	while($row = mysqli_fetch_assoc($result)){
		$json[] = $row;
	}
	echo json_encode($json);
?>

