
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
	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/list_project.css">
	<link href="../css/vegard_main.css" rel="stylesheet"/>
	<link href="../css/fonts.css" rel="stylesheet"/>
</head>
<?php
include "../pages/header_nav.php";
?>

<?php
$projectID = $_SESSION['projectIDtoShow'];
$sql = "SELECT * FROM Project WHERE projectID = $projectID";
$result = mysqli_query($connection, $sql);
if($result){
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$organizationNr = $row['organizationNr'];
		$backgroundimgURL = $row['backgroundimgURL'];
		$name = $row['name'];
		$title = $row['title'];
		$about = $row['about'];
		$country = $row['country'];
		$city = $row['city'];

	}else{
		die("Alvorlig feil! SQL sprørringen etter " . $projectID . " returnerte mindre enn 1 eller mer enn 1 Prosjekt");
	}
}else{
	die("Feil i SQL spørringen");
}
?>

<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="col-md-12 text-center" id="reg_pt2_head">


	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 text-center">
			<?php

				echo "<h1 style='color:black'>" . $name . "</h1>";

			?>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<?php
			echo '<input type="text" id="reg_project_input" class="form-control" name="projectName" placeholder="Prosjektnavn" value="' . $name . '" readonly/>




			<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL"/>

			<img src="../phpBackend/'. $backgroundimgURL.'" id="preview" alt="Click to upload img" name="preview"/>
			<input type="text" id="reg_project_input" class="form-control" name="country" placeholder="Land" value="' . $country. '" readonly/>
			<input type="text" id="reg_project_input" class="form-control" name="city" placeholder="By" value="' . $city . '" readonly/>
			<input type="text" id="reg_project_input" class="form-control" name="title" placeholder="Prosjekt tittel" value="' . $title . '" readonly/>
			<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" placeholder="Prosjektbeskrivelse" readonly>' . $about . '</textarea>


			';

			?>


		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<div class="col-md-3"></div>
<div class="col-md-12" id="somespace"></div>
</div>


<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script src="../js/stickyheader.js"></script>
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