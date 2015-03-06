<?php
session_start();
include "phpBackend/connect.php";
if(isset($_POST['antallProsjekter'])){

	$json = $_POST['antallProsjekter'];
	$json = json_decode($json, true);

	$antall = $json['antall'];

	for($i = 0; $i < $antall; $i++){

		$sqlRandomOrg = "SELECT * FROM Organization ORDER BY RAND() LIMIT 1";
		$resultRandomOrg = mysqli_query($connection, $sqlRandomOrg);
		$randomOrg = mysqli_fetch_assoc($resultRandomOrg);
		

		if(mysqli_num_rows($resultRandomOrg) == 0){
			die("Ingen organisasjoner å koble prosjekt til");
		}


		$organizationNr = $randomOrg['organizationNr'];
		$name = "TestProject No.".$i;
		$title = $name;
		$about = "Generated testproject No.".$i;
		$country = "Norge";
		$city = "Kristiansand"; 

		


		$sql = "INSERT INTO Project (name, title, about, country, city, organizationNr) VALUES('$name', '$title', '$about', '$country', '$city', '$organizationNr')";

		//sjekk om brukeren med email = $email har card registret, dersom dette ikke er tilfelle, returner 002 som betyr manglende kort, ugyldig

		$mysql_status = insertInto($connection, $sql);


	}
	echo "OK";

}

?>