<?php
include '../phpBackend/connect.php';
if(isset($_POST['projectSQL'])){
	$sql = $_POST['projectSQL'];
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0) {
		$json = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$json[] = $row;
		}
		echo json_encode($json);
	}
}
?>