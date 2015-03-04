<?php
session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';

$organizationNr = $_SESSION['organizationNr'];

$sql = "SELECT category FROM Organization WHERE organizationNr = '$organizationNr'";
$result = mysqli_query($connection, $sql);

if($result){
	if(mysqli_num_rows($result)){
		$row = mysqli_fetch_assoc($result);
		echo $row['category'];	
	}
}
?>