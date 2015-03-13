<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
</head>

</body>

<?php
include "adminHeader_nav.php";
?>


<div class="container">
	<div>
		<div class="col-md-3"></div>

		<div class="col-md-6 text-center" id="">
			<div class="row">
				<div class="col-md-10"> 
					<input type="text" name="" class="form-control" id="username" placeholder="Søk.."/>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn" name="" id="searchbtn">
						Søk
					</button>
				</div>
			</div>

			


			<!-- Bare putt infoen som ble funnet ved søket i databasen inn her inntil videre.. så fikser jeg utseende senere. B :)-->
			<?php

				&email = $_GET['username'];

				$sql = "SELECT * FROM User WHERE email = $email";
				$result = mysqli_query($connection, $sql);

				if($result){
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);


						$name = $row['name'];
						$phone = $row['phone'];
						$address = $row['address'];
						$zip = $row['zip'];
						$picURL = $row['picURL'];		
						$password = $row['password'];


						echo "<label>E-post</label>";
						echo '<input type="email" class="form-control" name="email" id="changeUser" placeholder="" value="' . $email . '"/>';

						echo "<label>Navn</label>";
						echo '<input type="text" class="form-control" name="name" id="changeUser" placeholder="" value="' . $name . '"/>';

						echo "<label>Telefonnummer/label>";
						echo '<input type="tel" class="form-control" name="phone" id="changeUser" placeholder="" value="' . $phone . '"/>';

						echo "<label>Adresse</label>";
						echo '<input type="text" class="form-control" name="address" id="changeUser" placeholder="" value="' . $address . '"/>';

						echo "<label>Postkode</label>";
						echo '<input type="tel" class="form-control" name="zip" id="changeUser" placeholder="" value="' . $zip . '"/>';

						echo "<label>Bilde URL</label>";
						echo '<input type="text" class="form-control" name="picURL" id="changeUser" placeholder="" value="' . $picURL . '"/>';

						echo "<label>Passord</label>";
						echo '<input type="password" class="form-control" name="password" id="changeUser" placeholder="" value="' . $password . '"/>';

						echo "<label>Gjenta passord</label>";
						echo '<input type="password" class="form-control" name="repeat_password" id="changeUser" placeholder="" value="' . $password . '"/>';

						echo '
                            <button  class="btn btn-success" name="update_info">
                            Oppdater bruker
                            </button>
                            ';
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

</body>


</html>

