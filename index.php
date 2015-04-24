<?php
session_start();




if(isset($_SESSION['organizationNr'])){
	header("Location: pages/registration_pt2.php");
}

include "phpBackend/connect.php";

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
	<link href="css/main.css" rel="stylesheet"/>
	<link href="css/fonts.css" rel="stylesheet"/>
	<link href="css/main-theme.css" rel="stylesheet"/>

	<!-- Scripts -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="header">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="#page-top">Sharity</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
					<li class="hidden">
						<a class="page-scroll" href="#page-top"></a>
					</li>
					<li>
						<a class="page-scroll" href="#login" id="goToLogin">Logg inn</a>
					</li>
					<li>
						<a class="page-scroll" href="#register" id="goToRegister">Ny Organisasjon</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Intro Section -->
	<section id="intro" class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8"></div>
				<div class="col-lg-4" id="linkContainer">
					<p>
						Denne nettsiden lar deg skrive nyheter og legge til prosjekter for din organisasjon, og sender de umiddelbart inn til Sharityappen. I tillegg vil du kunne se statistikk over donasjonene og brukerne tilknyttet din organisasjon.
					</p>
					<a class="btn btn-default page-scroll" href="#login" id="linkbutton">Logg inn</a>
					<a class="btn btn-default page-scroll" href="#register" id="linkbutton">Ny organisasjon</a>
				</div>

			</div>
		</div>
	</section>

	<!-- About Section -->
	<section id="login" class="login-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-5" id="LoginContainer">
							<h1>Logg inn</h1>

							<form method="post" autocomplete="off">

								<div class="row">
									<div class="col-md-1">

									</div>
									<div class="form-group col-md-11">
										<input type="text" class="form-control" name="organizationNr" id="unames" placeholder="Organisasjonsnummer" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-1">

									</div>
									<div class="form-group col-md-11">
										<input type="password" class="form-control" name="password" id="passwds" placeholder="Passord" onkeyup="checkPassword()" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-1">

									</div>
									<div class="form-group col-md-11">
										<button type="submit" class="btn whitebtn" name="login" id="loginbutton">
											Logg inn
										</button>

										<a class="btn whitebtn page-scroll" id="registerbutton" href="#register">Ny organisasjon</a>


									</div>
								</div>
							</form>
						</div>
						<div class="col-md-4"></div>

					</div>
				</div>
			</div>
		</section>

		<!-- Services Section -->
		<section id="register" class="register-section">
			<div class="container" id="orgContainer">
				<div class="row">
					<div class="col-lg-12">
						<h1>Ny Organisasjon</h1>


						<div class="row">
							<div class="col-md-3"></div>

							<div class="col-md-6" id="inputforms">

								<div class="form-group">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
												<label for="reg_organizationNr" class="text-left">Organisasjonsnummer</label>
											</div>
											<div class="col-md-9 text-right spanpadding">
												<span hidden name="newsHeader" class="errorspan">Kun akkurat 9 tall</span>  
											</div>
										</div>
										<input type="tel" class="form-control" name="reg_organizationNr" id="orgIDs" placeholder="" onblur ="validateOrgnr()" pattern="" title="Må inneholde tall fra 0-9 og presis 9 siffer" required>
									</div>

								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
												<label for="reg_name" class="text-left">Organisasjonsnavn</label>
											</div>
											<div class="col-md-9 text-right spanpadding">
											<span hidden name="newsHeader" class="errorspan">Kun bokstaver, mellomrom og bindestrek</span>  
											</div>
										</div>
										<input type="text" class="form-control" name="reg_name" id="orgNames" placeholder=""/>
									</div>

								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
												<label for="reg_password" class="text-left">Passord</label>
											</div>
											<div class="col-md-9 text-right spanpadding">
												<span hidden name="newsHeader" class="errorspan">Ugyldig passord</span>  
											</div>
										</div>
										<input type="password" class="form-control" name="reg_password" id="newPasswds" placeholder=""/>
									</div>

								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
												<label for="reg_password2" class="text-left">Gjenta passord</label>
											</div>
											<div class="col-md-9 text-right spanpadding">
												<span hidden name="newsHeader" class="errorspan">Ugyldig passord</span>  
											</div>
										</div>
										<input type="password" class="form-control" name="reg_password2" id="rptPasswds" placeholder=""/>
									</div>

								</div>

								<div class="form-group">
									<div class="col-md-12">
										<label></label>
										<button  class="btn btn-success" name="complete_registration" id="completeReg">
											Fullfør (1/2)
										</button>
									</div>

								</div>
							</div>

							<div class="col-md-3"></div>
						</div>


					</div>
				</div>
			</div>
		</section>
		<section id="footer" class="footer-section">
			<div id="indexfooter">
				<div class="container">
					<div class="row">


						<div class="col-md-2" id="footerpadding"></div>
						<div class="col-md-1" id="footerpadding"></div>
						<div class="col-md-3" id="footerpadding">

							<div class="col-md-6">
								<a href="pages/admin/loginAdmin.php">Admin </a> 
							</div>
							<div class="col-md-6">
								<a href="pages/aboutSharity.php">About </a>
							</div>
							<div class="col-md-6">
								<a href="pages/FAQ/FAQ.php">FAQs </a>
							</div>
							<div class="col-md-6">
								<a href="http://www.simpleness.no" target="_blank">Simplenæss </a>
							</div>
							<div class="col-md-6">
								<a href="generateData.php" target="_blank">Genere data </a>
							</div>
							<div class="col-md-6">
								<a href="pages/admin/regAdmin.php" target="_blank">Reg. Admin</a>
							</div>
						</div>


						<div class="col-md-4" id="footerpadding">
							<a href="http://www.facebook.com/vlokreim"><img src="http://static.viewbook.com/images/social_icons/facebook_32.png"/></a>
							<a href="http://www.twitter.com/mv700" target="_blank"><img src="http://static.viewbook.com/images/social_icons/twitter_32.png"/></a> 
							<a href="http://www.facebook.com/vlokreim" target="_blank"><img src="http://static.viewbook.com/images/social_icons/linkedin_32.png"/></a> 
							<a href="http://www.google.com" target="_blank"><img src="http://static.viewbook.com/images/social_icons/google_32.png"/></a> 
							<a href="http://www.vimeo.com" target="_blank"><img src="http://static.viewbook.com/images/social_icons/vimeo_32.png"/></a> 
							<a href="http://www.tumblr.com" target="_blank"><img src="http://static.viewbook.com/images/social_icons/tumblr_32.png"/></a> 
							<a href="http://www.wordpress.com" target="_blank"><img src="http://static.viewbook.com/images/social_icons/wordpress_32.png"/></a>



						</div>
						<div class="col-md-2" id="footerpadding"></div>


					</div>
				</div>
				<div id="copyrightcontainer">

				</div>
			</div>
		</div>
	</section>
	<?php 

	?>
	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Scrolling Nav JavaScript -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>

	<!--Sript for insert organization to database through AJAX request-->
	<script src="js/insertOrganization.js"></script>

	<!--Check login-->
	<script src="js/checkLogin.js"></script>

</body>

</html>