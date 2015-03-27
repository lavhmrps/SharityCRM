<?php
session_start();
include '../../phpBackend/connect.php';
include '../../phpBackend/checkSession.php';

$organizationNr = $_SESSION['organizationNr'];

$date = $_REQUEST["date"];
				
$sql = "SELECT COUNT(*) FROM Subscription INNER JOIN Project ON Subscription.projectID = Project.projectID WHERE DATE(Subscription.date_added) = '" . $date . "' AND  Project.organizationNr = '".$organizationNr."'";
$result = mysqli_query($connection, $sql);

if($result){
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);

		$res = $row['COUNT(*)'];

		echo 'Følgere: ' . $res . '<br>';
	}
}
?>