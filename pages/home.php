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
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sharity</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- /Bootstrap Core CSS -->

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/font.css" rel="stylesheet">

	<!-- Default CSS -->
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<!-- /Default CSS -->

	<!-- Alternate CSS -->
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
	<!-- /Alternate CSS -->
	<!-- /Custom CSS -->

	<!-- Scripts -->
		<!-- Script to change CSS -->
	<script src="../js/styleswitcher.js" type="text/javascript" ></script>
	<script src="../js/Chart.min.js"></script>
	<script src="../js/this_month_statistics.js"></script>
	<!-- End of Scripts -->
	

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	


	<!-- Includes header -->
	<?php
	include "header_nav.php";
	?>
	<!-- End of header -->


	<div class="container">
		<div class="col-lg-12 col-md-12 col-xs-12 homecontent">

			<!-- Organization infobox -->
			<div class="col-md-6" id="homebox">

				<div class="portrait">


					<div class="logodiv_left"></div>

				</div>


				<?php
				$organizationNr = $_SESSION['organizationNr'];
				$sql = "SELECT * FROM organization WHERE organizationNr = $organizationNr";
				$result = mysqli_query($connection, $sql);

				if ($result) {
					if (mysqli_num_rows($result) == 1) {


						$row = mysqli_fetch_assoc($result);

						$zip = $row["zipcode"];

						$postSQL = "SELECT city FROM post WHERE zipcode = '$zip'";
						$postResult = mysqli_query($connection, $postSQL);
						$postRow = mysqli_fetch_assoc($postResult);

						$city = utf8_encode($postRow['city']);


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
						<p>Adresse: ' . $row["address"] . ', ' . $row["zipcode"]. ' ' . $city .  '</p>
						<p>Nettside: <a target="_blank" href=" http://www.' . $row["website"]. '">' . $row["website"]. ' </a></p><br/>
						';
						echo '</div>';

						echo '<textarea class="form-control" name="about" id="aboutOrg" rows="4" style="cursor:default;" id="aboutproject" readonly>' . $row["about"] . '</textarea>';

					}
				} ?>

				<div class="col-md-6"></div>
				<div class="col-md-6 text-right" id="bottomhome">
					<a href="../pages/change_orginfo.php" id="changeOrginfoA">Endre informasjon</a>
				</div>

			</div>
			<!-- End of organization infobox -->

			<!-- Latest activities box -->
			<div class="col-md-6" id="homeboxupperright">
				<h2>Siste aktivitet</h2>
				<h3> - 26 nye følgere</h3>
				<h3> - 173 nye donasjoner</h3>
				<h3> - 48364kr donert</h3>
				<h3> - siden 05.06.2015</h3>
						
					
				

			</div>
			<!-- End of latest activities -->




			<!-- Home statistics box -->
			<div class="col-md-6" id="homeboxlowerright" style="text-align:center;">
				<h3>Donasjoner inneværende mnd</h3>
				<canvas id="this_month"></canvas>



			</div>
			<!-- End of home statistics -->

		</div>
	</div>
	<!-- jQuery -->
	<script src="../js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>



</body>
</html>

