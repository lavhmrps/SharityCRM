<html>
<head>
	<title></title>
	<script src="../js/jquery.js"></script>
</head>
<body>
	<h1>Logg inn</h1>
	<form>
		<input name = "email" type="email" placeholder="Email"/>
		<br/>
		<input name="password" type="password" placeholder="Password"/>
		<br/>
		<input name="loggIn" type="submit" value="Sign in"/>
	</form>

	<h1>Registrer ny bruker</h1>

	<input name="reg_email" type="text" placeholder="Email"/>
	<br/>
	<input name="reg_password" type="password" placeholder="Passord">
	<br/>
	<button name="register">Registrer</button>



	<script src="checkLoginUser.js"></script>

	<script type="text/javascript">

	$(document).ready(function(){
		$('button[name=register]').click(function(){
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
						alert("Bruker ble registret");
						$('input[name=reg_email]').val("");
						$('input[name=reg_password]').val("");

					}
				},
				error : function(response){
					alert(response);
				}
			});
		});
	});

	</script>
	
</body>
</html>	