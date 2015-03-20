
<?php
	
	if(!isset($_SESSION['username'])){
		//header('Location: loginAdmin.php');

		//<script type="text/javascript"> window.location adminHome;  </script>
	}
	if(isset($_POST["admin_logout"])){
		session_unset();
		session_destroy();
		
		header('Location: loginAdmin.php');
	}
	//include 'connect.php';


?>
<nav><a href="adminHome.php">Hjem</a> - <a href="change_organization.php">Endre organisasjon</a> - <a href="change_user.php">Endre bruker<a/> - <a href="statistics.php">Statitikk</a></nav>
