$('button[name=complete_registration]').click(function(event){

	var address = $('input[name=address]').val();
	var phone = $('input[name=phone]').val();
	var email = $('input[name=email]').val();
	var zipcode = $('input[name=zipcode]').val();
	var website = $('input[name=website]').val();
	var accountnumber = $('input[name=accountnumber]').val();
	var category = $('select[name=category]').val();
	var about = $('textarea[name=about]').val();
	//var backgroundimgURL = $('input[name=istanbul]').val();
	//var logoURL = $('input[name=istanbul]').val();


	var organizationJSON = {
		"address" : address,
		"phone" : phone,
		"email" : email,
		"zipcode" : zipcode,
		"website" :website,
		"accountnumber" : accountnumber,
		"category" : category,
		"about" : about

	};

	organizationJSON = JSON.stringify(organizationJSON);

	$.ajax({
		type : "POST",
		datatype : "JSON",
		url : "updateOrganization.php",
		data: {"organization" : organizationJSON},
		success : function(response){
			if(response == "OK"){
				clearInputs();
				window.location.replace("home.php");
			}
			alert(response);
		},
		error : function(response){
			console.log(response.message);
		}
	});


	event.preventDefault();
});


function clearInputs(){

	$('input[name=address]').val("");
	$('input[name=phone]').val("");
	$('input[name=email]').val("");
	
	$('input[name=zipcode]').val("");
	
	$('input[name=website]').val("");
	
	$('input[name=accountnumber]').val("");
	$('select[name=category]').val("");
	$('textarea[name=about]').val("");

}