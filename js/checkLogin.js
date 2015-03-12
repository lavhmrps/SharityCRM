$(document).ready(function(){

	$('#loginbutton').click(function(){
		var organizationNr = $('input[name=organizationNr]').val();
		var password = $('input[type=password]').val();

		var combinationJSON = {
			"organizationNr" : organizationNr,
			"password" : password
		};

		combinationJSON = JSON.stringify(combinationJSON);

		$.ajax({
			type: "POST",
			dataType: "text",
			url: "phpBackend/checkLogin.php",
			data: {'combination' : combinationJSON},
			success: function(response){
				if(response == "OK"){
					window.location.replace("pages/registration_pt2.php");
				}else if(response == "WRONG"){
					alert("WRONG ORGANIZATION NUMBER / PASSWORD COMBINATION");
					$('input[name=password]').val("");
				}else if(response == "NULL"){
					$('input[name=reg_organizationNr]').val(organizationNr);
					$('input[name=reg_name]').focus();
					$("#goToRegister").trigger("click");

				}
			},
			error: function(response){
				alert(response);
			}
		});


		return false;
	});

	$('input[name=login_admin]').click(function(){
		var username = $('input[name=admin_username]').val();
		var password = $('input[name=admin_password]').val();
		
		adminJSON = {	
			"username" : username,
			"password" : password 
		};

		adminJSON = JSON.stringify(adminJSON);

		$.ajax({
			type: "POST",
			dataType: "text",
			url: "../phpBackend/checkLogin.php",
			data: {"adminCombination" : adminJSON},
			success: function(response){
				if(response == "OK"){
					window.location.replace("../pages/admin/adminHome.php");

				}
			},
			error: function(response){
				alert(response);
			}
		});

		return false;
	});
});