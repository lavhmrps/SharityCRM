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

