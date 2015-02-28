
<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: loginAdmin.php');

		//<script type="text/javascript"> window.location adminHome;  </script>
	}
	if(isset($_POST["admin_logout"])){
		session_unset();
		session_destroy();
		
		header('Location: loginAdmin.php');
	}
	include 'connect.php';


?>
<nav><a href="adminHome.php">Hjem</a> - <a href="adminShowOrganizations.php">Vis alle organisasjoner</a> - <a href="adminShowUsers.php">Vis alle brukere<a/></nav>
