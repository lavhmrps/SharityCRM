<?php
session_start();
include 'checkSession.php';
include 'connect.php';
$organizationNr = $_SESSION['organizationNr'];
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
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/scrolling-nav.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/font.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<?php
	include 'header_nav.php';
	?>



	<div class="row">
		
		<div class="col-md-3" id="projectmenu">
			
			
			<form method="post" action="registerNews.php"/>
			<input type="Submit" value="Registrer nyhet" class="" name="" id="projectmenubtntop">
		</form>
		<input type="Submit" value="Something else" class="" name="" id="projectmenubtn"/>
		<input type="Submit" value="Anything" class="" name="" id="projectmenubtn"/>
		<input type="Submit" value="Anything really" class="" name="" id="projectmenubtnbottom"/>


	</div>
	<?php

	$sql = "SELECT News.title, News.txt FROM News INNER JOIN Project ON News.projectID = Project.projectID WHERE Project.organizationNr = $organizationNr";
			//$sql = "SELECT title, txt FROM News WHERE projectID = 1";
	$result = mysqli_query($connection, $sql);



	if (mysqli_num_rows($result) >= 1) {

		while ($row = mysqli_fetch_assoc($result)) {
			echo '<div class="col-md-3" id="projectcontainer">';
			echo '<div class="col-md-12" id="projectcontent">';
			echo "<h3>" . $row['title'] . "</h3>";
			echo "<p>" . $row['txt'] . "</p>";
			echo '</div>';
			echo "<div class='col-md-12' id='bottom'>";
			echo '<a href="">Vis</a> - ';
			echo '<a href="">Endre</a> - ';
			echo '<a href="">Slett</a>';
			echo '</div>';
			echo '</div>';

		}

	}
	?>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Scrolling Nav JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/scrolling-nav.js"></script>

</body>
</html>