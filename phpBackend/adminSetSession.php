<?php
session_start();

if(isset($_POST['organizationNr'])){
	$organizationNr = $_POST['organizationNr'];

	$_SESSION['organizationNr'] = $organizationNr;
	echo "OK";
}
else{
	echo "Organisasjonsnummer er ikke satt";
}
?>