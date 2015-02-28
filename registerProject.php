	<?php

	session_start();
	include 'checkSession.php';
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
		<link href="css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Custom CSS -->
		<link href="css/scrolling-nav.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="stylesheet" type="text/css" href="css/list_project.css">
		<link href="css/main.css" rel="stylesheet"/>
		<link href="css/fonts.css" rel="stylesheet"/>

	</head>
	<?php
	include "header_nav.php";
	?>

	<div class="container" id="phonecontainer">

		<div class="col-md-5" id="phone">
			<div id="phonemargin1">
				<div id="page_organisation">
					<form id="registerProject">

						<div id="header_div" class="boxshadow">
							<div page-role="header" class="header_top"></div>
							<img src="img/arrow_left.png"
							class="show-page-loading-msg menu_icon back_icon">
							<input type="text" name = "name" id="topTitle" placeholder="Skriv navn" />
						</div>

						<!-- For toppbilde  -->
						<div class="portrait">

							<input type="file" id="file1"  name="file1" style="display:none" />
							<div id="uploadimg" >
								<p style="cursor:pointer; color:#000;">
									<u>Bakgrunnsbilde / toppbilde</u>
								</p>
							</div>

							<div class="logodiv_top_right">
								<?php

								$orgNr = "1";
								echo "<img id='logoimg' src='http://student.cs.hioa.no/~s188081/IKKEROR/Bilder/" . $orgNr . "/logo.jpg'/></p>";
								?>
							</div>
						</div>
						<div class="space_btn">
							<button class="ui-btn btn_single_project_donate">
								DONÉR
							</button>
						</div>
						<div class="main_content">

							<h4>
								<span>
									<input type="text" name = "country" id="inCountry" placeholder="Skriv inn land" />
								</span> , <span>
									<input type="text" name="city" id="inCity" placeholder="Skriv inn by" />
								</span>
							</h4>

						<input type="text" name="title" id="bottomTitle" placeholder="Skriv prosjektets tittel"/>

						<div class="form-group">
							<textarea class="form-control" name="about" id="aboutProj" rows="5" id="aboutproject" placeholder="Skriv om prosjektet"></textarea>
						</div>

					</div>
					<div class="col-md-12" id="aligncenter">
						<input type="button" name="complete_ProjectReg" id="registerphonebutton" value="Lagre"/>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="js/stickyheader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Upload img js -->
<script type="text/JavaScript">
	$("#uploadimg").click(function() {
		$("#file1").trigger('click');
	});

</script>

<!--Sript for insert project to database through AJAX request-->
<script src="insertProject.js"></script>


</body>
<!--  -->
</html>

