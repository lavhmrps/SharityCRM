

<!DOCTYPE html>
<html>
<head>

	<title>User login</title>

	<script src="../js/jquery.js"></script>
	<script src="checkLoginUser.js"></script>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/Admin.css" rel="stylesheet">
</head>

</body>
	<div class="container">

	<div class="col-md-3"></div>
		<div class="col-md-6 text-center" id="adminlogin">
		<form>
				<h1 style="color:white;">Logg inn</h1>
				<label style="color:white">E-postadresse</label>
				<input type="text" name="email" class="form-control" id="username" placeholder=""/>
				<label style="color:white">Passord</label>
				<input type="password" name="password" class="form-control" id="passwd" placeholder=""/>

				<input type="submit" name="loggIn" class="form-control" id="login_admin" value="Logg inn"/><a href="registerUser.php">Registrer bruker</a>

			</form>

		</div>
		<div class="col-md-3"></div>


		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!--Check login information-->
		<script src="checkLogin.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="../js/bootstrap.min.js"></script>

		</body>


</html>

