<?php
session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
$organizationNr = $_SESSION['organizationNr'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sharity</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- /Bootstrap Core CSS -->

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/font.css" rel="stylesheet">

	<!-- Default CSS -->
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<!-- /Default CSS -->

	<!-- Alternate CSS -->
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />
	<!-- /Alternate CSS -->
	<!-- /Custom CSS -->

	<!-- Script to change CSS -->
	<script src="../js/styleswitcher.js" type="text/javascript" ></script>
	<!-- End of script -->

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!-- Includes header -->
	<?php
	include '../pages/header_nav.php';
	?>
	<!-- End of header -->

	<!-- Script with HTML to show all the news from logged in organization -->
<script src="../js/showNews.js"></script>
	<!-- End of script -->



<div class="container">
	<div class="col-lg-2 col-md-2 col-xs-0"></div>
	<!-- search for news -->
	<div class="col-lg-8 col-md-8 col-xs-12">
		<input type="text" id="reg_project_input" class="form-control" name="projectsearch" placeholder="Søk.."/>
	</div>
	<!-- End of search -->
	<div class="col-lg-2 col-md-2 col-xs-0"></div>

	<!-- Box to paste all the news found in database for logged in organization -->
	<div class="row" id="news">

	</div>
	<!-- End of news -->
</div>

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/showNews.js"></script>



</body>
</html>