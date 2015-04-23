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

	<!-- Custom CSS -->
	<link href="../css/scrolling-nav.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/font.css" rel="stylesheet">
	<link href="../css/main-theme.css" rel="stylesheet" type="text/css" title="default" />
	<link href="../css/alternate-theme-1.css" rel="stylesheet" type="text/css" title="alternate" />
	<link href="../css/alternate-theme-2.css" rel="stylesheet" type="text/css" title="alternate2" />
	<link href="../css/alternate-theme-3.css" rel="stylesheet" type="text/css" title="alternate3" />

	<script src="../js/styleswitcher.js" type="text/javascript" ></script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<?php
	include '../pages/header_nav.php';
	?>

<script >
	$(document).ready(function(){
		$(function() {
			$('input[name=projectsearch]').keydown();
		});
		$('input[name=projectsearch]').on("keyup keydown keypress", function(e){
			var searchstring = $('input[name=projectsearch]').val();
			var sql = "SELECT * FROM news WHERE title LIKE '%"+searchstring+"%'";
			$.ajax({
				type : "POST",
				dataType: "json",
				url : "../phpBackend/getNews.php",
				data : {"sql" : sql},
				success : function(response){
					var projectBox = "";					
					for(var i = 0; i < response.length; i++){
						projectBox += '<div class="col-lg-3 col-md-3 col-xs-2" id="projectcontainer">';
						projectBox += '<div class="col-md-12" id="projectcontent">';
						projectBox += "<h2>" + response[i].title + "</h2>";
						projectBox += "<img src='http://localhost/SharityCRM/phpBackend/" + response[i].backgroundimgURL + " ' alt='Bakgrunnsbilde' id='showprojectimg'/>";
						projectBox += '</div>';
						projectBox += "<div class='col-md-12' id='bottom'>";
						projectBox += '<a href="../pages/showSelectedNews.php" onclick="showSelectedNews(' + response[i].projectID + ')">Vis</a> - ';
						projectBox += '<a href="../pages/change_newsinfo.php" onclick="showSelectedNews(' + response[i].projectID +  ')">Endre</a> - ';
						projectBox += '<a href="../pages/deleteNews.php" onclick="deleteNews(' + response[i].projectID + ')">Slett</a>';
						projectBox += '</div>';
						projectBox += '</div>';
					}
					$("#news").html(projectBox);	
				}
			});
		});
	});
</script>



<div class="container">
	<div class="col-lg-2 col-md-2 col-xs-0"></div>
	<div class="col-lg-8 col-md-8 col-xs-12">
		<input type="text" id="reg_project_input" class="form-control" name="projectsearch" placeholder="Søk.."/>
	</div>
	<div class="col-lg-2 col-md-2 col-xs-0"></div>
	<div class="row" id="news">

	</div>
</div>

<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script src="../js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/showNews.js"></script>



</body>
</html>