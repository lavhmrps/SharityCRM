<?php


session_start();
include "../phpBackend/connect.php";
//if(isset($_SESSION['username'])) {
	if(isset($_POST['update_info'])){
		$statusEmail = TRUE;
		$statusName = TRUE;
		$statusPhone = TRUE;
		$statusAddress = TRUE;
		$statusZip = TRUE;
		$statusPicURL = TRUE;
		$statusPassword = TRUE;

		$echo "string";


		$json = $_POST['organization'];
		$organization = json_decode($json, true);

		
		if(isset($organization['email'])){
			$email = $organization['email'];
			$emailOld = $organization['emailOld'];
			$sql = "UPDATE User SET email = '$email' WHERE email = '$emailOld'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusEmail = FALSE;
			}
		}

		if(isset($organization['name'])){
			$phone = $organization['name'];
			$sql = "UPDATE User SET name = '$name' WHERE email = '$email'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusName = FALSE;
			}
		}
		if(isset($organization['phone'])){
			$email = $organization['phone'];
			$sql = "UPDATE User SET phone = '$phone' WHERE email = '$email'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusPhone = FALSE;
			}
		}
		if(isset($organization['address'])){
			$zipcode = $organization['address'];
			$sql = "UPDATE User SET address = '$address' WHERE email = '$email'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAddress = FALSE;
			}
		}
		if(isset($organization['zip'])){
			$website = $organization['zip'];
			$sql = "UPDATE User SET zip = '$zip' WHERE email = '$email'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusZip = FALSE;
			}
		}

		if(isset($organization['picURL'])){
			$accountnumber = $organization['accountnumber'];
			$sql = "UPDATE User SET picURL = '$picURL' WHERE email = '$email'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusPicURL = FALSE;
			}
		}
		if(isset($organization['password'])){
			$category = $organization['password'];
			$sql = "UPDATE User SET password = '$password' WHERE email = '$email'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusPassword = FALSE;
			}


		$statusEmail = TRUE;
		$statusName = TRUE;
		$statusPhone = TRUE;
		$statusAddress = TRUE;
		$statusZip = TRUE;
		$statusPicURL = TRUE;
		$statusPassword = TRUE;

		if($statusEmail && $statusName && $statusPhone && $statusAddress && $statusZip && $statusPicURL && $statusPassword){
			echo "OK";
		}
	}
//}else{
//	echo "sign_in";
//}
?>