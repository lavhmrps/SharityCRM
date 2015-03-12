<?php

session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
?>

<html>
<head>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/draggableStats.css">
  <script type="text/javascript" src="../js/draggableStats.js"></script>




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

</head>
<body>
	<?php
	include "../pages/header_nav.php";
	?>

	



  <div class="col-md-2"></div>
  <div class="col-md-8">
   <?php
   /*
   $organizationNr = $_SESSION['organizationNr'];

   if (isset($_POST['showStatistics'])) {

    $sql = "SELECT Donation.*, Project.name FROM Donation INNER JOIN Project ON Donation.projectID = Project.projectID WHERE Project.organizationNr = $organizationNr";
    $result = mysqli_query($connection, $sql);

    if ($result) {
     echo "Antall donasjoner: " . mysqli_num_rows($result) . "</br>";
     while ($row = mysqli_fetch_assoc($result)) {

      echo "Donert til prosjektID: " . $row['projectID'];
      echo "<br/>Sum donert: " . $row['sum'] . " kr";
      echo "<br/>Prosjektnavn: " . $row['name'];
      echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
    }
  } else {
   echo "<h2>Failure</h2>";
 }
}


*/
?>


</div>

<div class="col-md-2"></div>

<div id="menubar">
  Meny: 
  <button id="showlast12months">Siste 12 mnd</button> 
</div>
<div id="draggable" class="ui-widget-content">
  <div id="framebar">
    <strong><u>Siste 12 mnd</u></strong> <!--Sett id og gi mouse over: pointer-->
    <button id="maximize">MAX</button>
    <button id="minimize">MIN</button>
    <button id="close">CLOSE</button>
  </div>
  <canvas id="graph" width="1000" height="500">   
  </canvas> 
</div>

<script src="../js/stickyheader.js"></script>


</body>
</html>

