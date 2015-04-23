<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';

$date = $_REQUEST["date"];

$organizationNr = $_SESSION['organizationNr'];
$sql = "SELECT Donation.* , Project.name FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE YEAR(date(Donation.date)) = '" . $date . "' AND Project.organizationNr = '".$organizationNr."' ORDER BY date";
$result = mysqli_query($connection, $sql);
$json_response = array();
if ($result) {
	while($row = mysqli_fetch_assoc($result)){
		$row_array['projectID'] = $row['projectID'];
		$row_array['name'] = $row['name'];
		
		$row_array['sum'] = $row['sum'];
		$row_array['type'] = $row['type'];
		$row_array['date'] = $row['date'];

		array_push($json_response,$row_array);
	}
	echo json_encode($json_response);
} else {
	echo "FAIL";
}

?>