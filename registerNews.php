<?php
session_start();
include 'checkSession.php';
include 'connect.php';

if(isset($_POST['registerNews'])){
	$organizationNr = $_SESSION['organizationNr'];
	$title = $_POST['title'];
	$txt = $_POST['txt'];
	$projectID = $_POST['projectID'];

	
	
	

	
}

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
<body>
	<?php
	include "header_nav.php";
	?>

	<div class="container" id="phonecontainer">

		<div class="col-md-5" id="phone">
			<div id="phonemargin">
				<form method="post" enctype="multipart/form-data">
					<div id="page_organisation">

						
						<div id="header_div" class="boxshadow">
							<div page-role="header" class="header_top"></div>
							<img src="img/menu.png"
							class="show-page-loading-msg menu_icon back_icon">
							
							<p>
								<?php 
								$organizationNr=$_SESSION["organizationNr"];
								$sql = "SELECT projectID, name FROM Project WHERE organizationNr = $organizationNr";
								$result = mysqli_query($connection, $sql);

								if ($result) {


									echo "<select name='projectID'>";
									echo "<option value='NULL'>Velg prosjekt</option>";


									while ($row = mysqli_fetch_assoc($result)) {

										echo "<option value=" . $row['projectID'] . ">" . $row['name'] . "</option>";

									}
									echo "</select>";


								} else {
									echo "<h2>Failure</h2>";
								}
								?>
							</p>
						</div>

						<!-- For toppbilde  -->
						<div class="portrait">

							<input type="file" id="file1"  name="file1" style="display:none" />
							<div id="uploadimg" >
								<p style="cursor:pointer; color:#000;">
									<u>Last opp bakgrunnsbilde</u>
								</p>
							</div>

						</div>

						<div class="main_content">

							<input type="text" id="bottomTitle" placeholder="Skriv nyhetsoverskrift" name="title"/>

							<div class="form-group">
								<textarea class="form-control" id="aboutProj" rows="10" id="aboutproject" placeholder="Skriv nyhetstekst" name="txt"></textarea>																		



							</div>

						</div>
						<div class="col-md-12" id="aligncenternews">
							<input type="button" value="Lagre" id="registerphonebutton" name="registerNews" />
						</div>

						

					</div>

					<!-- End of #phonemargin-->

				</div>
				<!-- End of #phone-->
			</div>
			<div class="col-md-7">

				
				
				
			</div>
		</form>
		<!-- End of container -->

	</div>

	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<script src="js/stickyheader.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Scrolling Nav JavaScript -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>

	<!--Sript for insert news to database through AJAX request-->
	<script src="insertNews.js"></script>

	<script type="text/JavaScript">
	$("#uploadimg").click(function() {
		$("#file1").trigger('click');
	});

	</script>

</body>

</html>