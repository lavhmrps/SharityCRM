<?php
session_start();
include '../phpBackend/connect.php';
include '../phpBackend/checkSession.php';


?>

<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="../js/Chart.min.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sharity</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/list_project.css">
	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/fonts.css" rel="stylesheet"/>
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

  <script src="../js/styleswitcher.js" type="text/javascript" ></script>

  <script type="text/javascript" src="../js/followers.js"></script>


</head>
<body>

	<?php include '../pages/header_nav.php'; ?>
	<canvas id="canvas" width="1200" height="500"></canvas>
	<br/>



	

</body>
</html>

