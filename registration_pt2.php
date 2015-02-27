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
	<link href="css/bootstrap.min.css" rel="stylesheet"/>

	<!-- Custom CSS -->
	<link href="css/main.css" rel="stylesheet"/>
	<link href="css/fonts.css" rel="stylesheet"/>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

	<body>

		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="col-md-12 text-center" id="reg_pt2_head">
				<?php

				$sql = "SELECT * FROM Organization WHERE organizationNr = $organizationNr";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);
						echo "<h1>" . $row['name'] . "</h1>";
					}
				}
				?>

			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
					<p>For å få full ytelse fra denne nettsiden og appen på telefon, så må disse feltene fylles ut. <br/>
						Disse feltene kan endres under "Min Organisasjon"-fanen når det måtte ønskes. <br/>
						Du kan utsette dette til neste innlogging ved å trykke på "Hopp over".</p>
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">



						<?php

						$sql = "SELECT * FROM Organization WHERE organizationNr = $organizationNr";
						$result = mysqli_query($connection, $sql);

						if($result){
							if(mysqli_num_rows($result) == 1){
								$row = mysqli_fetch_assoc($result);



								$category = $row['category'];
								$phone = $row['phone'];
								$address = $row['address'];
								$zipcode = $row['zipcode'];
								$logoURL = $row['logoURL'];
								$backgroundimgURL = $row['backgroundimgURL'];
								$website = $row['website'];
								$accountnumber = $row['accountnumber'];
								$email = $row['email'];
								$about = $row['about'];

								

								if($address == NULL || $address == ""){
									echo '<input type="text" class="form-control" name="address" id="reg_pt2_input" placeholder="Adresse"/>';
								}

								if($zipcode == NULL || $zipcode == ""){
									echo '<input type="tel" class="form-control" name="zipcode" id="reg_pt2_input" placeholder="Postnummer"/>';
								}

								if($phone == NULL || $phone == "" ){
									echo '<input type="tel" class="form-control" name="phone" id="reg_pt2_input" placeholder="Telefonnummer"/>';
								}
								if($email == NULL || $email == ""){
									echo '<input type="email" class="form-control" name="email" id="reg_pt2_input" placeholder="Email"/>';
								}
								
								if($website == NULL || $website == ""){
									echo '<input type="text" class="form-control" name="website" id="reg_pt2_input" placeholder="Nettside"/>';
								}
								if(strlen($accountnumber) != 11){
									echo '<input type="tel" class="form-control" name="accountnumber" id="reg_pt2_input" placeholder="Kontonummer"/>';
								}
								if($category == NULL || $category == "NULL"){
									echo '<div class="regOrgDropdown">
									<select class="orgbtn1" name="category">
									<option value="NULL">Velg kategori</option>
									<option value="Humanitært" >Humanitært</option>
									<option value="Dyrevern" >Dyrevern</option>
									<option value="Forskning" >Forskning</option>
									<option value="Fundraising" >Fundraising</option>
									</select>
									</div>';
								}
								if($about == NULL || $about == ""){
									echo '<textarea class="form-control" id="aboutOrg" rows="5" name="about" id="aboutOrg" placeholder="Om organisasjonen" ></textarea>';
								}

								if($backgroundimgURL == NULL || $backgroundimgURL == ""){
									echo '
									<button  class="btn bluebtn" name="backgroundimgURLbutton" >
										Last opp bakgrunnsbilde
									</button>

									<form enctype="multipart/form-data">
										<input type="file" name="backgroundimgURL" style="display:none">
									</form> 

									';

								}
								if($logoURL == NULL || $logoURL == ""){
									echo '
									<button  class="btn bluebtn" name="logoURLbutton">
										Last opp logo
									</button>

									<form enctype="multipart/form-data">
										<input type="file" name="logoURL" style="display:none">
									</form> 

									';
								}



								if($category != NULL && $phone != NULL && $address != NULL && $zipcode != NULL
									&& $logoURL != NULL && $backgroundimgURL != NULL && $website != NULL 
									&& $accountnumber != NULL && $email != NULL && $about != NULL &&

									$category != "" && $phone != "" && $address != "" && $zipcode != "" 
									&& $logoURL != "" && $backgroundimgURL != "" && $website != "" 
									&& $accountnumber != "" && $email != "" && $about != ""

									){
									header("Location: home.php");

							}else{
								echo '
								<button  class="btn btn-success" name="complete_registration">
									Fullfør (2/2)
								</button>

								


								';
							}




						}
					}


					?>

						<!--
						<button  class="btn bluebtn" name="complete_registration">
							Hopp over
						</button> -->
						

					</div>
					<div class="col-md-2"></div>
				</div>

				


			</div>
			<div class="col-md-3"></div>




			<div class="col-md-12" id="somespace"></div>
			<div class="col-md-12 text-right" id="skipContainer">
				<a href="home.php">Hopp over</a>
			</div>


			<!-- jQuery -->
			<script src="js/jquery.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>

			<!-- Scrolling Nav JavaScript -->
			<script src="js/jquery.easing.min.js"></script>
			<script src="js/scrolling-nav.js"></script>

			<!--Sript for insert organization to database through AJAX request-->
			<script src="updateOrganization.js"></script>
			
			<!--Sript for insert images to database through AJAX request-->
			<script src="insertImg.js"></script>


		</body>

		</html>
