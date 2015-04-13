<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';

$date = $_REQUEST["date"];

$organizationNr = $_SESSION['organizationNr'];
$sql = "SELECT * FROM Subscription INNER JOIN Project ON Subscription.projectID = Project.projectID WHERE YEAR(date(Subscription.date_added)) = YEAR('" . $date . "') AND  Project.organizationNr = '".$organizationNr."' ORDER BY date";
$result = mysqli_query($connection, $sql);
$json_response = array();
if ($result) {
	while($row = mysqli_fetch_assoc($result)){
		$row_array['date_added'] = $row['date_added'];
		$row_array['projectID'] = $row['projectID'];

		array_push($json_response,$row_array);
	}
	echo json_encode($json_response);
} else {
	echo "FAIL";
}

?>