var OKheader = false;

	$('input[name=newsHeader]').on("keyup keydown keypress", function(e){
		if(e.type == "keyup" || e.type == "keydown" || e.type == "keypress"){
			var pattern = /^[0-9-ÆØÅæøåAa-åA-Å ]+$/;

			var reference = 'input[name='+this.name+']';
			var errorRef = 'span[name='+this.name+']';

			OKheader = checkInput(reference, pattern, errorRef);
		}
	});


	function checkInput(ref, pattern, errorRef){

		var string = $(ref).val();

		if(string == ""){
			$(ref).css('color', 'black');
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




	$("button[name=insertNews]").click(function(){
		if(OKheader){
			insertNews();
		}else{
			alert("Feil input");
		}
		
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

function insertNews(){
	var projectID = $("select[name=projectID]").val();
	var title = $("input[name=newsHeader]").val();
	var txt = $("textarea[name=newsText]").val();

	var ok = 1;

	$('select[name=projectID]').removeClass('empty_input');
	$('input[name=newsHeader]').removeClass('empty_input');
	$('textarea[name=newsText]').removeClass('empty_input');

	if(projectID ==="NULL"){
		$('select[name=projectID]').addClass("empty_input");
		ok = 0;
	}
	if(title == ""){
		$('input[name=newsHeader]').addClass('empty_input');
		ok = 0;
	}
	if(txt == ""){
		$('textarea[name=newsText]').addClass('empty_input');
		ok = 0;
		
	}

	if(ok == 0){
		return;
	}

	var json = {
		"projectID" : projectID,
		"title" : title,
		"txt" : txt

	};

	json = JSON.stringify(json);



	$.ajax({
		type : "POST",
		dataType: "text",
		url : "../phpBackend/insertNews.php",
		data: {"news" : json},
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

//ajax request to .php script (insertBackgroundimgProject.php) to insert image into database
function insertBackground(file_data_background){	
	var form_data_background = new FormData();
	form_data_background.append('file_background', file_data_background);
	$.ajax({
		url: '../phpBackend/insertBackgroundimgNews.php', // point to server-side PHP script
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
	$("select[name=projectID]").val("NULL");
	$("input[name=newsHeader]").val("");
	$("textarea[name=newsText]").val("");
	
}