$('#clear').click(function(){
	var image = $("#file_background");
	image.replaceWith( image = image.clone( true ) );
});

$("img[name=preview]").click(function(){
	$("#file_background").trigger('click');
});
//triggered when user selects image to upload
$("#file_background").change(function(){
	previewImage(this);
});
//register project, ajax request .php script (insertProject.php) to insert into database
$("input[name=complete_ProjectReg]").click(function(){
	var name = $('input[name=name]').val();
	var title = $('input[name=title]').val();
	var about = $('textarea[name=about]').val();
	var country = $('input[name=country]').val();
	var city = $('input[name=city]').val();
	if(name == ""){
		alert("hva heter prosjektet?");
		return false;
	}
	var projectJSON = {
		"name" : name,
		"title" : title,
		"about" : about,
		"country" : country,
		"city" : city
	};
	projectJSON = JSON.stringify(projectJSON);
	//alert(projectJSON);
	$.ajax({
		type: "POST",
		dataType: "text",
		url: "../phpBackend/insertProject.php",
		data: {'project' : projectJSON},
		success: function(response) {
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
		},
		error : function(response){
			alert("ERROR INSRT PROJECT.js ajax request error : " + response.message);
		}
	});
	return false;
});
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
			alert("insertProject.js ajax request success Bakgrunnsbilde: " + response);
		},
		error : function(response){
			alert(" insertProject.js : insertBackground ajax request ERROR : " + response);
			console.log(response.message);
		}
	});
}
//preview selected image
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
function clearInput(){
	$('input[name=name]').val("");
	$('input[name=title]').val("");
	$('textarea[name=about]').val("");
	$('input[name=country]').val("");
	$('input[name=city]').val("");
	$("img[name=preview]").attr("src", "../img/default.png");
	$('#clear').trigger('click');
}