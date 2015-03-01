
var file_background = $("#file_background");

$("#clear").on("click", function () {
	$("#file_background").replaceWith( file_background = file_background.clone( true ) );
});


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
				insertBackground();
				clearInput();
				
			}

		},
		error : function(response){
			alert("ERROR INSRT PROJECT.js ajax request error : " + response.message);
		}
	});
	
	return false;
});
function insertBackground(){
	try{
		var file_data_background = $('input[name=backgroundimgURL]').prop('files')[0];
	}catch(error){
		alert(error.message);
	}
	if(file_data_background != undefined){
		alert("InsertProject.js: insertBackgroud() : FIL ER SATT");
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
}
function clearInput(){

	$('input[name=name]').val("");
	$('input[name=title]').val("");
	$('textarea[name=about]').val("");
	$('input[name=country]').val("");
	$('input[name=city]').val("");
	$("img[name=imagePreview]").attr("src", "../img/default.png");
	$('#clear').trigger('click');

}