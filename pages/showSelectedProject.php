
<?php
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
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<!-- /Bootstrap Core CSS -->

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/list_project.css">
	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/fonts.css" rel="stylesheet"/>

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

<!-- Includes header -->
<?php
include "../pages/header_nav.php";
?>
<!-- End of header -->

<!-- php with HTML to fetch the project which is clicked -->
<?php
$projectID = $_SESSION['projectIDtoShow'];

$sql = "SELECT * FROM project WHERE projectID = $projectID";
$result = mysqli_query($connection, $sql);
if($result){
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$organizationNr = $row['organizationNr'];

		$backgroundimgURL = $row['backgroundimgURL'];

		if($backgroundimgURL == ""){
			$backgroundimgURL = "../img/default.png";
		}

		$name = $row['name'];
		$title = $row['title'];
		$about = $row['about'];
		$country = $row['country'];
		$city = $row['city'];

	}else{
		die("Alvorlig feil! SQL sprørringen etter " . $projectID . " returnerte mindre enn 1 eller mer enn 1 Prosjekt");
	}
}else{
	die("Feil i SQL spørringen: " . $_SESSION['projectIDtoShow']);
}
?>
<div class="container" >
	<div class="col-md-2"></div>
	<div class="col-md-8" id="selectednewscontainer">

		<div class="col-md-12 text-center" >
			<?php

			echo "<h1>" . $name . "</h1>";

			?>
			<!-- End of fetch clicked project -->
		</div>


		<div class="col-md-12">
		<!-- php to show the fetched project -->
			<?php
			echo '<input type="text" id="reg_project_input" class="form-control" name="projectName" placeholder="Prosjektnavn" value="' . $name . '" readonly/>
			<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL"/>
			<img src="'. $backgroundimgURL.'" id="Projectpreview" alt="Click to upload img" name="preview"/>
			<input type="text" id="reg_project_input" class="form-control" name="country" placeholder="Land" value="' . $country. '" readonly/>
			<input type="text" id="reg_project_input" class="form-control" name="city" placeholder="By" value="' . $city . '" readonly/>
			<input type="text" id="reg_project_input" class="form-control" name="title" placeholder="Prosjekt tittel" value="' . $title . '" readonly/>
			<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" placeholder="Prosjektbeskrivelse" readonly>' . $about . '</textarea>


			';

			?>
			<?php 
				echo '<div id="showselectednewsChange"onclick=showSelectedNews(' . $row['projectID'] . ')>';
				echo '<a href="change_projectinfo.php" id="Changebutton" onclick="showProject(' . $row['projectID'] . ')">Endre</a>';
				echo '</div>';
			?>
			<!-- End of showing fetched project -->

		</div>
		<div class="col-md-2"></div>
	</div>
</div>



<!-- jQuery -->
<script src="../js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<!-- Upload img js -->
<script type="text/JavaScript">
	$("#uploadimg").click(function() {
		$("#file1").trigger('click');
	});
</script>
</body>
<!-- -->
</html>