$(document).ready(function(){


	$("button[name=backgroundimgURLbutton]").click(function () {
		$("input[name=backgroundimgURL]").trigger('click');
	});

	$("button[name=logoURLbutton]").click(function () {
		$("input[name=logoURL]").trigger('click');
	});

	$('button[name=complete_registration]').click(function(event){
		insertInformation();
		//window.location.replace('../pages/home.php');

	});

	$("#preview").click(function(){
		$("#file_background").trigger("click");
	});
	$("#previewLogo").click(function(){
		$("#file_logo").trigger("click");
	});

//triggered when user selects image to upload
$("#file_background").change(function(){
	previewImage(this);
});
//triggered when user selects image to upload
$("#file_logo").change(function(){
	previewImageLogo(this);
});

function previewImage(input) {
	if (input.files && input.files[0]) {
		var fileReader = new FileReader();

		fileReader.onload = function (e) {
			$('img[name=preview]').attr('src', e.target.result);
			$("img[name=preview]").show();
		}

		fileReader.readAsDataURL(input.files[0]);
	}
}
function previewImageLogo(input) {
	if (input.files && input.files[0]) {
		var fileReader = new FileReader();

		fileReader.onload = function (e) {
			$('img[name=previewLogo]').attr('src', e.target.result);
			$("img[name=previewLogo]").show();
		}

		fileReader.readAsDataURL(input.files[0]);
	}
}


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
			try{
				var file_data_background = $('input[name=backgroundimgURL]').prop('files')[0];
			}catch(error){
			}
			if(file_data_background != undefined){
				insertBackground(file_data_background);

			}
			try{
				var file_data_logo = $('input[name=logoURL]').prop('files')[0];
			}catch(error){
			}
			if(file_data_logo != undefined){
				insertLogo(file_data_logo);

			}

			


		},
		error : function(response){
			
			console.log("Organization: feil i success updateOrganization.js feil til updateOrganization.php");
		}
	});
}

function insertBackground(file_data_background){	
	var form_data_background = new FormData();
	form_data_background.append('file_background', file_data_background);
	$.ajax({
		url: '../phpBackend/insertBackground.php', // point to server-side PHP script
		datatype: 'text', // what to expect back from the PHP script, if anything
		cache: false,
		contentType: false,
		processData: false,
		data: form_data_background,
		type: 'POST',
		success: function(response){
			console.log("RESPONSE FRA UPADATE PRGANIZATIN.JS : AJAX TO insertBackground.PHP" +response);
		},
		error : function(response){
			
			console.log(" updateOrganization.js : insertBackground ajax request ERROR : " + response);
		}
	});
}

function insertLogo(file_data_logo){	
	var form_data_logo = new FormData();
	form_data_logo.append('file_logo', file_data_logo);
	$.ajax({
		url: '../phpBackend/insertLogo.php', // point to server-side PHP script
		datatype: 'text', // what to expect back from the PHP script, if anything
		cache: false,
		contentType: false,
		processData: false,
		data: form_data_logo,
		type: 'POST',
		success: function(response){
			
			console.log("insertLogo() updateOrganization" + response);
		},
		error : function(response){
			console.log(" updateOrganization.js : insertLogo ajax request ERROR : " + response);
		}
	});
}
});











