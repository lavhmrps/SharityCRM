<?php
session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
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
	<div class="container">
	<div class="row">
		

		<?php

		$sql = "SELECT * FROM Project WHERE organizationNr = $organizationNr";
		$result = mysqli_query($connection, $sql);



		if (mysqli_num_rows($result) >= 1) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<div class="col-md-3" id="projectcontainer">';
				echo '<div class="col-md-12" id="projectcontent">';
				echo "<h2>" . $row['name'] . "</h2>"; 
				echo "<h3>" . $row['title'] . "</h3>";
				echo "<p>" . $row['about'] . "</p><br/>";
				echo '</div>';
				echo "<div class='col-md-12' id='bottom'>";
				echo '<a href="../pages/showSelectedProject.php" onclick="showProject(' . $row['projectID'] . ')">Vis</a> - ';
				echo '<a href="change_projectinfo.php">Endre</a> - ';
				echo '<a href="">Slett</a>';
				echo '</div>';
				echo '</div>';
			}
		}
		?>
	</div>
</div>
<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script src="../js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>


<script src="../js/showProject.js"></script>



<!-- -->


</body>
</html>