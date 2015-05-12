<?php
session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
if(isset($_POST['registerNews'])){
	$organizationNr = $_SESSION['organizationNr'];
}
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
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<!-- /Bootstrap Core CSS -->

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>
	<link href="../css/main.css" rel="stylesheet"/>

	<!-- Default CSS -->
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<!-- /Default CSS -->

	<!-- Alternate CSS -->
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
	<!-- /Alternate CSS -->
	<!-- /Custom CSS -->

	<!-- Script to change CSS -->
	<script src="../js/styleswitcher.js" type="text/javascript" ></script>
	<!-- End of script -->

</head>
<body>

	<!-- Includes header -->
	<?php
	include "../pages/header_nav.php";
	?>
	<!-- End of header -->

	<div class="col-md-3"></div>

	<!-- Settings container -->
	<div class="col-md-6" id="registernewscontainer">
		<div class="col-md-12 text-center" id="reg_pt2_head">


		</div>
		
		


		<div class="col-lg-12 col-md-12 col-xs-12 text-center">
			<h1>Velg tema:</h1>

			<a href="#" onclick="setActiveStyleSheet('default'); return false;">Default</a> - 
			<a href="#" onclick="setActiveStyleSheet('alternate'); return false;">Dark</a>
			<!--<a href="#" onclick="setActiveStyleSheet('alternate2'); return false;">Pink</a> - 
			<a href="#" onclick="setActiveStyleSheet('alternate3'); return false;">Black&Yellow</a>-->
			<br/><br/>
			<a href="../pages/change_orginfo.php" class="settinglink">Endre organisasjon</a>

			<h1>To do:</h1>
			<div class="col-md-6 text-left">
				<p>fikse font</p>

				<p>ORGSIDEN:</p>
				
				<p>Brødsmulesti</p>
				<p>Vaske og trimme stringer før de sendes til db</p>
				<p>Sjekke siden opp mot andre browsere</p>
				<p>Fikse last opp bilde og logo knapp på endre org siden</p>
				<p>Fikse bilde opplasting på reg nyhet og endre nyhet</p>
				<p>Change newsinfo funker det ikke å oppdatere.. legge til backend </p>
				<p>Fullfør-knappen på reg_pt2 sender deg ikke til home.php. fikse!</p>
				<p>Lage nylig aktivitet delen til home.php, slik at dette fungerer som det skal.</p>
				<p>Fikse statistikk på home.php</p>
				<p>Maks 8 prosjekter/nyheter pr side på "vis alle"?</p>
				<br/>
				<p>Statistikk:</p>
				<p>Lage ferdig stats.php</p>
				<p>evt. også legge til oversikt over nyheter og prosjekt pr dag/mnd/år</p>
				<p>Få opp et 50/50 doughnutchart om det er 0 og 0 som verdier på comparison.php</p>
				<p>Gjennomsnittsfølgere pr år/mnd/uke/dag på stats.php</p>
				<p>Gjennomsnittsnyhet/prosjekt pr år/mnd/uke/dag på stats.php</p>
				<br/>
				

			</div>
			<div class="col-md-6 text-left">
				<p>APP:</p>
				<p>Legge inn jquery lokalt</p>
				<p>Push</p>
				<p>Betalingsløsning</p>
				<p>Dele på Facebook</p>
				<br/>
				<p>NICE TO HAVE GENERELT:</p>
				<p>knapp for å ukryptere passord (login)</p>
				<p>Vis alle nyheter til prosjekt-knapp når man er inne på vis prosjekt?</p>
			</div>
		</div>

	</div>
	<!-- End of settingscontainer -->

	<div class="col-md-3"></div>
	<div class="col-md-12" id="somespace"></div>
</div>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
