
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
	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/fonts.css" rel="stylesheet"/>

</head>
<?php
include "../pages/header_nav.php";
?>

<div class="container" id="phonecontainer">

	<div class="col-md-5" id="phone">
		<div id="phonemargin1">
			<div id="projectphoneTopheader">

			</div>
			<div id="projectphoneHeader">
				<img src="../img/arrow_left.png" id="backkey" alt="back-key">
				<input type="text" name = "name" id="topTitle" placeholder="Skriv navn" />
			</div>
			<div id="projectphoneContent">



				<div id="backgroundAndLogo">


					<input type="file" id="file_background" style="display:none;" accept="image/*" name="backgroundimgURL" />
					<button id="clear" style="display:none;"></button>
					<div id="uploadimg">

						<img src="../img/default.png" id="showImage" name="imagePreview" />

					</div>







					<div id="logocircle">
						<?php

						$organizationNr = $_SESSION['organizationNr'];
						$sql = "SELECT logoURL FROM Organization WHERE organizationNr = $organizationNr";
								$logoURL = "..."; // husk å sette dette til default bilde
								if($result = mysqli_query($connection, $sql)){
									if(mysqli_num_rows($result) == 1){
										$row = mysqli_fetch_assoc($result);
										$logoURL = $row['logoURL'];
									}else{	
										die("Alvorlig feil, sprørring etter org med orgnr ". $organizationNr . " returnerte 0 eller flere enn 1 rad");
									}
								}else{
									die('Feil i sql spørringen etter logoURL fra Organizaton');
								}

								echo "<img id='logoimg' src='../phpBackend/" .  $logoURL . "'/>";
								?>
							</div>


							<!-- End of backgroundAndLogo-->
						</div>



						<div id="donationcontainer">
							<div id="donationbtn">
								<p>DONÉR</p>
							</div>
						</div>
						<div id="countryCitycontainer">
							<p>
								<span>
									<input type="text" name = "country" id="inCountry" placeholder="Skriv inn land" />
								</span> , <span>
								<input type="text" name="city" id="inCity" placeholder="Skriv inn by" />
							</span>
						</p>
					</div>

					<div id="projectTitleContainer">
						<input type="text" name="title" id="bottomTitle" placeholder="Skriv prosjektets tittel"/>
					</div>
					<div id="projectAboutContainer">
						<textarea class="form-control" name="about" id="aboutProj" rows="5" id="aboutproject" placeholder="Skriv om prosjektet"></textarea>
					</div>

					<div id="projectSavebtnContainer">
						

						<input type="button" name="complete_ProjectReg" id="projectSavebtn" value="LAGRE"/>

						
					</div>

					<!-- End of projectphoneContent-->
				</div>
			</div>
		</div>
		<p id="errorPhp">Hello</p>

	</div>



	<!-- jQuery -->
	<script src="../js/jquery.js"></script>
	<script src="../js/stickyheader.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

	

	<!--Sript for insert project to database through AJAX request-->
	<script src="../js/insertProject.js"></script>

	<!-- preview img js -->
	<script src= "../js/insertImageTemp.js"></script>



</body>

</html>
