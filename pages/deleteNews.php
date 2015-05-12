
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

	<!-- Connects to database and gets the newsinfo -->
	<?php

	$newsID = $_SESSION['newsIDtoShow'];
	$sql = "SELECT * FROM News WHERE newsID = $newsID";
	$result = mysqli_query($connection, $sql);
	if($result){
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$projectID = $row['projectID'];

			$sql1 = "SELECT name FROM Project WHERE projectID = '$projectID'";
			$result1 = mysqli_query($connection, $sql1);

			if($result1){
				if(mysqli_num_rows($result1) == 1){
					$row1 = mysqli_fetch_assoc($result1);
					$projectName = $row1['name'];
				}
			}
			$backgroundimgURL = $row['backgroundimgURL'];

			if($backgroundimgURL == ""){
				$backgroundimgURL = "../img/default.png";
			}

			$title = $row['title'];

			$txt = $row['txt'];

		}else{

		}
	}else{

	}


	?>
	<!-- End of databaseconnection -->

	<!-- Comfirm deletion -->
	<div class="container" >
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
				<?php echo "<h1>" . $title . "</h1>"?>
			</div>






			<div class="col-md-12">

				<?php
				echo '<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />';
				echo '<img src="../phpBackend/'. $backgroundimgURL . '" id="shownewspreview" alt="Click to upload img" name="preview" />';
				echo '<input type="text" id="reg_news_input" class="form-control" name="newsHeader" placeholder="Nyhetsoverskrift" value="' . $title . '"readonly/>';
				echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="newsText" placeholder="Nyhetstekst" readonly>'. $txt .'</textarea>';
				echo '<div id="showselectednewsChange"onclick=showSelectedNews(' . $row['newsID'] . ')>';
				echo '</div>';
				?>
				<input type="submit" name="confirmDelete" class="form-control" id="deletebutton" value="Fjern prosjekt"/>
		
				

			</div>
			<div class="col-md-3"></div>


		</div>
	</div>
	<!-- End of confirmation -->
</body>
</html>


	