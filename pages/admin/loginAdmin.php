<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>


	</script>
</head>

</body>
<div class="container">

	<div class="col-md-3"></div>
	<div class="col-md-6 text-center" id="adminlogin">

		<form method="post" autocomplete="off">
			<h1 style="color:white;">Admin</h1>
			<input type="text" name="admin_username" class="form-control" id="username" placeholder="Username"/>
			<input type="password" name="admin_password" class="form-control" id="passwd" placeholder="Password"/>
			<input type="submit" name="login_admin" class="form-control" id="login_admin" value="Logg inn"/>
			<a href="adminHome.php">Admin hjem</a>

		</form>


	</div>
	<div class="col-md-3"></div>

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>


	<?php
	ob_start();
	include '../../phpBackend/connect.php';
	include '../../phpBackend/hash.php';
	
	if (isset($_POST['login_admin'])) {

		$username = $_REQUEST['admin_username'];
		$password = $_REQUEST['admin_password'];

		$sql = "SELECT * FROM admin WHERE username = '$username'";
		$result = mysqli_query($connection, $sql);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			$dbpassword = $row['password'];
			
			$hash = crypt($password, $dbpassword);

			if($hash == $dbpassword) {
				session_start();
				$_SESSION['username'] = $username;  
				header("Location: adminHome.php"); /* Redirect browser */
				exit();
			} else {
				echo "Ikke godkjent!";

				echo "<br/>";
				echo $password;
				echo "<br/>";
				echo $dbpassword;
				echo "<br/>";
				echo $hash;
			}
		}else{
			echo "NULL";
		}



	}


	ob_end_flush();

	?>

</body>


</html>

