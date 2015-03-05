<?php
session_start();
if(!isset($_SESSION['email'])){
	echo '<h1>Ikke logget inn</h1>';
	header("Location: index.php");
}

include 'connect.php';

?>
<html>
<head>
	<title></title>
	<style>
	table, th, td {
		border: 1px solid black;
	}
	option{
		cursor:pointer;
		color:blue;
	}
	</style>
</head>
<body>
	<h1>Alle prosjekter</h1>
	<?php include'proto_header_nav.php';?>
	
	<br/><br/><br/><br/><br/><br/><br/><br/>




	<?php

	$sql = "SELECT * FROM Project";
	$result = mysqli_query($connection, $sql);

	if($result){
		if(mysqli_num_rows($result) > 0){
			echo "<table>";
			echo 
			"
			<tr>
			<th>ProjectID</th>
			<th>Prosjektnavn</th>
			<th>Tittel</th>
			<th>Om</th>
			<th>Land</th>
			<th>By</th>
			<th>Organisasjonsnummer</th>
			<th>Donasjonslink</th>
			</tr>

			";

			while($row = mysqli_fetch_assoc($result)){

				echo 
				"
				<tr>
				<td>" . $row['projectID'] . "</td>
				<td>" . $row['name'] . "</td>
				<td>" . $row['title'] . "</td>
				<td>" . $row['about'] . "</td>
				<td>" . $row['country'] . "</td>
				<td>" . $row['city'] . "</td>
				<td>" . $row['organizationNr'] . "</td>
				<td><button onclick='setProjectID(" . $row['projectID']. ");' >Doner</button></td>
				</tr>
				";
			}
			echo "</table>";
		}
	}
	



	//sjekk om doner knapp er trykket, dersom den er det, så trigges en funkjson som sender brukeren til å fylle inn info om donasjon i appen
	//global variabel blir selvsagt initialisert



	?>

	<br/><br/><br/><br/><br/>

	

</br></br></br></br>
<p>Skal implementere en funksjon som gjøre at brukeren må bekrefte med passord for å logge inn</p>

<script src="../js/jquery.js"></script>

<script type="text/javascript">


	//global variabel som settes når man trykker på "doner" i nyhetsoversikt eller prosjektoversikt
	//da initialiseres den når du trykker, henter så ut verdi fra global variabel når man skal sette inn i database
	function setProjectID(id){


		localStorage['registerDonationProjectID'] = id;
		$('input[name=projectID]').val("Prosjekt: " + id);
		window.location.replace('doDonation.php');
		

	}

	





	</script>

	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>






</body>
</html>