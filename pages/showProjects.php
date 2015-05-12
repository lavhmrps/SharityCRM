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

	<!-- Scripts -->
	<script src="../js/styleswitcher.js" type="text/javascript" ></script>
	<script src="../js/showProject.js"></script>
	<!-- End of Scripts  -->


</head>

<!-- Script with HTML to show all the projects to logged in organization -->
<script >
$(document).ready(function(){
	$(function() {
		$('input[name=projectsearch]').keydown();
	});

	$('input[name=projectsearch]').on("keyup keydown keypress", function(e){


		var searchstring = $('input[name=projectsearch]').val();
		var sql = "SELECT * FROM project WHERE name LIKE '%"+searchstring+"%'";

		$.ajax({
			type : "POST",
			dataType: "json",
			url : "../phpBackend/getProjects.php",
			data : {"sql" : sql},
			success : function(response){
					//alert(response + " " + <?php $_SESSION['organizationNr']?>);

					

					var projectBox = "";					

					for(var i = 0; i < response.length; i++){

						
						

						var url = response[i].backgroundimgURL;


						if(url == null){
							
							url = "http://localhost/SharityCRM/img/noimage.jpg";
						}
						projectBox += '<div class="col-lg-3 col-md-3 col-xs-2" id="projectcontainer">';
						projectBox += '<div class="col-md-12" id="projectcontent">';
						projectBox += "<h2>" + response[i].name + "</h2>";
						projectBox += "<img src='" + url + "' alt='Bakgrunnsbilde' id='showprojectimg'/>";
						projectBox += '</div>';
						projectBox += "<div class='col-md-12' id='bottom'>";
						projectBox += '<a href="../pages/showSelectedProject.php" onclick="showProject(' + response[i].projectID + ')">Vis</a> - ';
						projectBox += '<a href="../pages/change_projectinfo.php" onclick="showProject(' + response[i].projectID +  ')">Endre</a> - ';
						projectBox += '<a href="../pages/deleteProject.php" onclick="deleteProject(' + response[i].projectID + ')">Slett</a>';
						projectBox += '</div>';
						projectBox += '</div>';

					}

					$("#projects").html(projectBox);





					
					
				}
			});
		});
	});
</script>
<!-- End of script -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!-- Includes header -->
	<?php
	include '../pages/header_nav.php';
	?>
	<!-- End of header -->

	<div class="container">
		<div class="col-lg-2 col-md-2 col-xs-0"></div>

		<!-- Search for project -->
		<div class="col-lg-8 col-md-8 col-xs-12">
			<input type="text" id="reg_project_input" class="form-control" name="projectsearch" placeholder="Søk.."/>
		</div>
		<!-- End of search -->

		<div class="col-lg-2 col-md-2 col-xs-0"></div>

		<!-- Box to paste all the projects from logged in organization -->
		<div class="row" id="projects"></div>
		<!-- End of projects -->
	</div>


	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>


</body>
</html>