<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/hash.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/Admin.css" rel="stylesheet">
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

	<h1>Prject preview goes here</h1>

	<div class="col-md-3"></div>
	<div class="col-md-6 text-center" id="adminlogin">

		<form method="post">
			<h1 style="color:white;">Skriv inn passord for å slette</h1>
			<input type="text" name="organizationNr" class="form-control" id="organizationNr" placeholder="Organisasjonsnummer"/>
			<input type="password" name="password" class="form-control" id="passwd" placeholder="Passord"/>
			<input type="submit" name="confirmDelete" class="form-control" id="login_admin" value="Fjern prosjekt"/>
		</form>

	</div>
	<div class="col-md-3"></div>

	<?php

	if(isset($_POST['confirmDelete'])){
		$organizationNr = $_POST['organizationNr'];
		$session_organizationNr = $_SESSION['organizationNr'];

		if($session_organizationNr == $organizationNr){
			$password = $_POST['password'];
			$sql = "SELECT * FROM organization WHERE organizationNr ='$session_organizationNr'";
			$result = mysqli_query($connection, $sql);
			if($result){
				if(mysqli_num_rows($result) == 1){
					$row = mysqli_fetch_assoc($result);
					$dbpassword = $row['password'];
					$hash = crypt($password, $dbpassword);

					if($hash == $dbpassword) {
						$projectIDtoDelete = $_SESSION['projectIDtoDelete'];
						echo "This to delete: ".  $projectIDtoDelete;

						$sql = "DELETE FROM project WHERE projectID = '$projectIDtoDelete'";
						$result = mysqli_query($connection, $sql);
						if($result){
							header("Location: ../pages/showProjects.php");
						}
					}
				}
			} 
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