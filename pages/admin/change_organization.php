<?php
	//include '../phpBackend/connect.php';
	$connection = mysqli_connect("localhost", "root", "", "database") or die("Kunne ikke koble til database");
?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>
	

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
</head>

<body>

<?php
	include 'adminHeader_nav.php';
?>




<div class="container">
	<div>
		<div class="col-md-3"></div>

		<div class="col-md-6 text-center" id="">
			<div class="row">
			<form action="" method="post">
				<div class="col-md-10"> 
					<input type="text" name="orgnr" class="form-control" id="orgnt" placeholder="Søk.."/>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn" name="submit" id="searchbtn">
						Søk
					</button>
				</div>
			</form>
			</div>

			


			<!-- Bare putt infoen som ble funnet ved søket i databasen inn her inntil videre.. så fikser jeg utseende senere. B :)-->
				<?php		
					if(isset($_POST['submit'])){
						$orgnr = $_POST['orgnr'];


						$sql = "SELECT * FROM Organization WHERE organizationNr = '$orgnr'";
						$result = mysqli_query($connection, $sql);

						if($result){

							if(mysqli_num_rows($result) == 1){

                        		$row = mysqli_fetch_assoc($result);
                        		echo "<h1>" . $row['name'] . "</h1>";


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
                            	
                            	echo "<label>Adresse</label>";
                            	echo '<input type="text" class="form-control" name="address" id="reg_pt2_input" placeholder="" value="' . $address . '"/>';

                            	echo "<label>Postnummer</label>";
                            	echo '<input type="tel" class="form-control" name="zipcode" id="reg_pt2_input" placeholder="" value="' . $zipcode . '"/>';

                            	echo "<label>Telefonnummer</label>";
                            	echo '<input type="tel" class="form-control" name="phone" id="reg_pt2_input" placeholder="" value = "' . $phone . '"/>';
                            
                            	echo "<label>E-postadresse</label>";
                            	echo '<input type="email" class="form-control" name="email" id="reg_pt2_input" placeholder="" value="'. $email . '"/>';
                            
                            	echo "<label>Link til hjemmeside</label>";
                            	echo '<input type="text" class="form-control" name="website" id="reg_pt2_input" placeholder="" value="' . $website . '"/>';
                            
                            	echo "<label>Kontonummer</label>";
                            	echo '<input type="tel" class="form-control" name="accountnumber" id="reg_pt2_input" placeholder="" value="' . $accountnumber . '"/>';


                            	echo "<label>Velg kategori</label>";
                            	echo '<div class="regOrgDropdown">
                            	<select class="orgbtn1" name="category">
                            	<option value="NULL"></option>
                            	<option value="Humanitært" >Humanitært</option>
                            	<option value="Dyrevern" >Dyrevern</option>
                            	<option value="Forskning" >Forskning</option>
                            	<option value="Fundraising" >Fundraising</option>
                            	</select>
                            	</div>';

                            	echo "<label>Beskrivelse av organisasjonen</label>";
                            	echo '<textarea class="form-control" id="aboutOrg_pt2" rows="5" name="about" id="aboutOrg" placeholder="Om organisasjonen">' . $about . '</textarea>';
                            	echo '
                            	<button class="btn bluebtn" name="backgroundimgURLbutton">
                            	Last opp bakgrunnsbilde
                            	</button>
                            	<form enctype="multipart/form-data">
                            	<input type="file" name="backgroundimgURL" style="display:none">
                            	</form> 
                            	';
                            	echo '
                            	<button  class="btn bluebtn" name="logoURLbutton">
                            	Last opp logo
                            	</button>
                            	<form enctype="multipart/form-data">
                            	<input type="file" name="logoURL" style="display:none">
                            	</form> 
                            	';
                            	echo '
                            	<button  class="btn btn-success" name="update_info">
                            	Oppdater informasjon
                            	</button>
                            	';
                    		}
						}
					}
				?>	


		</div>

		<div class="col-md-3"></div>

	</div>


	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!--Check login information-->
	<script src="checkLogin.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!--Sript for insert organization to database through AJAX request-->
	<script src="../js/updateOrganization.js"></script>

</body>


</html>