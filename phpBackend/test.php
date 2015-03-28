<?php
header('Access-Control-Allow-Origin: *'); 
include '../phpBackend/connect.php';



if(isset($_POST['getSQL'])){
	$sql = $_POST['getSQL'];
	$result = mysqli_query($connection, $sql);
	$json = Array();
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$json[] = $row;
		}
	}
	mysqli_close($connection);
	echo json_encode($json);
}
?>