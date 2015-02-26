<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link href="css/fonts.css" rel="stylesheet"/>
		<meta charset="UTF-8">
		<title>Sharity</title>
	</head>
	<body>

		<header>
			<div class="page-header-fixed-top text-center" id="header">
				<h1>Sharity</h1>
			</div>
		</header>

		<div class="content">
			<form method="post">
				<input type="submit" value="Logg ut" name="logout" id="logout"/>
		</div>

		<!-- JQuery (necessery for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- latest compiled and minified JavaScript -->
		<script src="//netdna.bootsrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	</body>
</html>

<?php

session_start();

if (!isset($_SESSION['organizationNr'])) {

	echo "We got a problem kåbbåy";
} else {
	echo "we aint got a problem with orgID: " . $_SESSION['organizationNr'] . " cuz Kåbbåy, u cool, im gonna call you: " . $_SESSION['name'] . " cuz u working with: " . $_SESSION['category'];

	echo "<br/><br/><br/><br/><img src='" . $_SESSION['backgroundimgURL'] . "'/>";

}

if (isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header("Location: index.php");
}
?>