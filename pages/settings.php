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
	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>


	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

	<script src="../js/styleswitcher.js" type="text/javascript" ></script>

</head>
<body>

	<?php
	include "../pages/header_nav.php";
	?>

	<div class="col-md-3"></div>
	<div class="col-md-6" id="registernewscontainer">
		<div class="col-md-12 text-center" id="reg_pt2_head">


		</div>
		
		


		<div class="col-lg-12 col-md-12 col-xs-12 text-center">
			<h1>Velg tema:</h1>

			<a href="#" onclick="setActiveStyleSheet('default'); return false;">Default</a> - 
			<a href="#" onclick="setActiveStyleSheet('alternate'); return false;">Dark</a> - 
			<a href="#" onclick="setActiveStyleSheet('alternate2'); return false;">Pink</a> - 
			<a href="#" onclick="setActiveStyleSheet('alternate3'); return false;">Black&Yellow</a>
			<br/><br/>
			<a href="../pages/change_orginfo.php" class="settinglink">Endre organisasjon</a>

			<h1>To do:</h1>
			<div class="col-md-6 text-left">
				<p>fikse font</p>

				<p>ORGSIDEN:</p>
				<p>statistikk</p>
				<p>Internal frames på statistikk? og gjøre de visible</p>
				<p>Brødsmulesti</p>
				<p>Alle script skal si "OK" om de blir kjørt</p>
				<p>Vaske og trimme stringer før de sendes til db</p>
				<p>Sjekke siden opp mot andre browsere</p>
				<p>Fikse last opp bilde og logo knapp på endre org siden</p>
				<p>Fikse bilde opplasting på reg nyhet og endre nyhet</p>
				<p>Generelt fikse bildeopplastning slik at vi har tillatelse til å bruke bildene som blir lagt inn i db</p>
				<p>Vis alle nyheter til prosjekt-knapp når man er inne på vis prosjekt?</p>
				<p>Change newsinfo funker det ikke å oppdatere.. legge til backend </p>
				<p>Lage FAQ-side</p>
				<br/>
				

			</div>
			<div class="col-md-6 text-left">
				<p>ADMINSIDEN:</p>
				<p>Statistikk</p>
				<p>Backend til alle sidene.</p>
				<br/>
				<p>APP:</p>
				<p>Legge inn jquery lokalt</p>
				<p>Push</p>
				<p>Betalingsløsning</p>
				<br/>
				<p>NICE TO HAVE GENERELT:</p>
				<p>knapp for å ukryptere passord (login)</p>
			</div>
		</div>

	</div>

	<div class="col-md-3"></div>
	<div class="col-md-12" id="somespace"></div>
</div>
<script src="../js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
