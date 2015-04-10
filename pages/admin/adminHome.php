<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin</title>

	<!-- Bootstrap Core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/Admin.css" rel="stylesheet">
	
	
</head>
<body>

	<?php
	include "adminHeader_nav.php";
	?>


	<div class="container">
		<div class="col-lg-2 col-md-0 col-xs-0"></div>
		<div class="col-lg-8 col-md-12 col-xs-12 text-center" id="homebox">
			<h2>Du er nå logget inn som administrator</h2>
		</div>
		<div class="col-lg-2 col-md-0 col-xs-0"></div>
	</div>



	<!-- jQuery -->
	<script src="../../js/jquery.js"></script>
	<script src="../../js/stickyheader.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../../js/bootstrap.min.js"></script>

</body>
</html>