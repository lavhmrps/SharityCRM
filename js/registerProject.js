$(document).ready(function(){

	var OKname = false;
	var OKcountry = false;
	var OKcity = false;
	var OKtitle = false;


	$('input[name=projectName]').on("keyup keydown keypress", function(e){
		if(e.type == "keyup" || e.type == "keydown" || e.type == "keypress"){
			
			var pattern = /^[ÆØÅæøåA0-9a-åA-Å ]+$/; 

			var reference = 'input[name='+this.name+']';

			var errorRef = 'span[name='+this.name+']';

			OKname = checkInput(reference, pattern, errorRef);
		}
	});

	$('input[name=country]').on("keyup keydown keypress", function(e){
		if(e.type == "keyup" || e.type == "keydown" || e.type == "keypress"){
			var pattern = /^[-ÆØÅæøåAa-åA-Å ]+$/;

			var reference = 'input[name='+this.name+']';
			var errorRef = 'span[name='+this.name+']';

			OKcountry = checkInput(reference, pattern, errorRef);
		}
	});

	$('input[name=city]').on("keyup keydown keypress", function(e){
		if(e.type == "keyup" || e.type == "keydown" || e.type == "keypress"){
			var pattern = /^[-ÆØÅæøåAa-åA-Å ]+$/;

			var reference = 'input[name='+this.name+']';
			var errorRef = 'span[name='+this.name+']';

			OKcity = checkInput(reference, pattern, errorRef);
		}
	});

	$('input[name=title]').on("keyup keydown keypress", function(e){
		if(e.type == "keyup" || e.type == "keydown" || e.type == "keypress"){
			var pattern = /^[0-9-ÆØÅæøåAa-åA-Å ]+$/;

			var reference = 'input[name='+this.name+']';
			var errorRef = 'span[name='+this.name+']';

			OKtitle = checkInput(reference, pattern, errorRef);
		}
	});


	$("input[name='projectName']").blur(function(){

		var string = $("input[name='projectName']").val();

		

		var pattern = /^[ÆØÅæøåA0-9a-åA-Å ]+$/; 
		if(string.match(pattern)){

			$("input[name='projectName']").css('color', 'green');


		}
	});


	function checkInput(ref, pattern, errorRef){

		var string = $(ref).val();

		if(string == ""){
			$(ref).css('color', 'black');
			ok = false; //kan vi fjerne dette?
			$(errorRef).prop("hidden", true);



			return false;
		}

		if(string.match(pattern)){

			$(ref).css('color', 'black');
			$(errorRef).prop("hidden", true);
			
			return true;

		}else{

			$(ref).css('color', 'red');
			$(errorRef).prop("hidden", false);
			return false;
		}


		if(string == ""){
			$(ref).css('color', 'black');
			$(errorRef).prop("hidden", true);
			return false;
		}


	}

	$("button[name=registerProject]").click(function(){

		insertProject();
	});

	$("#preview").click(function(){
		$("#file_background").trigger("click");
	});

//triggered when user selects image to upload
$("#file_background").change(function(){
	previewImage(this);
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

function insertProject(){



	var name = $("input[name=projectName]").val();
	var country = $("input[name=country]").val();
	var city = $("input[name=city]").val();
	var title = $("input[name=title]").val();
	var about = $("textarea[name=about]").val();


	if(OKname && OKcountry && OKcity && OKtitle){

		var json = {
			"name" : name,
			"title" : title,
			"about" : about,
			"country" : country, 
			"city" : city
		};

		json = JSON.stringify(json);




		$.ajax({
			type : "POST",
			dataType: "text",
			url : "../phpBackend/insertProject.php",
			data: {"project" : json},
			success : function(response){

				if(response == "OK"){
					try{
						var file_data_background = $('input[name=backgroundimgURL]').prop('files')[0];
					}catch(error){
						alert(error.message);
					}
					if(file_data_background != undefined){
						insertBackground(file_data_background);
					}



					clearInput();
				}

			}
		});


	}
}

//ajax request to .php script (insertBackgroundimgProject.php) to insert image into database
function insertBackground(file_data_background){	
	var form_data_background = new FormData();
	form_data_background.append('file_background', file_data_background);
	$.ajax({
		url: '../phpBackend/insertBackgroundimgProject.php', // point to server-side PHP script
		datatype: 'text', // what to expect back from the PHP script, if anything
		cache: false,
		contentType: false,
		processData: false,
		data: form_data_background,
		type: 'POST',
		success: function(response){
			var image = $("#file_background");
			image.replaceWith( image = image.clone( true ) );
			$("img[name=preview]").attr("src", "../img/default.png");

		},
		error : function(response){
			alert(" insertNews.js : insertBackground ajax request ERROR : " + response);
			console.log(response.message);
		}
	});
}

function clearInput(){
	$("input[name=projectName]").val("");
	$("input[name=country]").val("");
	$("input[name=city]").val("");
	$("input[name=title]").val("");
	$("textarea[name=about]").val("");
	
}

});