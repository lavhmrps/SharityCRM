<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<!--Check login information-->
	<script src="../js/checkLogin.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

</script>
</head>

</body>
<div class="container">

	<div class="col-md-3"></div>
	<div class="col-md-6 text-center" id="adminlogin">

		<form>
			<h1 style="color:white;">Registrer admin</h1>
			<input type="text" name="admin_username" class="form-control" id="username" placeholder="Username"/>
			<input type="password" name="admin_password" class="form-control" id="passwd" placeholder="Password"/>
			<input type="submit" name="reg_admin" class="form-control" id="login_admin" value="Registrer"/>


		</form>

	</div>
	<div class="col-md-3"></div>


	<?php
	include '../../phpBackend/connect.php';
	include '../../phpBackend/hash.php';

	if(isset($_REQUEST["reg_admin"])){
		
		$resultat = preg_match("/^[a-åA-Å 0-9]{1,30}$/", $_REQUEST["admin_username"]);
		if($resultat){


			

			$username = $_REQUEST["admin_username"];
			$password = $_REQUEST["admin_password"];
			
			$hash = better_crypt($password);
			
			$sql = "INSERT INTO admin (username, password)VALUES('$username','$hash')";

			$resultat = mysqli_query($connection, $sql);

			if(!$resultat){
				echo "feil i registrering!";
			}
			elseif(mysqli_affected_rows($connection)==0){
				echo "Feil i registrering2!";
			}
			elseif($resultat){
				header("Location: loginAdmin.php"); 
				exit();
			}

			mysqli_close($connection);


		}
		else{
			echo "brukernavnet kan inneholde små og store bokstaver, mellomrom og tall, maks 30 tegn";
		}


	}
	?>


	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!--Check login information-->
	<script src="checkLogin.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>


</body>


</html>

