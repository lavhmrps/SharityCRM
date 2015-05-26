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
	<!-- /Custom CSS-->

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


	<div class="container" >

		<div class="col-lg-2 col-md-1 col-xs-0"></div>

		<!-- Box to show all the newsregistration inputs-->
		<div class="col-lg-8 col-md-10 col-xs-12 text-center" id="addprojectcontainer">
			<h1>Opprett nyhet</h1>

			
			<div class="col-lg-12 col-md-12 col-xs-12 text-left">
				<label>Nyhetsbilde</label>
				<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />

				<img src="../img/default.png" id="preview" alt="Click to upload img" name="preview" />

				<p>
					<?php
					$organizationNr=$_SESSION["organizationNr"];
					$sql = "SELECT projectID, name FROM project WHERE organizationNr = $organizationNr";
					$result = mysqli_query($connection, $sql);
					if ($result) {
						echo "<label>Velg prosjekt</label>";
						echo "<select id='selectproject' name='projectID'>";
						echo "<option value='NULL'>Velg prosjekt</option>";
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option value=" . $row['projectID'] . ">" . $row['name'] . "</option>";
						}
						echo "</select>";
					} else {
						echo "<h2>Failure</h2>";
					}
					?>
				</p>

				<div class="row">
					<div class="col-md-9">
						<label>Nyhetsoverskrift</label>
					</div>
					<div class="col-md-3 spanpadding">
						<span hidden name="newsHeader" class="errorspan">Kun bokstaver og tall</span>  
					</div>
				</div>
				<input type="text" id="reg_news_input" class="form-control" name="newsHeader" placeholder=""/>

				<div class="row">
					<div class="col-md-8">
						<label id="newslabelmargin">Nyhetstekst</label>
					</div>
					<div class="col-md-4 spanpadding2">
						<span hidden name="title" class="errorspan">Minimum 20 tegn og maks 300 tegn</span>  
					</div>
				</div>

				<textarea class="form-control" id="aboutnews" rows="5" name="newsText" placeholder="Nyhetstekst" ></textarea>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-6">
						<button  class="btn" name="insertNews" id="main-themebtn2">
							Registrer nyhet
						</button>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-6">
						<button  class="btn" name="back" id="main-themebtn">
							Avbryt
						</button> <!-- Go back to last site -->
					</div>
				</div>


			</div>
			
			

		</div>
		<!-- End of news registration -->

		<div class="col-lg-2 col-md-1 col-xs-0"></div>
		<div class="col-md-12" id="somespace"> </div>
	</div>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<!-- Script to register if everything is typed right based on the standards we want -->
<!-- And to add the news to the database -->
<script src="../js/registerNews.js" type="text/javascript"></script>	
<!-- End of script -->