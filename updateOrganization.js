
$('button[name=complete_registration]').click(function(){




});

$("button[name=backgroundimgURLbutton]").click(function () {
	$("input[name=backgroundimgURL]").trigger('click');
});

$("button[name=logoURLbutton]").click(function () {
	$("input[name=logoURL]").trigger('click');
});

$('button[name=complete_registration]').click(function(event){


	
	var address = $('input[name=address]').val();
	var phone = $('input[name=phone]').val();
	var email = $('input[name=email]').val();
	var zipcode = $('input[name=zipcode]').val();
	var website = $('input[name=website]').val();
	var accountnumber = $('input[name=accountnumber]').val();
	var category = $('select[name=category]').val();
	var about = $('textarea[name=about]').val();

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
		dataType : "text",
		url : "updateOrganization.php",
		data: {"organization" : organizationJSON},
		success : function(response){
			setStringStatus("OK");

		},
		error : function(response){
			console.log(response.message);
		}
	});






	try {
		var file_data_background = $('input[name=backgroundimgURL]').prop('files')[0];   
		var form_data_background = new FormData();                  
		form_data_background.append('file_background', file_data_background);


		if($('input[name=backgroundimgURL]').val() == ''){
			setBackgroundStatus("OK");
		}else{
			$.ajax({
            url: 'insertBackgroundimg.php', // point to server-side PHP script 
            datatype: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data_background,                         
            type: 'POST',
            success: function(response){
            	
            	setBackgroundStatus("OK");
            	
            	
            }
        });
		}
	}
	catch(err) {
		setBackgroundStatus("OK");
	}


	try {
		var file_data_logo = $('input[name=logoURL]').prop('files')[0];   
		var form_data_logo = new FormData();                  
		form_data_logo.append('file_logo', file_data_logo);


		if($('input[name=logoURL]').val() == ''){
			setLogoStatus("OK");
		}else{
			$.ajax({
            url: 'insertLogo.php', // point to server-side PHP script 
            datatype: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data_logo,                         
            type: 'POST',
            success: function(response){
            	
            	setLogoStatus("OK");         
            }
        });
		}
	}
	catch(err) {
		setLogoStatus("OK");
	}


	
		//window.location.replace("home.php")
		if(getBackgroundStatus() == "OK" && getStringStatus() === "OK" && getLogoStatus() === "OK"){
			window.location.replace("home.php");
		}
	

	return false;

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

$background = "";
$logo = "";
$string = "";
function setBackgroundStatus(status){
	$background = status;
}
function getBackgroundStatus(){
	return $background;
}



function setLogoStatus(status){
	$logo = status;
}
function getLogoStatus(){
	return $logo;
}



function setStringStatus(status){
	$string = status;
}
function getStringStatus(){
	return $string;
}



