<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/Admin.css" rel="stylesheet">¨

	<script src="../js/jquery.js"></script>


	<script type="text/javascript">

	$(document).ready(function(){
		$('input[name=register]').click(function(){
			
			var email = $('input[name=reg_email]').val();
			var password = $('input[name=reg_password]').val();

			var json = {
				"email" : email, 
				"password" : password

			};
			json = JSON.stringify(json);

			$.ajax({
				type : "POST",
				dataType : "text",
				url : "insertUser.php",
				data : {"user" : json},
				success : function(response){
					if(response == "OK"){

						$('input[name=reg_email]').val("");
						$('input[name=reg_password]').val("");

						


					}
				},
				error : function(response){
					alert("Error: " + response.message);
				}
			});
		});
	});

	</script>

</head>

</body>
<div class="container">

	<div class="col-md-3"></div>
	<div class="col-md-6 text-center" id="adminlogin">
		<form>
			<h1 style="color:white;">Registrer bruker</h1>
			<label style="color:white">E-postadresse</label>
			<input type="text" name="reg_email" class="form-control" id="username" placeholder="" autocomplete="off"/>
			<label style="color:white">Passord</label>
			<input type="password" name="reg_password" class="form-control" id="passwd" placeholder="" autocomplete="off"/>
			<input type="submit" name="register" class="form-control" id="login_admin" value="Registrer"/>

		</form>
	</div>
	<div class="col-md-3"></div>


	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!--Check login information-->
	<script src="checkLogin.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

</body>


</html>

