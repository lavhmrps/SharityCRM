
<?php

session_start();
include '../phpBackend/checkSession.php';
include '../phpBackend/connect.php';
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
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/list_project.css">
	<link href="../css/main.css" rel="stylesheet"/>
	<link href="../css/fonts.css" rel="stylesheet"/>

</head>
<?php
include "../pages/header_nav.php";
?>

<div class="container" id="phonecontainer">

	<?php
	$newsID = $_SESSION['newsIDtoShow'];
	$sql = "SELECT * FROM News WHERE newsID = $newsID";
	$result = mysqli_query($connection, $sql);
	if($result){
		if(mysqli_num_rows($result) == 1){

			$row = mysqli_fetch_assoc($result);


			$projectID = $row['projectID'];
			$sql1 = "SELECT * FROM Project WHERE projectID = $projectID";
			$result1 = mysqli_query($connection, $sql1);

			$projectName = "..."; // her har det skjedd noe feil
			$projectID = "...";
			
			if($result1){
				if(mysqli_num_rows($result1) == 1){

					$row1 = mysqli_fetch_assoc($result1);
					$projectName = $row1['name'];
					$projectID  = $row1['projectID'];
				}
			}

			






			echo 
			'
			<div class="container" id="phonecontainer">
			<div class="col-md-3"></div>
			<div class="col-md-5" id="phone">
			<div id="phonemargin">
			<form method="post" enctype="multipart/form-data">
			<div id="page_organisation">


			<div id="header_div" class="boxshadow">
			<div page-role="header" class="header_top"></div>
			<img src="../img/arrow_left.png"
			class="show-page-loading-msg menu_icon back_icon">

			<p>

			<select anem ="projectID">
				<option value="' . $projectID . '"> ' . $projectName . ' </option>
			</select>

			</p>
			</div>

			<!-- For toppbilde  -->
			<div class="portrait">

			<input type="file" id="file1"  name="file1" style="display:none" />
			

			<img id="uploadimg" style="width: 100%; height:100%; cursor: pointer" src="http://i.imgur.com/7f2N9DT.jpg"/>

			<p style="cursor:pointer; color:#000;">
			</p>
			

			</div>

			<div class="main_content">

			<input type="text" id="bottomTitle" placeholder="Skriv nyhetsoverskrift" name="title" value="' . $row['title'] . '" readonly/>

			<div class="form-group">
			<textarea class="form-control" id="aboutProj2" rows="10"  placeholder="Skriv nyhetstekst" name="txt" readonly>' . $row['txt'].'</textarea>																		
			</div>

			</div>
			<div class="col-md-12" id="aligncenternews">
				<input type="button" value="Tillat endre" id="registerphonebutton" name="registerNews" />
			</div>



			</div>

			<!-- End of #phonemargin-->
			</form>
			</div>

			</div>
			<!-- End of #phone-->
			</div>
			<div class="col-md-4"></div>	





			';
		}else{
			die("Alvorlig feil! SQL sprørringen etter " . $projectID . " returnerte mindre enn 1 eller mer enn 1 Prosjekt");
		}
	}else{
		die("Feil i SQL spørringen");
	}
	?>





	<!-- jQuery -->
	<script src="../js/jquery.js"></script>
	<script src="../js/stickyheader.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

	<!-- Upload img js -->
	<script type="text/JavaScript">
	$("#uploadimg").click(function() {
		$("#file1").trigger('click');
	});

	</script>

	<!--Sript for insert project to database through AJAX request-->


</body>
<!--  -->
</html>

