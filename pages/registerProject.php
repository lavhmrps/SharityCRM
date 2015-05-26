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

	<div class="container" >
		<div class="col-lg-2 col-md-1 col-xs-0"></div>

		<!-- Box to show all the projectregistration inputs -->
		<div class="col-lg-8 col-md-10 col-xs-12 text-center" id="addprojectcontainer">
			<h1>Opprett prosjekt</h1>
			
			<div class="col-lg-12 col-md-12 col-xs-12 text-left">
				<label>Bakgrunnsbilde</label>
				<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL"/>
				<img src="../img/default.png" id="preview" alt="Click to upload img" name="preview" />
				
				<div class="row">
					<div class="col-md-9">
						<label name="projectlabel" id="projectlabelmargin">Prosjektnavn</label>
					</div>
					<div class="col-md-3 spanpadding">
						<span hidden name="projectName" class="errorspan">Kun bokstaver og tall</span>  
					</div>
				</div>

				<input type="text" id="reg_project_input" class="form-control" name="projectName" placeholder=""/>
				
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-6">

						<div class="row">
							<div class="col-md-3">
								<label name="countrylabel" id="projectlabelmargin">Land</label>
							</div>
							<div class="col-md-9 spanpadding">
								<span hidden name="country" class="errorspan">Kun bokstaver, mellomrom og bindestrek</span>
							</div>
						</div>

						<input type="text" id="reg_project_input" class="form-control" name="country" placeholder=""/>
						

					</div>

					<div class="col-lg-6 col-md-6 col-xs-6">

						<div class="row">
							<div class="col-md-3">
								<label name="citylabel" id="projectlabelmargin">By</label>
							</div>
							<div class="col-md-9 spanpadding">
								<span hidden name="city" class="errorspan">Kun bokstaver, mellomrom og bindestrek</span>
							</div>
						</div>

						<input type="text" id="reg_project_input" class="form-control" name="city" placeholder=""/>
					</div>

				</div>

				
				<div class="row">
					<div class="col-md-9">
						<label name="titlelabel" id="projectlabelmargin">Tittel</label>
					</div>
					<div class="col-md-3 spanpadding">
						<span hidden name="title" class="errorspan">Kun bokstaver og tall</span>  
					</div>
				</div>

				<input type="text" id="reg_project_input" class="form-control" name="title" placeholder=""/>


				<div class="row">
					<div class="col-md-8">
						<label name="aboutlabel">Beskrivelse av prosjektet</label>
					</div>
					<div class="col-md-4 spanpadding">
						<span hidden name="title" class="errorspan">Minimum 20 tegn og maks 300 tegn</span>  
					</div>
				</div>
				<textarea class="form-control" id="aboutnews" rows="5" name="about" placeholder="" ></textarea>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-xs-6">
						<button  class="btn" name="registerProject" id="main-themebtn2">
							Registrer prosjekt
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
		<!-- End of projectregistration -->
	</div>




</div>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

<!-- Script to register if everything is typed right based on the standards we want -->
<!-- And to add a project to the database -->
<script type="text/javascript" src="../js/registerProject.js">







</script>
<!-- End of script -->