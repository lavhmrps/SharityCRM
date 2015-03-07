<?php
	include '../phpBackend/connect.php';

	if(isset($_POST['update'])){
		$sql = $_POST['update'];

		$mysql_status = updateDatabase($connection, $sql);

		echo $mysql_status;
	}
?>