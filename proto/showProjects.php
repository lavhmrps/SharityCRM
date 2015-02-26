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

	<input type="text" name="projectID" readOnly placeholder="gå tilbake og velg nyhet/prosjekt"/><br/>
	<select name="donationType">
		<option value="NULL">Velg donasjonstype</option> 
		<option value="engangstrekk">Engangstrekk</option>
		<option value="fast trekk">Fast trekk</option>
	</select>

	<br/>

	<input name="sum" type="number" placeholder="f.eks kr 275,-"/>

	<br/>

	<input name="email" type="text" value="<?php echo $_SESSION['email']?>"  readonly/>
	<br/>
	<input name="password" type="password" placeholder="Bekreft med passord"/>
	<br/>
	<input type="submit" name="confirmDonation" value="Bekreft donasjon"/>

</br></br></br></br>
<p>Skal implementere en funksjon som gjøre at brukeren må bekrefte med passord for å logge inn</p>

<script src="../js/jquery.js"></script>

<script type="text/javascript">


	//global variabel som settes når man trykker på "doner" i nyhetsoversikt eller prosjektoversikt
	//da initialiseres den når du trykker, henter så ut verdi fra global variabel når man skal sette inn i database
	var projectID = "";
	function setProjectID(id){
		//alert("Doner til: " + id);
		//initialiserer global variabel
		projectID = id; //setter initialiserer global variabel
		$('input[name=projectID]').val("Prosjekt: " + id);
		

	}
	function getSelectedProjetID(){
		return projectID;
	}
	function clearInput(){
		$('input[name=projectID]').val("");
		$('select[name=donationType]').val("NULL");
		$('input[name=sum]').val("");
		$('input[name=email]').val("");	
		$('input[name=password]').val("");
		

	}
	
	
	$('input[name=confirmDonation]').click(function(event){
		
		var type = $('select[name=donationType]').val();
		var sum = $('input[name=sum]').val();
		var email = $('input[name=email]').val();

		var missingValues = "";

		if(projectID == ""){
			missingValues += "prosjekt";
		}

		if(sum == ""){
			missingValues += ", sum";
		}

		
		if(type == "NULL"){
			missingValues += ", donasjonstype";
		}

		if(missingValues != ""){
			alert(missingValues + " må fylles inn");
			return false;
		}

		var donationJSON = {
			"projectID" : projectID,
			"email" : email,
			"type" : type,
			"sum" : sum
		};

		donationJSON = JSON.stringify(donationJSON);

		$.ajax({
			type : "POST",
			datatype : "JSON",
			url : "insertDonation.php",
			data : {'donation' : donationJSON},
			success : function(response){
				alert("Donasjonen er gjennomført");
				clearInput();
			},
			error : function(response){
				console.log(response.message);
			}
		});



		event.preventDefault();

	});





	</script>

	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>






</body>
</html>