<?php



/*Starter session*/
session_start();

include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
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
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/font.css" rel="stylesheet">
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

	<script src="../js/styleswitcher.js" type="text/javascript" ></script>
	

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<?php
	include '../pages/header_nav.php';
	?>

	<div class="col-md-3" id="homebox">



		<?php
		$organizationNr = $_SESSION['organizationNr'];
		$sql = "SELECT * FROM Project WHERE organizationNr = $organizationNr ORDER BY date_added DESC LIMIT 1";
		$result = mysqli_query($connection, $sql);




		while ($row = mysqli_fetch_assoc($result)) {
			echo "<img src='" . $row['backgroundimgURL'] . " ' alt='Bakgrunnsbilde' id='projectBackground'/>";
			echo "<h2>" . $row['name']."</h2>";
			echo "<br/><h3>" . $row['title']."</h3>";
			echo "<br/><h4>" . $row['country'];
			echo ", " . $row['city']."</h4>";
			echo "<br/>Om prosjektet: " . $row['about'];
			echo "<br/><br/><br/><br/>";

		}


		?>
		<div class="col-md-6 text-right"></div>
		<div class="col-md-6 text-right">
			<a href="../pages/showProjects.php" id="changeOrginfoA">Vis alle prosjekter</a>
		</div>


	</div>


	<div class="col-md-5" id="homebox">
		

		<div class="portrait">
			

			<div class="logodiv_left"></div>

		</div>


		<?php
		$organizationNr = $_SESSION['organizationNr'];
		$sql = "SELECT * FROM Organization WHERE organizationNr = $organizationNr";
		$result = mysqli_query($connection, $sql);

		if ($result) {
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);

				echo '<div class="col-md-0"></div>';
				echo "<h2>" . $row['name'] . "</h2>";
				
				echo '<div class=" text-center" id="imagecontainer">';
				echo "<img src='" . $row['backgroundimgURL'] . " ' alt='Bakgrunnsbilde' id='orgBackground'/>";
				echo '<div class="orglogoimg">';
				echo "<img src='" . $row['logoURL'] . "' alt='Organisasjonslogo'  id='orgLogo'/>";
				echo ' </div> ';
				echo '</div>';
				echo '<div class="col-md-0"></div>';

				echo '<div class="row">';
				echo '<div class="col-md-6" id="aboutOrgPadding">';
				echo '<p>Orgnr: ' . $row["organizationNr"] . '</p>
				<p>Telefon: ' . $row["phone"]. '</p>';


				echo '</div>';

				echo '<div class="col-md-6" id="aboutOrgPadding2">';

				echo '<p>Kategori: ' . $row["category"]. '</p>

				<p>Kontonummer: ' . $row["accountnumber"] . '</p>';

				echo "</div>";
				echo "</div>";
				echo "<br/>";

				echo '<div class="col-md-12" id="orgInfo">';
				echo '<p>Epost: ' . $row["email"]. '</p>
				<p>Adresse: ' . $row["address"] . ', ' . $row["zipcode"]. ' Poststed?!?</p>
				<p>Nettside: <a href="' . $row["website"]. '">' . $row["website"]. '</a></p><br/>
				';
				echo '</div>';

				echo '<textarea class="form-control" name="about" id="aboutOrg" rows="4" style="cursor:default;" id="aboutproject" readonly>' . $row["about"] . '</textarea>';






			}
		} ?>
		
		<div class="col-md-6"></div>
		<div class="col-md-6 text-right">
			<a href="../pages/change_orginfo.php" id="changeOrginfoA">Endre informasjon</a>
		</div>
	</div>





<div class="col-md-3" id="homebox">
	
	<?php
	$organizationNr = $_SESSION['organizationNr'];

	$sql = "SELECT News.*, Project.name FROM News INNER JOIN Project ON News.projectID = Project.projectID WHERE Project.organizationNr = $organizationNr ORDER BY date_added DESC LIMIT 1";
	$result = mysqli_query($connection, $sql);




	while ($row = mysqli_fetch_assoc($result)) {
		echo "<img src='" . $row['backgroundimgURL'] . " ' alt='Bakgrunnsbilde' id='projectBackground'/>";
		echo "<h2>" . $row['title']."</h2>";
		echo "<br/>Om prosjektet: " . $row['txt'];
		echo "<br/><br/><br/><br/>";

	}


	?>
	<div class="col-md-6 text-right"></div>
	<div class="col-md-6 text-right">
		<a href="../pages/showNews.php" id="changeOrginfoA">Vis alle nyheter</a>
	</div>

	

</div>
<div class="col-md-12 text-center" id="">
	
	<h1>Velg tema:</h1>

	<a href="#" onclick="setActiveStyleSheet('default'); return false;">Default</a> - 
	<a href="#" onclick="setActiveStyleSheet('alternate'); return false;">Dark</a> - 
	<a href="#" onclick="setActiveStyleSheet('alternate2'); return false;">Pink</a> - 
	<a href="#" onclick="setActiveStyleSheet('alternate3'); return false;">Mææ!</a>

</div>

<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script src="../js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>



</body>
</html>

