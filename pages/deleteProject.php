<?php
session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
?>
<!DOCTYPE html>
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

	<link href="../css/Admin.css" rel="stylesheet">
	<!-- /Custom CSS -->

	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<!--Check login information-->
	<script src="../js/checkLogin.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

	<!-- Script to change CSS -->
	<script src="../js/styleswitcher.js" type="text/javascript" ></script>
	<!-- End of scripts -->

</head>
</body>
<!-- Includes header -->
<?php
include "../pages/header_nav.php";
?>
<!-- End of header -->


<div class="container">
	<!-- Connects to database and gets the projectinformation -->
	<?php
	$projectID = $_SESSION['projectIDtoShow'];

	$sql = "SELECT * FROM Project WHERE projectID = $projectID";
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
	<!-- End of databaseconnection -->

	<!-- Confirm deletion -->
	<div class="col-md-3"></div>
	<div class="col-md-6" id="selectednewscontainer">

		<div class="col-lg-12 col-md-12 col-xs-12 text-center">
			<form method="post">
				<h1 id="deletehead">Bekreft sletting</h1>
				<input type="text" name="organizationNr" class="form-control" id="uname" placeholder="Organisasjonsnummer"/>
				<input type="password" name="password" class="form-control" id="passwd" placeholder="Passord"/>
				

			</form>
		</div>

		

		<div class="col-md-12 text-center" >
			<?php

			echo "<h1>" . $name . "</h1>";

			?>
		</div>


		<div class="col-md-12">

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
			echo '</div>';
			?>
			<input type="submit" name="confirmDelete" class="form-control" id="deletebutton" value="Fjern prosjekt"/>
		</div>
		<div class="col-md-3"></div>
	</div>

</div>
<div class="col-md-3"></div>
<!-- /Confirmation -->

<!-- php to delete project -->
<?php
if(isset($_POST['confirmDelete'])){
	$organizationNr = $_POST['organizationNr'];
	$session_organizationNr = $_SESSION['organizationNr'];
	if($session_organizationNr == $organizationNr){
		$password = $_POST['password'];
		$sql = "SELECT * FROM organization WHERE organizationNr ='$session_organizationNr'";
		$result = mysqli_query($connection, $sql);
		if($result){
			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_assoc($result);
				$dbpassword = $row['password'];
				$hash = crypt($password, $dbpassword);
				if($hash == $dbpassword) {
					$projectIDtoDelete = $_SESSION['projectIDtoDelete'];
					echo "This to delete: ".  $projectIDtoDelete;

					$sql = "DELETE FROM project WHERE projectID ='$projectIDtoDelete'";
					$result = mysqli_query($connection, $sql);
					if($result){
						$sql = "DELETE FROM news WHERE projectID = '$projectIDtoDelete'";
						$result = mysqli_query($connection, $sql);
						header("Location: ../pages/showProjects.php");
					}
				}
			}
		} 
	}
}

?>
<!-- End of delete project -->


<!-- jQuery -->
<script src="js/jquery.js"></script>
<!--Check login information-->
<script src="checkLogin.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>


</body>


</html>