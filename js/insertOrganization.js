

$('#completeReg').click(function(){


	var name = $('input[name=reg_name]').val();
	var organizationNr = $('input[name=reg_organizationNr]').val();
	var password = $('input[name=reg_password]').val();
	var password2 = $('input[name=reg_password2]').val();

	var ok = 1;

	$('input[name=reg_password]').removeClass('empty_input');
	$('input[name=reg_password2]').removeClass('empty_input');
	$('input[name=reg_name]').removeClass('empty_input');
	$('input[name=reg_organizationNr]').removeClass('empty_input');


	if(name == ""){
		$('input[name=reg_name]').addClass('empty_input');
		ok= 0;
	}
	if(organizationNr == ""){
		$('input[name=reg_organizationNr]').addClass('empty_input');
		ok = 0;
	}

	if(password == ""){
		$('input[name=reg_password]').addClass('empty_input');
		ok = 0;
	}
	if(password2 == ""){
		$('input[name=reg_password2]').addClass('empty_input');
		ok = 0;
	}

	if(password != password2){
		$('input[name=reg_password]').addClass('empty_input');
		$('input[name=reg_password2]').addClass('empty_input');
		ok = 0;
	}

	if(ok == 0){
		return false;
	}


	var organizationJSON = {
		'name' : name,
		'organizationNr' : organizationNr,
		'password': password
	};

	organizationJSON = JSON.stringify(organizationJSON);





	$.ajax({
		type: "POST",
		dataType: "text",
		url: "phpBackend/insertOrganization.php",
		data: {'organization': organizationJSON},
		success: function(response){
			if(response == "OK"){
				clearInputs();
				$('input[name=organizationNr]').val(organizationNr);
				$('input[name=password]').focus();
				$("#goToLogin").trigger("click");
			}else{
				alert(response);
			}
		},
		error: function(response){
			alert("ERROR: INSERT ORGANIZATION : " + response.message);
			console.log(response.message); //skriver feilmelding i consol i nettleser
		}	
	});
	return false;
});
function clearInputs(){
	$('input[name=reg_name]').val("");
	$('input[name=reg_organizationNr]').val("");
	$('input[name=reg_password]').val("");
	$('input[name=reg_password2]').val("");
}
