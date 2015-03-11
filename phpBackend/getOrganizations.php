<?php
include "../phpBackend/connect.php";
	//$sql = $_POST['sql'];
	
			//$sql = "SELECT title, txt FROM News WHERE projectID = 1";
	$result = mysqli_query($connection, "SELECT * FROM Organization");
	if (mysqli_num_rows($result) > 0) {
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	}else{
		echo "not sukess";
	}
//echo "Hello";
?>