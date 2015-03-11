<?php

include '../phpBackend/connect.php';
if(isset($_POST['organizationSQL'])){
	$sql = $_POST['organizationSQL'];
	$result = mysqli_query($connection, $sql);
	if (mysqli_num_rows($result) > 0) {
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	}else{
		echo "not success";
	}
}

?>

