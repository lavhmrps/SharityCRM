<?php
session_start();
if(!isset($_SESSION['email'])){
	echo '<h1>Ikke logget inn</h1>';
	header("Location: index.php");
}

include 'connect.php';

?>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Alle prosjekter</h1>
	<?php include'proto_header_nav.php';?>
	
	<br/><br/><br/><br/><br/><br/><br/><br/>



</body>
</html>