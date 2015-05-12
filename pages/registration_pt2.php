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
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<!-- /Bootstrap Core CSS -->

	<!-- Custom CSS -->
	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/fonts.css" rel="stylesheet"/>
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<!-- /Custom CSS -->

	<!-- Scripts -->
	<script type="text/javascript">
		function skip(){
			window.location.replace('../pages/home.php');
		}
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

	<!--Sript for insert organization to database through AJAX request-->
	<script src="../js/updateOrganization.js"></script>
	

	<!--Sript for insert images to database through AJAX request-->
	<script src="../js/insertImg.js"></script>

	<!-- End of scripts -->
	</head>
	<body>

		<div class="col-md-3"></div>

		<!-- Box with all the inputs which have not yet been entered by the organization -->
		<div class="col-md-6" id="addprojectcontainer">
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
			

			<div class="col-md-12 text-center">
				<p>For å få full ytelse fra denne nettsiden og appen på telefon må disse feltene fylles ut. <br/>
					Disse feltene kan endres under "Min Organisasjon"-fanen når det måtte ønskes. <br/>
					Du kan utsette dette til neste innlogging ved å trykke på "Hopp over".</p>
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

								
								echo '<div class="col-md-10" id="registration_pt2_margin">';
								if($address == NULL || $address == ""){
									echo "<div class='row'>";
									echo "<div class='col-md-2'>";
									echo '<label id="registerorglabel">Adresse</label>';
									echo "</div>";
									echo "<div class='col-md-10 text-right spanpadding'>";
									echo "<span hidden name='title' class='errorspan'>Kun bokstaver, tall og mellomrom</span>";
									echo "</div>";
									echo "</div>";
									echo '<input type="text" class="form-control" placeholder="Eksempelveien 1" name="address" id="reg_pt2_input" />';
								}
								echo '</div>';
								echo '<div class="col-md-2" id="registration_pt2_margin2">';
								if($zipcode == NULL || $zipcode == ""){
									echo "<div class='row'>";
									echo "<div class='col-md-4'>";
									echo '<label id="registerorglabel">Postnr</label>';
									echo "</div>";
									echo "<div class='col-md-8 text-right spanpadding'>";
									echo "<span hidden name='title' class='errorspan'>4 tall</span>";
									echo "</div>";
									echo "</div>";
									echo '<input type="tel" class="form-control" name="zipcode" placeholder="0000" id="reg_pt2_inputZipcode"/>';
								}
								echo '</div>';

								if($phone == NULL || $phone == "" ){
									echo "<div class='row'>";
									echo "<div class='col-md-3'>";
									echo '<label id="registerorglabel">Telefonnummer</label>';
									echo "</div>";
									echo "<div class='col-md-9 text-right spanpadding'>";
									echo "<span hidden name='title' class='errorspan'>Kun akkurat 8 siffer</span>";
									echo "</div>";
									echo "</div>";
									echo '<input type="tel" class="form-control" name="phone" placeholder="12345678" id="reg_pt2_input" />';
								}
								if($email == NULL || $email == ""){
									echo "<div class='row'>";
									echo "<div class='col-md-3'>";
									echo '<label id="registerorglabel">Epost</label>';
									echo "</div>";
									echo "<div class='col-md-9 text-right spanpadding'>";
									echo "<span hidden name='title' class='errorspan'>Ugyldig epost</span>";
									echo "</div>";
									echo "</div>";
									echo '<input type="email" class="form-control" name="email" placeholder="eksempel@epost.no" id="reg_pt2_input" />';
								}
								
								if($website == NULL || $website == ""){
									echo "<div class='row'>";
									echo "<div class='col-md-3'>";
									echo '<label id="registerorglabel">Nettside</label>';
									echo "</div>";
									echo "<div class='col-md-9 text-right spanpadding'>";
									echo "<span hidden name='title' class='errorspan'>Følg dette formatet: eksempel.no</span>";
									echo "</div>";
									echo "</div>";
									echo '<input type="text" class="form-control" name="website" placeholder="eksempel.no" id="reg_pt2_input" />';
								}
								if(strlen($accountnumber) != 11){
									echo "<div class='row'>";
									echo "<div class='col-md-3'>";
									echo '<label id="registerorglabel">Kontonummer</label>';
									echo "</div>";
									echo "<div class='col-md-9 text-right spanpadding'>";
									echo "<span hidden name='title' class='errorspan'>Kun akkurat 11 siffer</span>";
									echo "</div>";
									echo "</div>";
									echo '<input type="tel" class="form-control" name="accountnumber" placeholder="1234 56 78901" id="reg_pt2_input" />';
								}
								if($category == NULL || $category == "NULL"){
									echo '<label id="registerorglabel">Kategori</label><div class="regOrgDropdown">
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
								echo "<div class='row'>";
								echo "<div class='col-md-4'>";
								echo '<label id="registerorglabel">Om organisasjonen</label>';
								echo "</div>";
								echo "<div class='col-md-8 text-right spanpadding'>";
								echo "<span hidden name='title' class='errorspan'>Minimum 20 og maks 300 tegn</span>";
								echo "</div>";
								echo "</div>";
								echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" id="aboutOrg" ></textarea>';
							}

							if($backgroundimgURL == NULL || $backgroundimgURL == ""){
								echo '


								<label>Bakgrunnsbilde</label>
								<input type="file" id="file_background" style="display:none" accept="image/*" name="backgroundimgURL" />

								<img src="../img/default.png" id="preview"  alt="Click to upload img" name="preview" />
								';
								/*<button  class="btn bluebtn" name="backgroundimgURLbutton" >
								Last opp bakgrunnsbilde
							</button>

							<form enctype="multipart/form-data">
								<input type="file" name="backgroundimgURL" style="display:none">
							</form> */

						}

						if($logoURL == NULL || $logoURL == ""){
							/*echo '
							<button  class="btn bluebtn" name="logoURLbutton">
								Last opp logo
							</button>

							<form enctype="multipart/form-data">
								<input type="file" name="logoURL" style="display:none">
							</form> 

							';*/

							echo '

							<label>Logo</label>
							<input type="file" id="file_logo" style="display:none" accept="image/*" name="logoURL" />

							<img src="../img/default.png" id="previewLogo"  alt="Click to upload img" name="previewLogo" />

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


		</div>
		<div class="col-md-2"></div>
	</div>




</div>
<!-- End of organizationregistration -->

<!-- Box to include a option to skip this site -->
<div class="col-md-3" id="skipContainer">

	<a style="cursor:pointer" onclick="skip()">Hopp over</a>
</div>
<!-- End of skipbox -->

</body>
</html>

