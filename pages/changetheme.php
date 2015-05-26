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

	
	<!-- Theme container-->
	<div class="container">
		<div class="col-lg-12 col-md-12 col-xs-12 text-center" id="themeheaderbox">
			<h1>Velg tema</h1>
		</div>

		<div class="row">

			<div class="col-md-12" id="themechoice1">
				
				<div class="col-md-12" id="themeheader">
					<h3>Overskrift</h3>
				</div>
				<div class="col-md-12" id="themebody">
					<div class="col-md-1 col-xs-0"></div>

					<div class="col-md-10 col-xs-12" id="themebox">
						<h3>Overskrift</h3>
						<p>Dette er en eksempeltekst for å vise fargebruken.</p>


						<div class="col-md-12">

							<label name="citylabel" id="themelabel">Inputfelt</label>
						
							<input type="text" id="reg_project_input" class="form-control" name="city" placeholder=""/>
						</div>


						<a href="#" id="choice1" onclick="setActiveStyleSheet('default'); return false;">Velg denne stilen!</a>
					</div>

					<div class="col-md-1 col-xs-0"></div>
				</div>

			</div>

			<div class="col-md-12" id="themechoice2">
				
				<div class="col-md-12" id="themeheader2">
					<h3>Overskrift</h3>
				</div>
				<div class="col-md-12" id="themebody2">
					<div class="col-md-1 col-xs-0"></div>

					<div class="col-md-10 col-xs-12" id="themebox2">
						<h3>Overskrift</h3>
						<p>Dette er en eksempeltekst for å vise fargebruken.</p>


						<div class="col-md-12">

							<label name="citylabel" id="themelabel2">Inputfelt</label>
						
							<input type="text" id="reg_project_input" class="form-control" name="city" placeholder=""/>
						</div>

						<a href="#" id="choice2" onclick="setActiveStyleSheet('alternate'); return false;">Velg denne stilen!</a>
					</div>

					<div class="col-md-1 col-xs-0"></div>
				</div>

			</div>

		</div>

	</div>
	<!-- End of theme container-->

			<!-- Two other alternate themes, but not good enough for use -->
				<!--<a href="#" onclick="setActiveStyleSheet('alternate2'); return false;">Pink</a> - 
				<a href="#" onclick="setActiveStyleSheet('alternate3'); return false;">Black&Yellow</a>-->
			<!-- End of unused alternate css choices -->




			<!-- Bootstrap Core JavaScript -->
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/changeTheme.js"></script>
		</body>
		</html>
