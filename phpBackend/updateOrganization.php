<?php
session_start();
include "../phpBackend/connect.php";
if (isset($_SESSION['organizationNr'])) {
	if(isset($_POST['organization'])){
		$statusAddress = TRUE;
		$statusPhone = TRUE;
		$statusEmail = TRUE;
		$statusZipcode = TRUE;
		$statusWebsite = TRUE;
		$statusAccountnumber = TRUE;
		$statusCategory = TRUE;
		$statusAbout = TRUE;


		$json = $_POST['organization'];
		$organization = json_decode($json, true);




		$organizationNr = $_SESSION['organizationNr'];
		
		if(isset($organization['address'])){
			$address = $organization['address'];
			$sql = "UPDATE organization SET address = '$address' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAddress = FALSE;
			}
		}

		if(isset($organization['phone'])){
			$phone = $organization['phone'];
			$sql = "UPDATE organization SET phone = '$phone' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusPhone = FALSE;
			}
		}
		if(isset($organization['email'])){
			$email = $organization['email'];
			$sql = "UPDATE organization SET email = '$email' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusEmail = FALSE;
			}
		}
		if(isset($organization['zipcode'])){
			$zipcode = $organization['zipcode'];
			$sql = "UPDATE organization SET zipcode = '$zipcode' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusZipcode = FALSE;
			}
		}
		if(isset($organization['website'])){
			$website = $organization['website'];
			$sql = "UPDATE organization SET website = '$website' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusWebsite = FALSE;
			}
		}

		if(isset($organization['accountnumber'])){
			$accountnumber = $organization['accountnumber'];
			$sql = "UPDATE organization SET accountnumber = '$accountnumber' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAccountnumber = FALSE;
			}
		}
		if(isset($organization['category'])){
			$category = $organization['category'];
			$sql = "UPDATE organization SET category = '$category' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusCategory = FALSE;
			}
			
			
		}
		if(isset($organization['about'])){
			$about = $organization['about'];
			$sql = "UPDATE organization SET about = '$about' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAbout = FALSE;
			}
		}


		$statusAddress = TRUE;
		$statusPhone = TRUE;
		$statusEmail = TRUE;
		$statusZipcode = TRUE;
		$statusWebsite = TRUE;
		$statusAccountnumber = TRUE;
		$statusCategory = TRUE;
		$statusAbout = TRUE;

		if($statusAddress && $statusPhone && $statusEmail && $statusZipcode && $statusWebsite&& $statusAccountnumber&& $statusCategory&& $statusAbout){
			echo "OK";
		}
	}
}

if (!isset($_SESSION['organizationNr'])) {
	if(isset($_POST['organization'])){
		$statusAddress = TRUE;
		$statusPhone = TRUE;
		$statusEmail = TRUE;
		$statusZipcode = TRUE;
		$statusWebsite = TRUE;
		$statusAccountnumber = TRUE;
		$statusCategory = TRUE;
		$statusAbout = TRUE;


		$json = $_POST['organization'];
		$organization = json_decode($json, true);

		$organizationNr = $_SESSION['organizationNr'];
		
		if(isset($organization['address'])){
			$address = $organization['address'];
			$sql = "UPDATE organization SET address = '$address' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAddress = FALSE;
			}
		}

		if(isset($organization['phone'])){
			$phone = $organization['phone'];
			$sql = "UPDATE organization SET phone = '$phone' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusPhone = FALSE;
			}
		}
		if(isset($organization['email'])){
			$email = $organization['email'];
			$sql = "UPDATE organization SET email = '$email' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusEmail = FALSE;
			}
		}
		if(isset($organization['zipcode'])){
			$zipcode = $organization['zipcode'];
			$sql = "UPDATE organization SET zipcode = '$zipcode' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusZipcode = FALSE;
			}
		}
		if(isset($organization['website'])){
			$website = $organization['website'];
			$sql = "UPDATE organization SET website = '$website' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusWebsite = FALSE;
			}
		}

		if(isset($organization['accountnumber'])){
			$accountnumber = $organization['accountnumber'];
			$sql = "UPDATE organization SET accountnumber = '$accountnumber' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAccountnumber = FALSE;
			}
		}
		if(isset($organization['category'])){
			$category = $organization['category'];
			$sql = "UPDATE organization SET category = '$category' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusCategory = FALSE;
			}
			
			
		}
		if(isset($organization['about'])){
			$about = $organization['about'];
			$sql = "UPDATE organization SET about = '$about' WHERE organizationNr = '$organizationNr'";
			$mysql_status = insertInto($connection, $sql);
			if($mysql_status != "OK"){
				$statusAbout = FALSE;
			}
		}


		$statusAddress = TRUE;
		$statusPhone = TRUE;
		$statusEmail = TRUE;
		$statusZipcode = TRUE;
		$statusWebsite = TRUE;
		$statusAccountnumber = TRUE;
		$statusCategory = TRUE;
		$statusAbout = TRUE;

		if($statusAddress && $statusPhone && $statusEmail && $statusZipcode && $statusWebsite&& $statusAccountnumber&& $statusCategory&& $statusAbout){
			echo "OK";
		}
	}
}
?>