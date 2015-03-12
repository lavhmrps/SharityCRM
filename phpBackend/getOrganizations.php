<?php
include '../phpBackend/connect.php';
if(isset($_POST['organizationSQL'])){
	$sql = $_POST['organizationSQL'];
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0) {
		$json = array();
		$index = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$organizationNr = $row['organizationNr'];
			$projectCount = getProjectCount($organizationNr, $connection);
			$json[] = $row;
			$json[$index]['projectCount'] = $projectCount;
			$index++;	
		}
		echo json_encode($json);
	}else{
		echo "not success";
	}
}
function getProjectCount($orgnr, $con){
	$sql = "SELECT * FROM Project WHERE organizationNr = '$orgnr'";
	$result = mysqli_query($con, $sql);
	return mysqli_num_rows($result);
}
?>