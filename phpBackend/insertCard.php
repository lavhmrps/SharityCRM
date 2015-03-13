<?php
header('Access-Control-Allow-Origin: *');  
include '../phpBackend/connect.php';
if(isset($_POST['credit_card'])){
	$json = $_POST['credit_card'];
	$credit_card = json_decode($json, true);

	$visa_number = $credit_card['visa_number'];
	$visa_expire_month = $credit_card['visa_expire_month'];
	$visa_expire_year = $credit_card['visa_expire_year'];
	$ccv = $credit_card['ccv'];

	$sql = "INSERT INTO Card (cardnr, month, year, CCV) VALUES ('$visa_number','$visa_expire_month', '$visa_expire_year', '$ccv')";
	$mysql_status = insertInto($connection, $sql);
	echo $mysql_status;
}else{
	echo "Card not set";
}
?>