<?php
session_start();
include "phpBackend/connect.php";
if(isset($_POST['antallDonasjoner'])){

	$json = $_POST['antallDonasjoner'];
	$json = json_decode($json, true);

	$antall = $json['antall'];

	for($i = 0; $i < $antall; $i++){

		$sqlRandomUser = "SELECT * FROM User ORDER BY RAND() LIMIT 1";
		$resultRandomUser = mysqli_query($connection, $sqlRandomUser);
		$randomUser = mysqli_fetch_assoc($resultRandomUser);
		$sqlRandomProject = "SELECT * FROM Project ORDER BY RAND() LIMIT 1";
		$resultRandomProject = mysqli_query($connection, $sqlRandomProject);
		$randomProject = mysqli_fetch_assoc($resultRandomProject);

		if(mysqli_num_rows($resultRandomProject) == 0 || mysqli_num_rows($resultRandomUser) == 0){
			die("Ingen brukere eller prosjekter");
		}


		$email = $randomUser['email'];
		$projectID = $randomProject['projectID'];
		$type = "FAST";
		$sum = rand(100,1000);

		$dag = rand(1,28);
		$måned = rand(1,12);
		$år = "2015";

		$date = $dag . "-" .  $måned . "-" . $år;

		$sql = "INSERT INTO Donation (projectID, email, type, sum, date) VALUES('$projectID', '$email', '$type', '$sum', STR_TO_DATE('$date','%d-%m-%Y'))";

		//sjekk om brukeren med email = $email har card registret, dersom dette ikke er tilfelle, returner 002 som betyr manglende kort, ugyldig

		$mysql_status = insertInto($connection, $sql);


	}
	echo "OK";

}

?>