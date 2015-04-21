<?php
	session_start();
	include '../phpBackend/connect.php';
	if(isset($_POST['getStats'])){
		
		$sql = $_POST['getStats'];

		
		echo $sql;


		$result = mysqli_query($connection, $sql);
		
		$json = array();

		
		
		
		
	}
?>