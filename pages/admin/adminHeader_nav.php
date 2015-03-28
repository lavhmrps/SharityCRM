
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
<div class="col-md-1"></div>
<div class="col-md-10 text-center">
	<nav><a href="adminHome.php">Hjem</a> - <a href="change_organization.php">Endre organisasjon</a> - <a href="change_user.php">Endre bruker<a/> - <a href="statistics.php">Statitikk</a></nav>
</div>
<div class="col-md-1">
	<input type="submit" name = "admin_logout" value="logg ut"/>
</div>