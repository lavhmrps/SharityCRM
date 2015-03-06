<!DOCTYPE html>
<html>
<head>

	<title>Generer data</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/Admin.css" rel="stylesheet">
</head>

</body>
<div class="container">

	<div class="col-md-3"></div>
	<div class="col-md-6 text-center" id="adminlogin">
		
		<h1 style="color:white;">Generer data</h1>

		<label style="color:white">Generer brukere</label>
		<input type="text" name="num_users" placeholder="Antall brukere" class="form-control"/>
		<button class="form-control" name="users">Generer bruker(e)</button>

		<br/>
		<br/>
		<br/>
		<br/>
		<label style="color:white">Generer Organisasjon</label>
		<input type="text" placeholder="Antall organisasjoner" class="form-control"/>
		<button class="form-control">Generer organisasjon(er)</button>

		<br/>
		<br/>
		<br/>
		<br/>
		<label style="color:white">Generer prosjekt</label>
		<input type="text" placeholder="Antall prosjekter" name="num_projects" class="form-control"/>
		<button class="form-control" name="projects">Generer prosjekt(er)</button>

		<br/>
		<br/>
		<br/>
		<br/>

		<label style="color:white">Generer donasjon</label>
		<input type="text" placeholder="Antall donasjoner" name="num_donations" class="form-control"/>
		<button class="form-control" name="donations">Generer donasjon(er)</button>




		



	</div>
	<div class="col-md-3"></div>


	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

</body>

<script type="text/javascript">

$(document).ready(function(){
	$('button[name=users]').click(function(){
		var antallBrukere = parseInt($('input[name=num_users]').val());

		var json = {"antall" : antallBrukere};
		json = JSON.stringify(json);

		$.ajax({
			type : "POST",
			url : "generateUsers.php",
			dataType: "text",
			data : {"antallBrukere" : json},
			success: function(response){
				if(response == "OK"){
					alert(antallBrukere + " ble forsøkt lagt inn\nHusk at brukere genereres med email: teller i for-løkken + @sharity.com\nPå grunn av dette vil det bli duplikat for email dersom du prøver å legge inn 10 brukere når det allerede finnes 100 brukere");
				}
			},
			error : function(response){
				alert("Noe gikk galt ved generering av brukere");
			}
		});

	});


	$('button[name=donations]').click(function(){
		var antallDonasjoner = parseInt($('input[name=num_donations]').val());

		var json = {"antall" : antallDonasjoner};
		json = JSON.stringify(json);

		$.ajax({
			type : "POST",
			url : "generateDonations.php",
			dataType: "text",
			data : {"antallDonasjoner" : json},
			success: function(response){
				if(response == "OK"){
					alert(antallDonasjoner + " er lagt til");
				}else{
					alert("GALT: " + response);
				}
			},
			error : function(response){
				alert("Noe gikk galt ved generering av donasjoner");
			}
		});



	});

	$('button[name=projects]').click(function(){
	
		var antallProsjekter = parseInt($('input[name=num_projects]').val());

		var json = {"antall" : antallProsjekter};
		json = JSON.stringify(json);

	

		$.ajax({
			type : "POST",
			url : "generateProjects.php",
			dataType: "text",
			data : {"antallProsjekter" : json},
			success: function(response){
				if(response == "OK"){
					alert(antallProsjekter + " er lagt til");
				}else{
					alert("GALT: " + response);
				}
			},
			error : function(response){
				alert("Noe gikk galt ved generering av prosjekter");
			}
		});



	});
});



</script>


</html>

