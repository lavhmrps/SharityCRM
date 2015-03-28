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
	include "header_nav.php";
	?>


	<div class="container">
		<div class="col-lg-12 col-md-12 col-xs-12 homecontent">
			<div class="col-md-6" id="homebox">

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


			<div class="col-md-6" id="homeboxupperright">
				<h2>Nylig aktivitet</h2>

				<p>La til nytt prosjekt med tittel "Tittel"</p>
				<p>La til nytt prosjekt med tittel "Tittel"</p>
				<p>La til nytt prosjekt med tittel "Tittel"</p>
				<p>La til nytt prosjekt med tittel "Tittel"</p>
				<p>La til nytt prosjekt med tittel "Tittel"</p>


			</div>





			<div class="col-md-6" id="homeboxlowerright">

				<h2>Inneværende mnd:</h2>
				<p>statstikkstatistikkstatistikk</p>
				<p>statstikkstatistikkstatistikk</p>
				<p>statstikkstatistikkstatistikk</p>
				<p>statstikkstatistikkstatistikk</p>
				<p>statstikkstatistikkstatistikk</p>



			</div>

		</div>
	</div>
	<!-- jQuery -->
	<script src="../js/jquery.js"></script>
	<script src="../js/stickyheader.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>



</body>
</html>

