<?php
session_start();
if(!isset($_SESSION['email'])){
	echo '<h1>Ikke logget inn</h1>';
	header("Location: index.php");
}

include 'connect.php';

if(isset($_POST['loggut'])){
	session_unset();
	session_destroy();
	header('Location: index.php');
}



?>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Logget inn</h1>
	<?php include'proto_header_nav.php';?>
	<form method="post">
		<input type="submit" name="loggut" value="Logg ut"/>
	</form>
</body>
</html>