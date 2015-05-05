<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';

$date = $_REQUEST["date"];

$organizationNr = $_SESSION['organizationNr'];
$sql = "SELECT subscription.* from subscription INNER JOIN project ON subscription.projectID = project.projectID WHERE YEAR(date(subscription.date_added)) = '" . $date . "' AND  project.organizationNr = '".$organizationNr."'";
$result = mysqli_query($connection, $sql);
$json = array();
if ($result) {
	while($row = mysqli_fetch_assoc($result)){
		//$json[] = $row;
		//$row_array['sum'] = $row['sum'];
		$row_array['date'] = $row['date_added'];
		array_push($json,$row_array);
	}
	echo json_encode($json);
	//}
	//echo json_encode($json);
} else {
	echo "FAIL";
}
?>

