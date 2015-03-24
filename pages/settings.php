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
	<div class="col-md-6">
		<div class="col-md-12 text-center" id="reg_pt2_head">


		</div>
		<div id="regcontainer">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center" id="registernewscontainer">
					
				</div>
				<div class="col-md-12 text-center" id="">

					<h1>Velg tema:</h1>

					<a href="#" onclick="setActiveStyleSheet('default'); return false;">Default</a> - 
					<a href="#" onclick="setActiveStyleSheet('alternate'); return false;">Dark</a> - 
					<a href="#" onclick="setActiveStyleSheet('alternate2'); return false;">Pink</a> - 
					<a href="#" onclick="setActiveStyleSheet('alternate3'); return false;">Mææ!</a>

				</div>
			</div>


			<div class="col-lg-12 col-md-12 col-xs-12 text-center">
				<h1>To do:</h1>
				<div class="col-md-6 text-left">
					<p>fikse font</p>
					<p>Starte på statistikk</p>
					<p>Vise antall nye faste givere og mistede givere</p>
					<p>EKS: Faste givere: +42 denne mnd.</p>
					<p>Alle script skal si "OK" om de blir kjørt</p>
					<p>Hente poststed automatisk på home.php</p>
					<p>trimme loginstring før den sjekkes mot db</p>
					<p>Vaske og trimme stringer før de sendes til db</p>
					<br/>
					<p>Legge inn jquery lokalt i app</p>
				</div>
				<div class="col-md-6 text-left">
					<p>Fikse adminlogin</p>
					<p>Statistikk</p>
					<p>Endre/slette bruker</p>
					<p>Endre/slette organisasjon</p>
					<p>Endre/slette til de andre dbene også..</p>
				</div>
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
