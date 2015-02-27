<?php

session_start();
include 'checkSession.php';
include 'connect.php';
?>

<html>
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
<body>
	<?php
	include "header_nav.php";
	?>

	<div class="row">
		
		<div class="col-md-3 " id="projectmenu">

			<form method="post" action="#">
				<input type="Submit" value="Statistikk?" class="" name="" id="projectmenubtntop"/>
			</form>

			<input type="Submit" value="Kronologisk" class="" name="" id="projectmenubtn"/>
			<input type="Submit" value="Geografisk" class="" name="" id="projectmenubtn"/>
			<input type="Submit" value="Demografisk" class="" name="" id="projectmenubtn"/>
			<input type="Submit" value="Aristokratisk" class="" name="" id="projectmenubtnbottom"/>


		</div>


		<div class="col-md-9">
		<?php
		
		$organizationNr = $_SESSION['organizationNr'];
		
		if (isset($_POST['showStatistics'])) {
			
			$sql = "SELECT Donation.*, Project.name FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE Project.organizationNr = $organizationNr";
			$result = mysqli_query($connection, $sql);

			if ($result) {
				echo "Antall donasjoner: " . mysqli_num_rows($result) . "</br>";
				while ($row = mysqli_fetch_assoc($result)) {

					echo "Donert til prosjektID: " . $row['projectID'];
					echo "<br/>Sum donert: " . $row['sum'] . " kr";
					echo "<br/>Prosjektnavn: " . $row['name'];
					echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
				}
			} else {
				echo "<h2>Failure</h2>";
			}
		}
		
		

		?>

		<form method="post">
			<input type="submit" value="Vis statistikk" name="showStatistics"/>

		</form>
		</div>
</div>

	</body>
	</html>

