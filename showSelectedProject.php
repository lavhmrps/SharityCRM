
<?php

session_start();
include 'checkSession.php';
include 'checkSession.php';
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sharity</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet"/>

	<!-- Custom CSS -->
	<link href="css/scrolling-nav.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/list_project.css">
	<link href="css/main.css" rel="stylesheet"/>
	<link href="css/fonts.css" rel="stylesheet"/>

</head>
<?php
include "header_nav.php";
?>

<div class="container" id="phonecontainer">

	<?php
	$projectID = $_SESSION['projectIDtoShow'];
	$sql = "SELECT * FROM Project WHERE projectID = $projectID";
	$result = mysqli_query($connection, $sql);
	if($result){
		if(mysqli_num_rows($result) == 1){

			$row = mysqli_fetch_assoc($result);
			$organizationNr = $row['organizationNr'];
			$organizationName = "Mangler";


			$logoURL = "..."; // sett til default !!!!!VIKTIG MÅ MINNES PÅ!

			$sql1 = "SELECT * FROM Organization WHERE organizationNr = '$organizationNr'";

			$result1 = mysqli_query($connection, $sql1);

			if($result1){
				if(mysqli_num_rows($result1) == 1){
					$row1 = mysqli_fetch_assoc($result1);
					$organizationName = $row1['name'];
					$logoURL = $row1['logoURL'];
				}else{
					die('Noe alvorlig galt, prosjekt er ikke knyttet til en eksisterende organisasjon, dersom organisasjonen er slettet burde også prosjekt slettes, spørringen etter organisasjon med gitt orgnummer (hentet fra prosjekt) returnerte 0 eller flere rader og skal bare returnere 1 -vegard');
				}
			}else{
				die("Noe galt i spørringen");
			}

			echo 
			'
			<div class="col-md-5" id="phone">
				<div id="phonemargin1">
					<div id="page_organisation">
						<form id="registerProject">

						<div id="header_div" class="boxshadow">
							<div page-role="header" class="header_top"></div>
								<img src="img/arrow_left.png"
								class="show-page-loading-msg menu_icon back_icon">
								<h3 style="margin-left:100px; margin-top:30px;">' . $row['name'] . '</h3>
							</div>

						<!-- For toppbilde  -->
						<div class="portrait">

							<input type="file" id="file1"  name="file1" style="display:none" />
							<div id="uploadimg" >
								<p style="cursor:pointer; color:#000;">
									<u>Bakgrunnsbilde / toppbilde</u>
								</p>
							</div>

							<div class="logodiv_top_right">

								<img id="logoimg" src="' . $logoURL .'"/>

							</div>
						</div>
						<div class="space_btn">
							<button class="ui-btn btn_single_project_donate">
								DONÉR
							</button>
						</div>
							<div class="main_content">

								<h4>
									<span>
										<p>' . $row["country"] . ', ' . $row["city"] . '</p>
										
										
									</span>
								</h4>

								<h4 style="font-size:20px;"><b>' . $row["title"] . '</b></h4>

									<div class="form-group">
										<textarea class="form-control" name="about" id="aboutProj" rows="5" id="aboutproject" placeholder="' . $row["about"] . '" readonly></textarea>
									</div>

							</div>
						
						</form>

					</div>
					</div>

				</div>
			</div>

			<div col-md-5>
				<p> ProsjektID: ' . $row["projectID"] . ' </p>
				
				Bakgrunnsbilde: <img src=' . $row["backgroundimgURL"]. '/>
				<br/>
				Logo: <img id="logoimg" src="' . $logoURL .'"/> 
				
				<p> Org.Navn / No. tilknyttet: ' . $organizationName . ' Org.No. ' .  $organizationNr . '</p>
				<p> Sist oppdatert (egentlig er det opprettet, men dato oppdatere på update, burde ha begge deler - Vegard): ' . $row["date_added"] . '</p>

			</div>





			';
		}else{
			die("Alvorlig feil! SQL sprørringen etter " . $projectID . " returnerte mindre enn 1 eller mer enn 1 Prosjekt");
		}
	}else{
		die("Feil i SQL spørringen");
	}
	?>





	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<script src="js/stickyheader.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Upload img js -->
	<script type="text/JavaScript">
	$("#uploadimg").click(function() {
		$("#file1").trigger('click');
	});

	</script>

	<!--Sript for insert project to database through AJAX request-->
	<script src="insertProject.js"></script>


</body>
<!--  -->
</html>

