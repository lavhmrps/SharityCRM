$("button[name=backgroundimgURLbutton]").click(function () {
	$("input[name=backgroundimgURL]").trigger('click');
});

$("button[name=logoURLbutton]").click(function () {
	$("input[name=logoURL]").trigger('click');
});

$('button[name=complete_registration]').click(function(event){
	insertInformation();
	insertBackground();
	insertLogo();
	window.location.replace('../pages/home.php');

});


function insertInformation(){
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
		url : "../phpBackend/updateOrganization.php",
		data: {"organization" : organizationJSON},
		success : function(response){
			alert("Org. info: " + response);
			
		},
		error : function(response){
			console.log(response.message);
		}
	});
}

function insertBackground(){

	try{
		var file_data_background = $('input[name=backgroundimgURL]').prop('files')[0];  
	}catch(error){
		alert(error.message);
	}
	



	if(file_data_background != undefined){
		var form_data_background = new FormData();                  
		form_data_background.append('file_background', file_data_background);
		$.ajax({
	        url: '../phpBackend/insertBackground.php', // point to server-side PHP script 
	        datatype: 'text',  // what to expect back from the PHP script, if anything
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data_background,                         
	        type: 'POST',
	        success: function(response){

	        	alert("Bakgrunnsbilde: " + response);
	        },
	        error : function(response){
	        	console.log(response.message);
	        }
	    });

	}

}

function insertLogo(){
	try{
		var file_data_logo = $('input[name=logoURL]').prop('files')[0];  
	}catch(error){
		alert(error.message);
	}

	

	if(file_data_logo != undefined){

		var form_data_logo = new FormData();                  
		form_data_logo.append('file_logo', file_data_logo);


		$.ajax({
            url: '../phpBackend/insertLogo.php', // point to server-side PHP script 
            datatype: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data_logo,                         
            type: 'POST',
            success: function(response){
            	alert("Logo: " + response);        
            },
            error : function(response){
            	console.log(response.message);
            }
        });

	}
}










