

$('#completeReg').click(function(){

	var name = $('input[name=reg_name]').val();
	var organizationNr = $('input[name=reg_organizationNr]').val();
	var password = $('input[name=reg_password]').val();
	var password2 = $('input[name=reg_password2]').val();



	if(password != password2){
		alert("Feil: Alert fra insertOrganization! Passord og Passord2 er ikke like (Ikke si det, visdet)");
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
		datatype: "JSON",
		url: "insertOrganization.php",
		data: {'organization': organizationJSON},
		success: function(response){
			alert(response);
			
		},
		error: function(response){
			console.log(response.message); //skriver feilmelding i consol i nettleser
		}	
	});
	return false;
});

