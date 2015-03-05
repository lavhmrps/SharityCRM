<?php

session_start();
if(!isset($_SESSION['email'])){
	echo '<h1>Ikke logget inn</h1>';
	header("Location: index.php");
}

include 'connect.php';




?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/Admin.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#projectID').text("Prosjekt: " + localStorage['registerDonationProjectID']);


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
				"projectID" : localStorage['registerDonationProjectID'],
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
	});
</script>
</head>

</body>
<div class="container">

	<div class="col-md-3"></div>
	<div class="col-md-6 text-center" id="adminlogin">
		<form>
			<h1 id="projectID" style="color:white;"></h1>
			<label style="color:white">Velg donasjonstype</label>
			<select name="donationType" class="form-control">
				<option value="NULL"></option> 
				<option value="engangstrekk">Engangstrekk</option>
				<option value="fast trekk">Fast trekk</option>
			</select>
			<label style="color:white">Sum</label>
			<input name="sum" type="number" class="form-control" placeholder="f.eks kr 275,-"/>

			<label style="color:white">E-postadresse</label>
			<input name="email" type="text" value="<?php echo $_SESSION['email']?>"  class="form-control" readonly/>

			<label style="color:white">Passord</label>
			<input name="password" type="password" placeholder="" class="form-control"/>


			<label></label>
			<input type="submit" name="confirmDonation" value="Bekreft donasjon" class="form-control"/>
			


		</form>
		

	</div>
	<div class="col-md-3"></div>


	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!--Check login information-->
	<script src="checkLogin.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

</body>


</html>




