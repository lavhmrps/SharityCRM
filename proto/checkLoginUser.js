$(document).ready(function(){
	$('input[name=loggIn]').click(function(event){
	
	var email = $('input[name=email]').val();
	var password = $('input[name=password]').val();

	var combinationJSON = {
		"email" : email,
		"password" : password
	};

	combinationJSON = JSON.stringify(combinationJSON);

	$.ajax({
		type : "POST",
		datatype : "JSON",
		url : "checkLoginUser.php",
		data : {"combination" : combinationJSON},
		success: function(response){
			if(response == "OK"){

				window.location.replace("home.php");
			}
		},
		error: function(response){
			console.log(response.message);
		}
	});

	event.preventDefault();
});
});
